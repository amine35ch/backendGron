<?php
require_once __DIR__ . '/vendor/autoload.php';

// Générer la documentation Swagger
$cmd = 'php artisan l5-swagger:generate';
echo "Exécution de la commande: $cmd\n";
exec($cmd, $output, $return_var);

// Afficher la sortie de la commande
foreach ($output as $line) {
    echo $line . "\n";
}

// Vérifier si le fichier a été généré
$jsonFile = __DIR__ . '/storage/api-docs/api-docs.json';
$outputFile = __DIR__ . '/storage/api-docs/GRON_API_Collection.json';

if (file_exists($jsonFile)) {
    echo "Le fichier JSON a été généré avec succès à $jsonFile\n";
    
    // Copier le fichier vers le nom attendu
    if (copy($jsonFile, $outputFile)) {
        echo "Le fichier a été copié vers $outputFile\n";
    } else {
        echo "Erreur lors de la copie du fichier\n";
    }

    // Copier le fichier vers le dossier public
    $publicFile = __DIR__ . '/public/GRON_API_Collection.json';
    if (copy($outputFile, $publicFile)) {
        echo "Le fichier a été copié vers $publicFile\n";
    } else {
        echo "Erreur lors de la copie du fichier vers public\n";
    }
} else {
    echo "Erreur: Le fichier JSON n'a pas été généré\n";
}

echo "\nTerminé !\nVous pouvez accéder à l'interface Swagger via /api/docs\n"; 