<?php

namespace Database\Seeders;

use App\Enums\UserEnum\UserProfileEnum;
use App\Models\DCompany;
use Illuminate\Database\Seeder;
use App\Models\DInvoiceReference;
use App\Models\PInvoiceReference;

use function PHPSTORM_META\type;

class DInvoiceReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = DCompany::where('profile', UserProfileEnum::MAR->value)->get();

        $pref = [

            'format' => 'CCON000001',
            'prefix' => 'CON',
            'type' => 'contract',
            'current_count' => 000001,
        ];
        PInvoiceReference::create($pref);
        foreach ($companies as $company) {
            // Prepare the data for each company
            $dref = [
                'format' => 'CON000001',
                'prefix' => 'CON',
                'type' => 'contract',
                'd_company_id' => $company->id,
                'current_count' => 0, // Avoid leading zeros in integers
            ];

            // Create the reference
            DInvoiceReference::createOrFirst($dref);
        }



    }
}
