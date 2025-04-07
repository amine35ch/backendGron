<?php

namespace Database\Seeders;

use App\Models\PProjectResidence;
use Illuminate\Database\Seeder;

class PProjectResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $residences = [
            [
                'entitled' => 'Principale',
                'type' => 0,
            ],
            [
                'entitled' => 'Secondaire',
                'type' => 1,
            ],
        ];

        foreach ($residences as $residence) {
            PProjectResidence::create($residence);
        }
    }
}
