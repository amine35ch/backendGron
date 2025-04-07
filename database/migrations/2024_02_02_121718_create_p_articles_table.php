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
        Schema::create('p_articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->double('selling_price', 24, 6)->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')->references('type')->on('p_units');
            $table->tinyInteger('type')->nullable();
            $table->foreign('type')->references('type')->on('p_article_types');
            $table->string('path')->nullable();
            $table->string('doc_name')->nullable();
            $table->foreignId('p_brand_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('p_work_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->decimal('qte', 24, 6)->nullable();
            $table->decimal('unit_price_HT', 24, 6)->nullable();
            $table->decimal('discount', 24, 6)->nullable();
            $table->decimal('unit_price_HTNet', 24, 6)->nullable();
            $table->decimal('tva', 24, 6)->nullable();
            $table->decimal('unit_price_TTC', 24, 6)->nullable();
            $table->decimal('amount_HT', 24, 6)->nullable();
            $table->decimal('amount_HTNet', 24, 6)->nullable();
            $table->decimal('amount_TVA', 24, 6)->nullable();
            $table->decimal('amount_TTC', 24, 6)->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_articles');
    }
};
