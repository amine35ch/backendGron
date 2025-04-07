<?php

namespace Database\Seeders;

use App\Models\POperation;
use Illuminate\Database\Seeder;

class POperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operations = [
            [
                'type' => 0,
                'entitled' => 'Mar',
            ],
            [
                'type' => 1,
                'entitled' => 'Audit',
            ],
            [
                'type' => 2,
                'entitled' => 'Travaux',
            ],
            [
                'type' => 3,
                'entitled' => 'Mandataire Financier',
            ],
            [
                'type' => 4,
                'entitled' => 'Mandataire Administratif',
            ],

            // [
            //     'reference' => 'PAC air/air',
            //     'type' => 0,
            //     'unit' => 0,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 11000,
            //             'condition' => "< 200",
            //         ],
            //         [
            //             'price_unit_ht' => 22000,
            //             'condition' => ">= 200",
            //         ]
            //     ],

            // ],
            // [
            //     'reference' => 'PAC air/eau',
            //     'type' => 1,
            //     'unit' => 0,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 15000,
            //             'condition' => "< 200",
            //         ],
            //         [
            //             'price_unit_ht' => 30000,
            //             'condition' => ">= 200",
            //         ]
            //     ],
            //     'scenario' => 1,
            // ],
            // [
            //     'reference' => 'Ballon thermo',
            //     'type' => 2,
            //     'unit' => 0,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 6800,
            //             'condition' => '> 0',
            //         ]
            //     ],
            //     'scenario' => 1,
            // ],
            // [
            //     'reference' => 'VMC double flux',
            //     'type' => 3,
            //     'unit' => 0,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 6500,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //     'scenario' => 1,
            // ],
            // [
            //     'reference' => 'Comble perdu',
            //     'type' => 4,
            //     'unit' => 1,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 55,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'scenario' => 1,
            // ],
            // [
            //     'reference' => 'Rampants',
            //     'type' => 5,
            //     'unit' => 1,
            //     'd_company_id' => 1,
            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 85,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'scenario' => 1,
            // ],
            // [
            //     'reference' => 'Plancher bas',
            //     'type' => 6,
            //     'unit' => 1,
            //     'd_company_id' => 1,

            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 45,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'scenario' => 1,
            // ],
            // [
            //     'reference' => 'ITE',
            //     'type' => 7,
            //     'unit' => 1,
            //     'd_company_id' => 1,

            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 150,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'scenario' => 1,
            // ],
            // [
            //     'reference' => 'ITI',
            //     'type' => 8,
            //     'unit' => 1,
            //     'd_company_id' => 1,

            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 85,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'scenario' => 1,
            // ],
            // [
            //     'reference' => 'Audit',
            //     'type' => 9,
            //     'unit' => 0,
            //     'd_company_id' => 1,

            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 85,
            //             'condition' => '> 0',
            //         ]
            //     ]
            // ],
            // [
            //     'reference' => 'MAR',
            //     'type' => 10,
            //     'unit' => 0,
            //     'd_company_id' => 1,

            //     'pricing_list' => [
            //         [
            //             'price_unit_ht' => 85,
            //             'condition' => '> 0',
            //         ]
            //         ],
            //         'intern' => 1,
            // ],
        ];
        foreach ($operations as $operation) {
            POperation::create($operation);
        }
        // POperation::insert($operations);
    }
}
