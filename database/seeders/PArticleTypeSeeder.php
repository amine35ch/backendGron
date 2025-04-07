<?php

namespace Database\Seeders;

use App\Models\PArticleType;
use Illuminate\Database\Seeder;

class PArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'entitled' => 'Produit',
                'type' => 0,
            ],
            [
                'entitled' => 'Prestation',
                'type' => 1,
            ],
            [
                'entitled' => 'Prestation MAR',
                'type' => 2,
            ],
        ];
        PArticleType::withoutEvents(function () use ($array) {

            PArticleType::insert($array);
        });
    }
}
