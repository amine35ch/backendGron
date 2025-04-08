<?php

// Ce script analyse les fichiers de migration pour trouver celles qui 
// utilisent dropColumn sans vérifier si la colonne existe

require __DIR__ . '/vendor/autoload.php';

$migrationsPath = __DIR__ . '/database/migrations';
$riskyMigrations = [];

// Parcourir tous les fichiers de migration
$files = glob($migrationsPath . '/*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    $fileName = basename($file);
    
    // Vérifier si le fichier contient dropColumn sans Schema::hasColumn
    if (strpos($content, '->dropColumn') !== false) {
        // Vérifier s'il n'y a pas de vérification Schema::hasColumn
        if (strpos($content, 'Schema::hasColumn') === false && 
            strpos($content, 'hasColumn') === false) {
            
            // Extraire les noms des colonnes à supprimer
            preg_match_all('/->dropColumn\([\'"]([^\'"]+)[\'"]\)/', $content, $matches);
            $columns = $matches[1] ?? [];
            
            $riskyMigrations[] = [
                'file' => $fileName,
                'columns' => $columns
            ];
        }
    }
}

// Afficher les résultats
echo "=== Migrations à risque qui suppriment des colonnes sans vérification ===\n\n";

if (empty($riskyMigrations)) {
    echo "Aucune migration à risque trouvée.\n";
} else {
    echo "Migrations à risque trouvées: " . count($riskyMigrations) . "\n\n";
    
    foreach ($riskyMigrations as $migration) {
        echo "Fichier: " . $migration['file'] . "\n";
        echo "Colonnes: " . implode(', ', $migration['columns']) . "\n";
        echo "-----------------------------------------------------------\n";
    }
    
    echo "\nRecommandation: Modifiez ces migrations pour ajouter une vérification avec Schema::hasColumn avant de supprimer la colonne.\n";
}

echo "\nExemple de correction:\n";
echo "```php\n";
echo "if (Schema::hasColumn('table_name', 'column_name')) {\n";
echo "    \$table->dropColumn('column_name');\n";
echo "}\n";
echo "```\n"; 