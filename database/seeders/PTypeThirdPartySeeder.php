<?php

namespace Database\Seeders;

use App\Models\PTypeThirdParty;
use Illuminate\Database\Seeder;

class PTypeThirdPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'entitled' => 'Installateur',
                'type' => 0,
            ],
            [
                'entitled' => 'Auditeur',
                'type' => 1,
            ],
        ];

        foreach ($types as $type) {
            PTypeThirdParty::create($type);
        }
    }
}
