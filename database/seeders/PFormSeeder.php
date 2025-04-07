<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PFormSeeder extends Seeder
{
    public function run()
    {
        DB::table('p_forms')->insert([
            [
                'id' => 1,
                'reference' => '1',
                'type_doc' => 1,
            ],
            [
                'id' => 2,
                'reference' => '1',
                'type_doc' => 2,
            ],
            [
                'id' => 3,
                'reference' => '1',
                'type_doc' => 3,
            ],
        ]);
    }
}
