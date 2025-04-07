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
        Schema::create('d_project_comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->foreignId('d_project_id')->constrained();
            $table->foreignId('d_company_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('type', ['update', 'cancel'])->default('update');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_comments');
    }
};
