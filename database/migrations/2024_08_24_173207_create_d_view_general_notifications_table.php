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
        Schema::create('d_view_general_notifications', function (Blueprint $table) {
            $table->id();
            $table->boolean('viewed');
            $table->unsignedBiginteger('d_general_notification_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreign('d_general_notification_id')->references('id')
            ->on('d_general_notifications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_general_notifications');
    }
};
