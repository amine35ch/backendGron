<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // D'abord, supprimer la contrainte de clé étrangère qui empêche de supprimer la colonne
        try {
            // Vérifier si la contrainte existe
            $constraintExists = DB::select("
                SELECT * FROM information_schema.KEY_COLUMN_USAGE
                WHERE REFERENCED_TABLE_NAME = 'p_categories'
                AND REFERENCED_COLUMN_NAME = 'category'
                AND TABLE_NAME = 'd_products'
                AND CONSTRAINT_NAME = 'd_products_category_foreign'
            ");

            if (!empty($constraintExists)) {
                // Supprimer la clé étrangère
                Schema::table('d_products', function (Blueprint $table) {
                    $table->dropForeign('d_products_category_foreign');
                });
                echo "Contrainte de clé étrangère supprimée.\n";
            }
        } catch (\Exception $e) {
            // Log l'erreur mais continuer
            echo "Erreur lors de la suppression de la contrainte: " . $e->getMessage() . "\n";
        }

        // Maintenant, exécuter les opérations de la migration originale
        try {
            // Créer une colonne temporaire si elle n'existe pas
            if (!Schema::hasColumn('p_categories', 'provisoir')) {
                Schema::table('p_categories', function (Blueprint $table) {
                    $table->string('provisoir')->nullable();
                });
            }

            // Copier les valeurs de 'category' vers 'provisoir' pour les préserver
            DB::statement('UPDATE p_categories SET provisoir = category');

            // Supprimer l'ancienne colonne si elle existe
            if (Schema::hasColumn('p_categories', 'entitled')) {
                Schema::table('p_categories', function (Blueprint $table) {
                    $table->dropColumn('entitled');
                });
            }

            // Supprimer et recréer la colonne 'category'
            // On utilise des commandes SQL brutes pour plus de contrôle
            if (Schema::hasColumn('p_categories', 'category')) {
                DB::statement('ALTER TABLE p_categories DROP COLUMN category');
            }

            // Ajouter la nouvelle colonne category
            Schema::table('p_categories', function (Blueprint $table) {
                $table->string('category')->unique();
            });

            // Restaurer les valeurs
            DB::statement('UPDATE p_categories SET category = provisoir');

            // Définir la colonne comme clé primaire
            DB::statement('ALTER TABLE p_categories MODIFY category VARCHAR(255) PRIMARY KEY');

            // Supprimer la colonne temporaire
            if (Schema::hasColumn('p_categories', 'provisoir')) {
                Schema::table('p_categories', function (Blueprint $table) {
                    $table->dropColumn('provisoir');
                });
            }

            // Recréer la clé étrangère si nécessaire
            Schema::table('d_products', function (Blueprint $table) {
                if (!Schema::hasColumn('d_products', 'category')) {
                    $table->string('category')->nullable();
                }
                // Attention : ne pas recréer la clé étrangère si elle causerait des problèmes
                // $table->foreign('category')->references('category')->on('p_categories');
            });

        } catch (\Exception $e) {
            echo "Erreur lors de la migration: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pas d'action ici, car cette migration est corrective
    }
}; 