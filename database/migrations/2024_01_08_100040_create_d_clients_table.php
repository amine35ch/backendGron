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
        Schema::create('d_clients', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('position')->nullable();
            $table->string('code');
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('building')->nullable();
            $table->string('stairs')->nullable();
            $table->string('floor')->nullable();
            $table->string('door')->nullable();
            $table->string('commune')->nullable();
            $table->string('signature')->nullable();
            $table->tinyInteger('state')->nullable()->default(1);
            $table->tinyInteger('type')->nullable();
            $table->foreign('type')->references('type')->on('p_type_clients');
            $table->string('email_contact')->nullable();
            $table->string('email_contact_two')->nullable();
            $table->string('phone_number_1')->unique();
            $table->string('phone_number_2')->unique()->nullable();
            $table->string('representative')->nullable();

            $table->tinyInteger('gender')->nullable();  // added Mouti3
            $table->string('year_of_birth')->nullable();  // added Mouti3
            $table->tinyInteger('number_unborn_children')->nullable();  // added Mouti3
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_clients');
    }
};
