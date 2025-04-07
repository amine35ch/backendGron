<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PSmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_smtps')->insert([
            'mail_host' => 'ssl0.ovh.net',
            'mail_port' => 465,
            'mail_username' => 'crm@vaeerdia.com',
            'mail_password' => 'CRM2023**',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'crm@vaeerdia.com',
            'mail_from_name' => 'CRM GRON',
        ]);
    }
}
