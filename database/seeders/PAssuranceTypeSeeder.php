<?php

namespace Database\Seeders;

use App\Models\PAssuranceType;
use Illuminate\Database\Seeder;

class PAssuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'entitled' => 'Résponsabilité Civile',
                'type' => 0,
            ],
            [
                'entitled' => 'Résponsabilité Travaux',
                'type' => 1,
            ],
        ];
        PAssuranceType::insert($array);
    }
}
