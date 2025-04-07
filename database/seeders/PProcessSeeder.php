<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_processes')->insert([
            [
                'entitled' => 'TEST',
                'type' => 0,
            ],
        ]);
    }
}
