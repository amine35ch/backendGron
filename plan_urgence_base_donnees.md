# Plan d'Urgence - Résolution des Problèmes de Champs Manquants en Base de Données

## Phase 1: Diagnostic précis (1-2 heures)
- **Identification des erreurs**
  - Examiner les logs d'erreur Laravel (storage/logs/laravel.log)
  - Relever toutes les erreurs SQL liées aux champs manquants
  - Noter les noms exacts des tables et champs concernés

- **Vérification du schéma actuel**
  - Exécuter `DESCRIBE [nom_table]` pour chaque table problématique
  - Comparer avec le schéma attendu dans les migrations Laravel
  - Lister les champs manquants par table

- **Analyse des migrations**
  - Vérifier les migrations récentes dans database/migrations/
  - Identifier les migrations qui auraient dû créer ces champs
  - Vérifier l'état des migrations (`php artisan migrate:status`)

## Phase 2: Solution temporaire (2-4 heures)
- **Correction immédiate du schéma**
  - Créer une migration d'urgence pour ajouter les champs manquants:
    ```bash
    php artisan make:migration add_missing_fields_emergency --table=nom_table
    ```
  - Dans la méthode up(), ajouter les champs manquants avec leurs types appropriés
  - Exécuter la migration: `php artisan migrate`

- **Vérification de la résolution**
  - Tester les endpoints qui échouaient précédemment
  - Vérifier que les accès en lecture/écriture fonctionnent
  - S'assurer que les nouvelles données sont correctement stockées

- **Correctif temporaire dans le code**
  - Si nécessaire, modifier les modèles Eloquent pour gérer temporairement les données
  - Ajouter des valeurs par défaut pour les champs problématiques
  - Mettre à jour les casts et mutators si nécessaire

## Phase 3: Investigation approfondie (4-8 heures)
- **Analyse des causes racines**
  - Déterminer pourquoi les migrations n'ont pas été correctement appliquées
  - Vérifier l'historique des déploiements récents
  - Analyser les conflits potentiels entre branches de développement

- **Vérification complète du schéma**
  - Générer un schéma complet de la base pour vérifier d'autres anomalies:
    ```bash
    php artisan schema:dump
    ```
  - Comparer avec le schéma attendu selon les migrations
  - Identifier d'autres incohérences potentielles

- **Revue du code de manipulation des données**
  - Vérifier les modèles qui interagissent avec les tables concernées
  - Revoir les contrôleurs qui gèrent ces données
  - S'assurer que le code utilise correctement les champs

## Phase 4: Solution définitive (4-6 heures)
- **Correction permanente des migrations**
  - Créer des migrations propres pour les modifications nécessaires
  - S'assurer qu'elles sont idempotentes (peuvent être exécutées plusieurs fois sans erreur)
  - Documenter clairement les changements apportés

- **Mise à jour des modèles et relations**
  - Modifier les modèles Eloquent pour utiliser correctement les nouveaux champs
  - Mettre à jour les relations entre modèles si nécessaire
  - Adapter les factories et seeders pour inclure les nouveaux champs

- **Tests de validation**
  - Tester toutes les fonctionnalités impactées par les modifications
  - Vérifier les scénarios de création, lecture, mise à jour et suppression
  - S'assurer que les fonctionnalités métier critiques fonctionnent correctement

## Phase 5: Prévention et documentation (2-3 heures)
- **Documentation des changements**
  - Documenter en détail les problèmes rencontrés et les solutions appliquées
  - Mettre à jour la documentation technique du schéma de base de données
  - Créer une procédure de vérification d'intégrité de schéma

- **Mise en place de protections**
  - Créer des tests automatisés pour vérifier l'intégrité du schéma
  - Configurer des alertes en cas d'échecs de migrations
  - Ajouter des vérifications dans le processus de déploiement

## Commandes utiles pour le diagnostic
```bash
# Vérifier l'état des migrations
php artisan migrate:status

# Voir les tables dans la base de données
mysql -u [user] -p -e "SHOW TABLES FROM [database]"

# Examiner la structure d'une table
mysql -u [user] -p -e "DESCRIBE [table]" [database]

# Créer une migration d'urgence
php artisan make:migration add_missing_fields_emergency

# Forcer la reconstruction du cache des migrations
php artisan migrate:fresh --seed  # ATTENTION: Cette commande efface et recrée toutes les tables
```

## Script SQL de secours pour ajout manuel de champs
```sql
-- Exemple à adapter selon les champs manquants identifiés
ALTER TABLE nom_table ADD COLUMN nom_champ1 VARCHAR(255) NULL AFTER champ_existant;
ALTER TABLE nom_table ADD COLUMN nom_champ2 INTEGER DEFAULT 0 AFTER nom_champ1;
ALTER TABLE nom_table ADD COLUMN nom_champ3 DATETIME NULL AFTER nom_champ2;

-- Vérifier les modifications
DESCRIBE nom_table;
```

## Recommandations pour le futur
1. Mettre en place des tests de schéma automatisés dans le CI/CD
2. Exécuter `php artisan migrate:status` après chaque déploiement
3. Implémenter des vérifications d'intégrité de base de données régulières
4. Documenter tous les changements de schéma avant et après implémentation 