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
        Schema::create('d_products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('state')->default(0);

            $table->string('reference');
            $table->string('type_produit_isolant')->nullable();
            $table->string('norme');
            $table->text('designation');

            $table->string('reference_acerni')->nullable();
            $table->date('date_validite_acerni')->nullable();
            $table->string('doc_acerni')->nullable();

            $table->string('reference_certita')->nullable();
            $table->date('date_validite_certita')->nullable();
            $table->string('doc_certita')->nullable();

            $table->string('reference_avis_tech')->nullable();
            $table->date('date_validite_avis_tech')->nullable();
            $table->string('doc_avis_tech')->nullable();

            $table->string('fiche_tech')->nullable();

            $table->boolean('marquage_ce')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_products');
    }
};
