# Plan d'exécution - Phase 1: Analyse et Documentation

## Semaine 1: Inventaire et cartographie du système
- **Jour 1-2**: Inventaire complet des endpoints API ✅
  - Utiliser les routes Laravel (`php artisan route:list`) ✅
  - Catégoriser par module fonctionnel selon la structure du rapport ✅
  - Identifier les méthodes HTTP supportées ✅

- **Jour 3-4**: Documentation technique initiale ✅
  - Préparer un template de documentation standard pour chaque endpoint ✅
  - Commencer l'analyse des contrôleurs et des modèles ✅
  - Cartographier les relations entre entités de la base de données ✅

- **Jour 5**: Mise en place des outils de documentation 🔄
  - Création d'une collection Postman structurée selon les catégories du rapport 🔄
  - Configuration d'un environnement de test dédié 🔄

## Semaine 2: Documentation approfondie par module
- **Jour 1**: Documentation des endpoints d'Authentification et Gestion des Permissions ✅
  - Documenter les paramètres d'entrée/sortie des endpoints de connexion, déconnexion et récupération de mot de passe ✅
  - Vérifier la compatibilité avec le système d'authentification frontend (JWT, interceptors Axios) ✅
  - Analyser le flux d'authentification et les permissions (CASL) ✅

- **Jour 2**: Documentation des endpoints de Gestion des Entités ✅
  - Clients/Bénéficiaires ✅ 
  - Entreprises (retenues, sous-traitants, mandataires) ✅
  - Projets et étapes du workflow (ANAH) ✅

- **Jour 3**: Documentation des endpoints de Gestion du Catalogue et Visites ✅
  - Articles et catalogue de produits ✅
  - Marques ✅
  - Travaux/Prestations et "gestes" standards ✅
  - Visites et Événements ✅

- **Jour 4-5**: Analyse des performances initiale ✅
  - Configuration des outils de profilage (Laravel Debugbar, Telescope) ✅
  - Identification des requêtes SQL lentes ✅
  - Test de charge basique sur les endpoints critiques utilisés par les tableaux de bord frontend ✅

