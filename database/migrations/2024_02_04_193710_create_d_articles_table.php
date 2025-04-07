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
        Schema::create('d_articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->text('description')->nullable();
            // $table->double('selling_price', 24, 6)->default(0);
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')->references('type')->on('p_units');
            $table->tinyInteger('type')->nullable();
            $table->foreign('type')->references('type')->on('p_article_types');
            $table->string('path')->nullable();
            $table->string('doc_name')->nullable();
            $table->foreignId('d_brand_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
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
            $table->tinyInteger('access')->default(0);
            $table->tinyInteger('is_validated')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_articles');
    }
};
