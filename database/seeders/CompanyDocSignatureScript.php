<?php

namespace Database\Seeders;

use App\Models\PDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDocSignatureScript extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pDocuments=PDocument::where('is_project',1)->get();
        foreach ($pDocuments as $pDocument) {
            DB::table('d_company_project_docs')->where('type_doc',$pDocument->type)->update(['signature'=>$pDocument->docu_signature]);
        }

    }
}
