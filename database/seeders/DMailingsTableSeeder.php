<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DMailingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fetch all d_companies and p_notifications
        $dCompanies = DB::table('d_companies')->get(['id']);
        $pNotifications = DB::table('p_notifications')->get(['id']);

        // Prepare the data for insertion
        $mailingsData = [];

        foreach ($dCompanies as $company) {
            foreach ($pNotifications as $notification) {
                $mailingsData[] = [
                    'p_notification_id' => $notification->id,
                    'd_company_id' => $company->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into d_mailings in chunks
        foreach (array_chunk($mailingsData, 1000) as $chunk) {
            DB::table('d_mailings')->insert($chunk);
        }
    }
}
