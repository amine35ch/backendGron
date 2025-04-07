<?php

namespace Database\Seeders;

use App\Enums\RoleEnum\RoleEnum;
use App\Models\PPermission;
use App\Models\PPermissionRole;
use App\Models\PResource;
use App\Models\PRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ScriptPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();
        $permissions = config('permissions');

        foreach ($permissions as $permission) {
            if (
                isset($permission['projects']) || isset($permission['documents'])
                || isset($permission['steps']) || isset($permission['users']) ||  isset($permission['statistic']) ||  isset($permission['subscription'])
            ) {
                foreach (['projects', 'documents', 'steps', 'users','statistic','subscription'] as $key) {
                    if (isset($permission[$key])) {
                        foreach ($permission[$key] as $item) {
                            Permission::firstOrCreate([
                                'name' => $item['en'],
                                'guard_name' => 'web',
                            ]);
                        }
                    }
                }
            } else {
                Permission::firstOrCreate([
                    'name' => $permission['en'],
                    'guard_name' => 'web',
                ]);
            }
        }

        DB::table('p_permissions')->truncate();
        $resources = PResource::all();
        // $resources = PResource::where('id', 6)->get();
        $permissions = config('permissions');
        foreach ($resources as $resource) {
            foreach ($permissions as $permission) {
                // Check if any of the keys 'projects', 'documents', or 'steps' exist
                if (isset($permission['projects']) || isset($permission['documents']) || isset($permission['steps']) || isset($permission['users'])  || isset($permission['statistic']) || isset($permission['subscription'])) {
                    // Loop through each key dynamically
                    foreach (['projects', 'documents', 'steps', 'users','statistic','subscription'] as $key) {
                        // Check if the current key exists in the $permission array
                        if (isset($permission[$key])) {
                            // Check if the resource is entitled to the current key
                            if ($resource->entitled == $key) {
                                foreach ($permission[$key] as $pr) {
                                    $permissionSpatie = Permission::where('name', $pr['en'])->first();

                                    PPermission::firstOrCreate([
                                        'entitled' => $pr['en'],
                                        'local_fr' => $pr['fr'],
                                        'permission_id' => $permissionSpatie->id,
                                        'p_resource_id' => $resource->id,
                                    ]);
                                }
                            }
                        }
                    }
                } else {
                    // If none of the keys exist, create permission using the default 'name' key
                    if (str_contains($permission['en'], $resource->entitled)) {
                        $permissionSpatie = Permission::where('name', $permission['en'])->first();

                        PPermission::firstOrCreate([
                            'entitled' => $permission['en'],
                            'local_fr' => $permission['fr'],
                            'permission_id' => $permissionSpatie->id,
                            'p_resource_id' => $resource->id,
                        ]);
                    }
                }
            }
        }

        DB::table('p_permission_roles')->truncate();
        $roles = PRole::all();

        $permissions = config('permissionsByRole');

        foreach ($roles as $role) {

            if (
                isset($permissions[$role->name])
            ) {
                foreach ($permissions[$role->name] as $permission) {
                    $pPermission = PPermission::where('entitled', $permission)->first();
                    if (! $pPermission) {
                        dd($permission);
                    }

                    PPermissionRole::firstOrCreate([
                        'p_role_id' => $role->id,
                        'p_permission_id' => $pPermission->id,
                        'permission_id' => $pPermission->permission_id,
                    ]);
                }
            }
        }
        DB::table('model_has_permissions')->truncate();

        $users=User::all();
        foreach ($users as $user) {
            $user->syncPermissions([]);
            $role=$user->role;
            $user->syncRoles([]);
            if ($role !== RoleEnum::SBBADM->value) {
                $user->assignRole($role);
                $roleM=Role::where('name',$role)->first();
                assignPermissionsTo($user, $roleM->name);
            }else{
                $roleM=Role::where('name',$role)->first();
                $user->assignRole($roleM);
            }
        }
    }
}
