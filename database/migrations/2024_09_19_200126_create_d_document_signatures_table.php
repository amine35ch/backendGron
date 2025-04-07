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
        Schema::create('d_document_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('envelope_id');
            $table->foreignId('d_project_id')->constrained();
            $table->foreignId('d_company_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->tinyInteger('with_sms')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_document_signatures');
    }
};
