<?php

namespace Database\Seeders;

use App\Models\DCompanyProjectDocs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dCompanyProjectDocs=DCompanyProjectDocs::all();
        foreach ($dCompanyProjectDocs as $key => $dCompanyProjectDoc) {
            if($dCompanyProjectDoc?->pDocument?->entitled==null){
                DCompanyProjectDocs::where('d_company_id', $dCompanyProjectDoc->d_company_id)
                ->where('type_doc', $dCompanyProjectDoc->type_doc)
                ->delete();
            }
        }
    }
}
