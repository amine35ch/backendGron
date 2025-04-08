<?php

// Ce script supprime définitivement une migration problématique du système

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$migrationName = '2024_08_29_123736_add_column_to_d_companies_table';

try {
    echo "Recherche de la migration '{$migrationName}' dans la base de données...\n";
    
    // Vérifier si la migration existe dans la table migrations
    $exists = DB::table('migrations')
        ->where('migration', $migrationName)
        ->exists();
    
    if ($exists) {
        // Supprimer la migration de la table migrations
        DB::table('migrations')
            ->where('migration', $migrationName)
            ->delete();
        
        echo "Migration '{$migrationName}' supprimée du système avec succès.\n";
    } else {
        echo "Migration '{$migrationName}' non trouvée dans la table migrations.\n";
    }
    
    // Supprimer également physiquement le fichier de migration
    $filePath = __DIR__ . '/database/migrations/' . $migrationName . '.php';
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Fichier de migration physique supprimé avec succès.\n";
        } else {
            echo "Impossible de supprimer le fichier de migration physique.\n";
        }
    } else {
        echo "Fichier de migration physique non trouvé.\n";
    }
    
    echo "\nRecommandation: Exécutez maintenant 'php artisan migrate' pour continuer les migrations sans ce fichier problématique.\n";
    
} catch (\Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
} 