<?php

namespace Database\Seeders;

use App\Enums\DInvoiceEnum\DInvoiceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PInvoiceReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'format' => 'DEV000001',
                'type' => DInvoiceType::DEVIS->value,
                'prefix' => 'DEV',
            ],

            [
                'format' => 'FAC000001',
                'type' => DInvoiceType::INVOICE->value,
                'prefix' => 'FAC',

            ],
            [
                'format' => 'FAN000001',
                'type' => DInvoiceType::CANCELED_INVOICE->value,
                'prefix' => 'FAN',

            ],
            [
                'format' => 'CON000001',
                'type' => DInvoiceType::CONTRACT->value,
                'prefix' => 'CON',

            ],

        ];

        DB::table('p_invoice_references')->insert($data);
    }
}
