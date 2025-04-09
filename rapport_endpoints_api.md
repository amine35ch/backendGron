# Rapport d'Analyse des Endpoints API - Projet GRON

## Introduction

Ce document présente l'analyse des endpoints API utilisés pour la communication entre le frontend (frontGron) et le backend (backendGron) du projet GRON. L'objectif est d'identifier les principaux points d'intégration entre les deux composants du système.

## 1. Endpoints d'Authentification

| Endpoint | Méthode | Description | Utilisation Frontend |
|----------|---------|-------------|----------------------|
| `/web/login` | POST | Authentification d'un utilisateur | Utilisé dans `AuthContext.js` pour la connexion |
| `/web/logout` | PUT | Déconnexion de l'utilisateur | Utilisé dans `AuthContext.js` pour la déconnexion |
| `/logged-user` | GET | Récupération des informations de l'utilisateur connecté | Utilisé à l'initialisation de l'application pour vérifier la session |
| `/verify-reset-key` | POST | Vérification du code de réinitialisation du mot de passe | Utilisé dans le processus de récupération de mot de passe |
| `/reset-password` | POST | Réinitialisation du mot de passe | Finalisation du processus de récupération de mot de passe |
| `/send-reset-link-email-by-user` | POST | Envoi d'un lien de réinitialisation par email | Déclenchement du processus de récupération de mot de passe |

## 2. Gestion des Entités

### 2.1 Clients/Bénéficiaires

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/clients` | GET | Liste des clients |
| `/web/clients` | POST | Création d'un client |
| `/web/clients/{client}` | GET | Détails d'un client |
| `/web/clients/{client}` | PUT | Mise à jour d'un client |
| `/web/clients/{client}` | DELETE | Suppression d'un client |
| `/web/clients/{client}/documents` | POST | Attachement de documents à un client |

### 2.2 Entreprises

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/companies/{identifier}` | GET | Liste des entreprises |
| `/web/companies/{identifier}` | POST | Création d'une entreprise |
| `/web/companies/{identifier}/{company}` | GET | Détails d'une entreprise |
| `/web/companies/{identifier}/{company}` | PUT | Mise à jour d'une entreprise |
| `/web/companies/{identifier}/{company}` | DELETE | Suppression d'une entreprise |
| `/web/companies/users` | GET | Liste des utilisateurs d'entreprises |
| `/web/companies/users/{role}` | POST | Création d'un utilisateur avec un rôle spécifique |

### 2.3 Projets

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/projects` | GET | Liste des projets |
| `/web/projects` | POST | Création d'un projet |
| `/web/projects/{project}` | GET | Détails d'un projet |
| `/web/projects/{project}` | PUT | Mise à jour d'un projet |
| `/web/projects/{project}` | DELETE | Suppression d'un projet |
| `/web/projects/{project}/next-step` | PUT | Progression à l'étape suivante |
| `/web/projects/{project}/prev-step` | PUT | Retour à l'étape précédente |
| `/web/projects/{project}/documents/{ref_document}` | POST | Ajout de documents à un projet |

## 3. Gestion du Catalogue

### 3.1 Articles

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/articles` | GET | Liste des articles |
| `/web/articles` | POST | Création d'un article |
| `/web/articles/{article}` | GET | Détails d'un article |
| `/web/articles/{article}` | PUT | Mise à jour d'un article |
| `/web/articles/{article}` | DELETE | Suppression d'un article |
| `/web/articles/{article}/disable` | PUT | Désactivation d'un article |
| `/web/articles/{article}/validate` | PUT | Validation d'un article |

### 3.2 Marques

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/brands` | GET | Liste des marques |
| `/web/brands` | POST | Création d'une marque |
| `/web/brands/{brand}` | GET | Détails d'une marque |
| `/web/brands/{brand}` | PUT | Mise à jour d'une marque |
| `/web/brands/{brand}` | DELETE | Suppression d'une marque |

### 3.3 Travaux/Prestations

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/works` | GET | Liste des travaux |
| `/web/works` | POST | Création d'un travail |
| `/web/works/{work}` | GET | Détails d'un travail |
| `/web/works/{work}` | PUT | Mise à jour d'un travail |
| `/web/works/{work}` | DELETE | Suppression d'un travail |

