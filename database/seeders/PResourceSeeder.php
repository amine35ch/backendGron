<?php

namespace Database\Seeders;

use App\Models\PResource;
use Illuminate\Database\Seeder;

class PResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            [
                'en' => 'clients',
                'fr' => 'Clients',
            ],
            [
                'en' => 'installers',
                'fr' => 'Installateurs',
            ],
            [
                'en' => 'auditors',
                'fr' => 'Auditeurs',
            ],
            [
                'en' => 'mars',
                'fr' => 'Mars',
            ],
            [
                'en' => 'sub-contractors',
                'fr' => 'Sous-traitants',
            ],
            [
                'en' => 'agents',
                'fr' => 'Mandataires',
            ],
            [
                'en' => 'governments',
                'fr' => 'Gouvernement',
            ],
            [
                'en' => 'projects',
                'fr' => 'Projets',
            ],
            [
                'en' => 'steps',
                'fr' => 'Etapes',
            ],
            [
                'en' => 'documents',
                'fr' => 'Documents',
            ],
            [
                'en' => 'settings',
                'fr' => 'Paramétres',
            ],
            [
                'en' => 'visits',
                'fr' => 'Visites',
            ],
            [
                'en' => 'events',
                'fr' => 'Evenements',
            ],
            [
                'en' => 'baskets',
                'fr' => 'Corbeilles',
            ],
            [
                'en' => 'operations',
                'fr' => 'Operations',
            ],
            [
                'en' => 'works',
                'fr' => 'Travaux',
            ],
            [
                'en' => 'brands',
                'fr' => 'Marques',
            ],
            [
                'en' => 'scenarios',
                'fr' => 'Scénarios',
            ],
            [
                'en' => 'articles',
                'fr' => 'Articles',
            ],
            [
                'en' => 'collaborators',
                'fr' => 'Collaborateurs',
            ],
            [
                'en' => 'profile',
                'fr' => 'Profile',
            ],
            [
                'en' => 'company',
                'fr' => 'Société',
            ],
            [
                'en' => 'users',
                'fr' => 'Utilisateurs',
            ],
            [
                'en' => 'default-articles',
                'fr' => 'Articles par défaut',
            ],
            [
                'en' => 'mar_services',
                'fr' => 'Prestations Mar',
            ],
            [
                'en' => 'logs',
                'fr' => 'Historiques',
            ],
            [
                'en' => 'statistic',
                'fr' => 'statistique',
            ],
            [
                'en' => 'subscription',
                'fr' => 'Abonnement',
            ],
        ];

        foreach ($resources as $resource) {
            PResource::create([
                'entitled' => $resource['en'],
                'local_fr' => $resource['fr'],
                'active' => 1,
            ]);
        }
    }
}
