<?php

namespace Database\Seeders;

use App\Models\PTypeDemandeProject;
use Illuminate\Database\Seeder;

class PTypeDemandeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'entitled' => 'Contact Direct',
                'type' => 1,
            ],
            [
                'entitled' => 'ANAH',
                'type' => 2,
            ],
        ];

        foreach ($types as $type) {
            PTypeDemandeProject::create($type);
        }
    }
}
