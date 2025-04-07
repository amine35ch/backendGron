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
        Schema::create('d_general_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('type');
            $table->date('date');
            $table->string('version')->nullable();
            $table->foreign('type')->references('type')->on('p_notification_types');
            $table->tinyInteger('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_general_notifications');
    }
};
