<?php

namespace Database\Seeders;

use App\Models\PProjectIncomeClass;
use Illuminate\Database\Seeder;

class PProjectIncomeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'entitled' => 'Trés Modeste',
                'type' => 0,
                'color'=>'#5a9ad7'
            ],
            [
                'entitled' => 'Modestes',
                'type' => 1,
                'color'=>'#f4d907'
            ],
            [
                'entitled' => 'Intérmédiaires',
                'type' => 2,
                'color'=>'#9933ff'
            ],
            [
                'entitled' => 'Classiques',
                'type' => 3,
                'color'=>'#fd9999'
            ],
            [
                'entitled' => 'Aucun',
                'type' => 4,
                'color'=>'#4c4e64de'
            ],
        ];

        foreach ($classes as $type) {
            PProjectIncomeClass::create($type);
        }
    }
}
