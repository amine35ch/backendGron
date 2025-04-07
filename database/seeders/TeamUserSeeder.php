<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_shuttle_card_lines')->where('id', 136)->update(['order' => 3]);
        DB::table('p_shuttle_card_lines')->where('id', 137)->update(['order' => 4]);

        DB::table('p_shuttle_card_lines')->insert([
            [
                'input_type' => '4',
                'form_bloc' => '17',
                'title' => 'Ajouter des images',
                'content' => '[]',
                'order' => '2',
                'required' => '0',
                'active' => '1',
                'page_break_before' => '0',
                'page_break_after' => '0',
                'style' => '',
                'class' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'update_project' => '0',
                'update_client' => '0',
                'parent' => null,
            ],
            [
                'input_type' => '4',
                'form_bloc' => '17',
                'title' => 'SIGNATURE CLIENT',
                'content' => '[]',
                'order' => '5',
                'required' => '0',
                'active' => '1',
                'page_break_before' => '0',
                'page_break_after' => '0',
                'style' => '',
                'class' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'update_project' => '0',
                'update_client' => '0',
                'parent' => null,
            ],
        ]);

        DB::table('p_shuttle_card_lines')->where('id', 206)->update(['style' => 'multiple']);
        DB::table('p_shuttle_card_lines')->where('id', 207)->update(['title' => 'SIGNATURE CLIENT PHOTO']);
    }
}
