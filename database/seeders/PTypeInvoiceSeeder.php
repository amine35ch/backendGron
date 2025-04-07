<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PTypeInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_type_invoices')->insert([
            [
                'entitled' => 'Accompagnement',
                'type' => 0,
                'color' => 'primary',
            ],
            [
                'entitled' => 'Travaux',
                'type' => 1,
                'color' => 'secondary',
            ],
        ]);
    }
}
