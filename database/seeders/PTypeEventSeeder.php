<?php

namespace Database\Seeders;

use App\Enums\PTypeEventEnum\PTypeEventEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PTypeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_type_events')->insert([
            [
                'entitled' => 'Visite',
                'type' => PTypeEventEnum::VISIT->value,
                'color' => '#3788D8',
            ],
            [
                'entitled' => 'Travaux planifié',
                'type' => PTypeEventEnum::PLANNED_TRV->value,
                'color' => '#FFC439',

            ],
            [
                'entitled' => 'Travaux réel',
                'type' => PTypeEventEnum::REAL_TRV->value,
                'color' => '#86A039',
            ],
            [
                'entitled' => 'Travaux fin prévu',
                'type' => PTypeEventEnum::PLANNED_END_TRV->value,
                'color' => '#86A039',
            ],
            [
                'entitled' => 'Travaux fin réel',
                'type' => PTypeEventEnum::REAL_END_TRV->value,
                'color' => '#86A039',
            ],

        ]);
    }
}
