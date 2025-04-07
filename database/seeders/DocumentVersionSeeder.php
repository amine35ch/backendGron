<?php

namespace Database\Seeders;

use App\Models\DProjectDocument;
use App\Services\DProjectDocumentServices\DProjectDocumentService;
use Illuminate\Database\Seeder;

class DocumentVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new DProjectDocumentService(new DProjectDocument()))->updateDefaultToEachDocumentVersionDefault();
        (new DProjectDocumentService(new DProjectDocument()))->updateDefaultToEachDocumentVersionDefault('DCompanyDocument');
        (new DProjectDocumentService(new DProjectDocument()))->updateDefaultToEachDocumentVersionDefault('DClientDocument');
    }
}
