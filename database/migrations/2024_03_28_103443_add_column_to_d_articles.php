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
        Schema::table('d_articles', function (Blueprint $table) {
            $table->double('tva', 24, 6)->nullable();
            $table->string('mode_de_pose')->nullable();
            $table->string('cap_de_couverture')->nullable();
            $table->string('epaisseur')->nullable();
            $table->string('res_thermique')->nullable();
            $table->string('res_norme')->nullable();
            $table->string('puis_therm_nominale')->nullable();
            $table->string('cop')->nullable();
            $table->string('type_pac')->nullable();
            $table->string('scop')->nullable();
            $table->string('t_pac')->nullable();
            $table->string('efficacite_energ_saisonniere')->nullable();
            $table->string('temperatures_d_arret')->nullable();
            $table->string('ref_unite_interieure')->nullable();
            $table->string('ref_groupe_exterieure')->nullable();
            $table->string('label_flamme_verte_7')->nullable();
            $table->string('type_d_appareil')->nullable();
            $table->string('utilisant')->nullable();
            $table->string('classe')->nullable();
            $table->string('chaudiere_operee_d_une_maniere')->nullable();
            $table->string('capacite_de_stockage_du_ou_des_ballon_s_d_eau_chaude')->nullable();
            $table->string('puis_elec_absorbee_ponderee')->nullable();
            $table->string('type_de_caisson')->nullable();
            $table->string('type_de_la_vmc')->nullable();
            $table->string('nbr_unites_supplementaires')->nullable();
            $table->string('type_d_installation_ballon')->nullable();
            $table->string('diametre')->nullable();
            $table->string('quantite_de_chaleur_nette_utile_produite_par_la_chaudiere')->nullable();
            $table->string('rendement_a_pleine_charge')->nullable();
            $table->string('efficacite_thermique_de_l_echangeur')->nullable();
            $table->string('marque_de_l_echangeur')->nullable();
            $table->string('reference_de_l_echangeur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_articles', function (Blueprint $table) {
            //
        });
    }
};
