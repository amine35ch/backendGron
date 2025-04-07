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
        Schema::create('d_article_d_work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('d_article_id');
            $table->unsignedBiginteger('d_work_id');
            $table->foreign('d_article_id')->references('id')
            ->on('d_articles')->onDelete('cascade');
            $table->foreign('d_work_id')->references('id')
                ->on('d_works')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_article_d_work');
    }
};
