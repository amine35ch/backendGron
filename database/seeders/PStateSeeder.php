<?php

namespace Database\Seeders;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DCompanyEnum\DCompanyState;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectEnum\DVisiteState;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_states')->insert([
            [
                'model' => 'DProject', 'state' => DProjectState::INIT->value, 'name' => 'Nouveau', 'description' => 'Nouveau projet', 'color' => 'secondary', 'icon' => 'mdi:success',
            ],
            ['model' => 'DProject', 'state' => DProjectState::ONGOING->value, 'name' => 'En cours', 'description' => 'Projet en cours', 'color' => 'primary', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DProject', 'state' => DProjectState::COMPLETED->value, 'name' => 'Terminé', 'description' => 'Projet terminé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::SUSPENDED->value, 'name' => 'Suspendu', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DProject', 'state' => DProjectState::POSTPONED->value, 'name' => 'Reporté', 'description' => 'Projet reporté', 'color' => 'warning', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::PENDING->value, 'name' => 'En attente', 'description' => 'Projet en cours', 'color' => 'warning', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::ACCEPTED->value, 'name' => 'Acceptée', 'description' => 'Projet terminé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::CANCELED->value, 'name' => 'Annulée', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::FINISHED->value, 'name' => 'Terminée', 'description' => 'Projet Terminée', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],

            ['model' => 'DClient', 'state' => 1, 'name' => 'Active', 'description' => 'Client activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'], ['model' => 'DClient', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Client désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'], ['model' => 'POperation', 'state' => 1, 'name' => 'Active', 'description' => 'Opération activée', 'color' => 'success', 'icon' => 'material-symbols:info-outline'], ['model' => 'POperation', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Opération désactivée', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'], ['model' => 'DScenario', 'state' => 1, 'name' => 'Active', 'description' => 'Scenario activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'], ['model' => 'DScenario', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Scenario désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'], ['model' => 'DWork', 'state' => 1, 'name' => 'Active', 'description' => 'Travail activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'], ['model' => 'DWork', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Travail désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'],

            [
                'model' => 'DCompany',
                'state' => DCompanyState::ACTIVE->value,
                'name' => 'Activé',
                'description' => 'Activé',
                'color' => 'success', 'icon' => 'material-symbols:success',
            ],
            [
                'model' => 'DCompany',
                'state' => DCompanyState::DISABLE->value,
                'name' => 'Désactivé',
                'description' => 'Désactivé',
                'color' => 'error',
                'icon' => 'material-symbols:error',
            ],

            [
                'model' => 'DBrandLine',
                'state' => DArticleState::ACTIVATED->value,
                'name' => 'Activé',
                'description' => 'Activé',
                'color' => 'success',
                'icon' => 'material-symbols:success',
            ],
            [
                'model' => 'DBrandLine',
                'state' => DArticleState::DEACTIVATE->value,
                'name' => 'Désactivé',
                'description' => 'Désactivé',
                'color' => 'error',
                'icon' => 'material-symbols:danger',
            ],
            [
                'model' => 'DArticlePrice',
                'state' => DArticleState::ACTIVATED->value,
                'name' => 'Activé',
                'description' => 'Activé',
                'color' => 'success',
                'icon' => 'material-symbols:success',
            ],
            [
                'model' => 'DArticlePrice',
                'state' => DArticleState::DEACTIVATE->value,
                'name' => 'Désactivé',
                'description' => 'Désactivé',
                'color' => 'error',
                'icon' => 'material-symbols:danger',
            ],
            ['model' => 'DProjectInvoiceHeader', 'state' => DInvoiceState::PRE_INVOICE->value, 'name' => 'Nouveau facture', 'description' => 'Nouveau facture', 'color' => 'primary', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DProjectInvoiceHeader', 'state' => DInvoiceState::INVOICE->value, 'name' => 'Facture validé', 'description' => 'Nouveau facture', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProjectInvoiceHeader', 'state' => DInvoiceState::CANCELED_INVOICE->value, 'name' => 'Facture annulé', 'description' => 'Facture annulé', 'color' => 'error', 'icon' => 'material-symbols:danger'],

        ]);
    }
}
