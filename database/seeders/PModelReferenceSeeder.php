<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PModelReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'format' => 'CLI000001',
                'table_name' => 'DClient',
                'type' => 'client',
                'prefix' => 'CLI',
            ],

            [
                'format' => 'INS000001',
                'table_name' => 'DThirdParty',
                'type' => 'INS',
                'prefix' => 'INS',

            ],
            [
                'format' => 'AUD000001',
                'table_name' => 'DThirdParty',
                'type' => 'AUD',
                'prefix' => 'AUD',

            ],
            [
                'format' => 'STT000001',
                'table_name' => 'DSubContractor',
                'type' => 'STT',
                'prefix' => 'STT',
            ],
            [
                'format' => 'MAR000001',
                'table_name' => 'Mar',
                'type' => 'MAR',
                'prefix' => 'MAR',
            ],
            [
                'format' => 'MAN000001',
                'table_name' => 'MAN',
                'type' => 'MAN',
                'prefix' => 'MAN',
            ],
            [
                'format' => 'PRJ000001',
                'table_name' => 'DProject',
                'type' => 'project',
                'prefix' => 'PRJ',

            ],

        ];

        DB::table('p_model_references')->insert($data);
    }
}
