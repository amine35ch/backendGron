<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PFormBlocSeeder extends Seeder
{
    public function run()
    {
        DB::table('p_form_blocs')->insert([
            [
                'id' => 1,
                'reference' => '1_1',
                'title' => 'GRILLE D\'ANALYSE DU LOGEMENT Questionnaire',
                'order' => 1,
                'obligatory' => 1,
                'annex' => 0,
                'p_form_id' => 1,
                'title_works' => null,
                'bloc_out_of_list' => 0,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'reference' => '2_1',
                'title' => 'SYNTHÈSE DE LA GRILLE D\'ANALYSE DU LOGEMENT',
                'order' => 1,
                'obligatory' => 1,
                'annex' => 0,
                'p_form_id' => 2,
                'title_works' => null,
                'bloc_out_of_list' => 0,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
