<?php

namespace Database\Seeders;

use App\Models\PRaisonTypes;
use Illuminate\Database\Seeder;

class PRaisonTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'entitled' => 'SARL',
                'type' => 0,
            ],
            [
                'entitled' => 'SA',
                'type' => 1,
            ],
            [
                'entitled' => 'SAS',
                'type' => 2,
            ],
            [
                'entitled' => 'SASU',
                'type' => 3,
            ],
            [
                'entitled' => 'EURL',
                'type' => 4,
            ],
            [
                'entitled' => 'EI',
                'type' => 5,
            ],
            [
                'entitled' => 'SCOP',
                'type' => 6,
            ],
            [
                'entitled' => 'SCA',
                'type' => 7,
            ],
            [
                'entitled' => 'SCS',
                'type' => 8,
            ],
        ];
        PRaisonTypes::insert($array);
    }
}
