<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'entitled' => 'QualiPAC',
                'type' => 1
            ],
            [
                'entitled' => 'QualiBois',
                'type' => 2
            ],
            [
                'entitled' => 'QualiPV',
                'type' => 3
            ],
            [
                'entitled' => 'QualiSOL',
                'type' => 4
            ],
            [
                'entitled' => 'OPQIBI',
                'type' => 5
            ],
            [
                'entitled' => 'Chauffage+',
                'type' => 6
            ],
            [
                'entitled' => 'Ventilation+',
                'type' => 7
            ],
            [
                'entitled' => 'QualiBAT',
                'type' => 8
            ],
            [
                'entitled' => 'CertiBAT',
                'type' => 9
            ],
            [
                'entitled' => 'Qualifec',
                'type' => 10
            ],
            [
                'entitled' => 'AFNOR',
                'type' => 11
            ],
        ];

        DB::table('p_qualifications')->insert($data);
    }
}
