<?php

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DVisiteState;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PStepEnum\PStepOrder;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DInvoiceReference;
use App\Models\DLog;
use App\Models\DModelReference;
use App\Models\DNotification;
use App\Models\DProjectDocument;
use App\Models\DProjectHistory;
use App\Models\DProjectReference;
use App\Models\Mar;
use App\Models\PNotification;
use App\Models\PState;
use App\Models\PStatus;
use App\Models\PUserNotification;
use App\Models\User;
use App\Notifications\SendUserNotification;
use App\Services\DMailingServices\DMailingService;
use App\Services\DNotificationServices\DNotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

function getState($model, $normal = false)
{
    if ($normal) {
        return PState::where('model', $model)->whereNotNull('state')->orderBy('state');
    }

    return PState::where('model', class_basename($model))->whereNotNull('state')->orderBy('state');
}

function getStatus($model, $normal = false)
{
    if ($normal) {
        return PStatus::where('model', $model)->whereNotNull('state')->orderBy('state');
    }

    return PStatus::where('model', class_basename($model))->whereNotNull('state')->orderBy('state');
}

function collectionCustom($model, $filters, $with = [], $select = [], $withoutOrder = false)
{
    $orderedModel = $model;
    $filterstofilter = $filters;
    unset($filterstofilter["paginated"]);
    unset($filterstofilter["page_size"]);
    unset($filterstofilter["page"]);
    foreach ($filterstofilter as $key => $value) {
        if ($key === "search" && $value !== null && $value !== "") {
            $orderedModel = $orderedModel->where(function ($query) use ($value) {
                $query->whereHas('notification', function ($query) use ($value) {
                    $query->where('entiteled', 'like', '%' . $value . '%');
                })
                    ->orWhere('subject', 'like', '%' . $value . '%');
            });
        }
        if ($value !== null) {
            $model = $model->where($key, $value);
        }
    }
    if (!$withoutOrder) {
        $orderedModel = $orderedModel->orderByDesc('id');
    }
    if ($with) {
        $orderedModel->with($with);
    }
    if ($select) {
        $orderedModel->select($select);
    }

    return $filters['paginated'] ?? false
        ? $orderedModel->paginate($filters['page_size'] ?? defaultPagination())
        : $orderedModel->get();
}
function collection($model, $filters, $with = [], $select = [], $withoutOrder = false)
{
    if ($withoutOrder) {
        $orderedModel = $model->filter($filters);
    } else {
        $orderedModel = $model->orderByDesc('id')->filter($filters);
    }
    if ($with) {
        $orderedModel->with($with);
    }
    if ($select) {
        $orderedModel->select($select);
    }

    return $filters['paginated'] ?? false
        ? $orderedModel->paginate($filters['page_size'] ?? defaultPagination())
        : $orderedModel->get();
}

function uploadFile($file, $path)
{
    $fileName = uniqid() . '_' . time() . $file->hashName();

    return Storage::disk('local')->putFileAs(
        $path,
        $file,
        $fileName,
        'private'
    );
}

function defaultPagination()
{
    $user = auth()->user();

    // $preference = PPreference::first();
    // return $preference ? $preference->pagination : 10;
    return $user->mar?->default_pagination ?? 10;
}
function getNextContractReference(string $type): ?string
{
    $modelReference = DInvoiceReference::where('type', $type)
        ->first();
    if (!$modelReference) {
        return null;
    }
    $currentCode = $modelReference->current_count;
    $numberWithoutZeros = intval($currentCode);

    $modelReference->update([
        'current_count' => generateNewCode(
            $numberWithoutZeros + 1,
            $currentCode
        ),
    ]);

    return $modelReference->prefix . $currentCode;
}
function getNextReference(string $type): ?string
{
    $modelReference = DModelReference::where('type', $type)
        ->orWhere('table_name', $type)
        ->first();
    if (!$modelReference) {
        return null;
    }
    $currentCode = $modelReference->current_count;
    $numberWithoutZeros = intval($currentCode);

    $modelReference->update([
        'current_count' => generateNewCode(
            $numberWithoutZeros + 1,
            $currentCode
        ),
    ]);

    return $modelReference->prefix . $currentCode;
}

