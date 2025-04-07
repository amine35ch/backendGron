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
        Schema::table('d_companies', function (Blueprint $table) {
            $table->unsignedBiginteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')
            ->on('users')->onDelete('set null');
        });
        Schema::table('d_projects', function (Blueprint $table) {
            $table->unsignedBiginteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')
            ->on('users')->onDelete('set null');
        });
        Schema::table('d_clients', function (Blueprint $table) {
            $table->unsignedBiginteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')
            ->on('users')->onDelete('set null');
        });
        Schema::table('d_articles', function (Blueprint $table) {
            $table->unsignedBiginteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')
            ->on('users')->onDelete('set null');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBiginteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')
            ->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_companies', function (Blueprint $table) {
            //
        });
    }
};
