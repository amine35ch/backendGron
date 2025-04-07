<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Models\DCompanyProjectDocs;
use App\Models\PDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MondatdeFondt_DemandeDevis_PDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $documents =  [
            [
                'entitled' => 'Mandat des fonds',
                'type' => 51,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'MandatdesFonds',
                'blade_path' => 'Documents.mondatFonds',
                'skeleton_path' => 'Skeletons/mondatFonds.json',
                'permissions' => [
                    'quotation-installer',
                ],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 4,
                        'x' => 60,
                        'y' => 380,
                    ]
                ],
                'is_project' => 1,
            ],

            [
                'entitled' => '  DEMANDE D\'AVANCE SIGNÉ ',
                'type' => 52,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 1,
                'reference' => 'DemandeDevisSigne',
                'blade_path' => 'Documents.demande_avance_signe',
                'skeleton_path' => 'Skeletons/demande_avance_signe.json',
                'permissions' => [
                    'quotation-installer',
                ],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 8,
                        'x' => 375,
                        'y' => 565,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 8,
                //         'blc' => [
                //             'x' => 388,
                //             'y' => 290,
                //         ],
                //         'trc' => [
                //             'x' => 535,
                //             'y' => 346,
                //         ],
                //     ],
                // ],
                'is_project' => 1,

            ]
        ];
        foreach ($documents as $document) {
            try {
                PDocument::create($document);
            } catch (\Exception $e) {
                // Enregistrer l'erreur dans les logs
                Log::error('Erreur lors de l\'insertion du document : ' . json_encode($document) . ' - Message : ' . $e->getMessage());
            }
        }
    }
}
