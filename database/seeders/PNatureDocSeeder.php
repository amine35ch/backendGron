<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PNatureDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'entitled' => 'Attached',
                'nature' => 0,
            ],
            [
                'entitled' => 'Generated',
                'nature' => 1,
            ],
            [
                'entitled' => 'Generated with form',
                'nature' => 2,
            ],
            [
                'entitled' => 'Generated with form and can be attached (Facultatif)',
                'nature' => 3,
            ],
            [
                'entitled' => 'Generated and can be attached (Facultatif)',
                'nature' => 4,
            ],
            [
                'entitled' => 'Downloaded',
                'nature' => 5,
            ],
        ];

        DB::table('p_nature_docs')->insert($data);
    }
}