function generateNewCode($numberWithoutZeros, $currentCode)
{
    return str_pad(
        $numberWithoutZeros,
        strlen($currentCode),
        '0',
        STR_PAD_LEFT
    );
}

function setProjectHistory($dProject, $action, &$message)
{
    $user = auth()->user();
    if ($user) {
        $message = $user->username . ' ' . $message . ' : ' . $dProject->reference
            . ' le ' . dateNow();

        $history = new DProjectHistory([
            'd_project_id' => $dProject->id,
            'action' => $action,
            'description' => $message,
            'user_id' => $user->id,
        ]);
        $history->userable()->associate($user);
        $history->save();
    }
}
function dateNow()
{
    return now()->format('d-m-Y H:i');
}

// get mar of connected user
function getMarConnectedUser()
{
    return auth()->user()->userable_id;
}

function notifyUsers(
    $subject,
    $description,
    $users = [],
    $endPoint = null,
    $sendEmail = false
) {
    try {
        $dMailingService = new DMailingService();
        foreach ($users as $user) {
            $dCompany = DCompany::find($user->userable_id);
            $canSendMail = $dMailingService->canMail(["subject" => "Création dossier", "entitled" => "Ajouter un nouveau dossier par l'installateur"], $dCompany);
            (new DNotificationService(new DNotification()))
                ->create($user, $subject, $description, $endPoint);
            if ($sendEmail && $canSendMail) {
                $user->notify(new SendUserNotification(
                    $subject,
                    $description,
                    null,
                    null
                ));
            }
        }

        return 1;
    } catch (\Throwable $th) {
    }
}

function setLog(
    $message,
) {
    $request = request();
    $user = auth()->user();
    if ($user) {
        $data = json_decode($request->getContent(), true);
        if (isset($data['password'])) {
            unset($data['password']);
        }

        return DLog::create([
            'message' => $message,
            'user_id' => $user->id,
            'd_company_id' => $user->userable_id,
            'route' => $request->path(),
            'request' => json_encode([
                'header' => $request->header(),
                'body' => json_encode($data),
            ]),
        ]);
    }
}

function generateRandomUniqueCode($characters, $length = 6)
{
    $characters = preg_replace('/[^a-zA-Z0-9]/', rand(1, 9), $characters);

    $randomString = '';

    while (strlen($randomString) < $length) {
        $uniqueId = uniqid();
        $randomString .= str_shuffle($characters . $uniqueId);
    }

    $randomString = preg_replace('/[^a-zA-Z0-9]/', rand(1, 9), $randomString);

    return substr($randomString, 0, $length);
}

function getCompanyOfConnectedUser($token = null)
{
    $user = auth()->user();
    if ($user) {
        return $user->company;
    } else {
        return DCompany::where('linkToken', $token)->first();
    }
}

function getNextReferenceProject($companyId): ?string
{
    $modelReference = DProjectReference::where('mar_id', $companyId)
        ->first();
    if (!$modelReference) {
        return "";
    }
    $currentCode = $modelReference->current_count;
    $numberWithoutZeros = intval($currentCode);

    $modelReference->update([
        'current_count' => generateNewCode(
            $numberWithoutZeros + 1,
            $currentCode
        ),
    ]);

    return $modelReference->prefix . $currentCode;
}

function getNextInvoice($companyId, $type)
{
    $modelReference = DInvoiceReference::where('d_company_id', $companyId)
        ->where('type', $type)
        ->first();
    if (!$modelReference) {
        return null;
    }
    $currentCode = $modelReference->current_count;
    $numberWithoutZeros = intval($currentCode);

    $modelReference->update([
        'current_count' => generateNewCode(
            $numberWithoutZeros + 1,
            $currentCode
        ),
    ]);

    return $modelReference->prefix . $currentCode;
}

function getMarCompany()
{
    try {
        $user = auth()->user();
        $company = $user->company;
        if ($company->profile === DCompanyProfile::MAR->value) {
            return [$company->id];
        }

        return $company->parent()
            ->whereHas('parent', function ($query) {
                $query->where('profile', DCompanyProfile::MAR->value);
            })
            ->get()->pluck('d_company_id')->toArray();
    } catch (\Throwable $th) {
    }
}

