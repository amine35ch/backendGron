<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\ProgressBar;

class EndpointBenchmarkCommand extends Command
{
    protected $signature = "gron:benchmark-endpoints 
                            {--url=http://localhost:8000 : URL de base de l'API}
                            {--token= : Token d'authentification JWT}
                            {--routes=* : Routes spécifiques à tester}
                            {--methods=GET,POST,PUT,DELETE : Méthodes HTTP à tester}
                            {--iterations=3 : Nombre d'itérations par endpoint}
                            {--output=console : Format de sortie (console, json, csv)}
                            {--timeout=30 : Timeout en secondes pour chaque requête}";

    protected $description = 'Exécute un benchmark des performances sur les endpoints API';

    protected $results = [];
    protected $httpClient;

    public function handle()
    {
        $this->info('Démarrage du benchmark des endpoints API');
        
        $baseUrl = $this->option('url');
        $token = $this->option('token');
        $iterations = (int) $this->option('iterations');
        $timeout = (int) $this->option('timeout');
        $methods = explode(',', $this->option('methods'));
        
        // Routes à tester
        $routesToTest = $this->getRoutesToTest();
        
        if (empty($routesToTest)) {
            $this->error('Aucune route à tester n\'a été trouvée');
            return 1;
        }
        
        $this->info(sprintf('Benchmark de %d endpoints avec %d itérations chacun', count($routesToTest), $iterations));
        
        // Préparer le client HTTP
        $this->httpClient = Http::timeout($timeout);
        if ($token) {
            $this->httpClient = $this->httpClient->withToken($token);
        }
        
        // Exécuter les tests
        $progressBar = $this->output->createProgressBar(count($routesToTest));
        $progressBar->start();
        
        foreach ($routesToTest as $route) {
            $uri = $route['uri'];
            $method = $route['method'];
            $name = $route['name'] ?? $uri;
            
            if (!in_array($method, $methods)) {
                $progressBar->advance();
                continue;
            }
            
            // Initialiser le résultat pour cette route
            $this->results[$uri] = [
                'uri' => $uri,
                'method' => $method,
                'name' => $name,
                'times' => [],
                'status_codes' => [],
                'errors' => [],
            ];
            
            // Exécuter les itérations
            for ($i = 0; $i < $iterations; $i++) {
                $this->benchmarkEndpoint($baseUrl, $uri, $method);
            }
            
            // Calculer les statistiques
            $times = $this->results[$uri]['times'];
            if (!empty($times)) {
                $this->results[$uri]['avg_time'] = array_sum($times) / count($times);
                $this->results[$uri]['min_time'] = min($times);
                $this->results[$uri]['max_time'] = max($times);
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        // Afficher les résultats
        $this->displayResults();
        
        // Sauvegarder les résultats
        $this->saveResults();
        
        return 0;
    }
    
    private function getRoutesToTest()
    {
        $routesToTest = [];
        $specifiedRoutes = $this->option('routes');
        
        $allRoutes = Route::getRoutes();
        
        foreach ($allRoutes as $route) {
            $uri = $route->uri();
            $methods = $route->methods();
            $name = $route->getName();
            
            // Ignorer les routes de debug, docs, etc.
            if (Str::startsWith($uri, ['_debugbar', 'api/documentation', 'docs', 'telescope'])) {
                continue;
            }
            
            // Si des routes spécifiques sont fournies, filtrer
            if (!empty($specifiedRoutes) && !in_array($uri, $specifiedRoutes) && !in_array($name, $specifiedRoutes)) {
                continue;
            }
            
            foreach ($methods as $method) {
                if ($method === 'HEAD') {
                    continue;
                }
                
                $routesToTest[] = [
                    'uri' => $uri,
                    'method' => $method,
                    'name' => $name,
                ];
            }
        }
        
        return $routesToTest;
    }
    
    private function benchmarkEndpoint($baseUrl, $uri, $method)
    {
        $url = $baseUrl . '/' . $uri;
        
        // Remplacer les paramètres dans l'URL par des valeurs de test
        $url = preg_replace('/{([^}]+)}/', '1', $url);
        
        try {
            $start = microtime(true);
            
            $response = match(strtoupper($method)) {
                'GET' => $this->httpClient->get($url),
                'POST' => $this->httpClient->post($url, ['test' => true]),
                'PUT' => $this->httpClient->put($url, ['test' => true]),
                'DELETE' => $this->httpClient->delete($url),
                default => null
            };
            
            $time = (microtime(true) - $start) * 1000; // en millisecondes
            
            if ($response) {
                $this->results[$uri]['times'][] = $time;
                $this->results[$uri]['status_codes'][] = $response->status();
                
                if ($response->failed()) {
                    $this->results[$uri]['errors'][] = $response->status() . ' ' . $response->body();
                }
            }
        } catch (\Exception $e) {
            $this->results[$uri]['errors'][] = $e->getMessage();
        }
    }
    
    private function displayResults()
    {
        // Trier par temps moyen
        $sorted = collect($this->results)->sortByDesc(function ($result) {
            return $result['avg_time'] ?? 0;
        });
        
        $rows = [];
        foreach ($sorted as $result) {
            $rows[] = [
                $result['method'],
                $result['uri'],
                isset($result['avg_time']) ? number_format($result['avg_time'], 2) . ' ms' : 'N/A',
                isset($result['min_time']) ? number_format($result['min_time'], 2) . ' ms' : 'N/A',
                isset($result['max_time']) ? number_format($result['max_time'], 2) . ' ms' : 'N/A',
                empty($result['errors']) ? '✅' : '❌ ' . count($result['errors']),
                implode(', ', array_unique($result['status_codes'] ?? [])),
            ];
        }
        
        $this->info('Résultats du benchmark (triés par temps moyen décroissant):');
        $this->table(
            ['Méthode', 'URI', 'Temps moyen', 'Temps min', 'Temps max', 'Statut', 'Codes HTTP'],
            $rows
        );
        
        // Afficher les erreurs
        $hasErrors = false;
        foreach ($this->results as $uri => $result) {
            if (!empty($result['errors'])) {
                if (!$hasErrors) {
                    $this->error('Erreurs rencontrées:');
                    $hasErrors = true;
                }
                
                $this->warn("{$result['method']} {$uri}:");
                foreach (array_unique($result['errors']) as $error) {
                    $this->line(' - ' . $error);
                }
            }
        }
    }
    
    private function saveResults()
    {
        $output = $this->option('output');
        
        if ($output === 'console') {
            return;
        }
        
        $filename = 'api_benchmark_' . now()->format('Y-m-d_H-i-s');
        $path = storage_path("logs/{$filename}");
        
        if ($output === 'json') {
            file_put_contents("{$path}.json", json_encode($this->results, JSON_PRETTY_PRINT));
            $this->info("Résultats sauvegardés dans {$path}.json");
        } elseif ($output === 'csv') {
            $csv = fopen("{$path}.csv", 'w');
            
            // Entête
            fputcsv($csv, ['Méthode', 'URI', 'Temps moyen (ms)', 'Temps min (ms)', 'Temps max (ms)', 'Erreurs', 'Codes HTTP']);
            
            // Lignes
            foreach ($this->results as $result) {
                fputcsv($csv, [
                    $result['method'],
                    $result['uri'],
                    $result['avg_time'] ?? 'N/A',
                    $result['min_time'] ?? 'N/A',
                    $result['max_time'] ?? 'N/A',
                    count($result['errors']),
                    implode(', ', array_unique($result['status_codes'] ?? [])),
                ]);
            }
            
            fclose($csv);
            $this->info("Résultats sauvegardés dans {$path}.csv");
        }
    }
} 