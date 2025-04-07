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
        Schema::table('d_product_prices', function($table)
        {
            $table->double('prix_achat_ht', 24, 6)->nullable()->default(0)->change();
            $table->double('prix_achat_ttc', 24, 6)->nullable()->default(0)->change();
            $table->double('prix_vente_ht', 24, 6)->nullable()->default(0)->change();
            $table->double('prix_vente_ttc', 24, 6)->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
