<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            // [
            //     'name' => 'root',
            //     'guard_name' => 'internal',
            //     'display_name' => 'ROOT',
            //     'p_profile_id' => 1
            // ],
            [
                'name' => 'MAR::admin',
                'guard_name' => 'web',
                'display_name' => 'Admin',
                'p_profile_id' => 2,

            ],
            [
                'name' => 'MAR::collaborator',
                'guard_name' => 'web',
                'display_name' => 'Collaborateur',
                'p_profile_id' => 2,

            ],
            [
                'name' => 'MAR::supervisor',
                'guard_name' => 'web',
                'display_name' => 'Superviseur',
                'p_profile_id' => 2,

            ],
            [
                'name' => 'MAR::inspector',
                'guard_name' => 'web',
                'display_name' => 'Inspecteur',
                'p_profile_id' => 2,
            ],
            [
                'name' => 'INS::admin',
                'guard_name' => 'web',
                'display_name' => 'Admin',
                'p_profile_id' => 3,

            ],
            [
                'name' => 'INS::collaborator',
                'guard_name' => 'web',
                'display_name' => 'Collaborateur',
                'p_profile_id' => 3,
            ],
            [
                'name' => 'INS::supervisor',
                'guard_name' => 'web',
                'display_name' => 'Superviseur',
                'p_profile_id' => 3,

            ],
            [
                'name' => 'INS::inspector',
                'guard_name' => 'web',
                'display_name' => 'Inspecteur',
                'p_profile_id' => 3,
            ],
            [
                'name' => 'AUD::admin',
                'guard_name' => 'web',
                'display_name' => 'Admin',
                'p_profile_id' => 4,

            ],
            [
                'name' => 'AUD::collaborator',
                'guard_name' => 'web',
                'display_name' => 'Collaborateur',
                'p_profile_id' => 4,
            ],
            [
                'name' => 'AUD::supervisor',
                'guard_name' => 'web',
                'display_name' => 'Superviseur',
                'p_profile_id' => 2,

            ],
            [
                'name' => 'AUD::inspector',
                'guard_name' => 'web',
                'display_name' => 'Inspecteur',
                'p_profile_id' => 2,
            ],
            [
                'name' => 'STT::admin',
                'guard_name' => 'web',
                'display_name' => 'Admin',
                'p_profile_id' => 5,

            ],
            [
                'name' => 'STT::collaborator',
                'guard_name' => 'web',
                'display_name' => 'Collaborateur',
                'p_profile_id' => 5,
            ],
            [
                'name' => 'ANH::admin',
                'guard_name' => 'web',
                'display_name' => 'Admin',
                'p_profile_id' => 6,
            ],

            [
                'name' => 'SUB::admin',
                'guard_name' => 'api',
                'display_name' => 'Admin',
                'p_profile_id' => 7,
            ],

        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
