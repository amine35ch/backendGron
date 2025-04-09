import newman from 'newman';
import path from 'path';
import { fileURLToPath } from 'url';
import fs from 'fs';

// Get current file directory (ES modules equivalent of __dirname)
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Configuration de l'environnement de test
const environment = process.env.TEST_ENV || 'local';
const collectionFile = path.join(__dirname, 'gron_postman_collection.json');
const environmentFile = path.join(__dirname, `gron_postman_${environment.toLowerCase()}.json`);

// Load JSON files
const collection = JSON.parse(fs.readFileSync(collectionFile, 'utf-8'));
const environmentJson = JSON.parse(fs.readFileSync(environmentFile, 'utf-8'));

// Ensure reports directory exists
const reportsDir = path.join(__dirname, '..', 'tests', 'reports');
if (!fs.existsSync(reportsDir)) {
    fs.mkdirSync(reportsDir, { recursive: true });
}

// Options pour Newman
const newmanOptions = {
    collection: collection,
    environment: environmentJson,
    reporters: ['cli'],
    iterationCount: 1,
    bail: false,
    timeoutRequest: 5000,
    delayRequest: 100,
    ignoreRedirects: false,
    insecure: true
};

// Add htmlextra reporter if available
try {
    const htmlextra = await import('newman-reporter-htmlextra');
    newmanOptions.reporters.push('htmlextra');
    newmanOptions.reporter = {
        htmlextra: {
            export: path.join(reportsDir, `postman-report-${environment}-${new Date().toISOString().split('T')[0]}.html`),
            template: 'default-template.hbs',
            showOnlyFails: false,
            noSyntaxHighlighting: false,
            testPaging: true,
            browserTitle: "Rapport de Tests API GRON",
            title: `Rapport de Tests API GRON - ${environment.toUpperCase()}`,
            titleSize: 1
        }
    };
    console.log('HTML reporter loaded successfully');
} catch (error) {
    console.warn('HTML reporter could not be loaded, using CLI reporter only:', error.message);
}

// Exécution des tests
console.log(`Démarrage des tests Postman pour l'environnement ${environment.toUpperCase()}...`);

newman.run(newmanOptions)
    .on('start', function (err, args) {
        console.log('Collection run starting...');
    })
    .on('done', function (err, summary) {
        if (err || summary.error || summary.run.failures.length) {
            console.error('Collection run encountered errors.');
            process.exit(1);
        } else {
            console.log('Collection run completed successfully!');
            process.exit(0);
        }
    }); 