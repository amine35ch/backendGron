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
        Schema::create('d_product_prices', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('state')->nullable()->default(0);
            $table->double('prix_achat_ht', 24, 6)->default(0);
            $table->double('prix_achat_ttc', 24, 6)->default(0);
            $table->double('prix_vente_ht', 24, 6)->default(0);
            $table->double('prix_vente_ttc', 24, 6)->default(0);
            $table->foreignId('d_product_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('d_company_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('tva')->nullable();
            $table->foreign('tva')
                ->references('code')
                ->on('p_t_v_a_s')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_product_prices');
    }
};
