<?php

return
    [
        'auth' => [
            'verify_reset_key' => 'Le code de vérification a expiré.',
            'reset_password' => 'Le mot de passe a été changé avec succès.',
            'validate_reset_key' => 'Le code de vérification n\'est pas validé.',
        ],
        'admin' => [
            'create' => 'Administrateur créé avec succès.',
            'update' => 'Administrateur modifié avec succès.',
            'delete' => 'Administrateur supprimé avec succès.',
            'not_found' => 'Administrateur introuvable.',
        ],
        'client' => [
            'create' => 'Bénéficiaire créé avec succès.',
            'update' => 'Bénéficiaire modifié avec succès.',
            'delete' => 'Bénéficiaire supprimé avec succès.',
            'not_found' => 'Bénéficiaire introuvable.',
            'disabled' => 'Statut bénéficiaire modifié avec succès',
        ],
        'user' => [
            'create' => 'Utilisateur créé avec succès.',
            'update' => 'Utilisateur modifié avec succès.',
            'delete' => 'Utilisateur supprimé avec succès.',
            'not_found' => 'Utilisateur introuvable.',
            'disabled' => 'Statut utilisateur modifié avec succès',
        ],
        'collaborator' => [
            'create' => 'Collaborateur créé avec succès.',
            'update' => 'Collaborateur modifié avec succès.',
            'delete' => 'Collaborateur supprimé avec succès.',
            'not_found' => 'Collaborateur introuvable.',
            'disabled' => 'Statut collaborateur modifié avec succès',
        ],
        'company' => [
            'create' => 'Entreprise créée avec succès.',
            'update' => 'Entreprise modifiée avec succès.',
            'link' => 'Lien generé avec succès.',
            'delete' => 'Entreprise supprimée avec succès.',
            'not_found' => 'Entreprise introuvable.',
            'disabled' => 'Statut entreprise modifié avec succès.',
        ],
        'project' => [
            'create' => 'Projet créé avec succès.',
            'update' => 'Projet modifié avec succès.',
            'delete' => 'Projet supprimé avec succès.',
        ],
        'mar' => [
            'create' => 'Entreprise créée avec succès.',
            'update' => 'Entreprise modifiée avec succès.',
            'delete' => 'Entreprise supprimée avec succès.',
        ],
        'document' => [
            'create' => 'Documents sont créés avec succès.',
            'validate' => 'Documents validés avec succès.',
            'generate' => 'Génération du document effectuée avec succès.',
        ],
        'step' => [
            'update' => 'Etape validée avec succès.',
        ],
        'simulation' => [
            'update' => 'Simulation enregistrée avec succès.',
            'update_not_mar' => 'La simulation enregistrée avec succès. En attente de la validation du Mar.',
        ],
        'form' => [
            'save' => 'Création de formulaire effectuée avec succès.',
            'finish' => 'Formualire terminé avec succès.',
            'generate' => 'Formualire généré avec succès.',
        ],
        'question' => [
            'save' => 'Réponses enregistrés avec succès.',
            'generate' => 'Réponses générés avec succès.',
            'finish' => 'Fiche navette terminée avec succès.',
        ],
        'operation' => [
            'disabled' => "Statut d'opération modifié avec succès.",
        ],
        'project-occupant' => [
            'create' => 'Liste d’occupants du logement créée avec succès.',
            'update' => 'Liste d’occupants du logement modifiée avec succès.',
        ],
        'model-reference' => [
            'update' => 'Référence modifiée avec succès.',
        ],
        'sub-contractor' => [
            'create' => 'Sous-traitant créé avec succès.',
            'update' => 'Sous-traitant modifié avec succès.',
            'delete' => 'Sous-traitant supprimé avec succès.',
        ],
        'smtp' => [
            'update' => 'Smtp modifié avec ssuccès.',
        ],
        'work' => [
            'create' => 'Travaux créés avec succès.',
            'update' => 'Travaux modifiés avec succès.',
            'delete' => 'Travaux supprimés avec succès.',
            'disabled' => 'Statut des travaux modifié avec succès.',
        ],
        'brand' => [
            'create' => 'Marque créée avec succès.',
            'update' => 'Marque modifiée avec succès.',
            'delete' => 'Marque supprimée avec succès.',
            'disabled' => 'Statut de marque modifié avec succès',
        ],
        'scenario' => [
            'create' => 'Scénario créé avec succès.',
            'update' => 'Scénario modifié avec succès.',
            'delete' => 'Scénario supprimé avec succès.',
            'disabled' => 'Statut de scénario modifié avec succès.',
        ],
        'article' => [
            'create' => 'Article créé avec succès.',
            'update' => 'Article modifié avec succès.',
            'delete' => 'Article supprimé avec succès.',
            'disabled' => "Statut d'article modifié avec succès.",
        ],
        'visit' => [
            'create' => 'Visite créée avec succès.',
            'update' => 'Visite modifiée avec succès.',
            'delete' => 'Visite supprimée avec succès.',
            'validation' => [
                '1' => [
                    'action' => 'Validation de la visite avec succès',
                    'description' => 'a validé la visite pour le projet',
                ],
                '2' => [
                    'action' => 'Annulation de la visite avec succès',
                    'description' => 'a annulé la visite pour le projet',
                ],
            ],
        ],
        'invoice-reference' => [
            'update' => 'Réference devis modifiée avec succès.'
        ],

        'feature_check' => [
            '0' => 'Votre espace de stockage a dépassé la limite.',
            '1' => 'user message',
            '2' => 'PROJECT message',
            '3' => 'CLIENT message',
            '4' => 'AGENT message',
            '5' => 'BRAND message',
            '6' => 'WORK',
            '7' => 'PRODUCT',
            '8' => 'SERVICE',
        ]
    ];
