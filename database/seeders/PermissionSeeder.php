<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
    }
}
