<?php

use App\Models\DProduct;
use App\Models\PScale;
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
        Schema::create('d_product_scales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('d_product_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('scale_reference');
            $table->foreign('scale_reference')
                ->references('reference')
                ->on('p_scales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('value')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_product_scales');
    }
};
