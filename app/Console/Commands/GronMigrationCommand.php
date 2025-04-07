<?php

namespace App\Console\Commands;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DCompanyEnum\DCompanyState;
use App\Enums\DGeneralNotificationEnum\DGeneralNotificationState;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectEnum\DVisiteState;
use App\Enums\DProjectVisitEnum\DProjectVisitState;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\PScaleTypeEnum\PScaleTypeEnum;
use App\Enums\PStepEnum\PStepOrder;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\DProjectVisit;
use App\Models\DWork;
use App\Models\PBar;
use App\Models\PDocument;
use App\Models\PNotification;
use App\Models\PScale;
use App\Models\PStatusDoc;
use App\Models\PStep;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class GronMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gron:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migration des données';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // p_states
        DB::table('p_states')->truncate();
        DB::table('p_states')->insert([
            [
                'model' => 'DProject',
                'state' => DProjectState::INIT->value,
                'name' => 'Nouveau',
                'description' => 'Nouveau projet',
                'color' => 'secondary',
                'icon' => 'mdi:success',
            ],
            ['model' => 'DProject', 'state' => DProjectState::ONGOING->value, 'name' => 'En cours', 'description' => 'Projet en cours', 'color' => 'primary', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DProject', 'state' => DProjectState::COMPLETED->value, 'name' => 'Terminé', 'description' => 'Projet terminé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::SUSPENDED->value, 'name' => 'Suspendu', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DProject', 'state' => DProjectState::POSTPONED->value, 'name' => 'Reporté', 'description' => 'Projet reporté', 'color' => 'warning', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::PENDING->value, 'name' => 'En attente', 'description' => 'Projet en cours', 'color' => 'warning', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::ACCEPTED->value, 'name' => 'Acceptée', 'description' => 'Projet terminé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::CANCELED->value, 'name' => 'Annulée', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DProjectVisit', 'state' => DVisiteState::FINISHED->value, 'name' => 'Terminée', 'description' => 'Projet Terminée', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],

            ['model' => 'DClient', 'state' => 1, 'name' => 'Active', 'description' => 'Client activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DClient', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Client désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'POperation', 'state' => 1, 'name' => 'Active', 'description' => 'Opération activée', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'POperation', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Opération désactivée', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DScenario', 'state' => 1, 'name' => 'Active', 'description' => 'Scenario activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DScenario', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Scenario désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'DWork', 'state' => 1, 'name' => 'Active', 'description' => 'Travail activé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DWork', 'state' => 0, 'name' => 'Désactivé', 'description' => 'Travail désactivé', 'color' => 'error', 'icon' => 'material-symbols:warning-outline'],

            [
                'model' => 'DCompany',
                'state' => DCompanyState::ACTIVE->value,
                'name' => 'Activé',
                'description' => 'Activé',
                'color' => 'success',
                'icon' => 'material-symbols:success',
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
            ['model' => 'DProject', 'state' => DProjectState::FIRSTDEPOT->value, 'name' => '1ére Depot Annah', 'description' => 'Projet en cours de 1ére Depot Annah', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::ONGOINGWORK->value, 'name' => 'En cours de Travaux', 'description' => 'Projet en cours de Travaux', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DProject', 'state' => DProjectState::SECONDDEPOT->value, 'name' => '2éme Depot Annah', 'description' => 'Projet en cours de 2éme Depot Annah', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::ONGOING->value, 'name' => 'En cours', 'description' => 'Projet en cours', 'color' => 'primary', 'icon' => 'material-symbols:warning-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::APPROVED->value, 'name' => 'Approuvé', 'description' => 'Projet approuvé', 'color' => 'success', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::SUSPENDED->value, 'name' => 'Suspendu', 'description' => 'Projet suspendu', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'ResponseAnah', 'state' => DProjectAnahResponseEnum::EDITED->value, 'name' => 'Modifier', 'description' => 'Projet à modifier', 'color' => 'error', 'icon' => 'material-symbols:danger'],
            ['model' => 'DGeneralNotification', 'state' => DGeneralNotificationState::NORMAL->value, 'name' => 'normal', 'description' => 'notification normal', 'color' => 'primary', 'icon' => 'material-symbols:info-outline'],
            ['model' => 'DGeneralNotification', 'state' => DGeneralNotificationState::IMPORTANT->value, 'name' => 'important', 'description' => 'notification importante', 'color' => 'error', 'icon' => 'material-symbols:danger'],
        ]);
        $this->info('Table p_states migration is done');

        //p_units
        DB::table('p_units')->truncate();
        DB::table('p_units')->insert([
            [
                'entitled' => 'unité',
                'type' => 0,
            ],
            [
                'entitled' => 'm²',
                'type' => 1,
            ],
            [
                'entitled' => 'm',
                'type' => 2,
            ],
            [
                'entitled' => 'm³',
                'type' => 3,
            ],
            [
                'entitled' => 'ml',
                'type' => 4,
            ],
            [
                'entitled' => 'mm',
                'type' => 5,
            ],
            [
                'entitled' => 'm².K/W',
                'type' => 6,
            ],
            [
                'entitled' => 'KW',
                'type' => 7,
            ],
            [
                'entitled' => '%',
                'type' => 8,
            ],
            [
                'entitled' => 'L',
                'type' => 9,
            ],
            [
                'entitled' => '°C',
                'type' => 10,
            ],
            [
                'entitled' => 'WThC',
                'type' => 11,
            ],
            [
                'entitled' => 'W/m²',
                'type' => 12,
            ],
        ]);
        $this->info('Table p_units migration is done');

        // p_t_v_a_s

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_04_070038_change_column_p_t_v_a_s_table.php',
        ]);

        DB::table('p_t_v_a_s')->truncate();
        DB::table('p_t_v_a_s')->insert([
            [
                'code' => 'non_specifie',
                'entitled' => 'Non spécifiée',
                'rate' => 0,
                'sign' => null,
            ],
            [
                'code' => 'guyane_mayotte',
                'entitled' => 'Taux à 0 % (Guyane et Mayotte)',
                'rate' => 0,
                'sign' => '+',
            ],
            [
                'code' => 'guadeloupe_martinique_reunion',
                'entitled' => 'Taux réduit à 2.1 % (Guadeloupe, Martinique et la Réunion)',
                'rate' => 0.021,
                'sign' => '-',
            ],
            [
                'code' => 'reste_domtom',
                'entitled' => 'Taux réduit à 8,5 % (Le reste du DomTom)',
                'rate' => 0.085,
                'sign' => '-',
            ],
            [
                'code' => 'reduit_metropole',
                'entitled' => 'Taux réduit à 5,5 % (La Métropole)',
                'rate' => 0.055,
                'sign' => '-',
            ],
            [
                'code' => 'intermediaire_metropole',
                'entitled' => 'Taux intermédiaire à 10 % (La Métropole)',
                'rate' => 0.1,
                'sign' => '-',
            ],
            [
                'code' => 'normal_metropole',
                'entitled' => 'Taux normal à 20 % (La Métropole)',
                'rate' => 0.2,
                'sign' => '-',
            ],
        ]);
        $this->info('Table PTVA migration is done');

        // p_type_visits

        DB::table('p_type_visits')->truncate();
        DB::table('p_type_visits')->insert([
            [
                'entitled' => 'Visite entreprise Retenue',
                'type' => 0,
                'color' => 'primary',
            ],
            [
                'entitled' => 'Visite Mar',
                'type' => 4,
                'color' => 'primary',
            ],
            [
                'entitled' => '2ème visite Mar',
                'type' => 1,
                'color' => 'secondary',
            ],
            [
                'entitled' => 'Visite de contrôle',
                'type' => 2,
                'color' => 'warning',
            ],
            [
                'entitled' => 'Relevé audit',
                'type' => 3,
                'color' => 'warning',
            ],
        ]);

        $this->info('Table p_type_visit migration is done');

        //d_works
        $dWorks = DWork::withoutEvents(function () {
            $dWorks = DWork::all();
            foreach ($dWorks as $dWork) {
                if (!$dWork->display_name) {
                    $dWork->update([
                        'display_name' => $dWork->reference,
                    ]);
                }
            }
            return $dWorks;
        });

        $this->info('Table d_works migration is done');

        // p_sub_categories
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_04_070817_change_column_p_sub_categories_table.php',
        ]);
        DB::table('p_sub_categories')->truncate();
        DB::table('p_sub_categories')->insert([
            [
                'sub_category' => 'Autre'
            ],
            [
                'sub_category' => 'Chaudière - Régulateur (BAR-TH-106/BAT-TH-102)'
            ],
            [
                'sub_category' => "VMC - Bouche d'extraction (BAR-TH-127/BAR-TH-125/BAT-TH-125)"
            ],
            [
                'sub_category' => "VMC - Bouche d'entrée d'air (BAR-TH-127/BAT-TH-125)"
            ],
        ]);
        $this->info('Table p_sub_categories migration is done');


        DB::table('p_steps')->truncate();
        $steps = [
            [
                'id' => 1,
                'reference' => 'StepSimulator',
                'display_name' => 'Création de dossier et simulation',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 1,
                'next_step_order' => 2,
                'prev_step_order' => null,
                'state_init' => 1,
                'state_fin' => 2,
                'permission' => 'step-simulator',
                'next_entitled_btn' => 'Eligible',
                'cancel_entitled_btn' => 'Non éligible',
                'decision' => true,
            ],
            [
                'id' => 2,
                'reference' => 'StepGenerateInitialDocument',
                'display_name' => 'Offres MAR',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 2,
                'next_step_order' => 3,
                'prev_step_order' => 1,
                'state_init' => 3,
                'state_fin' => 4,
                'permission' => 'step-generate-init-doc',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 27,
                'reference' => 'StepDesignationAgent',
                'display_name' => 'Selection des Entreprises',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 3,
                'next_step_order' => 4,
                'prev_step_order' => 2,
                'state_init' => 5,
                'state_fin' => 6,
                'permission' => 'step-offer-price-contract',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 26,
                'reference' => 'StepAppointmentMarAndTech',
                'display_name' => 'Planification de(s) 1ère(s) Visite(s)',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 4,
                'next_step_order' => 5,
                'prev_step_order' => 3,
                'state_init' => 9,
                'state_fin' => 10,
                'permission' => 'step-designation-agent',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 4,
                'reference' => 'StepFillShuttleCard',
                'display_name' => '1ère Visite',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 5,
                'next_step_order' => 6,
                'prev_step_order' => 4,
                'state_init' => 7,
                'state_fin' => 8,
                'permission' => 'step-appointment',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 5,
                'reference' => 'StepValidationDocumentsBeforeVisit',
                'display_name' => 'Vérification des documents',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 6,
                'next_step_order' => 7,
                'prev_step_order' => 5,
                'state_init' => 9,
                'state_fin' => 10,
                'permission' => 'step-shuttle-card',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 28,
                'reference' => 'StepAuditRapport',
                'display_name' => 'Rapport d\'audit', //new step
                'process_type' => 0,
                'type_step' => 0,
                'order' => 7,
                'next_step_order' => 8,
                'prev_step_order' => 6,
                'state_init' => 17,
                'state_fin' => 6,
                'permission' => 'step-validation-documents',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 11,
                'reference' => 'StepInstallerQuotationVerification',
                'display_name' => 'Sélection de(s) Artisant(s) et génération de(s) devis',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 8,
                'next_step_order' => 9,
                'prev_step_order' => 7,
                'state_init' => 21,
                'state_fin' => 22,
                'permission' => 'step-installer-quotation-verification',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 13,
                'reference' => 'StepDepotAnnah',
                'display_name' => 'Dépôt demande ANAH',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 9,
                'next_step_order' => 10,
                'prev_step_order' => 8,
                'state_init' => 25,
                'state_fin' => 26,
                'permission' => 'step-generate-document-after-validation-client',
                'next_entitled_btn' => 'Suivant',
            ],
            [
                'id' => 14,
                'reference' => 'StepAnahResponse',
                'display_name' => 'Réponse Demande ANAH ',
                'process_type' => 0,
                'type_step' => 0,
                'order' => 10,
                'next_step_order' => 11,
                'prev_step_order' => 9,
                'state_init' => 45,
                'state_fin' => 46,
                'permission' => 'step-depot-annah',
                'next_entitled_btn' => 'Suivant',
            ],
        ];
        foreach ($steps as $step) {
            PStep::create($step);
        }

        $this->info('Table p_steps migration is done');

        DB::table('p_step_documents')->truncate();
        DB::table('p_step_documents')->insert([
            [
                'type_doc' => 29,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 31,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 32,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 1,
                'required' => 1,
            ],
            [
                'type_doc' => 13,
                'order_step' => 1,
                'required' => 1,
            ],

            //Offres MAR
            [
                'type_doc' => 29,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 31,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 32,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 13,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 2,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 2,
                'required' => 1,
            ],

            //1ère Visite
            [
                'type_doc' => 39,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 1,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 15,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 29,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 31,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 32,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 5,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 5,
                'required' => 1,
            ],
          


            // Vérification des documents

            [
                'type_doc' => 1,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 15,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 29,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 30,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 31,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 32,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 34,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 38,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 0,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 36,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 46,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 4,
                'order_step' => 6,
                'required' => 1,
            ],
            [
                'type_doc' => 5,
                'order_step' => 6,
                'required' => 1,
            ],

            [
                'type_doc' => 39,
                'order_step' => 6,
                'required' => 1,
            ],
            //Rapport d'audit
            [
                'type_doc' => 22,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 6,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 1,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 2,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 3,
                'order_step' => 7,
                'required' => 1,
            ],
            [
                'type_doc' => 5,
                'order_step' => 7,
                'required' => 1,
            ],
            
            // Sélection de(s) Artisant(s) et génération de(s) devis 
            [
                'type_doc' => 7,
                'order_step' => 8,
                'required' => 1,
            ], 
            [
                'type_doc' => 16,
                'order_step' => 8,
                'required' => 1,
            ],
            [
                'type_doc' => 25,
                'order_step' => 8,
                'required' => 1,
            ],
            [
                'type_doc' => 8,
                'order_step' => 8,
                'required' => 1,
            ],
    
            //Réponse Demande ANAH 

            [
                'type_doc' => 28,
                'order_step' => 10,
                'required' => 1,
            ],
            [
                'type_doc' => 17,
                'order_step' => 10,
                'required' => 1,
            ],
          
        ]);

        $this->info('Table p_step_documents migration is done');


        DB::table('p_status_docs')->truncate();
        $data = [
            [
                'status' => 0,
                'entitled' => [
                    "Attacher document",
                    "Générer document",
                    "Remplir formulaire",
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'secondary.main',
            ],
            [
                'status' => 1,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Modifier formulaire',
                    "Modifier formulaire",
                    "Générer formulaire"
                ],
                'color' => 'warning.main',

            ],
            [
                'status' => 2,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Remplir formulaire',
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'info.main',

            ],
            [
                'status' => 3,
                'entitled' => [
                    'Attacher document',
                    'Document non signé',
                    'Document non signé',
                ],
                'color' => 'error.main',

            ],
            [
                'status' => 4,
                'entitled' => [
                    'Document attaché',
                    'Document finalisé',
                    'Document finalisé',
                    'Document finalisé',
                    'Document finalisé',
                ],
                'color' => 'success.main',

            ],
        ];
        foreach ($data as $item) {
            PStatusDoc::create([
                'status' => $item['status'],
                'entitled' => $item['entitled'],
                'color' => $item['color'],
            ]);
        }
        $this->info('Table p_status_docs migration is done');

        // p_scales
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_07_29_123819_add_columns_to_p_scales.php',
        ]);
        DB::table('p_scales')->truncate();
        $data = [
            [
                'reference' => 'mode_pose',
                'entitled' => 'Mode de Pose',
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    'ITE',
                    'ITI',
                    'Combles Perdus à dérouler',
                    'Combles Perdus par soufflage',
                    'Isolation thermique de Rampants de toiture',
                    'Isolation thermique des toitures-terrasses',
                ]
            ],
            [
                'reference' => 'cap_couverture',
                'entitled' => 'Cap. de couverture',
                'unit' => 1,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    'ITE',
                    'ITI',
                    'Isolation thermique de Rampants de toiture',
                    'Isolation thermique des toitures-terrasses',
                ]
            ],
            [
                'reference' => 'epaisseur',
                'entitled' => 'Epaisseur',
                'unit' => 5,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    'ITE',
                    'ITI',
                    'Combles Perdus à dérouler',
                    'Combles Perdus par soufflage',
                    'Isolation thermique de Rampants de toiture',
                    'Isolation thermique des toitures-terrasses'
                ]
            ],
            [
                'reference' => 'res_thermique',
                'entitled' => 'Rés. thermique',
                'unit' => 6,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    'ITE',
                    'ITI',
                    'Combles Perdus par soufflage',
                    'Combles Perdus à dérouler',
                    'Isolation thermique de Rampants de toiture',
                    'Isolation thermique des toitures-terrasses'
                ]
            ],
            [
                'reference' => 'cop',
                'entitled' => 'COP',
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                    "PAC air/eau",
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => 'scop',
                'entitled' => 'SCOP (doit être >= 3.9 pour la PAC air/air)',
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "ref_groupe_exterieure",
                'entitled' => "Ref groupe extérieure",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "seer",
                'entitled' => "SEER",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "conso_energetique_annuelle",
                'entitled' => "Conso énergétique annuelle",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "limites_fonctionnement",
                'entitled' => "LIMITES DE FONCTIONNEMENT",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "dimension",
                'entitled' => "DIMENSION",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],

            [
                'reference' => "classe_energetique",
                'entitled' => "CLASSE ENERGETIQUE",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "puissance_max_unites_interieures",
                'entitled' => "PUISSANCE MAX UNITES INTERIEURES",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],

            [
                'reference' => "nombre_unite_interieure",
                'entitled' => "NOMBRE UNITÉ INTÉRIEURE",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "puissance_mode_froid",
                'entitled' => "Puissance en mode froid (min-max)",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "puissance_mode_chaud",
                'entitled' => "Puissance en mode chaud (min-max)",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "debit_air",
                'entitled' => "Débit d'air",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",

                ]
            ],
            [
                'reference' => "pression_acoustique_min_max",
                'entitled' => "Pression acoustique min/max",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "mode_fonctionnement",
                'entitled' => "Modes de fonctionnement",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "fonctions_supplementaires",
                'entitled' => "Fonctions supplémentaires",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                ]
            ],
            [
                'reference' => "poids",
                'entitled' => "Poids",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Isolation thermique d'un plancher bas",
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "t_pac",
                'entitled' => "T° PAC",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "efficacite_saisonniere_35",
                'entitled' => "Efficacité Saisonnière à 35°c (ETAS)",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "calcul_selon_reglement",
                'entitled' => "Calculée selon le règlement (EU)",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "usage_pac",
                'entitled' => "Usage de PAC",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "type_pac",
                'entitled' => "Type PAC",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "dimensions_groupe_exterieur",
                'entitled' => "Dimensions Groupe Extérieur",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "dimensions_kit_hydraulique",
                'entitled' => "Dimensions Kit Hydraulique",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "puissance_acoustique_groupe_exterieur",
                'entitled' => "Puissance Acoustique du Groupe Extérieur à 1m",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],

            [
                'reference' => "poids_net_groupe_exterieur",
                'entitled' => "Poids net du Groupe Extérieur",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "temperature_arret",
                'entitled' => "Températures d'arrêt",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "ref_unit_interieure",
                'entitled' => "Ref unité intérieure",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "PAC air/eau",
                ]
            ],
            [
                'reference' => "puis_therm_nominale",
                'entitled' => "Puis. therm. nominale",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "profil_soutirage",
                'entitled' => "Profil de soutirage",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "mesure_selon_norme",
                'entitled' => "Mesuré selon les conditions de la norme",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "rendement_energetique_eta_wh",
                'entitled' => "RENDEMENT ENERGETIQUE Eta wh",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "puissance_resistance",
                'entitled' => "Puissance de la résistance (W)",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "temperature_fonctionnement",
                'entitled' => "Température de fonctionnement",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "pression_acoustique",
                'entitled' => "Pression acoustique (dB)",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "hauteur",
                'entitled' => "Hauteur",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "diametre",
                'entitled' => "Diamètre",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "poids_vide",
                'entitled' => "Poids à vide",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "classe_efficaite_energetique",
                'entitled' => "Classe d'efficacité énergétique",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "efficacite_thermique",
                'entitled' => "Efficacité thermique",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "type_installation_ballon",
                'entitled' => "type d'installation ballon",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "Thermodynamique",
                ]
            ],
            [
                'reference' => "type_caisson",
                'entitled' => "Type de caisson",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "type_vmc",
                'entitled' => "Type de la VMC",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "debit_air_max",
                'entitled' => "Débit d'air maximum",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "rendement_thermique_eleve",
                'entitled' => "Rendement thermique élevés de",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "moteur_faible_consommation",
                'entitled' => "Moteur faible consommation",
                'unit' => null,
                'type' => PScaleTypeEnum::TEXT->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "diametre_gaine_travers_mur",
                'entitled' => "Diamètre de gaine au travers du mur",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "VMC double flux",
                ]
            ],
            [
                'reference' => "surface_fenetre",
                'entitled' => "Surface des fenêtres",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                ]
            ],
            [
                'reference' => "coefficient_transmission_surf",
                'entitled' => "Coefficient de transmission surfacique (Uw)",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                ]
            ],
            [
                'reference' => "facteur_solaire",
                'entitled' => "Facteur solaire (Sw) ",
                'unit' => null,
                'type' => PScaleTypeEnum::NUMBER->value,
                'bars' => [
                    "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                ]
            ],

        ];
        foreach ($data as $datum) {
            PScale::create($datum);
        }
        $this->info('Table p_scales migration is done');
        //p_scale_list

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_07_29_124731_create_p_scale_lists_table.php',
        ]);
        DB::table('p_scale_lists')->truncate();
        DB::table('p_scale_lists')->insert([
            [
                'entitled' => 'Soufflé',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Deroulé',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'plaque',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Autres Mode de Pose',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Caisse standard',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => 'Caisson basse consommation',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => 'Caisson basse pression',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => "Type A : seules les bouches d'extraction sont hygroréglables",
                'scale' => 'type_vmc',
            ],
            [
                'entitled' => "Type B : les bouches d'extraction et les entrées d'air sont hygroréglables",
                'scale' => 'type_vmc',
            ],
            [
                'entitled' => "Chauffage seul",
                'scale' => 'usage_pac',
            ],
            [
                'entitled' => "Chauffage et eau chaude sanitaire",
                'scale' => 'usage_pac',
            ],
            [
                'entitled' => "air/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "eau/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "sol/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "Basse température",
                'scale' => 't_pac',
            ],
            [
                'entitled' => "Moyenne température",
                'scale' => 't_pac',
            ],
            [
                'entitled' => "Haute température",
                'scale' => 't_pac',
            ],
        ]);
        $this->info('Table p_scales_list migration is done');

        // p_notification_types


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_24_162235_create_p_notification_types_table.php',
        ]);
        DB::table('p_notification_types')->truncate();
        DB::table('p_notification_types')->insert([
            [
                'type' => 1,
                'entitled' => 'ANAH Notification'
            ],
            [
                'type' => 2,
                'entitled' => 'General Notification'
            ]
        ]);
        $this->info('Table p_notification_types migration is done');


        DB::table('p_notifications')->truncate();
        $operations = [
            [
                'entitled' => 'Ajouter un Installateur',
                'subject' => 'Création de compte',
                'mail' => 1,
                'web' => 0,
            ],
            [
                'entitled' => 'Ajouter un MAR',
                'subject' => 'Création de compte',
                'mail' => 1,
                'web' => 0,
            ],
            [
                'entitled' => 'Ajouter un Auditeur',
                'subject' => 'Création de compte',
                'mail' => 1,
                'web' => 0,
            ],
            [
                'entitled' => 'Ajouter un Collaborateur',
                'subject' => 'Création de compte',
                'mail' => 1,
                'web' => 0,
            ],
        ];

        $additional_display_names = [
            'Ajouter un nouveau produit',
            'Ajouter un nouveau scénario',
            "Ajouter un nouveau dossier par l'installateur",
            'Ajouter un nouveau dossier par le MAR et selection Installateur',
            "Generation d'un document de simulation",
            "Generation d'un document d'aide",
            'attacher document d\'aide signé',
            'Generation du document contrat MAR',
            'Insertion du contrat signé',
            'enregistrement d\'une date visite',
            'Enregistrement d\'une date visite Audit',
            'Changement d\'une date visite MAR',
            'Changement d\'une date visite Audit par l\'auditeur/MAR',
            'Validation d\'une date visite Audit par l\'auditeur',
            'Annulation d\'une visite Audit par l\'auditeur',
            'Generation de la Fiche navette',
            'Generation des documents synthéses',
            'Attachement des documents synthéses signés',
            'Attachement de l\'audit Energitique',
            'Generation du devis installateur',
            'Validation du devis',
            'Annulation du devis',
            'Generation des documents projets (devis)',
            'Signature Documents projet',
            'Generation Bon de travail',
            'Planification date de lancement des travaux',
            'Lancement des travaux',
            'Visiste sur chantier MAR suivi des travaux',
            'Finalisation des travaux',
            'Date visite Fin des travaux par MAR',
            'Generation bon de reception des travaux',
            'Signature bon de recpetion',
            'Reclamation sur les travaux',
            'Document de reserve travaux',
            'Fin des travaux reserves',
            'Generation document de satisfaction client',
            'Generation de la facture MAR',
            'Notification des date de paiement',
            'Paiement du devis installateur',
            'Projet Terminé',
            'Changement mot de passe',
            'Mot de passe oublié',
            "Generation d'un Bon De Travail",
            'Facturation pour le projet en attente de votre action',
            'Projet est éligible',
            'Projet est non éligible',
            "L'étape Simulation est terminé avec succès",
            "L'étape Documents d'aides est terminé avec succès",
            "L'étape Rendez-vous est terminé avec succès",
            "L'étape Relevés d'audit (Première visite) est terminé avec succès",
            "L'étape Validation et contrôle des documents est terminé avec succès",
            "L'étape Choix et devis de l'entreprise retenue est terminé avec succès",
            "L'étape Proposition des travaux préconisés est terminé avec succès",
            "L'étape Synthèse des travaux préconisés est terminé avec succès",
            "L'étape Lettre d'octroi de prime est terminé avec succès",
            "L'étape Constatation de fin de chantier est terminé avec succès",
            "L'étape Facture est terminé avec succès",
            "L'étape Documents clavis est terminé avec succès",
            "L'étape Suivi de paiement est terminé avec succès",
            "L'étape Désignation mandataires est terminé avec succès",
            "L'étape Devis et contrat est terminé avec succès",
            "L'étape Validation des documents est terminé avec succès",
            "L'étape Selection des Entreprises est terminé avec succès",
            "L'étape Vérification des documents est terminé avec succès",
            "L'étape Depot ANNAH est terminé avec succès",
            'la 1ère visite Mar est terminé avec succès',
            'Préconisation attachée',
            "enregistrement d\'une date visite Mar",
            "enregistrement d\'une date visite entreprise Retenue",
            "Dossier est approuvé par l'ANAH",
            "Dossier est suspendu par l'ANAH",
            "L'ANAH demande une modification dans le dossier",
            'Ajouter un Sous-traitant',
            'Ajouter un Mandataire',
            'Création Marque',
            'Une marque a été validée',


        ];

        $subject_names = [
            'Création Produit',
            'Création scénario',
            'Création dossier',
            'Affectation dossier',
            'Doc Simulation d\'aides',
            'Doc info préalable du bénéficiaire',
            'Doc signé',
            'Contrat MAR',
            'Contrat MAR signé',
            'Date 1ére visite',
            'Date visite audit',
            'Date 1ére visite modifiée',
            'Date visite d\'audit modifiée',
            'Date visite validée',
            'Date visite annulée',
            'Fiche navette',
            'Synthèse de grille d\'analyse de l\'ANAH',
            'Synthèse de grille d\'analyse signée',
            'Audit énérgétique',
            'Devis',
            'Validation devis',
            'Annulation devis',
            'Préparation d\'un projet de travail',
            'Préparation d\'un projet de travail signé',
            'Bon de travail',
            'Date lancement planifiée',
            'Lancement travaux',
            null,
            'Cloture chantier',
            'Contrôle chantier',
            'Doc Procès verbal',
            'Procès verbal signé',
            null,
            'Doc de réserve',
            'Procès verbal',
            'Formulaire de satisfaction',
            'Facture MAR',
            null,
            'Paiement du devis',
            'Projet Terminé',
            'Changement mot de passe',
            'Mot de passe oublié',
            'Bon De Travail',
            'Facturation pour le projet en attente de votre action',
            'Projet est éligible',
            'Projet est non éligible',
            "L'étape Simulation est terminé avec succès",
            "L'étape Documents d'aides est terminé avec succès",
            "L'étape Rendez-vous est terminé avec succès",
            "L'étape Relevés d'audit (Première visite) est terminé avec succès",
            "L'étape Validation et contrôle des documents est terminé avec succès",
            "L'étape Choix et devis de l'entreprise retenue est terminé avec succès",
            "L'étape Proposition des travaux préconisés est terminé avec succès",
            "L'étape Synthèse des travaux préconisés est terminé avec succès",
            "L'étape Lettre d'octroi de prime est terminé avec succès",
            "L'étape Constatation de fin de chantier est terminé avec succès",
            "L'étape Facture est terminé avec succès",
            "L'étape Documents clavis est terminé avec succès",
            "L'étape Suivi de paiement est terminé avec succès",
            "L'étape Désignation mandataires est terminé avec succès",
            "L'étape Devis et contrat est terminé avec succès",
            "L'étape Validation des documents est terminé avec succès",
            "L'étape Selection des Entreprises est terminé avec succès",
            "L'étape Vérification des documents est terminé avec succès",
            "L'étape Depot ANNAH est terminé avec succès",
            'la 1ère visite Mar est terminé avec succès',
            'Préconisation attachée',
            "Date visite Mar",
            'Date visite entreprise Retenue',
            "Dossier est approuvé par l'ANAH",
            "Dossier est suspendu par l'ANAH",
            "L'ANAH demande une modification dans le dossier",
            'Ajouter un Sous-traitant',
            'Ajouter un Mandataire',
            'Création Marque',
            'Une marque a été validée',
        ];

        foreach ($additional_display_names as $index => $display_name) {
            $operations[] = [
                'entitled' => $display_name,
                'subject' => $subject_names[$index] ?? null,
                'mail' => 1,
                'web' => 1,
            ];
        }
        PNotification::insert($operations);
        $this->info('Table p_notifications migration is done');

        //p_natures_docs


        DB::table('p_nature_docs')->truncate();
        DB::table('p_nature_docs')->insert([
            [
                'entitled' => 'Attached',
                'nature' => 0,
            ],
            [
                'entitled' => 'Generated',
                'nature' => 1,
            ],
            [
                'entitled' => 'Generated with form',
                'nature' => 2,
            ],
            [
                'entitled' => 'Generated with form and can be attached (Facultatif)',
                'nature' => 3,
            ],
            [
                'entitled' => 'Generated and can be attached (Facultatif)',
                'nature' => 4,
            ],
            [
                'entitled' => 'Downloaded',
                'nature' => 5,
            ],
        ]);
        $this->info('Table p_nature_docs migration is done');

        //p_documents

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_02_215723_add_column_to_p_documents_table.php',
        ]);

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_27_145338_add_column_to_p_documents_table.php',
        ]);

        DB::table('p_documents')->truncate();
        $documents = [
            [
                'id' => 1,
                'entitled' => 'Information générale préalable',
                'type' => 0,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'generalDocumentData',
                'skeleton_path' => 'Skeletons/general_information_skeleton.json',
                'blade_path' => 'Documents.general_information',
                'permissions' => ['generate-init-doc'],
                'exported' => 0,
                //docuSign
                'tabs' => [
                    [
                        'sign_page' => 1,
                        'x' => 385,
                        'y' => 740,
                    ]
                ],
                //digiSIgn
                // 'tabs' => [
                //     [
                //         'sign_page' => 0,
                //         'blc' => [
                //             'x' => 360,
                //             'y' => 47,
                //         ],
                //         'trc' => [
                //             'x' => 518,
                //             'y' => 103,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 2,
                'entitled' => 'Grille d’analyse du logement',
                'reference' => 'grilleData',
                'type' => 1,
                'signature' => 0,
                'docu_signature' => 0,
                'nature_doc' => PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value,
                'blade_path' => 'forms.staticform',
                'permissions' => [
                    'fill-grille-card-form',
                    'generate-grille-card-form',
                ],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 3,
                'entitled' => 'Synthèse de grille d’analyse du logement',
                'type' => 2,
                'signature' => 0,
                'docu_signature' => 0,
                'nature_doc' => PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value,
                'reference' => 'syntheseGrilleData',
                'blade_path' => 'forms.staticform2',
                'permissions' => [
                    'fill-synthese-grille-form',
                    'generate-synthese-grille-form',
                ],
                'exported' => 1,
                'is_project' => 1,
            ],
            [
                'id' => 4,
                'entitled' => 'Relevé d\'audit',
                'reference' => 'syntheseShuttleData',
                'type' => 3,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 2,
                'blade_path' => 'shuttle-card/pdf/shuttle_card',
                'permissions' => [
                    'fill-shuttle-card-form',
                    'generate-shuttle-card-form',
                ],
                'tabs' => [
                    [
                        'sign_page' => 0,
                        'blc' => [
                            'x' => 360,
                            'y' => 47,
                        ],
                        'trc' => [
                            'x' => 518,
                            'y' => 103,
                        ],
                    ],
                ],
                'exported' => 0,
                'is_project' => 1,
            ],
            // contract
            [
                'id' => 5,
                'entitled' => ' Contrat MAR',
                'type' => 4,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 1,
                'reference' => 'ContractMarData',
                'skeleton_path' => 'Skeletons/contract_mar_skeleton.json',
                'blade_path' => 'Documents.contract_mar',
                'permissions' => ['generate-contract-devis'],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 8,
                        'x' => 140,
                        'y' => 400,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 8,
                //         'blc' => [
                //             'x' => 388,
                //             'y' => 290,
                //         ],
                //         'trc' => [
                //             'x' => 535,
                //             'y' => 346,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 42,
                'entitled' => 'Devis MAR',
                'type' => 36,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 1,
                'required' => 1,
                'required' => 1,
                'reference' => 'InvoiceMarData',
                'skeleton_path' => 'Skeletons/devis_mar_skeleton.json',
                'blade_path' => 'Documents.devis_mar',
                'permissions' => ['generate-contract-devis'],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 1,
                        'x' => 200,
                        'y' => 680,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 0,
                //         'blc' => [
                //             'x' => 173,
                //             'y' => 89,
                //         ],
                //         'trc' => [
                //             'x' => 300,
                //             'y' => 148,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 6,
                'entitled' => 'Préconisation', // to change
                'reference' => 'preAuditData',
                'type' => 5,
                'nature_doc' => 0,
                'permissions' => ['attach-pre-audit'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 7,
                'entitled' => 'Audit énergétique',
                'reference' => 'document3ClData',
                'type' => 6,
                'nature_doc' => 0,
                'permissions' => ['attach-3cl'],
                'exported' => 1,
                'is_project' => 1,
            ],

            [
                'id' => 8,
                'entitled' => 'Attestation travaux-parcours accompagne-devis',
                'type' => 7,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'quotationData',
                'skeleton_path' => 'Skeletons/quotation_work.json',
                'blade_path' => 'Documents.quotation_work',
                'permissions' => ['generate-work-certificate'],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 4,
                        'x' => 60,
                        'y' => 240,
                    ]
                ],

                'is_project' => 1,
            ],
            [
                'id' => 9,
                'entitled' => 'Projet de travaux',
                'type' => 8,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,

                'reference' => 'workProjectData',
                'blade_path' => 'Documents.work_project',
                'skeleton_path' => 'Skeletons/work_project_skeleton.json',
                'permissions' => ['generate-project-work'],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 390,
                        'y' => 680,
                    ]
                ],

                'is_project' => 1,
            ],

            [
                'id' => 11,
                'entitled' => 'Aide de suivi de la réalisation',
                'type' => 9,
                'nature_doc' => 0,
                'reference' => 'assistanceMonitoringData',
                'permissions' => ['attach-assistance-project-monitoring'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 12,
                'entitled' => 'Procès Verbal de réception et contrôle chantier',
                'type' => 10,
                'nature_doc' => 1,
                'reference' => 'receptionReportData',
                'permissions' => ['generate-reception-report'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 13,
                'entitled' => 'Formulaire de satisfaction',
                'type' => 11,
                'nature_doc' => 0,
                'reference' => 'satisfactionFormData',
                'permissions' => ['fill-satisfaction-form', 'generate-satisfaction-form'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 15,
                'entitled' => 'Simulation',
                'type' => 13,
                'nature_doc' => 1,
                'reference' => 'simulationData',
                'blade_path' => 'Documents.simulation_document',
                'skeleton_path' => 'Skeletons/simulation_skeleton.json',
                'required' => 1,
                'permissions' => ['generate-simulation'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 16,
                'entitled' => 'Rapport d’accompagnement',
                'type' => 14,
                'nature_doc' => 0,
                'reference' => 'accompaniementData',
                'permissions' => ['generate-accompaniement-rapport'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 17,
                'entitled' => 'Demande d\'aide',
                'type' => 15,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'helpDemandData',
                'blade_path' => 'Documents.cerfa',
                'skeleton_path' => 'Skeletons/cerfa_skeleton.json',
                'permissions' => [
                    'fill-help-formula-form',
                    'generate-help-formula-form',
                ],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 3,
                        'x' => 350,
                        'y' => 700,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 376,
                //             'y' => 100,
                //         ],
                //         'trc' => [
                //             'x' => 509,
                //             'y' => 158,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 21,
                'entitled' => 'Devis Entreprise retenue',
                'type' => 16,
                'required' => 1,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'devisInstallateur',
                'blade_path' => 'Documents.devis_installateur',
                'skeleton_path' => 'Skeletons/devis_installateur_skeleton.json',
                'permissions' => [
                    'quotation-installer',
                ],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 70,
                        'y' => 185,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 55,
                //             'y' => 618,
                //         ],
                //         'trc' => [
                //             'x' => 162,
                //             'y' => 668,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 22,
                'entitled' => 'Bon De Travail',
                'type' => 17,
                'nature_doc' => 1,
                'reference' => 'BonDeTravailData',
                'permissions' => ['generate-bon-travail'],
                'blade_path' => 'Documents.bon_de_travail',
                'skeleton_path' => 'Skeletons/bon_de_travail_skeleton.json',
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 24,
                'entitled' => 'Reserve',
                'type' => 18,
                'nature_doc' => 2,
                'reference' => 'reserveData',
                'permissions' => ['generate-reserve'],
                'blade_path' => 'Documents.reserve',
                'skeleton_path' => 'Skeletons/reserve_skeleton.json',
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 25,
                'entitled' => 'Pv Réception',
                'type' => 19,
                'nature_doc' => 2,
                'reference' => 'pvReceptionData',
                'permissions' => ['generate-pv'],
                'blade_path' => 'Documents.pv_reception',
                'skeleton_path' => 'Skeletons/pv_reception_skeleton.json',
                'exported' => 0,
                'is_project' => 1,
            ],
            // [
            //     'id' => 26,
            //     'entitled' => 'Coherence Work',
            //     'type' => 20,
            //     'nature_doc' => 1,
            //     'reference' => 'CoherenceWork',
            //     'permissions' => ['generate-coherence'],
            //     'blade_path' => 'Documents.coherence',
            //     'skeleton_path' => 'Skeletons/coherence_skeleton.json',
            //     'exported' => 0,

            // ],
            [
                'id' => 27,
                'entitled' => 'Signature_doc',
                'type' => 21,
                'nature_doc' => 1,
                'reference' => 'SignatureCompany',
                'permissions' => ['attach-any-document'],
                'exported' => 0,
                'is_project' => 0,
            ],
            [
                'id' => 28,
                'entitled' => 'Audit social',
                'type' => 22,
                'nature_doc' => 0,
                'reference' => 'SocialAudit',
                'permissions' => ['attach-social-audit-document'],
                'exported' => 0,
                'is_project' => 1,
            ],

            // [
            //     'id' => 30,
            //     'entitled' => 'Attestation de travaux demande de paiement de prime',
            //     'type' => 24,
            //     'nature_doc' => 1,
            //     'reference' => 'primePaimentDemandData',
            //     'permissions' => ['generate-prime-payment-demand'],
            //     'blade_path' => 'Documents.demande_de_paiement',
            //     'skeleton_path' => 'Skeletons/demande_de_paiement_skeleton.json',
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            [ // tochange
                'id' => 31,
                'entitled' => 'Attestation de travaux demande de prime',
                'type' => 25,
                'nature_doc' => 1,
                'reference' => 'primeWorkDemandData',
                'permissions' => ['generate-prime-work-demand'], // to change
                'blade_path' => 'Documents.demande_prime', // to change
                'skeleton_path' => 'Skeletons/demande_prime_skeleton.json', // to change
                'exported' => 0,
                'signature' => 1,
                'docu_signature' => 1,
                'hidden' => 0,
                'tabs' => [
                    [
                        'sign_page' => 4,
                        'x' => 120,
                        'y' => 370,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 3,
                //         'blc' => [
                //             'x' => 115,
                //             'y' => 420,
                //         ],
                //         'trc' => [
                //             'x' => 262,
                //             'y' => 475,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 46,
                'entitled' => 'Engagements complémentaires',
                'type' => 46,
                'nature_doc' => 1,
                'reference' => 'additionalCommitments',
                'permissions' => ['generate-additional-commitments'], // to change
                'blade_path' => 'Documents.attestation_cee_mpr_accompagne', // to change
                'skeleton_path' => 'Skeletons/attestation_cee_mpr_accompagne_skeleton.json', // to change
                'exported' => 0,
                'signature' => 1,
                'docu_signature' => 1,
                'hidden' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 32,
                'entitled' => 'cerfa-15347 sur CEE',
                'type' => 26,
                'nature_doc' => 1,
                'reference' => 'ceeData',
                'permissions' => ['generate-cerfa-cee'],
                'blade_path' => 'Documents.cerfaCEE',
                'skeleton_path' => 'Skeletons/cerfaCEE_skeleton.json',
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 33,
                'entitled' => 'Le carnet information du logement',
                'type' => 27,
                'nature_doc' => 0,
                'downloadable' => 1,
                'reference' => 'carnetLogement',
                'permissions' => ['attach-carnet-logement'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 34,
                'entitled' => 'Lettre d’octroi de primes : document ANAH',
                'type' => 28,
                'nature_doc' => 0,
                'reference' => 'documentAnah',
                'permissions' => ['attach-octroi-prime'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 35,
                'entitled' => 'Pièce d’identité',
                'type' => 29,
                'nature_doc' => 0,
                'reference' => 'identityDocument',
                'permissions' => ['attach-identity-document'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 36,
                'entitled' => 'Justificatif de propriété',
                'type' => 30,
                'nature_doc' => 0,
                'reference' => 'propertyOwnershipProof',
                'permissions' => ['attach-property-ownership-proof'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 37,
                'entitled' => 'Dernière déclaration fiscale',
                'type' => 31,
                'nature_doc' => 0,
                'reference' => 'latestTaxReturn',
                'permissions' => ['attach-latest-tax-return'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 38,
                'entitled' => 'RIB ou IBAN',
                'type' => 32,
                'nature_doc' => 0,
                'reference' => 'bankAccountDetails',
                'permissions' => ['attach-bank-account-details'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 39,
                'entitled' => 'Son devis et son contrat signés',
                'type' => 33,
                'nature_doc' => 0,
                'reference' => 'signedQuoteAndContract',
                'permissions' => ['attach-signed-quote-and-contract'],
                'exported' => 0,
                'hidden' => 1,
                'is_project' => 1,
            ],
            [
                'id' => 44,
                'entitled' => 'Livret de famille',
                'type' => 38,
                'nature_doc' => 0,
                'reference' => 'familyRecordBook',
                'permissions' => ['attach-family-record-book'],
                'exported' => 0,
            ],

            [
                'id' => 40,
                'entitled' => 'Facture énergétique',
                'type' => 34,
                'nature_doc' => 0,
                'reference' => 'consumptionBills',
                'permissions' => ['attach-consumption-bills'],
                'exported' => 0,
            ],
            [
                'id' => 29,
                'entitled' => 'Cerfa16089 02 mandat general ADMINISTRATIF',
                'type' => 23,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatAdminData',
                'permissions' => ['generate-cerfa-mandat-administratif'],
                'blade_path' => 'Documents.mondat',
                'skeleton_path' => 'Skeletons/mondat_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],
            [
                'id' => 41,
                'entitled' => 'Cerfa16089 02 mandat general FINANCIER',
                'type' => 35,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatFinanData',
                'permissions' => ['generate-cerfa-mandat-financier'],
                'blade_path' => 'Documents.mondat',
                'skeleton_path' => 'Skeletons/mondat_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],

            [
                'id' => 43,
                'entitled' => 'Cerfa16089 02 mandat general',
                'type' => 37,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatGeneralData',
                'permissions' => ['generate-cerfa-mandat-general'],
                'blade_path' => 'Documents.mandat_general',
                'skeleton_path' => 'Skeletons/mandat_general_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],

            [
                'id' => 45,
                'entitled' => 'Mandat MAR',
                'type' => 39,
                'nature_doc' => PNatureDocEnum::GENERATED->value,
                'reference' => 'precaire',
                'permissions' => ['generate-precaire'],
                'blade_path' => 'Documents.cerfa_mandat_precaire',
                'skeleton_path' => 'Skeletons/cerfa_mandat_precaire_skeleton.json',
                'exported' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'tabs'=>[
                    [
                      'sign_page'=>2,
                      'x'=>65,
                      'y'=>670,
                      ]
                ],
            ],

            [
                'id' => 48,
                'entitled' => 'Avis d\'imposition',
                'reference' => 'avisDImposition',
                'type' => 48,
                'nature_doc' => 0,
                'permissions' => ['attach-imposition'],
                'exported' => 0,
            ],

        ];

        foreach ($documents as $document) {
            PDocument::create($document);
        }
        $this->info('Table p_documents migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_02_221005_remove_column_from_p_categroies_table.php',
        ]);
        DB::table('p_categories')->truncate();
        $data = [
            [
                'category' => 'Autre'
            ],
            [
                'category' => 'Isolation'
            ],
            [
                'category' => 'Calorifuge'
            ],
            [
                'category' => 'Ventilation'
            ],
            [
                'category' => 'Chauffage'
            ],
            [
                'category' => 'Consommable & accessoire'
            ],
        ];

        foreach ($data as $datum) {
            \App\Models\PCategory::create($datum);
        }

        $this->info('table p_categories migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_07_29_145009_create_p_bars_table.php',
        ]);
        $data = [
            [
                'reference' => 'ITE',
            ],
            [
                'reference' => 'ITI',
            ],
            [
                'reference' => 'Combles Perdus à dérouler',
            ],
            [
                'reference' => 'Combles Perdus par soufflage',
            ],
            [
                'reference' => "Isolation thermique de Rampants de toiture",
            ],
            [
                'reference' => "Isolation thermique des toitures-terrasses",
            ],
            [
                'reference' => "Isolation thermique d'un plancher bas",
            ],
            [
                'reference' => "PAC air/eau",
            ],
            [
                'reference' => "Thermodynamique",
            ],
            [
                'reference' => "VMC double flux",
            ],
            [
                'reference' => "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
            ],

        ];


        foreach ($data as $datum) {
            PBar::firstOrCreate($datum);
        }

        $this->info('table p_bars migration is done');




        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_28_083844_create_d_response_anahs_table.php',
        ]);

        $this->info('table d_response_anahs migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_24_162957_create_d_general_notifications_table.php',
        ]);

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_26_124808_add_column_to_d_general_notifications.php',
        ]);

        DB::table('d_general_notifications')->truncate();

        $data = [
            [
                'title' => 'Mise à jour du CRM GRON 2.5!',
                'description' => "<p>Voici les récentes améliorations apportées à GRON :</p><p class=\"ql-indent-1\"><strong><u>-Ajout d'un sous-traitant</u></strong> : Nouvelle fonctionnalité pour gérer les sous-traitants avec leurs différents RGE. (accès entreprise retenue)</p><p class=\"ql-indent-1\"><strong><u>-Nouveau produit</u></strong> : Ajout d'un produit avec des caractéristiques détaillées par apport au geste et obligation de la fiche technique.</p><p class=\"ql-indent-1\"><strong><u>-Amélioration du devis installateur</u>&nbsp;</strong>: Le devis est désormais plus complet, incluant davantage d’informations et offrant une meilleure maniabilité.<strong> </strong></p><p class=\"ql-indent-1\"><strong><u>-Signature électronique</u></strong> : Intégration de la signature électronique pour simplifier les approbations.</p><p class=\"ql-indent-1\"><strong><u>-Amélioration des statuts du dossier</u></strong> : Réorganisation des statuts pour une meilleure nomination et un ordre plus clair.</p><p class=\"ql-indent-1\"><strong><u>-Réorganisation des documents</u></strong> : Meilleure organisation des documents générés selon chaque étape du dossier.</p><p class=\"ql-indent-1\"><strong><u>-Visite MAR</u></strong> : Option ajoutée pour planifier une visite MAR si nécessaire.</p><p class=\"ql-indent-1\"><strong><u>-Accès inspecteur amélioré</u></strong> : Réglages pour faciliter l'accès des inspecteurs.</p><p class=\"ql-indent-1\"><strong><u>-Régénération des dates</u></strong> : Les dates des documents sont désormais régénérées en fonction des modifications de la date de visite.</p><p>Nous vous encourageons à explorer ces nouvelles fonctionnalités pour améliorer votre gestion des dossiers. Merci pour votre confiance et votre utilisation continue de GRON !</p>",
                'type' => 2,
                'state' => DGeneralNotificationState::IMPORTANT->value,
                'date' => now()
            ],
        ];
        DB::table('d_general_notifications')->insert($data);

        $this->info('table d_general_notifications migration is done');

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_24_164800_create_d_general_notification_role_table.php',
        ]);

        DB::table('d_general_notification_role')->truncate();

        $roles = [
            [
                'd_general_notification_id' => '1',
                'role_id' => '1',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '2',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '3',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '4',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '5',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '6',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '7',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '8',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '9',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '10',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '11',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '12',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '13',
            ],
            [
                'd_general_notification_id' => '1',
                'role_id' => '14',
            ],
        ];
        DB::table('d_general_notification_role')->insert($roles);
        $this->info('table d_general_notification_roles migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_24_173207_create_d_view_general_notifications_table.php',
        ]);

        $this->info('table d_view_general_notifications migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_04_165616_add_columns_to_d_project_invoice_lines.php',
        ]);

        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_31_182836_add_columns_to_d_project_invoice_lines.php',
        ]);

        $this->info('table d_project_invoice_lines migration is done');



        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_07_31_113119_create_d_product_scales_table.php',
        ]);

        $this->info('table d_product_scales migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_02_152723_create_d_product_prices_table.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_26_133156_change_collumn_d_product_prices.php',
        ]);
        $this->info('table d_product_prices migration is done');



        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_07_31_115533_add_columns_to_d_products.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_01_201328_update_state_in_d_products.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_02_164217_add_columns_to_d_products.php',
        ]);
        $this->info('table d_products migration is done');



        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_27_095953_change_column_d_notifications.php',
        ]);
        $this->info('table d_notifications migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_23_090212_create_d_invoice_cancel_comments_table.php',
        ]);
        $this->info('table d_invoice_cancel_comments migration is done');



        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_29_112921_add_column_to_d_company_project_docs_table.php',
        ]);

        $dCompanies = DCompany::all();
        foreach ($dCompanies as $dCompany) {
            $dCompany->projectDocs()->attach([
                46 => [                    // Assuming 25 is the `type_doc` ID in the `PDocument` model
                    'required' => 0,
                    'nature_doc' => 1,
                ]
            ]);
            $dCompany->projectDocs()->attach([
                25 => [                    // Assuming 25 is the `type_doc` ID in the `PDocument` model
                    'required' => 0,
                    'nature_doc' => 1,
                ]
            ]);
        }

        $this->info('table d_company_project_docs migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_02_111521_change_column_of_d_companies_table.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_29_123736_add_column_to_d_companies_table.php',
        ]);
        $this->info('table d_companies migration is done');


        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_08_21_114220_add_columns_to_d_projects.php',
        ]);

        $pSteps = PStep::pluck('order')->toArray();

        DProject::withoutEvents(function () use ($pSteps) {
            $projects = DProject::withTrashed()->get();
            foreach ($projects as $project) {
                if ($project->cleared_step_order > PStepOrder::StepAppointmentMarAndTech->value) {
                    $project->visits()->update([
                        'state'=>DProjectVisitState::FINISHED->value
                    ]);
                }
                if ($project->cleared_step_order > PStepOrder::StepAttachmentsOfVerifications->value) {
                    $project->state = DProjectState::FIRSTDEPOT->value;
                }
                if (!in_array($project->cleared_step_order, $pSteps)) {
                        $project->cleared_step_order = 10;
                        $project->current_step_order = 10;
                }
                $project->save();
            }
        });

        $this->info('table d_projects migration is done');


        $dProjectVisits = DProjectVisit::where('name', '1ère visite Mar')->get();
        foreach ($dProjectVisits as $key => $dProjectVisit) {
            $dProjectVisit->update([
                'name' => 'Visite entreprise Retenue',
            ]);
        }

    }


}
