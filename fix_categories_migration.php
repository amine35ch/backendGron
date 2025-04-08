<?php

// Ce script supprime la migration problématique de catégories et la remplace par notre version corrigée

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

$problematicMigration = '2024_09_02_221005_remove_column_from_p_categroies_table';
$fixedMigration = '2024_09_02_221005_fix_categories_table';

try {
    echo "Correction de la migration des catégories...\n";
    
    // 1. Vérifier si la migration problématique existe dans la table migrations
    $migrationExists = DB::table('migrations')
        ->where('migration', $problematicMigration)
        ->exists();
    
    if ($migrationExists) {
        echo "Migration problématique trouvée dans la table migrations.\n";
        
        // 2. Supprimer la migration problématique de la table migrations
        DB::table('migrations')
            ->where('migration', $problematicMigration)
            ->delete();
        
        echo "Migration problématique supprimée de la table migrations.\n";
    } else {
        echo "Migration problématique non trouvée dans la table migrations.\n";
    }
    
    // 3. Supprimer le fichier de migration problématique s'il existe
    $problematicFilePath = __DIR__ . '/database/migrations/' . $problematicMigration . '.php';
    if (file_exists($problematicFilePath)) {
        if (unlink($problematicFilePath)) {
            echo "Fichier de migration problématique supprimé avec succès.\n";
        } else {
            echo "Impossible de supprimer le fichier de migration problématique.\n";
        }
    } else {
        echo "Fichier de migration problématique non trouvé.\n";
    }
    
    // 4. Exécuter la migration corrective
    echo "Exécution de la migration corrective...\n";
    
    $exitCode = Artisan::call('migrate', [
        '--path' => 'database/migrations/' . $fixedMigration . '.php'
    ]);
    
    echo Artisan::output();
    
    if ($exitCode === 0) {
        echo "Migration corrective exécutée avec succès!\n";
    } else {
        echo "Erreur lors de l'exécution de la migration corrective.\n";
    }
    
    echo "\nRecommandation: Exécutez 'php artisan migrate' pour continuer les migrations.\n";
    
} catch (\Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
} 