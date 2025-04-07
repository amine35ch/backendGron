<?php

namespace Database\Seeders;

use App\Enums\PPhaseEnum\PPhaseRef;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_phases')->insert([
            [
                'name' => 'Nouveau Dossier',
                'reference' => PPhaseRef::NEW->value,
                'color' => 'primary',
                'icon' => 'mdi:success',
            ],
            [
                'name' => 'Simulation',
                'reference' => PPhaseRef::SIMULATION->value,
                'color' => 'info',
                'icon' => 'material-symbols:warning-outline',
            ],
            [
                'name' => 'Audit',
                'reference' => PPhaseRef::AUDIT->value,
                'color' => 'success',
                'icon' => 'material-symbols:info-outline',
            ],
            [
                'name' => 'Offre de prix',
                'reference' => PPhaseRef::QUOTATION->value,
                'color' => 'warning',
                'icon' => 'material-symbols:info-outline',
            ],
            [
                'name' => 'Travaux',
                'reference' => PPhaseRef::WORK->value,
                'color' => 'error',
                'icon' => 'material-symbols:warning-outline',
            ],
            [
                'name' => 'Facturation & paiement',
                'reference' => PPhaseRef::PAYMENT->value,
                'color' => 'success',
                'icon' => 'material-symbols:info-outline',
            ],
        ]);
    }
}
