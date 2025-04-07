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
        Schema::table('d_project_works', function (Blueprint $table) {
            $table->integer('qty_simulation')->default(0);
            $table->double('price_unit_ht_simulation', 24, 6)->default(0);
            $table->string('entitled')->nullable();
            $table->unsignedBigInteger('d_prestation_id')->nullable();
            $table->foreign('d_prestation_id')->references('id')->on('d_works');
            $table->dropForeign('d_project_works_d_prestation_id_foreign');
            $table->dropColumn('d_prestation_id');
            $table->unsignedBigInteger('d_service_id')->nullable();
            $table->foreign('d_service_id')->references('id')->on('d_articles');
            $table->double('tva', 24, 6)->default(0);
            $table->double('price_unit_ht', 24, 6)->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_works', function (Blueprint $table) {
            //
        });
    }
};
