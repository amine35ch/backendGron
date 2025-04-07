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
        Schema::create('mars', function (Blueprint $table) {
            $table->id();
            $table->string('entitled');
            $table->string('code')->unique();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('legal_representative')->nullable();
            $table->string('representative_role')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('siret')->nullable();

            $table->string('trade_name')->nullable();
            $table->string('approval_number')->nullable();
            $table->string('signature')->nullable();

            $table->tinyInteger('default_pagination')->default(10);
            $table->string('currency')->default('€');
            $table->tinyInteger('decimals')->default(3);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mars');
    }
};
