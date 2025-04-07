<?php

namespace Database\Seeders;

use App\Models\PTypeClient;
use Illuminate\Database\Seeder;

class PTypeClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'entitled' => 'Prospet',
                'type' => 0,
            ],
            [
                'entitled' => 'Client',
                'type' => 1,
            ],
        ];

        foreach ($types as $type) {
            PTypeClient::create($type);
        }
    }
}
