<?php

use App\Models\PPermission;
use App\Models\PRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_permission_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PRole::class)
                ->references('id')
                ->on('p_roles')
                ->onUpdate('cascade');
            $table->foreignIdFor(PPermission::class)
                ->references('id')
                ->on('p_permissions')
                ->onUpdate('cascade');

            $table->foreignIdFor(Permission::class)
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_permission_roles');
    }
};
