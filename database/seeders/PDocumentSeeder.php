<?php

namespace Database\Seeders;

use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Models\DCompanyProjectDocs;
use App\Models\PDocument;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_documents')->truncate();
        $documents = [
            [
                'id' => 1,
                'entitled' => 'Information générale préalable',
                'type' => 0,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'generalDocumentData',
                'skeleton_path' => 'Skeletons/general_information_skeleton.json',
                'blade_path' => 'Documents.general_information',
                'permissions' => ['generate-init-doc'],
                'exported' => 0,
                //docuSign
                'tabs' => [
                    [
                        'sign_page' => 1,
                        'x' => 385,
                        'y' => 740,
                    ]
                ],
                //digiSIgn
                // 'tabs' => [
                //     [
                //         'sign_page' => 0,
                //         'blc' => [
                //             'x' => 360,
                //             'y' => 47,
                //         ],
                //         'trc' => [
                //             'x' => 518,
                //             'y' => 103,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 2,
                'entitled' => 'Grille d’analyse du logement',
                'reference' => 'grilleData',
                'type' => 1,
                'signature' => 0,
                'docu_signature' => 0,
                'nature_doc' => PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value,
                'blade_path' => 'forms.staticform',
                'permissions' => [
                    'fill-grille-card-form',
                    'generate-grille-card-form',
                ],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 3,
                'entitled' => 'Synthèse de grille d’analyse du logement',
                'type' => 2,
                'signature' => 0,
                'docu_signature' => 0,
                'nature_doc' => PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value,
                'reference' => 'syntheseGrilleData',
                'blade_path' => 'forms.staticform2',
                'permissions' => [
                    'fill-synthese-grille-form',
                    'generate-synthese-grille-form',
                ],
                'exported' => 1,
                'is_project' => 1,
            ],
            [
                'id' => 4,
                'entitled' => 'Relevé d\'audit',
                'reference' => 'syntheseShuttleData',
                'type' => 3,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 2,
                'blade_path' => 'shuttle-card/pdf/shuttle_card',
                'permissions' => [
                    'fill-shuttle-card-form',
                    'generate-shuttle-card-form',
                ],
                'tabs' => [
                    [
                        'sign_page' => 0,
                        'blc' => [
                            'x' => 360,
                            'y' => 47,
                        ],
                        'trc' => [
                            'x' => 518,
                            'y' => 103,
                        ],
                    ],
                ],
                'exported' => 0,
                'is_project' => 1,
            ],
            // contract
            [
                'id' => 5,
                'entitled' => ' Contrat MAR',
                'type' => 4,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 1,
                'reference' => 'ContractMarData',
                'skeleton_path' => 'Skeletons/contract_mar_skeleton.json',
                'blade_path' => 'Documents.contract_mar',
                'permissions' => ['generate-contract-devis'],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 8,
                        'x' => 375,
                        'y' => 565,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 8,
                //         'blc' => [
                //             'x' => 388,
                //             'y' => 290,
                //         ],
                //         'trc' => [
                //             'x' => 535,
                //             'y' => 346,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 42,
                'entitled' => 'Devis MAR',
                'type' => 36,
                'signature' => 1,
                'docu_signature' => 1,
                'nature_doc' => 1,
                'required' => 1,
                'required' => 1,
                'reference' => 'InvoiceMarData',
                'skeleton_path' => 'Skeletons/devis_mar_skeleton.json',
                'blade_path' => 'Documents.devis_mar',
                'permissions' => ['generate-contract-devis'],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 1,
                        'x' => 200,
                        'y' => 680,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 0,
                //         'blc' => [
                //             'x' => 173,
                //             'y' => 89,
                //         ],
                //         'trc' => [
                //             'x' => 300,
                //             'y' => 148,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 6,
                'entitled' => 'Préconisation',
                'reference' => 'preAuditData',
                'type' => 5,
                'nature_doc' => 0,
                'permissions' => ['attach-pre-audit'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 7,
                'entitled' => 'Audit énergétique',
                'reference' => 'document3ClData',
                'type' => 6,
                'nature_doc' => 0,
                'permissions' => ['attach-3cl'],
                'exported' => 1,
                'is_project' => 1,
            ],

            [
                'id' => 8,
                'entitled' => 'Attestation travaux-parcours accompagne-devis',
                'type' => 7,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'quotationData',
                'skeleton_path' => 'Skeletons/quotation_work.json',
                'blade_path' => 'Documents.quotation_work',
                'permissions' => ['generate-work-certificate'],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 4,
                        'x' => 60,
                        'y' => 380,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 3,
                //         'blc' => [
                //             'x' => 55,
                //             'y' => 425,
                //         ],
                //         'trc' => [
                //             'x' => 174,
                //             'y' => 468,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 9,
                'entitled' => 'Projet de travaux',
                'type' => 8,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,

                'reference' => 'workProjectData',
                'blade_path' => 'Documents.work_project',
                'skeleton_path' => 'Skeletons/work_project_skeleton.json',
                'permissions' => ['generate-project-work'],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 390,
                        'y' => 680,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 374,
                //             'y' => 651,
                //         ],
                //         'trc' => [
                //             'x' => 464,
                //             'y' => 692,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],

            // [
            //     'id' => 11,
            //     'entitled' => 'Aide de suivi de la réalisation',
            //     'type' => 9,
            //     'nature_doc' => 0,
            //     'reference' => 'assistanceMonitoringData',
            //     'permissions' => ['attach-assistance-project-monitoring'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 12,
            //     'entitled' => 'Procès Verbal de réception et contrôle chantier',
            //     'type' => 10,
            //     'nature_doc' => 1,
            //     'reference' => 'receptionReportData',
            //     'permissions' => ['generate-reception-report'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 13,
            //     'entitled' => 'Formulaire de satisfaction',
            //     'type' => 11,
            //     'nature_doc' => 0,
            //     'reference' => 'satisfactionFormData',
            //     'permissions' => ['fill-satisfaction-form', 'generate-satisfaction-form'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 14,
            //     'entitled' => 'Attestation travaux-parcours accompagne-facture',
            //     'type' => 12,
            //     'nature_doc' => 1,
            //     'signature' => 1,
            //     'docu_signature' => 1,
            //     'reference' => 'invoiceData',
            //     'skeleton_path' => 'Skeletons/invoice_work.json',
            //     'blade_path' => 'Documents.invoice_work',
            //     'permissions' => ['generate-accompaniement-invoice'],
            //     'exported' => 0,
            // 'tabs'=>[
            //     [
            //     'sign_page'=>5,
            //     'x'=>60,
            //     'y'=>375,
            //     ]
            // ]
            //     'tabs' => [
            //         [
            //             'sign_page' => 4,
            //             'blc' => [
            //                 'x' => 56,
            //                 'y' => 421,
            //             ],
            //             'trc' => [
            //                 'x' => 182,
            //                 'y' => 465,
            //             ],
            //         ],
            //     ],
            //     'is_project' => 1,
            // ],
            [
                'id' => 15,
                'entitled' => 'Simulation',
                'type' => 13,
                'nature_doc' => 1,
                'reference' => 'simulationData',
                'blade_path' => 'Documents.simulation_document',
                'skeleton_path' => 'Skeletons/simulation_skeleton.json',
                'required' => 1,
                'permissions' => ['generate-simulation'],
                'exported' => 0,
                'is_project' => 1,
            ],
            // [
            //     'id' => 16,
            //     'entitled' => 'Rapport d’accompagnement',
            //     'type' => 14,
            //     'nature_doc' => 0,
            //     'reference' => 'accompaniementData',
            //     'permissions' => ['generate-accompaniement-rapport'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            [
                'id' => 17,
                'entitled' => 'Demande d\'aide',
                'type' => 15,
                'nature_doc' => 2,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'helpDemandData',
                'blade_path' => 'Documents.cerfa',
                'skeleton_path' => 'Skeletons/cerfa_skeleton.json',
                'permissions' => [
                    'fill-help-formula-form',
                    'generate-help-formula-form',
                ],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 3,
                        'x' => 350,
                        'y' => 700,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 376,
                //             'y' => 100,
                //         ],
                //         'trc' => [
                //             'x' => 509,
                //             'y' => 158,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 21,
                'entitled' => 'Devis Entreprise retenue',
                'type' => 16,
                'required' => 1,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'devisInstallateur',
                'blade_path' => 'Documents.devis_installateur',
                'skeleton_path' => 'Skeletons/devis_installateur_skeleton.json',
                'permissions' => [
                    'quotation-installer',
                ],
                'exported' => 1,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 70,
                        'y' => 185,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 55,
                //             'y' => 618,
                //         ],
                //         'trc' => [
                //             'x' => 162,
                //             'y' => 668,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 22,
                'entitled' => 'Bon De Travail',
                'type' => 17,
                'nature_doc' => 1,
                'reference' => 'BonDeTravailData',
                'permissions' => ['generate-bon-travail'],
                'blade_path' => 'Documents.bon_de_travail',
                'skeleton_path' => 'Skeletons/bon_de_travail_skeleton.json',
                'exported' => 0,
                'is_project' => 1,
            ],
            // [
            //     'id' => 24,
            //     'entitled' => 'Reserve',
            //     'type' => 18,
            //     'nature_doc' => 2,
            //     'reference' => 'reserveData',
            //     'permissions' => ['generate-reserve'],
            //     'blade_path' => 'Documents.reserve',
            //     'skeleton_path' => 'Skeletons/reserve_skeleton.json',
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 25,
            //     'entitled' => 'Pv Réception',
            //     'type' => 19,
            //     'nature_doc' => 2,
            //     'reference' => 'pvReceptionData',
            //     'permissions' => ['generate-pv'],
            //     'blade_path' => 'Documents.pv_reception',
            //     'skeleton_path' => 'Skeletons/pv_reception_skeleton.json',
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 26,
            //     'entitled' => 'Coherence Work',
            //     'type' => 20,
            //     'nature_doc' => 1,
            //     'reference' => 'CoherenceWork',
            //     'permissions' => ['generate-coherence'],
            //     'blade_path' => 'Documents.coherence',
            //     'skeleton_path' => 'Skeletons/coherence_skeleton.json',
            //     'exported' => 0,

            // ],
            [
                'id' => 27,
                'entitled' => 'Signature_doc',
                'type' => 21,
                'nature_doc' => 1,
                'reference' => 'SignatureCompany',
                'permissions' => ['attach-any-document'],
                'exported' => 0,
                'is_project' => 0,
            ],
            [
                'id' => 28,
                'entitled' => 'Audit social',
                'type' => 22,
                'nature_doc' => 0,
                'reference' => 'SocialAudit',
                'permissions' => ['attach-social-audit-document'],
                'exported' => 0,
                'is_project' => 1,
                'hidden' => 1
            ],

            [
                'id' => 30,
                'entitled' => 'Attestation de travaux demande de paiement de prime',
                'type' => 24,
                'nature_doc' => 1,
                'reference' => 'primePaimentDemandData',
                'permissions' => ['generate-prime-payment-demand'],
                'blade_path' => 'Documents.demande_de_paiement',
                'skeleton_path' => 'Skeletons/demande_de_paiement_skeleton.json',
                'exported' => 0,
                'hidden' => 1,
                'is_project' => 1,
            ],
            [ // tochange
                'id' => 31,
                'entitled' => 'Attestation de travaux demande de prime',
                'type' => 25,
                'nature_doc' => 1,
                'reference' => 'primeWorkDemandData',
                'permissions' => ['generate-prime-work-demand'], // to change
                'blade_path' => 'Documents.demande_prime', // to change
                'skeleton_path' => 'Skeletons/demande_prime_skeleton.json', // to change
                'exported' => 0,
                'signature' => 1,
                'docu_signature' => 1,
                'hidden' => 0,
                'tabs' => [
                    [
                        'sign_page' => 4,
                        'x' => 120,
                        'y' => 370,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 3,
                //         'blc' => [
                //             'x' => 115,
                //             'y' => 420,
                //         ],
                //         'trc' => [
                //             'x' => 262,
                //             'y' => 475,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],
            [
                'id' => 46,
                'entitled' => 'Engagements complémentaires',
                'type' => 46,
                'nature_doc' => 1,
                'reference' => 'additionalCommitments',
                'permissions' => ['generate-additional-commitments'], // to change
                'blade_path' => 'Documents.attestation_cee_mpr_accompagne', // to change
                'skeleton_path' => 'Skeletons/attestation_cee_mpr_accompagne_skeleton.json', // to change
                'exported' => 0,
                'signature' => 1,
                'docu_signature' => 1,
                'hidden' => 0,
                'is_project' => 1,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 120,
                        'y' => 570,
                    ]
                ],
            ],
            // [
            //     'id' => 32,
            //     'entitled' => 'cerfa-15347 sur CEE',
            //     'type' => 26,
            //     'nature_doc' => 1,
            //     'reference' => 'ceeData',
            //     'permissions' => ['generate-cerfa-cee'],
            //     'blade_path' => 'Documents.cerfaCEE',
            //     'skeleton_path' => 'Skeletons/cerfaCEE_skeleton.json',
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            // [
            //     'id' => 33,
            //     'entitled' => 'Le carnet information du logement',
            //     'type' => 27,
            //     'nature_doc' => 0,
            //     'downloadable' => 1,
            //     'reference' => 'carnetLogement',
            //     'permissions' => ['attach-carnet-logement'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            [
                'id' => 34,
                'entitled' => 'Lettre d’octroi de primes : document ANAH',
                'type' => 28,
                'nature_doc' => 0,
                'reference' => 'documentAnah',
                'permissions' => ['attach-octroi-prime'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 35,
                'entitled' => 'Pièce d’identité',
                'type' => 29,
                'nature_doc' => 0,
                'reference' => 'identityDocument',
                'permissions' => ['attach-identity-document'],
                'exported' => 0,
                'is_project' => 1,
            ],
            [
                'id' => 36,
                'entitled' => 'Justificatif de propriété',
                'type' => 30,
                'nature_doc' => 0,
                'reference' => 'propertyOwnershipProof',
                'permissions' => ['attach-property-ownership-proof'],
                'exported' => 0,
                'is_project' => 1,
            ],
            // [
            //     'id' => 37,
            //     'entitled' => 'Dernière déclaration fiscale',
            //     'type' => 31,
            //     'nature_doc' => 0,
            //     'reference' => 'latestTaxReturn',
            //     'permissions' => ['attach-latest-tax-return'],
            //     'exported' => 0,
            //     'is_project' => 1,
            // ],
            [
                'id' => 38,
                'entitled' => 'RIB ou IBAN',
                'type' => 32,
                'nature_doc' => 0,
                'reference' => 'bankAccountDetails',
                'permissions' => ['attach-bank-account-details'],
                'exported' => 0,
                'is_project' => 1,
            ],
            // [
            //     'id' => 39,
            //     'entitled' => 'Son devis et son contrat signés',
            //     'type' => 33,
            //     'nature_doc' => 0,
            //     'reference' => 'signedQuoteAndContract',
            //     'permissions' => ['attach-signed-quote-and-contract'],
            //     'exported' => 0,
            //     'hidden' => 1,
            //     'is_project' => 1,
            // ],
            [
                'id' => 44,
                'entitled' => 'Livret de famille',
                'type' => 38,
                'nature_doc' => 0,
                'reference' => 'familyRecordBook',
                'permissions' => ['attach-family-record-book'],
                'exported' => 0,
            ],

            [
                'id' => 40,
                'entitled' => 'Facture énergétique',
                'type' => 34,
                'nature_doc' => 0,
                'reference' => 'consumptionBills',
                'permissions' => ['attach-consumption-bills'],
                'exported' => 0,
            ],
            [
                'id' => 29,
                'entitled' => 'Cerfa16089 02 mandat general ADMINISTRATIF',
                'type' => 23,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatAdminData',
                'permissions' => ['generate-cerfa-mandat-administratif'],
                'blade_path' => 'Documents.mondat',
                'skeleton_path' => 'Skeletons/mondat_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],
            [
                'id' => 41,
                'entitled' => 'Cerfa16089 02 mandat general FINANCIER',
                'type' => 35,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatFinanData',
                'permissions' => ['generate-cerfa-mandat-financier'],
                'blade_path' => 'Documents.mondat',
                'skeleton_path' => 'Skeletons/mondat_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],
            [
                'id' => 43,
                'entitled' => 'Cerfa16089 02 mandat general',
                'type' => 37,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'mandatGeneralData',
                'permissions' => ['generate-cerfa-mandat-general'],
                'blade_path' => 'Documents.mandat_general',
                'skeleton_path' => 'Skeletons/mandat_general_skeleton.json',
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 65,
                        'y' => 740,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 1,
                //         'blc' => [
                //             'x' => 78,
                //             'y' => 52,
                //         ],
                //         'trc' => [
                //             'x' => 218,
                //             'y' => 111,
                //         ],
                //     ],
                // ],
            ],

            [
                'id' => 45,
                'entitled' => 'Mandat MAR',
                'type' => 39,
                'nature_doc' => PNatureDocEnum::GENERATED->value,
                'reference' => 'precaire',
                'permissions' => ['generate-precaire'],
                'blade_path' => 'Documents.cerfa_mandat_precaire',
                'skeleton_path' => 'Skeletons/cerfa_mandat_precaire_skeleton.json',
                'exported' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 30,
                        'y' => 750,
                    ]
                ],
            ],

            [
                'id' => 48,
                'entitled' => 'Avis d\'imposition',
                'reference' => 'avisDImposition',
                'type' => 48,
                'nature_doc' => 0,
                'permissions' => ['attach-imposition'],
                'exported' => 0,
            ],
            [
                'id' => 50,
                'entitled' => 'Recap des traveaux entreprise',
                'type' => 50,
                'required' => 1,
                'nature_doc' => 1,
                'signature' => 1,
                'docu_signature' => 1,
                'reference' => 'RecapDevisInstallateur',
                'blade_path' => 'Documents.recap_devis_installateur',
                'skeleton_path' => 'Skeletons/recap_devis_installateur_skeleton.json',
                'permissions' => [
                    'quotation-installer',
                ],
                'exported' => 0,
                'tabs' => [
                    [
                        'sign_page' => 2,
                        'x' => 70,
                        'y' => 185,
                    ]
                ],
                // 'tabs' => [
                //     [
                //         'sign_page' => 2,
                //         'blc' => [
                //             'x' => 55,
                //             'y' => 618,
                //         ],
                //         'trc' => [
                //             'x' => 162,
                //             'y' => 668,
                //         ],
                //     ],
                // ],
                'is_project' => 1,
            ],

        ];
        foreach ($documents as $document) {
            PDocument::create($document);
        }
        $pDocuments = PDocument::all();
        DB::table('d_company_project_docs')->whereNotIn('type_doc', $pDocuments->pluck('type'))->delete();
        foreach ($pDocuments as $pDocument) {
            DB::table('d_company_project_docs')->where('type_doc', $pDocument->type)->update([
                'nature_doc' => $pDocument->nature_doc
            ]);
            DB::table('d_project_documents')->where('type_doc', $pDocument->type)->update([
                'exported' => $pDocument->exported,
            ]);
        }
    }
}
