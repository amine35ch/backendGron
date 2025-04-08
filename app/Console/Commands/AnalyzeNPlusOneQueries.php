<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\CollectionService;
use Illuminate\Support\Str;

class AnalyzeNPlusOneQueries extends Command
{
    protected $signature = 'gron:analyze-n-plus-one {model : Nom complet de la classe du modèle à analyser} {--id= : ID spécifique du modèle à tester} {--relations= : Liste des relations à tester, séparées par des virgules}';

    protected $description = 'Analyse les problèmes N+1 dans les requêtes pour un modèle donné';

    public function handle()
    {
        $modelClass = $this->argument('model');
        
        if (!class_exists($modelClass)) {
            $this->error("La classe de modèle '{$modelClass}' n'existe pas.");
            return 1;
        }
        
        // Obtenir l'instance du modèle
        $model = null;
        
        if ($this->option('id')) {
            $model = $modelClass::find($this->option('id'));
            if (!$model) {
                $this->error("Aucun modèle trouvé avec l'ID {$this->option('id')}");
                return 1;
            }
        } else {
            // Prendre le premier enregistrement disponible
            $model = $modelClass::first();
            if (!$model) {
                $this->error("Aucun enregistrement trouvé pour le modèle {$modelClass}");
                return 1;
            }
        }
        
        $this->info("Analyse des requêtes N+1 pour {$modelClass} (ID: {$model->getKey()})");
        
        // Déterminer les relations à tester
        $relations = [];
        if ($this->option('relations')) {
            $relations = explode(',', $this->option('relations'));
            $relations = array_map('trim', $relations);
        }
        
        // Analyser les requêtes
        $report = CollectionService::analyzeRelationQueries($model, $relations);
        
        // Afficher les résultats
        $this->displayResults($report);
        
        // Sauvegarder le rapport
        $this->saveReport($report);
        
        return 0;
    }
    
    private function displayResults(array $report)
    {
        $this->info("Résumé de l'analyse :");
        $this->table(
            ['Modèle', 'ID', 'Relations testées', 'Problèmes N+1 détectés', 'Requêtes totales'],
            [[
                $report['model'],
                $report['id'],
                $report['summary']['total_relations'],
                $report['summary']['n_plus_one_detected'],
                $report['summary']['total_queries']
            ]]
        );
        
        if ($report['summary']['n_plus_one_detected'] > 0) {
            $this->warn("⚠️ Des problèmes N+1 ont été détectés !");
            
            $rows = [];
            foreach ($report['relations'] as $relation => $data) {
                if (isset($data['is_n_plus_one']) && $data['is_n_plus_one']) {
                    $rows[] = [
                        $relation,
                        $data['query_count'],
                        $data['suggestion'] ?? 'Optimisation requise'
                    ];
                }
            }
            
            $this->table(
                ['Relation', 'Nombre de requêtes', 'Suggestion'],
                $rows
            );
        } else {
            $this->info("✅ Aucun problème N+1 détecté dans les relations testées.");
        }
    }
    
    private function saveReport(array $report)
    {
        $modelName = class_basename($report['model']);
        $timestamp = now()->format('Y-m-d_H-i-s');
        $filename = "n_plus_one_{$modelName}_{$timestamp}.json";
        $path = storage_path("logs/{$filename}");
        
        file_put_contents($path, json_encode($report, JSON_PRETTY_PRINT));
        
        $this->info("Rapport complet sauvegardé dans {$path}");
        
        if ($report['summary']['n_plus_one_detected'] > 0) {
            Log::channel('daily')->warning("Des problèmes N+1 ont été détectés pour {$report['model']}", [
                'model' => $report['model'],
                'detected' => $report['summary']['n_plus_one_detected'],
                'report_path' => $path
            ]);
        }
    }
} 