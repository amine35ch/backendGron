<?php

namespace Database\Seeders;

use App\Models\PProjectNature;
use Illuminate\Database\Seeder;

class PProjectNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $natures = [
            [
                'entitled' => 'Propriétaire ou copropriétaire en pleine propriété',
                'type' => 0,
            ],
            [
                'entitled' => 'Propriétaire ou copropriétaire en indivision',
                'type' => 1,
            ],
            [
                'entitled' => 'Associé d’une SCI propriétaire du logement',
                'type' => 2,
            ],
            [
                'entitled' => 'Usufruitier',
                'type' => 3,
            ],
            [
                'entitled' => 'Titulaire d’un droit d’usage et d’habitation',
                'type' => 4,
            ],
            [
                'entitled' => 'Titulaire d’un droit réel immobilier',
                'type' => 5,
            ],
            [
                'entitled' => 'Locataire',
                'type' => 6,
            ],
            [
                'entitled' => 'Occupant d’un logement en viager',
                'type' => 7,
            ],
        ];

        foreach ($natures as $nature) {
            PProjectNature::create($nature);
        }
    }
}
