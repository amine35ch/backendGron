<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'sub_category' => 'Autre'
            ],
            [
                'sub_category' => 'Chaudière - Régulateur (BAR-TH-106/BAT-TH-102)'
            ],
            [
                'sub_category' => "VMC - Bouche d'extraction (BAR-TH-127/BAR-TH-125/BAT-TH-125)"
            ],
            [
                'sub_category' => "VMC - Bouche d'entrée d'air (BAR-TH-127/BAT-TH-125)"
            ],
        ];

        foreach ($data as $datum) {
            \App\Models\PSubCategory::create($datum);
        }
    }
}
