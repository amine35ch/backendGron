<?php

namespace Database\Seeders;

use App\Models\DModelReference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DModelReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'format' => 'CLI000001',
                'table_name' => 'DClient',
                'type' => 'client',
                'prefix' => 'CLI',
            ],

            [
                'format' => 'INS000001',
                'table_name' => 'DCompany',
                'type' => 'INS',
                'prefix' => 'INS',

            ],
            [
                'format' => 'AUD000001',
                'table_name' => 'DCompany',
                'type' => 'AUD',
                'prefix' => 'AUD',

            ],
            [
                'format' => 'STT000001',
                'table_name' => 'DCompany',
                'type' => 'STT',
                'prefix' => 'STT',
            ],
            [
                'format' => 'MAR000001',
                'table_name' => 'DCompany',
                'type' => 'MAR',
                'prefix' => 'MAR',
            ],
            [
                'format' => 'MAN000001',
                'table_name' => 'DCompany',
                'type' => 'MAN',
                'prefix' => 'MAN',
            ],
            [
                'format' => 'BMAN00001',
                'table_name' => 'DCompany',
                'type' => 'BMAN',
                'prefix' => 'BMAN',
            ],
            [
                'format' => 'ANH000001',
                'table_name' => 'DGovernment',
                'type' => 'ANH',
                'prefix' => 'ANH',
            ],
            [
                'format' => 'ART000001',
                'table_name' => 'DArticle',
                'type' => 'ART',
                'prefix' => 'ART',
            ],
            [
                'format' => 'ART000001',
                'table_name' => 'DArticle',
                'type' => 'ART',
                'prefix' => 'ART',
            ]
            // [
            //     'format' => 'PRJ000001',
            //     'table_name' => 'DProject',
            //     'type' => 'project',
            //     'prefix' => 'PRJ',
            // ],

        ];

        foreach ($models as $model) {
            $existingRecord = DB::table('d_model_references')->where($model)->first();

            if (!$existingRecord) {
                DB::table('d_model_references')->insert($model);
            }
        }
    }
}