function createNotificationProject($dProject, $message, $user, $description)
{
    try {
        $configUrl = str_replace(
            ':id',
            $dProject->id,
            config('custom_routes.projects.update')
        );
        setProjectHistory(
            $dProject,
            __(
                $message
            ),
            $description
        );

        setLog($message . ' ' . $dProject->reference);
        if ($user) {
            notifyUsers(
                $message,
                $description,
                [$user],
                $configUrl,
                true
            );
        }
    } catch (Exception $ex) {
    }
}

function sendNotificationUser(
    $subject,
    $description,
    $endPoint = null,
    $credentials = null,
    $users = null,
    $greeting = null,
) {
    try {

        if ($users) {
            foreach ($users as $user) {
                $notifSubject = PNotification::where('entitled', $subject)
                    ->orWhere('subject', $subject)->value('subject');
                (new DNotificationService(new DNotification()))
                    ->create($user, $notifSubject ?? $subject, $description, $endPoint);
                $user->notify(new SendUserNotification(
                    $notifSubject ?? $subject,
                    $description,
                    $credentials,
                    $greeting
                ));
            }
        } else {
            $currentUserId = auth()->user()->id;
            $userNotifications = PUserNotification::where('entitled', $subject)
                ->whereHas('user', function ($query) use ($currentUserId) {
                    $query->where('id', '!=', $currentUserId);
                })
                ->get();
            foreach ($userNotifications as $userNotification) {
                $user = User::find($userNotification->user_id);
                if ($user) {
                    if ($userNotification->web) {
                        (new DNotificationService(new DNotification()))
                            ->create($user, $userNotification->subject, $description, $endPoint);
                    }
                    if ($userNotification->mail) {
                        $user->notify(new SendUserNotification(
                            $userNotification->subject,
                            $description,
                            $credentials,
                            $user->company->representative_last_name . ' ' .
                            $user->company->representative_first_name ?? null
                        ));
                    }
                }
            }
        }

        return 1;
    } catch (\Throwable $th) {
        throw new CustomException($th);

    }
}

function sendNotificationCompany(
    $subject,
    $description,
    $endPoint = null,
    $company = null,
    $greeting = null,
) {
    try {
        $notifSubject = PNotification::where('entitled', $subject)
            ->orWhere('subject', $subject)->value('subject');

        foreach ($company->admins as $key => $admin) {

            (new DNotificationService(new DNotification()))
                ->create($admin, $notifSubject ?? $subject, $description, $endPoint);
            $company->notify(new SendUserNotification(
                $notifSubject ?? $subject,
                $description,
                null,
                $greeting
            ));
        }
    } catch (\Throwable $th) {
    }
}

function canEditDocument($project, $typeDocument, $user)
{
    if ($user->profile == DCompanyProfile::MAR->value && $user->role !== RoleEnum::MARINS->value) {
        return true;
    }

    switch ($typeDocument) {
        case 3:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 5:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }

            return false;

        case 16:
            if ($user->profile == DCompanyProfile::INS->value) {
                if ($user->hasRole('INS::admin') || $user->hasRole('INS::collaborator')) {
                    return true;
                }
                return false;
            }
        case 22:
            $operation = $project->auditor;
            if (!$operation || $user->userable_id != $operation->d_company_id) {
                return false;
            }
        // no break
        case 6:
            $operation = $project->auditor;
            if (!$operation || $user->userable_id != $operation->d_company_id) {
                return false;
            }

            return true;
        case 1:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 2:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 29:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 48:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 30:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 31:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 32:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 34:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 38:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 0:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 15:
            return
                canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_INSTALLER->value,
                    true
                ) || canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_MAR->value,
                    true
                );
        case 39:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 23:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 35:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 36:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 37:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return
                canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_MAR->value
                ) || canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_MAR->value
                );
        case 4:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 46:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        default:
            return false;
    }
}

