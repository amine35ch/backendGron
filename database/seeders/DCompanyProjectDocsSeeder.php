<?php

namespace Database\Seeders;

use App\Models\DProjectDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DCompanyProjectDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = \App\Models\DCompany::all();
        $docs = \App\Models\PDocument::where('is_project', 1)
            ->where('hidden', 0)
            ->get();

        foreach ($companies as $company) {
            $company->projectDocs()->detach();
            $docsArray = [];
            foreach ($docs as $doc) {
                $docsArray[] = [
                    'type_doc' => $doc->type,
                    'required' => $doc->required,
                    'nature_doc' => $doc->nature_doc
                ];
            }
            $company->projectDocs()->attach($docsArray);
        }
        $currentDocs = DProjectDocument::all();
        foreach ($currentDocs as $currentDoc) {
            $doc = $docs->where('type', $currentDoc->type_doc)->first();
            if ($doc) {
                $currentDoc->update([
                    'nature_doc' => $doc->nature_doc,
                ]);
            }
        }
    }
}
