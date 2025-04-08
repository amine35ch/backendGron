<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            // Vérifier si la table existe déjà
            $tableExists = Schema::hasTable('d_projects_refused');
            
            if ($tableExists) {
                // Si la table existe déjà, nous la supprimons d'abord
                Schema::dropIfExists('d_projects_refused');
                echo "Table d_projects_refused existante supprimée.\n";
            }
            
            // Création de la table sans les contraintes pour éviter les problèmes
            DB::statement("
                CREATE TABLE `d_projects_refused` (
                  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `status` tinyint(4) NOT NULL DEFAULT '0',
                  `state` tinyint(4) NOT NULL DEFAULT '0',
                  `number_of_floors` tinyint(4) DEFAULT NULL,
                  `income_class` tinyint(4) DEFAULT NULL,
                  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `batiment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `floor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `stairs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `door` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `isolated_surface` tinyint(4) DEFAULT NULL,
                  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `common` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `number_and_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `total_number_occupants` tinyint(4) DEFAULT NULL,
                  `number_of_children` tinyint(4) DEFAULT NULL,
                  `sum_revenue_reference_1` double(24,6) DEFAULT '0.000000',
                  `year_of_sum_revenue_reference_1` bigint(20) DEFAULT NULL,
                  `work_load_for_low_income_owners` tinyint(4) DEFAULT '0',
                  `free_hosting_for_low_income_household` tinyint(4) DEFAULT '0',
                  `number_of_residents_under_your_roof` tinyint(4) DEFAULT '0',
                  `number_of_dependent_children` tinyint(4) DEFAULT '0',
                  `sum_revenue_reference_2` double(24,6) DEFAULT '0.000000',
                  `year_of_sum_revenue_reference_2` bigint(20) DEFAULT NULL,
                  `d_client_id` bigint(20) unsigned DEFAULT NULL,
                  `d_company_id` bigint(20) unsigned DEFAULT NULL,
                  `current_step_order` int(11) DEFAULT NULL,
                  `phase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `process_ended` tinyint(4) DEFAULT '0',
                  `cost_ht_simulation` double(24,6) DEFAULT '0.000000',
                  `cost_ttc_simulation` double(24,6) DEFAULT '0.000000',
                  `rest_ht_simulation` double(24,6) DEFAULT '0.000000',
                  `rest_ttc_simulation` double(24,6) DEFAULT '0.000000',
                  `cost_ht_offre` double(24,6) DEFAULT '0.000000',
                  `cost_ttc_offre` double(24,6) DEFAULT '0.000000',
                  `rest_ht_offre` double(24,6) DEFAULT '0.000000',
                  `rest_ttc_offre` double(24,6) DEFAULT '0.000000',
                  `funding_mar` double(24,6) DEFAULT '0.000000',
                  `date_audit` date DEFAULT NULL,
                  `audit_identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `primary_energy_before_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `final_energy_before_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `gaz_emission_before_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `performance_energy_before_work` tinyint(4) DEFAULT NULL,
                  `surface_housing_before_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `scenario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `primary_energy_after_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `final_energy_after_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `gaz_emission_after_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `performance_energy_after_work` tinyint(4) DEFAULT NULL,
                  `surface_housing_after_work` double(24,6) NOT NULL DEFAULT '0.000000',
                  `class_skip` tinyint(4) DEFAULT NULL,
                  `project_nature` tinyint(4) DEFAULT NULL,
                  `process` tinyint(4) DEFAULT NULL,
                  `demande_project` tinyint(4) DEFAULT NULL,
                  `ceiling_height` double(24,6) NOT NULL DEFAULT '0.000000',
                  `nature_residence` tinyint(4) DEFAULT NULL,
                  `work_commun_parts` tinyint(4) DEFAULT NULL,
                  `more_than_fifteen` tinyint(4) DEFAULT NULL,
                  `logement_date_creation` bigint(20) DEFAULT NULL,
                  `ptz_beneficiary` tinyint(4) DEFAULT NULL,
                  `auto_rehabilitation` tinyint(4) DEFAULT NULL,
                  `energy_consumption_before` double(8,2) DEFAULT NULL,
                  `energy_consumption_after` double(8,2) DEFAULT NULL,
                  `work_type` tinyint(4) DEFAULT NULL,
                  `work_description` text COLLATE utf8mb4_unicode_ci,
                  `creator_id` bigint(20) unsigned DEFAULT NULL,
                  `is_third_party` tinyint(4) NOT NULL DEFAULT '0',
                  `has_auditor_mar` tinyint(4) NOT NULL DEFAULT '0',
                  `has_agent` tinyint(4) NOT NULL DEFAULT '1',
                  `third_party` bigint(20) unsigned DEFAULT NULL,
                  `cef_init` double(24,6) NOT NULL DEFAULT '0.000000',
                  `cef_fin` double(24,6) NOT NULL DEFAULT '0.000000',
                  `cep_init` double(24,6) NOT NULL DEFAULT '0.000000',
                  `cep_fin` double(24,6) NOT NULL DEFAULT '0.000000',
                  `cumac` double(24,6) NOT NULL DEFAULT '0.000000',
                  `cee` double(24,6) NOT NULL DEFAULT '0.000000',
                  `departmental_help` double(24,6) NOT NULL DEFAULT '0.000000',
                  `regional_help` double(24,6) NOT NULL DEFAULT '0.000000',
                  `help_local_authorities` double(24,6) NOT NULL DEFAULT '0.000000',
                  `eco_loan_stopped_thirty_mars` tinyint(4) DEFAULT NULL,
                  `renovation_advance_loan_seventeen_december` tinyint(4) DEFAULT NULL,
                  `other_description_of_remainder_payable` text COLLATE utf8mb4_unicode_ci,
                  `anah_mprs` double(24,6) NOT NULL DEFAULT '0.000000',
                  `consistency_of_well_verified_work` tinyint(4) DEFAULT NULL,
                  `reception_is_pronounced` tinyint(4) DEFAULT NULL,
                  `description_reception_is_pronounced` text COLLATE utf8mb4_unicode_ci,
                  `consistency_of_work_scenarios_checked` tinyint(4) DEFAULT NULL,
                  `derogation_request_criteria` json DEFAULT NULL,
                  `gain_energy` double(24,6) NOT NULL DEFAULT '0.000000',
                  `total_cost_energy_audit` double(24,6) NOT NULL DEFAULT '0.000000',
                  `dpe_before` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `dpe_after` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `prime_type` tinyint(4) DEFAULT NULL,
                  `deleted_at` timestamp NULL DEFAULT NULL,
                  `created_at` timestamp NULL DEFAULT NULL,
                  `updated_at` timestamp NULL DEFAULT NULL,
                  `isolated_surface_value` double(24,6) DEFAULT NULL,
                  `last_status_change` date DEFAULT NULL,
                  `anah_date` date DEFAULT NULL,
                  `inspector_id` bigint(20) unsigned DEFAULT NULL,
                  `supervisor_id` bigint(20) unsigned DEFAULT NULL,
                  `work_planned_start` datetime DEFAULT NULL,
                  `work_actual_start` datetime DEFAULT NULL,
                  `work_planned_end` datetime DEFAULT NULL,
                  `work_actual_end` datetime DEFAULT NULL,
                  `cleared_step_order` int(11) NOT NULL DEFAULT '1',
                  `invoice_mar` tinyint(4) NOT NULL DEFAULT '0',
                  `invoice_installer` tinyint(4) NOT NULL DEFAULT '0',
                  `project_residence` tinyint(4) DEFAULT NULL,
                  `anah_folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `merge_agent` tinyint(4) NOT NULL DEFAULT '0',
                  `deleted_by` bigint(20) unsigned DEFAULT NULL,
                  `class_skip_number` tinyint(4) DEFAULT NULL,
                  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                  `depot_anah_1` tinyint(4) NOT NULL DEFAULT '0',
                  `depot_anah_2` tinyint(4) NOT NULL DEFAULT '0',
                  `anah_first_depot_response_state` tinyint(4) NOT NULL DEFAULT '0',
                  `anah_first_depot_response` text COLLATE utf8mb4_unicode_ci,
                  `project_type` int(11) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC
            ");
            
            echo "Table d_projects_refused créée sans contraintes.\n";
            
            // Ajouter les index séparément
            Schema::table('d_projects_refused', function (Blueprint $table) {
                $table->index('income_class');
                $table->index('d_client_id');
                $table->index('d_company_id');
                $table->index('current_step_order');
                $table->index('phase');
                $table->index('performance_energy_before_work');
                $table->index('performance_energy_after_work');
                $table->index('class_skip');
                $table->index('project_nature');
                $table->index('process');
                $table->index('demande_project');
                $table->index('nature_residence');
                $table->index('work_type');
                $table->index('creator_id');
                $table->index('third_party');
                $table->index('inspector_id');
                $table->index('supervisor_id');
                $table->index('cleared_step_order');
                $table->index('project_residence');
                $table->index('deleted_by');
            });
            
            echo "Index ajoutés à la table d_projects_refused.\n";
            
            // Nous ne créons pas les contraintes de clé étrangère pour éviter les problèmes
            // Ces contraintes pourront être ajoutées ultérieurement si nécessaire
            
        } catch (\Exception $e) {
            echo "Erreur lors de la migration: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_projects_refused');
    }
}; 