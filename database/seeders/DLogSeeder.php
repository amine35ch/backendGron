<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'd_company_id' => 1,
                'd_company_child_id ' => 2,
            ],
        ];

        DB::table('d_company_childs')->insert($data);
    }
}
