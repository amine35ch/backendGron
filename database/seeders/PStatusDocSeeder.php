<?php

namespace Database\Seeders;

use App\Models\PStatusDoc;
use Illuminate\Database\Seeder;

class PStatusDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'status' => 0,
                'entitled' => [
                    "Attacher document",
                    "Générer document",
                    "Remplir formulaire",
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'secondary.main',
            ],
            [
                'status' => 1,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Modifier formulaire',
                    "Modifier formulaire",
                    "Générer formulaire"
                ],
                'color' => 'warning.main',

            ],
            [
                'status' => 2,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Remplir formulaire',
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'info.main',

            ],
            [
                'status' => 3,
                'entitled' => [
                    'Attacher document',
                    'Document non signé',
                    'Document non signé',
                ],
                'color' => 'error.main',

            ],
            [
                'status' => 4,
                'entitled' => [
                    'Document attaché',
                    'Document finalisé',
                    'Document finalisé',
                    'Document finalisé (peut être attacher en option)',
                    'Document finalisé (peut être attacher en option)',
                ],
                'color' => 'success.main',

            ],
        ];

        foreach ($data as $item) {
            PStatusDoc::create([
                'status' => $item['status'],
                'entitled' => $item['entitled'],
                'color' => $item['color'],
            ]);
        }
    }
}
