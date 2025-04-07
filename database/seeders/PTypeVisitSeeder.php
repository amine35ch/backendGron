<?php

namespace Database\Seeders;

use App\Models\PTypeVisit;
use Illuminate\Database\Seeder;

class PTypeVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'entitled' => 'Visite entreprise Retenue',
                'type' => 0,
                'color' => 'primary',
            ],
            [
                'entitled' => 'Visite Mar',
                'type' => 4,
                'color' => 'primary',
            ],
            [
                'entitled' => '2ème visite Mar',
                'type' => 1,
                'color' => 'secondary',
            ],
            [
                'entitled' => 'Visite de contrôle',
                'type' => 2,
                'color' => 'warning',
            ],
            [
                'entitled' => 'Relevé audit',
                'type' => 3,
                'color' => 'warning',
            ],
        ];

        foreach ($data as $type) {
            $typeOb = PTypeVisit::where('type', $type['type'])->first();
            if (! $typeOb) {

                PTypeVisit::create($type);
            }
        }
    }
}
