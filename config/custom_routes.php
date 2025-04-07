<?php

return [
    'projects' => [
        'create' => '/projects/:id/edit',
        'update' => '/projects/:id/edit',
    ],
    'produit' => [
        'validate' => '/Catalog/products/:id/edit/',
        'create' => '/Catalog/products/',
    ],
    'article' => [
        'validate' => '/Catalog/services/:id/edit/'
    ],
    'marque' => [
        'create' => '/Catalog/brands/',
        'validate' => '/Catalog/brands/:id/edit/'
    ],
    'prestation' => [
        'create' => '/Catalog/services',
    ],
    'scenarios' => [
        'create' => 'Catalog/scenario',
    ],
    'collaborators' => [
        'create' => 'collaborators',
    ],
];