function canViewDocument($project, $typeDoc, $user)
{
    if (isAdminOrCollab($user)) {
        return true;
    }

    switch ($typeDoc) {
        case 22:
            return canViewProjectByOperation(
                $user,
                $project,
            );
        case 3:
            if ($user->profile == DCompanyProfile::AUD->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 1:
            if ($user->profile == DCompanyProfile::INS->value) {
                if ($user->hasRole('INS::admin') || $user->hasRole('INS::collaborator') || $user->hasRole(RoleEnum::AUDADM->value)) {
                    return true;
                } else {
                    return canViewProjectByOperation(
                        $user,
                        $project,
                    );
                }
            }
        // no break
        case 2:
            if ($user->profile == DCompanyProfile::INS->value || $user->profile == DCompanyProfile::AUD->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 5:
            if ($user->profile == DCompanyProfile::INS->value || $user->profile == DCompanyProfile::AUD->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 6:
            if ($user->profile == DCompanyProfile::INS->value || $user->profile == DCompanyProfile::AUD->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            ) || $user->profile == DCompanyProfile::INS->value;
        case 13:
            if ($user->profile == DCompanyProfile::INS->value || $user->profile == DCompanyProfile::AUD->value) {
                return true;
            }

            return false;
        case 16:
            if ($user->profile == DCompanyProfile::INS->value) {
                if ($user->hasRole('INS::admin') || $user->hasRole('INS::collaborator')) {
                    return true;
                }

                return false;
            }
        // no break
        case 17:
            return true;
        case 34:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 29:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 48:
            if ($user->profile == DCompanyProfile::INS->value && !in_array($user->role, [RoleEnum::INSINS->value, RoleEnum::INSSUP->value])) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        case 30:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 31:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 32:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 38:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );

        case 23:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 35:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 37:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return
                canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_MAR->value
                ) || canViewProjectByVisitType(
                    $user,
                    $project,
                    PTypeVisitEnum::VISIT_MAR->value
                );
        case 0:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 15:
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 39:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 36:
            if ($user->profile == DCompanyProfile::INS->value) {
                return false;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 4:
            if ($user->profile == DCompanyProfile::INS->value) {
                return false;
            }

            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value
            );
        case 46:
            if ($user->profile == DCompanyProfile::INS->value) {
                return true;
            }
            return canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_INSTALLER->value,
                true
            ) || canViewProjectByVisitType(
                $user,
                $project,
                PTypeVisitEnum::VISIT_MAR->value,
                true
            );
        default:
            return false;
    }
}
function canViewProjectByOperation($user, $project)
{
    $flag = false;
    $project->operations->each(function ($operation) use ($user, &$flag) {
        if ($operation->d_company_id == $user->company->id) {
            $flag = true;
        }
    });

    return $flag;
}
function isAdminOrCollab($user)
{
    $roleMar = DCompanyProfile::MAR->value . '::';
    if ($user->hasAnyRole([$roleMar . 'admin', $roleMar . 'collaborator'])) {
        return true;
    }
}

function canViewProjectByVisitType($user, $project, $visitType, $edit = false)
{
    if (isAdminOrCollab($user)) {
        return true;
    }
    if ($visitType == PTypeVisitEnum::VISIT_INSTALLER->value && $user->profile == DCompanyProfile::AUD->value) {
        return false;
    }
    if ($visitType == PTypeVisitEnum::VISIT_MAR->value && $user->profile !== DCompanyProfile::MAR->value) {
        return false;
    }
    $visit = $project->visits->whereIn('state', [DVisiteState::ACCEPTED->value, DVisiteState::FINISHED->value])
        ->firstWhere('type', $visitType);

    $UserProfile = $user->profile . '::';
    if (!$visit) {
        return false;
    }
    if ($user->hasRole(RoleEnum::INSADM->value)) {
        if ($visit->d_company_id == $user->userable_id) {
            return true;
        }
    }
    if ($user->hasRole($UserProfile . 'supervisor')) {
        $inspectors = $user->teamUsers->pluck('user_id')->toArray();
        $inspectors[] = $user->id;
        if ($visit->state == DVisiteState::FINISHED->value && $edit) {
            return false;
        }
        if (!in_array($visit->user_id, $inspectors)) {
            return false;
        }
    } elseif ($user->hasRole($UserProfile . 'inspector')) {
        if ($visit->state == DVisiteState::FINISHED->value && $edit) {
            return false;
        }
        if ($visit->user_id != $user->id) {
            return false;
        }
    }

    return true;
}

