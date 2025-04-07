<?php

namespace Database\Seeders;

use App\Models\PPermission;
use App\Models\PPermissionRole;
use App\Models\PRole;
use Illuminate\Database\Seeder;

class PPermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
