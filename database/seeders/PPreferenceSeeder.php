<?php

namespace Database\Seeders;

use App\Models\PPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PPreference::firstOrCreate([
            'username_root' => 'gron',
            'password_root' => '12345678',
        ]);
    }
}
