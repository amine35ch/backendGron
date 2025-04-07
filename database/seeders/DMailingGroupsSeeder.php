<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DMailingGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('d_mailing_groups')->insert([
            [
                'group' => 0, // Make sure this value exists in the group column
                'entitled' => 'Others',
                'description' => 'Group for All.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group' => 1,
                'entitled' => 'Accounts',
                'description' => 'Group for Accounts notifications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group' => 2,
                'entitled' => 'Steps',
                'description' => 'Group for steps-related emails.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
