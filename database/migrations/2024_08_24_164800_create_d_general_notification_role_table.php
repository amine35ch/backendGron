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
        Schema::create('d_general_notification_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('d_general_notification_id');
            $table->unsignedBiginteger('role_id');

            $table->foreign('d_general_notification_id')->references('id')
                 ->on('d_general_notifications')->onDelete('cascade');
            $table->foreign('role_id')->references('id')
                ->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_general_notifications_roles');
    }
};
