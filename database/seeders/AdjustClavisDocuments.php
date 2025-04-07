<?php

namespace Database\Seeders;

use App\Models\DProjectDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdjustClavisDocuments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = DProjectDocument::all();
        foreach ($documents as $key => $document) {
            if ($document->type_doc === 70 && $document->d_company_id === null) {
                $document->delete();
            }
        }
    }
}
