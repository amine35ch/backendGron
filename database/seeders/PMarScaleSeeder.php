<?php

namespace Database\Seeders;

use App\Models\PMarScale;
use Illuminate\Database\Seeder;

class PMarScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'income_classe' => 0,
                'mar_scale' => 1,
                'mar_cap' => 2000,
            ],
            [
                'income_classe' => 1,
                'mar_scale' => 0.8,
                'mar_cap' => 2000,
            ],
            [
                'income_classe' => 2,
                'mar_scale' => 0.4,
                'mar_cap' => 2000,
            ],
            [
                'income_classe' => 3,
                'mar_scale' => 0.2,
                'mar_cap' => 2000,
            ],
            [
                'income_classe' => 4,
                'mar_scale' => 0,
                'mar_cap' => 0,
            ],
        ];
        PMarScale::insert($array);
    }
}
