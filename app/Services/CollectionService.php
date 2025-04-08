<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class CollectionService
{
    /**
     * Analyse les requêtes SQL générées lors de l'accès aux relations d'un modèle
     * afin d'identifier les problèmes N+1 potentiels.
     * 
     * @param \Illuminate\Database\Eloquent\Model $model Le modèle à analyser
     * @param array $relations Liste des relations à tester
     * @return array Rapport d'analyse des requêtes
     */
    public static function analyzeRelationQueries(Model $model, array $relations = []): array
    {
        DB::connection()->enableQueryLog();
        
        $report = [
            'model' => get_class($model),
            'id' => $model->getKey(),
            'relations' => [],
            'summary' => [
                'total_relations' => 0,
                'n_plus_one_detected' => 0,
                'total_queries' => 0,
            ]
        ];
        
        // Si aucune relation n'est spécifiée, essayons de détecter automatiquement
        if (empty($relations)) {
            $relations = self::detectModelRelations($model);
        }
        
        foreach ($relations as $relation) {
            // Réinitialiser le log de requêtes avant de tester cette relation
            DB::flushQueryLog();
            
            try {
                // Tenter d'accéder à la relation
                $relatedData = $model->$relation;
                $queries = DB::getQueryLog();
                
                $isNPlusOne = false;
                $queryCount = count($queries);
                
                // Analyser les requêtes pour détecter les patterns N+1
                if ($queryCount > 1) {
                    $isNPlusOne = true;
                } elseif ($queryCount === 1) {
                    // Vérifier si la requête contient un JOIN, ce qui suggère un eager loading
                    $isNPlusOne = !preg_match('/join/i', $queries[0]['query']);
                }
                
                $report['relations'][$relation] = [
                    'query_count' => $queryCount,
                    'is_n_plus_one' => $isNPlusOne,
                    'queries' => array_map(function($query) {
                        return [
                            'sql' => $query['query'],
                            'time' => $query['time'],
                        ];
                    }, $queries),
                    'suggestion' => $isNPlusOne ? "Utilisez ->with('{$relation}') pour l'eager loading" : null
                ];
                
                if ($isNPlusOne) {
                    $report['summary']['n_plus_one_detected']++;
                }
                
                $report['summary']['total_queries'] += $queryCount;
            } catch (\Exception $e) {
                $report['relations'][$relation] = [
                    'error' => $e->getMessage(),
                    'is_relation' => false
                ];
            }
        }
        
        $report['summary']['total_relations'] = count($relations);
        
        return $report;
    }
    
    /**
     * Tente de détecter automatiquement les relations disponibles sur un modèle
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return array Liste des noms de méthodes qui pourraient être des relations
     */
    private static function detectModelRelations(Model $model): array
    {
        $relations = [];
        $methods = get_class_methods($model);
        
        foreach ($methods as $method) {
            // Ignorer les méthodes commençant par _ ou get ou étant standards
            if (strpos($method, '_') === 0 || 
                strpos($method, 'get') === 0 || 
                in_array($method, ['__construct', 'toArray', 'attributesToArray', 'save', 'update', 'delete'])) {
                continue;
            }
            
            try {
                $reflection = new \ReflectionMethod($model, $method);
                
                // Si la méthode a une implémentation et aucun paramètre requis
                if (!$reflection->isAbstract() && $reflection->getNumberOfRequiredParameters() === 0) {
                    // Nous appelons la méthode et vérifions si elle retourne une relation
                    $returnValue = $reflection->invoke($model);
                    
                    if ($returnValue instanceof Relation) {
                        $relations[] = $method;
                    }
                }
            } catch (\Exception $e) {
                // Ignorer les erreurs de réflexion
                continue;
            }
        }
        
        return $relations;
    }
    
    /**
     * Crée un rapport de performance sur les requêtes générées pour une collection de modèles
     * 
     * @param \Illuminate\Support\Collection $collection Collection de modèles à analyser
     * @param array $withRelations Relations à charger pour comparaison
     * @return array Rapport de performance
     */
    public static function analyzeCollectionPerformance(Collection $collection, array $withRelations = []): array
    {
        if ($collection->isEmpty()) {
            return ['error' => 'Collection vide'];
        }
        
        $modelClass = get_class($collection->first());
        
        // Test 1: Accès sans eager loading
        DB::connection()->enableQueryLog();
        $collection->each(function($model) use ($withRelations) {
            foreach ($withRelations as $relation) {
                $model->$relation;
            }
        });
        $lazyQueries = DB::getQueryLog();
        DB::flushQueryLog();
        
        // Test 2: Avec eager loading
        $modelWithRelations = $modelClass::with($withRelations)->get();
        DB::connection()->enableQueryLog();
        $modelWithRelations->each(function($model) use ($withRelations) {
            foreach ($withRelations as $relation) {
                $model->$relation;
            }
        });
        $eagerQueries = DB::getQueryLog();
        
        return [
            'model' => $modelClass,
            'collection_size' => $collection->count(),
            'relations_tested' => $withRelations,
            'lazy_loading' => [
                'query_count' => count($lazyQueries),
                'total_time_ms' => array_sum(array_column($lazyQueries, 'time')),
                'queries' => $lazyQueries,
            ],
            'eager_loading' => [
                'query_count' => count($eagerQueries),
                'total_time_ms' => array_sum(array_column($eagerQueries, 'time')),
                'queries' => $eagerQueries,
            ],
            'conclusion' => [
                'queries_saved' => count($lazyQueries) - count($eagerQueries),
                'time_saved_ms' => array_sum(array_column($lazyQueries, 'time')) - array_sum(array_column($eagerQueries, 'time')),
                'recommendation' => count($lazyQueries) > count($eagerQueries) ? 
                    "Utilisez eager loading avec with(" . implode(', ', $withRelations) . ")" : 
                    "Le lazy loading est approprié dans ce cas"
            ]
        ];
    }
} 