## 4. Gestion des Visites et Événements

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/project-visits` | GET | Liste des visites |
| `/web/project-visits` | POST | Création d'une visite |
| `/web/project-visits/{project_visit}` | GET | Détails d'une visite |
| `/web/project-visits/{project_visit}` | PUT | Mise à jour d'une visite |
| `/web/project-events` | GET | Liste des événements projet |
| `/web/project-events` | POST | Création d'un événement projet |

## 5. Gestion des Documents

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/project-documents/{project_document}` | GET | Détails d'un document projet |
| `/web/project-documents/{project_document}/download` | GET | Téléchargement d'un document projet |
| `/web/client-documents/{client_document}/download` | GET | Téléchargement d'un document client |
| `/web/company-documents/{company_document}/download` | GET | Téléchargement d'un document entreprise |
| `/web/project-document-versions/{project_document_version}/download` | GET | Téléchargement d'une version de document |

## 6. Paramètres et Configuration

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/settings/company` | GET | Récupération des informations de l'entreprise |
| `/web/settings/company` | PUT | Mise à jour des informations de l'entreprise |
| `/web/settings/mailings` | GET | Configuration des emails |
| `/web/status` | GET | Liste des statuts |
| `/web/states` | GET | Liste des états |

## 7. Tableaux de Bord et Statistiques

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/dashboard-statics/projects` | GET | Statistiques des projets |
| `/web/dashboard-statics/visits` | GET | Statistiques des visites |
| `/web/dashboard-statics/devis` | GET | Statistiques des devis par année |

## 8. Souscription et Facturation

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/subscription/invoices` | GET | Factures de souscription |
| `/web/subscription/plans` | GET | Plans de souscription disponibles |
| `/web/subscription/subscriber-subscription` | GET | Détails de la souscription actuelle |
| `/web/subscription/payment-methods` | GET | Méthodes de paiement |

## 9. Notifications

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/web/notifications` | GET | Liste des notifications |
| `/web/notifications/count-all` | GET | Comptage des notifications |
| `/web/notifications/{notification}/seen` | PUT | Marquer une notification comme lue |
| `/web/general-notifications/latest` | GET | Dernières notifications générales |

## 10. Structure d'Authentification

Le système d'authentification suit le flux suivant :

1. **Login** : Envoi des identifiants via `/web/login`
2. **Vérification de session** : Appel à `/logged-user` au chargement de l'application
3. **Déconnexion** : Appel à `/web/logout` pour terminer la session
4. **Récupération de mot de passe** :
   - Envoi d'un lien via `/web/send-reset-link-email-by-user`
   - Vérification du code via `/web/verify-reset-key`
   - Définition du nouveau mot de passe via `/web/reset-password`

## 11. Gestion des Permissions

Le backend utilise un système de permissions basé sur CASL (`@casl/ability`) qui contrôle l'accès aux différents endpoints en fonction du rôle de l'utilisateur connecté. Les permissions sont récupérées lors de l'authentification et stockées dans le contexte d'authentification frontend.

## 12. Dépendances et Intégrations

Le système repose sur les technologies d'intégration suivantes :
- **Axios** pour les appels API
- **Sanctum** pour l'authentification côté backend
- **React Query** pour la gestion des états des requêtes côté frontend

## Conclusion

L'API du projet GRON est bien structurée et suit une architecture RESTful cohérente. Les endpoints sont organisés de manière logique par ressource et permettent une communication efficace entre le frontend et le backend. Le système d'authentification et de gestion des permissions assure une sécurité adéquate pour les différentes opérations.

Les principales améliorations potentielles pourraient inclure :
- Une documentation API plus complète avec Swagger ou OpenAPI
- Une standardisation plus poussée des réponses d'erreur
- L'implémentation d'un système de versioning d'API pour faciliter les évolutions futures

Ce document servira de référence pour comprendre l'intégration entre les composants frontend et backend du projet GRON et pourra être utilisé pour faciliter la maintenance et l'évolution du système.