<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category' => 'Autre'
            ],
            [
                'category' => 'Isolation'
            ],
            [
                'category' => 'Calorifuge'
            ],
            [
                'category' => 'Ventilation'
            ],
            [
                'category' => 'Chauffage'
            ],
            [
                'category' => 'Consommable & accessoire'
            ],
        ];

        foreach ($data as $datum) {
            \App\Models\PCategory::create($datum);
        }
    }
}
