<?php

namespace Database\Seeders;

use App\Models\DocuSign;
use Illuminate\Database\Seeder;

class DocuSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocuSign::create(
            [
                'access_token' => '',
                'expires_at' => now()->subDay(),
            ]
        );
    }
}
