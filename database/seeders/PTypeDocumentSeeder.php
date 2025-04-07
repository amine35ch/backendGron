<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PTypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_type_documents')->insert([
            [
                'entitled' => 'Generated',
                'type' => 0,
            ],
            [
                'entitled' => 'Certified',
                'type' => 1,
            ],
            [
                'entitled' => 'Attached',
                'type' => 2,
            ],
            [
                'entitled' => 'Normal',
                'type' => 3,
            ],
            [
                'entitled' => 'Form',
                'type' => 4,
            ],
            [
                'entitled' => 'Dynamic form',
                'type' => 5,
            ],
            [
                'entitled' => 'Génération et signature',
                'type' => 6,
            ],

        ]);
    }
}
