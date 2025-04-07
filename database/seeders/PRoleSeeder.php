<?php

namespace Database\Seeders;

use App\Models\PRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role) {
            $data = [
                'name' => $role->name,
                'guard' => $role->guard_name,
                'display_name' => $role->display_name,
                'p_profile_id' => $role->p_profile_id,
            ];
            PRole::firstOrCreate($data);
        }
    }
}
