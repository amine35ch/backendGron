<?php

namespace Database\Seeders;

use App\Models\PNatureResidence;
use Illuminate\Database\Seeder;

class PNatureResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operations = [
            [
                'entitled' => 'maison individuelle',
                'type' => 0,
            ],
            [
                'entitled' => 'un appartement',
                'type' => 1,
            ],
        ];
        PNatureResidence::insert($operations);
    }
}
