<?php

namespace Database\Seeders;

use App\Models\PPermission;
use App\Models\PResource;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

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
    }
}
