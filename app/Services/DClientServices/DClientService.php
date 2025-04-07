<?php

namespace App\Services\DClientServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DDocumentEnum\DDocumentValidateEnum;
use App\Enums\PStateEnum\PStateEnum;
use App\Exceptions\CustomException;
use App\Models\DClient;
use App\Models\DClientrefused;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\PDocument;
use App\Models\PProfile;
use App\Models\User;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\ExportServices\ExportService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DClientService
{
    public function __construct(private DClient $dClient, private DProject $dProject)
    {
    }

    public function create(array $data, $token = null)
    {
        try {
            DB::beginTransaction();
            $data['commune'] = $data['city'];
            if ($token) {
                $company = DCompany::where('linkToken', (string) $token)->first();
                if ($company->profile === DCompanyProfile::MAR->value) {
                    $data["mar_id"] = $company->id;
                } else {
                    $data["mar_id"] =
                        $company->parent()
                            ->whereHas('parent', function ($query) {
                                $query->where('profile', DCompanyProfile::MAR->value);
                            })
                            ->get()->pluck('d_company_id')->toArray()[0];
                }
            }
            $dClient = $this->dClient::create($data);
            $profile = DCompanyProfile::BMAN->value;

            DCompany::create(["linkToken" => $token, "profile" => $profile, "code" => $dClient->code, "trade_name" => strtoupper($dClient->first_name . " " . $dClient->last_name)]);
            if (isset($data['signature'])) {
                $dClient->update([
                    'signature' => uploadFile(
                        $data['signature'],
                        $dClient->directory_path
                    ),
                ]);
            }
            // if (isset($data['documents'])) {

            //     $this->attachDocuments($dClient, $data['documents']);
            // }

            DB::commit();

            return $dClient;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    // to change after romdhan fix user documents ?? ana changes a bro

    public function createInstanceUser($dClient, $data)
    {
        $user = User::create($data + ['profile' => 'CLI', 'company_code' => $dClient->code]);
        $dClient->update(['user_id' => $user->id]);
        $role = $dClient->profile . '::client';
        $user->assignRole($role);
        assignPermissionsTo($user, $role);
    }

    public function attachDocuments($dClient, $documents)
    {
        foreach ($documents as $document) {
            (new DDocumentService())->attachClientDocs($dClient, $document, 'd_client_id');
        }
    }

    public function edit(array $data, DClient $dClient)
    {
        // if (isset($data['signature'])) {
        //     $this->deleteSignature($dClient);

        //     $data['signature'] = uploadFile(
        //         $data['signature'],
        //         $dClient->directory_path
        //     );

        // }
        $data['commune'] = $data['city'];
        return $dClient->update($data);
    }
    public function acceptClient($id)
    {

        $dClient = DClient::where('id', $id)->first();
        $dClient["type"] = 1;
        return $dClient->update();
    }
    public function refuseClient($id)
    {
        $dClient = DClient::where('id', $id)->first();
        $dClientRefused = new DClientrefused($dClient->toArray());
        $dClientRefused->code = generateRandomUniqueCode('client');
        $dClientRefused->save();
        $dClient->forceDelete();
        return true;
    }
    public function editContactInfo(array $data, DClient $dClient)
    {
        return $dClient->update($data);
    }

    public function deleteSignature($dClient)
    {
        $signaturePath = $dClient->signature ?? '';
        if (Storage::exists($signaturePath)) {
            Storage::delete($signaturePath);
        }
    }

    public function delete(DClient $dClient): void
    {
        if ($this->dProject::where('d_client_id', $dClient->id)->where('process_ended', 0)->count()) {
            throw new CustomException('Vous ne pouvez pas supprimé ce client (Projets actifs avec des processus en cours)');
        }
        $dClient->deleted_by = auth()->user()->id;
        $dClient->save();
        $dClient->delete();
    }

    public function getById(int $id)
    {
        return $this->dClient::where('id', $id)->clientByAcces()->first();
    }

    public function getAll($filters)
    {
        $user = auth()->user();

        return collection($this->dClient::clientByAcces(), $filters);
    }
    public function getAllAccepted($filters)
    {
        $user = auth()->user();

        return collection($this->dClient::clientByAccesAccepted(), $filters);
    }
    public function getAllProspects($filters)
    {
        $user = auth()->user();

        return collection($this->dClient::clientByAccesPropects(), $filters);
    }
    public function validateClientDocument($document, $data)
    {
        $user = auth()->user();

        $document->is_validated = ($data['validate'] == DDocumentValidateEnum::VALIDATE->value) ?
            DDocumentValidateEnum::VALIDATE->value : DDocumentValidateEnum::NOT_VALIDATED->value;
        $document->validator_id = $user->id;
        $document->validator_type = class_basename($user);

        setLog(__(
            'logs.client.validate_document.' . $document->is_validated
            == DDocumentValidateEnum::VALIDATE->value ?
            'accepted' : 'refused',
            [
                'document' => $document->name,
                'admin' => $user->first_name . ' ' . $user->last_name
            ]
        ));

        $document->save();
    }

    public function disableClient($dClient)
    {
        if ($this->dProject::where('d_client_id', $dClient->id)->where('process_ended', 0)->count()) {
            throw new CustomException('Vous ne pouvez pas désactiver ce client (Projets actifs avec des processus en cours)');
        }
        $dClient->state = ($dClient->state == PStateEnum::ACTIVATED->value) ?
            PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $dClient->save();

        return true;
    }

    public function clientProjectDocuments($dClient)
    {
        $pDocuments = PDocument::join('p_step_documents', 'p_documents.type', '=', 'p_step_documents.type_doc')
            ->orderBy('p_step_documents.order_step', 'asc')
            ->get();
        $projects = $dClient->projects()->with('documents')->get();
        $result = [];
        foreach ($pDocuments as $pDocument) {
            $projects = $dClient->projects()->whereHas('documents', function ($query) use ($pDocument) {
                $query->where('type_doc', $pDocument->type);
            })->with([
                        'documents' => function ($query) use ($pDocument) {
                            $query->where('type_doc', $pDocument->type);
                        }
                    ])->get();
            $documentInfo = $pDocument->toArray();
            $documentInfo['project_documents'] = $projects->flatMap(function ($project) {
                return $project->documents->toArray();
            });
            $result[] = $documentInfo;
        }

        return $result;
    }

    //################ EXPORT #####################

    public function getLinesToExport($filters)
    {
        return $this->getAll($filters)->map(function ($item) {
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
            $item['reference'],
            $item['first_name'] . ' ' . $item['last_name'],
            $item['zip_code'] . ' ' . $item['city'],
            $item['address'],
            $item['phone_number_1'],
            $item['email_contact'],
        ];
    }

    public function columnsToExport()
    {
        return [
            'Référence',
            'Intitulé',
            'Code postal et la ville',
            'Adresse',
            'Numéro de télephone',
            'Email',
        ];
    }

    public function export($filters)
    {
        $lines = $this->getLinesToExport($filters);
        $columns = $this->columnsToExport();

        return (new ExportService())->export($lines, $columns, 'clients', 'Liste des clients');
    }
}
