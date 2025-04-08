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
        try {
            // Suppression des colonnes si elles existent
            if (Schema::hasColumn('p_sub_categories', 'entitled')) {
                Schema::table('p_sub_categories', function (Blueprint $table) {
                    $table->dropColumn('entitled');
                });
                echo "Colonne entitled supprimée.\n";
            }

            // Créer une colonne provisoire si nécessaire pour la nouvelle clé primaire
            if (!Schema::hasColumn('p_sub_categories', 'temp_key')) {
                Schema::table('p_sub_categories', function (Blueprint $table) {
                    $table->string('temp_key')->nullable();
                });
                
                // Générer des valeurs uniques pour la nouvelle clé primaire
                $counter = 1;
                $rows = DB::table('p_sub_categories')->get();
                foreach ($rows as $row) {
                    DB::table('p_sub_categories')
                        ->where('sub_category', $row->sub_category ?? '')
                        ->update(['temp_key' => 'SUB_' . $counter++]);
                }
                echo "Clés temporaires générées.\n";
            }

            // Suppression de sub_category si elle existe
            if (Schema::hasColumn('p_sub_categories', 'sub_category')) {
                // Vérifier s'il y a des contraintes de clé étrangère
                $constraints = DB::select("
                    SELECT * FROM information_schema.KEY_COLUMN_USAGE
                    WHERE REFERENCED_TABLE_NAME = 'p_sub_categories'
                    AND REFERENCED_COLUMN_NAME = 'sub_category'
                ");
                
                // Suppression des contraintes si nécessaire
                foreach ($constraints as $constraint) {
                    $tableName = $constraint->TABLE_NAME;
                    $constraintName = $constraint->CONSTRAINT_NAME;
                    DB::statement("ALTER TABLE `{$tableName}` DROP FOREIGN KEY `{$constraintName}`");
                    echo "Contrainte {$constraintName} sur la table {$tableName} supprimée.\n";
                }
                
                // Suppression de la colonne
                Schema::table('p_sub_categories', function (Blueprint $table) {
                    $table->dropColumn('sub_category');
                });
                echo "Colonne sub_category supprimée.\n";
            }
            
            // Création de la nouvelle colonne sub_category
            Schema::table('p_sub_categories', function (Blueprint $table) {
                $table->string('sub_category')->unique();
            });
            echo "Colonne sub_category recréée.\n";
            
            // Copier les valeurs temporaires
            DB::statement('UPDATE p_sub_categories SET sub_category = temp_key');
            echo "Valeurs copiées dans sub_category.\n";
            
            // Définir la colonne comme clé primaire
            DB::statement('ALTER TABLE p_sub_categories MODIFY sub_category VARCHAR(255) PRIMARY KEY');
            echo "Colonne sub_category définie comme clé primaire.\n";
            
            // Supprimer la colonne temporaire
            if (Schema::hasColumn('p_sub_categories', 'temp_key')) {
                Schema::table('p_sub_categories', function (Blueprint $table) {
                    $table->dropColumn('temp_key');
                });
                echo "Colonne temporaire supprimée.\n";
            }
            
            // Supprimer provisoir si elle existe
            if (Schema::hasColumn('p_sub_categories', 'provisoir')) {
                Schema::table('p_sub_categories', function (Blueprint $table) {
                    $table->dropColumn('provisoir');
                });
                echo "Colonne provisoir supprimée.\n";
            }
            
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
        // Pas d'action de reversion nécessaire pour cette migration corrective
    }
}; 