<?php

/**
 * Configuration pour la génération de documentation Swagger
 * Ce fichier permet de définir les endpoints fiables à inclure dans la documentation
 */

return [
    // Contrôleurs et leurs méthodes/endpoints fiables
    'fiable_endpoints' => [
        // Auth
        'AuthController' => [
            'login',
            'logout',
            'refreshToken',
            'loginSubscription',
        ],
        
        // Projets
        'DProjectController' => [
            'index',
            'show',
            'store',
            'update',
            'destroy',
            'export',
            'getCalendar',
        ],
        
        // Clients
        'DClientController' => [
            'index',
            'show',
            'store',
            'update',
            'destroy',
            'getAccepted',
            'getProspects',
            'export',
        ],
        
        // Utilisateurs
        'UserController' => [
            'getUsers',
            'getUser',
            'store',
            'updateUser',
            'destroy',
            'disableUser',
            'getMyProfile',
            'updateMyProfile',
        ],
        
        // Entreprises
        'DCompanyController' => [
            'index',
            'getAll',
            'getById',
            'store',
            'update',
            'destroy',
            'disable',
            'getMyCompany',
            'updateMyCompany',
        ],
        
        // Vous pouvez ajouter d'autres contrôleurs et leurs méthodes ici
    ],
    
    // Options supplémentaires pour la génération de documentation
    'options' => [
        'include_schemas' => true, // Inclure les schémas de données définis dans app/Swagger/schemas
        'exclude_deprecated' => true, // Exclure les endpoints marqués comme dépréciés
        'only_documented' => true, // Inclure uniquement les endpoints avec documentation complète
    ],
]; 