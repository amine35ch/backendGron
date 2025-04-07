<?php

namespace App\Services\DCompanyServices;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DBrandEnum\DBrandState;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DCompanyEnum\DCompanySelfCheckIn;
use App\Enums\DCompanyEnum\DCompanytype;
use App\Enums\PStateEnum\PStateEnum;
use App\Enums\UserEnum\UserProfileEnum;
use App\Exceptions\CustomException;
use App\Http\Resources\DCompanyResources\DCompanyResourceRoot;
use App\Models\DArticle;
use App\Models\DArticlePrice;
use App\Models\DBrand;
use App\Models\DBrandLine;
use App\Models\DCompany;
use App\Models\DCompanyChild;
use App\Models\DCompanyOperation;
use App\Models\DCompanyProjectDocs;
use App\Models\DInvoiceReference;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectReference;
use App\Models\DWork;
use App\Models\PArticle;
use App\Models\PBrand;
use App\Models\PDocument;
use App\Models\PInvoiceReference;
use App\Models\PProfile;
use App\Models\PWork;
use App\Models\User;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\SubscriptionServices\SubscriptionService;
use App\Services\UserServices\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DCompanyService
{
    public function __construct()
    {
    }


    public function createMAR(array $data)
    {

        try {
            DB::beginTransaction();

            Log::info($data);

            $dCompany = DCompany::create($data);
            if (isset($data['logo'])) {
                $dCompany->update([
                    'logo' => uploadFile(
                        $data['logo'],
                        $dCompany->directory_path
                    )
                ]);
            }

            if (isset($data['signature'])) {
                $this->addSignatureToDocuments($data['signature'], $dCompany);
            }
            if (isset($data['documents'])) {
                $this->attachDocuments($dCompany, $data);
            }
            if (isset($data['operations'])) {
                $this->createCompanyOperations($dCompany, $data['operations']);
            }

            // add to profile to know how has to add user admin
            $this->createMarWorks($dCompany);
            $this->createCompanyAdmin($dCompany, $data);
            $this->createMarBrands($dCompany);
            $this->createMarArticles($dCompany);
            $this->copyReferences($dCompany);
            DB::commit();
            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e);
        }
    }


    public function importCompany($data)
    {
        try {
            DB::beginTransaction();
            $dCompany = DCompany::where('siret', $data['company_code'])
                ->where('profile', $data['profile'])->first();
            if (!$dCompany) {
                throw new CustomException("La société avec ce profil et ce code n'existe pas.");
            }
            $parentCompanyId = getCompanyOfConnectedUser()->id;
            if (in_array($data['profile'], [DCompanyProfile::INS->value, DCompanyProfile::AUD->value])) {
                $companyChildFlag = DB::table('d_company_children')->where('d_company_id', $parentCompanyId)->where('d_company_child_id', $dCompany->id)->exists();
                if ($companyChildFlag) {
                    throw new CustomException('Vous avez déjà cette entreprise.');
                }
                DCompanyChild::firstOrCreate([
                    'd_company_id' => $parentCompanyId,
                    'd_company_child_id' => $dCompany->id,
                ], [
                    'd_company_id' => $parentCompanyId,
                    'd_company_child_id' => $dCompany->id,
                ]);
                $dCompany->update([
                    'parent_company_id' => $parentCompanyId
                ]);
                $this->createBrands($dCompany);
                $this->createArticles($dCompany);
                $this->notifyCompany($dCompany);
            }
            DB::commit();
            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }
    public function previewImportCompany(
        $siret,
        $profile,
    ) {
        $dCompany = DCompany::where('siret', $siret)
            ->where('profile', $profile)
            ->first();
        if ($dCompany) {
            return $dCompany;
        }
        return null;
    }
    public function notifyCompany($dCompany)
    {


        $message = __('notifications.company.import.message');
        $subject = __('notifications.company.import.subject');
        sendNotificationCompany(
            $subject,
            $message,
            null,
            $dCompany
        );
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $dCompany = DCompany::where('trade_name', $data['trade_name'])->where('siret', $data['siret'])->where('profile', $data['profile'])->first();
            if ($dCompany && in_array($data['profile'], [DCompanyProfile::INS->value, DCompanyProfile::AUD->value])) {
                throw new CustomException("Cette société existe déjà dans notre système, veuillez utiliser l'importation.");
            } else {
                $dCompany = DCompany::create($data);
                if (isset($data['logo'])) {
                    $dCompany->update([
                        'logo' => uploadFile(
                            $data['logo'],
                            $dCompany->directory_path
                        )
                    ]);
                }

                if (isset($data['signature'])) {
                    $this->addSignatureToDocuments($data['signature'], $dCompany);
                }
                if (isset($data['documents'])) {
                    $this->attachDocuments($dCompany, $data);
                }
                if (isset($data['operations'])) {
                    $this->createCompanyOperations($dCompany, $data['operations']);
                }

                // add to profile to know how has to add user admin
                if (
                    !in_array(
                        $data['profile'],
                        [
                            DCompanyProfile::STT->value,
                            DCompanyProfile::MAN->value,
                        ]
                    )

                ) {
                    if (isset($data['selfCheckIn'])) {
                        if ($data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value) {
                            $password = $this->createCompanyAdmin($dCompany, $data);
                            $subscriptionService = new SubscriptionService();
                            $subscriptionService->createSubsription($dCompany, $password);
                        }
                    }
                } else {
                    $profile = PProfile::where('reference', $dCompany->profile)->value('entitled');
                    $message = __(
                        'notifications.company.create.' . $profile,
                        [
                            'trade_name' => $dCompany->trade_name,
                            'company_code' => $dCompany->code,
                        ]
                    );
                    $subject = 'Ajouter un ' . $profile;
                    sendNotificationMandataire(
                        $subject,
                        $message,
                        $dCompany,
                    );
                }

                if ($dCompany->profile == DCompanyProfile::MAR->value) {
                    $this->createMarBrands($dCompany);
                    $this->createMarWorks($dCompany);
                    $this->createMarArticles($dCompany);
                } else {
                    $this->createBrands($dCompany);
                    $this->createArticles($dCompany);
                    $this->addRgesToCompany($dCompany, $data['rges'] ?? []);
                }
                $this->copyReferences($dCompany);
            }

            DB::commit();
            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function getMars()
    {

        $company = getCompanyOfConnectedUser();
        $marParentCompanyIds = DCompanyChild::where('d_company_child_id', $company->id)->whereHas('parent', function ($q) {
            $q->where('profile', DCompanyProfile::MAR->value);
        })->pluck('d_company_id')->toArray();
        return DB::table('d_companies')->whereIn('id', $marParentCompanyIds)->select('id', 'trade_name')->get();
    }

    public function updateCurrentMar($data)
    {
        try {
            DB::beginTransaction();
            $dCompany = getCompanyOfConnectedUser();
            if (DB::table('d_company_children')->where('d_company_id', $data['mar_id'])->where('d_company_child_id', $dCompany->id)->exists()) {
                $dCompany->update([
                    'parent_company_id' => $data['mar_id']
                ]);
            } else {
                throw new CustomException();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th);
        }
    }

    public function createMarWorks($dCompany)
    {
        $pWorks = PWork::all();
        $works = [];
        foreach ($pWorks as $pWork) {
            $works[] = [
                'reference' => $pWork->reference,
                'description' => $pWork->description,
                'unit' => $pWork->unit,
                'pricing_list' => json_encode($pWork->pricing_list),
                'd_company_id' => $dCompany->id,
                'mar_id' => $dCompany->id,
                'access' => 1,
                'default' => 1,
            ];
        }
        DWork::insert($works);
    }

    public function createMarArticles($dCompany)
    {
        $pArticles = PArticle::with('brand')->get();
        $dBrands = DBrand::where('d_company_id', $dCompany->id)->get();
        $articles = [];
        foreach ($pArticles as $pArticle) {

            $articles[] = [
                'designation' => $pArticle->designation,
                'description' => $pArticle->description,
                'unit' => $pArticle->unit,
                'type' => $pArticle->type,
                'path' => $pArticle->path,
                'doc_name' => $pArticle->doc_name,
                'd_brand_id' => $pArticle->p_brand_id == null ? null : $dBrands->where('entitled', $pArticle->brand->entitled)->value('id'),
                'd_company_id' => $dCompany->id,
                'mar_id' => $dCompany->id,
                'access' => 1,
                'is_validated' => 1,
                'default' => 1,
                'always' => $pArticle->type == 2 ? 1 : 0,
            ];
        }
        DArticle::insert($articles);
        $prices = [];
        $articleCollection = DArticle::where(
            'd_company_id',
            $dCompany->id
        )->where('access', 1)->get();

        foreach ($articleCollection as $article) {
            $prices[] = [
                'd_article_id' => $article->id,
                'state' => DArticleState::ACTIVATED->value,
                'd_company_id' => $article->d_company_id,
                'unit_price' => $pArticle->where('designation', $article->designation)->value('selling_price')
            ];
        }
        DArticlePrice::insert($prices);
    }

    public function createMarBrands($dCompany)
    {
        $pBrand = PBrand::all();
        $brands = [];
        foreach ($pBrand as $brand) {

            $brands[] = [
                'entitled' => $brand->entitled,
                'access' => 1,
                'd_company_id' => $dCompany->id,
                'mar_id' => $dCompany->id,
                'is_validated' => 1,
                'default' => 1,
            ];
        }
        DBrand::insert($brands);
        $lines = [];
        $brandCollection = DBrand::where('d_company_id', $dCompany->id)->where('access', 1)->get();
        foreach ($brandCollection as $brand) {
            $lines[] = [
                'd_brand_id' => $brand->id,
                'state' => DArticleState::ACTIVATED->value,
                'd_company_id' => $brand->d_company_id,
            ];
        }

        DBrandLine::insert($lines);
    }

    public function createBrands($company)
    {
        $brands = DBrand::where('mar_id', $company->parent_company_id)->get();
        $lines = [];
        foreach ($brands as $brand) {
            $line = $brand->lines->where(
                'd_company_id',
                $company->parent_company_id
            )->first();
            $lines[] = [
                'd_brand_id' => $brand->id,
                'state' => DBrandState::ACTIVATED->value,
                'd_company_id' => $company->id,
            ];
        }
        DBrandLine::insert($lines);
    }

    public function createArticles($company)
    {
        $articles = DArticle::where('mar_id', $company->parent_company_id)->get();
        $lines = [];
        foreach ($articles as $article) {
            $articlePrice = $article->articlePrices->where(
                'd_company_id',
                $company->parent_company_id
            )->first();
            $lines[] = [
                'd_article_id' => $article->id,
                'state' => DArticleState::ACTIVATED->value,
                'd_company_id' => $company->id,
            ];
        }
        DArticlePrice::insert($lines);
    }

    public function createCompanyOperations($company, $operations)
    {
        $dataToInsert = [];
        foreach ($operations as $operation) {
            $dataToInsert[] = [
                'd_company_id' => $company->id,
                'p_operation_id' => $operation,
            ];
        }
        DCompanyOperation::insert($dataToInsert);
    }

    public function createCompanyAdmin($dCompany, $data)
    {
        try {
            DB::beginTransaction();
            $password = generateRandomUniqueCode($dCompany->trade_name, 9);
            $dataAdmin = [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make($password),
                'email' => $dCompany->email ?? null,
                'phone_number' => $dCompany->approval_number ?? null,
                'first_name' => $dCompany->representative_first_name ?? null,
                'last_name' => $dCompany->representative_last_name ?? null,
                'address' => $dCompany->address ?? null,
                'city' => $dCompany->city ?? null,
                'zip_code' => $dCompany->zip_code ?? null,
            ];
            $user = (new UserService(new User()))->create($dataAdmin, $dCompany, 1);
            if (!$user) {
                throw new \Exception('Failed to create user');
            }
            $profile = PProfile::where('reference', $dCompany->profile)->value('entitled');
            $credentials = $dCompany['profile'] === DCompanyProfile::AUD->value || $dCompany['profile'] === DCompanyProfile::INS->value || $dCompany['profile'] === DCompanyProfile::MAR->value ? [
                'username' => $dataAdmin['username'],
                'password' => $password,
                'company_code' => $dCompany->code,
            ] : null;
            $message = __(
                'notifications.company.create.' . $profile,
                [
                    'trade_name' => $dCompany->trade_name,
                    'company_code' => $dCompany->code,
                ]
            );
            if ($dCompany->profile == DCompanyProfile::INS->value) {
                $subject = 'Ajouter une ' . $profile;
            } else {
                $subject = 'Ajouter un ' . $profile;
            }
            sendNotificationUser(
                $subject,
                $message,
                null,
                $credentials,
                [$user],
                $dCompany->representative_last_name . ' ' . $dCompany->representative_first_name ?? null
            );
            DB::commit();
            return $password;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException(message: $th);
        }
    }
    public function selfCheckInStatus(array $data, DCompany $dCompany)
    {
        try {

            $data['selfCheckIn'] = (int) $data['selfCheckIn'];


            DB::beginTransaction();
            if ($data['selfCheckIn'] !== DCompanySelfCheckIn::ACTIVE->value && $data['selfCheckIn'] !== DCompanySelfCheckIn::DISABLE->value) {
                unset($data['selfCheckIn']);
            }
            if (isset($data['selfCheckIn'])) {
                $isActive = $data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value;
                if (
                    !in_array(
                        $dCompany['profile'],
                        [
                            DCompanyProfile::STT->value,
                            DCompanyProfile::MAN->value,
                        ]
                    )
                    && $isActive
                ) {
                    $password = $this->createCompanyAdmin($dCompany, $data);
                    $subscriptionService = new SubscriptionService();
                    $subscriptionService->createSubsription($dCompany, $password);
                }

                $dCompany['selfCheckIn'] = $data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value ? PStateEnum::ACTIVATED->value : PStateEnum::DISABLED->value;
                $dCompany->update($data);
                $state = $data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value ? PStateEnum::ACTIVATED->value : PStateEnum::DISABLED->value;
                $companyId = $dCompany->id;
                $this->disableUsers($companyId, $state);
            }

            DB::commit();

            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e);
        }
    }

    public function edit(array $data, DCompany $dCompany)
    {
        try {
            DB::beginTransaction();
            unset($data['id']);
            if ($data['selfCheckIn'] !== DCompanySelfCheckIn::ACTIVE->value && $data['selfCheckIn'] !== DCompanySelfCheckIn::DISABLE->value) {
                unset($data['selfCheckIn']);
            }
            $dCompany->update($data);
            if (isset($data['logo'])) {
                $dCompany->update([
                    'logo' => uploadFile(
                        $data['logo'],
                        $dCompany->directory_path
                    )
                ]);
            }
            if (isset($data['documents'])) {
                $this->attachDocuments($dCompany, $data);
            }
            if (isset($data['signature'])) {
                $this->addSignatureToDocuments($data['signature'], $dCompany);
            }
            if (isset($data['rges'])) {
                $this->updateRgesToCompany($dCompany, $data['rges']);
            }
            if (isset($data['selfCheckIn'])) {
                $isActive = $data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value;
                if (
                    !in_array(
                        $data['profile'],
                        [
                            DCompanyProfile::STT->value,
                            DCompanyProfile::MAN->value,
                        ]
                    )
                    && $isActive
                ) {
                    $password = $this->createCompanyAdmin($dCompany, $data);
                    $subscriptionService = new SubscriptionService();
                    $subscriptionService->createSubsription($dCompany, $password);
                }

                $state = $data['selfCheckIn'] == DCompanySelfCheckIn::ACTIVE->value ? PStateEnum::ACTIVATED->value : PStateEnum::DISABLED->value;
                $companyId = $dCompany->id;
                $this->disableUsers($companyId, $state);
            }

            DB::commit();

            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e);
        }
    }

    public function addSignatureToDocuments($signature, $dCompany)
    {
        $pDocument = PDocument::where('reference', 'SignatureCompany')->first();

        $document['file'] = $signature;
        $document['p_document_id'] = $pDocument->id;
        $document['name'] = $pDocument->entitled;

        $documentCompany = (new DDocumentService())->attachDocuments(
            $dCompany,
            $document,
            'd_company_id'
        );

        $dCompany->update([
            'signature' => $documentCompany->path,
        ]);
    }

    public function delete(DCompany $dCompany): void
    {
        $dCompany->deleted_by = auth()->user()->id;
        $dCompany->save();
        $dCompany->delete();
    }

    public function getById(int $id)
    {
        return DCompany::with('rges')->find($id);
    }

    public function getAll($filters, $identifier)
    {
        $profile = PProfile::where('identifier', $identifier)->first();
        $user = auth()->user();
        if ($user->profile == DCompanyProfile::VAE->value) {
            $company = isset($filters["company"]) ? $filters["company"] : null;
            $dCompanies = DCompany::selfRoot(companyId: $company)->profile($profile?->reference);
        } else {
            $dCompanies = DCompany::self()->profile($profile?->reference);
            if ($user->profile == DCompanyProfile::INS->value) {
                $dCompanies = DCompany::agentInstaller()->profile($profile?->reference);
            }
        }
        return collection(
            $dCompanies,
            $filters
        );
    }
    public function getRootCompanies($filters)
    {
        $type = (int) $filters["type"];
        unset($filters["type"]);
        $company = isset($filters["company"]) ? $filters["company"] : null;
        if ($type === DCompanytype::ALL->value) {
            $dCompanies = DCompany::selfRoot(companyId: $company);
            return collection(
                $dCompanies,
                // []
                $filters
            );
        } else {
            $identifier = $type === DCompanytype::AUD->value ? "auditors" : "installers";
            $profile = PProfile::where('identifier', $identifier)->first();
            $dCompanies = DCompany::selfRoot(companyId: $company)->profile($profile?->reference);

            return collection(
                $dCompanies,
                $filters
            );
        }

    }
    public function getAllMars()
    {
        $profile = PProfile::where('identifier', "mars")->first();
        $dCompanies = DCompany::profile($profile?->reference);
        $dCompanies = new DCompanyResourceRoot($dCompanies);
        return collection(
            $dCompanies,
            []
        );
    }
    public function getAllRootCompanies($filters)
    {
        return collection(
            DCompany::all(),
            $filters
        );
    }

    public function getAllCompanies($filters)
    {
        return collection(
            DCompany::self(),
            $filters
        );
    }

    public function getAllPorjectDocs($filters)
    {
        return collection(
            DCompanyProjectDocs::self(),
            $filters,
            [],
            [],
            true
        );
    }

    public function attachDocuments($dCompany, $data)
    {
        foreach ($data['documents'] as $document) {
            (new DDocumentService())->attachCompanyDocs($dCompany, $document, 'd_company_id');
        }
    }

    public function copyReferences($dCompany)
    {
        PInvoiceReference::all()->each(function ($reference) use ($dCompany) {
            $destinationInstance = new DInvoiceReference();
            $references = $reference->toArray();
            unset($references['id']);
            $destinationInstance->fill($references);
            $destinationInstance->d_company_id = $dCompany->id;
            $destinationInstance->save();
        });

        if ($dCompany->profile == DCompanyProfile::MAR->value) {
            DProjectReference::create([
                'mar_id' => $dCompany->id,
            ]);
        }
    }

    public function disableCompany(DCompany $dCompany)
    {
        if ($dCompany->profile == DCompanyProfile::MAR->value) {
            throw new CustomException('Vous ne pouvez pas désactiver cette société');
        }
        $projectsInProgress = $dCompany->projectOperations->contains(function ($projectOp) {
            return $projectOp->project->process_ended == 0;
        });
        if ($projectsInProgress) {
            throw new CustomException('Vous ne pouvez pas désactiver cette société car il contient des projets');
        }
        try {
            DB::beginTransaction();
            $dCompany->state = ($dCompany->state == PStateEnum::ACTIVATED->value)
                ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
            $dCompany->save();
            $this->disableUsers($dCompany->id, $dCompany->state);
            DB::commit();

            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function disableUsers($companyId, $state)
    {
        User::where('userable_id', $companyId)->update(['state' => $state]);
    }

    public function updateCompany(array $data, $dCompany)
    {
        try {
            DB::beginTransaction();
            unset($data['id']);
            $dCompany->update($data);
            if (isset($data['logo'])) {
                $dCompany->update([
                    'logo' => uploadFile(
                        $data['logo'],
                        $dCompany->directory_path
                    )
                ]);
            }
            if (isset($data['documents'])) {
                $this->attachDocuments($dCompany, $data);
            }
            if (isset($data['signature'])) {
                $this->addSignatureToDocuments($data['signature'], $dCompany);
            }
            if (isset($data['invoice_reference'])) {
                $this->updateInvoiceReference($data['invoice_reference'], $dCompany);
            }
            if (isset($data['rges'])) {
                $this->updateRgesToCompany($dCompany, $data['rges']);
            }
            DB::commit();

            return $dCompany;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function updateInvoiceReference($invoiceReferences, $dCompany)
    {
        foreach ($invoiceReferences as $invoiceReferenceData) {
            $invoiceReference = DInvoiceReference::find($invoiceReferenceData['id']);

            if ($invoiceReference) {
                $invoiceReference->prefix = $invoiceReferenceData['prefix'];
                $invoiceReference->current_count = $invoiceReferenceData['current_count'];
                $invoiceReference->format = $invoiceReferenceData['prefix'] . $invoiceReferenceData['current_count'];
                $exist = DProjectInvoiceHeader::where(
                    'reference',
                    $invoiceReference->format
                )->where('d_company_id', $dCompany->id)->first();
                if ($exist) {
                    throw new CustomException('Numéro de facture ' . $invoiceReference->format . ' existe!');
                }
                $invoiceReference->save();
            }
        }
    }

    public function canDelete($user, $dCompany)
    {
        $testValidationCompany = $user ? $user->userable_id == $dCompany->id : false;
        $testValidationProfile = $user ? $user->profile == DCompanyProfile::MAR->value || $user->profile == DCompanyProfile::VAE->value : false;
        $testValidationParentCompany = $user ? $user->id == $dCompany->parent_company_id : false;
        $isNotMar = $dCompany->profile != DCompanyProfile::MAR->value || $user->profile != DCompanyProfile::VAE->value;
        $himself = $testValidationCompany ||
            $testValidationProfile ||
            $testValidationParentCompany;
        $emptyProjects = $dCompany->projectOperations->isEmpty();

        return $isNotMar && $himself && $emptyProjects;
    }

    public function canUpdate($user, $dCompany)
    {
        $testValidationCompany = $user ? $user->userable_id == $dCompany->id : false;
        $testValidationParentCompany = $user ? $user->id == $dCompany->parent_company_id : false;
        $testValidationProfile = $user ? $user->profile == DCompanyProfile::MAR->value || $user->profile == DCompanyProfile::VAE->value : false;
        return $testValidationCompany ||
            $testValidationProfile ||
            $testValidationParentCompany;
    }

    public function updateCompanyProjectDocs($dCompany, $data)
    {
        $dCompany->projectDocs()->updateExistingPivot($data['type_doc'], [
            'required' => $data['required']
        ]);
    }

    public function updateCompanyProjectDocsSignature($dCompany, $data)
    {
        $pDocument = PDocument::where('type', $data['type_doc'])->first();
        if ($pDocument->docu_signature) {
            $dCompany->projectDocs()->updateExistingPivot($data['type_doc'], [
                'signature' => $data['signature']
            ]);
        } else {
            throw new CustomException(__('exceptions.signature'));
        }
    }

    public function addRgesToCompany($dCompany, $rges)
    {
        if (!$rges) {
            return true;
        }
        $rges = array_map(function ($rge) use ($dCompany) {
            if ($rge['rge'] == null) {
                return null;
            }
            $qualificationArray = [];

            if (isset($rge['qualifications'])) {
                $qualificationArray = array_map('intval', $rge['qualifications']);
            }
            return [
                'rge' => $rge['rge'],
                'd_company_id' => $dCompany->id,
                'start_date' => $rge['start_date'],
                'end_date' => $rge['end_date'],
                'qualifications' => $qualificationArray
            ];
        }, $rges);
        $rges = array_filter($rges);
        $dCompany->rges()->createMany($rges);
    }

    public function updateRgesToCompany($dCompany, $rges)
    {
        $ids = array_column($rges, 'id');
        $qualificationArray = [];
        $dCompany->rges()
            ->where('d_company_id', $dCompany->id)
            ->delete();
        foreach ($rges as $rge) {
            if ($rge['rge'] == null) {
                $dCompany->rges()->where('id', $rge['id'])->delete();
                continue;
            }
            if (isset($rge['qualifications'])) {
                $qualificationArray = array_map('intval', $rge['qualifications']);
            }
            $dCompany->rges()->create([
                'rge' => $rge['rge'],
                'd_company_id' => $dCompany->id,
                'start_date' => $rge['start_date'],
                'end_date' => $rge['end_date'],
                'qualifications' => $qualificationArray
            ]);

            // $dCompany->rges()->update(
            //     [
            //         'id' => $rge['id'],
            //     ],
            //     [
            //         'rge' => $rge['rge'],
            //         'd_company_id' => $dCompany->id,
            //         'start_date' => $rge['start_date'],
            //         'end_date' => $rge['end_date'],
            //         'qualifications' => $qualificationArray
            //     ]
            // );
        }
    }
}
