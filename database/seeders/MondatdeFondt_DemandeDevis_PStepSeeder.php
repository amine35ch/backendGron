<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PStepDocument;
use Illuminate\Support\Facades\DB;

class MondatdeFondt_DemandeDevis_PStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $stepDocuments = [
            [

                'type_doc' => 51,
                'order_step' => 10,
                'required' => 0,
            ],
            [
                'type_doc' => 52,
                'order_step' => 10,
                'required' => 0,
            ],


        ];

        foreach ($stepDocuments as $step) {
            PStepDocument::create($step);
        }
    }
}
