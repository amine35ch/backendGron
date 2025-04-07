<?php

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\PStepEnum\PStepOrder;
use App\Enums\UserEnum\UserProfileEnum;
use App\Models\DProjectDocument;
use App\Models\PPermissionRole;
use App\Models\PRole;
use Illuminate\Auth\Access\AuthorizationException;
use Spatie\Permission\Models\Role;

function assignPermissionsTo($user, $role)
{
    $pRole = PRole::whereName($role)->first();
    PPermissionRole::where('p_role_id', $pRole?->id)
        ->get()
        ->each(
            fn($rolePermission) => $user->givePermissionTo($rolePermission->permission)
        );
}

function revokePermissionsTo($user)
{
    $user->permissions->each(function ($permission) use ($user) {

        $user->revokePermissionTo($permission->name);
    });
}
function canAccessOnlyHisOwn($user, $permission, $currentRole, $modelToCheck)
{
    $isHolder = $user->hasRole($currentRole)
        && $user->id == $modelToCheck->id;

    $anotherCurrentUser = !$user->hasRole($currentRole) && $user->hasAnyDirectPermission($permission);

    return $isHolder || $anotherCurrentUser;
}
function canViewClient($user, $client, $permission)
{
    $hasClientAccess = false;
    $projects = $client->projects;
    foreach ($projects as $project) {
        $dOperation = $project->operations->where('d_company_id', $user->userable_id);
        if ($dOperation) {
            $hasClientAccess = true;
            break 1;
        }
    }
    $hasPermission = $user->can($permission);

    if ($user->profile == DCompanyProfile::MAR->value) {
        return $hasPermission;
    } else {
        return $hasPermission && $user->userable_id == $client->d_company_id || $hasClientAccess;
    }
}

function accessByCompany($user, $model, $permission)
{
    return (
        $user->profile != DCompanyProfile::MAR->value
        && $user->userable_id ==
        $model->d_company_id && $user->can($permission))
        || ($user->can($permission) && $user->profile == DCompanyProfile::MAR->value);
}

function canAccess(
    $user,
    $permission,
    $model
) {
    $relatedCompanyIds = $model->company
        ->children
        ->pluck('d_company_child_id')->toArray();
    $checkAccess = $user->hasAnyDirectPermission($permission)
        && in_array($user->company->id, $relatedCompanyIds);

    return $checkAccess || ($user->company->id == $model->company->id
        && $user->hasAnyDirectPermission($permission));
}

function canAccessCompany($user, $method, $dCompany)
{
    return $user->hasAnyDirectPermission($method) && canAccessCompanyById($dCompany);
}

function canAccessGovernment($user, $permission, $model)
{
    if ($user->profile == DCompanyProfile::MAR->value) {
        return true;
    }
    $hasAccess = $model->id == $user->userable_id;

    return $hasAccess && $user->hasAnyDirectPermission($permission);
}

function getRoles()
{
    return Role::all()->pluck('name');
}

function checkPermissionForGlobalUsers($user, $method, $resource = 'users')
{
    $permissions = permissionsByResource($user, $resource)->where('authorized', true)

        ->filter(function ($permission) use ($method, $user) {
            return str_contains($permission['name'], $user->profile) &&
                str_contains($permission['name'], $method);
        })->values()->pluck('name')->toArray();

    return $user->hasAnyDirectPermission($permissions) && canAccessCompanyById($user->company);
}

function checkPermissionForGlobalUsersWithRole($user, $method, $role, $resource = 'users')
{
    $permissions = permissionsByResource($user, $resource)->where('authorized', true)
        ->filter(function ($permission) use ($method, $role, $user) {
            if (str_contains($role, '::')) {
                $role = explode('::', $role)[1];
            }
            return str_contains($permission['name'], $user->profile . '::' . $role)
                && str_contains($permission['name'], $method);
        })->values()->pluck('name')->toArray();

    return $user->hasAnyDirectPermission($permissions) && canAccessCompanyById($user->company);
}

function checkPermissionForSpecificUser($user, $relatedUser, $method, $resource = 'users')
{

    $permissions = permissionsByResource($user, $resource)->where('authorized', true)
        ->filter(function ($permission) use ($relatedUser, $method) {
            return str_contains($permission['name'], $method) &&
                str_contains($permission['name'], $relatedUser->role);
        })->values()->pluck('name')->toArray();

    return $user->hasAnyDirectPermission($permissions) && canAccessCompanyById($user->company);
}

