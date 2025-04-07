<?php

namespace Database\Seeders;

use App\Models\PProjectEnergyClass;
use Illuminate\Database\Seeder;

class PProjectEnergyClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'entitled' => 'A',
                'type' => 0,
                'color'=>''
            ],
            [
                'entitled' => 'B',
                'type' => 1,
                'color'=>''

            ],
            [
                'entitled' => 'C',
                'type' => 2,
                'color'=>''
            ],
            [
                'entitled' => 'D',
                'type' => 3,
                'color'=>''
            ],
            [
                'entitled' => 'E',
                'type' => 4,
                'color'=>''
            ],
            [
                'entitled' => 'F',
                'type' => 5,
                'color'=>''
            ],
            [
                'entitled' => 'G',
                'type' => 6,
                'color'=>''
            ],
            [
                'entitled' => 'Aucun',
                'type' => 7,
                'color'=>''
            ],
        ];

        foreach ($classes as $type) {
            PProjectEnergyClass::create($type);
        }
    }
}
