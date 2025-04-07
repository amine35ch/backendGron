<?php

declare(strict_types=1);

return [
    'auth' => [
        'reset_password' => 'Pour réinitialiser votre mot de passe, veuillez utiliser ce code : :code ',
    ],
    'company' => [
        'create' => [
            'Auditeur' => 'Votre société :trade_name a été ajouté à notre CRM GRON avec la référence :company_code',
            'Installateur' => 'Votre société  a été ajouté à notre CRM GRON',
            'Entreprise Retenue' => 'Votre société  a été ajouté à notre CRM GRON',
            'MAR' => 'Votre société :trade_name a été ajouté à notre CRM GRON avec la référence :company_code',
            'Sous-traitant' => 'Votre société :trade_name a été ajouté à notre CRM GRON avec la référence :company_code',
            'Mandataire' => 'Votre société :trade_name a été ajouté à notre CRM GRON avec la référence :company_code',
        ],
        'import'=>[
            'subject'=>'Un nouveau MAR vous a été attribué',
            'message'=>'maintenant vous pouvez basculer entre vos MAR'
        ],
    ],
    'profile' => [
        'change_password' => 'Vous avez changé votre mot de passe en :password',
    ],
    'collaborator' => [
        'create' => 'Votre compte  a été créé dans notre CRM GRON avec la référence :company_code',
        'change_password' => "l'administrateur :admin a changé votre mot de passe en :password",
    ],
    'article' => [
        'create' => 'Une nouvelle préstation ":article" a été ajouté à la liste par :username ',
        'Invalid' => ':article n\'est pas validé en cours.',
        'subject' => 'Création Préstation',
        'subject_update' => 'Modification Préstation',
        'update' => 'La préstation ":article" a été modifiée par :company ',

    ],
    'product' => [
        'create' => 'Un nouveau produit ":product" a été ajouté à la liste par :username ',
        'subject' => 'Création Produit',
        'subject_update' => 'Modification Produit',
        'update' => 'Le produit ":produit" a été modifié par :company ',
        'validate' => 'Le produit :product a été validée par le MAR',
        'validate_subject' => "Un produit a été validée"
    ],
    'marque' => [
        'subject' => 'Création Marque',
        'subject_update' => 'Modification Marque',
        'message' => 'Une nouvelle marque ":marque" a été ajouté à la liste par :company ',
        'update' => 'La marque ":marque" a été modifiée par :company ',
        'validate' => 'La marque :brand a été validée par le MAR',
        'validate_subject' => "Une marque a été validée"
    ],
    'scenario' => [
        'create' => 'Un nouveau scénario a été ajouté à la liste par :username ',
    ],
    'project' => [
        'response_anah' => [
            'subject' => [
                '1' => "Dossier est approuvé par l'ANAH",
                '2' => "Dossier est suspendu par l'ANAH",
                '3' => "L'ANAH demande une modification dans le dossier",
            ],
            'message' => [
                '1' => "L'ANAH a approuvé le dépôt du document du dossier :reference.",
                '2' => "L'ANAH a suspendu le dossier :reference.",
                '3' => "L'ANAH demande une modification dans le dossier :reference, et les modifications sont les suivantes : :message",
            ],

        ],
        'affectation' => 'Un nouveau dossier de référence :reference vous a été attribué par :username',
        'installer_create' => 'L\'entreprise retenue :username a créé le dossier de référence :reference',
        'simulation' => 'Un nouveau document de simulation d\'aides a été généré',
        'contrat_mar' => 'Un nouveau contrat MAR a été généré',
        'generate_document' => 'Un nouveau document ":document" a été généré pour le projet :reference',
        'eligible' => 'Le projet avec la référence :reference est éligible',
        'non_eligible' => 'Le projet avec la référence :reference est non éligible',
        'contrat_mar_signe' => 'Un nouveau contrat MAR a été signé',
        'bon_de_travail' => 'Un nouveau Bon De Travail a été généré',
        'preconisation' => "Un nouveau Document préconisation a été attaché par l'installateur",
        'attach_document' => 'Un nouveau Document :document a été attaché pour le projet :reference',
        'terminer' => 'Le projet :reference est terminé',
        'visit' => [
            'creation'=>"une :visit vous a été créer de dossier :client_name à  l'adresse :client_address , le :date",
            'terminer' => 'La 1ère visite Mar pour le projet est terminée avec succès.',
            'fix_audit' => 'Une date de visite d\'audit a été fixée pour le projet :reference',
            'mar' => 'Une date de visite MAR a été fixée pour le projet :reference',
            'update' => 'Une date de visite a été modifiée',
            'affected' => "une :visit vous a été affecté de dossier :client_name à  l'adresse :client_address , le :date",
            'validation' => [
                '1' => [
                    'subject' => 'Visite acceptée',
                    'description' => 'a accepté une viste pour le projet',
                ],
                '2' => [
                    'subject' => 'Visite annulée',
                    'description' => 'a annulé une visite pour le projet',
                ],
            ],
        ],
        'steps' => [
            'terminer' => [
                'description' => "a terminé l'étape :step pour le projet :reference",
                'subject' => "L'étape :step est terminé avec succès",
            ],
        ],
        'navette' => 'Une fiche navette a été générée pour le projet :reference',
        'audit' => 'Un Audit énergétique a été attaché',
        'invoice' => [
            'validation' => 'Un devis a été validé par :username pour le projet :reference',
            'anuulation' => 'Un devis a été annuler par :username pour le projet :reference',
            'ins_create' => 'Un devis a été généré par :username pour le projet :reference',
            'payed' => 'Le devis :devis a été payé pour le projet :reference',
            'waiting_for_installer' => 'Le MAR vous attend pour définir votre facture dans le projet :reference',
        ],
    ],
];