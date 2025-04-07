<?php

namespace App\Services\DDocumentServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PTypeDocumentEnum\PTypeDocument;
use App\Exceptions\CustomException;
use App\Models\DClientDocument;
use App\Models\DCompany;
use App\Models\DCompanyDocument;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\PDocument;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use App\Services\GenerateDocumentServices\GenerateDocumentService;
use App\Traits\DocumentPlaceHolder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DDocumentService
{
    use DocumentPlaceHolder;

    public function uploadDocument($file, $path, $count, $name)
    {
        $fileNameWithExtension = null;

        if ($file instanceof \Illuminate\Http\UploadedFile) {
            // Handle UploadedFile instance
            $fileNameWithExtension = $file->getClientOriginalName();
        } else {
            // Handle local file path
            $fileNameWithExtension = basename($file);
        }
        // $filenameWithoutExtension = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = pathinfo($fileNameWithExtension, PATHINFO_EXTENSION);
        $safeName = preg_replace('/[^A-Za-z0-9_\- ]/', '', $name);
        $fileName = $safeName . '-' . $count . '.' . $extension;
        $path = Storage::disk('local')->putFileAs(
            $path,
            $file,
            $fileName,
            'private'
        );
        return [
            $name,
            $path,
        ];
    }

    public function uploadInvoiceInstallerDocument($file, $count, $dProjectDocument)
    {
        $fileNameWithExtension = null;

        if ($file instanceof \Illuminate\Http\UploadedFile) {
            // Handle UploadedFile instance
            $fileNameWithExtension = $file->getClientOriginalName();
        } else {
            // Handle local file path
            $fileNameWithExtension = basename($file);
        }
        // $filenameWithoutExtension = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = pathinfo($fileNameWithExtension, PATHINFO_EXTENSION);
        $safeName = preg_replace('/[^A-Za-z0-9_\- ]/', '', $dProjectDocument->name);
        $fileName = $safeName . '-' . $count . '.' . $extension;
        $path = Storage::disk('local')->putFileAs(
            dirname($dProjectDocument->path),
            $file,
            $fileName,
            'private'
        );
        return [
            $dProjectDocument->name,
            $path,
        ];
    }

    public function downloadDocument($path, $wayOfShowing, $name)
    {
        $storagePath = storage_path('app/' . $path);
        ob_end_clean();
        if ($path && Storage::disk('local')->exists($path)) {
            $contents = Storage::disk('local')->get($path);
            $contentType = mime_content_type($storagePath);

            $headers = [
                'Content-Type' => $contentType,
                'Content-Disposition' => $wayOfShowing . '; filename="' . basename($name) . '"',
            ];

            return [$contents, $headers];
        }

        return [null, null];
    }

    public function nameByType()
    {
        return [
            0 => 'documents',
            1 => 'documents_clavis',
            2 => 'tous_les_documents',
        ];
    }

    public function createZip($model, $files, $type = 0)
    {
        $zip = new \ZipArchive();
        $zipFileName = $model->reference . '_' . $this->nameByType()[$type] . '.zip';

        if ($zip->open(storage_path($zipFileName), \ZipArchive::CREATE) === true) {
            foreach ($files as $file) {
                $path = $file->path;
                if ($path && Storage::disk('local')->exists($path)) {
                    $zip->addFile(storage_path('app/' . $path), basename($file->name . '.' . $file->extension));
                }
            }
            $zip->close();

            return [storage_path($zipFileName), $zipFileName];
        }

        throw new CustomException();
    }

    public function attachCompanyDocs($DCompany, $document, $attributeForeignUser)
    {

        try {
            DB::beginTransaction();
            $documentClassName = DCompanyDocument::class;

            $documentParent = $this->checkParentDocument(
                $document,
                $documentClassName,
                $DCompany,
                $attributeForeignUser,
            );

            $data = $this->createNewVersion(
                $document['file'],
                $documentParent,
                $DCompany,
                $document['name'],
            );
            $status = DProjectDocumentStatus::SATISFIED->value;
            $documentParent->update(
                $data +
                    [
                        'status' => $status,
                    ]
            );

            setLog(__(
                'logs.client.generate_document',
                [
                    'admin' => auth()->user()->username,
                    'reference' => $DCompany->reference,
                    'document' => $documentParent->entitled,
                ]
            ));
            DB::commit();

            return $documentParent;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function attachClientDocs($DClient, $document, $attributeForeignUser)
    {

        try {
            DB::beginTransaction();
            $documentClassName = DClientDocument::class;

            $documentParent = $this->checkParentDocument(
                $document,
                $documentClassName,
                $DClient,
                $attributeForeignUser,
            );

            $data = $this->createNewVersion(
                $document['file'],
                $documentParent,
                $DClient,
                $document['name'],
            );
            $status = DProjectDocumentStatus::SATISFIED->value;
            $documentParent->update(
                $data +
                    [
                        'status' => $status,
                    ]
            );

            setLog(__(
                'logs.client.generate_document',
                [
                    'admin' => auth()->user()->username,
                    'reference' => $DClient->reference,
                    'document' => $documentParent->entitled,
                ]
            ));
            DB::commit();

            return $documentParent;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function attachDocuments($model, $document, $attributeForeignUser, $pDocument = null, $notification = true, $parentProfile = null)
    {
        try {
            DB::beginTransaction();
            $modelClassName = class_basename($model);
            $documentClassName = "App\\Models\\{$modelClassName}Document";
            if (!class_exists($documentClassName)) {
                throw new CustomException();
            }
            if (!$pDocument) {
                $pDocumentExist = PDocument::where('entitled', $document['name'])->first();
                if ($pDocumentExist) {
                    $document['type_doc'] = $pDocumentExist->type;
                }
            }
            $documentParent = $this->checkParentDocument(
                $document,
                $documentClassName,
                $model,
                $attributeForeignUser,
            );
            $company = $model?->installer?->company ?? $model?->company;
            $user = auth()->user();
            if ($user?->profile) {
                $profile = $user?->profile;
            } else {
                $profile = $parentProfile;
            }
            if ($pDocument) {
                $companyDoc = $company?->projectDocs()
                    ?->where('type_doc', $pDocument?->type)?->first();

                if (
                    ($companyDoc && $pDocument && ($companyDoc->pivot->nature_doc ==
                        PNatureDocEnum::GENERATED->value
                        || $companyDoc->pivot->nature_doc ==
                        PNatureDocEnum::GENERATED_WITH_FORM->value)
                        && $documentParent->version_count == 0
                    ) && $profile != DCompanyProfile::MAR->value
                ) {
                    throw new CustomException('Le document n\'est pas encore généré');
                }
            }
            $data = $this->createNewVersion(
                $document['file'],
                $documentParent,
                $model,
                $document['name'],
            );
            if (!$pDocument) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            } else {
                $status = DProjectDocumentStatus::HAS_SOMETHING->value;
                $message = __(
                    'notifications.project.attach_document',
                    [
                        'document' => $pDocument->entitled,
                        'reference' => $model->reference,
                    ]
                );
                if ($notification && $pDocument->type == PDocumentType::AUDIT_ENERGETIQUE->value) {
                    sendNotificationCompany(
                        $pDocument->entitled . ' attachée',
                        $message,
                        null,
                        $model->auditor_company,
                    );
                    // sendNotificationCompany(
                    //     $pDocument->entitled . ' attachée',
                    //     $message,
                    //     null,
                    //     $model->installer_company,
                    // );
                }
                if ($notification && $pDocument->type == PDocumentType::PRECONISATION->value) {
                    // sendNotificationCompany(
                    //     $pDocument->entitled . ' attachée',
                    //     $message,
                    //     null,
                    //     $model->auditor_company,
                    // );
                    // sendNotificationCompany(
                    //     $pDocument->entitled . ' attachée',
                    //     $message,
                    //     null,
                    //     $model->installer_company,
                    // );
                }
                if (
                    $pDocument->signature && $documentParent->status ==
                    DProjectDocumentStatus::HAS_SOMETHING->value
                ) {
                    $status = DProjectDocumentStatus::SATISFIED->value;
                    // try {
                    //     if ($pDocument->reference == 'ContractMarData') {
                    //         $message = __(
                    //             'notifications.project.contrat_mar_signe',
                    //         );
                    //         sendNotificationUser(
                    //             'Contrat MAR signé',
                    //             $message,
                    //             null,
                    //             null,
                    //             [$model->creator, $model->installer->company->admin]
                    //         );
                    //     }
                    // } catch (\Throwable $th) {
                    // }
                } else {
                    $status = $pDocument->signature ?
                        DProjectDocumentStatus::HAS_SOMETHING->value :
                        DProjectDocumentStatus::SATISFIED->value;
                }
            }
            $user = auth()->user();
            if ($model?->installer_company?->fiche_navette_interne == 0 && $documentParent->type_doc == PDocumentType::RELEVE_AUDIT->value && $user->profile == DCompanyProfile::INS->value) {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }
            $documentParent->update(
                $data +
                    [
                        'status' => $status,
                        'type_doc' => $document['type_doc'] ?? null,
                    ]
            );

            setLog(__(
                'logs.client.generate_document',
                [
                    'admin' => auth()?->user()?->username,
                    'reference' => $model?->reference,
                    'document' => $documentParent?->entitled,
                ]
            ));
            DB::commit();

            return $documentParent;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function attachInvoiceInstaller($dProjectDocument, $data)
    {
        try {
            DB::beginTransaction();
            $data = $this->createNewInstallerInvoiceVersion(
                $data['file'],
                $dProjectDocument
            );

            DB::commit();

            // return $documentParent;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function checkSignatureType() {}

    public function sendNotifCl($project)
    {
        try {
            $configUrl = str_replace(
                ':id',
                $project->id,
                config('custom_routes.projects.update')
            );
            $operation = $project->operations->where(
                'type',
                POperationType::TRV->value
            )->firstOrFail();
            $dCompany = DCompany::find($operation->d_company_id);
            if (!$dCompany) {
                return 0;
            }
            $admins = $dCompany->users()->whereHas('roles', function ($query) {
                $query->where('name', 'like', '%admin%');
            })->get();

            sendNotificationUser(
                'Attachement de l\'audit Energitique',
                __('notifications.project.audit'),
                $configUrl,
                null,
                $admins
            );
        } catch (\Exception $e) {
        }
    }

    public function createNewVersion(
        $document,
        $documentParent,
        $model,
        $name
    ) {
        $count = $documentParent->version_count + 1;

        [$name, $path] = $this->uploadDocument(
            $document,
            $model->getDirectoryPathAttribute(),
            $count,
            $name
        );
        $documentParent->versions()->create([
            'name' => $name,
            'path' => $path,
            'document_id' => $documentParent->id,
            'default' => $count == 1 ? 1 : 0,
            'version' => "Version $count",
        ]);
        return ['version_count' => $count, 'path' => $path];
    }

    public function createNewInstallerInvoiceVersion(
        $document,
        $dProjectDocument,
    ) {
        $count = $dProjectDocument->version_count + 1;

        [$name, $path] = $this->uploadInvoiceInstallerDocument(
            $document,
            $count,
            $dProjectDocument
        );
        $dProjectDocument->versions()->create([
            'name' => $name,
            'path' => $path,
            'document_id' => $dProjectDocument->id,
            'default' => $count == 1 ? 1 : 0,
            'version' => "Version $count",
        ]);
        return ['version_count' => $count, 'path' => $path];
    }

    public function checkParentDocument(
        $document,
        $documentClassName,
        $model,
        $attributeForeignUser
    ) {
        $pDocumentType = $document['type_doc'] ?? null;
        $name = $document['name'] ?? null;
        $authUser = auth()->user();
        $documentParent = $documentClassName::whereNotNull('type_doc')
            ->where(
                'type_doc',
                $pDocumentType
            )->where($attributeForeignUser, $model->id)
            ->orWhere('name', $name)->where($attributeForeignUser, $model->id)->first();
        $pDocument = PDocument::where('entitled', $name)->first();
        if ((!$documentParent && $pDocument) && !($model instanceof DProject)) {
            return $documentClassName::create([
                'type_doc' => $pDocument->type,
                'name' => $name,
                $attributeForeignUser => $model->id,
                'creator_id' => $authUser->id,
                'creator_type' => class_basename($authUser),
                ''
            ]);
        }
        if (!$documentParent && !$pDocument) {
            return $documentClassName::create([
                'type_doc' => null,
                'name' => $name,
                $attributeForeignUser => $model->id,
                'creator_id' => $authUser->id,
                'creator_type' => class_basename($authUser),
            ]);
        }
        if (!$documentParent && $pDocument) {
            return checkDocumentBeforeCreate($pDocument, $model);
        }

        return $documentParent;
    }

    public function setGeneratedDocument($dProject, $pDocument)
    {
        $documentProject = $dProject->documents->where(
            'type_doc',
            $pDocument->type
        )->whereNotNull('type_doc')->first();
        if (!$documentProject) {
            throw new CustomException('Vous ne pouvez pas créer ce document dans cette étape.');
        }

        $finalPath = $this->generateProjectDocument(
            $dProject,
            $documentProject,
            $pDocument
        );

        $message = __(
            'logs.project.generate_document.description',
            [
                'document' => $pDocument->entitled,
                'admin' => auth()->user()->username,
            ]
        );

        setProjectHistory(
            $dProject,
            __(
                'logs.project.generate_document.action',
                [
                    'document' => $pDocument->entitled,
                ]
            ),
            $message
        );

        setLog($message . $dProject->reference);

        if ($documentProject) {
            (new DProjectDocumentVersionService(
                new DProjectDocumentVersion()
            ))->create([
                'name' => $documentProject->name,
                'path' => $finalPath,
                'document_id' => $documentProject->id,
            ]);
            $status = $pDocument->signature ?
                DProjectDocumentStatus::HAS_SOMETHING->value : DProjectDocumentStatus::SATISFIED->value;
            $documentProject->update([
                'path' => $finalPath,
                'version_count' => $documentProject->version_count + 1,
                'status' => $status,
            ]);
        }
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
            $placeholderData = $this->$reference($dProject);
        }

        $generateDocumentService = new GenerateDocumentService();
        $generateDocumentService->setPlaceHolderData($placeholderData);

        return $generateDocumentService->generateDocument($pDocument, $dProject, $documentProject);
    }

    public function attachCustomDocuments(
        $model,
        $document,
        $attributeForeignUser,
        $customModel,
        $pDocument = null
    ) {
        try {
            DB::beginTransaction();
            $modelClassName = class_basename($model);
            $documentClassName = "App\\Models\\{$modelClassName}Document";

            if (!class_exists($documentClassName)) {
                throw new CustomException('Erreur inconnu.');
            }

            $documentParent = $this->checkParentCustomDocument(
                $document,
                $documentClassName,
                $model,
                $attributeForeignUser,
                $customModel,
            );

            if (
                $pDocument && $pDocument->type ==
                PTypeDocument::GENERATION_AND_SIGNATURE->value
                && $documentParent->version_count == 0
            ) {
                throw new CustomException('Le document n\'est pas encore généré');
            }

            $data = $this->createNewVersion(
                $document['file'],
                $documentParent,
                $model,
                $document['name'],
            );
            if ($pDocument) {
                if (
                    $pDocument->signature && $documentParent->status ==
                    DProjectDocumentStatus::HAS_SOMETHING->value
                ) {
                    $status = DProjectDocumentStatus::SATISFIED->value;
                } else {
                    $status = $pDocument->signature ?
                        DProjectDocumentStatus::HAS_SOMETHING->value :
                        DProjectDocumentStatus::SATISFIED->value;
                }
            } else {
                $status = DProjectDocumentStatus::SATISFIED->value;
            }

            $documentParent->update(
                $data +
                    [
                        'status' => $status,
                        'type_doc' => $document['type_doc'] ?? null,
                    ]
            );

            setLog(__(
                'logs.client.generate_document',
                [
                    'admin' => auth()->user()->username,
                    'reference' => $model->reference,
                    'document' => $documentParent->entitled,
                ]
            ));
            DB::commit();

            return $documentParent;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function checkParentCustomDocument(
        $document,
        $documentClassName,
        $model,
        $attributeForeignUser,
        $customModel
    ) {
        $pDocumentType = $document['type_doc'] ?? null;
        $name = $document['name'] ?? null;
        $authUser = auth()->user();

        $documentParent = $documentClassName::whereNotNull('type_doc')
            ->where(
                'type_doc',
                $pDocumentType
            )->where('d_project_id', $model->id)
            ->orWhere('name', $name)->where('d_project_id', $model->id)->first();

        if (!$documentParent) {
            return $documentClassName::create([
                'type_doc' => $pDocumentType,
                'name' => $name,
                $attributeForeignUser => $customModel->id,
                'd_project_id' => $model->id,
                'creator_id' => $authUser->id,
                'creator_type' => class_basename($authUser),
            ]);
        }

        return $documentParent;
    }

    public function attachDocuSignedDocument() {}
}
