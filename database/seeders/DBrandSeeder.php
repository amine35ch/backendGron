<?php

namespace Database\Seeders;

use App\Enums\DArticleEnum\DArticleState;
use App\Models\DBrand;
use App\Models\DBrandLine;
use App\Models\PBrand;
use Illuminate\Database\Seeder;

class DBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 0;
        // $originalArray = [
        //     'reference' => 'ref',
        //     'entitled' => 'AIRWELL',
        //     'access' => 1,
        //     'd_company_id' => 1,
        // ];
        // $list = [
        //     'AIRWELL',
        //     'ARISTON',
        //     'ATLANTIC',
        //     'CHAFFOTEAUX',
        //     'CHAPPEE',
        //     'DAIKIN',
        //     'DE DIETRICH',
        //     'GREE',
        //     'GREENCOM',
        //     'ISOMO',
        //     'KNAUFINUSLATION',
        //     'LASIAN',
        //     'LG',
        //     'MIDEA',
        //     'ORION',
        //     'PANASONIC',
        //     'STIEBEL',
        //     'TERTIS',
        //     'TETRIS',
        //     'THALEOS',
        //     'THERMOIBERICA',
        //     'THERMOR',
        //     'THOMSON',
        //     'THOMSON ENERGY',
        //     'TOSHIBA',
        //     'VOLCALIS',
        // ];

        // $resultArray = [];
        // $pBrand = PBrand::all();
        // foreach ($pBrand as $brand) {
        //     $newArray['entitled'] = $brand->entitled;
        //     $newArray['access'] = 1;
        //     $newArray['d_company_id'] = 1;
        //     $newArray['mar_id'] = 1;
        //     $newArray['is_validated'] = 1;
        //     $resultArray[] = $newArray;

        //     $branda = DBrand::create($newArray);
        //     DBrandLine::create([
        //         'd_brand_id' => $branda->id,
        //         'state' => DArticleState::ACTIVATED->value,
        //         'd_company_id' => $branda->d_company_id,
        //     ]);
        // }
    }
}
