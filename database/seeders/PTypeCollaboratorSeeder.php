<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PTypeCollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_type_collaborators')->insert([
            'entitled' => 'MAR',
            'type' => 0,
        ]);
    }
}
