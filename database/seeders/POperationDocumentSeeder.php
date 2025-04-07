<?php

namespace Database\Seeders;

use App\Models\POperationDocument;
use Illuminate\Database\Seeder;

class POperationDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'p_operation_id' => 2,
                'p_document_id' => 4,
            ],

            [
                'p_operation_id' => 2,
                'p_document_id' => 6,
            ],
            [
                'p_operation_id' => 2,
                'p_document_id' => 7,
            ],

        ];

        foreach ($documents as $document) {
            POperationDocument::create($document);
        }
    }
}
