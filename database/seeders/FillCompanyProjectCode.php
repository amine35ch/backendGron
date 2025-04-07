<?php

namespace Database\Seeders;

use App\Enums\UserEnum\UserProfileEnum;
use App\Models\DCompany;
use App\Models\DInvoiceReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillCompanyProjectCode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = DCompany::where('profile', UserProfileEnum::MAR->value)->get();
        foreach ($companies as $key => $company) {
            DInvoiceReference::create([
                "format" => "CON000001",
                "d_company_id" => $company->id,
                "current_count" => "000001",
                "prefix" => "CON",
                "type" => "contrat"
            ]);
        }
    }
}