function canAccessCompanyById($dCompany)
{
    $company = auth()->user()->company;
    $relatedCompanyIds = $company
        ->children
        ->pluck('d_company_child_id')->toArray();
    if ($company->profile == 'INS') {
        if (!$company->parentCompany) {
            foreach ($company->parentCompany->children as $children) {
                $relatedCompanyIds[] = $children->child->where('profile', 'MAN')->value('id');
            }
            $relatedCompanyIds = array_unique($relatedCompanyIds);
        }
    }
    return $dCompany->id == $company->id
        || in_array($dCompany->id, $relatedCompanyIds);
}

function permissionsByResource($user, $resource)
{
    return $user->permissionList
        ->where('resource_name_en', $resource)
        ->flatMap(function ($item) {
            return $item['permissions'];
        });
}

function canAccessProject($dProject, $user, $permission)
{

    $hasAccess = $dProject->operations->where(
        'd_company_id',
        getCompanyOfConnectedUser()->id
    )->isNotEmpty();
    // if ($user->profile == DCompanyProfile::INS->value && $dProject->current_step_order == PStepOrder::StepValidationDocumentsBeforeVisit->value) {
    //     return true;
    // }
    return $hasAccess && $user->hasAnyDirectPermission($permission) &&
        canViewProjectByVisits($dProject, $user);
}

function canAccessFromCompany($model, $user, $permission)
{
    if ($user->profile == DCompanyProfile::MAR->value) {
        return true;
    }
    $hasAccess = $model->d_company_id == $user->userable_id;

    return $hasAccess && $user->hasAnyDirectPermission($permission);
}

function canAccessCatalog($model, $user, $permission)
{
    if ($user->profile == DCompanyProfile::MAR->value) {
        return true;
    }
    $hasAccess = $user->company?->id == $model->d_company_id;

    return $hasAccess && $user->hasAnyDirectPermission($permission);
}

function canAccessArticle($model, $user, $permission)
{
    $isMar = $user->profile == DCompanyProfile::MAR->value &&
        $model->mar_id == $user->userable_id;
    if ($isMar) {
        return true;
    }
    $hisArticle = $user->userable_id == $model->d_company_id;
    $isParentArticle = $model->access == 1 && $user->company->parent_company_id == $model->mar_id;
    return ($hisArticle || $isParentArticle) && $user->hasAnyDirectPermission($permission);
}

function checkArticle($model, $user, $permission)
{

    $isPresMar = $model->type == DArticleType::SERVICE_MAR->value;
    $isMar = $user->profile == DCompanyProfile::MAR->value;
    if ($isPresMar) {
        $resource = 'mar_services';
        $canAccess = canAccessArticle($model, $user, $permission . ' ' . $resource);

        return $canAccess && $isPresMar && $isMar;
    }

    return canAccessArticle($model, $user, $permission . ' articles');
}

function canEditArticle($model, $user, $permission, $childRelationship = 'articlePrices')
{
    $canView = canAccessArticle($model, $user, $permission);
    $isValidated = $model->is_validated;
    $activated = $model->$childRelationship->where(
        'd_company_id',
        $user->userable_id
    )->where(
        'state',
        DArticleState::ACTIVATED->value
    )->first();

    if ($canView && $user->profile == DCompanyProfile::MAR->value) {
        return true;
    }

    return $canView && $isValidated && $activated;
}

function filterRolesByPermissions($user, $resource = 'users')
{
    return permissionsByResource($user, $resource)->where('authorized', true)
        ->map(function ($permission) use ($user) {
            foreach (methods() as $method) {
                if (
                    str_contains($permission['name'], $method) &&
                    str_contains($permission['name'], $user->profile)
                ) {
                    return rtrim(ltrim(str_replace($method, '', $permission['name'])), 's');
                }
            }
        })->unique()->filter()->values()->toArray();
}

function syncPermissions($user, $role)
{
    revokePermissionsTo($user);
    $user->syncRoles([$role]);
    assignPermissionsTo($user, $role);
}

function methods()
{
    return [
        'create',
        'view',
        'update',
        'delete',
        'disable',
        'validate',
    ];
}

function canDeleteDocument($user, DProjectDocument $dProjectDocument)
{

    if (!$user->hasRole($user->profile . '::admin')) {
        return false;
    }
    $hasAccess = $dProjectDocument->project?->operations()?->where('d_company_id', $user->userable_id)->exists();
    return $hasAccess;
}

function canViewGeneralNotification($user, $dGeneralNotification)
{
    $roles = $dGeneralNotification->roles;
    foreach ($roles as $role) {
        if ($role->name == $user->role) {
            return true;
        }
        return false;
    }
}
