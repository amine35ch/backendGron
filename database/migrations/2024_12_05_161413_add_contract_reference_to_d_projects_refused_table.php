<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('d_projects_refused', function (Blueprint $table) {
            $table->string('contractReference')->nullable();
        });
        Schema::table('d_projects_refused', function (Blueprint $table) {
            $table->string('contractReference')->unique()->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_projects_refused', function (Blueprint $table) {
            Schema::table('d_projects_refused', function (Blueprint $table) {
                $table->dropUnique(['contractReference']);
                $table->dropColumn('contractReference');
            });
        });
    }


};
