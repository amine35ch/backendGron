<?php

namespace Database\Seeders;

use App\Models\PProjectType;
use Illuminate\Database\Seeder;

class PProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'entitled' => 'Demande',
                'type' => 0,
            ],
            [
                'entitled' => 'Projet',
                'type' => 1,
            ],
        ];

        foreach ($types as $type) {
            PProjectType::create($type);
        }
    }
}
