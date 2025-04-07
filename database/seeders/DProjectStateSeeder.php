<?php

namespace Database\Seeders;

use App\Enums\DGeneralNotificationEnum\DGeneralNotificationState;
use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Models\PState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DProjectStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['model' => 'DProject', 'state' => DProjectState::FIRSTDEPOT->value, 'name' => '1ére Depot Annah', 'description' => 'Projet en cours de 1ére Depot Annah', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::ONGOINGWORK->value, 'name' => 'En cours de Travaux', 'description' => 'Projet en cours de Travaux', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::SECONDDEPOT->value, 'name' => '2éme Depot Annah', 'description' => 'Projet en cours de 2éme Depot Annah', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::ONGOING->value, 'name' => 'En cours', 'description' => 'Projet en cours', 'color' => 'primary', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::APPROVED->value, 'name' => 'Approuvé', 'description' => 'Projet approuvé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::SUSPENDED->value, 'name' => 'Suspendu', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::EDITED->value, 'name' => 'Modifier', 'description' => 'Projet à modifier', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DGeneralNotification', 'state' => DGeneralNotificationState::NORMAL->value, 'name' => 'normal', 'description' => 'notification normal', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DGeneralNotification', 'state' => DGeneralNotificationState::IMPORTANT->value, 'name' => 'important', 'description' => 'notification importante', 'color' => 'error', 'icon' => 'material-symbols:danger'],
        ];
        DB::table('p_states')->insert($data);
    }
}
