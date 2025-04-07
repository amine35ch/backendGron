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
        Schema::create('d_brand_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('d_brand_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('d_company_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->tinyInteger('state')->nullable()->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_brand_lines');
    }
};
