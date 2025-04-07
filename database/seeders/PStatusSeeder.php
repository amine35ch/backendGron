<?php

namespace Database\Seeders;

use App\Enums\DProjectEnum\DProjectStatus;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_statuses')->insert([
            [
                'model' => 'DProject',
                'status' => DProjectStatus::NOT_QUALIFIED->value,
                'name' => 'Non qualifié',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],
            [
                'model' => 'DProject',
                'status' => DProjectStatus::NOT_ELIGIBLE->value,
                'name' => 'Non éligible',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],
            [
                'model' => 'DProject',
                'status' => DProjectStatus::ENHANCED_SUPPORT->value,
                'name' => 'Accompagnement renforcé (re orientation vers L’ANAH)',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],
            //
            [
                'model' => 'DProjectInvoiceHeader',
                'status' => DProjectInvoiceHeaderStatusEnum::NOT_VALIDATED->value,
                'name' => 'Non validé',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],
            [
                'model' => 'DProjectInvoiceHeader',
                'status' => DProjectInvoiceHeaderStatusEnum::VALIDATED->value,
                'name' => 'Validé',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],
            [
                'model' => 'DProjectInvoiceHeader',
                'status' => DProjectInvoiceHeaderStatusEnum::PAYED->value,
                'name' => 'Payé',
                'description' => '',
                'color' => 'danger',
                'icon' => 'material-symbols:danger',
            ],

        ]);
    }
}
