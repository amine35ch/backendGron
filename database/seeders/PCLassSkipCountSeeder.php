<?php

namespace Database\Seeders;

use App\Models\PClassSkipCount;
use Illuminate\Database\Seeder;

class PCLassSkipCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'entitled' => '2',
                'type' => 0,
            ],
            [
                'entitled' => '3',
                'type' => 1,
            ],
            [
                'entitled' => '4 ou plus',
                'type' => 2,
            ],
        ];
        PClassSkipCount::insert($array);
    }
}
