<?php

namespace Database\Seeders;

use App\Models\PUnit;
use Illuminate\Database\Seeder;

class PUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'entitled' => 'unité',
                'type' => 0,
            ],
            [
                'entitled' => 'm²',
                'type' => 1,
            ],
            [
                'entitled' => 'm',
                'type' => 2,
            ],
            [
                'entitled' => 'm³',
                'type' => 3,
            ],
            [
                'entitled' => 'ml',
                'type' => 4,
            ],
            [
                'entitled' => 'mm',
                'type' => 5,
            ],
            [
                'entitled' => 'm².K/W',
                'type' => 6,
            ],
            [
                'entitled' => 'KW',
                'type' => 7,
            ],
            [
                'entitled' => '%',
                'type' => 8,
            ],
            [
                'entitled' => 'L',
                'type' => 9,
            ],
            [
                'entitled' => '°C',
                'type' => 10,
            ],
            [
                'entitled' => 'WThC',
                'type' => 11,
            ],
            [
                'entitled' => 'W/m²',
                'type' => 12,
            ],
        ];

        foreach ($units as $unit) {
            PUnit::firstOrCreate($unit);
        }
    }
}
