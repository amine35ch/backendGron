<?php

namespace Database\Seeders;

use App\Enums\PScaleTypeEnum\PScaleTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_scales')->truncate();
        $data =
            [
                [
                    'reference' => 'mode_pose',
                    'entitled' => 'Mode de Pose',
                    'unit' => null,
                    'type' => PScaleTypeEnum::LIST->value,
                    'bars' => [
                        'ITE',
                        'ITI',
                        'Combles Perdus à dérouler',
                        'Combles Perdus par soufflage',
                        'Isolation thermique de Rampants de toiture',
                        'Isolation thermique des toitures-terrasses',
                        "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => 'cap_couverture',
                    'entitled' => 'Cap. de couverture',
                    'unit' => 1,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        'ITE',
                        'ITI',
                        'Isolation thermique de Rampants de toiture',
                        'Isolation thermique des toitures-terrasses',
                        'Combles Perdus à dérouler',
                        'Combles Perdus par soufflage',
                        "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => 'epaisseur',
                    'entitled' => 'Epaisseur',
                    'unit' => 5,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        'ITE',
                        'ITI',
                        'Combles Perdus à dérouler',
                        'Combles Perdus par soufflage',
                        'Isolation thermique de Rampants de toiture',
                        'Isolation thermique des toitures-terrasses',
                        "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => 'res_thermique',
                    'entitled' => 'Rés. thermique',
                    'unit' => 6,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        'ITE',
                        'ITI',
                        'Combles Perdus par soufflage',
                        'Combles Perdus à dérouler',
                        'Isolation thermique de Rampants de toiture',
                        'Isolation thermique des toitures-terrasses',
                        "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => 'cop',
                    'entitled' => 'COP',
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                        "PAC air/eau",
                        "Thermodynamique",
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => 'scop',
                    'entitled' => 'SCOP (doit être >= 3.9 pour la PAC air/air)',
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                        // "PAC air/eau",
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => "ref_groupe_exterieure",
                    'entitled' => "Ref groupe extérieure",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                        "PAC air/eau",
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => "seer",
                    'entitled' => "SEER",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "conso_energetique_annuelle",
                    'entitled' => "Conso énergétique annuelle",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "limites_fonctionnement",
                    'entitled' => "LIMITES DE FONCTIONNEMENT",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "dimension",
                    'entitled' => "DIMENSION",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],

                [
                    'reference' => "classe_energetique",
                    'entitled' => "CLASSE ENERGETIQUE",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                        // "PAC air/eau",
                        'VMC simple ou double flux',
                    ]
                ],
                [
                    'reference' => "puissance_max_unites_interieures",
                    'entitled' => "PUISSANCE MAX UNITES INTERIEURES",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],

                [
                    'reference' => "nombre_unite_interieure",
                    'entitled' => "NOMBRE UNITÉ INTÉRIEURE",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "puissance_mode_froid",
                    'entitled' => "Puissance en mode froid (min-max)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "puissance_mode_chaud",
                    'entitled' => "Puissance en mode chaud (min-max)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "debit_air",
                    'entitled' => "Débit d'air",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",

                    ]
                ],
                [
                    'reference' => "pression_acoustique_min_max",
                    'entitled' => "Pression acoustique min/max",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "mode_fonctionnement",
                    'entitled' => "Modes de fonctionnement",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "fonctions_supplementaires",
                    'entitled' => "Fonctions supplémentaires",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                    ]
                ],
                [
                    'reference' => "poids",
                    'entitled' => "Poids",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Isolation thermique d'un plancher bas",
                        // "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "t_pac",
                    'entitled' => "T° PAC",
                    'unit' => null,
                    'type' => PScaleTypeEnum::LIST->value,
                    'bars' => [
                        "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "efficacite_saisonniere_35",
                    'entitled' => "Efficacité Saisonnière à 35°c (ETAS)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "calcul_selon_reglement",
                    'entitled' => "Calculée selon le règlement (EU)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "PAC air/eau",
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "usage_pac",
                    'entitled' => "Usage de PAC",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "type_pac",
                    'entitled' => "Type PAC",
                    'unit' => null,
                    'type' => PScaleTypeEnum::LIST->value,
                    'bars' => [
                        "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "dimensions_groupe_exterieur",
                    'entitled' => "Dimensions Groupe Extérieur",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "dimensions_kit_hydraulique",
                    'entitled' => "Dimensions Kit Hydraulique",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "puissance_acoustique_groupe_exterieur",
                    'entitled' => "Puissance Acoustique du Groupe Extérieur à 1m",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],

                [
                    'reference' => "poids_net_groupe_exterieur",
                    'entitled' => "Poids net du Groupe Extérieur",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "temperature_arret",
                    'entitled' => "Températures d'arrêt",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                    ]
                ],
                [
                    'reference' => "ref_unit_interieure",
                    'entitled' => "Ref unité intérieure",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        "PAC air/eau",
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => "puis_therm_nominale",
                    'entitled' => "Puis. therm. nominale",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        "Thermodynamique",
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => "profil_soutirage",
                    'entitled' => "Profil de soutirage",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "mesure_selon_norme",
                    'entitled' => "Mesuré selon les conditions de la norme",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "rendement_energetique_eta_wh",
                    'entitled' => "RENDEMENT ENERGETIQUE Eta wh",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "puissance_resistance",
                    'entitled' => "Puissance de la résistance (W)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "temperature_fonctionnement",
                    'entitled' => "Température de fonctionnement",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "pression_acoustique",
                    'entitled' => "Pression acoustique (dB)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "hauteur",
                    'entitled' => "Hauteur",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "diametre",
                    'entitled' => "Diamètre",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "poids_vide",
                    'entitled' => "Poids à vide",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "classe_efficaite_energetique",
                    'entitled' => "Classe d'efficacité énergétique",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "efficacite_thermique",
                    'entitled' => "Efficacité thermique",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "type_installation_ballon",
                    'entitled' => "type d'installation ballon",
                    'unit' => null,
                    'type' => PScaleTypeEnum::LIST->value,
                    'bars' => [
                        "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "type_caisson",
                    'entitled' => "Type de caisson",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "type_vmc",
                    'entitled' => "Type de la VMC",
                    'unit' => null,
                    'type' => PScaleTypeEnum::LIST->value,
                    'bars' => [
                        "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "debit_air_max",
                    'entitled' => "Débit d'air maximum",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "rendement_thermique_eleve",
                    'entitled' => "Rendement thermique élevés de",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "moteur_faible_consommation",
                    'entitled' => "Moteur faible consommation",
                    'unit' => null,
                    'type' => PScaleTypeEnum::TEXT->value,
                    'bars' => [
                        // "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "diametre_gaine_travers_mur",
                    'entitled' => "Diamètre de gaine au travers du mur",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "VMC simple ou double flux",
                    ]
                ],
                [
                    'reference' => "surface_fenetre",
                    'entitled' => "Surface des fenêtres",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                    ]
                ],
                [
                    'reference' => "coefficient_transmission_surf",
                    'entitled' => "Coefficient de transmission surfacique (Uw)",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                    ]
                ],
                [
                    'reference' => "facteur_solaire",
                    'entitled' => "Facteur solaire (Sw) ",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        "MENUISERIE FENETRE/MENUISERIE PORTE FENETRE/MENUISERIE PORTE DE SERVICE",
                    ]
                ],
                [
                    'reference' => "nombre_split",
                    'entitled' => "NOMBRE DE SPLIT",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        'PAC air/air',
                    ]
                ],
                [
                    'reference' => "capacite_de_stockage",
                    'entitled' => "CAPACITE DE STOCKAGE",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                       "Thermodynamique",
                    ]
                ],
                [
                    'reference' => "puissance_electrique_absorbee_ponderee",
                    'entitled' => "PUISSANCE ELECTRIQUE ABSORBEE PONDEREE WThC",
                    'unit' => null,
                    'type' => PScaleTypeEnum::NUMBER->value,
                    'bars' => [
                        // "PAC air/eau",
                        'VMC simple ou double flux'
                    ]
                ],

            ];

        foreach ($data as $datum) {
            \App\Models\PScale::firstOrCreate($datum);
        }
    }
}
