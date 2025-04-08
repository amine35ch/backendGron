<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Vérifier d'abord si la colonne existe avant d'essayer de la supprimer
        $hasColumn = false;
        try {
            $hasColumn = Schema::hasColumn('d_companies', 'qualification_auditor');
        } catch (\Exception $e) {
            // En cas d'erreur, on suppose que la colonne n'existe pas
            $hasColumn = false;
        }

        // Si la colonne existe, on la supprime
        if ($hasColumn) {
            Schema::table('d_companies', function (Blueprint $table) {
                $table->dropColumn('qualification_auditor');
            });
        }

        // Ajout des autres colonnes de la migration originale
        Schema::table('d_companies', function (Blueprint $table) {
            if (!Schema::hasColumn('d_companies', 'signature_interne')) {
                $table->boolean('signature_interne')->default(0);
            }
            
            // Modification de la colonne existante avec un try/catch pour éviter les erreurs
            try {
                if (Schema::hasColumn('d_companies', 'num_decennale')) {
                    // Utiliser DB::statement pour éviter les erreurs sur le change()
                    DB::statement('ALTER TABLE d_companies MODIFY num_decennale VARCHAR(255) NULL DEFAULT "2"');
                }
            } catch (\Exception $e) {
                // Log de l'erreur sans bloquer la migration
                Log::error('Erreur lors de la modification de la colonne num_decennale: ' . $e->getMessage());
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_companies', function (Blueprint $table) {
            if (Schema::hasColumn('d_companies', 'signature_interne')) {
                $table->dropColumn('signature_interne');
            }
        });
    }
}; 