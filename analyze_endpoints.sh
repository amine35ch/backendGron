#!/bin/bash

# Script d'analyse des endpoints API GRON
# Auteur: [Votre nom]
# Date: [Date de création]

echo "=== Script d'analyse des endpoints API GRON ==="
echo "Ce script va exécuter plusieurs séries de tests sur les endpoints API"

# Configuration de base
BASE_URL=${1:-"http://localhost:8000"}
TOKEN=${2:-""}
ITERATIONS=${3:-5}
OUTPUT_DIR="./storage/logs/benchmarks"

# Créer le répertoire de sortie s'il n'existe pas
mkdir -p $OUTPUT_DIR

echo "Configuration:"
echo "- URL de base: $BASE_URL"
echo "- Nombre d'itérations: $ITERATIONS"
echo "- Répertoire de sortie: $OUTPUT_DIR"

# Vérifier si le token a été fourni
if [ -z "$TOKEN" ]; then
    echo "⚠️ Aucun token d'authentification fourni. Certains endpoints peuvent échouer."
    echo "Pour inclure un token, exécutez: ./analyze_endpoints.sh $BASE_URL [TOKEN] $ITERATIONS"
else
    echo "- Token d'authentification: fourni ✅"
fi

echo ""
echo "=== TEST 1: Endpoints GET uniquement ==="
php artisan gron:benchmark-endpoints --url=$BASE_URL --token=$TOKEN --methods=GET --iterations=$ITERATIONS --output=json --timeout=60
mv ./storage/logs/api_benchmark_* $OUTPUT_DIR/get_endpoints.json
echo "✅ Test des endpoints GET terminé"

echo ""
echo "=== TEST 2: Endpoints critiques spécifiques ==="
# Liste des endpoints critiques à tester plus intensivement
# Ajoutez ici les endpoints les plus utilisés de votre application
CRITICAL_ENDPOINTS=(
    "api/login"
    "web/projects"
    "web/clients"
    "web/companies/all"
    "web/logged-user"
)

php artisan gron:benchmark-endpoints --url=$BASE_URL --token=$TOKEN --routes=${CRITICAL_ENDPOINTS[@]} --iterations=$((ITERATIONS*2)) --output=json --timeout=120
mv ./storage/logs/api_benchmark_* $OUTPUT_DIR/critical_endpoints.json
echo "✅ Test des endpoints critiques terminé"

echo ""
echo "=== TEST 3: Tous les endpoints (toutes méthodes) ==="
php artisan gron:benchmark-endpoints --url=$BASE_URL --token=$TOKEN --methods=GET,POST,PUT,DELETE --iterations=2 --output=json --timeout=30
mv ./storage/logs/api_benchmark_* $OUTPUT_DIR/all_endpoints.json
echo "✅ Test complet terminé"

echo ""
echo "=== Génération du rapport de synthèse ==="
echo "Les résultats des tests ont été enregistrés dans le répertoire $OUTPUT_DIR"
echo "Pour générer un rapport de synthèse, exécutez:"
echo "php artisan gron:generate-benchmark-report --input=$OUTPUT_DIR --output=html"

echo ""
echo "=== Analyse terminée ===" 