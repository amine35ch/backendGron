<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProjectDocsNewSeeder extends Seeder
{
    /**
     
Run the database seeds.*/
    public function run(): void
    {
        $distinctCompanyIds = DB::table('d_company_project_docs')->select('d_company_id')->distinct()->pluck('d_company_id');
        foreach ($distinctCompanyIds as $companyId) {
            DB::table('d_company_project_docs')->insert(['d_company_id' => $companyId, 'type_doc' => '52', 'required' => false, 'created_at' => null, 'updated_at' => null, 'nature_doc' => '1', 'signature' => false,]);
            DB::table('d_company_project_docs')->insert(['d_company_id' => $companyId, 'type_doc' => '51', 'required' => false, 'created_at' => null, 'updated_at' => null, 'nature_doc' => '1', 'signature' => false,]);
        }
    }
}
