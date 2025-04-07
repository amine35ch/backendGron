<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PInvoiceLineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['entitled' => 'product', 'type' => 0], //article work
            ['entitled' => 'service', 'type' => 1], //article
            ['entitled' => 'work', 'type' => 2], //work
            ['entitled' => 'free_article', 'type' => 3], // nothing
        ];

        foreach ($array as $item) {
            \App\Models\PInvoiceLineType::create($item);
        }
    }
}
