<?php

namespace Database\Seeders;

use App\Models\PBrand;
use Illuminate\Database\Seeder;

class PBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 0;
        $originalArray = [
            'reference' => 'ref',
            'entitled' => 'AIRWELL',
        ];
        $list = [
            'ACTIS',
            'AIRWELL',
            'ALDES',
            'ALTECH',
            'ARISTON',
            'ATI',
            'ATLANTIC',
            'BECKER ENEGRY',
            'BOURGEOIS GLOBAL',
            'CHAFFOTEAUX',
            'CHAPPEE',
            'CLIMER',
            'DAIKIN',
            'DE DIETRICH',
            'ECL NEXUS',
            'ECOLED EUROPE',
            'EDILTECO',
            'ENERGIE',
            'ENERGY PANEL',
            'ESE SOLAR',
            'EURISOL',
            'GREE',
            'GREENCOM',
            'HEIWA',
            'HELIO FRANCE',
            'HIRSCH FRANCE',
            'HITACHI',
            'ISO2 INDUSTRIE',
            'ISOCELL FRANCE',
            'ISOLFRANCE',
            'ISOVER',
            'ISOVER SAINT GOBAIN',
            'JOHNSON CONTROLS',
            'KNAUF',
            'KNAUF INSULATION',
            'LASIAN',
            'LG',
            'MIDEA',
            'MITSUBISHI',
            'PANASONIC',
            'PLACOPLATRE',
            'PLEION',
            'POLYPROD',
            'Powercell-Isolation',
            'PRB',
            'PROJISO',
            'ROCKWOOL',
            'SAMSUNG',
            'SAUNIER DUVAL',
            'SINIAT',
            'SOLIMPEKS',
            'STIEBEL ELTRON',
            'SUNCOMPACT',
            'SUNPACKS',
            'SUNPAD',
            'SUNTASK',
            'SWISSPOR',
            'THALEOS',
            'THERMADOR',
            'THERMOIBERICA',
            'THERMOR',
            'THOMSON',
            'TOSHIBA',
            'TRIOMPH',
            'URSA',
            'VERSATI',
            'VIESSMANN',
        ];

        $resultArray = [];
        foreach ($list as $item) {
            $newArray = $originalArray;
            $newArray['entitled'] = $item;
            $newArray['reference'] = 'ref'.$count;
            $resultArray[] = $newArray;
            $count++;
        }
        PBrand::insert($resultArray);

    }
}
