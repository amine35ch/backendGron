<?php

namespace Database\Seeders;

use App\Models\DGovernment;
use Illuminate\Database\Seeder;

class DGovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gov = new DGovernment([
            'name' => 'gov',
            'email' => 'gov@farnce.com',
            'profile' => 'ANH',
        ]);
        $gov->save();
    }
}
