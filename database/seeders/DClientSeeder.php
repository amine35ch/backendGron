<?php

namespace Database\Seeders;

use App\Models\DClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DClient::withoutEvents(function () {
        //     $client = DClient::create([
        //         'reference' => getNextReference(class_basename(DClient::class)),
        //         'first_name' => 'client',
        //         'last_name' => 'client',
        //         'email_contact' => 'client@gmail.com',
        //         // 'password' => Hash::make("12345678"),
        //         'phone_number_1' => '234567890',
        //         'type' => 1,
        //         'd_company_id' => 1,
        //         'code' => 'Rec668',
        //         // 'username' => 'client'
        //     ]);
        // $client->assignRole('client');
        // assignPermissionsTo($client, 'client');
        // });
    }
}
