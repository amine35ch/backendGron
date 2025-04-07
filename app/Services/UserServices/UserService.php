<?php

namespace App\Services\UserServices;

use App\Enums\POperationEnum\POperationType;
use App\Enums\PStateEnum\PStateEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Exceptions\CustomException;
use App\Models\DUserOperation;
use App\Models\POperation;
use App\Models\PRole;
use App\Models\User;
use App\Services\TeamUserServices\TeamUserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function __construct(private User $user) {}

    public function create(array $data, $model, $admin = null)
    {
        try {
            DB::beginTransaction();
            $profile = $model->profile;
            $userData = $data;
            unset($userData['role']);
            $user = new $this->user($userData + [
                'company_code' => $model->code,
                'profile' => $profile,
            ]);

            $model->users()->save($user);
            $user->save();
            if (str_contains($data['role'], '::')) {
                $role = Role::where('name', $data['role'])->first();
            } else {
                $role = Role::where('name', $profile . '::' . $data['role'])->first();
            }
            if ($role == RoleEnum::MARCOl->value) {
                $this->addMarCollabOperations($user);
            }

            $this->addUserNotification($user, $role);

            $user->assignRole($role);
            assignPermissionsTo($user, $role->name);
            if (!$admin && (isset($data['password']) && isset($data['username']))) {

                $this->notifyCollab($user, $data['password']);
            }

            if (isset($data['supervisor_id'])) {
                $teamUserService = new TeamUserService();
                $teamUserService->create([
                    'supervisor_id' => $data['supervisor_id'],
                    'user_id' => $user->id,
                ]);
            }

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function notifyCollab($user, $password)
    {
        $companyCode = $user->company->code;
        try {
            $message = __(
                'notifications.collaborator.create',
                [
                    'company_code' => $companyCode,
                ]
            );
            sendNotificationUser(
                'Ajouter un Collaborateur',
                $message,
                null,
                [
                    'username' => $user->username,
                    'password' => $password,
                    'company_code' => $companyCode,
                ],
                [$user],
                $user->first_name ?? null
            );
        } catch (\Exception $e) {
        }
    }

    public function addUserNotification($user, $role)
    {
        $role = PRole::where('name', $role->name)->first();
        $notifications = $role->notifications;

        $data = [];
        foreach ($notifications as $notification) {
            $data[] = [
                'user_id' => $user->id,
                'p_notification_id' => $notification->id,
                'entitled' => $notification->entitled,
                'subject' => $notification->subject,
                'mail' => $notification->mail,
                'web' => $notification->web,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('p_user_notifications')->insert($data);
    }

    public function addMarCollabOperations($user)
    {
        DUserOperation::create([
            'user_id' => $user->id,
            'p_operation_id' => POperation::where('type', POperationType::AUDIT->value)->value('id'),
        ]);
    }

    public function edit(array $data, User $user)
    {
        try {

            DB::beginTransaction();
            $user->update($data);
            if (str_contains($data['role'], '::')) {
                $data['role'];
            } else {
                $role = $user->profile . '::' . $data['role'];
            }
            $role = $user->profile . '::' . $data['role'];
            if ($user->role != $role) {
                syncPermissions($user, $role);
            }
            if (isset($data['password'])) {
                $message = __(
                    'notifications.collaborator.change_password',
                    [
                        'admin' => auth()->user()->username,
                        'password' => $data['password'],
                    ]
                );
                $credentials = [
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'company_code' => $user->company_code,
                ];
                sendNotificationUser(
                    'Changement mot de passe',
                    $message,
                    null,
                    $credentials,
                    [$user],
                    null
                );
            }
            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function delete(User $user): void
    {
        $user->deleted_by = auth()->user()->id;
        $user->save();
        $user->delete();
    }

    public function getById(int $id)
    {
        return $this->user::find($id);
    }


    public function getSuperviseurInspecteur($filters)
    {
        $connectedUserCompanyIds[] = getCompanyOfConnectedUser()->id;
        $user = auth()->user();

        $roles = filterRolesByPermissions($user);
        if ($user->role == RoleEnum::MARADM->value) {
            $roles = [
                RoleEnum::MARSUP->value,
                RoleEnum::MARINS->value,
            ];
            $childIds = $user->company->children->pluck('d_company_child_id');
            foreach ($childIds as $key => $childId) {
                $connectedUserCompanyIds[] = $childId;
            }
        }
        $query = $this->user::where('id', '!=', $user->id)
            ->whereHas('company', function ($query) use ($connectedUserCompanyIds) {
                $query->whereIn('id', $connectedUserCompanyIds);
            })->whereHas(
                'roles',
                function ($q) use ($roles) {
                    $q->whereIn('name', $roles);
                }
            );
        return collection($query, $filters);
    }
    public function getAll($filters)
    {
        $connectedUserCompanyIds[] = getCompanyOfConnectedUser()->id;
        $user = auth()->user();

        $roles = filterRolesByPermissions($user);
        if ($user->role == RoleEnum::MARADM->value) {
            $roles = [
                RoleEnum::MARADM->value,
                RoleEnum::MARCOl->value,
                RoleEnum::MARSUP->value,
                RoleEnum::MARINS->value,
                RoleEnum::AUDADM->value,
                RoleEnum::INSADM->value,
                RoleEnum::INSSUP->value,
                RoleEnum::INSINS->value,
            ];
            $childIds = $user->company->children->pluck('d_company_child_id');
            foreach ($childIds as $key => $childId) {
                $connectedUserCompanyIds[] = $childId;
            }
        }
        $query = $this->user::where('id', '!=', $user->id)
            // ->whereNotNull('password')
            ->whereHas('company', function ($query) use ($connectedUserCompanyIds) {
                $query->whereIn('id', $connectedUserCompanyIds);
            })->whereHas(
                'roles',
                function ($q) use ($roles) {
                    $q->whereIn('name', $roles);
                }
            );
        return collection($query, $filters);
    }

    public function getAllCollab($filters)
    {
        $connectedUserCompanyIds[] = getCompanyOfConnectedUser()->id;
        $user = auth()->user();

        $roles = [
            RoleEnum::MARCOl->value,
            RoleEnum::MARSUP->value,
            RoleEnum::MARINS->value,
        ];
        $childIds = $user->company->children->pluck('d_company_child_id');
        foreach ($childIds as $key => $childId) {
            $connectedUserCompanyIds[] = $childId;
        }

        $query = $this->user::where('id', '!=', $user->id)
            ->whereNotNull('password')
            ->whereHas('company', function ($query) use ($connectedUserCompanyIds) {
                $query->whereIn('id', $connectedUserCompanyIds);
            })->whereHas(
                'roles',
                function ($q) use ($roles) {
                    $q->whereIn('name', $roles);
                }
            );
        return collection($query, $filters);
    }

    public function disableUser(User $user)
    {
        if (!$user->visits->isEmpty()) {
            throw new CustomException('La désactivation est impossible de cette utilisateur en raison de ses engagements dans des projets en cours');
        }
        $user->state = ($user->state == PStateEnum::ACTIVATED->value)
            ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $user->save();

        return true;
    }

    public function getProfile()
    {
        return $this->user::findOrfail(auth()->user()->id);
    }

    public function updateProfile(array $data, $user)
    {
        if ($data['password'] == null) {
            unset($data['password']);
        } else {
            $message = __(
                'notifications.profile.change_password',
                [
                    'admin' => auth()->user()->username,
                    'password' => $data['password'],
                ]
            );
            $credentials = [
                'username' => $data['username'],
                'password' => $data['password'],
                'company_code' => $user->company_code,
            ];
            sendNotificationUser(
                'Changement mot de passe',
                $message,
                null,
                $credentials,
                [$user],
                null
            );
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        return $user;
    }

    public function getInspectors($filters)
    {
        $connectedUserCompanyId = getCompanyOfConnectedUser()->id;
        $user = auth()->user();

        $roles = [
            $user->profile . '::supervisor',
            $user->profile . '::collaborator',
            $user->profile . '::inspector',
        ];

        $query = $this->user::where('id', '!=', $user->id)
            ->whereHas('company', function ($query) use ($connectedUserCompanyId) {
                $query->where('id', $connectedUserCompanyId);
            })->whereHas(
                'roles',
                function ($q) use ($roles) {
                    $q->whereIn('name', $roles);
                }
            );
        return collection($query, $filters);
    }
}
