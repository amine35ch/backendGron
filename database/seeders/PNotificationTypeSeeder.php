<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PNotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data=[
            [ 
                'type'=>1,
                'entitled'=>'ANAH Notification'
            ],
            [ 
                'type'=>2,
                'entitled'=>'General Notification'
            ]
            ];
        DB::table('p_notification_types')->insert($data);
    }
}
