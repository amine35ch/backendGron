<?php

namespace Database\Seeders;

use App\Enums\PMailingEnum\P_mailing_type;
use App\Models\PMailingSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PMailingSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PMailingSetting::create([
            'type' => P_mailing_type::ENABLED->value,
            'entitled' => P_mailing_type::ENABLED->getName(),
        ]);

        PMailingSetting::create([
            'type' => P_mailing_type::DISABLED->value,
            'entitled' => P_mailing_type::DISABLED->getName(),
        ]);
    }
}
