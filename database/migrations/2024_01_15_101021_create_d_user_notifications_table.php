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
        Schema::create('d_user_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->text('description');
            $table->tinyInteger('vue')->default(0);
            $table->tinyInteger('email')->default(0);
            $table->string('endpoint')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_user_notifications');
    }
};
