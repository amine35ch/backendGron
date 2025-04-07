<?php

return
    [
        'admin' => [
            'create' => " a crée l'administrateur  :reference ",
            'update' => "a modifié les informations de l'administrateur :reference ",
            'delete' => "a supprimé l'administrateur :reference ",
            'description' => ':username a créé l\' administrateur :user',
        ],
        'client' => [
            'create' => ':admin a crée le client  :reference ',
            'update' => ':admin a modifié les informations du client :reference ',
            'delete' => ':admin a supprimé le client :reference ',
            'generate_document' => ':admin a généré le document :document pour le client :reference',
            'validate_document' => [
                'accepted' => ':admin a validé le document :document',
                'refused' => ':admin a refusé le document :document',
            ],
        ],
        'collaborator' => [
            'create' => 'a créé le collaborateur :reference ',
            'update' => 'a modifié les informations du collaborateur :reference ',
            'delete' => 'a supprimé le collaborateur :reference ',
            'generate_document' => 'a généré le document :document pour le collaborateur :reference',
            'validate_document' => [
                'accepted' => 'a validé le document :document',
                'refused' => 'a refusé le document :document',
            ],
            'description' => ':username a créé le collaborateur :user ',
        ],
        'user' => [
            'create' => 'a créé le utilisateur :reference ',
            'update' => ':admin a modifié les informations du utilisateur :reference ',
            'delete' => 'a supprimé le utilisateur :reference ',
            'generate_document' => 'a généré le document :document pour le utilisateur :reference',
            'validate_document' => [
                'accepted' => 'a validé le document :document',
                'refused' => 'a refusé le document :document',
            ],
            'description' => ':username a créé le utilisateur :user ',
        ],
        'third_party' => [
            'create' => ':admin a créé le tier ',
            'update' => ':admin a modifié les informations du tier ',
            'delete' => ':admin a supprimé le tier ',
        ],
        'project' => [
            'create' => [
                'action' => 'Création du projet',
                'custom' => [
                    'suspended' => [
                        'action' => 'Projet suspendu',
                        'description' => 'Le projet a été suspendu lors de la création',
                    ],
                ],
                'description' => ':admin a crééé le projet',
            ],
            'update' => [
                'action' => 'Modification des données du projet',
                'description' => ':admin a modifié les informations du projet',
            ],
            'delete' => [
                'action' => 'Suppression du projet',
                'description' => ':admin a supprimé le projet',
            ],
            'add_work' => [
                'action' => 'Ajout des travaux',
                'description' => ':admin a ajouté les travaux :work pour le projet',
            ],
            'add_invoice' => [
                'action' => 'Ajout devis installateur',
                'description' => ":admin a ajouté un devis :reference de l'installateur :installer projet",
            ],
            'add_shuttle_card' => [
                'action' => "Ajout d'une fiche navette",
                'description' => 'a généré la fiche navette :document',
            ],
            'generate_document' => [
                'action' => 'Génération du :document',
                'description' => ':admin a généré le document :document du projet',
            ],
            'upload_document' => [
                'action' => 'Attachement du document',
                'description' => ":admin a attaché le document :document dans l'étape :step",
            ],
            'add_visit' => [
                'action' => 'Visite est enregistrée avec succès',
                'description' => ':admin a enregistré la visite pour le projet',
            ],
            'qualification' => [
                'action' => 'Qualificiation du client',
                'description' => ' :decision qualifié le client du projet ',
            ],
            'eligible' => [
                'action' => 'Eligibilité du client',
                'description' => ' :decision rendu le client éligible du projet ',
            ],
            'appointment' => [
                'action' => 'Confirmation de la plannification de la visite',
                'description' => ' :decision confirmé la visite du projet ',
            ],
            'accompaniement' => [
                'action' => 'Accompagnement renforcé',
                'description' => [
                    'accepted' => "a accepté l'accompagnement renforcé du client pour le projet ",
                    'refuséed' => ' a orienté le client vers L’ANAH pour le projet ',
                ],
            ],
            'end' => [
                'action' => "Projet terminé dans l'étape :step",
                'description' => ' a terminé le projet',
            ],
            'suspended' => [
                'action' => 'Le projet est suspendu',
                'description' => ' a suspendu le projet',
            ],
            'sign_document' => [
                'action' => 'Signature du document',
                'description' => ' a signé le document :document pour le projet :reference',
            ],
        ],
        'step' => [
            'start' => [
                'action' => "Départ de l'étape :step",
                'description' => "a commencé l'étape :step pour le projet",
            ],
            'end' => [
                'action' => "Fin de l'étape :step",
                'description' => "a terminé l'étape :step pour le projet",
            ],
            'return' => [
                'action' => "Retour de l'étape :step",
                'description' => "a retourné vers l'étape précédente :step pour le projet",
            ],
            'update' => [
                'action' => "Mise à jour de l'étape :step",
                'description' => "a modifié l'étape :step pour le projet",
            ],
            'simulation' => [
                'action' => 'Simulation est enregistrée avec succès',
                'description' => 'a enregistré la simulation pour le projet',
                'step' => [
                    'action' => 'Etape :step est terminée',
                    'description' => "a terminé l'étape :step pour le projet",
                ],
                'visit' => [
                    'action' => 'Visite est enregistrée avec succès',
                    'description' => ':admin a enregistré la visite pour le projet',
                    'step' => [
                        'action' => 'Etape :step est terminée',
                        'description' => "a terminé l'étape :step pour le projet",
                    ],
                ],
                'shuttle' => [
                    'action' => 'Fiche navette est enregistrée avec succès',
                    'description' => 'a enregistré la fiche navette pour le projet',
                    'step' => [
                        'action' => 'Etape :step est terminée',
                        'description' => "a terminé l'étape :step pour le projet",
                    ],
                ],
            ],
        ],
        'mar' => [
            'create' => "a créé l'entreprise  :entitled ",
            'update' => "a modifié les informations de l'entreprise :entitled ",
            'delete' => "a supprimé l'entreprise :entitled ",
            'add_document' => "a ajouté le document :document pour l'entreprise :entitled ",
            'validate_document' => [
                'accepted' => 'a validé le document :document',
                'refused' => 'a refusé le document :document',
            ],
        ],
        'auth' => [
            'login' => ':user a effectué la connexion',
            'logout' => ":user s'est déconnecté",
        ],
        'form' => [
            'action' => 'Géneration de formulaire',
            'save' => ':username a enregistré le formulaire :document du projet ',
            'finish' => 'a terminé le formulaire du projet ',
            'generate' => ':username a généré le formualire :document du projet ',
            'primeWorkDemandData' => ':username a enregistré le formulaire de l\' attestation de travaux demande de prime.'
        ],
        'question' => [
            'save' => ':admin a enregistré les réponses de la fiche navette du projet ',
            'generate' => 'a généré le pdf de la fiche navette du projet  ',
        ],
        'visit' => [
            'create' => ':username a créé la visite pour le projet :project ',
            'update' => 'a modifié les informations de la visite ',
            'delete' => 'a supprimé la visite ',
            'validation' => [
                '1' => [
                    'action' => 'Validation de la visite  avec succès',
                    'description' => 'a validé la visite pour le projet',
                ],
                '2' => [
                    'action' => 'Annulation de la visite avec succès',
                    'description' => 'a annulé la visite pour le projet',
                ],
                'affectation' => [
                    'action' => 'Affectation de collaborateur pour la visite',
                    'description' => ':username a affecté :username pour la visite pour le projet :project',
                ],
            ],

            'affectation' => [
                'action' => 'Affectation de collaborateur pour la visite',
                'description' => 'a affecté :username pour la visite pour le projet',
            ],

            'step' => [
                'action' => 'Etape :step est terminée',
                'description' => "a terminé l'étape :step pour le projet",
            ],
        ],
        'article' => [
            'create' => [
                'action' => "Création d'article",
                'description' => ":username a créé l'article :reference ",
            ],

            'update' => [
                'action' => "Modification des données d'article",
                'description' => "a modifié les informations d'article",
            ],

            'delete' => [
                'action' => "Suppression d'article",
                'description' => "a supprimé l'article",
            ],
        ],
        'scenario' => [
            'create' => [
                'action' => 'Création du scénario',
                'description' => ':username a créé le scénario :reference le ',
            ],

            'update' => [
                'action' => 'Modification des données du scénario',
                'description' => 'a modifié les informations du scénario',
            ],

            'delete' => [
                'action' => 'Suppression du scénario',
                'description' => 'a supprimé le scénario',
            ],
        ],
    ];