function canViewProjectByVisits($project, $user)
{
    if (isAdminOrCollab($user)) {
        return true;
    }
    $visits = $project->visits->whereIn('state', [DVisiteState::ACCEPTED->value, DVisiteState::FINISHED->value]);

    $roleMar = DCompanyProfile::MAR->value . '::';

    if ($user->hasRole($roleMar . 'supervisor')) {
        $inspectors = $user->teamUsers->pluck('user_id')->toArray();
        $inspectors[] = $user->id;
        $visits = $visits->whereIn('user_id', $inspectors);
        if ($visits->isEmpty()) {
            return false;
        }
    } elseif ($user->hasRole($roleMar . 'inspector')) {
        $visits = $visits->where('user_id', $user->id);
        if ($visits->isEmpty()) {
            return false;
        }
    }

    return true;
}

function getExtension($string)
{
    $parts = explode('/', $string);

    return '.' . $parts;
}
function getParentCompany()
{
    $user = auth()->user();
    if ($user->profile != DCompanyProfile::MAR->value) {
        return DCompany::find($user->company?->parent->d_company_id);
    }
    if ($user->hasRole(RoleEnum::MARCOl->value)) {
        return DCompany::find($user->company?->id);
    }

    return null;
}

function checkDocumentBeforeCreate($document, $dProject)
{
    $documentProject = DProjectDocument::where('type_doc', $document->type_doc)
        ->whereNotNull('type_doc')
        ->where('d_project_id', $dProject->id)
        ->first();
    if (!$documentProject) {

        $pDocument = $document->document;
        $company = prioritizeCompanyByDocumentType($pDocument->type ?? $document->type, $dProject);
        $companyDoc = $company->projectDocs()
            ->where('type_doc', $document->type_doc ?? $document->type)
            ->first();
        return DProjectDocument::create([
            'type_doc' => $document->type_doc ?? $document->type,
            'order_step' => $document->order_step,
            'name' => $document->entitled,
            'required' => $companyDoc->pivot->required,
            'd_project_id' => $dProject->id,
            'exported' => $pDocument?->exported ?? 0,
            'status' => DProjectDocumentStatus::NEW ->value,
            'nature_doc' => $companyDoc->pivot->nature_doc,
        ]);
    }
    return $documentProject;
}

function prioritizeCompanyByDocumentType($documentType, $dProject)
{
    switch ($documentType) {

        case PDocumentType::DEVIS_ENTREPRISE_RETENUE->value:
            $company = $dProject->installer_company;
            break;

        case PDocumentType::RELEVE_AUDIT->value:
            $company = $dProject->installer_company;
            break;

        default:
            $company = $dProject->company;
            break;
    }
    return $company;
}

function stepNotification($dProject, $step)
{
    try {
        if ($dProject->cleared_step_order == $dProject->current_step_order) {
            $message = __('notifications.project.steps.terminer.description', [
                'step' => $step->display_name,
                'reference' => $dProject->reference,
            ]);
            $subject = __('notifications.project.steps.terminer.subject', [
                'step' => $step->display_name,
            ]);
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.edit')
            );
            $user = $dProject->company->admins;
            notifyUsers(
                subject: $subject,
                description: $message,
                endPoint: $configUrl,
                users: $user,
                sendEmail: true,
            );
            sendNotificationCompany(
                $subject,
                $message,
                $configUrl,
                $dProject->company,
            );
            // sendNotificationCompany(
            //     $subject,
            //     $message,
            //     $configUrl,
            //     $dProject->installer_company,
            // );
        }
    } catch (\Throwable $th) {
    }
}

function sendNotificationMandataire(
    $subject,
    $description,
    $company,
    $endPoint = null,
    $greeting = null,
) {
    try {
        $notifSubject = PNotification::where('entitled', $subject)
            ->orWhere('subject', $subject)->value('subject');
        (new DNotificationService(new DNotification()))
            ->create($company, $notifSubject, $description, $endPoint, 'd_company_id');
        $company->notify(new SendUserNotification(
            $notifSubject,
            $description,
            null,
            $greeting
        ));
    } catch (\Throwable $th) {
        //throw $th;
    }
}
