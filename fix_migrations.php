<?php

// Ce script supprime la migration problématique de la table migrations
// et exécute la nouvelle migration corrective

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

try {
    echo "Correction de la base de données en cours...\n";
    
    // 1. Vérifier si la migration problématique existe dans la table migrations
    $migrationExists = DB::table('migrations')
        ->where('migration', '2024_08_29_123736_add_column_to_d_companies_table')
        ->exists();
    
    if ($migrationExists) {
        echo "Migration problématique trouvée dans la table migrations.\n";
        
        // 2. Supprimer la migration problématique de la table migrations
        DB::table('migrations')
            ->where('migration', '2024_08_29_123736_add_column_to_d_companies_table')
            ->delete();
        
        echo "Migration problématique supprimée de la table migrations.\n";
    } else {
        echo "Migration problématique non trouvée dans la table migrations.\n";
    }
    
    // 3. Créer un fichier de migration temporaire pour supprimer la colonne si elle existe
    echo "Exécution de la migration corrective...\n";
    
    // Exécuter artisan migrate pour lancer la nouvelle migration
    $exitCode = Artisan::call('migrate', [
        '--path' => 'database/migrations/2024_08_29_123736_fix_companies_table.php'
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