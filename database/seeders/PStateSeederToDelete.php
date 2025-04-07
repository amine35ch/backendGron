<?php

namespace Database\Seeders;

use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PStateSeederToDelete extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data=[
        ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::ONGOING->value, 'name' => 'En cours', 'description' => 'Projet en cours', 'color' => 'warning', 'icon' => 'material-symbols:warning-outline'],
        ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::APPROVED->value, 'name' => 'Approuvé', 'description' => 'Projet approuvé', 'color' => 'primary', 'icon' => 'material-symbols:primary-outline'],
        ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::SUSPENDED->value, 'name' => 'Suspendu', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
        ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::EDITED->value, 'name' => 'Modifier', 'description' => 'Projet à modifier', 'color' => 'info', 'icon' => 'material-symbols:info'],
       ];
       DB::table('p_states')->insert($data);

    }
}
