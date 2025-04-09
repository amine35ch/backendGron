import { exec } from 'child_process';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Get current file directory (ES modules equivalent of __dirname)
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Configuration paths
const scriptsDir = __dirname;
const rootDir = path.join(__dirname, '..');
const testsDir = path.join(rootDir, 'tests');
const reportsDir = path.join(testsDir, 'reports');

// Ensure directories exist
if (!fs.existsSync(testsDir)) {
    fs.mkdirSync(testsDir, { recursive: true });
}

if (!fs.existsSync(reportsDir)) {
    fs.mkdirSync(reportsDir, { recursive: true });
}

// Generate Postman collection
console.log('Génération de la collection Postman...');
exec('node scripts/generate_postman_collection.js', (error, stdout, stderr) => {
    if (error) {
        console.error(`Erreur lors de la génération: ${error.message}`);
        return;
    }
    if (stderr) {
        console.error(`Stderr: ${stderr}`);
        return;
    }
    
    console.log('Collection Postman générée avec succès !');
    console.log('\nLes fichiers suivants ont été créés:');
    
    // Liste des fichiers générés
    const collectionPath = path.join(scriptsDir, 'gron_postman_collection.json');
    if (fs.existsSync(collectionPath)) {
        console.log(`- Collection: ${collectionPath}`);
    }
    
    // Liste des environnements
    const environments = ['local', 'staging', 'production'];
    environments.forEach(env => {
        const envFilePath = path.join(scriptsDir, `gron_postman_gron api - ${env}.json`);
        if (fs.existsSync(envFilePath)) {
            console.log(`- Environnement ${env}: ${envFilePath}`);
        }
    });
    
    console.log('\nUtilisation:');
    console.log('1. Importez la collection dans Postman');
    console.log('2. Importez les fichiers d\'environnement dans Postman');
    console.log('3. Configurez les variables d\'environnement (email, mot de passe, etc.)');
    console.log('4. Exécutez les requêtes dans l\'ordre approprié');
}); 