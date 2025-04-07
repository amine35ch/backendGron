<?php

namespace Database\Seeders;

use App\Models\PProfile;
use Illuminate\Database\Seeder;

class PProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'entitled' => 'VAERDIA',
                'reference' => 'VAE',
                'identifier' => 'root',
                'display' => 0,
                'type' => 0,

            ],
            [
                'entitled' => 'MAR',
                'reference' => 'MAR',
                'identifier' => 'mars',
                'display' => 0,
                'type' => 1,
                'icon' => 'icon-park-outline:green-new-energy',
            ],
            [
                'entitled' => 'Entreprise Retenue',
                'reference' => 'INS',
                'identifier' => 'installers',
                'type' => 2,
                'icon' => 'mdi:company',

            ],
            [
                'entitled' => 'Auditeur',
                'identifier' => 'auditors',
                'reference' => 'AUD',
                'type' => 3,
                'icon' => 'mdi:shield-user-outline',

            ],
            [
                'entitled' => 'Sous-traitant',
                'identifier' => 'sub-contractors',
                'reference' => 'STT',
                'type' => 4,
            ],
            [
                'entitled' => 'Mandataire',
                'reference' => 'MAN',
                'identifier' => 'agents',
                'type' => 5,
                'icon' => 'iconoir:hand-cash',
            ],
            [
                'entitled' => 'ANAH',
                'reference' => 'ANH',
                'identifier' => 'anah',
                'type' => 6,
                'icon' => 'iconoir:hand-cash',
            ],

            [
                'entitled' => 'Subscription',
                'reference' => 'SUB',
                'identifier' => 'subscriptions',
                'type' => 7,
                'icon' => 'iconoir:hand-cash',
            ],

            [
                'entitled' => 'BMandataire',
                'reference' => 'BMAN',
                'identifier' => 'bmandataire',
                'type' => 8,
                'icon' => 'mdi:user',
            ],

        ];

        foreach ($profiles as $profile) {
            PProfile::firstOrCreate($profile);
        }
    }
}
