<?php

use App\Models\PResource;
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
        Schema::create('p_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('entitled');
            $table->string('local_fr');
            $table->foreignIdFor(Permission::class)
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade');
            $table->foreignIdFor(PResource::class)
                ->references('id')
                ->on('p_resources')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_permissions');
    }
};
