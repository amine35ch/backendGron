<?php

namespace Database\Seeders;

use App\Enums\DGeneralNotificationEnum\DGeneralNotificationState;
use App\Models\DGeneralNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DGeneralNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                'title' => 'Dernières mises à jour effectuées :',
                'description' => "<p>- Le profil de l'installateur n'attend plus la validation MAR pour avancer jusqu'à l'étape \"vérification des documents\" </p><p>- Optimisation du flux des notifications. </p><p>- Remplacement du document \"Dernière déclaration fiscale\" par \"Avis d'imposition\" </p><p>- Optimisation de la génération de devis ainsi que du catalogue des produits.</p>",
                'type' => 2,
                'state' => DGeneralNotificationState::IMPORTANT->value,
                'date' => now()
        ];
        
        $dGeneralNotification=DGeneralNotification::create($data);
        $roles = [
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '1',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '2',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '3',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '4',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '5',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '6',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '7',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '8',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '9',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '10',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '11',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '12',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '13',
            ],
            [
                'd_general_notification_id' => $dGeneralNotification->id,
                'role_id' => '14',
            ],
        ];
        DB::table('d_general_notification_role')->insert($roles);
    }
}
