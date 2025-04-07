<?php

namespace Database\Seeders;

use App\Models\PBar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_bars')->truncate();
        $data = [
            [
                'reference' => 'ITE',
            ],
            [
                'reference' => 'ITI',
            ],
            [
                'reference' => 'Combles Perdus à dérouler',
            ],
            [
                'reference' => 'Combles Perdus par soufflage',
            ],
            [
                'reference' => "Isolation thermique de Rampants de toiture",
            ],
            [
                'reference' => "Isolation thermique des toitures-terrasses",
            ],
            [
                'reference' => "Isolation thermique d'un plancher bas",
            ],
            [
                'reference' => "PAC air/eau",
            ],
            [
                'reference' => "PAC air/air",
            ],
            [
                'reference' => "Thermodynamique",
            ],
            [
                'reference' => "VMC simple ou double flux",
            ],
            [
                'reference' => "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
            ],

        ];

        $this->command->info('Seeding PBar...');
        $this->command->getOutput()->progressStart(count($data));

        foreach ($data as $datum) {
            PBar::firstOrCreate($datum);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();

        $this->command->info('PBar seeded!');
    }
}