## Semaine 3: Finalisation par module et rapports
- **Jour 1**: Audit de performances des modules critiques 🔄
  - Authentification et Permissions (compatible avec React Query et hooks d'authentification) 🔄
  - Gestion des Documents (upload, prévisualisation, catégorisation) 🔄
  - Tableaux de Bord et Statistiques pour les visualisations analytiques 🔄

- **Jour 2**: Audit de performances des modules secondaires 🔄
  - Gestion des Entités avec tous les types d'acteurs identifiés dans le frontend 🔄
  - Gestion du Catalogue incluant les produits et services spécifiques 🔄
  - Visites et Événements intégrés au calendrier 🔄
  - Paramètres et Configuration de l'entreprise 🔄

- **Jour 3**: Identification des améliorations par catégorie ⏱️
  1. Endpoints d'Authentification (vérifier compatibilité JWT, sessions Axios) ⏱️
  2. Gestion des Entités (tous les acteurs du projet identifiés dans le frontend) ⏱️
  3. Gestion du Catalogue (produits, marques, prestations, "gestes") ⏱️
  4. Gestion des Visites et Événements (intégration avec planificateur frontend) ⏱️
  5. Gestion des Documents (upload avec restrictions, catégorisation) ⏱️
  6. Paramètres et Configuration (prise en compte des 3 langues supportées) ⏱️
  7. Tableaux de Bord et Statistiques (données pour les visualisations) ⏱️
  8. Souscription et Facturation (paramètres de facturation) ⏱️
  9. Notifications (système temps réel intégré au frontend) ⏱️
  10. Structure d'Authentification et Permissions (compatible CASL) ⏱️

- **Jour 4**: Documentation des processus métier clés ⏱️
  - Flux d'authentification complet avec système de rôles et permissions ⏱️
  - Cycle de vie d'un projet avec les statuts identifiés (Nouveau, En cours, Dépôts ANAH, etc.) ⏱️
  - Gestion documentaire avec système d'upload et prévisualisation ⏱️
  - Processus de facturation intégré aux paramètres ⏱️

- **Jour 5**: Finalisation des livrables ⏱️
  - Compilation de la documentation technique complète organisée selon les 10 catégories du rapport ⏱️
  - Génération des rapports d'audit de performances par catégorie ⏱️
  - Présentation du plan d'optimisation pour la Phase 2 en cohérence avec les besoins frontend ⏱️

## Livrables attendus
1. Documentation API complète structurée selon les 10 catégories du rapport:
   - Endpoints d'Authentification (compatible avec le système JWT du frontend) ✅
   - Gestion des Entités (tous les types d'acteurs du projet) ✅
   - Gestion du Catalogue (produits, prestations, marques, "gestes") ✅
   - Gestion des Visites et Événements (compatible avec le calendrier) ✅
   - Gestion des Documents (upload, prévisualisation, catégories) ✅
   - Paramètres et Configuration (support multilingue FR, EN, AR) ✅
   - Tableaux de Bord et Statistiques (données pour les visualisations) ✅
   - Souscription et Facturation (paramètres financiers) ✅
   - Notifications (système intégré au frontend) ✅
   - Structure d'Authentification et Permissions (compatible CASL) ✅

2. Collection Postman avec exemples pour tous les endpoints organisée selon la même structure ✅

3. Rapport d'audit de performances avec métriques pour chaque catégorie 🔄

4. Liste des endpoints obsolètes/redondants par catégorie ⏱️

5. Schéma de la base de données actualisé avec relations entre entités ✅

6. Plan d'optimisation priorisé pour la Phase 2 ⏱️

## Légende
- ✅ : Tâche complétée
- 🔄 : Tâche en cours
- ⏱️ : Tâche à retraiter et réviser

## Notes de contexte - Point d'arrêt actuel

### Statut général (08/04/2025)
Nous en sommes actuellement à la fin de la Semaine 2 / début de la Semaine 3 dans notre plan d'exécution. La documentation API des 10 catégories identifiées dans le rapport est bien avancée. L'analyse du frontend a permis d'identifier précisément les points d'intégration à prendre en compte.

Suite à la revue des rapports d'analyse frontend et des endpoints API, nous devons retraiter et réviser notre approche pour les tâches restantes de la Semaine 3.

### Dernières actions réalisées
- Mise en place du fichier `.cursorrules` avec des règles adaptées au projet
- Création des commandes d'analyse pour identifier les problèmes N+1 et les requêtes lentes
- Création d'une collection Postman initiale suivant la structure du rapport (à compléter)
- Finalisation du rapport détaillé des endpoints API avec les 10 catégories fonctionnelles
- Analyse du frontend pour comprendre l'utilisation des endpoints côté client

### Document de référence clé
Le fichier `rapport_endpoints_api.md` constitue le document de référence principal à suivre pour:
1. Organiser la collection Postman avec la hiérarchie définie
2. Assurer la cohérence entre la documentation, les tests API et l'implémentation

Ce document doit être considéré comme la source de vérité pour toutes les tâches de documentation et tests API.

### Prochaines étapes prioritaires (à retraiter)
1. Terminer la collection Postman en suivant exactement la structure du rapport `rapport_endpoints_api.md`
2. Compléter l'audit de performances pour chaque catégorie d'endpoints, en tenant compte des patterns d'utilisation du frontend
3. Retraiter l'identification des endpoints obsolètes/redondants dans chaque catégorie
4. Réviser la documentation des processus métier clés selon les flux identifiés dans les rapports frontend et API

### Révision du plan pour la Semaine 3
Nous allons revoir notre approche pour toutes les tâches restantes, en tenant compte des nouvelles informations issues de l'analyse du frontend et du rapport d'endpoints. Cette révision impliquera:

1. Une réunion de synchronisation pour aligner l'équipe sur les nouveaux objectifs
2. Une redéfinition des priorités pour les modules à auditer
3. Une mise à jour du calendrier de la Semaine 3
4. Une révision des critères de qualité pour les livrables finaux

### Fichiers principaux à travailler
- Collection Postman - Structurer selon les 10 catégories exactes du rapport `rapport_endpoints_api.md`

### Catégories prioritaires (basées sur les rapports)
1. Endpoints d'Authentification (sécurité critique, système JWT et CASL)
2. Gestion des Entités (cœur du métier, multiples acteurs)
3. Gestion des Documents (transfert de fichiers, prévisualisation)
4. Tableaux de Bord et Statistiques (performance critique pour visualisations)
5. Gestion du workflow des Projets (statuts ANAH et cycle de vie)

### Points d'intégration frontend-backend critiques
1. Système d'authentification avec JWT, interceptors Axios et React Query
2. Gestion multi-langue (FR, EN, AR) pour les messages d'erreur et validation
3. Upload et gestion de documents avec prévisualisation
4. Données pour les tableaux de bord analytiques
5. Workflow des projets avec statuts ANAH

### Branches Git
Branche actuelle: `staging`
Suivre les conventions établies dans `.cursorrules` pour les nouveaux commits.
