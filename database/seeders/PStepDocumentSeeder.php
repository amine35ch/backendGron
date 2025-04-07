<?php

namespace Database\Seeders;

use App\Models\PStepDocument;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PStepDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('p_step_documents')->truncate();
        
        $stepDocuments = [
            // StepSimulation
            [
                'type_doc' => 29,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 1,
                'required' => 1,
            ],
            // [
            //     'type_doc' => 31,
            //     'order_step' => 1,
            //     'required' => 1,
            // ],
            [
                'type_doc' => 32,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 13,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 48,
                'order_step' => 1,
                'required' => 1,
            ],
            //Offres MAR
            [
                'type_doc' => 48,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 29,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 2,
                'required' => 1,
            ],
            // [
            //     'type_doc' => 31,
            //     'order_step' => 2,
            //     'required' => 1,
            // ],
            [
                'type_doc' => 32,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 13,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 2,
                'required' => 1,
            ],

            //Selection des Entreprises

            // [
            //     'type_doc' => 23,
            //     'order_step' => 3,
            //     'required' => 1,
            // ],
            // [
            //     'type_doc' => 35,
            //     'order_step' => 3,
            //     'required' => 1,
            // ],
            // [
            //     'type_doc' => 37,
            //     'order_step' => 3,
            //     'required' => 1,
            // ],
  
            // generehomm wa7dii

            //1ère Visite
            [
                'type_doc' => 39,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 1,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 15,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 48,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 29,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 5,
                'required' => 1,
            ],
            // [
            //     'type_doc' => 31,
            //     'order_step' => 5,
            //     'required' => 1,
            // ],
            [
                'type_doc' => 32,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 46,
                'order_step' => 5,
                'required' => 1,
            ],


            // Vérification des documents

            [
                'type_doc' => 1,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 15,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 48,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 29,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 6,
                'required' => 1,
            ],
            // [
            //     'type_doc' => 31,
            //     'order_step' => 6,
            //     'required' => 1,
            // ],
            [
                'type_doc' => 32,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 46,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 5,
                'order_step' => 6,
                'required' => 1,
            ],

            [
                'type_doc' => 39,
                'order_step' => 6,
                'required' => 1,
            ],
            //Rapport d'audit
            [
                'type_doc' => 6,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 1,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 5,
                'order_step' => 7,
                'required' => 1,
            ],
            
            // Sélection de(s) Artisant(s) et génération de(s) devis 
            [
                'type_doc' => 7,
                'order_step' => 8,
                'required' => 1,
            ], 
            [
                'type_doc' => 16,
                'order_step' => 8,
                'required' => 1,
            ],
            [
                'type_doc' => 25,
                'order_step' => 8,
                'required' => 1,
            ],
            [
                'type_doc' => 8,
                'order_step' => 8,
                'required' => 1,
            ],
    
            //Réponse Demande ANAH 

            [
                'type_doc' => 28,
                'order_step' => 10,
                'required' => 1,
            ],
            [
                'type_doc' => 17,
                'order_step' => 10,
                'required' => 1,
            ],
          
        ];

        foreach ($stepDocuments as $step) {
            PStepDocument::create($step);
        }
    }
}


  