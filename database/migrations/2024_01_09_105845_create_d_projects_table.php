<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('d_projects', function (Blueprint $table) {
            $table->id();

            $table->string('reference');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('state')->default(0);
            $table->tinyInteger('number_of_floors')->nullable();
            $table->tinyInteger('income_class')->nullable();
            $table->foreign('income_class')->references('type')->on('p_project_income_classes');

            // addressess
            $table->string('complement')->nullable();
            $table->string('address')->nullable();
            $table->string('batiment')->nullable();
            $table->string('floor')->nullable();
            $table->string('stairs')->nullable();
            $table->string('door')->nullable();
            $table->string('zip_code')->nullable();
            $table->tinyInteger('isolated_surface')->nullable();
            $table->string('city')->nullable();
            $table->string('common')->nullable();
            $table->string('number_and_street')->nullable();
            // addressess
            $table->tinyInteger('total_number_occupants')->nullable();
            $table->tinyInteger('number_of_children')->nullable();

            // REVENUE document demandce d'aide
            $table->double('sum_revenue_reference_1', 24, 6)->nullable()->default(0);
            $table->bigInteger('year_of_sum_revenue_reference_1')->nullable();
            // REVENUE document demandce d'aide

            // Cas Particulier document demandce d'aide
            $table->tinyInteger('work_load_for_low_income_owners')->nullable()->default(0);
            $table->tinyInteger('free_hosting_for_low_income_household')->nullable()->default(0);
            $table->tinyInteger('number_of_residents_under_your_roof')->nullable()->default(0);
            $table->tinyInteger('number_of_dependent_children')->nullable()->default(0);
            $table->double('sum_revenue_reference_2', 24, 6)->nullable()->default(0);
            $table->bigInteger('year_of_sum_revenue_reference_2')->nullable();
            // Cas Particulier document demandce d'aide

            $table->foreignId('d_client_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            //add mar
            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('current_step_order')->nullable();
            $table->foreign('current_step_order')->references('order')->on('p_steps');
            $table->string('phase')->nullable();
            $table->foreign('phase')->references('reference')->on('p_phases');

            $table->tinyInteger('process_ended')->nullable()->default(0);
            $table->double('cost_ht_simulation', 24, 6)->nullable()->default(0);
            $table->double('cost_ttc_simulation', 24, 6)->nullable()->default(0);
            $table->double('rest_ht_simulation', 24, 6)->nullable()->default(0);
            $table->double('rest_ttc_simulation', 24, 6)->nullable()->default(0);
            $table->double('cost_ht_offre', 24, 6)->nullable()->default(0);
            $table->double('cost_ttc_offre', 24, 6)->nullable()->default(0);
            $table->double('rest_ht_offre', 24, 6)->nullable()->default(0);
            $table->double('rest_ttc_offre', 24, 6)->nullable()->default(0);
            $table->double('funding_mar', 24, 6)->nullable()->default(0);

            //document devis

            $table->date('date_audit')->nullable();
            $table->string('audit_identifier')->nullable();
            $table->double('primary_energy_before_work', 24, 6)->default(0);
            $table->double('final_energy_before_work', 24, 6)->default(0);
            $table->double('gaz_emission_before_work', 24, 6)->default(0);
            $table->tinyInteger('performance_energy_before_work')->nullable();
            $table->foreign('performance_energy_before_work')->references('type')->on('p_project_energy_classes');
            $table->double('surface_housing_before_work', 24, 6)->default(0);

            // $table->string('scenario')->nullable();
            // $table->foreign('scenario')->references('type')->on('p_scenarios');
            // reference scenario constrained on id
            $table->string('scenario')->nullable();

            $table->double('primary_energy_after_work', 24, 6)->default(0);
            $table->double('final_energy_after_work', 24, 6)->default(0);
            $table->double('gaz_emission_after_work', 24, 6)->default(0);
            $table->tinyInteger('performance_energy_after_work')->nullable();
            $table->foreign('performance_energy_after_work')->references('type')->on('p_project_energy_classes');
            $table->double('surface_housing_after_work', 24, 6)->default(0);
            $table->tinyInteger('class_skip')->nullable();
            $table->foreign('class_skip')->references('type')->on('p_class_skip_counts');
            $table->tinyInteger('project_nature')->nullable();
            $table->foreign('project_nature')->references('type')->on('p_project_natures');

            // document devis

            //Mouti3 raja3hom
            $table->tinyInteger('process')->nullable();
            $table->foreign('process')->references('type')->on('p_processes');
            $table->tinyInteger('demande_project')->nullable();
            $table->foreign('demande_project')->references('type')->on('p_type_demande_projects');
            //Mouti3 raja3hom
            $table->double('ceiling_height', 24, 6)->default(0);  //Hauteur sous plafond (m) – (exp2.5m)  Fiche navette

            $table->tinyInteger('nature_residence')->nullable();
            $table->foreign('nature_residence')->references('type')->on('p_nature_residences');
            $table->tinyInteger('work_commun_parts')->nullable();
            $table->tinyInteger('more_than_fifteen')->nullable();
            $table->bigInteger('logement_date_creation')->nullable();
            $table->tinyInteger('ptz_beneficiary')->nullable();
            $table->tinyInteger('auto_rehabilitation')->nullable();
            $table->float('energy_consumption_before')->nullable();
            $table->float('energy_consumption_after')->nullable();
            $table->tinyInteger('work_type')->nullable();
            $table->foreign('work_type')->references('type')->on('p_work_types');
            $table->text('work_description')->nullable();

            $table->foreignId('creator_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            // third party
            $table->tinyInteger('is_third_party')->default(0);
            $table->tinyInteger('has_auditor_mar')->default(0);
            $table->tinyInteger('has_agent')->default(1);
            $table->foreignId('third_party')
                ->nullable()
                ->constrained('d_companies', 'id')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->double('cef_init', 24, 6)->default(0);
            $table->double('cef_fin', 24, 6)->default(0);
            $table->double('cep_init', 24, 6)->default(0);
            $table->double('cep_fin', 24, 6)->default(0);
            $table->double('cumac', 24, 6)->default(0);

            $table->double('cee', 24, 6)->default(0);
            $table->double('departmental_help', 24, 6)->default(0);
            $table->double('regional_help', 24, 6)->default(0);
            $table->double('help_local_authorities', 24, 6)->default(0);
            $table->tinyInteger('eco_loan_stopped_thirty_mars')->nullable();
            $table->tinyInteger('renovation_advance_loan_seventeen_december')->nullable();
            $table->text('other_description_of_remainder_payable')->nullable();
            $table->double('anah_mprs', 24, 6)->default(0);
            $table->tinyInteger('consistency_of_well_verified_work')->nullable();
            $table->tinyInteger('reception_is_pronounced')->nullable();
            $table->text('description_reception_is_pronounced')->nullable();
            $table->tinyInteger('consistency_of_work_scenarios_checked')->nullable();
            //invoice and quotation
            $table->json('derogation_request_criteria')->nullable();

            $table->double('gain_energy', 24, 6)->default(0);
            $table->double('total_cost_energy_audit', 24, 6)->default(0);
            $table->string('dpe_before')->nullable();
            $table->string('dpe_after')->nullable();
            $table->tinyInteger('prime_type')->nullable();
            // $table->integer('surface_housing_before_work')->nullable();
            // $table->string('performance_energy_before_work')->nullable();

            // $table->integer('primary_energy_after_work')->nullable();
            // $table->integer('final_energy_after_work')->nullable();
            // $table->integer('gaz_emission_after_work')->nullable();
            // $table->integer('surface_housing_after_work')->nullable();
            // $table->string('performance_energy_after_work')->nullable();

            // $table->tinyInteger('scenario_type')->nullable();

            // $table->foreign('scenario_type')->references('type')->on('p_scenarios');

            // $table->foreignId('auditor_id')
            //     ->nullable()
            //     ->constrained('d_third_parties', 'id')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');

            // $table->date('date_realization_audit')->nullable();
            // $table->date('date_signature_client')->nullable();
            // $table->string('location_client')->nullable();
            // $table->date('date_signature_mar')->nullable();
            // $table->string('location_mar')->nullable();

            // $table->tinyInteger('demande_project')->nullable();
            // $table->foreign('demande_project')->references('type')->on('p_type_demande_projects');
            // $table->tinyInteger('project_residence')->nullable();
            // $table->foreign('project_residence')->references('type')->on('p_project_residences');
            // $table->tinyInteger('project_nature')->nullable();
            // $table->foreign('project_nature')->references('type')->on('p_project_natures');

            // $table->tinyInteger('project_energy_class')->nullable();
            // $table->foreign('project_energy_class')->references('type')->on('p_project_energy_classes');

            // $table->tinyInteger('p_class_skip')->nullable();
            // $table->foreign('p_class_skip')->references('type')->on('p_class_skips');

            // $table->float('shab', 24, 6)->nullable();
            // $table->tinyInteger('floor_number')->nullable();
            // $table->tinyInteger('measurements_surfaces_insulated')->nullable();
            // $table->float('work_cost_ht', 24, 6)->nullable();
            // $table->float('rest_charge_ht', 24, 6)->nullable();
            // $table->float('comble_perdu')->nullable();
            // $table->float('rampants')->nullable();
            // $table->float('plancher_bas')->nullable();
            // $table->float('ite')->nullable();
            // $table->float('iti')->nullable();
            // $table->integer('pac_air_air')->nullable();
            // $table->integer('pac_air_eau')->nullable();
            // $table->integer('vmc')->nullable();
            // $table->integer('ballon_thermo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_projects');
    }
};
