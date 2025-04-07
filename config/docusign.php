<?php

return [
    'client_id' => env('DOCUSIGN_CLIENT_ID'),
    'integrator_key' => env('DOCUSIGN_INTEGRATOR_KEY'),
    'user_id' => env('DOCUSIGN_USER_ID'),
    'client_secret' => env('DOCUSIGN_CLIENT_SECRET'),
    'account_id' => env('DOCUSIGN_ACCOUNT_ID'),

    // SERVER  + URI
    'base_uri' => env('DOCUSIGN_BASE_URI'),
    'auth_uri' => env('DOCUSIGN_AUTH_URI'),
    'auth_server' => env('DOCUSIGN_AUTH_SERVER'),
    'redirect_uri' => env('DOCUSIGN_REDIRECT_URI'),
    'private_key_path' => storage_path('keys/docusign_private.key'),

    'digi_token' => env('DOCUSIGN_DIGISING_TOKEN'),
];
