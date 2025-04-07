<?php

namespace App\Services\DProjectServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DInvoiceEnum\DInvoicePayedStatus;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DInvoiceEnum\DInvoiceType;
use App\Enums\DProjectDecisionEnum;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Enums\DProjectEnum\DProjectInvoiceEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectEnum\DProjectTypeCreation;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PMailingEnum\P_mailing_references;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PTypeEventEnum\PTypeEventEnum;
use App\Enums\PTypeInvoice\PTypeInvoiceEnum;
use App\Enums\UserEnum\UserProfileEnum;
use App\Exceptions\CustomException;
use App\Factories\StepsFactory\StepsFactory;
use App\Models\DClient;
use App\Models\DCompany;
use App\Models\DCompanyChild;
use App\Models\DDocumentSignature;
use App\Models\DInvoiceCancelComment;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectInvoiceLine;
use App\Models\DProjectOccupants;
use App\Models\DProjectOperation;
use App\Models\DProjectRefused;
use App\Models\DProjectWork;
use App\Models\DProjectWorkArticle;
use App\Models\DResponseAnah;
use App\Models\DWork;
use App\Models\PClassSkipCount;
use App\Models\PDocument;
use App\Models\POperation;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Models\PTypeEvent;
use App\Models\User;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DMailingServices\DMailingService;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use App\Services\DProjectEventServices\DProjectEventService;
use App\Services\DProjectInvoiceHeaderServices\DProjectInvoiceHeaderService;
use App\Services\DProjectOccupantsServices\DProjectOccupantsService;
use App\Services\DProjectOperationServices\DProjectOperationService;
use App\Services\DProjectWorkServices\DProjectWorkService;
use App\Services\ExportServices\ExportService;
use App\Services\GenerateDocumentServices\GenerateDocumentService;
use App\Services\PDocumentServices\PDocumentService;
use App\Traits\DocumentPlaceHolder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DProjectService
{
    use DocumentPlaceHolder;

    public function __construct(
        private DProject $dProject,
        private PDocumentService $pDocumentService
    ) {
    }

    public function create(array $data, $token = null)
    {
        try {
            DB::beginTransaction();
            $childToken = $token;
            $user = auth()->user();
            if ($user) {

                $this->checkMaxProjects();
            } else {
                if ( is_array($token)&&count($token) > 1) {
                    $parentToken = $token[0];
                    $childToken = $token[1];
                    $parentCompany = DCompany::where('linkToken', $parentToken)->first();
                    $data["installer"] = $parentCompany->id;
                }
                $company = DCompany::where('linkToken', $childToken)->first();
                $this->checkCompanyMaxProjects($company);
                $data['project_type'] = DProjectTypeCreation::DEMANDE->value;
                $data["d_company_id"] = $company->id;
            }

            $data['current_step_order'] = PStep::first()->value('id');
            // if (isset($data['merge_agent'])) {
            //     $merge_agent = $data['merge_agent'];
            // }
            $dProject = $this->dProject::create($data);

            if (isset($data['documents'])) {
                foreach ($data['documents'] as $document) {
                    $this->addDocumentsToProject($dProject, $document);
                }
            }

            $dDocumentService = (new DDocumentService());

            if (isset($data['identityDocument'])) {
                $pDocument = PDocument::where('type', $data['identityDocument']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['identityDocument'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['propertyOwnershipProof'])) {
                $pDocument = PDocument::where('type', $data['propertyOwnershipProof']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['propertyOwnershipProof'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['latestTaxReturn'])) {
                $pDocument = PDocument::where('type', $data['latestTaxReturn']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['latestTaxReturn'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['bankAccountDetails'])) {
                $pDocument = PDocument::where('type', $data['bankAccountDetails']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['bankAccountDetails'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['consumptionBills'])) {
                $pDocument = PDocument::where('type', $data['consumptionBills']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['consumptionBills'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['avisDImposition'])) {
                $pDocument = PDocument::where('type', 48)->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['avisDImposition'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['familyRecordBook'])) {
                $pDocument = PDocument::where('type', $data['familyRecordBook']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['familyRecordBook'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['occupants'])) {
                $this->createOccupations($data['occupants'], $dProject);
            }
            // $data['merge_agent'] = $merge_agent;
            // $this->notifyMandataire($dProject, $data);
            $this->createOperationRelatedToSpecificCompany($dProject, $data);
            $this->initializeFirstStep($dProject);
            if ($user) {
                if (isset($data['installer']) && $user->profile == DCompanyProfile::MAR->value) {
                    $this->notifyInstaller($dProject, $data['installer']);
                }
            }
            // else {
            //     $company = DCompany::where('linkToken', $dProject->token)->first();
            //     if (isset($data['installer']) && $company->profile == DCompanyProfile::MAR->value) {
            //         $this->notifyInstaller($dProject, $data['installer']);
            //     }
            // }

            DB::commit();

            return $dProject;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }
    public function attachDocuments(array $data)
    {
        try {
            DB::beginTransaction();
            $dProject = DProject::where('id', $data["id"])->first();
            $company = DCompany::where('id', $dProject->d_company_id)->first();

            if (isset($data['documents'])) {
                foreach ($data['documents'] as $document) {
                    $this->addDocumentsToProject($dProject, $document);
                }
            }

            $dDocumentService = (new DDocumentService());

            if (isset($data['identityDocument'])) {
                $fileType = $data['identityDocument']['p_document_type'] ? $data['identityDocument']['p_document_type'] : 29;
                $pDocument = PDocument::where('type', $fileType)->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['identityDocument'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile
                );
            }

            if (isset($data['propertyOwnershipProof'])) {
                $fileType = $data['propertyOwnershipProof']['p_document_type'] ? $data['propertyOwnershipProof']['p_document_type'] : 30;
                $pDocument = PDocument::where('type', $fileType)->first();

                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['propertyOwnershipProof'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile

                );
            }

            if (isset($data['latestTaxReturn'])) {
                $fileType = $data['latestTaxReturn']['p_document_type'] ? $data['latestTaxReturn']['p_document_type'] : 0;
                $pDocument = PDocument::where('type', $fileType)->first();

                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['latestTaxReturn'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile

                );
            }

            if (isset($data['bankAccountDetails'])) {
                $fileType = $data['bankAccountDetails']['p_document_type'] ? $data['bankAccountDetails']['p_document_type'] : 32;
                $pDocument = PDocument::where('type', $fileType)->first();

                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['bankAccountDetails'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile

                );
            }

            if (isset($data['consumptionBills'])) {
                $fileType = $data['consumptionBills']['p_document_type'] ? $data['consumptionBills']['p_document_type'] : 34;

                $pDocument = PDocument::where('type', $fileType)->first();

                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['consumptionBills'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile

                );
            }

            if (isset($data['avisDImposition'])) {
                $pDocument = PDocument::where('type', 48)->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['avisDImposition'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile

                );
            }

            if (isset($data['familyRecordBook'])) {
                $fileType = $data['familyRecordBook']['p_document_type'] ? $data['familyRecordBook']['p_document_type'] : 38;

                $pDocument = PDocument::where('type', $fileType)->first();

                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['familyRecordBook'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false,
                    parentProfile: $company->profile
                );
            }

            if (isset($data['occupants'])) {
                $this->createOccupations($data['occupants'], $dProject);
            }

            DB::commit();

            return $dProject;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }
    public function checkMaxProjects()
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::INS->value) {
            $company = $user->company;
            $maxProjectsPerMonth = $company->max_projects_per_month;
            $projects = $company->projects()->whereHas('operations', function ($query) use ($company) {
                return $query->where('d_company_id', $company->id);
            })->where(
                    'created_at',
                    '>=',
                    Carbon::now()->startOfMonth()
                )->where('created_at', '<=', Carbon::now()->endOfMonth())->count();
            if ($projects >= $maxProjectsPerMonth) {
                throw new CustomException('Vous avez atteint le nombre maximum de projets par mois');
            }
        }
    }

    public function checkCompanyMaxProjects($company)
    {
        if ($company->profile == DCompanyProfile::INS->value) {

            $maxProjectsPerMonth = $company->max_projects_per_month;
            $projects = $company->projects()->whereHas('operations', function ($query) use ($company) {
                return $query->where('d_company_id', $company->id);
            })->where(
                    'created_at',
                    '>=',
                    Carbon::now()->startOfMonth()
                )->where('created_at', '<=', Carbon::now()->endOfMonth())->count();
            if ($projects >= $maxProjectsPerMonth) {
                throw new CustomException('Vous avez atteint le nombre maximum de projets par mois');
            }
        }
    }
    public function notifyMandataire($dProject, $data)
    {
        try {
            if ($data['merge_agent'] == 1) {
                $dCompany = DCompany::find($data['agent']);
            } else {
                $dCompany = DCompany::find($data['agent_admin'] ?? $data['agent_fin']);
            }

            $message = __(
                'notifications.project.affectation',
                [
                    'username' => auth()->user()->company?->trade_name,
                    'reference' => $dProject->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            // sendNotificationMandataire(
            //     'Ajouter un nouveau dossier par le MAR et selection Mandataire',
            //     $message,
            //     $dCompany,
            //     $configUrl,
            // );
        } catch (\Exception $e) {
        }
    }

    public function notifyInstaller($dProject, $installer)
    {
        $dCompany = DCompany::find($installer);
        $adminIns = $dCompany->admins;
        // $dMailingService = new DMailingService();
        // if ($dMailingService->canMail(["reference" => P_mailing_references::Ajouter_dossier->value], $dCompany)) {
        //     try {
        //         $message = __(
        //             'notifications.project.affectation',
        //             [
        //                 'username' => auth()->user()->company?->trade_name,
        //                 'reference' => $dProject->reference,
        //             ]
        //         );
        //         $configUrl = str_replace(
        //             ':id',
        //             $dProject->id,
        //             config('custom_routes.projects.create')
        //         );
        //         notifyUsers(
        //             'Ajouter un nouveau dossier par le MAR et selection Installateur',
        //             $message,
        //             $adminIns,
        //             $configUrl,
        //             true
        //         );
        //     } catch (\Exception $e) {
        //     }
        // }
        // if ($dMailingService->canNotify(["reference" => P_mailing_references::Ajouter_dossier->value], $dCompany)) {
        //     try {
        //         $message = __(
        //             'notifications.project.affectation',
        //             [
        //                 'username' => auth()->user()->company?->trade_name,
        //                 'reference' => $dProject->reference,
        //             ]
        //         );
        //         $configUrl = str_replace(
        //             ':id',
        //             $dProject->id,
        //             config('custom_routes.projects.create')
        //         );
        //         sendNotificationUser(
        //             'Ajouter un nouveau dossier par le MAR et selection Installateur',
        //             $message,
        //             $configUrl,
        //             null,
        //             $adminIns,
        //             $dCompany->representative_first_name . ' ' . $dCompany->representative_last_name ?? null
        //         );
        //     } catch (\Exception $e) {
        //     }
        // }
        try {
            $message = __(
                'notifications.project.affectation',
                [
                    'username' => auth()->user()->company?->trade_name,
                    'reference' => $dProject->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            // sendNotificationUser(
            //     'Ajouter un nouveau dossier par le MAR et selection Installateur',
            //     $message,
            //     $configUrl,
            //     null,
            //     $adminIns,
            //     $dCompany->representative_first_name . ' ' . $dCompany->representative_last_name ?? null
            // );
        } catch (\Exception $e) {
        }
    }

    public function updateQuotationWorkA(array $data, DProject $dProject)
    {
        try {
            $parents = $data['parents'];

            DB::beginTransaction();
            $installer = DCompany::findOrFail($data['installer']);
            if ($installer) {
                $this->createInstallerOperation($dProject, $data['installer']);
            }
            $invoiceHeaderData = $this->invoiceHeaderPlaceHolder($data, $dProject);
            $invoiceHeader = $this->createOrUpdateInvoiceHeader($dProject, $invoiceHeaderData, $installer);

            // $this->addProjectWork($data, $dProject);
            $this->saveInvoiceLines($invoiceHeader, $parents);

            $invoiceHeader->update($data + ['d_company_id' => $installer->id]);
            if (isset($data['class_skip_number'])) {
                $dProject->update(['class_skip_number' => $data['class_skip_number']]);
            }
            if (isset($data['scenario'])) {
                $dProject->update(['scenario' => $data['scenario']]);
            }
            $this->notifyInvoice($dProject, $installer);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th->getMessage());
        }

        return $invoiceHeader;
    }

    public function addProjectWork($data, $dProject)
    {
        foreach ($data['parents'] as $key => $parent) {
            if (isset($parent['d_work_id'])) {
                DProjectWork::updateOrCreate(
                    [
                        'd_project_id' => $dProject->id,
                        'd_work_id' => $parent['d_work_id'],
                    ],
                    [
                        'installer' => $data['installer'],
                        'qty' => $parent['qty'],
                        'cost_invoice_ht' => $parent['amount_HT'],
                        'cost_invoice_ttc' => $parent['amount_TTC'],
                        'unit' => $parent['unit'],
                    ]
                );
            }
            if (isset($parent['d_article_id'])) {
                DProjectWork::updateOrCreate(
                    [
                        'd_project_id' => $dProject->id,
                        'd_service_id' => $parent['d_article_id'],
                    ],
                    [
                        'installer' => $data['installer'],
                        'qty' => $parent['qty'],
                        'cost_invoice_ht' => $parent['amount_HT'],
                        'cost_invoice_ttc' => $parent['amount_TTC'],
                        'unit' => $parent['unit'],
                    ]
                );
            }
            if (isset($parent['children'])) {
                foreach ($parent['children'] as $key => $child) {
                    if (isset($child['d_work_id'])) {
                        DProjectWork::updateOrCreate(
                            [
                                'd_project_id' => $dProject->id,
                                'd_work_id' => $child['d_work_id'],
                            ],
                            [
                                'installer' => $data['installer'],
                                'qty' => $child['qty'],
                                'cost_invoice_ht' => $child['amount_HT'],
                                'cost_invoice_ttc' => $child['amount_TTC'],
                            ]
                        );
                    } elseif (isset($child['d_article_id'])) {
                        DProjectWork::updateOrCreate(
                            [
                                'd_project_id' => $dProject->id,
                                'd_service_id' => $child['d_article_id'],
                            ],
                            [
                                'installer' => $data['installer'],
                                'qty' => $child['qty'],
                                'cost_invoice_ht' => $child['amount_HT'],
                                'cost_invoice_ttc' => $child['amount_TTC'],
                            ]
                        );
                    }
                }
            }
        }
    }

    public function saveInvoiceLines($invoiceHeader, $parents)
    {
        foreach ($parents as $line) {
            $data = $this->linesData($invoiceHeader, $line);

            $invoiceLine = $invoiceHeader->lines()->create($data);
            if (isset($line['children'])) {
                foreach ($line['children'] as $key => $child) {
                    $child['parent_id'] = $invoiceLine->id;
                    $data = $this->linesData($invoiceHeader, $child);
                    $invoiceHeader->lines()->create($data);
                }
            }
        }
    }

    public function linesData($invoiceHeader, $data)
    {
        return [
            'd_project_invoice_header_id' => $invoiceHeader->id,
            'd_work_id' => $data['d_work_id'] ?? null,
            'd_article_id' => $data['d_article_id'] ?? null,
            'parent_id' => $data['parent_id'] ?? null,
            'designation' => $data['designation'],
            'unit_price_TTC' => $data['unit_price_TTC'],
            'unit_price_HT' => $data['unit_price_HT'],
            'tva' => $data['tva'],
            'unit' => $data['unit'],
            'type' => isset($data['type']) ? $data['type'] : null,
            'amount_TTC' => $data['amount_TTC'],
            'amount_TVA' => $data['amount_TVA'],
            'amount_HT' => $data['amount_HT'],
            'qty' => $data['qty'],
            'description' => $data['description'] ?? null,
            'sub_contractor_entitled' => $data['sub_contractor_entitled'] ?? '',
            'sub_contractor_siret' => $data['sub_contractor_siret'] ?? '',
            'article_ids' => $data['article_ids'] ?? null,
            'product_ids' => $data['product_ids'] ?? null,
            'description_v2' => $data['description_v2'] ?? null,
            'd_sub_contractor_id' => $data['d_sub_contractor_id'] ?? null,
        ];
    }

    public function invoiceHeaderPlaceHolder($data, $dProject)
    {
        return [
            'HT_total' => $data['HT_total'] ?? 0,
            'TVA_total' => $data['TVA_total'] ?? 0,
            'TTC_total' => $data['TTC_total'] ?? 0,
            'plafond_prime' => $data['plafond_prime'] ?? 0,
            'prime_bonification' => $data['prime_bonification'] ?? 0,
            'prime_renov' => $data['prime_renov'] ?? 0,
            'prime_renov_bonification' => $data['prime_renov_bonification'] ?? 0,
            'HT_rest' => $data['rac'] ?? 0,
            'invoice_date' => $data['invoice_date'] ?? now(),
        ];
    }

    public function updateGeneralInformation($data, $dProject)
    {
        try {
            $dProject->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function separationPrestationsAndWorks($works)
    {
        $worksData = [];
        $prestationsData = [];
        foreach ($works as $work) {
            if (isset($work['d_work_id'])) {
                $worksData[] = $work;
            } else {
                $prestationsData[] = $work;
            }
        }

        return [
            $worksData,
            $prestationsData,
        ];
    }

    public function checkPresOrWork($attribute, $works, $work)
    {
        $attributeId = $work[$attribute] ?? null;

        return $works->where(
            $attribute,
            $attributeId
        )->first();
    }

    public function createInstallerOperation($dProject, $installer)
    {
        $op = $dProject->operations->where(
            'type',
            POperationType::TRV->value
        )->first();

        if (!$op) {
            $operation = [
                'd_company_id' => $installer,
                'p_operation_id' => POperation::work()->value('id'),
            ];
            $dProject->operations()->create($operation);
        } else {
            $op->update(['d_company_id' => $installer]);
        }
    }

    public function updateCerfa($dProject, $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['occupants'])) {
                $this->createOccupations($data['occupants'], $dProject);
            }
            $data['common'] = $data['city'];
            $dProject->update($data);

            $this->setGeneratedDocument(
                $dProject,
                $this->pDocumentService->getByType(15)
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function createOperationRelatedToSpecificCompany($dProject, $data)
    {
        $user = auth()->user();
        $operationData = [];
        $profile = "";
        if ($user) {
            $profile = $user->profile;
        } else {

            // $company = DCompany::where('linkToken', $dProject->company])->first();
            $company = $dProject->company;
            $profile = $company->profile;
        }
        switch ($profile) {
            case DCompanyProfile::MAR->value:
                if (isset($data['installer'])) {
                    $operationData[] = [
                        'd_company_id' => $data['installer'],
                        'p_operation_id' => POperation::work()->value('id'),
                    ];
                    $operationData[] = [
                        'd_company_id' => $user ? $user->userable_id : $company->id,
                        'p_operation_id' => POperation::manFin()->value('id'),
                    ];
                    $operationData[] = [
                        'd_company_id' => $user ? $user->userable_id : $company->id,
                        'p_operation_id' => POperation::man()->value('id'),
                    ];
                    $operationData[] = [
                        'd_company_id' => $user ? $user->userable_id : $company->id,
                        'p_operation_id' => POperation::audit()->value('id'),
                    ];
                }
                $operationData[] = [
                    'd_company_id' => $user ? $user->userable_id : $company->id,
                    'p_operation_id' => POperation::mar()->value('id'),
                ];

                break;
            case DCompanyProfile::INS->value:
                $operationData[] = [
                    'd_company_id' => $user ? $user->company->parentCompany->id : $company->parent_company_id,
                    'p_operation_id' => POperation::mar()->value('id'),
                ];
                $operationData[] = [
                    'd_company_id' => $user ? $user->company->parentCompany->id : $company->parent_company_id,
                    'p_operation_id' => POperation::audit()->value('id'),
                ];
                $operationData[] = [
                    'd_company_id' => $user ? $user->userable_id : $company->id,
                    'p_operation_id' => POperation::work()->value('id'),
                ];
                $operationData[] = [
                    'd_company_id' => $user ? $user->userable_id : $company->id,
                    'p_operation_id' => POperation::manFin()->value('id'),
                ];
                $operationData[] = [
                    'd_company_id' => $user ? $user->userable_id : $company->id,
                    'p_operation_id' => POperation::man()->value('id'),
                ];
                break;
            default:
                [];
                break;
        }

        if ($data['parinage'] && $profile == DCompanyProfile::MAR->value) {
            $operationData[] = [
                'd_company_id' => $data['installer'],
                'p_operation_id' => POperation::manFin()->value('id'),
            ];
            $operationData[] = [
                'd_company_id' => $data['installer'],
                'p_operation_id' => POperation::man()->value('id'),
            ];
        }

        $dProject->operations()->createMany($operationData);
    }

    public function initializeFirstStep($dProject)
    {
        $stepFactory = new StepsFactory($dProject);
        $stepFactory->init();
    }

    public function addProjectWorks($data, $dProject, $workService, $tva)
    {
        $projectWork = $workService->create(
            $data +
            [
                'd_project_id' => $dProject->id,
                'd_company_id' => $data['installer'] ?? $data['auditor'] ?? null,
                'tva' => $tva,
            ]
        );
        $message = __(
            __('logs.project.add_work.description'),
            [
                'work' => $projectWork->article?->reference,
                'admin' => auth()->user()->username,
            ]
        );
        setLog($message . $dProject->reference);

        setProjectHistory(
            $dProject,
            __('logs.project.add_work.action'),
            $message
        );

        return $projectWork;
    }

    public function addDocumentsToProject($project, $document)
    {
        (new DDocumentService())->attachDocuments($project, $document, 'd_project_id');
    }

    public function edit(array $data, DProject $dProject)
    {
        try {
            DB::beginTransaction();
            $dProject->update($data);

            $dDocumentService = (new DDocumentService());

            if (isset($data['identityDocument'])) {
                $pDocument = PDocument::where('type', $data['identityDocument']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['identityDocument'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['propertyOwnershipProof'])) {
                $pDocument = PDocument::where('type', $data['propertyOwnershipProof']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['propertyOwnershipProof'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['latestTaxReturn'])) {
                $pDocument = PDocument::where('type', $data['latestTaxReturn']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['latestTaxReturn'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['bankAccountDetails'])) {
                $pDocument = PDocument::where('type', $data['bankAccountDetails']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['bankAccountDetails'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['consumptionBills'])) {
                $pDocument = PDocument::where('type', $data['consumptionBills']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['consumptionBills'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['avisDImposition'])) {
                $pDocument = PDocument::where('type', 48)->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['avisDImposition'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }

            if (isset($data['familyRecordBook'])) {
                $pDocument = PDocument::where('type', $data['familyRecordBook']['p_document_type'])->first();
                $this->checkDocumentBeforeCreate($dProject, $pDocument, 0);
                $dDocumentService->attachDocuments(
                    $dProject,
                    $data['familyRecordBook'] + ['type_doc' => $pDocument?->type],
                    'd_project_id',
                    $pDocument,
                    false
                );
            }


            if (isset($data['occupants'])) {
                $this->createOccupations($data['occupants'], $dProject);
            }
            $dProject["installer"]=$data["installer"];
            $dProject->save();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function acceptProject(DProject $dProject)
    {
        try {
            DB::beginTransaction();
            $dProject["project_type"] = 1;
            $dProject->update();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }
    public function refuseProject(DProject $dProject)
    {
        try {
            DB::beginTransaction();
            $dProjectRefused = new DProjectRefused($dProject->toArray());
            $dProjectRefused->save();
            $dProject->forceDelete();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }
    public function delete(DProject $dProject): void
    {
        try {
            $operations = $dProject->operations;
            foreach ($operations as $operation) {
                $operation->delete();
            }
            $dProject->deleted_by = auth()->user()->id;
            $dProject->save();
            $dProject->delete();
        } catch (\Throwable $th) {
            throw new CustomException($th->getMessage());
        }
    }

    public function getById(int $id)
    {
        return $this->dProject::with([
            'operations',
            'events',
            'documents',
            'company',
            'client',
            'step',
            'occupants',
            'visits',
            'eSignature'
        ])->find($id);
    }

    // public function getAll($filters)
    // {
    //     return collection(
    //         $this->dProject::byUser(auth()->user()->company),
    //         $filters,
    //         [
    //             'operations',
    //             'company',
    //             'client',
    //             'step',
    //             'typeDemandeProject',
    //             'visits',
    //         ]
    //     );
    // }
    public function getAll(array $filters)
    {

        if (isset($filters['project_type'])) {
            $company = auth()->user()->company;
            // $dProjects = DProject::where('d_company_id', $company->id)->where('project_type', $filters['project_type'])->get();
            return collection(
                $this->dProject::byUser(auth()->user()->company)->where('project_type', $filters['project_type']),
                $filters,
                [
                    'operations',
                    'company',
                    'client',
                    'step',
                    'typeDemandeProject',
                    'visits',
                ]
            );
            ;
        }

        return collection(
            $this->dProject::byUser(auth()->user()->company),
            $filters,
            [
                'operations',
                'company',
                'client',
                'step',
                'typeDemandeProject',
                'visits',
            ]
        );
    }

    public function getAllInvoices($filters)
    {
        return collection(
            $this->dProject::byUser(auth()->user()->company),
            $filters,
            [
                'invoices',
                'client',
            ],
        );
    }

    public function getLinesToExport($filters)
    {
        return collection(
            $this->dProject::byUser(auth()->user()->company),
            $filters,
        )->map(function ($item) {
            return $this->getColumnsData($item);
        });
    }

    public function relationsWith()
    {
        return [
            'company' => function ($query) {
                $this->onlyCertainColumnsFromRelation($query, ['id', 'trade_name']);
            },
            'client' => function ($query) {
                $this->onlyCertainColumnsFromRelation($query, [
                    'id',
                    'first_name',
                    'last_name',
                    'phone_number_1',
                    'address',
                ]);
            },
            'step' => function ($query) {
                $this->onlyCertainColumnsFromRelation($query, ['order']);
            },
        ];
    }

    public function onlyCertainColumnsFromRelation($query, $array = ['id'])
    {
        return $query->select($array);
    }

    public function getColumnsData($item)
    {
        return [
            $item['step']->order,
            $item['reference'],
            $item['created_at']->format('d-m-Y'),
            $item['client']->first_name . ' ' . $item['client']->last_name,
            $item['company']->trade_name,
            $item['client']->phone_number_1,
        ];
    }

    public function columnsToExport()
    {
        return [
            'Étape',
            'Référence du dossier',
            'Date du dossier',
            'Intitulé Client',
            'Société',
            'Adresse Client',
            'Numéro de télephone Client',
        ];
    }

    public function export($filters)
    {
        $lines = $this->getLinesToExport(
            $filters
        );
        $columns = $this->columnsToExport();

        return (new ExportService())->export($lines, $columns, 'projets', 'Liste des projets');
    }

    public function generateProjectDocument(
        DProject $dProject,
        DProjectDocument $documentProject,
        PDocument $pDocument
    ) {
        $reference = $pDocument->reference;

        if (!$reference) {
            $placeholderData = [];
        } else {
            if ($reference == 'BonDeTravailData') {
                $placeholderData = $this->$reference($dProject, $documentProject);
            } else {
                $placeholderData = $this->$reference($dProject);
            }
        }

        $generateDocumentService = new GenerateDocumentService();
        $generateDocumentService->setPlaceHolderData($placeholderData);

        return $generateDocumentService->generateDocument($pDocument, $dProject, $documentProject);
    }

    public function generateProjectWorkDocument(
        DProject $dProject,
        DProjectDocument $documentProject,
        PDocument $pDocument,
        $installer,
        $invoice
    ) {
        $reference = $pDocument->reference;

        if (!$reference) {
            $placeholderData = [];
        } else {
            $placeholderData = $this->$reference($dProject);
        }

        $generateDocumentService = new GenerateDocumentService();
        $generateDocumentService->setPlaceHolderData($placeholderData);

        return $generateDocumentService->generateWorkDocument($pDocument, $dProject, $documentProject, $installer, $invoice);
    }

    public function generateGlobalProjectWorkDocument(
        DProject $dProject
    ) {
        $pDocument = PDocument::where('type', 50)->first();
        $reference = $pDocument->reference;

        // if (!$reference) {
        //     $placeholderData = [];
        // } else {
        //     $placeholderData = $this->$reference($dProject);
        // }

        $generateDocumentService = new GenerateDocumentService();
        // $generateDocumentService->setPlaceHolderData($placeholderData);

        return $generateDocumentService->generateGlobalWorkDocument($pDocument, $dProject);
    }

    public function isContractReferenceTaken($reference)
    {
        return DProject::where('contractReference', $reference)->exists();
    }

    public function setGeneratedDocument($dProject, $pDocument, $documentProject = null)
    {
        if (!$documentProject) {
            $documentProject = $dProject->documents->where(
                'type_doc',
                $pDocument->type
            )->whereNotNull('type_doc')->first();
        }

        if (!$documentProject) {
            throw new CustomException('Vous ne pouvez pas créer ce document dans cette étape.');
        }
        if ($pDocument->reference == 'devisInstallateur') {
            $validatedDevis = $dProject->invoices->where('type', PTypeInvoiceEnum::WORK->value)
                ->where('status', DProjectInvoiceHeaderStatusEnum::VALIDATED->value);

            if ($validatedDevis->isEmpty()) {
                throw new CustomException('Aucun devis validé trouvé.');
            }

            foreach ($validatedDevis as $devis) {
                $this->generateWorkForDevis($devis);
            }
        }
        if ($pDocument->reference == 'ContractMarData') {
            if (!$dProject->contractReference) {
                do {
                    $newReference = getNextContractReference('contract');
                } while ($this->isContractReferenceTaken($newReference));

                $dProject->contractReference = $newReference;
                $dProject->save();
            }
        }
        $finalPath = $this->generateProjectDocument(
            $dProject,
            $documentProject,
            $pDocument
        );
        // try {
        //     $message = __(
        //         'notifications.project.generate_document',
        //         [
        //             'document' => $pDocument->entitled,
        //             'reference' => $dProject->reference,
        //         ]
        //     );
        //     sendNotificationCompany(
        //         $pDocument->entitled,
        //         $message,
        //         null,
        //         $dProject->company,
        //         null,
        //     );
        // } catch (\Throwable $th) {
        // }
        // try {
        //     if ($pDocument->reference == 'ContractMarData') {
        //         $message = __(
        //             'notifications.project.contrat_mar',
        //         );
        //         sendNotificationUser(
        //             'Contrat MAR',
        //             $message,
        //             null,
        //             null,
        //             [$dProject->creator]
        //         );
        //     }
        // } catch (\Throwable $th) {
        // }
        // try {
        //     if ($pDocument->reference == 'BonDeTravailData') {
        //         $message = __(
        //             'notifications.project.bon_de_travail',
        //         );
        //         sendNotificationUser(
        //             'Bon De Travail',
        //             $message,
        //             null,
        //             null,
        //             $dProject->installer->company->admins
        //         );
        //     }
        // } catch (\Throwable $th) {
        // }

        $message = __(
            'logs.project.generate_document.description',
            [
                'document' => $pDocument->entitled,
                'admin' => auth()->user()->username ?? "test",
            ]
        );

        setProjectHistory(
            $dProject,
            __(
                'logs.project.generate_document.action',
                [
                    'document' => $pDocument->entitled,
                    'admin' => auth()->user()->username ?? "test",
                ]
            ),
            $message
        );

        setLog($message . $dProject->reference);
        $count = $documentProject->version_count + 1;
        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                        'name' => $documentProject->name,
                        'path' => $finalPath,
                        'document_id' => $documentProject->id,
                        'default' => $count == 1 ? 1 : 0,
                        'version' => 'Version ' . $count,
                    ]);
            $status = $pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value :
                DProjectDocumentStatus::SATISFIED->value;
            if ($pDocument->type == PDocumentType::DEMANDE_DAIDE->value && $dProject->mandataire_company->signature) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            if ($pDocument->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $count,
                'status' => $status,
            ]);
        }
    }
    private function generateWorkForDevis($devis)
    {

        $work = new DWork();
        $work->invoice_id = $devis->id;
        $work->save();
    }
    public function attachAnyDocuments($dProject, $data)
    {
        $docService = new DDocumentService();
        foreach ($data['documents'] as $document) {
            $docService->attachDocuments(
                $dProject,
                $document,
                'd_project_id',
            );
        }
    }

    public function setDocumentGenerated($documentProject, $pDocument)
    {
        $status = $pDocument->signature ?
            DProjectDocumentStatus::HAS_SOMETHING->value : DProjectDocumentStatus::SATISFIED->value;
        $documentProject->update([
            'status' => $status,
        ]);
    }

    public function createOccupations($occupants, $dProject)
    {
        $dProject->occupants()->delete();

        $serviceOccupant = new DProjectOccupantsService(new DProjectOccupants());
        foreach ($occupants as $occupant) {
            $data = [
                'd_project_id' => $dProject->id,
                'civility' => $occupant['civility'],
                'first_name' => $occupant['first_name'],
                'last_name' => $occupant['last_name'],
                'year_of_birth' => $occupant['year_of_birth'],
            ];
            $serviceOccupant->create($data);
        }
    }

    public function setDecision(
        $dProject,
        $decisionReference,
        $decisionMade,
    ) {
        $qualificationDecision = $dProject->decisions()
            ->where('condition', $decisionReference)
            ->first();

        if ($qualificationDecision) {
            if ($qualificationDecision->decision == $decisionMade) {
                throw new CustomException('La décision est déjà mise à jour.');
            }

            $qualificationDecision->update(['decision' => $decisionMade]);

            if (
                $decisionMade == DProjectDecisionEnum::NOT_ACCEPTED->value
            ) {
                $dProject->update(['process_ended' => 1, 'state' => DProjectState::SUSPENDED->value]);
            }
        } else {
            throw new ModelNotFoundException('Aucune décision trouvée.');
        }
    }

    public function getProjectSteps(DProject $dProject)
    {
        return PStep::where(
            'process_type',
            $dProject->process
        )->where('display', true)
            ->select('id', 'display_name', 'reference', 'order')
            ->orderBy('order')
            ->get();
    }

    public function saveSimulation(DProject $dProject, $data)
    {
        $operationTrv = $this->setWorksWithScenario($data, $dProject);
        $this->generateSimulation(
            $dProject,
        );
        $user = auth()->user();

        // $this->sendNotificationUserForSimulation($user, $operationTrv, $dProject);
    }

    public function sendNotificationUserForSimulation($user, $operationTrv, $dProject)
    {
        if ($user->profile == DCompanyProfile::MAR->value) {
            if ($operationTrv) {
                $company = $operationTrv->company;
            } else {
                $company = null;
            }
        } else {
            $company = $dProject->company;
        }
        [$message, $description] = $this->setLogProject(
            $dProject,
            __('logs.step.simulation.action'),
            __('logs.step.simulation.description', ['user' => $user->username])
        );
        if ($company) {
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.update')
            );
            // notifyUsers(
            //     $message,
            //     $description,
            //     [$company],
            //     null,
            //     true
            // );
            // sendNotificationUser(
            //     'Generation d\'un document de simulation',
            //     __('notifications.project.simulation'),
            //     $configUrl,
            //     null,
            //     $company->admins
            // );
        }
    }

    public function setLogProject($dProject, $action, $description)
    {
        $message = __(
            $action
        );

        setProjectHistory(
            $dProject,
            __(
                $message
            ),
            $description
        );

        setLog($message . $this->dProject->reference);

        return [$message, $description];
    }

    public function priceTTC($htPrice, $tva)
    {
        return $htPrice + ($tva * $htPrice);
    }

    public function generateSimulation($project)
    {
        $pDocument = PDocument::where('reference', 'simulationData')->first();
        if ($pDocument) {
            $this->checkDocumentBeforeCreate($project, $pDocument, 1);

            $this->setGeneratedDocument($project, $pDocument);
        }
    }

    public function endProcessFromDecision($dProject)
    {
        $qualificationDecision = $dProject->decisions()
            ->where('order_step', $dProject->current_step_order)
            ->first();

        if ($qualificationDecision) {
            if ($qualificationDecision->decision == DProjectDecisionEnum::NOT_ACCEPTED->value) {
                throw new CustomException('La décision est déjà mise à jour.');
            }

            $qualificationDecision->update(['decision' => DProjectDecisionEnum::NOT_ACCEPTED->value]);

            $dProject->update([
                'process_ended' => 1,
                'state' => DProjectState::SUSPENDED->value,
            ]);
            $installer = $dProject->installer->company;
            // if ($installer->profile == DCompanyProfile::INS->value) {
            //     $message = __('notifications.project.non_eligible', [
            //         'reference' => $dProject->reference,
            //     ]);
            //     $configUrl = str_replace(
            //         ':id',
            //         $dProject->id,
            //         config('custom_routes.projects.create')
            //     );
            //     sendNotificationCompany(
            //         'Projet est éligible',
            //         $message,
            //         $configUrl,
            //         $installer,
            //         $installer->representative_last_name . ' ' . $installer->representative_first_name,
            //     );
            // }
            $message = __("logs.project.$qualificationDecision->condition.description.refused");

            setProjectHistory(
                $dProject,
                __("logs.project.$qualificationDecision->condition.action"),
                $message
            );
            setLog($message . $dProject->reference);

            return true;
        }

        throw new CustomException('Erreur inconnu.');
    }

    public function setInstallerInOperations($dProject, $data)
    {
        $dProject->works->each(function ($work) use ($data) {
            $work->update(['d_company_id' => $data['installer']]);
        });
        if (!count($dProject->operations)) {
            $dProject->operations()->create([
                'd_company_id' => $data['installer'],
                'p_operation_id' => 3,
            ]);
        } else {
            $dProject->operations->each(function ($operation) use ($data) {
                if ($operation->operation->type == POperationType::TRV->value) {
                    $operation->update(['d_company_id' => $data['installer']]);
                }
            });
        }

        $dProject->update($data);
    }

    public function setWorksWithScenario($data, $dProject)
    {
        $installer = $data['installer'] ?? null;
        $auditor = $data['auditor'] ?? null;
        $this->createWorks($data['works'], $dProject, $installer, $auditor);

        $operationTRV = null;
        $typeWork = POperationType::TRV->value;
        $operationWork = POperation::where('type', $typeWork)->first();

        if ($dProject->operations->isEmpty()) {
            $operationTRV = $this->createOperationTRV($dProject, $installer, $operationWork);
        } else {
            $operationTRV = $dProject->operations->first(function ($operation) use ($typeWork) {
                return $operation->operation->type == $typeWork;
            });

            if ($operationTRV) {
                $operationTRV->update(['d_company_id' => $installer]);
                $dProject->works->each(function ($work) use ($installer) {
                    $work->update(['installer' => $installer]);
                });
            } else {
                $operationTRV = $this->createOperationTRV($dProject, $installer, $operationWork);
            }
        }

        if (isset($data['class_skip'])) {
            $skipClass = PClassSkipCount::where('type', $data['class_skip'])->first();
            $classSkipNumber = (int) filter_var($skipClass->entitled, FILTER_SANITIZE_NUMBER_INT);
            $data['class_skip_number'] = $classSkipNumber;
        }
        $dProject->update($data);

        return $operationTRV;
    }

    public function createOperationTRV($dProject, $installer, $operationWork)
    {
        return $dProject->operations()->create([
            'd_company_id' => $installer,
            'p_operation_id' => $operationWork->id,
            'd_project_id' => $dProject->id,
        ]);
    }

    public function createProjectWorkInQuotation($work, $dProject)
    {
        $workService = new DProjectWorkService();
        $tva = $dProject->company->tva ?? 0.19;
        $work['qty'] = 1;

        return $this->addProjectWorks($work, $dProject, $workService, $tva);
    }

    public function createWorks($works, $dProject, $installer = null, $auditor = null)
    {
        $workService = new DProjectWorkService();
        $dProject->works()->delete();
        $tva = $dProject->company->tva ?? 0.19;
        foreach ($works as $work) {
            $work['installer'] = $installer;
            $work['auditor'] = $auditor;
            $this->addProjectWorks($work, $dProject, $workService, $tva);
        }
    }

    //  fi intidhar table user el wa7ed li chyo93ed chnowa
    public function getProjectInstallers($dProject)
    {
        if ($dProject->is_third_party) {
            return User::findOrFail($dProject->creator_id);   // User?!
        }
    }

    public function selectInstaller($dProject, $installer)
    {
        $dProject->thirdParties()->sync($installer);
    }

    public function addProjectWorkArticles($dProject, $dataArray)
    {
        $dataToInsert = [];
        foreach ($dataArray as $data) {
            $dProjectWorkId = $data['d_project_work_id'];
            $dThirdPartyArticleId = $data['d_third_party_article_id'];
            $dataToInsert[] = [
                'd_project_id' => $dProject->id,
                'd_project_work_id' => $dProjectWorkId,
                'd_third_party_article_id' => $dThirdPartyArticleId,
            ];
        }
        DProjectWorkArticle::insert($dataToInsert);
    }

    public function addProjectEvent($dProject, $data)
    {
        $type = $data['type'];
        if ($type == PTypeEventEnum::REAL_TRV->value) {
            $exist = $dProject->events->where('type', $type)->count();
            if ($exist) {
                throw new CustomException('Ce type existe déjà.');
            }
        }
        $serviceEvent = new DProjectEventService();
        $data['d_project_id'] = $dProject->id;
        $data['d_company_id'] = $dProject->installer?->company->id;
        $data['end_date'] = $data['start_date'];
        $serviceEvent->create($data);
    }

    public function updateInvoice($dProject, $dInvoiceHeader, $data)
    {
        $user = auth()->user();
        if (!$dInvoiceHeader->exists) {
            $dataInvoice = $this->setInvoiceHeaderData($data, $user, $dInvoiceHeader, $dProject);
            $dInvoiceHeader->fill($dataInvoice)->save();
        } else {
            if ($data['type'] == DInvoiceHeaderType::MAR->value) {
                $this->checkDocumentIfSigned($dProject);
            }
            $dataInvoice = $this->setInvoiceHeaderData($data, $user, $dInvoiceHeader, $dProject);
            $dInvoiceHeader->update(array_merge($dataInvoice));
        }
        if ($dInvoiceHeader->type == DInvoiceHeaderType::MAR->value) {
            $data['tva'] = $dProject->company->tva ?? 0.19;
            $dInvoiceHeader->lines()->delete();
        }
        foreach ($data['lines'] as $key => $line) {
            DProjectInvoiceLine::create($line +
                ['d_project_invoice_header_id' => $dInvoiceHeader->id]);
        }
        if ($dInvoiceHeader->type == DInvoiceHeaderType::MAR->value) {
            $this->generateDevis($dProject, PDocumentType::OFFRE_DE_DEVIS->value);
            $this->generateDevis($dProject, PDocumentType::CONTRAT->value);
        }
    }

    public function notifyInvoice($dProject, $company)
    {
        try {
            $parentId = DCompanyChild::where('d_company_child_id', $company->id)->value('d_company_id');
            $parentCompany = DCompany::find($parentId);

            $message = __(
                'notifications.project.invoice.ins_create',
                [
                    'username' => auth()->user()->company?->trade_name,
                    'reference' => $dProject->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            sendNotificationUser(
                'Generation du devis entreprise retenue',
                $message,
                $configUrl,
                null,
                $parentCompany->admins
            );
        } catch (\Exception $e) {
        }
    }

    public function checkLines($invoice)
    {
        // $invoice->lines->each(function ($line) {
        //     if (!$line->parent_id) {
        //         if (!$line->d_article_id || !$line->d_work_id) {
        //             throw new CustomException('Le devis est incomplet');
        //         }
        //     } elseif (!$line->d_article_id && !$line->d_work_id) {
        //         throw new CustomException('Le devis est incomplet');
        //     }
        // });
    }

    public function validationInvoiceInstaller($dProject, $data)
    {
        $invoice = $dProject->invoices->where(
            'id',
            $data['d_project_invoice_header_id']
        )->first();
        if (!$invoice || !$invoice->lines->count()) {
            throw new CustomException('Aucun facture trouvé.');
        }
        $this->checkLines($invoice);
        if ($data['state'] == DInvoiceState::INVOICE->value) {
            if ($invoice->state == DInvoiceState::INVOICE->value) {
                throw new CustomException('La facture est déjà validée.');
            }
            // $data['reference'] = getNextInvoice(
            //     $dProject->d_company_id,
            //     DInvoiceType::INVOICE->value
            // );
            $dProject->update([
                'invoice_installer' => DProjectInvoiceEnum::VALIDATED->value,
            ]);
            $data['status'] = DProjectInvoiceHeaderStatusEnum::VALIDATED->value;
            $data['validator'] = auth()->user()->id;
            try {
                $this->sendInsNotif($dProject, 'validation');
            } catch (\Exception $e) {
            }
        } elseif ($data['state'] == DInvoiceState::CANCELED_INVOICE->value) {
            $data['reference'] = getNextInvoice(
                $dProject->d_company_id,
                DInvoiceType::CANCELED_INVOICE->value
            );
            $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
            $dProject->update([
                'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
            ]);
            try {
                $this->sendInsNotif($dProject, 'annulation');
            } catch (\Exception $e) {
            }
        } elseif ($data['state'] == DInvoiceState::PRE_INVOICE->value) {
            $devisInstaller = $dProject->documents->where('type_doc', 16)->first();
            if ($devisInstaller) {
                $devisInstaller->update([
                    'status' => DProjectDocumentStatus::NEW ->value,
                ]);
            }
            $dProject->update([
                'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
            ]);

            $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        }

        $invoice->update($data);
    }

    public function validationWorkInvoiceInstaller($invoice)
    {
        if (!$invoice || !$invoice->lines->count()) {
            throw new CustomException('Aucun facture trouvé.');
        }

        $installer = DCompany::where('id', $invoice->d_company_id)->first();
        $documentProject = DProjectDocument::where(
            'type_doc',
            16
        )->where('d_project_id', $invoice->d_project_id)->where('d_company_id', $installer->id)->first();
        $this->checkLines($invoice);
        // if ($data['state'] == DInvoiceState::INVOICE->value) {
        //     if ($invoice->state == DInvoiceState::INVOICE->value) {
        //         throw new CustomException('La facture est déjà validée.');
        //     }

        // $dProject->update([
        //     'invoice_installer' => DProjectInvoiceEnum::VALIDATED->value,
        // ]);
        $data['status'] = DProjectInvoiceHeaderStatusEnum::VALIDATED->value;
        $data['state'] = DInvoiceState::INVOICE->value;
        $data['type'] = PTypeInvoiceEnum::WORK->value;
        $data['validator'] = auth()->user()->id;
        // try {
        //     $this->sendInsNotif($dProject, 'validation');
        // } catch (\Exception $e) {
        // }
        // } elseif ($data['state'] == DInvoiceState::CANCELED_INVOICE->value) {
        //     $data['reference'] = getNextInvoice(
        //         $dProject->d_company_id,
        //         DInvoiceType::CANCELED_INVOICE->value
        //     );
        //     $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        //     $dProject->update([
        //         'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
        //     ]);
        //     try {
        //         $this->sendInsNotif($dProject, 'annulation');
        //     } catch (\Exception $e) {
        //     }
        // } elseif ($data['state'] == DInvoiceState::PRE_INVOICE->value) {
        //     $devisInstaller = $dProject->documents->where('type_doc', 16)->first();
        //     if ($devisInstaller) {
        //         $devisInstaller->update([
        //             'status' => DProjectDocumentStatus::NEW->value,
        //         ]);
        //     }
        //     $dProject->update([
        //         'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
        //     ]);

        //     $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        // }

        $invoice->update($data);
        if (!$documentProject) {
            $documentProject = DProjectDocument::create(
                [
                    'd_project_id' => $invoice->d_project_id,
                    'd_company_id' => $installer->id,
                    'type_doc' => 16,
                    'name' => 'Devis Entreprise retenue (' . $installer->trade_name . ')',
                    'order_step' => 8,
                    'exported' => 1,
                    'path' => '',
                    'version_count' => 0,
                ]
            );
        }




        $finalPath = $this->generateProjectWorkDocument(
            $invoice->project,
            $documentProject,
            $documentProject->pDocument,
            $installer,
            $invoice
        );
        $finalRecapPath = $this->generateGlobalProjectWorkDocument($invoice->project);

        $recapDocument = DProjectDocument::where('d_project_id', $invoice->d_project_id)->where('name', 'Recap des traveaux entreprise')->first();
        $recap = DProjectDocument::updateOrCreate(
            [
                'd_project_id' => $invoice->d_project_id,
                'name' => 'Recap des traveaux entreprise',
            ],
            [
                'd_company_id' => $installer->id,
                'type_doc' => 50,
                'order_step' => 8,
                'path' => $finalRecapPath,
                'version_count' => $recapDocument ? $recapDocument->version_count : 0,
            ]
        );
        $oldRecapsVersions = DProjectDocumentVersion::where('document_id', $recap->id);
        $oldRecapsVersions->update(['default' => 0]);
        (new DProjectDocumentVersionService(
            new DProjectDocumentVersion()
        ))->create([
                    'name' => 'Recap des traveaux entreprise',
                    'path' => $finalRecapPath,
                    'document_id' => $recap->id,
                    'default' => 1
                ]);
        $dProject = DProject::where('id', $invoice->d_project_id)->first();
        // $dProjectService = app(DProjectService::class);
        // $dProjectService->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);
        $this->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);
        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                        'name' => $documentProject->name,
                        'path' => $finalPath,
                        'document_id' => $documentProject->id,
                    ]);
            $status = $documentProject->pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value :
                DProjectDocumentStatus::SATISFIED->value;
            if ($documentProject->pDocument->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $documentProject->version_count + 1,
                'status' => $status,
                'state' => DInvoiceState::INVOICE->value,
            ]);

            $mainDocumentProject = DProjectDocument::where(
                [
                    'd_project_id' => $invoice->d_project_id,
                    'd_company_id' => null,
                    'type_doc' => 16,
                ]
            );
            $mainDocumentProject->update([
                'status' => DProjectDocumentStatus::SATISFIED->value,
            ]);
        }
    }

    public function attachInvoiceInstaller($invoice)
    {
        if (!$invoice || !$invoice->lines->count()) {
            throw new CustomException('Aucun facture trouvé.');
        }

        $installer = DCompany::where('id', $invoice->d_company_id)->first();
        $documentProject = DProjectDocument::where(
            'type_doc',
            16
        )->where('d_project_id', $invoice->d_project_id)->where('d_company_id', $installer->id)->first();
        $this->checkLines($invoice);
        // if ($data['state'] == DInvoiceState::INVOICE->value) {
        //     if ($invoice->state == DInvoiceState::INVOICE->value) {
        //         throw new CustomException('La facture est déjà validée.');
        //     }

        // $dProject->update([
        //     'invoice_installer' => DProjectInvoiceEnum::VALIDATED->value,
        // ]);
        $data['status'] = DProjectInvoiceHeaderStatusEnum::VALIDATED->value;
        $data['state'] = DInvoiceState::INVOICE->value;
        $data['type'] = PTypeInvoiceEnum::WORK->value;
        $data['validator'] = auth()->user()->id;
        // try {
        //     $this->sendInsNotif($dProject, 'validation');
        // } catch (\Exception $e) {
        // }
        // } elseif ($data['state'] == DInvoiceState::CANCELED_INVOICE->value) {
        //     $data['reference'] = getNextInvoice(
        //         $dProject->d_company_id,
        //         DInvoiceType::CANCELED_INVOICE->value
        //     );
        //     $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        //     $dProject->update([
        //         'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
        //     ]);
        //     try {
        //         $this->sendInsNotif($dProject, 'annulation');
        //     } catch (\Exception $e) {
        //     }
        // } elseif ($data['state'] == DInvoiceState::PRE_INVOICE->value) {
        //     $devisInstaller = $dProject->documents->where('type_doc', 16)->first();
        //     if ($devisInstaller) {
        //         $devisInstaller->update([
        //             'status' => DProjectDocumentStatus::NEW->value,
        //         ]);
        //     }
        //     $dProject->update([
        //         'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
        //     ]);

        //     $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        // }

        $invoice->update($data);
        if (!$documentProject) {
            $documentProject = DProjectDocument::create(
                [
                    'd_project_id' => $invoice->d_project_id,
                    'd_company_id' => $installer->id,
                    'type_doc' => 16,
                    'name' => 'Devis Entreprise retenue (' . $installer->trade_name . ')',
                    'order_step' => 8,
                    'path' => '',
                    'version_count' => 0,
                ]
            );
        }




        $finalPath = $this->generateProjectWorkDocument(
            $invoice->project,
            $documentProject,
            $documentProject->pDocument,
            $installer,
            $invoice
        );
        $finalRecapPath = $this->generateGlobalProjectWorkDocument($invoice->project);

        $recapDocument = DProjectDocument::where('d_project_id', $invoice->d_project_id)->where('name', 'Recap des traveaux entreprise')->first();
        $recap = DProjectDocument::updateOrCreate(
            [
                'd_project_id' => $invoice->d_project_id,
                'name' => 'Recap des traveaux entreprise',
            ],
            [
                'd_company_id' => $installer->id,
                'type_doc' => 50,
                'order_step' => 8,
                'path' => $finalRecapPath,
                'version_count' => $recapDocument ? $recapDocument->version_count : 0,
            ]
        );
        $oldRecapsVersions = DProjectDocumentVersion::where('document_id', $recap->id)->get();
        $oldRecapsVersions->update(['default' => 0]);
        (new DProjectDocumentVersionService(
            new DProjectDocumentVersion()
        ))->create([
                    'name' => 'Recap des traveaux entreprise',
                    'path' => $finalRecapPath,
                    'document_id' => $recap->id,
                    'default' => 1
                ]);
        $dProject = DProject::where('id', $invoice->d_project_id)->first();
        // $dProjectService = app(DProjectService::class);
        // $dProjectService->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);
        $this->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);
        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                        'name' => $documentProject->name,
                        'path' => $finalPath,
                        'document_id' => $documentProject->id,
                    ]);
            $status = $documentProject->pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value :
                DProjectDocumentStatus::SATISFIED->value;
            if ($documentProject->pDocument->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $documentProject->version_count + 1,
                'status' => $status,
                'state' => DInvoiceState::INVOICE->value,
            ]);

            $mainDocumentProject = DProjectDocument::where(
                [
                    'd_project_id' => $invoice->d_project_id,
                    'd_company_id' => null,
                    'type_doc' => 16,
                ]
            );
            $mainDocumentProject->update([
                'status' => DProjectDocumentStatus::SATISFIED->value,
            ]);
        }
    }

    public function cancelWorkInvoiceInstaller($invoice)
    {
        if (!$invoice || !$invoice->lines->count()) {
            throw new CustomException('Aucun facture trouvé.');
        }

        $installer = DCompany::where('id', $invoice->d_company_id)->first();
        $documentProject = DProjectDocument::where(
            'type_doc',
            16
        )->where('d_project_id', $invoice->d_project_id)->where('d_company_id', $installer->id)->first();
        if ($documentProject) {
            $documentProject->delete();
        }
        $this->checkLines($invoice);
        $data['status'] = DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value;
        $data['state'] = DInvoiceState::CANCELED_INVOICE->value;
        $data['validator'] = auth()->user()->id;

        $invoice->update($data);

        $finalRecapPath = $this->generateGlobalProjectWorkDocument($invoice->project);

        DProjectDocument::updateOrCreate(
            [
                'd_project_id' => $invoice->d_project_id,
                'name' => 'Recap des traveaux entreprise',
            ],
            [
                'd_company_id' => $installer->id,
                'type_doc' => 50,
                'order_step' => 8,
                'path' => $finalRecapPath,
                'version_count' => 0,
            ]
        );
    }

    public function cancelInvoiceInstaller($dProject, $data)
    {
        try {
            DB::beginTransaction();
            $installerInvoice = $dProject->invoices->where('type', DInvoiceHeaderType::INSTALLER->value)->first();
            $installerInvoice->update([
                'status' => DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value,
                'state' => DInvoiceState::PRE_INVOICE->value
            ]);
            DInvoiceCancelComment::create([
                'comment' => $data['comment'],
                'd_project_id' => $dProject->id,
                'd_project_invoice_header_id' => $installerInvoice->id
            ]);
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            // sendNotificationUser(
            //     'Retour du devis du dossier de référence ' . $dProject->reference,
            //     $data['comment'],
            //     $configUrl,
            //     null,
            //     $dProject->installer?->company->admins,
            // );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function sendInsNotif($dProject, $type)
    {
        try {
            $message = __(
                'notifications.project.invoice.' . $type,
                [
                    'username' => auth()->user()->company?->trade_name,
                    'reference' => $dProject->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            // sendNotificationUser(
            //     ucfirst($type) . ' du devis',
            //     $message,
            //     $configUrl,
            //     null,
            //     [
            //         $dProject->installer?->company->admin,
            //         $dProject->company->admin,
            //     ]
            // );
        } catch (\Exception $e) {
        }
    }

    public function checkDocumentBeforeCreate($dProject, $document, $nature = null)
    {
        $documentProject = DProjectDocument::where('name', $document->entitled)
            ->where('type_doc', $document->type)
            ->where('d_project_id', $dProject->id)->first();

        if (!$documentProject) {
            $stepDocument = PStepDocument::where(
                'order_step',
                $dProject->current_step_order
            )->where('type_doc', $document->type)->first();
            $company = $dProject->installer?->company ?? $dProject->company;
            $companyDoc = $company->projectDocs()
                ->where('type_doc', $document->type_doc)
                ->first();

            return DProjectDocument::firstOrCreate([
                'type_doc' => $document->type,
                'order_step' => $document->order_step,
                'name' => $document->entitled,
                'd_project_id' => $dProject->id,
                'required' => $companyDoc ? $companyDoc->pivot->required : $stepDocument->required ?? 0,
                'exported' => $document->exported ?? 0,
                'status' => DProjectDocumentStatus::NEW ->value,
                'nature_doc' => $companyDoc ? $companyDoc->pivot->nature_doc : $nature,
            ]);
        }

        return $documentProject;
    }

    public function updateDerogationRequestCriteria($dProject, $data)
    {
        $user = auth()->user();
        $dProject->update($data);
        $this->setGeneratedDocument(
            $dProject,
            $this->pDocumentService->getByType(7)
        );
    }

    public function updateRestPaymentModality($dProject, $data)
    {
        $dProject->update($data);

        $this->setGeneratedDocument(
            $dProject,
            $this->pDocumentService->getByType(8)
        );
    }

    public function updateOperations($dProject, $data)
    {
        $serviceOperation = new DProjectOperationService();
        $idProject = $dProject->id;
        foreach ($data['operations'] as $operation) {
            $opProject = DProjectOperation::where(
                'd_project_id',
                $idProject
            )->where('p_operation_id', $operation['p_operation_id'])->first();
            if (!$opProject) {
                $serviceOperation->create($operation + ['d_project_id' => $idProject]);
                $this->notifyInstaller($dProject, $operation['d_company_id']);
            } else {
                if ($opProject->d_company_id !== $operation['d_company_id'] && ($opProject->type == POperationType::TRV->value || $opProject->type == POperationType::AUDIT->value)) {
                    $this->notifyInstaller($dProject, $operation['d_company_id']);
                }
                if (
                    $opProject->type == POperationType::TRV->value
                ) {
                    $this->updateWorks($dProject, $opProject->d_company_id);
                }
                $opProject->update($operation);
            }
        }
    }

    public function updateAgentOperations($dProject, $data)
    {
        $serviceOperation = new DProjectOperationService();
        $idProject = $dProject->id;
        $opProject = DProjectOperation::where(
            'd_project_id',
            $idProject
        )->where('p_operation_id', $data['p_operation_id'])->first();

        if (!$opProject) {
            $opProject = $serviceOperation->create($data + ['d_project_id' => $idProject]);
        } else {
            $opProject->update($data);
        }
        if ($data['general'] == 1) {
            $pDocument = PDocument::where('reference', 'mandatGeneralData')->first();
        } else {
            if ($opProject->type == POperationType::MANADM->value) {
                $pDocument = PDocument::where('reference', 'mandatAdminData')->first();
            } elseif ($opProject->type == POperationType::MANFIN->value) {
                $pDocument = PDocument::where('reference', 'mandatFinanData')->first();
            }
        }
        if (isset($pDocument) && $pDocument) {
            $this->checkDocumentBeforeCreate($dProject, $pDocument);

            $this->setGeneratedDocument($dProject, $pDocument);
        }
    }

    public function updateWorkDates($dProject, $data)
    {
        $data['work_actual_start'] = $data['work_planned_start'];
        $data['work_actual_end'] = $data['work_planned_end'];
        $dProject->update($data);
    }

    public function updateAcualWorkDates($dProject, $data)
    {
        $dProject->update($data);
    }


    public function updateWorks($dProject, $companyId)
    {
        $works = $dProject->works;
        $works->each(function ($work) use ($companyId) {
            $work->update([
                'installer' => $companyId,
            ]);
        });
    }

    public function getCompanies($dProject)
    {
        $companies = [];

        $operations = $dProject->operations()->with('company.profileData')->get();

        foreach ($operations as $operation) {
            $company = $operation->company;
            $operationData = $operation->operation;

            if ($company && $company->profile !== 'MAN') {
                $companies[$company->id] = [
                    'id' => $company->id,
                    'trade_name' => $company->trade_name,
                    'reference' => $company->reference,
                    'icon' => $company->profileData->icon,
                    'operation' => [
                        'id' => $operationData->id,
                        'entitled' => $operationData->entitled,
                        'type' => $operationData->type,
                    ],
                ];
            }
        }

        return array_values($companies);
    }

    public function startWorkEvent($dProject)
    {
        $eventService = new DProjectEventService();
        $typeEventEnum = PTypeEventEnum::REAL_TRV->value;
        $typeEvent = PTypeEvent::where('type', $typeEventEnum)->first();
        $startDate = now();
        $user = auth()->user();
        $eventStarted = $dProject->events->where('type', $typeEventEnum)->count();
        if ($eventStarted) {
            throw new CustomException('Le travaux est déja en cours.');
        }

        $eventService->create([
            'entitled' => $typeEvent->entitled,
            'start_date' => $startDate,
            'end_date' => $startDate,
            'type' => $typeEventEnum,
            'd_project_id' => $dProject->id,
            'd_company_id' => $user->userable_id,
            'order_step' => $dProject->current_step_order,
            'user_id' => $user->id,
        ]);
    }

    public function saveAuditForm($dProject, $data)
    {
        $user = auth()->user();
        $dProject->update($data);
        // $this->setGeneratedDocument(
        //     $dProject,
        //     $this->pDocumentService->getByType(25)
        // );
        setLog(__('logs.form.primeWorkDemandData', [
            'username' => $user->username
        ]));
    }

    public function savePVReceptionForm($dProject, $data)
    {
        $dProject->update($data);
        $this->setGeneratedDocument(
            $dProject,
            $this->pDocumentService->getByType(19)
        );
    }

    public function updateAmountInvoice($dProject, $data)
    {
        $dInvoiceHeader = $dProject->invoices->where(
            'id',
            $data['d_project_header_invoice_id']
        )->first();
        if ($data['is_billed'] == DInvoicePayedStatus::PAYED->value) {
            $data['status'] = DProjectInvoiceHeaderStatusEnum::PAYED->value;

            if ($dInvoiceHeader->type == DInvoiceHeaderType::INSTALLER->value) {
                // try {
                //     $message = __(
                //         'notifications.project.invoice.payed',
                //         [
                //             'devis' => $dInvoiceHeader->reference,
                //             'reference' => $dInvoiceHeader->project->reference,
                //         ]
                //     );
                //     $configUrl = str_replace(
                //         ':id',
                //         $dInvoiceHeader->project->id,
                //         config('custom_routes.projects.create')
                //     );
                //     sendNotificationUser(
                //         'Paiement du devis',
                //         $message,
                //         $configUrl,
                //         null,
                //         [$dInvoiceHeader->project->installer?->company, $dInvoiceHeader->project->creator]
                //     );
                // } catch (\Exception $e) {
                // }
            }
        }
        if ($data['is_billed'] == DInvoicePayedStatus::INPROGRESS->value) {
            $data['status'] = DProjectInvoiceHeaderStatusEnum::VALIDATED->value;
        }
        $dInvoiceHeader->update($data);
    }

    public function checkdownloadble($pDocument)
    {
        if ($pDocument->downloadable !== 1) {
            throw new CustomException('Vous ne pouvez pas télécharger ce document');
        }
    }

    public function createOrUpdateInvoiceHeader($dProject, $data, $installer)
    {
        $user = auth()->user();
        $invoiceService = new DProjectInvoiceHeaderService(new DProjectInvoiceHeader());
        $currentDate = Carbon::now();

        $newDate = $currentDate->addDays(3);

        $invoice = $dProject->invoices->where(
            'type',
            DInvoiceHeaderType::INSTALLER->value
        )->where("d_company_id", $installer->id)->first();

        $dataInvoiceHeader = [
            'd_project_id' => $dProject->id,
            'creator' => $user->id,
            'invoice_date' => $data['invoice_date'] ?? $currentDate,
            'start_date' => $currentDate,
            'end_date' => $newDate,
            'state' => DInvoiceState::PRE_INVOICE->value,
            'type' => DInvoiceHeaderType::INSTALLER->value,
            'is_billed' => DInvoicePayedStatus::INPROGRESS->value,
            'status' => DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value,
        ];
        if ($invoice) {
            if ($invoice->status == DProjectInvoiceHeaderStatusEnum::VALIDATED->value) {
                throw new CustomException('Cette facture est déjà validée.');
            }
            $invoice->update($dataInvoiceHeader + $data);
            $invoice->lines()->delete();

            return $invoice;
        } else {
            $invoiceHeader = $invoiceService->create($dataInvoiceHeader + $data);
        }

        return $invoiceHeader;
    }

    public function setInvoiceHeaderData($data, $user, $dInvoiceHeader, $dProject)
    {
        $amounts = [
            'HT_total' => $data['HT_total'],
            'TTC_total' => $data['TTC_total'],
            'TVA_total' => $data['TVA_total'],
            'TTC_rest' => $data['TTC_total'] - $dInvoiceHeader->TTC_anah,
            'HT_rest' => $data['HT_total'] + $dInvoiceHeader->HT_anah,
            'TVA_rest' => $data['TVA_total'] + $dInvoiceHeader->TVA_anah,
            'd_project_id' => $dProject->id,
        ];
        $data['creator'] = $user->id;

        return array_merge($data, $amounts);
    }

    public function signDocument($data, $dProject, $pDocument)
    {
        try {
            $docuSignService = new \App\Services\DocuSignServices\DocuSignService();
            $document = DProjectDocument::where('type_doc', $pDocument->type)
                ->where('d_project_id', $dProject->id)
                ->first();

            if ($document) {

                // if ($document->count_signature == 0) {
                $dDocumentSignature = new DDocumentSignature();
                $docuSignService->addDocumentToSignList([$document]);
                $dDocumentSignature->d_project_id = $dProject->id;
                $company = getCompanyOfConnectedUser();
                $dDocumentSignature->d_company_id = $company->id;
                $dDocumentSignature->user_id = auth()->user()->id;
                $dDocumentSignature->email = $data['email'];
                $docuSignService->addSigner(
                    $dProject->client?->first_name .
                    $dProject->client?->last_name,
                    $data['email'],
                    $dProject->client?->id
                );

                $subject = '';
                $tabs = $document->pDocument->tabs;
                if ($document->type_doc == 16 && $dProject->invoices->where('type', 1)->first()->lines->count() > 5) {
                    $tabs[0]['sign_page'] += 1;
                }

                $docuSignService->addSignHereTabsToDocument(
                    $document,
                    $tabs,
                    $docuSignService->signers[0]
                );
                $subject .= $document->name . ' & ';

                $docuSignService->setTabs($docuSignService->signers[0]);
                if ($dProject->company->is_sms_enabled == 1) {
                    if (!$data['phone_number']) {
                        throw new CustomException('Veuillez renseigner votre numéro de téléphone.');
                    }
                    $docuSignService->setIdentityVerification(
                        $docuSignService->signers[0],
                        $data['phone_number']
                    );
                    $dDocumentSignature->with_sms = 1;
                }
                $dDocumentSignature->phone_number = $data['phone_number'] ?? null;
                $docuSignService->setEnvelopeDefinition($subject);
                $idEnvelope = $docuSignService->createEnvelope();
                $dDocumentSignature->envelope_id = $idEnvelope;
                $document->update([
                    'envelope_id' => $idEnvelope,
                    'count_signature' => $document->count_signature + 1,
                ]);
                $dDocumentSignature->save();

                // } else {
                //     if (!empty($document->envelope_id)) {
                //         $docuSignService->resendEnvelope($document->envelope_id);
                //     }

                //     $document->update([
                //         'count_signature' => $document->count_signature + 1,
                //     ]);
                //     // resend the mail function to add
                // }
            } else {
                throw new CustomException('Vous ne pouvez pas envoyer ce document.');
            }
        } catch (\Exception $th) {
            throw new CustomException($th->getMessage());
        }
        // add log here
        try {
            setLog(__('logs.project.sign_document', [
                'document' => $document->name,
                'reference' => $dProject->reference,
            ]));
        } catch (\Exception $e) {
        }
    }

    public function getInstallerInvoice($dProject)
    {
        $user = auth()->user();
        if ($user->profile === UserProfileEnum::MAR->value) {
            $invoiceList = $dProject->invoices->where('type', DInvoiceHeaderType::INSTALLER->value)->all();
        } else {
            $invoiceList = DProjectInvoiceHeader::where('type', DInvoiceHeaderType::INSTALLER->value)->where('d_project_id', $dProject->id)->where('d_company_id', $user->userable_id)->get();
        }
        $dProjectWork = $dProject->works;
        $invoices = [];
        foreach ($invoiceList as $key => $invoice) {
            $groupedArray = [];
            if ($invoice) {
                $installer = $invoice->company;
                $invoice = $invoice->toArray();
                $invoice['installer'] = $installer;
                $invoice['main_installer'] = $key == 1;
                unset($invoice['company']);
                foreach ($invoice['lines'] as $item) {
                    if ($item['parent_id'] === null) {
                        if (isset($item['d_work_id'])) {
                            // $work = DWork::where('id', $item['d_work_id'])->first();
                            // $item['cost_ht_simulation'] = $work->cost_ht_simulation;
                            // $item['qualification'] = $work->work->qualification;
                        }

                        $groupedArray[$item['id']] = $item;
                        $groupedArray[$item['id']]['children'] = [];
                    } else {
                        $parentId = $item['parent_id'];
                        if (isset($groupedArray[$parentId])) {
                            $groupedArray[$parentId]['children'][] = $item;
                        } else {
                            $groupedArray[$parentId] = [
                                'id' => $parentId,
                                'children' => [$item],
                            ];
                        }
                    }
                }
                $groupedArray = array_values($groupedArray);
                $invoice['lines'] = $groupedArray;
                $installerDocument = DProjectDocument::where([['d_project_id', $dProject->id], ['d_company_id', $installer->id], ['type_doc', 16]])->first();
                $installerDocumenVersions = $installerDocument ? $installerDocument->versions : [];
                $invoice['document'] = $installerDocument;
                $invoice['documents'] = $installerDocumenVersions;
                array_push($invoices, $invoice);
            }
        }

        return $invoices;
    }

    public function updateCurrentStep($request, $dProject)
    {
        if ($dProject->current_step_order < $request['step_order']) {
            for ($i = $dProject->current_step_order; $i < $request['step_order']; ++$i) {
                $stepReference = PStep::where('order', $i)->select('reference')->first();
                $className = ucfirst($stepReference->reference);
                $stepReference = "App\Factories\StepsFactory\Steps\\$className";
                $step = new $stepReference($dProject);

                $dProject->current_step_order = $i;

                $step->requirements();
                unset($step);
            }
        }

        $dProject->update(['current_step_order' => $request['step_order']]);

        return true;
    }

    public function updateAnahFolder($dProject, $request)
    {
        $dProject->update([
            'anah_folder' => $request['anah_folder'],
        ]);
    }

    public function generateDevis($dProject, $type_doc, $notif = false)
    {
        $documentProject = DProjectDocument::where(
            'type_doc',
            $type_doc
        )->where('d_project_id', $dProject->id)->first();
        $finalPath = $this->generateProjectDocument(
            $dProject,
            $documentProject,
            $documentProject->pDocument
        );
        $message = __(
            'logs.project.generate_document.description',
            [
                'document' => $documentProject->pDocument->entitled,
                'admin' => auth()->user()->username,
            ]
        );

        setProjectHistory(
            $dProject,
            __(
                'logs.project.generate_document.action',
                [
                    'document' => $documentProject->pDocument->entitled,
                    'admin' => auth()->user()->username,
                ]
            ),
            $message
        );
        if ($notif) {
            try {
                $message = __(
                    'notifications.project.generate_document',
                    [
                        'document' => $documentProject->pDocument->entitled,
                        'reference' => $dProject->reference,
                    ]
                );
                $configUrl = str_replace(
                    ':id',
                    $dProject->id,
                    config('custom_routes.projects.update')
                );
                // sendNotificationCompany(
                //     $documentProject->pDocument->entitled,
                //     $message,
                //     $configUrl,
                //     $dProject->company,
                //     null,
                // );
            } catch (\Throwable $th) {
            }
        }
        setLog($message . $dProject->reference);
        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                        'name' => $documentProject->name,
                        'path' => $finalPath,
                        'document_id' => $documentProject->id,
                    ]);
            $status = $documentProject->pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value :
                DProjectDocumentStatus::SATISFIED->value;
            if ($documentProject->pDocument->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $documentProject->version_count + 1,
                'status' => $status,
            ]);
        }
    }

    public function generateWorkDevis($dProject, $type_doc, $notif = false, $installerId, $invoice)
    {
        $installer = DCompany::where('id', $installerId)->first();
        $documentProject = DProjectDocument::where(
            'type_doc',
            $type_doc
        )->where('d_project_id', $dProject->id)->where('d_company_id', $installer->id)->first();
        if (!$documentProject) {
            $documentProject = DProjectDocument::create(
                [
                    'd_project_id' => $dProject->id,
                    'd_company_id' => $installer->id,
                    'type_doc' => $type_doc,
                    'name' => 'Devis Entreprise retenue (' . $installer->trade_name . ')',
                    'order_step' => 8,
                    'path' => '',
                    'version_count' => 0,
                ]
            );
        }
        $finalPath = $this->generateProjectWorkDocument(
            $dProject,
            $documentProject,
            $documentProject->pDocument,
            $installer,
            $invoice
        );
        $message = __(
            'logs.project.generate_document.description',
            [
                'document' => $documentProject->pDocument->entitled,
                'admin' => auth()->user()->username,
            ]
        );
        $finalRecapPath = $this->generateGlobalProjectWorkDocument($invoice->project);

        DProjectDocument::updateOrCreate(
            [
                'd_project_id' => $invoice->d_project_id,
                'name' => 'Recap des traveaux entreprise',
            ],
            [
                'd_company_id' => $installer->id,
                'type_doc' => 50,
                'order_step' => 8,
                'path' => $finalRecapPath,
                'version_count' => 0,
            ]
        );
        setProjectHistory(
            $dProject,
            __(
                'logs.project.generate_document.action',
                [
                    'document' => $documentProject->pDocument->entitled,
                    'admin' => auth()->user()->username,
                ]
            ),
            $message
        );
        if ($notif) {
            try {
                $message = __(
                    'notifications.project.generate_document',
                    [
                        'document' => $documentProject->pDocument->entitled,
                        'reference' => $dProject->reference,
                    ]
                );
                $configUrl = str_replace(
                    ':id',
                    $dProject->id,
                    config('custom_routes.projects.update')
                );

                // sendNotificationCompany(
                //     $documentProject->pDocument->entitled,
                //     $message,
                //     $configUrl,
                //     $dProject->company,
                //     null,
                // );
            } catch (\Throwable $th) {
            }
        }
        setLog($message . $dProject->reference);
        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                        'name' => $documentProject->name,
                        'path' => $finalPath,
                        'document_id' => $documentProject->id,
                    ]);
            $status = $documentProject->pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value :
                DProjectDocumentStatus::SATISFIED->value;
            if ($documentProject->pDocument->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $documentProject->version_count + 1,
                'status' => $status,
            ]);
        }
    }

    // public function generateGlobalWorkDevis($dProject, $type_doc)
    // {
    //     $documentsProject = DProjectDocument::where(
    //         'type_doc',
    //         $type_doc
    //     )->where('d_project_id', $dProject->id)->all();

    //     $finalPath = $this->generateGlobalProjectWorkDocument(
    //         $dProject,
    //         $documentsProject
    //     );
    //     $message = __(
    //         'logs.project.generate_document.description',
    //         [
    //             // 'document' => $documentProject->pDocument->entitled,
    //             'admin' => auth()->user()->username,
    //         ]
    //     );

    //     // setProjectHistory(
    //     //     $dProject,
    //     //     __(
    //     //         'logs.project.generate_document.action',
    //     //         [
    //     //             'document' => $documentProject->pDocument->entitled,
    //     //             'admin' => auth()->user()->username,
    //     //         ]
    //     //     ),
    //     //     $message
    //     // );
    //     // if ($notif) {
    //     //     try {
    //     //         $message = __(
    //     //             'notifications.project.generate_document',
    //     //             [
    //     //                 'document' => $documentProject->pDocument->entitled,
    //     //                 'reference' => $dProject->reference,
    //     //             ]
    //     //         );
    //     //         $configUrl = str_replace(
    //     //             ':id',
    //     //             $dProject->id,
    //     //             config('custom_routes.projects.update')
    //     //         );
    //     //         sendNotificationCompany(
    //     //             $documentProject->pDocument->entitled,
    //     //             $message,
    //     //             $configUrl,
    //     //             $dProject->company,
    //     //             null,
    //     //         );
    //     //     } catch (\Throwable $th) {
    //     //     }
    //     // }
    //     setLog($message . $dProject->reference);
    // }

    public function checkDocumentIfSigned($dProject)
    {
        $devis_mar = $dProject->documents->where('type_doc', 36)->first();
        if ($devis_mar->status == DProjectDocumentStatus::SATISFIED->value) {
            throw new CustomException('Offre de devis est signée');
        }
    }

    public function updateState($dProject, $data)
    {
        if ($dProject->state == $data['state']) {
            throw new CustomException("L'état de ce projet a déjà changé");
        }
        $dProject->update($data);
    }

    public function updateDepotAnah($dProject, $data)
    {
        $dProject->update([
            'depot_anah_' . $data['depot'] => $data['value'],
        ]);
    }

    public function secondDepotAnah($dProject)
    {
        $dProject->update([
            'anah_first_depot_response_state' => DProjectAnahResponseEnum::ONGOING->value,
        ]);
    }

    public function attestationDeTravauxFormStore($dProject, $data)
    {
        $dProject->update(
            $data
        );
    }

    public function anahResponse($dProject, $data)
    {

        try {
            DB::beginTransaction();
            $dProject->update($data);
            if (in_array($data['anah_first_depot_response_state'], [DProjectAnahResponseEnum::APPROVED->value, DProjectAnahResponseEnum::SUSPENDED->value])) {

                if ($data['anah_first_depot_response_state'] == DProjectAnahResponseEnum::SUSPENDED->value) {
                    $dProject->update([
                        'state' => DProjectState::SUSPENDED->value,
                        'anah_first_depot_response' => $data['comment'],
                        'process_ended' => 1
                    ]);
                }
                $message = __('notifications.project.response_anah.message.' . $data['anah_first_depot_response_state'], [
                    'reference' => $dProject->reference,
                ]);
                $subject = __('notifications.project.response_anah.subject.' . $data['anah_first_depot_response_state']);
                $configUrl = str_replace(
                    ':id',
                    $dProject->id,
                    config('custom_routes.projects.edit')
                );

                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $dProject->company,
                // );

                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $dProject->installer_company,
                // );
                $mandataireAdmin = $dProject->mandataire_admin_company;
                $mandataireFin = $dProject->mandataire_fina_company;
                // if ($mandataireAdmin->profile == DCompanyProfile::MAN->value) {
                //     sendNotificationCompany(
                //         $subject,
                //         $message,
                //         $configUrl,
                //         $mandataireAdmin,
                //     );
                // }
                // if ($mandataireFin->profile == DCompanyProfile::MAN->value && $mandataireFin->id !== $mandataireAdmin->id) {
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $mandataireFin,
                // );
                // }
            }

            if ($data['anah_first_depot_response_state'] == DProjectAnahResponseEnum::EDITED->value) {
                // DResponseAnah::create([
                //     'anah_first_depot_response' => $data['anah_first_depot_response'],
                //     'time' => now(),
                //     'd_project_id' => $dProject->id
                // ]);
                $message = __('notifications.project.response_anah.message.' . $data['anah_first_depot_response_state'], [
                    'reference' => $dProject->reference,
                    'message' => $dProject->anah_first_depot_response
                ]);
                $subject = __('notifications.project.response_anah.subject.' . $data['anah_first_depot_response_state']);
                $configUrl = str_replace(
                    ':id',
                    $dProject->id,
                    config('custom_routes.projects.edit')
                );

                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $dProject->company,
                // );

                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $dProject->installer_company,
                // );
                $mandataireAdmin = $dProject->mandataire_admin_company;
                $mandataireFin = $dProject->mandataire_fina_company;
                $auditorCompany = $dProject->auditor_company;
                // if ($auditorCompany == DCompanyProfile::AUD->value) {
                //     sendNotificationCompany(
                //         $subject,
                //         $message,
                //         $configUrl,
                //         $auditorCompany,
                //     );
                // }
                // if ($mandataireAdmin->profile == DCompanyProfile::MAN->value) {
                //     sendNotificationCompany(
                //         $subject,
                //         $message,
                //         $configUrl,
                //         $mandataireAdmin,
                //     );
                // }
                // if ($mandataireFin->profile == DCompanyProfile::MAN->value && $mandataireFin->id !== $mandataireAdmin->id) {
                //     sendNotificationCompany(
                //         $subject,
                //         $message,
                //         $configUrl,
                //         $mandataireFin,
                //     );
                // }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException();
        }
    }


    public function getCancelComments(DProject $dProject)
    {

        return $dProject->comments;
    }
}
