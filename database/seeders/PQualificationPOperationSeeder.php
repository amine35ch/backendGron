<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PQualificationPOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_qualifications_p_operations')->insert([
            [
                'operation_type' => 0,
                'qualification_type' => 1,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 2,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 3,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 4,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 5,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 6,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 7,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 8,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 9,
            ],
            [
                'operation_type' => 0,
                'qualification_type' => 10,
            ],
            [
                'operation_type' => 1,
                'qualification_type' => 11,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 1,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 2,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 3,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 4,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 5,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 6,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 7,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 8,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 9,
            ],
            [
                'operation_type' => 2,
                'qualification_type' => 10,
            ],
        ]);
    }
}
