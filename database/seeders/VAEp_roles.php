<?php

namespace Database\Seeders;

use App\Models\PPermission;
use App\Models\PRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VAEp_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prole = [

            'name' => 'VAE::admin',
            'display_name' => 'Root',
            'p_profile_id' => '1',
            'guard' => "web",
        ];
        $roles = [

            'name' => 'VAE::admin',
            'display_name' => 'Root',
            'p_profile_id' => '1',
            'guard_name' => "web",
        ];
        $role = PRole::firstOrCreate(['name' => 'VAE::admin'], $prole);
        DB::table('roles')->insert($roles);
        $permissions = PPermission::all();
        $permissionRoleData = $permissions->map(function ($permission) use ($role) {
            return [
                'p_role_id' => $role->id,
                'p_permission_id' => $permission->id,
                "permission_id" => $permission->permission_id,
            ];
        })->toArray();


        DB::table('p_permission_roles')->insert($permissionRoleData);
        $this->command->info("Role '{$role->name}' created and permissions mapped successfully.");
    }
}
