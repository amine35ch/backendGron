<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('d_works', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->text('description')->nullable();
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')->references('type')->on('p_units');
            $table->json('pricing_list')->nullable();
            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('mar_id')
                ->nullable()
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->tinyInteger('access')->default(-1);
            $table->tinyInteger('state')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_works');
    }
};
