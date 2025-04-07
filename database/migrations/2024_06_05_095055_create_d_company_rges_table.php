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
        Schema::create('d_company_rges', function (Blueprint $table) {
            $table->id();
            $table->string('rge');
            $table->foreignId('d_company_id')
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->json('qualifications')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_company_rges');
    }
};
