<?php

namespace Database\Seeders;

use App\Models\PArticle;
use Illuminate\Database\Seeder;

class PArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            //prestation mar
            [
                'designation' => 'Audit Energétique Réglementaire',
                'selling_price' => 790,
                'unit' => 0,
                'type' => 2,
            ],
            [
                'designation' => 'Prestation Mon Accompagnateur Renov\'',
                'selling_price' => 2210,
                'unit' => 0,
                'type' => 2,
            ],
            //----------------------------------------------------------------

            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE-5130-09M25',
                'selling_price' => 8000,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-5130-09M25 . code : 7SP091205 . - Puissance nominale à chaud : 13 . - Puissance nominale à froid :  12 . - SEER/Classe énergétique : 6,10/A++ . - SCOP/Classe énergétique (climat tempéré) : 4,00/A+ . - Puissance acoustique : 70 . - Débit d'air : 5200 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 1098x1106x440 . - Poids net : 90 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE-4080-09M25',
                'selling_price' => 4000,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-4080-09M25 . code : 7SP091204 . - Puissance nominale à chaud : 9.50 . - Puissance nominale à froid : 8 . - SEER/Classe énergétique : 6,10/A++ . - SCOP/Classe énergétique (climat tempéré) : 3.80/A+ . - Puissance acoustique : 68 . - Débit d'air : 3800 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 889x654x340 . - Poids net : 51 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE- 2050-09M25',
                'selling_price' => 4000,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-2050-09M25 . code : 7SP091201 . - Puissance nominale à chaud : 5.65 . - Puissance nominale à froid : 5.30 . - SEER/Classe énergétique : 6,30/A++ . - SCOP/Classe énergétique (climat tempéré) : 4 / A+ . - Puissance acoustique : 64 . - Débit d'air : 2300 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 745x550x300 . - Poids net : 32 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE-3070-09M25',
                'selling_price' => 4000,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-3070-09M25 . code : 7SP091203 . - Puissance nominale à chaud : 8.60 . - Puissance nominale à froid : 7.10 . - SEER/Classe énergétique : 6,80/A++ . - SCOP/Classe énergétique (climat tempéré) : 3.80/A . - Puissance acoustique : 68 . - Débit d'air : 3800 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 889x654x340 . - Poids net : 48 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE-3060-09M25',
                'selling_price' => 0,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-3060-09M25 . code : 7SP091202 . - Puissance nominale à chaud : 6.50 . - Puissance nominale à froid : 6.10 . - SEER/Classe énergétique : 6,60/A++ . - SCOP/Classe énergétique (climat tempéré) : 3.80/A . - Puissance acoustique : 68 . - Débit d'air : 3800 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 889x654x340 . - Poids net : 48 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AW-YDZB327-H91',
                'selling_price' => 8000,
                'description' => "MARQUE / REFERENCE : AIRWELL / AW-YDZB327-H91  MULTISPLIT RÉSIDENTIEL TRIO . UNITÉ EXTÉRIEURE :  . - Puissance nominale kW :  8.5 . - Puissance absorbée nominale kW : 2,28 . - SEER/Classe énergétique : 6,1/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 5,67 . - Capacité à -15°C kW : 6,54 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 68 . - Débit d'air m³/h : 4000  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 980x790x427 .  - Poids net/Poids avec l'emballage kg : 68/73 . - ALIMENTATION Phase/Tension/Fréquence :  1P/230V/50Hz   . - Réfrigérant/PRP : R32/675 / Charge kg : 2,2 . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL AW-HDL7/9/12/18/24 -N91",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR AIRWELL ZDAE MULTISPLIT ZDAE- 2040-09M25',
                'selling_price' => 4000,
                'description' => "UNITÉ EXTÉRIEURE : ZDAE-2040-09M25 . code : 7SP091200 . - Puissance nominale à chaud : 4.4 . - Puissance nominale à froid : 4.10 . - SEER/Classe énergétique : 6,30/A++ . - SCOP/Classe énergétique (climat tempéré) : 4 / A+ . - Puissance acoustique : 62 . - Débit d'air : 2300 . - Type de compresseur : Rotatif . - Dimensions de l'unité (LxHxP) : 745x550x300 . - Poids net : 30 . - Phase/Tension/Fréquence : 1P/230V/50Hz . - Réfrigérant/PRP : R32/675 .  . UNITE INTERIEURE : HDLE-025N-09M25 . code : 7SP023271 . - Puissance frigorifique nominale : 2.70 . - Puissance calorifique nominale : 2.80 . - Pression acoustique à 1 m (TPV/PV/MV/GV) dB (A) : 24/34/38/41 . - Puissance acoustique (TPV/PV/MV/GV) dB (A) : 36/46/50/57 . - Dimensions de l'unité (LxHxP) : 790x275x200 . - Poids net : 9",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AW-YHDL0012-H91 AURA',
                'selling_price' => 6500,
                'description' => "MARQUE / REFERENCE : AIRWELL /  Unité extérieure :   AW-YHDL012-H91 AURA . - Puissance nominale (min./max.) : 3,2 (0,6-3,6) kW . - SCOP/Classe énergétique (climat tempéré) : 4/A+ . - SEER/Classe énergétique : 6,1/A++ . - Pression acoustique à 1 m : 52 dB (A) . - Puissance acoustique : 62 dB (A) . - Dimensions de l'unité (LxHxP) : 848x596x320 mm . - Poids net :31kg . - Phase/Tension/Fréquence :1P/230V/50Hz / Monophasé . Unité intérieure : AW-HDLW012-N91 . - Pression acoustique à 1 m (TPV/PV/MV/GV) : 21/31/35/40 dB (A) . - Puissance acoustique : 38/44/47/55 dB (A) . - Dimensions de l'unité (LxHxP) : 790x275x200 mm / Poids net : 9 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL  AW-YDZB430 - H91 MULTISPLIT RÉSIDENTIEL QUATTRO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL / AW-YDZB430 - H91 MULTISPLIT RÉSIDENTIEL QUATTRO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 8,00 . - Puissance absorbée nominale kW : 3,50 . - SEER/Classe énergétique : 5,5/A . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 6,33 . - Capacité à -15°C kW : 7,31 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 68 . - Débit d'air m³/h : 5200  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm :1015x1103x440 .  - Poids net/Poids avec l'emballage kg : 94/104 . - ALIMENTATION Phase/Tension/Fréquence :  1P/230V/50Hz   . - Réfrigérant/PRP : R32/675 / Charge kg : 4,3 . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL AW-HDL7/9/12/18/24 -N91",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AWAU-YCZ327-H11 MULTISPLIT TRIO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ327-H11 MULTISPLIT TRIO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 7.8 . - Puissance absorbée nominale kW : 2,43 . - SEER/Classe énergétique : 6,60/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 6,5 . - Capacité à -15°C kW : 5,7 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 68 . - Débit d'air m³/h : 3500  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 900x860x315 .  - Poids net/Poids avec l'emballage kg : 62/67 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL YDZB542 -H91 MULTISPLIT RÉSIDENTIEL CINCO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL /  AW-YDZB842 - H91 MULTISPLIT RÉSIDENTIEL CINCO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 12 (2,6-13) . - Puissance absorbée nominale kW : 3,45 . - SEER/Classe énergétique : 6,10/A++ . - SCOP/Classe énergétique : 4,0/A+ . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 10,4 . - Capacité à -15°C kW : 9,75 . - Pression acoustique à 1 m dB(A) : 60 . - Puissance acoustique dB(A) : 70 . - Débit d'air m³/h : 7200  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 1087x1103x440 .  - Poids net/Poids avec l'emballage kg : 90 /98 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 / Charge kg : 2,75 . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL AW-HDL7/9/12/18/24 -N91",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL  AW-YDZB327 - H91  MULTISPLIT RÉSIDENTIEL TRIO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL / AW- YDZB327 - H91  MULTISPLIT RÉSIDENTIEL TRIO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW :  7,10 . - Puissance absorbée nominale kW : 2,18 . - SEER/Classe énergétique : 6,1/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 5,67 . - Capacité à -15°C kW : 6,54 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 68 . - Débit d'air m³/h : 4000  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 980x790x427 .  - Poids net/Poids avec l'emballage kg : 68/73 . - ALIMENTATION Phase/Tension/Fréquence :  1P/230V/50Hz   . - Réfrigérant/PRP : R32/675 / Charge kg : 2,2 . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL AW-HDL7/9/12/18/24 -N91",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AW-YHDL0018-H91 AURA',
                'selling_price' => 6500,
                'description' => "MARQUE / REFERENCE : AIRWELL /   AW-YHDL018-H91 AURA . - Puissance nominale (min./max.) : 5,2 (0,7-5,4) kW . - SCOP/Classe énergétique (climat tempéré) : 4/A+ . - SEER/Classe énergétique : 6,1/A++ . - Pression acoustique à 1 m : 54 dB (A) . - Puissance acoustique : 63 dB (A) . - Dimensions de l'unité (LxHxP) : 848x596x320 mm . - Poids net :34 kg . - Phase/Tension/Fréquence :1P/230V/50Hz / Monophasé . Unité intérieure : AW-HDLW018-N91 . - Pression acoustique à 1 m (TPV/PV/MV/GV) : 24/35/37/42 dB (A) . - Puissance acoustique : 44/49/54/58 dB (A) . - Dimensions de l'unité (LxHxP) : 790x275x200 mm / Poids net : 9 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AW-YHDL009-H91 AURA',
                'selling_price' => 6500,
                'description' => "MARQUE / REFERENCE : AIRWELL / Unité extérieure :  AW-YHDL009-H91 AURA . - Puissance nominale (min./max.) : 2,8 (0,5-3,5) kW . - SCOP/Classe énergétique (climat tempéré) : 4/A+ . - Pression acoustique à 1 m : 52 dB (A) . - Puissance acoustique : 61 dB (A) . - Dimensions de l'unité (LxHxP) : 782x540x320 mm . - Poids net : 29,5 kg . - Phase/Tension/Fréquence :1P/230V/50Hz / Monophasé . Unité intérieure : AW-HDLW009-N91 . - Pression acoustique à 1 m (TPV/PV/MV/GV) : 21/30/34/38 dB (A) . - Puissance acoustique : 38/44/52/55 dB (A) . - Dimensions de l'unité (LxHxP) : 790x275x200 mm / Poids net : 9 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AW-YHDL0024-H91 AURA',
                'selling_price' => 6500,
                'description' => "MARQUE / REFERENCE : AIRWELL /   AW-YHDL024-H91 AURA . - Puissance nominale (min./max.) : 6,45 (1,6-6,6) kW . - SCOP/Classe énergétique (climat tempéré) : 4/A+ . - SEER/Classe énergétique : 6,1/A++ . - Pression acoustique à 1 m : 57 dB (A) . - Puissance acoustique : 67 dB (A) . - Dimensions de l'unité (LxHxP) : 965x700x396 mm . - Poids net :46 kg . - Phase/Tension/Fréquence :1P/230V/50Hz / Monophasé . Unité intérieure : AW-HDLW024-N91 . - Pression acoustique à 1 m (TPV/PV/MV/GV) : 28/38/42/47 dB (A) . - Puissance acoustique : 44/50/54/59 dB (A) . - Dimensions de l'unité (LxHxP) : 970x300x225 mm / Poids net : 13,5 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AWAU-YCZ218-H11 MULTISPLIT DUO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ218-H11 MULTISPLIT DUO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 5.2 . - Puissance absorbée nominale kW : 1,62 . - SEER/Classe énergétique : 6,10/A++ . - SCOP/Classe énergétique : 4,1/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 4,5 . - Capacité à -15°C kW : 4,0 . - Pression acoustique à 1 m dB(A) : 55 . - Puissance acoustique dB(A) : 65 . - Débit d'air m³/h : 2500  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 845x700x320 .  - Poids net/Poids avec l'emballage kg : 48/52 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AWAU-YCZ536-H11 MULTISPLIT CINCO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL /  AWAU-YCZ536-H11 MULTISPLIT CINCO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 10.5 . - Puissance absorbée nominale kW : 3,27 . - SEER/Classe énergétique : 5,60/A+ . - SCOP/Classe énergétique : 3,8/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 8,4 . - Capacité à -15°C kW : 7,2 . - Pression acoustique à 1 m dB(A) : 60 . - Puissance acoustique dB(A) : 70 . - Débit d'air m³/h : 5500  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 990x965x345 .  - Poids net/Poids avec l'emballage kg : 80 /91 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL AWAU-YCZ430-H11 MULTISPLIT QUATTRO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ430-H11 MULTISPLIT QUATTRO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 8.5 . - Puissance absorbée nominale kW : 2,56 . - SEER/Classe énergétique : 6,60/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 6,6 . - Capacité à -15°C kW : 5,8 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 70 . - Débit d'air m³/h : 3800  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 900x860x315 .  - Poids net/Poids avec l'emballage kg : 65/69 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR AIRWELL  AW-YDZB218 - H91  MULTISPLIT RÉSIDENTIEL DUO',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : AIRWELL / AW-YDZB218-H91  MULTISPLIT RÉSIDENTIEL TRIO . UNITÉ EXTÉRIEURE :  . - Puissance nominale kW :  5.40 . - Puissance absorbée nominale kW : 1.45 . - SEER/Classe énergétique : 6,3/A++ . - SCOP/Classe énergétique : 4.1/A+ . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 3.60 . - Capacité à -15°C kW : 4.15 . - Pression acoustique à 1 m dB(A) : 55 . - Puissance acoustique dB(A) : 65 . - Débit d'air m³/h : 3200 . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 955x700x396 .  - Poids net/Poids avec l'emballage kg : 51/55.5 . - ALIMENTATION Phase/Tension/Fréquence :  1P/230V/50Hz   . - Réfrigérant/PRP : R32/675 / Charge kg : 1.6 . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL AW-HDL7/9/12/18/24 -N91",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR ALTECH ALTE100/ALTE300',
                'selling_price' => 9000,
                'description' => "MARQUE / REFERENCE : ALTECH /  Unité extérieure :   4210296 .  . - SCOP/Classe énergétique (climat tempéré) : 4/A++ . - COP : 4.32 . - SEER/Classe énergétique : 7.2 /A++ . - Puissance acoustique extérieure : 64 dB (A) . - Dimensions de l'unité (LxHxP) : 889x654x340 mm . - Puissance froid en kW : 8 . - Puissance chaud en kW : 9.5 . - Poids  :51kg . - Nature du gaz : R32-DIFLUOROMÉTHANE .  . Unité intérieure : 4210290 . - Puissance acoustique intérieur  : 55 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  2.8 . - Dimensions de l'unité (LxHxP) : 698x185x250 mm  . - Classe énergétique : A++",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 4,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'UNITÉ EXTÈRIEURE DOJO 2U018FS.UE  MULTI-SPLIT RÉVERSIBLE INVERTER',
                'selling_price' => 4000,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO 2U018FS.UE  MULTI-SPLIT RÉVERSIBLE INVERTER . CARACTÉRISTIQUES PRINCIPALES . - P. frigo. nominale (min. / max.) W :  5 100 (1 300 / 5 800) . - P. calo. nominale (min. / max.) W  : 5 800 (1 900 / 6 600) . - Débit d'air max. GV m3/h : 2 900  . PERFORMANCES . - EER :  3,31 . - COP : 3,74 . - SEER : 6,10 . - SCOP : 4,00 . - Pression acoustique dB(A) : 53 . - Puissance acoustique dB(A) : 63  . CLASSIFICATION ErP . - Classe énergétique (froid) A++  . - Classe énergétique (chaud) A+  . PLAGE DE FONCTIONNEMENT . - Froid °C : -10 à 46 . - Chaud °C : -15 à 24  . DIMENSIONS (HxLxP) ET POIDS . - Dimensions mm : 688 x 810 x 288 . - Poids kg :  43.5 . NORME : N°206/2012",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO BI SPLITS',
                'selling_price' => 9000,
                'description' => "DOJO GAMME ECO / . Fourniture d'une pompe a chaleur AIR AIR de la marque : . ATLANTIC gamme : DOJO MULTISPLITS . Ce pack comprend 1 unité extérieur BI SPLITS de la taille . correspond au modelé intérieur choisie. . Confort acoustique : 20 dB(A)(1) . Economies d'énergies : Classe A+ en chaud . Classe A++ en froid",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO Muraux Éco Tailles 18 5KW R32 / 1U018DBR.UE + AS018DB.UI',
                'selling_price' => 6200,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO Muraux Éco Tailles 18 5KW R32 / 1U018DBR.UE + AS018DB.UI . CARACTÉRISTIQUES PRINCIPALES :    . - Puissance. frigo. nominale (min. / max.) W : 5 000 (1 300 / 5 800) . - Puissance. calo. nominale (min. / max.) W : 5 200 (1400 / 6 000) . - Puissance. calo. à -7°C W :  4400  . PERFORMANCES :  . - EER / SEER : 3,42 / 6,10  . - COP / SCOP :  3,71 / 4,00  .  la puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Pression acoustique (u. int.)  PV / GV (froid) dB(A) :  28 / 44 . - Puissance acoustique (u. int.) (froid) dB(A) : 57  . - Pression acoustique (u. ext.) (froid) dB(A) : 53  . - Puissance acoustique (u. ext.) (froid) dB(A) : 65 . CLASSIFICATION ErP : . - Classe énergétique (froid) : A++ . - Classe énergétique (chaud) : A+  . INSTALLATION DIMENSIONS (HxLxP) :  . - Unité. int. mm 318 x 1 008 x 22 . - Unité. ext. mm 550 x 800 x 280 . POIDS :  . - Unité. int. / Unité. ext. kg 11,6 / 32,7 . - Type de réfrigérant (Potentiel de Réchauffement Global) : R32 (675)  . COMPATIBLE AVEC L'UNITÉ INTÉRIEURE : AS018DB.UI",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'ATLANTIC DOJO Muraux  Éco Tailles 12  3.8 KW R32 / AS012DB.UI + 1U012DBR.UE  ATL 872922 / 873931',
                'selling_price' => 0,
                'description' => "MARQUE : ATLANTICDOJO Muraux  Éco Tailles 12  3.8 KW . REFFERENCE : R32 / AS012DB.UI + 1U012DBR.UE  ATL 872922 / 873931 . CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) W 3 600 (1 000 / 4 000) . P. calo. nominale (min. / max.) W 3 700 (1 100 / 4 600) . P. calo. à -7°C W 2 830 . P. abs. nominale en froid W 1 110 . P. abs. nominale en chaud W 990 . Débit d'air (u. int.) PV / GV m3/h 350 / 550 . Débit d'air max. (u. ext.) GV m3/h 2 000 . EER / SEER 3,24 / 6,40 . COP / SCOP 3,74 / 4,10 . Pression acoustique (u. int.) PV / GV (froid) dB(A) 21 / 38 . Puissance acoustique (u. int.) (froid) dB(A) 55 . Pression acoustique (u. ext.) (froid) dB(A) 48 . Puissance acoustique (u. ext.) (froid) dB(A) 63 . Classe énergétique A++ . DIMENSIONS (HxLxP) : u. int. mm 280 x 820 x 195 u. ext. mm 550 x 800 x 280 . POIDS : u. int. / u. ext. kg 8,4 / 27",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'ATLANTIC DOJO QUADRI-SPLITS TAILLE 30 - 7.8 KW -Muraux Inverter R32 / 4U 030 DB.UE ATL 872926',
                'selling_price' => 9000,
                'description' => "MARQUE : ATLANTIC  DOJO QUADRI-SPLITS TAILLE 30 - 7.8 KW . REFFERENCE : Muraux Inverter R32 / 4U 030 DB.UE ATL 872926 . CARACTERISTIQUES . GAMMEUE QUADRI-SPLITS DOJO R32 ECO UE ATL.  . - Muraux Inverter 4U 030 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 7800W R32 . - mono-ventilateur compact  . - liaisons frigorifiques 60m maximum  . - fonctionnement jusqu'à -15°c extérieure en mode chaud - monophasé 230  . - PUISS.CHAUD (KW)6.8 UE / PUISS.FROID (KW)6.2 . - HAUTEUR (CM)70.000 / LARGEUR (CM)89.000 / PROFONDEUR CM 44.300 / POIDS (KG)54.000",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'ATLANTIC DOJO Muraux Éco Taille 9  2.6KW  R32 AS009DB.UI + 1U009DBR.UE ATL 872921 / 873930',
                'selling_price' => 6200,
                'description' => "MARQUE : ATLANTIC DOJO Muraux Éco Taille 9  2.6KW . REFFERENCE :  R32 AS009DB.UI + 1U009DBR.UE ATL 872921 / 873930 . CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) W 2 600 (800 / 3 400) . P. calo. nominale (min. / max.) W 2 900 (1 000 / 3 800) / P. calo. à -7°C W 2 120 . P. abs. nominale en froid W 800 / P. abs. nominale en chaud W 780 . Débit d'air (u. int.) PV / GV m3/h 300 / 500 / Débit d'air max. (u. ext.) GV m3/h 1 900 . EER / SEER 3,25 / 6,20 / COP / SCOP 3,72 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) dB(A) 20 / 37 . Puissance acoustique (u. int.) (froid) dB(A) 53 . Pression acoustique (u. ext.) (froid) dB(A) 47 . Puissance acoustique (u. ext.) (froid) dB(A) 62 . Classe énergétique  A++ . DIMENSIONS (HxLxP) : u. int. mm 280 x 820 x 195/u. ext. mm 540 x 780 x 245 . POIDS : u. int. / u. ext. kg 8,4 / 27",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO Muraux Éco Tailles 12 3.6KW R32 / 1U012DBR.UE + AS012DB.UI',
                'selling_price' => 6200,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO Muraux  Éco Tailles 12  3.6 KW R32 - 1U012DBR.UE  . CARACTÉRISTIQUES PRINCIPALES :    . - Puissance. frigo. nominale (min. / max.) W : 3 600 (1 000 / 4 000) . - Puissance. calo. nominale (min. / max.) W : 3 700 (1 100 / 4 600) . - Puissance. calo. à -7°C W :  2800  . PERFORMANCES :  . - EER / SEER : 3,24 / 6,20  . - COP / SCOP :  3,74 / 4,10  .  la puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Pression acoustique (u. int.)  PV / GV (froid) dB(A) :  21 / 38  . - Puissance acoustique (u. int.) (froid) dB(A) : 55  . - Pression acoustique (u. ext.) (froid) dB(A) : 48  . - Puissance acoustique (u. ext.) (froid) dB(A) : 63 . CLASSIFICATION ErP : . - Classe énergétique (froid) : A++ . - Classe énergétique (chaud) : A+  . INSTALLATION DIMENSIONS (HxLxP) :  . - Unité. int. mm 280 x 820 x 195  . - Unité. ext. mm 550 x 800 x 280 . POIDS :  . - Unité. int. / Unité. ext. kg 8,4 / 27 . - Type de réfrigérant (Potentiel de Réchauffement Global) : R32 (675)  . COMPATIBLE AVEC L'UNITÉ INTÉRIEURE : AS012DB.UI",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO Muraux Éco Taille 9  2.6KW  R32 1U009DBR.UE + AS009DB.UI',
                'selling_price' => 6200,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO Muraux  Éco Tailles 12  3.8 KW R32 - 1U009DBR.UE  . CARACTÉRISTIQUES PRINCIPALES :    . - Puissance. frigo. nominale (min. / max.) W : 2 600 (800 / 3 400) . - Puissance. calo. nominale (min. / max.) W : 2 900 (1 000 / 3 800)  . - Puissance. calo. à -7°C W :  2500  . PERFORMANCES :  . - EER / SEER : 3,25 / 6,20  . - COP / SCOP :  3,68 / 4,10  .  la puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Pression acoustique (u. int.)  PV / GV (froid) dB(A) :  20 / 37  . - Puissance acoustique (u. int.) (froid) dB(A) : 53  . - Pression acoustique (u. ext.) (froid) dB(A) : 47  . - Puissance acoustique (u. ext.) (froid) dB(A) : 62 . CLASSIFICATION ErP : . - Classe énergétique (froid) : A++ . - Classe énergétique (chaud) : A+  . INSTALLATION DIMENSIONS (HxLxP) :  . - Unité. int. mm 280 x 820 x 195  . - Unité. ext. mm 540 x 780 x 245 . POIDS :  . - Unité. int. / Unité. ext. kg 8,4 / 27 . - Type de réfrigérant (Potentiel de Réchauffement Global) : R32 (675)  . COMPATIBLE AVEC L'UNITÉ INTÉRIEURE : AS009DB.UI",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO Muraux  Éco Tailles 7  2KW R32 / 1U007DBR.UE + AS007DB.UI',
                'selling_price' => 6200,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO Muraux  Éco Tailles 7  2 KW R32 - 1U007DBR.UE  . CARACTÉRISTIQUES PRINCIPALES :    . - Puissance. frigo. nominale (min. / max.) W : 2 000 (500 / 3 000)   . - Puissance. calo. nominale (min. / max.) W : 2 500 (500 / 3 400)  . - Puissance. calo. à -7°C W :  2100  . PERFORMANCES :  . - EER / SEER : 3,23 / 6,80  . - COP / SCOP :  3,68 / 4,10  .  la puissance nominale et le coefficient de performance saisonnier sont déterminés selon  .  le règlement n°206/2012 de la commission du 6 mars 2012. . - Pression acoustique (u. int.)  PV / GV (froid) dB(A) :  20 / 35  . - Puissance acoustique (u. int.) (froid) dB(A) : 52  . - Pression acoustique (u. ext.) (froid) dB(A) : 47  . - Puissance acoustique (u. ext.) (froid) dB(A) : 58  . CLASSIFICATION ErP : . - Classe énergétique (froid) : A++ . - Classe énergétique (chaud) : A+  . INSTALLATION DIMENSIONS (HxLxP) :  . - Unité. int. mm 280 x 820 x 195  . - Unité. ext. mm 544 x 700 x 245  . POIDS :  . - Unité. int. / Unité. ext. kg 8,4 / 21,3  . - Type de réfrigérant (Potentiel de Réchauffement Global) : R32 (675)  . COMPATIBLE AVEC L'UNITÉ INTÉRIEURE : AS 007 DB.UI",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO MULTI-SPLIT 3U024GS.UE RÉVERSIBLE',
                'selling_price' => 4000,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO MULTI-SPLIT 3U024GS.UE RÉVERSIBLE . - P. frigo. nominale (min. / max.) W :  6 700 (1 500 / 8 200)  . - P. calo. nominale (min. / max.) W  : 8 000 (1 800 / 9 000)  . - Débit d'air max. GV m3/h : 2 500  . PERFORMANCES . - EER :  4,00  . - COP : 4,38  . - SEER : 7,00  . - SCOP : 4,00  . - Pression acoustique dB(A) : 54  . - Puissance acoustique dB(A) : 67  . PLAGE DE FONCTIONNEMENT . - Froid °C : -10 à 46 . - Chaud °C : -15 à 24  . DIMENSIONS (HxLxP) ET POIDS . - Dimensions mm : 730 x 940 x 345  . - Poids kg :  53 . - Classe énergétique (froid) A++",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'ATLANTIC DOJO Muraux Éco Taille 18 - 5 KW - DC Inverter - R32 / AS 018 DB.UI + 1U 018 DBR.UE ATL 873932',
                'selling_price' => 9000,
                'description' => "MARQUE :ATLANTIC DOJO Muraux Éco Taille 18 - 5 KW  . REFFERENCE : DC Inverter - R32 / AS 018 DB.UI + 1U 018 DBR.UE ATL 873932  . CARACTERISTIQUES . GAMMEUE QUADRI-SPLITS DOJO R32 ECO UE ATL. . - Muraux Inverter 4U 030 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 7800W R32  . - quadri-splits - dc inverter - mono-ventilateur compact  . - liaisons frigorifiques 70m max - fonctionnement jusqu'à -15°c extérieur en mode chaud - monophasé 230 v   . - PUISS.CHAUD (KW)8.6 UE / PUISS.FROID (KW)7.8 . - HAUTEUR (CM)70.000  LARGEUR (CM)89.000 PROFONDEUR CM 44.300  . - POIDS (KG) 61",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'UNITÉ EXTÈRIEURE DOJO 4U030HS.UE  MULTI-SPLIT RÉVERSIBLE INVERTER',
                'selling_price' => 4000,
                'description' => "MARQUE / REFERENCE : ATLANTIC  / DOJO 4U030HS.UE  MULTI-SPLIT RÉVERSIBLE INVERTER . CARACTÉRISTIQUES PRINCIPALES . - P. frigo. nominale (min. / max.) W :  8 800 (1 500 / 9 800) . - P. calo. nominale (min. / max.) W  : 9 800 (1 800 / 10 500) . - Débit d'air max. GV m3/h : 3 500 . PERFORMANCES . - EER :  3,80 . - COP : 4,10 . - SEER : 7,00 . - SCOP : 4,00 . - Pression acoustique dB(A) : 56 . - Puissance acoustique dB(A) : 70  . CLASSIFICATION ErP . - Classe énergétique (froid) A++  . - Classe énergétique (chaud) A+  . PLAGE DE FONCTIONNEMENT . - Froid °C : -10 à 46 . - Chaud °C : -15 à 24  . DIMENSIONS (HxLxP) ET POIDS . - Dimensions mm : 840 x 948 x 340 . - Poids kg :  76 . NORME : N°206/2012",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'DOJO QUADRI SPLITS',
                'selling_price' => 9000,
                'description' => "pompe à chaleur Gamme économique : . 1 unté extérieure -  quadri-splits intérieures de type murales et cassettes . Économies d'énergie : . classe A+ en chaud . classe A++ en froid . Confort toutes saisons : . large plage de fonctionnement : jusqu'à -15°C ext. en mode chaud et -10°C ext. en mode froid . Intégration simplifiée : . unité extérieure mono-ventilateur compacte",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'ATLANTIC DOJO TRI-SPLITS TAILLE 24 - 6.2 KW - Muraux Inverter R32 / 3U 024 DB.UEATL 872925',
                'selling_price' => 9000,
                'description' => "MARQUE : ATLANTIC  DOJO TRI-SPLITS TAILLE 24 - 6.2 KW  . REFFERENCE : Muraux Inverter R32 / 3U 024 DB.UE ATL 872925 . CARACTERISTIQUES . GAMMEUE TRI-SPLITS DOJO R32 ECO UE ATL.  . - Muraux Inverter 3U 024 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 6200W R32 . - mono-ventilateur compact  . - liaisons frigorifiques 60m maximum  . - fonctionnement jusqu'à -15°c extérieure en mode chaud - monophasé 230  . - PUISS.CHAUD (KW)6.8 UE / PUISS.FROID (KW)6.2 . - HAUTEUR (CM)70.000 / LARGEUR (CM)89.000 / PROFONDEUR CM 44.300 / POIDS (KG)54.000",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR CHAPPEE PANORAMA SWEETEA MUXN60-3',
                'selling_price' => 4000,
                'description' => "Pompe à chaleur Air / Air CHAPPEE PANORAMA SWEETEA . Unité extérieure : MUXN60-3 . - Nombre d'unité intérieure raccordable : 3 . - Modèle d'unité intérieure : UMC 20-25-35-50 / UCC 20-25-35-50 . - Puissance en mode froid : 6,2 kW . - Puissance en mode chaud : 6,6 kW . - Classe énergétique en mode froid : A++ . - Classe énergétique en mode chaud : A + . - SEER : 6.5 . - SCOP : 4.4 . -  Type de réfrigérant : R32 . - Pression acoustique max. dB(A) : 56 . - Puissance acoustique dB(A) : 65 .  . Unité intérieure : UMC20 .  . - Puissance en mode froid (min.-max.) kW : 2,05 (1,13-2,70) . - Puissance en mode chaud (min.-max.) kW : 2,15 (0,98-2,50) . - Pression acoustique min.-max. dB(A) : 20-42 . - Puissance acoustique dB(A) : 56 . - Poids net kg 8",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 11,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR CHAPPEE PANORAMA SWEETEA MUXN50-2',
                'selling_price' => 8000,
                'description' => "Pompe à chaleur Air / Air CHAPPEE PANORAMA SWEETEA  . Unité extérieure : MUXN50-2 . - Nombre d'unité intérieure raccordable : 2 . - Modèle d'unité intérieure : UMC 20-25-35-50 / UCC 20-25-35-50 . - Puissance en mode froid : 5.3 kW . - Puissance en mode chaud : 5.6 kW . - Classe énergétique en mode froid : A++ . - Classe énergétique en mode chaud : A + . - SEER : 7.1 . - SCOP : 4.1 . -  Type de réfrigérant : R32 . - Pression acoustique max. dB(A) : 55 . - Puissance acoustique dB(A) : 62 .  . Unité intérieure : UMC20 .  . - Puissance en mode froid (min.-max.) kW : 2,05 (1,13-2,70) . - Puissance en mode chaud (min.-max.) kW : 2,15 (0,98-2,50) . - Pression acoustique min.-max. dB(A) : 20-42 . - Puissance acoustique dB(A) : 56 . - Poids net kg 8",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 11,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR CHAPPEE PANORAMA SWEETEA MUXN40-2',
                'selling_price' => 0,
                'description' => "Pompe à chaleur Air / Air CHAPPEE PANORAMA SWEETEA  . Unité extérieure : MUXN40-2 . - Nombre d'unité intérieure raccordable : 2 . - Modèle d'unité intérieure : UMC 20-25-35-50 / UCC 20-25-35-50 . - Puissance en mode froid : 4.1 kW . - Puissance en mode chaud : 4.8 kW . - Classe énergétique en mode froid : A++ . - Classe énergétique en mode chaud : A + . - SEER : 6.2 . - SCOP : 4.1 . -  Type de réfrigérant : R32 . - Pression acoustique max. dB(A) : 54 . - Puissance acoustique dB(A) : 61 .  . Unité intérieure : UMC20 .  . - Puissance en mode froid (min.-max.) kW : 2,05 (1,13-2,70) . - Puissance en mode chaud (min.-max.) kW : 2,15 (0,98-2,50) . - Pression acoustique min.-max. dB(A) : 20-42 . - Puissance acoustique dB(A) : 56 . - Poids net kg 8",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 11,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN BLUEVOLUTION  3MXM52N8',
                'selling_price' => 9000,
                'description' => "Pompe à chaleur Air / Air Multisplit Inverter réversible. . Groupe extérieurs : 3MXM52N8 . - Puissance nominale froid : 1,80 - 5,20 - 7,00 KW . - Puissance nominale chaud : 1,30 - 6,80 - 8,00 KW . - SCOP/Classe énergétique (climat tempéré) : 4.61/A++ . - COP : 4.91 . - SEER/Classe énergétique : 8.54 / A++ . - Puissance acoustique extérieure : 59 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 868 x 328 mm . - Poids  :57kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN BLUEVOLUTION 4MXM80N9',
                'selling_price' => 9000,
                'description' => "Pompe à chaleur Air / Air Multisplit Inverter réversible. . Groupe extérieurs : 4MXM80N9 . - Puissance nominale froid : 2,39 - 7,40 - 8,06 KW . - Puissance nominale chaud : 2,79 - 9,60 - 10,17 KW . - SCOP/Classe énergétique (climat tempéré) : 4.55/A++ . - COP : 4.97 . - SEER/Classe énergétique : 8.32 / A++ . - Puissance acoustique extérieure : 62 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 868 x 328 mm . - Poids  :67kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN BLUEVOLUTION 5MXM90N9',
                'selling_price' => 0,
                'description' => "Pompe à chaleur Air / Air Multisplit Inverter réversible. . Groupe extérieurs : 5MXM90N9 . - Puissance nominale froid : 2,85 - 8,50 - 9,21 KW . - Puissance nominale chaud : 3,49 - 10,00 - 11,54 . - SCOP/Classe énergétique (climat tempéré) : 4.47/A++ . - COP : 4.89 . - SEER/Classe énergétique : 7.83 / A++ . - Puissance acoustique extérieure : 66 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 868 x 328 mm . - Poids  : 68kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN BLUEVOLUTION  3MXM68N9',
                'selling_price' => 10000,
                'description' => "Pompe à chaleur Air / Air Multisplit Inverter réversible. . Groupe extérieurs :  3MXM68N9 . - Puissance nominale froid : 1.96 - 6.00 - 6.64 KW . - Puissance nominale chaud : 2.01 - 7.80 - 10.44 KW . - SCOP/Classe énergétique (climat tempéré) : 4.07/A++ . - COP : 4.56 . - SEER/Classe énergétique : 7.84 / A++ . - Puissance acoustique extérieure : 61 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 868 x 328 mm . - Poids  :62kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN BLUEVOLUTION  2MXM40N',
                'selling_price' => 10000,
                'description' => "Pompe à chaleur Air / Air Multisplit Inverter réversible. . Groupe extérieurs :  2MXM40N . - Puissance nominale froid : 1,50 - 4,00 - 4,20 KW . - Puissance nominale chaud : 1,30 - 4,20 - 4,60 KW . - SCOP/Classe énergétique (climat tempéré) : 4.64/A++ . - COP : 4.30 . - SEER/Classe énergétique : 8.53/ A+++ . - Puissance acoustique extérieure : 60 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 868 x 328 mm . - Poids  :36kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN 5MXM90A9',
                'selling_price' => 0,
                'description' => "Pompe à chaleur Air / Air gamme multisplit . Groupe extérieurs : 5MXM90A9 . - Puissance nominale froid : 3.21- 9 - 10.19 KW . - Puissance nominale chaud : 4.36 - 10 - 11.65 kW . - SCOP/Classe énergétique (climat tempéré) : 4.65/A++ . - COP : 4.90 . - SEER/Classe énergétique : 7.65/ A++ . - Puissance acoustique extérieure : 64 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974 x 408 mm . - Poids  : 68kg . - Type de réfrigérant : R32 .  . Unité intérieure : FTXA20BT .  . - Débit d'air  froid silence/PV/MV/GV : 276 / 366 / 492 / 660 . - Débit d'air  chaud silence/PV/MV/GV : 270 / 384 / 522 / 654 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 32 / 39 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 21** / 25 / 32 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 798 x 189 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN  4MXM80A9',
                'selling_price' => 4000,
                'description' => "Pompe à chaleur Air / Air Multisplit . Groupe extérieurs : 4MXM80A9 . - Puissance nominale froid : 2,65 - 8 - 9.03 KW . - Puissance nominale chaud : 3.39 - 9.60 - 11.16 KW . - SCOP/Classe énergétique (climat tempéré) : 4.61/A++ . - COP : 4.58 . - SEER/Classe énergétique : 7.33 / A++ . - Puissance acoustique extérieure : 61 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974  x 408 mm . - Poids  :67kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN 5MXS90E',
                'selling_price' => 9000,
                'description' => "POMPE A CHALEUR AIR / AIRMULTI SPLIT MXS . Groupe extérieurs réversible 5MXS90E . - Puissance nominale froid : 3.4 - 10.4 - 11.1 KW . - Puissance nominale chaud : 2.9 - 8.1 - 9.0 kW . - SEER / SCOP : 6,42 / 4,19 . - Classe énergétique froid / chaud : A++ / A+ . - COP : 3.97 . - Niveaux de pression sonore froid / chaud : 52 / 52 . - Dimensions de l'unité (LxHxP) : 900 *770 * 320 . - Poids : 73 kg . - Type de réfrigérant : R-410A .  . Unité intérieure : FTXS50K - CTXS15K .  . - Débit d'air chaud : (330) 504 / 648 / 798 - 258 / 360 / 450 / 540 .  - Niveaux pression sonore : (24) / 34 / 40 / 47 - 21 / 28 / 33 / 38 . - Encombrement de l'unité H x L x P : 295 x 800 x 215 - 289 x 780 x 215",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN  3MXM40A9',
                'selling_price' => 4000,
                'description' => "Pompe à chaleur Air / Air Multisplit . Groupe extérieurs : 3MXM40A9 . - Puissance nominale froid : 1.70 - 4 - 4.60 KW . - Puissance nominale chaud : 1.30 - 4.60 - 5.10 KW . - SCOP/Classe énergétique (climat tempéré) : 4.65/A++ . - COP : 5.18 . - SEER/Classe énergétique : 8.55 / A+++ . - Puissance acoustique extérieure : 63 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974  x 408 mm . - Poids  : 57kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN  3MXM52A9',
                'selling_price' => 4000,
                'description' => "Pompe à chaleur Air / Air Multisplit . Groupe extérieurs : 3MXM52A9 . - Puissance nominale froid : 1.80 - 5.20 - 7.00 KW . - Puissance nominale chaud : 1.30 - 6.80 - 8 KW . - SCOP/Classe énergétique (climat tempéré) : 4.61/A++ . - COP : 4.91 . - SEER/Classe énergétique : 8.51 / A+++ . - Puissance acoustique extérieure : 59/63 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974  x 408 mm . - Poids  : 57kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN  4MXM68A9',
                'selling_price' => 8000,
                'description' => "Pompe à chaleur Air / Air Multisplit . Groupe extérieurs : 4MXM68A9 . - Puissance nominale froid : 1.97 - 6.80 - 7.78 KW . - Puissance nominale chaud : 2.47 - 8.60 - 10.81 KW . - SCOP/Classe énergétique (climat tempéré) : 4.22/A+ . - COP : 4.63 . - SEER/Classe énergétique : 8.03 / A++ . - Puissance acoustique extérieure : 61 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974  x 408 mm . - Poids  : 63kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR AIR DAIKIN  3MXM68A9',
                'selling_price' => 5000,
                'description' => "Pompe à chaleur Air / Air Multisplit . Groupe extérieurs : 3MXM68A9 . - Puissance nominale froid : 1.96 - 6.80 - 7.53 KW . - Puissance nominale chaud : 2.31 - 8.60 - 10.65 KW . - SCOP/Classe énergétique (climat tempéré) : 4.12/A+ . - COP : 4.32 . - SEER/Classe énergétique : 7.70 / A++ . - Puissance acoustique extérieure : 61/63 dB (A) . - Dimensions de l'unité (LxHxP) : 734 x 974  x 408 mm . - Poids  : 62kg . - Type de réfrigérant : R32 .  . Unité intérieure :  FTXM20R .  . - Débit d'air  froid silence/PV/MV/GV : 258 / 342 / 450 / 630 . - Débit d'air  chaud silence/PV/MV/GV : 306 / 372 / 492 / 558 . - Niveaux de pression sonore froid silence/PV/MV/GV  : 21** / 25 / 33 / 41 . - Niveaux de pression sonore chaud silence/PV/MV/GV : 22** / 26 / 34 / 39 . - Dimensions de l'unité (LxHxP) : 295 x 778 x 272 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM25N /  RXM25N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM25N  . - Puissance Nominale en refroidissement : 2,50 kW  . - Puissance MAX en refroidissement : 3,20 kW . - Puissance MAX en chauffage : 4,70 kW  . - Puissance absorbée en refroidissement/chauffage : 0,56 kW/0,56 kW  . - SEER : 8,65  . - SCOP :  5,10 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud :  4,57 / 5,00 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 57 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg . UNITE EXTERIEURE : RXM25N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 58 . - Dimensions unité extérieure  H x L x P mm : 550 x 765 x 285 . - Poids unité extérieure : 32 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM35N /   RXM35N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM35N  . - Puissance Nominale en refroidissement : 3,50 kW  . - Puissance MAX en refroidissement : 4,00 kW . - Puissance MAX en chauffage : 5,20 kW  . - Puissance absorbée en refroidissement/chauffage : 0,8 kW/0,99 kW  . - SEER : 8,65  . - SCOP :  5,10 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud :  4,23 / 4,04 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 58 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg . UNITE EXTERIEURE : RXM35N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 61 . - Dimensions unité extérieure  H x L x P mm : 550 x 765 x 285 . - Poids unité extérieure : 32 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM20N /  RXM20N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM20N  . - Puissance Nominale en refroidissement : 2,00 kW  . - Puissance MAX en refroidissement : 2,60 kW . - Puissance MAX en chauffage : 3,50 kW  . - Puissance absorbée en refroidissement/chauffage : 0,44 kW/0,50 kW  . - SEER : 8,65  . - SCOP :  5,10 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud :  4,57 / 5,00 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 57 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg . UNITE EXTERIEURE : RXM20N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 59 . - Dimensions unité extérieure  H x L x P mm : 550 x 765 x 285 . - Poids unité extérieure : 32 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM42N / RXM42N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM42N  . - Puissance Nominale en refroidissement : 4,20 kW  . - Puissance MAX en refroidissement : 5,00 kW . - Puissance MAX en chauffage : 5,20 kW  . - Puissance absorbée en refroidissement/chauffage : 0,97 kW/1,31 kW  . - SEER : 7,86 . - SCOP :  4,71 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud : 4,33 / 4,12 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg . UNITE EXTERIEURE : RXM42N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 62 . - Dimensions unité extérieure  H x L x P mm : 734 x 870 x 320 . - Poids unité extérieure : 50 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM50N / RXM50N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM50N  . - Puissance Nominale en refroidissement : 5,00 kW  . - Puissance MAX en refroidissement : 6,00 kW . - Puissance MAX en chauffage : 7,70 kW  . - Puissance absorbée en refroidissement/chauffage : 1,36 kW/1,45 kW  . - SEER : 7,41 . - SCOP :  4,71 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud : 3,68 / 4,00 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 58 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg . UNITE EXTERIEURE : RXM50N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 62 . - Dimensions unité extérieure  H x L x P mm : 734 x 870 x 320 . - Poids unité extérieure : 50 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM71N / RXM71N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM71N  . - Puissance Nominale en refroidissement : 7,10 kW  . - Puissance MAX en refroidissement : 8,50 kW . - Puissance MAX en chauffage : 10,20 kW  . - Puissance absorbée en refroidissement/chauffage : 2,12 kW/2,25 kW  . - SEER : 6,2 . - SCOP :  4.1 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud :  3,35 / 3,65 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A . - Température de fonctionnement de -10°C à +46°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg . UNITE EXTERIEURE : RXM71N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) :  64 . - Dimensions unité extérieure  H x L x P mm : 734 x 870 x 320 . - Poids unité extérieure : 56 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM60N / RXM60N9',
                'selling_price' => 6200,
                'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM60N  . - Puissance Nominale en refroidissement : 6,00 kW  . - Puissance MAX en refroidissement : 7,00 kW . - Puissance MAX en chauffage : 8,00 kW  . - Puissance absorbée en refroidissement/chauffage : 1,77 kW/1,94 kW  . - SEER : 6,9 . - SCOP :  4,3 .  La puissance nominale et le coefficient de performance saisonnier sont déterminés  .  selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Efficacité nominale EER / COP Froid/chaud : 3,39 / 3,61 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A+ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg . UNITE EXTERIEURE : RXM60N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) 62 . - Dimensions unité extérieure  H x L x P mm : 734 x 870 x 320 . - Poids unité extérieure : 50 Kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 13,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 50-2",
                'selling_price' => 2500,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 50-2 . Unité extérieure : . - SEER en mode froid : 7,1 . - Puissance en froid : 5,3 kW . - SCOP en mode chaud : 4,1 . - Puissance en chaud : 5,6 kW . - Tonnes équivalent CO2 : 0,64 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 55 dB . - Nombre d'unité intérieure pouvant être raccordée : 2  .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 545  - Largeur (mm) : 800  - Profondeur (mm) : 315 . - Poids à vide (kg) : 36 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT MOSE 20",
                'selling_price' => 2000,
                'description' => "Caractéristiques techniques : CLIM'UP MONOSPLIT MOSE 20 . Unité extérieure : . - SEER en mode froid :  6,1 . - Puissance en froid : 2,2 kW . - SCOP en mode chaud : 4,1 . - Puissance en chaud : 2,35 kW . - Tonnes équivalent CO2 : 0,36 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 50  dB .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 546  - Largeur (mm) : 723  - Profondeur (mm) : 290  . - Poids à vide (kg) : 27 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT MOSE 70",
                'selling_price' => 4000,
                'description' => "Caractéristiques techniques : CLIM'UP MONOSPLIT MOSE 70 . Unité extérieure : . - SEER en mode froid : 6,3 . - Puissance en froid : 7,03 kW . - SCOP en mode chaud : 4,3 . - Puissance en chaud : 7,05 kW . - Tonnes équivalent CO2 : 0,97 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 53  dB .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 700  - Largeur (mm) : 930  - Profondeur (mm) : 353 . - Poids à vide (kg) : 45 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 120-5",
                'selling_price' => 7000,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 120-5 . Unité extérieure : . - SEER en mode froid : 6,1 . - Puissance en froid : 12 kW . - SCOP en mode chaud : 4 . - Puissance en chaud : 13 kW . - Tonnes équivalent CO2 : 1,55 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 61 dB . - Nombre d'unité intérieure pouvant être raccordée : 5 .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 808  - Largeur (mm) : 985  - Profondeur (mm) : 395 . - Poids à vide (kg) : 75 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 60-3",
                'selling_price' => 3500,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 60-3 . Unité extérieure : . - SEER en mode froid : 6,5 . - Puissance en froid : 6,2 kW . - SCOP en mode chaud : 4,4 . - Puissance en chaud : 6,6 kW . - Tonnes équivalent CO2 : 0,74 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 56 dB . - Nombre d'unité intérieure pouvant être raccordée : 3 .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 655  - Largeur (mm) : 834  - Profondeur (mm) : 328 . - Poids à vide (kg) : 44 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "POMPE A CHALEUR DE DIETRICH AIR/AIR CLIM'UP MONOSPLIT EMSM 35",
                'selling_price' => 2500,
                'description' => 'Unité extérieure : . SEER en mode froid : 6,1 . Puissance en froid : 3,60 kW . SCOP en mode chaud : 4,2 . Puissance en chaud : 3,70 kW . Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . Niveau sonore (pression acoustique) : 50 Db . Unité intérieure : . Puissance en mode froid (min-max) : 3,60 . Puissance en mode chaud (min-max) : 3,70 . Pression acoustique min/max : 20/42 dB . Dimensions et poids . Unité extérieure : . Hauteur (mm) : 546 Largeur (mm) : 723 Profondeur (mm) : 290  . Poids à vide (kg) : 27 . Unité intérieure : . Hauteur (mm) : 300  Largeur (mm) : 800  Profondeur (mm) : 198 . Poids à vide (kg) : 9  . Classe énergétique : A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "POMPE A CHALEUR DE DIETRICH AIR/AIR CLIM'UP MONOSPLIT EMSM 20",
                'selling_price' => 2500,
                'description' => 'Unité extérieure : . SEER en mode froid : 6,1 . Puissance en froid : 2,20 kW . SCOP en mode chaud : 4,1 . Puissance en chaud : 2,35 kW . Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . Niveau sonore (pression acoustique) : 50 Db . Unité intérieure : . Puissance en mode froid (min-max) : 2,20  . Puissance en mode chaud (min-max) : 2,35  . Pression acoustique min/max : 20/43 dB . Dimensions et poids . Unité extérieure : . Hauteur (mm) : 546 Largeur (mm) : 723 Profondeur (mm) : 290  . Poids à vide (kg) : 25  . Unité intérieure : . Hauteur (mm) : 300  Largeur (mm) : 800  Profondeur (mm) : 198 . Poids à vide (kg) : 9  . Classe énergétique : A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 40-2",
                'selling_price' => 2500,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 40-2 . Unité extérieure : . - SEER en mode froid : 6,2 . - Puissance en froid : 4,1 kW . - SCOP en mode chaud : 4,1 . - Puissance en chaud : 4,8 kW . - Tonnes équivalent CO2 : 0,62 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 52 dB . - Nombre d'unité intérieure pouvant être raccordée : 2  .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 545  - Largeur (mm) : 800  - Profondeur (mm) : 315 . - Poids à vide (kg) : 34 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT EMSM 25",
                'selling_price' => 2500,
                'description' => 'Unité extérieure : . SEER en mode froid : 6,5 . Puissance en froid : 2,55 kW . SCOP en mode chaud : 4,2 . Puissance en chaud : 2,65 kW . Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . Niveau sonore (pression acoustique) : 50 Db . Unité intérieure : . Puissance en mode froid (min-max) : 2,55 . Puissance en mode chaud (min-max) : 2,65  . Pression acoustique min/max : 20/41 dB . Dimensions et poids . Unité extérieure : . Hauteur (mm) : 546 Largeur (mm) : 723 Profondeur (mm) : 290  . Poids à vide (kg) : 27 . Unité intérieure : . Hauteur (mm) : 300  Largeur (mm) : 800  Profondeur (mm) : 198 . Poids à vide (kg) : 9  . Classe énergétique : A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT MOSE 25",
                'selling_price' => 2000,
                'description' => "Caractéristiques techniques : CLIM'UP MONOSPLIT MOSE 25 . Unité extérieure : . - SEER en mode froid : 6,5 . - Puissance en froid : 2,55 kW . - SCOP en mode chaud : 4,2 . - Puissance en chaud : 2,65 kW . - Tonnes équivalent CO2 : 0,39 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 50 dB .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 546  - Largeur (mm) : 723  - Profondeur (mm) : 290  . - Poids à vide (kg) : 27 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT EMSM 50",
                'selling_price' => 2500,
                'description' => 'Unité extérieure : . SEER en mode froid : 6,5 . Puissance en froid : 5,30 kW . SCOP en mode chaud : 4,0 . Puissance en chaud : 5,40 kW . Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . Niveau sonore (pression acoustique) : 53 Db . Unité intérieure : . Puissance en mode froid (min-max) : 2,55 . Puissance en mode chaud (min-max) : 2,65  . Pression acoustique min/max : 20/48 dB . Dimensions et poids . Unité extérieure : . Hauteur (mm) : 545 Largeur (mm) : 806 Profondeur (mm) : 315 . Poids à vide (kg) : 35 . Unité intérieure : . Hauteur (mm) : 315 Largeur (mm) : 970  Profondeur (mm) : 235 . Poids à vide (kg) : 12,5 . Classe énergétique : A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT MOSE 50",
                'selling_price' => 2500,
                'description' => "Caractéristiques techniques : CLIM'UP MONOSPLIT MOSE 50 . Unité extérieure : . - SEER en mode froid : 6,5 . - Puissance en froid : 5,3 kW . - SCOP en mode chaud : 4 . - Puissance en chaud : 5,4 kW . - Tonnes équivalent CO2 : 0,86 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 53  dB .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 545  - Largeur (mm) : 806  - Profondeur (mm) : 315 . - Poids à vide (kg) : 35 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 100-4",
                'selling_price' => 5500,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 100-4 . Unité extérieure : . - SEER en mode froid : 6,1 . - Puissance en froid : 10,5 kW . - SCOP en mode chaud : 4 . - Puissance en chaud : 11 kW . - Tonnes équivalent CO2 : 1,55 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 61 dB . - Nombre d'unité intérieure pouvant être raccordée : 4 .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 808  - Largeur (mm) : 985  - Profondeur (mm) : 395 . - Poids à vide (kg) : 74 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT EMSM 70",
                'selling_price' => 2500,
                'description' => 'Unité extérieure : . SEER en mode froid : 6,3 . Puissance en froid : 7,03 kW . SCOP en mode chaud : 4,3 . Puissance en chaud : 7,05 kW . Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . Niveau sonore (pression acoustique) : 53 Db . Unité intérieure : . Puissance en mode froid (min-max) : 7,03 . Puissance en mode chaud (min-max) : 7,05  . Pression acoustique min/max : 20/49 dB . Dimensions et poids . Unité extérieure : . Hauteur (mm) : 700 Largeur (mm) : 930 Profondeur (mm) : 353 . Poids à vide (kg) : 45 . Unité intérieure : . Hauteur (mm) : 330 Largeur (mm) : 1100  Profondeur (mm) : 235 . Poids à vide (kg) : 15 . Classe énergétique : A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MULTISPLIT MUSE 80-3",
                'selling_price' => 4000,
                'description' => "Caractéristiques techniques : CLIM'UP MULTISPLIT MUSE 80-3 . Unité extérieure : . - SEER en mode froid : 6,3 . - Puissance en froid : 7,9 kW . - SCOP en mode chaud : 4 . - Puissance en chaud : 8,2 kW . - Tonnes équivalent CO2 : 0,71 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 58 dB . - Nombre d'unité intérieure pouvant être raccordée : 3 .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 655  - Largeur (mm) : 834  - Profondeur (mm) : 328 . - Poids à vide (kg) : 46 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => "CLIM'UP MONOSPLIT MOSE 35",
                'selling_price' => 2000,
                'description' => "Caractéristiques techniques : CLIM'UP MONOSPLIT MOSE 35 . Unité extérieure : . - SEER en mode froid : 6,1 . - Puissance en froid : 3,6  kW . - SCOP en mode chaud : 4,2 . - Puissance en chaud : 3,7  kW . - Tonnes équivalent CO2 : 0,46 T eq CO2 . - Température extérieur minimum de fonctionnement (en mode chaud) : -15°C . - Niveau sonore (pression acoustique) : 50 dB .  . Fonctions . - Unité extérieure équipée d'un compresseur ROTARY DC INVERTER . Dimensions et poids . - Hauteur (mm) : 546  - Largeur (mm) : 723  - Profondeur (mm) : 290  . - Poids à vide (kg) : 26 . Classe énergétique climatiseur : A++ (sur une échelle allant de A++ à E)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MICRO DRV MONOSPLIT R410A 10/11.2 kWatts / UE: RAS-4HVNC1E',
                'selling_price' => 8500,
                'description' => "Marque: Hitachi . Modèle UI: Micro DRV IVX Confort . Référence UI: RPI-4.0FSN5E . Référence UE: RAS-4HVNC1E . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R410A . Liaison Frigorifique: 3/8-5/8 . Tension: Monophasé . Puissance calorifique nominale 11.2 kWatts . Puissance frigorifique nominale 10 kWatts . Poids 127 kg . Dimensions unité intérieure (l x h x p): 1474x275x600 mm . Dimensions unité extérieure(l x h x p): 950x1140x370 mm . Economie d'énergies (SCOP): 4,01 . SEER: 5,38 . Classe énergétique chaud: A . Classe énergétique froid: B . Télécommande filaire PC-ARFP1E INCLUS",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MONOSPLIT R32 6/7 kWatts / UE: RAC-60NPE',
                'selling_price' => 4200,
                'description' => '- Marque: Hitachi . Modèle UI: Gainable R32 . Référence U: RAD-60RPE . Référence UE: RAC-60NPE . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R32 . Liaison Frigorifique: 1/4-1/2 . Tension: Monophasé . Puissance calorifique nominale 7 kWatts . Puiss',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MONOSPLIT R32 2,5/3,5 kWatts / UE: RAC-25NPE',
                'selling_price' => 3000,
                'description' => "Marque: Hitachi . Modèle UI: Gainable R32 . Référence U: RAD-25RPE . Référence UE: RAC-25NPE . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R32 . Liaison Frigorifique: 1/4-3/8 . Tension: Monophasé . Puissance calorifique nominale 3,5 kWatts . Puissance frigorifique nominale 2,5 kWatts . Poids 61 kg . Dimensions unité intérieure (l x h x p): 750x235x400 mm . Dimensions unité extérieure(l x h x p): 750x548x288 mm . Economie d'énergies (SCOP): 4.3 . SEER: 6.2 . Classe énergétique chaud: A+ . Classe énergétique froid: A++",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MONOSPLIT R32 7/8 kWatts / UE: RAC-70NPE',
                'selling_price' => 7000,
                'description' => '- Marque: Hitachi . Modèle UI: Gainable R32 . Référence U: RAD-70RPE . Référence UE: RAC-70NPE . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R32 . Liaison Frigorifique: 1/4-5/8 . Tension: Monophasé . Puissance calorifique nominale 8 kWatts . Puiss',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => '- Unité Extérieure Multisplit HITACHI 3 sorties R32 5,3/6,8KW / UE: RAM-53NP3E',
                'selling_price' => 3000,
                'description' => '- POMPE À CHALEUR AIR / AIR  . - GROUPE EXTERIEUR . - MARQUE : HITACHI . - PUISSANCE : 6,8 KW CHAUD . - SCOP : 4,6 . - FLUIDE : R32 . - PERFORMANCES GARANTIES FROID : -10°C +43°C . - PERFRORMANCES GARANTIES CHAUD : -15°C +21°C',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MONOSPLIT R32 3,5/4,8 kWatts / UE: RAC-35NPE',
                'selling_price' => 3500,
                'description' => "Marque: Hitachi . Modèle UI: Gainable R32 . Référence U: RAD-35RPE . Référence UE: RAC-35NPE . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R32 . Liaison Frigorifique: 1/4-3/8 . Tension: Monophasé . Puissance calorifique nominale 4,8 kWatts . Puissance frigorifique nominale 3,5 kWatts . Poids 48,5 kg . Dimensions unité intérieure (l x h x p): 750x235x400 mm . Dimensions unité extérieure(l x h x p): 750x548x288 mm . Economie d'énergies (SCOP): 4.3 . SEER: 6.5 . Classe énergétique chaud: A+ . Classe énergétique froid: A++",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'HITACHI GAINABLE MONOSPLIT R32 5/6 kWatts / UE: RAC-50NPE',
                'selling_price' => 3800,
                'description' => "Marque: Hitachi . Modèle UI: Gainable R32 . Référence U: RAD-50RPE . Référence UE: RAC-50NPE . Ensemble: Groupe + Gainable . Couleur: Blanc . Gaz: R32 . Liaison Frigorifique: 1/4-1/2 . Tension: Monophasé . Puissance calorifique nominale 6 kWatts . Puissance frigorifique nominale 5 kWatts . Poids 48,5 kg . Dimensions unité intérieure (l x h x p): 900x270x720 mm . Dimensions unité extérieure(l x h x p): 850x800x298 mm . Economie d'énergies (SCOP): 4 . SEER: 6.2 . Classe énergétique chaud: A+ . Classe énergétique froid: A++ . Télécommande filaire SPX-WKT3 INCLUS",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'LG MULTI SPLIT MPS INVERTER - MONOPHASE - FM 17 AH (UL1)',
                'selling_price' => 9000,
                'description' => "Marque : LG . - Groupe extérieur : FM 17 AH (UL1) . - Puissance frigorifique : 4.7 kW . - Cop : 3.6 . - EER : 3.6 . - SCOP : 3.9 . - Dimensions (L x H x P) : 770x540x245 . - Poids : 37 kg . - Niveau de puissance sonore : 45 / 51dB(A) . - Label énergétique Froid / Chaud : A / A .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 .  . - UNITÉ INTÉRIEUR : MC 09 AHR (NE0) . - Dimensions UI : (H x L x P) mm : 915x282x165 / Poids : 9.5 kg . - Niveau de puissance sonore UI : 22 / 26 / 31 dB . Garantie compresseur 5 ans, garantie pièces et main- d'oeuvre 3 ans",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 37,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR MIDEA  M3OF-27HFN8-Q',
                'selling_price' => 8000,
                'description' => "MARQUE / MODELE : MIDEA / M3OF-27HFN8-Q .  . Modèle multisystème : M3OF-27HFN8-Q .  . Unité intérieure : .  . - Puissance frigorifique : 7,91 kW . - Puissance calorifique : 8,21 kW . -  Consommation froid : 2450W . -  Consommation chaud : 2200 W . - SEER - Classification énergétique : 6.7 - A++ . - SCOP zones chaudes - Classification énergétique : 4 - A+ .  . Unité extérieure :  . - Type compresseur : Rotatif . - Débit d'air : 2700 . - Pression sonore : 54 dB(A) . - Puissance sonore : 67 dB(A) . - Largeur/hauteur/profondeur : 845 / 702 / 363 . - Poids net : 53 . - Alimentation : 220-240 V / 1 / 50 Hz . - Type de réfrigérant : R-32",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 38,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR/AIR MIDEA  M4O-28N8',
                'selling_price' => 4500,
                'description' => "MARQUE / MODELE : MIDEA / M4O-28N8 .  . Modèle multisystème : M4O-28N8 .  . Unité extérieure : .  . - Puissance frigorifique nominale : 8.2 kW . - Puissance calorifique nominale : 8,79kW . -  Consommation froid : 2.500W . -  Consommation chaud : 2.400 W . - SEER - Classification énergétique : 6.50 - A++ . - SCOP zones chaudes : 4 . - Débit d'air : 3.800 m³/h . - Pression sonore : 61 dB(A) . - Puissance sonore : 69 dB(A) . - Largeur/hauteur/profondeur : 946 / 810 / 410mm . - Poids net : 6.21kg . - Type compresseur : Rotatif . - Type de réfrigérant : R-32 .  . unité intérieure : MAG2-09N8 . - Puissance frigorifique nominale : 2.64 kW . - Puissance calorifique nominale : 2.93 kW . - Débit d'air bas/moy/haut : 260 / 330 / 460 m³/h . - Puissance sonore : 54 dB(A) . - Largeur/hauteur/profondeur : 726 / 291 / 210 mm . - Poids net : 8.7 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 38,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR MULTISPLIT MXZ-2F53VF4',
                'selling_price' => 9000,
                'description' => "PAC AIR / AIR MITSUBISHI MULTISPLIT MXZ-2F53VF4 .  . Unité extérieure : MXZ-2F53VF4 .  . - Puissance frigorifique min / nominale / max : 1.10 / 5.30 / 5.60 kW . - Puissance calorifique min / nominale / max à +7°C : 1.00 / 6.40 / 7.00kW . - EER / Classe énergétique : 3.79 / A . - SEER / Classe énergétique saisonnière : 8.63 / A+++ . - COP / Classe énergétique : 4.10 / A . - SCOP / Classe énergétique saisonnière : 4.60 / A++ . - Puissance acoustique : 61 dB(A)  . - Hauteur x Largeur x Profondeur : 550 x 800 x 285 mm . - Poids net : 37kg . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) : R32 / 675 .  . Unité intérieure : MSZ-AP15VGK .  . - Débit d'air en froid Silence/PV/MV/GV/SGV : 210 / 234 / 276 / 330 / 384 m3/h . - Pression acoustique froid 1 m Silence/PV/MV/GV/SGV : 21 / 26 / 30 / 35 / 40 dB(A) . - Hauteur x Largeur x Profondeur : 250 x 760 x 178",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 39,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR MULTISPLIT MXZ-3F54VF3',
                'selling_price' => 9000,
                'description' => "PAC AIR / AIR MITSUBISHI MULTISPLIT MXZ-3F54VF3 .  . Unité extérieure : MXZ-3F54VF3 .  . - Puissance frigorifique min / max : 5.4 (2.9 / 6.8)  kW . - Puissance calorifique min / max à +7°C : 7.0 (2.6 / 9.0) kW . - EER / Classe énergétique : 4.09 / A . - SEER / Classe énergétique saisonnière : 8.52 / A+++ . - COP / Classe énergétique : 5 / A . - SCOP / Classe énergétique saisonnière : 4.61 / A++ . - Puissance acoustique : 60 dB(A)  . - Hauteur x Largeur x Profondeur : 710 x 840 x 330 mm . - Poids net : 58kg . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) : R32 / 675 .  . Unité intérieure : MSZ-AP15VGK .  . - Débit d'air en froid Silence/PV/MV/GV/SGV : 210 / 234 / 276 / 330 / 384 m3/h . - Pression acoustique froid 1 m Silence/PV/MV/GV/SGV : 21 / 26 / 30 / 35 / 40 dB(A) . - Hauteur x Largeur x Profondeur : 250 x 760 x 178",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 39,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR Z DELUXE CU-5Z90TBE',
                'selling_price' => 9000,
                'description' => "PANASONIC Z DELUXE R32 . Unité extérieure : CU-5Z90TBE . - Puissance nominale (min./max.) : 4.5 à 18.3 kW . - COP : 4,84 (6,42- 3,42) . - SCOP/Classe énergétique (climat tempéré) : 4.68/A++ . - SEER/Classe énergétique : 8.5/A+++ . - Puissance acoustique extérieure : 54 dB (A) . - Dimensions de l'unité (LxHxP) : 999 x 940 x 340 mm . - Poids  :81kg . - Réfrigérant : R32 .  . Unité intérieure : Etherea -  CS-Z25TKEW . - Puissance acoustique intérieur  : 19 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  3.6 . - Dimensions de l'unité (LxHxP) : 295 x 919 x 194 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR ETHEREA Z CU-Z50XKE',
                'selling_price' => 9000,
                'description' => 'PANASONIC ETHEREA Z CU-Z50XKE . Unité extérieure : CU-Z50XKE . - Puissance calorifique  : 5.80 ( 0,98 - 8,0) kW . - Puissance frigorifique : 5,00 (0,98 - 6,00) kW . - COP : 4.14 (4,26 - 3,35) . - SCOP/Classe énergétique (climat tempéré) : 4.80/A++ . - SEER/Classe énergétique : 8.5/A+++ . - Pression sonore Chaud : 47 dB (A) . - Poids  : 40 kg . - Réfrigérant : R32 .  . Unité intérieure : Etherea Z-  CS-Z50XKEW . - Pression sonore chaud   : 44 / 37 / 30 dB (A) . - Poids net : 12 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR Z DELUXE CU-4Z80TBE',
                'selling_price' => 4000,
                'description' => "PANASONIC Z DELUXE R32 . Unité extérieure : CU-4Z80TBE . - Puissance nominale (min./max.) : 4,5 à 14,7kW . - COP : 4,63 (6,00- 3,46)  . - SCOP/Classe énergétique (climat tempéré) : 4.70/A++ . - SEER/Classe énergétique : 7.9/A++ . - Puissance acoustique extérieure : 54 dB (A) . - Dimensions de l'unité (LxHxP) : 999 x 940 x 340 mm . - Poids  :80kg . - Réfrigérant : R32 .  . Unité intérieure : Etherea -  CS-Z25TKEW . - Puissance acoustique intérieur  : 19 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  3.6 . - Dimensions de l'unité (LxHxP) : 295 x 919 x 194 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR Z DELUXE CU-4Z68TBE',
                'selling_price' => 4000,
                'description' => "PANASONIC Z DELUXE R32 . Unité extérieure : CU-4Z68TBE . - Puissance nominale (min./max.) : 4,5 à 11,5kW . - COP : 4,47 (5,17- 3,96) . - SCOP/Classe énergétique (climat tempéré) : 4.20/A+ . - SEER/Classe énergétique : 8/A++ . - Puissance acoustique extérieure : 50 dB (A) . - Dimensions de l'unité (LxHxP) : 795 x 875 x 320 mm . - Poids  : 72kg . - Réfrigérant : R32 .  . Unité intérieure : Etherea -  CS-Z25TKEW . - Puissance acoustique intérieur  : 19 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  3.6 . - Dimensions de l'unité (LxHxP) : 295 x 919 x 194 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR Z DELUXE CU-3Z68TBE',
                'selling_price' => 5000,
                'description' => "PANASONIC Z DELUXE R32 . Unité extérieure : CU-3Z68TBE . - Puissance nominale (min./max.) : 4,5 à 11,2kW . - COP : 3.95 (5,32- 3,64) . - SCOP/Classe énergétique (climat tempéré) : 4.20/A+ . - SEER/Classe énergétique : 8/A++ . - Puissance acoustique extérieure : 52 dB (A) . - Dimensions de l'unité (LxHxP) : 795 x 875 x 320 mm . - Poids  : 71kg . - Réfrigérant : R32 .  . Unité intérieure : Etherea -  CS-Z25TKEW . - Puissance acoustique intérieur  : 19 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  3.6 . - Dimensions de l'unité (LxHxP) : 295 x 919 x 194 mm",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR Z DELUXE',
                'selling_price' => 0,
                'description' => 'PAC AIR / AIR Z DELUXE R32 . Unité extérieure : CU-4Z68TBE',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 40,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 3 SORTIES AJ052TXJ3KG/EU 3',
                'selling_price' => 5000,
                'description' => 'GE MULTI SPLIT SAMSUNG 3 SORTIES AJ052TXJ3KG/EU 3 PAC AIR AIR MONOPHASE  . - SEER : 8.541- COP : 4.77 / SCOP : 4.6  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 800 x 638 x 310 / Poids : 44.5 kg  . - Niveau de puissance sonore UE à 1 mètre : 48 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 2 SORTIES AJ040TXJ2KG/EU 2',
                'selling_price' => 5000,
                'description' => 'GE MULTI SPLIT SAMSUNG 2 SORTIES AJ040TXJ2KG/EU 2 PAC AIR AIR MONOPHASE  . - SEER : 8.54 - COP : 4.64 / SCOP : 4.6  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 790 x 548 x 285 / Poids : 32 kg  . - Niveau de puissance sonore UE à 1 mètre : 46 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 2 SORTIES AJ050TXJ2KG/EU 2',
                'selling_price' => 5000,
                'description' => 'GE MULTI SPLIT SAMSUNG 2 SORTIES AJ050TXJ2KG/EU 2 PAC AIR AIR MONOPHASE  . - SEER : 8.54 - COP : 4.38 / SCOP : 4.64  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 790 x 548 x 285 / Poids : 33 kg  . - Niveau de puissance sonore UE à 1 mètre : 47 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 3 SORTIES AJ068TXJ3KG/EU 3',
                'selling_price' => 5000,
                'description' => 'GE MULTI SPLIT SAMSUNG 3 SORTIES AJ052TXJ3KG/EU 3 PAC AIR AIR MONOPHASE  . - SEER : 7.75- COP : 4.42 / SCOP : 4.32  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 880 x 798 x 310 / Poids : 57.5 kg  . - Niveau de puissance sonore UE à 1 mètre : 49 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 5 SORTIES AJ100TXJ5KG/EU 5',
                'selling_price' => 2000,
                'description' => 'GE MULTI SPLIT SAMSUNG 5 SORTIES AJ100TXJ5KG/EU 5 PAC AIR AIR MONOPHASE  . - SEER : 8 - COP : 4.26 / SCOP : 4.32  . - Fluide frigorigène : R32 - Dimensions UE : (H x L x P) mm : 940 x 998 x 330 / Poids : 76.5 kg  . - Niveau de puissance sonore UE à 1 mètre : 54 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 09 AR09TXFYAWKXEU',
                'selling_price' => 5000,
                'description' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 09 AR09TXFYAWKXEU PAC AIR AIR MONOPHASE  . - Puissance calorifique 7°C : 3,2 KW  . - Puissance calorifique (Min / Max) : 0.9 / 4.5 KW  . - Puissance Froid nominale : 2,5 KW  . - Puissance Froid (Min / Max) : 0.9 / 3.4 KW . - SEER : 6.7 - COP : 3.81 / SCOP : 4  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 660 x 475 x 242 / Poids : 22.6 kg  . - Niveau de puissance sonore UE à 1 mètre : 46 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 24 AR24TXFYAWKXEU',
                'selling_price' => 5000,
                'description' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 24 AR24TXFYAWKXEU PAC AIR AIR MONOPHASE  . - Puissance calorifique 7°C : 7.4 KW  . - Puissance calorifique (Min / Max) : 1.2 / 9.4 KW  . - Puissance Froid nominale : 6.5 KW  . - Puissance Froid (Min / Max) : 1.4 / 7.6 KW  . - SEER : 6.4 - COP : 3.15 / SCOP : 4  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 800 x 668 x 310 / Poids : 43.50 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 12 AR12TXFYAWKXEU',
                'selling_price' => 5000,
                'description' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 12 AR12TXFYAWKXEU PAC AIR AIR MONOPHASE  . - Puissance calorifique 7°C : 3,5 KW  . - Puissance calorifique (Min / Max) : 0.9 / 5 KW  . - Puissance Froid nominale : 3,5 KW  . - Puissance Froid (Min / Max) : 0.9 / 4 KW  . - SEER : 6.5 - COP : 3.72 / SCOP : 4  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 660 x 475 x 242 / Poids : 22.6 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 18 AR18TXFYAWKXEU',
                'selling_price' => 5000,
                'description' => 'GE MONO SPLIT SAMSUNG GAMME CEBU 18 AR18TXFYAWKXEU PAC AIR AIR MONOPHASE  . - Puissance calorifique 7°C : 6 KW  . - Puissance calorifique (Min / Max) : 1.3 / 8 KW  . - Puissance Froid nominale : 5 KW  . - Puissance Froid (Min / Max) : 1.6 / 6.67 KW  . - SEER : 6.8 - COP : 3.53 / SCOP : 3.8  . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 800 x 668 x 310 / Poids : 39.5 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'GE MULTI SPLIT SAMSUNG 4 SORTIES AJ080TXJ4KG/EU 4',
                'selling_price' => 5000,
                'description' => 'GE MULTI SPLIT SAMSUNG 4 SORTIES AJ080TXJ4KG/EU 4 PAC AIR AIR MONOPHASE  . - SEER : 7.75- COP : 4.37 / SCOP : 4.10 . - Fluide frigorigène : R32  . - Dimensions UE : (H x L x P) mm : 880 x 798 x 310 / Poids : 57.5 kg  . - Niveau de puissance sonore UE à 1 mètre : 50 dB',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 48,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'VIVAIR  SDH20-025NW MONOSPLIT',
                'selling_price' => 5000,
                'description' => 'MARQUE : SAUNIER DUVAL . - Référence : VIVAIR  SDH20-025NW MONOSPLIT . - Efficacité énergétique chauffage climat tempéré / SCOP :  A++ / 4,6 . - Efficacité énergétique rafraîchissement / SEER :  A+++ / 8,5 . - Puissance nominale / maximale kW  : 2,9 / 4,4 . - Coefficient de performance (COP) : 5,7 . La puissance nominale et le coefficient de performance saisonnier sont déterminés  . selon le règlement n°206/2012 de la commission du 6 mars 2012.  . - Coefficient de performance (EER)(1) - 4,6 . - Plage de fonctionnement en mode chauffage °C  : -15 / 24 . - Type de compresseur Rotatif DC inverter . -  Fluide frigorigène : R32 . - Alimentation électrique : V / Hz 220-240 / 50 . - Puissance acoustique dB (A)  : 60 . - Poids net kg : 33,5 . - Dimensions (hauteur / largeur / profondeur) mm : 596 / 848 / 320 . Unités intérieures : SDH20-025 NWI . - Poids net kg  : 10,5  . - Dimensions (hauteur / largeur / profondeur ) mm : 290 / 865 / 210',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 49,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR THERMOR NISEKO MULTI-SPLIT E4U85LV2-NG/NS',
                'selling_price' => 9000,
                'description' => "Pompe à chaleur Air / Air gamme multisplit . Unité extérieure : E4U85LV2-NG/NS . - Puissance nominale froid :  8?500 (3?200?/?9?500)W . - Puissance nominale chaud : 9?600 (4?400?/?10?500) W . - SCOP : 4.0 . - COP : 4.0 . - Classe énergétique (froid/chaud) : A++/A+ . - EER / SEER : 3.4 / 7.0  . - Pression acoustique UE (dB(A)) : 65 dB (A) . - Puissance acoustique UE (dB(A))  : 68 dB (A) . - Dimensions de l'unité (LxHxP) : 700?x?890?x?340 mm . - Poids  : 61kg . - Type de réfrigérant (PRG): R32 (675) .  . Unité intérieure compatible NAGANO MURALE Pure et NAGANO MURALE et NAGANO CASSETTE .  . Unité intérieure : IM26-NS / E1U26L-NS .  . - P. frigorifique (min/max) (W) : 2600 (800?/?3000) . - P. calorifique nominale (min/max) (W) : 2800 (800?/?3200) . - Pression acoustique UI Silence/PV/MV/GV (dB(A))* : 20?/?28?/?32?/?37  . - Puissance acoustique UI (dB(A)) : 54 . - Pression acoustique UE (dB(A))?* : 49 . - Puissance acoustique UE (dB(A)) : 62 . - Dimension UI (mm) : 290?x?805?x?200 . - Dimension UE (mm) : 544?x?700?x?245",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR THERMOR NISEKO MULTI-SPLIT E2U50LV2-NG/NS',
                'selling_price' => 6000,
                'description' => "Pompe à chaleur Air / Air gamme multisplit . Unité extérieure : E2U50LV2-NG/NS . - Puissance nominale froid :  5?000 (1?300?/?6?000) W . - Puissance nominale chaud : 5?200 (1?800?/?6?600) W . - SCOP : 4.0 . - COP : 3.71 . - Classe énergétique (froid/chaud) : A++/A+ . - EER / SEER : 3,45/6,50 . - Pression acoustique UE (dB(A)) : 53 dB (A) . - Puissance acoustique UE (dB(A))  : 63 dB (A) . - Dimensions de l'unité (LxHxP) : 553?x?800?x?275 mm . - Poids  : 36 kg . - Type de réfrigérant (PRG): R32 (675) .  . Unité intérieure compatible NAGANO MURALE Pure et NAGANO MURALE et NAGANO CONSOLE ET NAGANO CASSETTE .  . Unité intérieure : IM26-NS / E1U26L-NS .  . - P. frigorifique (min/max) (W) : 2600 (800?/?3000) . - P. calorifique nominale (min/max) (W) : 2800 (800?/?3200) . - Pression acoustique UI Silence/PV/MV/GV (dB(A))* : 20?/?28?/?32?/?37  . - Puissance acoustique UI (dB(A)) : 54 . - Pression acoustique UE (dB(A))?* : 49 . - Puissance acoustique UE (dB(A)) : 62 . - Dimension UI (mm) : 290?x?805?x?200 . - Dimension UE (mm) : 544?x?700?x?245",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'PAC AIR / AIR THERMOR NISEKO MULTI-SPLIT E3U70LV2-NG/NS',
                'selling_price' => 6000,
                'description' => "Pompe à chaleur Air / Air gamme multisplit . Unité extérieure : E3U70LV2-NG/NS . - Puissance nominale froid :  7 000 (2 400?/?7 600) W . - Puissance nominale chaud : 7 600 (2 900?/?8 500) W . - SCOP : 4.2 . - COP : 3.1 . - Classe énergétique (froid/chaud) : A++/A+ . - EER / SEER : 3,8/7,5 . - Pression acoustique UE (dB(A)) : 53 dB (A) . - Puissance acoustique UE (dB(A))  : 66 dB (A) . - Dimensions de l'unité (LxHxP) : 700??x?890?x?340 mm . - Poids  : 54 kg . - Type de réfrigérant (PRG): R32 (675) .  . Unité intérieure compatible NAGANO MURALE Pure et NAGANO MURALE et NAGANO CONSOLE ET NAGANO CASSETTE .  . Unité intérieure : IM26-NS / E1U26L-NS .  . - P. frigorifique (min/max) (W) : 2600 (800?/?3000) . - P. calorifique nominale (min/max) (W) : 2800 (800?/?3200) . - Pression acoustique UI Silence/PV/MV/GV (dB(A))* : 20?/?28?/?32?/?37  . - Puissance acoustique UI (dB(A)) : 54 . - Pression acoustique UE (dB(A))?* : 49 . - Puissance acoustique UE (dB(A)) : 62 . - Dimension UI (mm) : 290?x?805?x?200 . - Dimension UE (mm) : 544?x?700?x?245",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'TRI-SPLITS  3M26U2AVG-E',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA /  3M26U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 7,5 . - Puissance absorbée nominale kW : 2,00 . - SEER : 6,19 . - SCOP : 4.44 . - COP :4,09 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 48 . - Niveau de puissance sonore dB(A) : 63 . - Débit d'air m³/h : 2507 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 890 x 900 x 320 .  - Poids net/Poids avec l'emballage kg : 72 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE  . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16, taille 18, taille 22, taille 24",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'BI-SPLITS  2M14U2AVG-E 4.0KW',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA /2M14U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 4,0 . - Puissance absorbée nominale kW : 0,92 . - SEER : 6,73 . - SCOP : 4,6 . - COP : 4,94 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 45 . - Niveau de puissance sonore dB(A) : 58 . - Débit d'air m³/h : 1863 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 630 x 800 x 300 .  - Poids net/Poids avec l'emballage kg : 43 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE : . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'QUADRI-SPLITS 4M27U2AVG-E 54M27U2AVG-E 5',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA / 4M27U2AVG-E 5 . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 8,0 . - Puissance absorbée nominale kW : 2,29 . - SEER : 6,11 . - SCOP : 4,26 . - COP :4,67 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 48 . - Niveau de puissance sonore dB(A) : 63 . - Débit d'air m³/h : 2507 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 890 x 900 x 320 .  - Poids net/Poids avec l'emballage kg : 72 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE  . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16, taille 18, taille 22, taille 24",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'BI-SPLITS 2M18U2AVG-E',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE :  TOSHIBA / 2M18U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 5,2 . - Puissance absorbée nominale kW : 1,34 . - SEER : 6,9 . - SCOP : 4,6 . - COP : 4,1 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 47 . - Niveau de puissance sonore dB(A) :  60 . - Débit d'air m³/h :  2038 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 630 x 800 x 300 .  - Poids net/Poids avec l'emballage kg :  45 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE  . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16,",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'BI-SPLITS 2M10U2AVG-E 3,3KW',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA / RAS- 2M10U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 3,3 . - Puissance absorbée nominale kW : 0,76 . - SEER : 6,73 . - SCOP : 4,6 . - COP : 4,94 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 45 . - Niveau de puissance sonore dB(A) : 58 . - Débit d'air m³/h : 1863 . - Type de compresseur : DC Single Rotary . - Dimensions de l'unité (LxHxP) mm : 630 x 800 x 300 .  - Poids net/Poids avec l'emballage kg : 38 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE COMPATIBLE : . - taille 5 ,taille 7 ,taille 10,",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'TRI-SPLITS  3M18U2AVG-E',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA / 3M18U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 5,2 . - Puissance absorbée nominale kW : 1,17 . - SEER : 6,8 . - SCOP : 4,6 . - COP : 4.3 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 49 . - Niveau de puissance sonore dB(A) : 62 . - Débit d'air m³/h : 2107 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 630 x 800 x 300 .  - Poids net/Poids avec l'emballage kg : 46 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE  . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16,",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            [
                'designation' => 'QUINTI SPLITS 5M34U2AVG-E',
                'selling_price' => 6000,
                'description' => "MARQUE / REFERENCE : TOSHIBA /5-POSTES 5M34U2AVG-E . UNITÉ EXTÉRIEURE :  . - Puissance froids kW : 10 . - Puissance absorbée nominale kW : 2,98 . - SEER : 6,31 . - SCOP : 4,08 . - COP :4,24 . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Niveau de pression sonore à 1 m dB(A) : 52 . - Niveau de puissance sonore dB(A) : 66 . - Débit d'air m³/h : 3245 . - Type de compresseur : DC Twin-Rotary . - Dimensions de l'unité (LxHxP) mm : 890 x 900 x 320 .  - Poids net/Poids avec l'emballage kg : 78 . - ALIMENTATION Phase/Tension/Fréquence :  220/240-1-50 . - Réfrigérant : R32 . - Label énergétique : A++ . UNITE INTERIEURE  . - taille 5 ,taille 7 ,taille 10, taille 13, taille 16, taille 18, taille 22, taille 24",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 1,
            ],
            // ballon thermo

            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE TFHW ELEO 190 L',
                'selling_price' => 4000,
                'description' => "Unité intérieure : TFHW-190H-03M25 . AIR +7°C EAU 10/55°C : . - Puissance calorifique kW : 1.25 . - Puissance absorbée totale kW : 0.40 . - COP : 3.15 . PERFORMANCES (CLIMAT TEMPÉRÉ) . - Profil ECS : M . - Classe énergétique : A++ . - Efficacité énergétique %  : 139 . - COP : 3.21 . - Durée de chauffe: 05h34 . - Consommation en veille W : 26 . - Température d'eau chaude de référence °C : 52 . - Eau mitigée à 40°C : 277 . PERFORMANCES (CLIMAT CHAUD) . - Efficacité énergétique % : 153 . Réfrigérant/PRP : R134a/1430 . Puissance acoustique. dB(A) : 59 . Phase/Tension/Fréquence : 1P/220-240/50Hz . Poids net/Poids brut : 69/80 . Dimensions (HxØ) : 1690x568",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE TFHW ELEO 260 L',
                'selling_price' => 4000,
                'description' => "Unité intérieure : TFHW-260H-03M25 . AIR +7°C EAU 10/55°C : . - Puissance calorifique kW : 1.25 . - Puissance absorbée totale kW : 0.40 . - COP : 3.15 . PERFORMANCES (CLIMAT TEMPÉRÉ) . - Profil ECS : XL . - Classe énergétique : A . - Efficacité énergétique %  : 101 . - COP : 2.41 . - Durée de chauffe: 12H02 . - Consommation en veille W : 70 . - Température d'eau chaude de référence °C : 59.5 . - Eau mitigée à 40°C : 378 . PERFORMANCES (CLIMAT CHAUD) . - Efficacité énergétique % : 120 . Réfrigérant/PRP : R134a/1430 . Puissance acoustique. dB(A) : 59 . Phase/Tension/Fréquence : 1P/220-240/50Hz . Poids net/Poids brut : 76/90 . Dimensions (HxØ) : 1950x568",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE TFHW ELEO 260 L',
                'selling_price' => 1000,
                'description' => "Unité intérieure : TFHW-260H-03M25 . AIR +7°C EAU 10/55°C : . - Puissance calorifique kW : 1.25 . - Puissance absorbée totale kW : 0.40 . - COP : 3.15 . PERFORMANCES (CLIMAT TEMPÉRÉ) . - Profil ECS : XL . - Classe énergétique : A . - Efficacité énergétique %  : 101 . - COP : 2.41 . - Durée de chauffe: 12h02 . - Consommation en veille W : 70 . - Température d'eau chaude de référence °C : 59.5 . - Eau mitigée à 40°C : 378 . PERFORMANCES (CLIMAT CHAUD) . - Efficacité énergétique % : 120 . Réfrigérant/PRP : R134a/1430 . Puissance acoustique. dB(A) : 59 . Phase/Tension/Fréquence : 1P/220-240/50Hz . Poids net/Poids brut : 76/90 . Dimensions (HxØ) : 1950x568",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU TDF ELEO AW-TDF190-H31',
                'selling_price' => 4000,
                'description' => "MARQUE : AIRWELL  / MODELE : TDF ELEO AW-TDF190-H31 . AIR +7°C EAU 10/55°C . - Puissance calorifique kW : 1,362  . - Puissance absorbée totale kW : 0,423  . - COP : 3,22  . PERFORMANCES (CLIMAT TEMPÉRÉ) . - Profil ECS : L  . - Classe énergétique : A+  . - Efficacité énergétique % : 115,0  . - COP : 2,76  . - Durée de chauffe h:mm : 7:01  . - Consommation en veille W : 26,3  . - Température d'eau chaude de référence °C : 53,8  . - Eau mitigée à 40 ° C l : 234  . - Phase/Tension/Fréquence : 1P/220-240/50Hz . Performances::Puissance acoustique dB(A) : 51 . Selon les conditions de la norme EN 16147.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU TDF ELEO AW-TDF300-H31',
                'selling_price' => 4000,
                'description' => "MARQUE : AIRWELL  / MODELE : TDF ELEO AW-TDF300-H31 . AIR +7°C EAU 10/55°C . - Puissance calorifique kW : 1,814  . - Puissance absorbée totale kW :  0,519  . - COP :  3,49  . PERFORMANCES (CLIMAT TEMPÉRÉ) . - Profil ECS : XL  . - Classe énergétique : A+  . - Efficacité énergétique % :  123,0  . - COP :  3,01  . - Durée de chauffe h:mm :  7:49  . - Consommation en veille W :  30,6  . - Température d'eau chaude de référence °C :  53,1  . - Eau mitigée à 40 ° C l : 354  . - Phase/Tension/Fréquence : 1P/220-240/50Hz . - Performances::Puissance acoustique dB(A) : 53 . - Dimensions de l'emballage (LxHxP) mm 775x2200x745 . - Poids net kg : 114  . Selon les conditions de la norme EN 16147.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 2,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CONCERTO 200L',
                'selling_price' => 1800,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . Altech récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Longueur 600 mm  . - Largeur 629 mm . - Hauteur 1.692 m . - Diamètre 600 mm . - Poids 96 kg . - Teinte BLANC . - COP : 3,02 . - Durée de la garantie 2ans PCE 3ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage L . - volume du réservoir 195 . - Pression en bar 7 . - Combustible Eléctricité . - Temps de chauffe en heure et mn 4h15 . - Consommation énergie par an kWh/an 807 . - Puissance acoustique intérieur dB(A) 57 . - Code douane SH8 85161080 . - Nature du gaz R134A-1,1,1,2-TÉTRAFLUOROÉTHANE . - Quantité du gaz (g) 900 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 4,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CONCERTO 250L',
                'selling_price' => 6500,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . Altech récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Longueur 600 mm  . - Largeur 629 mm . - Hauteur 1.987 m . - Diamètre 600 mm . - Poids 96 kg . - Teinte BLANC . - COP : 3,13 . - Durée de la garantie 2ans PCE 3ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage L . - Contenance ECS en litre 200 . - Pression en bar 7 . - Combustible Eléctricité . - Temps de chauffe en heure et mn 6h19 . - Consommation énergie par an kWh/an 816 . - Puissance acoustique intérieur dB(A) 58 . - Code douane SH8 85161080 . - Nature du gaz R134A-1,1,1,2-TÉTRAFLUOROÉTHANE . - Quantité du gaz (g) 900 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 4,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  ARISTON - NUOS EVO A+ WH 110L - 3629057',
                'selling_price' => 3000,
                'description' => "MARQUE : ARISTON - NUOS EVO A+ WH 110L - 3629057 . - Capacité : 110l  . - Profil de soutirage : M . - COP à 7°C : 2,50 ( Evalué selon la norme EN 16147 ) . - Puissance de la résistance (W) : 1200 . - Température de fonctionnement : -5/+42 . -  RENDEMENT ENERGETIQUE Eta wh : 103,8% . - Pression acoustique (dB) : 50 . - Hauteur  : 1398 mm . - Diamètre : 535 mm . - Poids à vide : 55 kg . - Classe d'efficacité énergétique : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE NUOS PRIMO HC 200 L',
                'selling_price' => 0,
                'description' => "LE CHAUFFE-EAU THERMODYNAMIQUE NUOS PRIMO HC 200 PERFORMANT ET ÉCONOMIQUE, IDÉAL POUR VOS PROJETS DE RÉNOVATION. . Référence commerciale : 3069653 . - Capacité :  200 . - Classe d'efficacité énergétique pour le chauffage de l'eau : A . - COP à 7 °C : 2.71 . - Temps de chauffe :  6h19 . - Profil de soutirage déclaré : L . - Confort sanitaire - volume d'eau chaude à 40°C:   265L . - Protection anticorrosion : Anode titane à courant imposé modulant + anode magnésium . - Raccordement eau : ¾ . - Résistance électrique de secours : 2000 W . - Poids : 87 Kg . - Plage de fonctionnement : -5 à +42°C . - Fluide frigorigène : R134A / 95Kg . - Niveau puissance acoustique à l'intérieur : 53 dB(A) . - Tension : 220-230 V Monophasé . - Garantie 5 ans cuve et 2 ans pièces",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ARISTON AQUANEXT SPLIT FLEX 200L',
                'selling_price' => 4000,
                'description' => "MARQUE : ARISTON  AQUANEXT SPLIT FLEX 200L REF 3069499 . - Installation du ballon  MURAL . - Volume d'eau chaude à 40°C : 305 l . - Temps de chauffe : 4h42 . - Résistance électrique de secours Stéatite 1500W + 1000W . - Protection anti-corrosion du ballon Anode permanente en titane + anode temporaire magnésium . - Plage de fonctionnement - 7 à 42°C . - COP EN 16147 à 7°C : 2,64 . - Classe énergétique pour le chauffage de l'eau :  A . Profilage de soutirage déclaré :  L . - Dimensions de l'unité intérieure  Ø : 560 mm - H : 1520 mm . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ARISTON - NUOS PLUS 200L - 3079052',
                'selling_price' => 0,
                'description' => "MARQUE : ARISTON - NUOS PLUS 200L - 3079052 . - Capacité : 200l . - Profil de soutirage : XL . - COP à 7°C : 3,05  ( Evalué selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 130% . - Puissance de la résistance (W) : 1500 + 1000 . - Température de fonctionnement : -7/+42 . - Pression acoustique (dB) : 55 . - Hauteur : 1997 mm . - Diamètre : 680 mm . - Poids à vide : 90 kg . - Classe d'efficacité énergétique : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ARISTON AQUANEXT SPLIT FLEX 150L',
                'selling_price' => 4000,
                'description' => "MARQUE : ARISTON  AQUANEXT SPLIT FLEX 150L  REF 3069498 . - Installation du ballon Au MURAL . - Volume d'eau chaude à 40°C : 229 l . - Temps de chauffe : 3h20 . - Résistance électrique de secours Stéatite 1500W + 1000W . - Protection anti-corrosion du ballon Anode permanente en titane + anode temporaire magnésium . - Plage de fonctionnement - 7 à 42°C . - COP EN 16147 à 7°C : 2,65 . - Classe énergétique pour le chauffage de l'eau :  A . Profilage de soutirage déclaré :  L . - Dimensions de l'unité intérieure  Ø : 560 mm - H : 1200 mm . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  ARISTON - NUOS EVO A+ WH 150L - 3629074',
                'selling_price' => 0,
                'description' => "MARQUE : ARISTON - NUOS EVO A+ WH 150L - 3629074 . - Capacité : 147l . - Profil de soutirage : L . - COP à 7°C : 2,90 ( Evalué selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 119,3 % . - Puissance de la résistance (W) : 1200 . - Température de fonctionnement : -5/+42 . - Pression acoustique (dB) : 50 . - Hauteur : 1398 mm . - Diamètre : 535 mm . - Poids à vide : 61 kg . - Classe d'efficacité énergétique : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  ARISTON - NUOS PLUS 250L - 3079053',
                'selling_price' => 0,
                'description' => "MARQUE : ARISTON - NUOS PLUS 250L - 3079053 . - Capacité : 250l . - Profil de soutirage : XL . - COP à 7°C : 3,35 ( Evalué selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 138% . - Puissance de la résistance (W) : 1500 + 1000 . - Température de fonctionnement : -7/+42 . - Pression acoustique (dB) : 55 . - Hauteur : 1997 mm . - Diamètre : 680 mm . - Poids à vide : 95 kg . - Classe d'efficacité énergétique : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ARISTON AQUANEXT SPLIT FLEX 270L',
                'selling_price' => 4000,
                'description' => "MARQUE : ARISTON  AQUANEXT SPLIT FLEX 270L REF 3069500 . - Installation du ballon Au sol . - Volume d'eau chaude à 40°C : 414 l . - Temps de chauffe : 5h59 . - Résistance électrique de secours Stéatite 1500W + 1000W . - Protection anti-corrosion du ballon Anode permanente en titane + anode temporaire magnésium . - Plage de fonctionnement - 7 à 42°C . - COP EN 16147 à 7°C : 2,85 . - Classe énergétique pour le chauffage de l'eau :  A . Profilage de soutirage déclaré :  XL . - Dimensions de l'unité intérieure  Ø : 600 mm - H : 1650 mm . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'NUOS PRIMO HC 240 - 3069654',
                'selling_price' => 3000,
                'description' => "MARQUE : ARISTON - NUOS PRIMO HC 240 - 3069654 . - Capacité : 244l . - Profil de soutirage : XL . - COP à 7°C : 2,86 ( Evalué selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 117,6% . - Puissance de la résistance (W) : 2000 . - Température de fonctionnement : -5/+42 . - Pression acoustique (dB) : 53 . - Hauteur : 1706 mm . - Diamètre : 614 mm . - Poids à vide : 92 kg . - Classe d'efficacité énergétique : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'NUOS PRIMO HC 200L - 3069653',
                'selling_price' => 3000,
                'description' => "MARQUE :  ARISTON - NUOS PRIMO HC 200L - 3069653 . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 2,71  ( Evalué selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 112,3% . - Puissance de la résistance (W) : 2000 . - Température de fonctionnement : -5/+42 . - Pression acoustique (dB) : 53 . - Hauteur : 1706 mm . - Diamètre : 614 mm . - Poids à vide : 87 kg . - Classe d'efficacité énergétique : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 5,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ATLANTIC EXPLORER 200 L',
                'selling_price' => 6000,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . ATLANTIC récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Longueur 600 mm  . - Largeur 600 mm . - Hauteur 1.62 m . - Poids 80 kg . - Teinte BLANC . - COP : 2.8 . - Durée de la garantie 5ans PCE 3ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage L . - Contenance ECS en litre 200 . - Pression en bar 8 . - Combustible Electricité . - Temps de chauffe en heure et mn 7h52 . - Consommation énergie par an kWh/an 807 . - Puissance acoustique intérieur dB(A) 53 . - Code douane SH8 85161080 . - Nature du gaz R513A-Tétrafluoroéthane . - Quantité du gaz (g) 750 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+ . - Protection ACI Hybride anti-corrosion",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ATLANTIC EXPLORER 270 L',
                'selling_price' => 6500,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . ATLANTIC récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Dimension : 1957 x 620 x 665 . - Poids 92 kg . - Teinte BLANC . - COP : 3.2 . - Durée de la garantie 5ans PCE 3ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage XL . - Contenance ECS en litre 270 . - Pression en bar 8 . - Combustible Electricité . - Temps de chauffe en heure et mn 10h49 . - Consommation énergie par an kWh/an 807 . - Puissance acoustique intérieur dB(A) 53 . - Code douane SH8 85161080 . - Nature du gaz R513A-Tétrafluoroéthane . - Quantité du gaz (g) 750 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+ . - Protection ACI Hybride anti-corrosion",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ATLANTIC VERSION 4 ( 200L)',
                'selling_price' => 0,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . ATLANTIC récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Dimension : 1617 x 620 x 665 . - Poids 80 kg . - Teinte BLANC . - COP à +7° : 2.79 . - Durée de la garantie 5ans PCE 3ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage L . - Contenance ECS en litre 200 . - Combustible Electricité . - Temps de chauffe de 15 à 55°C (air à 7°C) TBC . - Puissance acoustique intérieur dB(A) 53 . - Code douane SH8 85161080 . - Nature du gaz R513A . - Quantité du gaz (g) 800 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ATLANTIC VERSION 4 ( 270L)',
                'selling_price' => 0,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . ATLANTIC récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Dimension : 1617 x 620 x 665 . - Poids 92 kg . - Teinte BLANC . - COP à +7° : 3.16 . - Durée de la garantie 5ans PCE 3 ans compresseur 5ans cuve . - Tension en volts Monophasé (230) . - Profil de soutirage XL . - Contenance ECS en litre 270 . - Combustible Electricité . - Temps de chauffe de 15 à 55°C (air à 7°C) TBC . - Puissance acoustique intérieur dB(A) 53 . - Code douane SH8 85161080 . - Nature du gaz R513A . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'EGEO - 270L',
                'selling_price' => 3000,
                'description' => "MARQUE : ATLANTIC - EGEO - 270L . - Capacité : 270l . - Profil de soutirage : L . - COP à 7°C : 3,39 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Etas :  % . - Puissance de la résistance (W) : 2980 . - Plage de température d'utilisation de la pompe à chaleur °C : +5 à +35 . - Pression acoustique (dB) : 57 . -Dimensions (Hauteur x Largeur x Profondeur) mm :  1859 x 615 x 646 . - Poids à vide : 91 kg . - Classe d'efficacité énergétique : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CALYPSO 250L',
                'selling_price' => 3000,
                'description' => "Marque Atlantic | Modèle : Calypso monobloc .  . LES CHAUFFE-EAU CALYPSO CONNECTÉS SONT PILOTABLES À DISTANCE GRÂCE À L'APPLICATION COZYTOUCH D'ATLANTIC .  . - CAPACITÉ (L) : 250 . - PUISSANCE TOTALE ABSORBÉE (W) : 2450 . - PLAGE DE TEMPÉRATURE D'UTILISATION DE LA PAC : - 5 °C à + 43 °C . - PUISSANCE RÉSISTANCE (W) : 1800 . - COP : 3.11 . - TEMPS DE CHAUFFE : 9h31 . - DIMENSIONS H X L X P : 1 929 x 602 x 691 . Type d'installation : autres type d'installation . - PUISSANCE ACOUSTIQUE(dB(A) : 50 . - POIDS À VIDE (kg) : 95 . - FLUIDE FRIGORIGÈNE : R513a . - CODE : 286041 . - CLASSE ENERGETIQUE : A+ . GARANTIE 5 ANS CUVE ET PIECES  .  . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'EGEO - 200L',
                'selling_price' => 3000,
                'description' => "MARQUE : ATLANTIC - EGEO - 200L . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 2,95 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Etas : 124 % . - Puissance de la résistance (W) : 2380 . - Plage de température d'utilisation de la pompe à chaleur °C : +5 à +35 . - Pression acoustique (dB) : 57 . -Dimensions (Hauteur x Largeur x Profondeur) mm :  1519 x 615 x 646 . - Poids à vide : 84 kg . - Classe d'efficacité énergétique : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE Calypso Monobloc 200L',
                'selling_price' => 3000,
                'description' => "Marque Atlantic | Modèle : Calypso monobloc . Caractéristiques : Capacité (L) : 200 litres  . Type d'installation : autres type d'installation . Cycle de soutirage : L  . Performance énergétique (ETAS) : > 100% . COP : 3,18 . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CALYPSO CONNECTE SUR SOCLE 200L - 286040',
                'selling_price' => 1500,
                'description' => "MARQUE : ATLANTIC   . MODELE : CALYPSO CONNECTE SUR SOCLE 200L - 286040 . - CAPACITÉ  (L) : 200   . - PUISSANCE TOTALE ABSORBÉE (W) : 2450 . - PLAGE DE  TEMPÉRATURE  D'UTILISATION  DE LA PAC : -5 à + 43 . - PUISSANCE RÉSISTANCE (W) :  1 800 . COP SELON EN 16147 :  3,18  /  Cycle de soutirage L . - V40td PERMANENT 8H + 6H  (L) / HC 8H : 306 / PERMANENT 8H + 6H : 593 . - TEMPS DE CHAUFFE :  7h13  . - DIMENSIONS  H X L X P :  1689 x 602 x 691 . - PUISSANCE ACOUSTIQUE  (DB(A)) : 50 . - POIDS À VIDE (kg) : 82 . - FLUIDE  FRIGORIGÈNE : R134a",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CALYPSO CONNECTE SUR SOCLE 250L',
                'selling_price' => 1500,
                'description' => "MARQUE ET REFERENCE : ATLANTIC / CALYPSO CONNECTE SUR SOCLE 250L . - CAPACITÉ  (L) : 250   . - PUISSANCE TOTALE ABSORBÉE (W) : 2450 . - PLAGE DE  TEMPÉRATURE  D'UTILISATION  DE LA PAC : -5 à + 43 . - PUISSANCE RÉSISTANCE (W) :  1 800 . COP SELON EN 16147 :  3,11  /  Cycle de soutirage L . - V40td PERMANENT 8H + 6H  (L) / HC 8H : 374 / PERMANENT 8H + 6H : 654 . - TEMPS DE CHAUFFE :    9h19  . - DIMENSIONS  H X L X P : 1929 x 602 x 691 . - PUISSANCE ACOUSTIQUE  (DB(A)) : 50 . - POIDS À VIDE (kg) : 92 . - FLUIDE  FRIGORIGÈNE : R134a",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CALYPSO CONNECTE MURAL 150 L',
                'selling_price' => 1500,
                'description' => "MARQUE ET REFERENCE : ATLANTIC / CALYPSO CONNECTE MURAL 150L . - CAPACITÉ  (L) : 150  . - PUISSANCE TOTALE ABSORBÉE (W) : 2 150 . - PLAGE DE  TEMPÉRATURE  D'UTILISATION  DE LA PAC : -5 à + 43 . - PUISSANCE RÉSISTANCE (W) :  1 800 . COP SELON EN 16147 : 2,94 /  Cycle de soutirage L . - V40td PERMANENT 8H + 6H  (L) :  318  . - TEMPS DE CHAUFFE :   11h21 . - DIMENSIONS  H X L X P : 1557 x 522 x 538 . - PUISSANCE ACOUSTIQUE  (DB(A)) : 45 . - POIDS À VIDE (kg) : 66 . - FLUIDE  FRIGORIGÈNE : R134a",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CALYPSO SPLIT INVERTER VM 200L',
                'selling_price' => 3000,
                'description' => "Marque : ATLANTIC | Modèle : Calypso Split Inverter VM 200L (Vertical Mural) . Caractéristiques : Capacité (L) : 200 litres  . Type d'installation : autres type d'installation . Cycle de sous-tirage : L . Performance énergétique : > 100% . COP (à 7°) : 3,09 . FLUIDE FRIGORIGÈNE  : R410A . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CALYPSO CONNECTE MURAL 100 L',
                'selling_price' => 1500,
                'description' => "MARQUE ET REFERENCE : ATLANTIC / CALYPSO CONNECTE MURAL 100L . - CAPACITÉ  (L) : 100 . - PUISSANCE TOTALE ABSORBÉE (W) : 1 550 . - PLAGE DE  TEMPÉRATURE  D'UTILISATION  DE LA PAC : -5 à + 43 . - PUISSANCE RÉSISTANCE (W) :  1 200 . COP SELON EN 16147 : 2,47 /  Cycle de soutirage M . - V40td PERMANENT 8H + 6H  (L) : 289 . - TEMPS DE CHAUFFE : 7h27 . - DIMENSIONS  H X L X P : 1234 x 522 x 538  . - PUISSANCE ACOUSTIQUE  (DB(A)) : 45 . - POIDS À VIDE (kg) : 57 . - FLUIDE  FRIGORIGÈNE : R134a",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CALYPSO SPLIT INVERTER VS 270L',
                'selling_price' => 3000,
                'description' => "Marque : ATLANTIC | Modèle : Calypso Split Inverter VS 270L . Caractéristiques : Capacité (L) : 270 litres  . Type d'installation : autres type d'installation . Cycle de sous-tirage : XL . Performance énergétique : > 110% . COP (à 7°) : 3,24 . FLUIDE FRIGORIGÈNE  : R410A . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'EFFIE 350 E-BG',
                'selling_price' => 3000,
                'description' => '- MARQUE : BOURGEOIS  . - MODÈLE : 350 SUR AIR EXTRAIT . - REFERENCE : EFFIE 350 E-BG . - CAPACITÉ : 280L  (350 L MIX) . - COP (+15°C) : 3,6 (selon la norme EN 16147) . - PROFIL DE SOUTIRAGE : XL . - RENDEMENT ENERGETIQUE  Eta wh : 125 % . - EFFICACITE EN',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 9,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'EFFIE 190 E-BG',
                'selling_price' => 3000,
                'description' => "Marque BOURGEOIS GLOBAL   . Référence EFFIE 190 E-BG . Caractéristiques : Capacité (L) : 190 litres  . Type d'installation : sur air extrait . Cycle de soutirage : L  . Performance énergétique : > 100% . COP 15 °C : 3,6 . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 9,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'EFFIE 230 E-BG',
                'selling_price' => 0,
                'description' => '- MARQUE : BOURGEOIS  . - MODÈLE : 230 SUR AIR EXTRAIT . - REFERENCE : EFFIE 230 E-BG . - CAPACITÉ : 180L  (230 L MIX) . - COP (+15°C) : 3,6 (selon la norme EN 16147) . - PROFIL DE SOUTIRAGE : L . - RENDEMENT ENERGETIQUE  Eta wh : 115 % . - EFFICACITE ENE',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 9,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CHAFFOTEAUX AQUANEXT PLUS LINK',
                'selling_price' => 4000,
                'description' => "MARQUE : CHAFFOTEAUX AQUANEXT PLUS LINK 200L REF 3069781 . - Installation du ballon  au sol . - Type de pose stable . - Volume d'eau chaude à 40°C : 256 l . - Temps de chauffe : 3h59 . - Résistance électrique de secours Stéatite 1500W  . - Double protection contre la corrosion : une anode titane à courant imposé + une anode magnésium. . - Plage de fonctionnement - 10 à 42°C . - COP EN 16147 à 7°C : 3.10 . - Type de fluide frigorigène : R134a . - Niveau de puissance dB (A°) : 55 . - Classe énergétique pour le chauffage de l'eau :  A+ . Profilage de soutirage déclaré :  L . - Dimensions de l'unité intérieure  Ø : 560 mm - H : 1520 mm . - Garantie 5 ans cuve et garantie 2 ans pièces. . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 10,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CHAFFOTEAUX AQUANEXT PLUS LINK 250 L',
                'selling_price' => 4500,
                'description' => "MARQUE : CHAFFOTEAUX AQUANEXT PLUS LINK 250L  . - Installation du ballon  au sol . - Type de pose stable . - Volume d'eau chaude à 40°C : 336 l . - Temps de chauffe : 5h23 . - Résistance électrique de secours Stéatite 1500W  . - Double protection contre la corrosion : une anode titane à courant imposé + une anode magnésium. . - Plage de fonctionnement - 10 à 42°C . - COP EN 16147 à 7°C : 3.35 . - Type de fluide frigorigène : R134a . - Niveau de puissance dB (A°) : 55 . - Classe énergétique pour le chauffage de l'eau :  A+ . Profilage de soutirage déclaré :  XL . - Garantie 5 ans cuve et garantie 2 ans pièces. . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 10,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE CHAFFOTEAUX AQUANEXT PERFORMANCE 200 L',
                'selling_price' => 4000,
                'description' => "MARQUE : CHAFFOTEAUX AQUANEXT PERFORMANCE 200 L REF 3069656 .  . Composé d'une pompe à chaleur reliée à un ballon de stockage d'eau, l'Aquanext Performance utilise une source d'énergie inépuisable, les calories de l'air, pour chauffer l'eau chaude sanitaire du ballon. . - Installation du ballon  au sol . -  Type de pose verticale . -  Volume d'eau chaude à 40°C : 256 l . - Temps de chauffe : 6h19 . - COP EN 16147 à 7° : 2.71 . - Protection anticorrosion Anode titane à courant imposé modulant + anode magnésium . - Résistance électrique d'appoint  2000 W . - Fluide frigorigène / Charge R134A / 95 kg . - Niveau puissance acoustique à l'intérieur dB(A) 53 . - Classe d'efficacité énergétique pour le chauffage de l'eau : A  . - Profil de soutirage déclaré : L . -  Garantie 5 ans cuve et garantie 2 ans pièces. . NORME : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 10,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  KALIKO SPLIT SOL 215L - TWH FS 200E',
                'selling_price' => 4000,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . DE DIETRICH récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  .  . - Capacité: 215 L . - Cycle de soutirage selon EN16147 : L . - COP : 3.14 . - Mode de raccordement : Air extérieur . - Puissance pompe à chaleur : 1750 W . - Puissance résistance électrique : 2400 W . - Durée de mise en température : 5h41 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+ . Garantie cuve 5 ans.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  KALIKO 300L - TWH 300 E',
                'selling_price' => 4000,
                'description' => 'MARQUE : DE DIETRICH - KALIKO 300L - TWH 300 E . - Capacité : 270l . - Profil de soutirage : XL . - COP à 7°C : 3,11  ( Selon la norme EN 16147 ) . - Puissance de la résistance (W) : 2400 . - Température de fonctionnement : -5 à +35 . -  RENDEMENT ENERGETIQUE Eta wh : 152% . - Pression acoustique (dB) : 35,2 . - Hauteur  : 2000 mm . - Poids à vide : 105 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  KALIKO 200L - TWH 200 E',
                'selling_price' => 4000,
                'description' => 'MARQUE : DE DIETRICH -  KALIKO 200L - TWH 200 E . - Capacité : 215l . - Profil de soutirage : L . - COP à 7°C : 3,16  ( Selon la norme EN 16147 ) . - Puissance de la résistance (W) : 2400 . - Température de fonctionnement : -5 à +35 . -  RENDEMENT ENERGETIQUE Eta wh : 152% . - Pression acoustique (dB) : 35,2 . - Hauteur  : 1690 mm . - Poids à vide : 92 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE KALIKO 180L - ETWH 180 E',
                'selling_price' => 4000,
                'description' => 'MARQUE :  KALIKO 180L - ETWH 180 E . - Capacité : 180l . - Profil de soutirage : L . - COP à 7°C : 2,88  ( Selon la norme EN 16147 ) . - Puissance de la résistance (W) : 1550 . - Température de fonctionnement : +5 à +43 . -  RENDEMENT ENERGETIQUE Eta wh : 119% . - Pression acoustique (dB) : 46,2 . - Hauteur  : 1670 mm . - Poids à vide : 102 kg . NORME : EN 16147',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  KALIKO 230L - ETWH 230 E',
                'selling_price' => 4000,
                'description' => 'MARQUE : DE DIETRICH - KALIKO 230L - ETWH 230 E . - Capacité : 230l . - Profil de soutirage : XL . - COP à 7°C : 3,02  ( Selon la norme EN 16147 ) . - Puissance de la résistance (W) : 1550 . - Température de fonctionnement : +5 à +43 . -  RENDEMENT ENERGETIQUE Eta wh : 124% . - Pression acoustique (dB) : 46,2 . - Hauteur  : 1990 mm . - Poids à vide : 116 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'Modèle 200 L',
                'selling_price' => 4000,
                'description' => "MARQUE : ECL NEXUS . - Modèle 200 L  . - Alimentation électrique :  V/Ph/Hz 220-240/1Ph+N+PE/50 . - Volume d'eau du ballon L  : 228  . - Puissance thermique W : 1870* (+1200**) . - Puissance ballon W 503* (+1200**) . - Courant nominal A 2.23* (+5.2**) . - COP *** W/W 2,64  . - Absorption maximale W : 765 (+1200**) . - Courant maximal A : 3.5 (+5.2**) . - Temps de chauffage avec ballon froid (*) H :min 7:48  . - Température maximale sortie eau . - (Sans utiliser la résistance) °C : 65 . - Température eau maximale °C : 75** . - Température eau minimale de démarrage °C : 10 . - Température ambiante de fonctionnement °C : -10 ~ +43 . - Pression maximale refoulement réfrigérant Bar :  26 . - Pression maximale aspiration réfrigérant bar :  6 . - Type réfrigérant :  R134a . - Quantité réfrigérant g : 920 . - Compresseur Type : Rotary / Marque Toshiba / Huile ESTER OIL VG74, 400ml . - Moteur ventilateur Type : Moteur asynchrone / W 80 / RPM 1250 . - Débit d'air nominal m3/h : 450 . - Débit d'air à 60 Pa m3/h 350 : 2,85 . - Diamètre conduites (tuyaux) mm 177 (s'adapte aux conduites flexibles 180 mm) . - Pression maximale admissible ballon bar : 10 . - Matériel de la surface interne du ballon S235JR avec vitrification à double couche 9:53 . - Résistance électrique auxiliaire kW : 1,2 . - Vanne d'expansion électronique :  OUI . - Anode en magnésium : OUI . - Classe de protection IP IPX1 . - Matériel échangeur pompe à chaleur (Condenseur) : Alliage d'aluminium . - Arrivée eau froide Inch G 1femelle . - Sortie eau chaude Inch G 1'femelle . - Sortie d'eau des condensats Tuyau flexible en plastique 0,3 mt. Ø22 mm 2,85 . - Évacuation eau condensat À installer extérieurement . - Dimensions nettes mm : Ø654x1638  . - Poids net kg 98  . - Poids avec ballon plein d'eau kg : 326  . - Pression sonore dB(A) : 46 . Efficacité énergétique du chauffage de l'eau basée sur ERP (EN 16147), profil L (200L)'",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 15,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'Modèle 110 L',
                'selling_price' => 4000,
                'description' => "MARQUE :  ECL NEXUS . DONNEES TECHNIQUES Modèle 110 L . - Alimentation électrique :  V/Ph/Hz 220-240/1Ph+N+PE/50 . - Volume d'eau du ballon L : 110 . - Puissance thermique W : 850* (+1500**) . - Puissance ballon W 236* (+1500**) . - Courant nominal A 1.14* (+6.5**) . COP *** W/W 3,01 . - Absorption maximale W : 400 (+1500**) . - Courant maximal A 1,81 : (+6,5**) . - Temps de chauffage avec ballon froid (***) H :min 6 : 53 . - Température maximale sortie eau (Sans utiliser la résistance) °C 60 . - Température eau maximale °C 70** . - Température eau minimale de démarrage °C 10 . - Température ambiante de fonctionnement °C -5 ~ +43 . - Pression maximale refoulement réfrigérant Bar 25 . - Pression maximale aspiration réfrigérant bar 0,2 . - Type réfrigérant : R134a . - Quantité réfrigérant g : 650 . - Compresseur Type Rotary / Type huile 68HES-H /Qté huile 376 ml . - Moteur ventilateur Type AC 286 W 20 . - Débit d'air nominal m3/h 300 . - Débit d'air à 60 Pa m3/h 170 2,85 . - Diamètre conduites (tuyaux) mm DN 125 . - Pression maximale admissible ballon bar 6 . - Matériel de la surface interne du ballon S235JR avec vitrification à double couche 9:53 . - Résistance électrique auxiliaire kW : 1,5 . - Vanne d'expansion électronique : OUI . - Anode en magnésium : OUI . - Classe de protection IP IPX1 . - Matériel échangeur pompe à chaleur (Condenseur) :  Cuivre . - Arrivée eau froide Inch G 1/2' mâle . - Sortie eau chaude Inch G 1/2' mâle . - Sortie d'eau des condensats : Tuyau flexible en plastique 0,3 mt. Ø22 mm 2,85 . - Évacuation eau condensat À installer extérieurement . - Dimensions nettes mm : 500x520x1406 . - Poids net kg : 72 . - Poids avec ballon plein d'eau kg : 182 . - Pression sonore dB(A) : 48,5 . Efficacité énergétique du chauffage de l'eau basée sur ERP (EN 16147), profil M110L",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 15,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'Modèle 300 L',
                'selling_price' => 4000,
                'description' => "MARQUE : ECL NEXUS . - Modèle 300 L  . - Alimentation électrique :  V/Ph/Hz 220-240/1Ph+N+PE/50 . - Volume d'eau du ballon L  :  286 . - Puissance thermique W : 1870* (+1200**) . - Puissance ballon W 503* (+1200**) . - Courant nominal A 2.23* (+5.2**) . - COP *** W/W 2,85 . - Absorption maximale W : 765 (+1200**) . - Courant maximal A : 3.5 (+5.2**) . - Temps de chauffage avec ballon froid (*) H : min 9:53 . - Température maximale sortie eau . - (Sans utiliser la résistance) °C : 65 . - Température eau maximale °C : 75** . - Température eau minimale de démarrage °C : 10 . - Température ambiante de fonctionnement °C : -10 ~ +43 . - Pression maximale refoulement réfrigérant Bar :  26 . - Pression maximale aspiration réfrigérant bar :  6 . - Type réfrigérant :  R134a . - Quantité réfrigérant g : 920 . - Compresseur Type : Rotary / Marque Toshiba / Huile ESTER OIL VG74, 400ml . - Moteur ventilateur Type : Moteur asynchrone / W 80 / RPM 1250 . - Débit d'air nominal m3/h : 450 . - Débit d'air à 60 Pa m3/h 350 : 2,85 . - Diamètre conduites (tuyaux) mm 177 (s'adapte aux conduites flexibles 180 mm) . - Pression maximale admissible ballon bar : 10 . - Matériel de la surface interne du ballon S235JR avec vitrification à double couche 9:53 . - Résistance électrique auxiliaire kW : 1,2 . - Vanne d'expansion électronique :  OUI . - Anode en magnésium : OUI . - Classe de protection IP IPX1 . - Matériel échangeur pompe à chaleur (Condenseur) : Alliage d'aluminium . - Arrivée eau froide Inch G 1femelle . - Sortie eau chaude Inch G 1'femelle . - Sortie d'eau des condensats Tuyau flexible en plastique 0,3 mt. Ø22 mm 2,85 . - Évacuation eau condensat À installer extérieurement . - Dimensions nettes mm :  Ø654x1888 . - Poids net kg 106,5 . - Poids avec ballon plein d'eau kg :  392,5 . - Pression sonore dB(A) : 46 . Efficacité énergétique du chauffage de l'eau basée sur ERP (EN 16147), profil L  XL (300L)",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 15,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE AEROS MB90 190L',
                'selling_price' => 6000,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . AEROS récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Produit Longueur / hauteur / largeur (mm) 621 / 2030 / 561 . - Poids 102.5 kg . - Tension d'alimentation (V / f / Hz) 220 ~ 240 / 1 / 50 . - COP : 3.5 . - ETAS : 95% . - Durée de la garantie 5 ans toutes pièces . - Tension en volts Monophasé (220) . - Profil de soutirage L . - Contenance ECS en litre 190 . - Combustible Eléctricité . - Plage de fonctionnement en T° extérieure Chaud :  (°C) 0 ~ +45 . - Pression acoustique (dB(A)) :  50 . - Puissance acoustique (dB(A)) :  61 . - Réfrigérant : R134a . - Classe énergétique Froid / Chaud : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 22,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE 190 L AEROS MB 190',
                'selling_price' => 4000,
                'description' => "MARQUE : GREE MODÈLE AEROS MB 190 . Capacité du ballon :  (L) 190 . Puissance restituée Chaud :  (kW) 1.5 . Efficacité énergétique : SCOP 2.47 / COP 3.5 (selon la norme EN 16147) . ? Efficacité énergétique saisonnière (moyen)  : (%) 103.9 . Puissance appoint électrique : (kW) 1.5 . Tension d'alimentation (V / f / Hz) 220 ~ 240 / 1 / 50 . Plage de fonctionnement en T° extérieure Chaud :  (°C) 0 ~ +45 . Pression acoustique (dB(A)) :  50 . Puissance acoustique (dB(A)) :  61 . Réfrigérant :  R134A . Profil de soutirage : L . Produit Longueur / hauteur / largeur (mm) 591 / 1685 / 591 . Classe énergétique Froid / Chaud : A",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 22,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE YUTAMPO R32 TAW-270RHC',
                'selling_price' => 4000,
                'description' => "MARQUE / MODELE : HITACHI / TAW-270RHC . - Capacité : 270l . - Profil de soutirage : XL . - COP  : 3,2 (  ECS selon EN16147 ) . - Efficacité énergétique saisonnière nwh : 129 % . - Etiquette énergetique ECS : A+ . - Temps de chauffe selon EN16147 : 3h30 . - Volume d'eau max utile à 40°c selon EN16147 : 360 . - Résistance électrique : 1,64 kW . - Dimensions du ballon (H x Ø x P) : 1714 x 600 x 681 . - Poids : 62 kg .  . Groupe extérieur : RAW-35RHC .  . - Plage de fonctionnement : -15~+37 °C . - Puissance calorifique moyenne restituée : 3,5 kW . - Longueur frigo mini maxi / Dénivelé maxi : 5 - 20 / 10 m . - Intensité max : 7.9 A . - Niveau de Pression à 1m / Puissance acoustique : - / 63 dB(A . - Dimensions (H x L x P) : 548 x 841 x 335 mm . - Poids : 32,5kg . - Quantité de fluide : 1 kg . - Réfrigérant : R32",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUESPLIT HITACHI YUTAMPO 190L',
                'selling_price' => 3000,
                'description' => 'MARQUE : HITACHI . MODÈLE : YUTAMPO190 . REFERENCE : RAW-35NHB /  XTAW-190NHB . CAPACITÉ : 190 L (256 L MIX) . COP +7°C : 3,1  (selon la norme EN 16147) . PROFIL DE SOUTIRAGE : L . RENDEMENT ENERGETIQUE Eta wh : 123 % . EFFICACITE ENERGETIQUE : A',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE  SPLIT HITACHI YUTAMPO 270L',
                'selling_price' => 3000,
                'description' => 'MARQUE : HITACHI . MODÈLE : YUTAMPO270 . REFERENCE : RAW-35NHB / XTAW-270NHB . CAPACITÉ : 270 L (365 L MIX) . COP +7°C : 3,2  (selon la norme EN 16147) . PROFIL DE SOUTIRAGE : XL . RENDEMENT ENERGETIQUE Eta wh : 123 % . EFFICACITE ENERGETIQUE : A',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 27,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE LAGON 280 L',
                'selling_price' => 4000,
                'description' => "le chauffe-eau thermodynamique JZGG30LVEE-MO-X atteint d'excellentes performances grâce à son ballon avec isolation de haute qualité .  . - ALIMENTATION : 220-240V 50Hz . - CYCLE : XL . - COP ECS A7 : 2.74 . - TYPE DE REFRIGERANT : R134a . - PRESSION SONORE : 45 dB(A) . - PUISSANCESONORE : 57 dB(A) . - DIMENSIONS (DIAMXH) : 650 x 1920 . - POIDS : 145,5",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 33,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE JZGG19LVEE-MO-X 180 L',
                'selling_price' => 4000,
                'description' => "CHAUFFE-EAU THERMODYNAMIQUE  SUR AIR AMBIANT OU AIR EXTÉRIEUR À ACCUMULATION EST À POSER AU SOL. . - Alimentation : 220-240V 50Hz . - Type de ballon : Acier émaillé . - Cycle : L . - Contenance : 180 . - Capacité : 1.45kW . - Classe d'efficacité énergétique pour le chauffage de l'eau : A . - COP à 7 °C : 2.61 . - Temps de montée en temp : 08h28 . - Type de réfrigérant : R134a . - Quantité de réfrigérant : 1.0kg . - Pression sonore : 41,2 dB(A) . - Puissance sonore : 56,6 dB(A) . - Puissance résistance elec : 3 kW . - Dimension : 560 x 1760  mm . - Poids net / emballage : 107/120 kg . - Cuve en acier émaillée, protection par anode en magnésium . - Évaporateur constitué de tubes cuivre et ailettes aluminium . - Condenseur en cuivre situé autour de la cuve . - Régulateur spécifique pour une application ECS intégrant la programmation, différents modes de fonctionnement (économique, hybride et secours), la gestion de la résistance d'appoint, la fonction anti légionellose.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 33,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU  THERMODYNAMIQUE AQUARIA 200 S2',
                'selling_price' => 6000,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . AQUARIA récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Dimension : 600x629x1692 mm . - Poids 91/103 kg . - COP : 3.04 . - Durée de la garantie 5ans PCE 3ans compresseur 5ans cuve . - Tension en volts : 220V~240V . - Profil de soutirage L . - Contenance ECS en litre 195 . - Pression en bar 7 . - Temps de chauffe en heure et mn 5h30 . - Puissance acoustique intérieur dB(A) 57 . - Fluide frigorigène R134 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 36,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU  THERMODYNAMIQUE AQUARIA 250 S2',
                'selling_price' => 6000,
                'description' => "Grâce à sa pompe à chaleur intégrée, le chauffe-eau thermodynamique . AQUARIA récupère les calories naturellement présentes dans l'air de votre habitat ou l'air extérieur pour produire de l'eau chaude sanitaire en abondance. . Caractéristiques techniques :  . - Type de produit Chauffe eau thermodynamique . - Dimension : 600x629x1987 mm . - Poids 102/115 kg . - COP : 3.02 . - Durée de la garantie 5ans PCE 3ans compresseur 5ans cuve . - Tension en volts : 220V~240V . - Profil de soutirage L . - Contenance ECS en litre 246 . - Pression en bar 7 . - Temps de chauffe en heure et mn 7h21 . - Puissance acoustique intérieur dB(A) 58 . - Fluide frigorigène R134 . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 36,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'WH27S.F5 270L',
                'selling_price' => 3000,
                'description' => "Marque : LG | Modèle : Inverter 270L WH27S.F5 . - Caractéristiques : Capacité 270 litres  . - Type d'installation : sur air ambiant  . - Cycle de soutirage : L  . - Efficacité énergétique saisonnière :  155%  . - COP (7°C) : 3,45 . - Réfrigérant R134A . - Pression sonore (1m) :  dBA 40 . - DIMENSIONS (L X H X P) mm : 580 X 2008 X 582 . - Poids à vide : 119 kg . - Classe d'efficacité énergétique : A+ . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 37,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'WH20S.F5  200L',
                'selling_price' => 3000,
                'description' => "Marque : LG | Modèle : Inverter 200L WH20S.F5 . - Caractéristiques : Capacité 200 litres  . - Type d'installation : sur air ambiant  . - Cycle de soutirage : L  . - Efficacité énergétique saisonnière :  144%  . - COP (7°C) : 3,30 . - Réfrigérant R134A . - Pression sonore (1m) :  dBA 40 . - DIMENSIONS (L X H X P) mm : 580 X 1625 X 582 . - Poids à vide : 100 kg . - Classe d'efficacité énergétique : A+ . Norme : EN 16147",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 37,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE EAU THERMODYNAMIQUE MIDEA COMBO 280 L',
                'selling_price' => 6000,
                'description' => "Chauffe eau thermodynamique avec source d'air MIDEA COMBO RSJ-35/300RDN3-F1 . Dimension : 0650*1920mm . Puissance calorifique : 3 kW . Consommation chaleur : 0.80 kW . Contenance ECS en 280 L . Cop : 3.83 . Pression sonore : 45 dB(A) . Poids en fonctionnement : 175.50 kg . Poids net : 145.5 kg . Réfrigérant : R134a (1200g) . Alimentation 220-240V~50Hz . Interrupteur manuel (A) /Capacité / Fusible (A) 40/30 . Temp. de sortie d'eau Par défaut 55°C, 38-65°C (jusqu'à + 70 ºC lors de la désinfection avec résistance électrique) . Durée de la garantie 5ans",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 38,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE EAU THERMODYNAMIQUE MIDEA COMBO 180 L',
                'selling_price' => 4500,
                'description' => "Chauffe eau thermodynamique avec source d'air MIDEA COMBO RSJ-15/190RDN3-F . Dimension : 0650*1920mm . Puissance calorifique : 1.45 kW . Consommation chaleur : 0.38kW . Contenance ECS en 180 L . Cop : 3.80 . Pression sonore : 41 dB(A) . Poids en fonctionnement : 120 kg . Poids net : 107 kg . Réfrigérant : R134a (1000g) . Alimentation 220-240V~50Hz . Interrupteur manuel (A) /Capacité / Fusible (A) 25/20 . Temp. de sortie d'eau Défaut 60 °C, 38 °C - 65 °C(jusqu'à +70 °C lors de ladésinfection avec résistanceélectrique) . Durée de la garantie 5ans",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 38,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'MAGNA AQUA 200/3',
                'selling_price' => 4000,
                'description' => "MARQUE : SAUNIER DUVAL  / MODELE : MAGNA AQUA 200/3 . - Puissance électrique absorbée maximale (compresseur + appoint) W : 1 900 . - Type de source de chaleur :  Air extérieur ou ambiant . - Fluide frigorigène : type / charge R290 / 100 g . - COP : 3,19 Selon EN 16147 . - Profil de soutirage : L  . - Efficacité énergétique saisonnière ECS (?Wh)  % : 132  . - Puissance acoustique dB(A) : 48 . - Tension d'alimentation V : 230 MONOPHASÉ . - Dimensions (hauteur / diamètre) mm : 1 462 / 634  . - Poids net kg : 55  . Classe énergétique : A+  . Selon les conditions de la norme EN 16147.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 49,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'MAGNA AQUA 270/3',
                'selling_price' => 4000,
                'description' => "MARQUE : SAUNIER DUVAL  / MODELE : MAGNA AQUA 270/3 . - Puissance électrique absorbée maximale (compresseur + appoint) W : 1 900 . - Type de source de chaleur :  Air extérieur ou ambiant . - Fluide frigorigène : type / charge R290 / 100 g . - COP : 3,14 Selon EN 16147 . - Profil de soutirage : L  . - Efficacité énergétique saisonnière ECS (?Wh)  % : 124  . - Puissance acoustique dB(A) : 48 . - Tension d'alimentation V : 230 MONOPHASÉ . - Dimensions (hauteur / diamètre) mm : 1 783 / 634 . - Poids net kg : 68 . Classe énergétique : A+  . Selon les conditions de la norme EN 16147.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 49,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE SHP-A 220 PLUS',
                'selling_price' => 4000,
                'description' => "le chauffe-eau thermodynamique SHP- A 220 PLUS utilise des sources renouvelables pour chauffer l'eau, mais il atteint également d'excellentes performances grâce à son ballon avec isolation de haute qualité. Ainsi, vous obtenez de l'eau chaude à chaque fois que vous en avez besoin pour le bain ou la douche, et ce avec une faible consommation d'énergie. . Caractéristiques techniques :  .  . - Classe d'efficacité énergétique A+ . - Puissance calorifique moyenne (A15 / W10-55) 1,6 kW . - Puissance calorifique moyenne (A7 / W10-55) 1,3 kW . - Coefficient de performance COP (EN 16147 / A20) 3,55 . - Coefficient de performance COP (EN 16147 / A7) 2,68 . - Puissance thermique nominale Prated (EN 16147 / A20) 1,60 kW  . - Puissance électrique absorbée en régime stabilisé (EN 16147 /A20) 0,022 kW . - Profil de charge nominal (EN 16147) L . - Température nominale de l'eau chaude sanitaire (EN 16147) 55 °C . - Quantité d'eau chaude nominale max. utilisable à 40 °C(EN 16147 / A20) 278 l . - Durée de mise en température (EN 16147 / A20) 6,06 h . - Niveau de pression acoustique moyen à 1 m, à l'air libre 45 dB(A) . - Niveau de puissance acoustique (EN 12102) 60 dB(A) . - Hauteur x diamètre 1501 x 690 mm Poids 120 kg . Classe d'efficacité énergétique selon la directive UE nº 812/2013",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 52,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'PERFORMER 2 - 270L - THA 986 114',
                'selling_price' => 3000,
                'description' => 'MARQUE : THALEOS - PERFORMER 2 - 270L - THA 986 114 . - Capacité : 270l . - Profil de soutirage : XL . - COP à 7°C : 3,16 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 130 % . - Puissance de la résistance (W) : 1800 . - Température de fonctionnement C° : -5 à +43 . - type de réfrigérant : R-513A . - Hauteur  : 1957 mm . - Diamètre : 620 mm . - Poids à vide : 92 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 58,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'PERFORMER 2 - 200L - THA 986 113',
                'selling_price' => 3000,
                'description' => 'MARQUE : THALEOS - PERFORMER 2 - 200L - THA 986 113 . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 2,78  ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 116 % . - Puissance de la résistance (W) : 1800 . - Température de fonctionnement C° : -5 à +43 . - type de réfrigérant : R-513A . - Hauteur  : 1617 mm . - Diamètre : 620 mm . - Poids à vide : 80 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 58,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE THERMOBLOC 200 L',
                'selling_price' => 0,
                'description' => "Code : ES30S005 . THWBLOC 200 L : . Caractéristiques techniques :  . - Classe énergétique : A+ . - Niveau sonore dB(A) : 53 . - Puissance nominale : 1.1 . - Cop : 3.4 . - Profil de charge : L . - Consommation annuelle d'électricité AEC : 867 . - Puissance de la résistance thermique : 1.5 Kw . -  Durée de la garantie 5ans",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 60,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX ACCESS - 250L',
                'selling_price' => 5000,
                'description' => 'Chauffe-eau thermodynamique sur air ambiant . MARQUE : THERMOR - AEROMAX ACCES - 250L . - Capacité : 250l . - COP à 7°C : 2.66 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE : 133?% . - Puissance totale absorbée (W) : 2300 . - Puissance résistance stéatite(W) : 1800 . - Fluide frigorigène : R290 . - Température de fonctionnement C° : 8 à 33 . - Puissance acoustique (dB) : 54 . - Hauteur  : 1769 mm . - Classe énergétique : A . Garantie 5 ans cuves et pièces',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX PREMIUM - 270L',
                'selling_price' => 3500,
                'description' => "MARQUE : THERMOR - AEROMAX PREMIUM - 270L . - Capacité : 270l . - Profil de soutirage : XL . - COP à 7°C : 3,16 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh :    % . - Fluide frigorigène : R513a - 800gr . - Appoint électrique : 1800 W . - Pression d'eau nominale (bars) : 8 . - Alimentation électrique (V/Hz) : 230 V~/50 Hz . - Température de fonctionnement C° : -5 à 43 . - Pression acoustique : 53 dB (A) . - Dimensions (H x L x P) 1957 x 620 x 665 . - Poids à vide avec serpentin : 111 kg /  sans serpentin  : 92 kg . Classe énergétique ERP A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX 5 - 250L',
                'selling_price' => 6500,
                'description' => 'Chauffe-eau thermodynamique sur air ambiant . MARQUE : THERMOR - AEROMAX 5 - 250L . - Capacité : 250 L . - Profil de soutirage : L . - COP à 7°C : 3,15 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 131 % . - Puissance de la résistance (W) : 2450 . - Puissance résistance stéatite(W) : 1800 . - Fluide frigorigène : R513a . - Température de fonctionnement C° : -5 à 43 . - Pression acoustique (dB) : 50 . - Hauteur  : 1929 mm . - Poids à vide : 92 kg . - Classe énergétique : A+ . Garantie 5 ans cuve et pièces',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX  SPLIT 2 VERTICAL MURALE 200L',
                'selling_price' => 4000,
                'description' => 'MARQUE : THERMOR  . -  Modèle : AEROMAX  SPLIT 2 VERTICAL MURALE 200L . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 2,90 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 121   % . - Appoint électrique : 1800 W . - Alimentation électrique (V/Hz) : 230 V~/50 Hz . - Temps de chauffe : 3h02 . - Dimensions ø?x?H?x?P (mm) : 580?x?1289?x?603 . - Poids à vide : 55 (kg) . - Classe énergétique : A+ . UNITE EXTERIEURE AEROMAX SPLIT 2 . - Puissance maximale absorbée (W) : 1100 . - Pression acoustique : 58 dB (A) . - Fluide frigorigène : R410A . - Dimensions L?x?H?x?P (mm) 743?x?535?x?330 . - Poids à vide : 26 Kg . Classe énergétique  A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX PREMIUM - 200L',
                'selling_price' => 4000,
                'description' => "MARQUE : THERMOR - AEROMAX PREMIUM - 200L . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 2,79 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh :    % . - Fluide frigorigène : R513a - 800gr . - Appoint électrique : 1800 W . - Pression d'eau nominale (bars) : 8 . - Alimentation électrique (V/Hz) : 230 V~/50 Hz . - Température de fonctionnement C° : -5 à 43 . - Pression acoustique : 53 dB (A) . - Dimensions (H x L x P) 1617 x 620 x 665 . - Poids à vide avec serpentin : 97 kg /  sans serpentin  : 80 kg . Classe énergétique ERP A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX 5 - 100L',
                'selling_price' => 3000,
                'description' => 'MARQUE : THERMOR Gamme : Aéromax 5 VM  . - Type de résistance : Stéatite en appoint . - Capacité : 100 L . - Puissance : 1550 W . - Tension : 230 V monophasé . - Temps de chauffe total : 7h27 . - COP à 7°C :  2,47  ( Selon la norme EN 16147 ) . - PROFIL DE SOUTIRAGE : XL . - RENDEMENT ENERGETIQUE Eta wh :  111% . - Hauteur : 1234 mm . - Diamètre : 522 mm . - Poids à vide : 57 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX 5 - 150L',
                'selling_price' => 3000,
                'description' => 'MARQUE : THERMOR - AEROMAX 5 - 150L . - Capacité : 150l . - Profil de soutirage : L . - COP à 7°C : 3,28 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 127?%  . - Puissance de la résistance (W) : 2150 . - Température de fonctionnement C° : -5 à +43 . - Pression acoustique (dB) : 45 . - Hauteur  : 1527 mm . - Diamètre : 522 mm . - Poids à vide : 66 kg',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX  SPLIT 2 VERTICAL STABLE 270L',
                'selling_price' => 4000,
                'description' => 'MARQUE : THERMOR  . -  Modèle : AEROMAX  SPLIT 2 VERTICAL STABLE 270L . - Capacité : 270l . - Profil de soutirage : XL . - COP à 7°C : 3,29 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE Eta wh : 137   % . - Appoint électrique : 1800 W . - Temps de chauffe : 4h26 . - Alimentation électrique (V/Hz) : 230 V~/50 Hz . - Dimensions ø?x?H?x?P (mm) : 580?x?1289?x?603 . - Poids à vide : 65 (kg) . - Classe énergétique : A+ . UNITE EXTERIEURE AEROMAX SPLIT 2 . - Puissance maximale absorbée (W) : 1100 . - Pression acoustique : 58 dB (A) . - Fluide frigorigène : R410A . - Dimensions L?x?H?x?P (mm) 743?x?535?x?330 . - Poids à vide : 26 Kg . Classe énergétique  A+',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'AEROMAX 5 - 200L',
                'selling_price' => 6000,
                'description' => 'Chauffe-eau thermodynamique sur air ambiant . MARQUE : THERMOR - AEROMAX 5 - 200L . - Capacité : 200l . - Profil de soutirage : L . - COP à 7°C : 3,18 ( Selon la norme EN 16147 ) . - RENDEMENT ENERGETIQUE : 133?% . - Puissance totale absorbée (W) : 2450 . - Puissance résistance stéatite(W) : 1800 . - Fluide frigorigène : R513a . - Température de fonctionnement C° : -5 à 43 . - Pression acoustique (dB) : 50 . - Hauteur  : 1693 mm . - Poids à vide : 82 kg . - Classe énergétique : A+ . Garantie 5 ans cuves et pièces',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 61,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ESTIA 260L HWS-G2601CNMR-E',
                'selling_price' => 4000,
                'description' => "MARQUE : TOSHIBA  ESTIA 260L HWS-G2601CNMR-E . - COP à +7°C selon EN16147 : 3,69 . - Efficacité énergétique saisonnière 150%  . - Plage de fonctionnement thermodynamique (min./max.) °C -7 à +40  . - Temps de chauffe (air +7°C, eau 10°C-53°C) hr : mm 09:12  . - Volume maximal d'eau chaude utilisable Vmax à 40°C L 347  . - Capacité : L 260  . - Cycle de puisage XL  . - Température d'eau maximum (pompe à chaleur et appoint élec.) °C 65  . - Température d'eau maximum (pompe à chaleur uniquement) °C 60  . - Niveau de puissance sonore - Gainé (ISO12102) dB(A) :  49,0  . - Puissance appoint électrique W 1500 1500 . - Alimentation électrique V-ph-Hz :  230-1-50 . - Dimensions (Hauteur x Diamètre) mm 1960 x 620 . - Poids (vide / plein) kg 100/350 . Classe énergétique :  A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE ESTIA 190L HWS-G1901CNMR-E',
                'selling_price' => 4000,
                'description' => "MARQUE : TOSHIBA  ESTIA 190L HWS-G1901CNMR-E . - COP à +7°C selon EN16147 : 3,57  . - Efficacité énergétique saisonnière 146%  . - Plage de fonctionnement thermodynamique (min./max.) °C -7 à +40  . - Temps de chauffe (air +7°C, eau 10°C-53°C) hr : mm 06:28  . - Volume maximal d'eau chaude utilisable Vmax à 40°C L 247  . - Capacité : L 190  . - Cycle de puisage L  . - Température d'eau maximum (pompe à chaleur et appoint élec.) °C 65  . - Température d'eau maximum (pompe à chaleur uniquement) °C 60  . - Niveau de puissance sonore - Gainé (ISO12102) dB(A) :  49,0  . - Puissance appoint électrique W 1500 1500 . - Alimentation électrique V-ph-Hz :  230-1-50 . - Dimensions (Hauteur x Diamètre) mm 1600 x 620  . Poids (vide / plein) kg 94/284 . - Classe énergétique :  A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 63,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'CHAUFFE-EAU THERMODYNAMIQUE TRBT300N',
                'selling_price' => 4500,
                'description' => "Modèle : TRBT300N .  .  - Puissance absorbée (W) : 585 . - Courant nominal (A) : 2.54 . - Puissance absorbée maximale (W) : 900 . - Courant maximum (A) : 3.91 . - Alimentation (V/Hz) : 220-240/50 . - Profil de charge : XL . - Classe d'efficacité énergétique : A+ . - COP ECS 20°C (ambiant) : 4.2 . - COP ECS 14°C (ambiant) : 3.7 . - COP ECS 7°C (gainé) : 3.17 . - V40 ErP (L) : 398 . - Etas climat moyen : 129 % . - Type de réfrigérant : R134a (650g) . - Puissance d'entrée nominale (W) : 1500 . - Courant nominal (A) : 6.52 . - Température maximale de sortie d'eau (°C) : 75 . - Volume de stockage : 300 L . - Niveau sonore dB(A) : 58 . Garantie 3 ans compresseur et 2 ans pièces.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 64,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0S 251L - XL appoint hydraulique',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0S 251L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 251 . - Profil de soutirage : XL .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 07:20 . - Cop  : 3.70 . Volume maximum soutirable (à 40°C) Litre :  330 . - Efficacité énergétique en eau chaude ?wh % : 149 . - Consommation annuelle d'énergie (AEC) kWh : 664 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 09:25 . - COP : 3.40 . - Volume maximum soutirable (à 40°C)  Litre :  345 . - Efficacité énergétique en eau chaude ?wh % : 135 . - Consommation annuelle d'énergie (AEC) kWh : 761 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.25 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - T0S (avec appoint hydraulique) . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 734631/1755/1917 - Poids 125 kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0E-ze 254L - XL',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0E-ze 1254L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 254 . - Profil de soutirage : XL .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 07:20 . - Cop  : 3.70 . Volume maximum soutirable (à 40°C) Litre :  330 . - Efficacité énergétique en eau chaude ?wh % : 149 . - Consommation annuelle d'énergie (AEC) kWh : 664 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 09:25  . - COP : 3.40 . - Volume maximum soutirable (à 40°C)  Litre :  351 . - Efficacité énergétique en eau chaude ?wh % : 135 . - Consommation annuelle d'énergie (AEC) kWh : 761 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.35 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - Puissance électrique de l'appoint électrique (en option pour T0S-ze) kW 1,5 . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 734631/1755/1917 - Poids 110 kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0E-ze 180L - M',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0E-ze 180L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 178 . - Profil de soutirage : M .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 06:16 . - Cop  : 3.21 . Volume maximum soutirable (à 40°C) Litre :  288 . - Efficacité énergétique en eau chaude ?wh % : 122 . - Consommation annuelle d'énergie (AEC) kWh : 422 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 07:02  . - COP : 2.86 . - Volume maximum soutirable (à 40°C)  Litre :  228.2 . - Efficacité énergétique en eau chaude ?wh % : 113 . - Consommation annuelle d'énergie (AEC) kWh : 462 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.15 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - Puissance électrique de l'appoint électrique (en option pour T0S-ze) kW 1,5 . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 661/584/1555/1700 - Poids 95kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0S 251L - L appoint hydraulique',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0S 251L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 251 . - Profil de soutirage : L .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 07:20 . - Cop  : 3.70 . Volume maximum soutirable (à 40°C) Litre :  330 . - Efficacité énergétique en eau chaude ?wh % : 149 . - Consommation annuelle d'énergie (AEC) kWh : 664 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 09:07 . - COP : 3.22 . - Volume maximum soutirable (à 40°C)  Litre :  345 . - Efficacité énergétique en eau chaude ?wh % : 135 . - Consommation annuelle d'énergie (AEC) kWh : 761 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.25 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - T0S (avec appoint hydraulique) . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 734631/1755/1917 - Poids 125 kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0E-ze 254L - L',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0E-ze 254L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 254 . - Profil de soutirage : L .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 07:20 . - Cop  : 3.70 . Volume maximum soutirable (à 40°C) Litre :  330 . - Efficacité énergétique en eau chaude ?wh % : 149 . - Consommation annuelle d'énergie (AEC) kWh : 664 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 10:12  . - COP : 3.23 . - Volume maximum soutirable (à 40°C)  Litre :  351 . - Efficacité énergétique en eau chaude ?wh % : 135 . - Consommation annuelle d'énergie (AEC) kWh : 846 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.35 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - Puissance électrique de l'appoint électrique (en option pour T0S-ze) kW 1,5 . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 734631/1755/1917 - Poids 110 kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            [
                'designation' => 'VITOCAL 060-A TYPE T0E-ze 180L - L',
                'selling_price' => 3000,
                'description' => "MARQUE : VITOCAL . MODELE :   060-A TYPE T0E-ze 180L . CARACTÉRISTIQUES DU PRODUIT . - Volume de stockage Litres 178 . - Profil de soutirage : L .  Données de performance - en air ambiant . selon EN 16147:2017 à A20/W10-53 (en air ambiant à 20°C) . - Temps de chauffe h:min : 08:3 . - Cop  : 3.39 . Volume maximum soutirable (à 40°C) Litre :  253 . - Efficacité énergétique en eau chaude ?wh % : 145 . - Consommation annuelle d'énergie (AEC) kWh : 707 . Données de performance - en air extérieur selon EN 16147:2017 à A7/W10-53 (en air extérieur à 7°C)  . - Temps de chauffe  h:min : 08:04  . - COP : 2.92 . - Volume maximum soutirable (à 40°C)  Litre :  253.4 . - Efficacité énergétique en eau chaude ?wh % : 121 . - Consommation annuelle d'énergie (AEC) kWh : 846 . Circuit frigorifique . - Réfrigérant :  R1234ze . - Contenance : 1.15 . - Potentiel de réchauffement planétaire (GWP/PRP) : 7 . - Equivalent CO2  : 8 . - Pression de service admissible bar / Mpa  :  25 / 2.5 . - Puissance électrique de l'appoint électrique (en option pour T0S-ze) kW 1,5 . Dimensions / Poids . - Profondeur/  Diamétre (Ø) / Hauteur / Hauteur de basculement mm : 661/584/1555/1700 - Poids 95kg . Classe d'efficacité énergétique selon réglement EU N° 812/2013  : A+",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 67,
                'p_work_id' => 3,
            ],
            // comble

            [
                'designation' => 'TETRIS SUPER 12',
                'selling_price' => 45,
                'description' => "TETRIS-SUPER 12 offre une résistance thermique intrinsèque R = 6,30 m.K/W. . C'est un matériau isolant souple et résilient, étanche à l'air, qui absorbe et atténue les vibrations sonores. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 1,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SOLERIO EC 300',
                'selling_price' => 4000,
                'description' => "MARQUE : EC 300 . - Capacité (L)  : 300 . - consommation d'entretien kWh/24h : 2,97 . - constante de refroidissement Wh/24h/l/K : 0,21 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c : 85  . - indice de protection : iP21 . - hauteur mm : 1780 . - Profondeur mm : 653 . - Profondeur vase d'expansion déporté mm : 584  . - largeur mm : 787  . - Poids à vide sans station kg : 95 . - Poids à vide avec station kg :  105 . - Poids en charge avec statio kg :  395 . - surface échangeur solaire m2 : 1 . - Puissance solaire kW :  34 . - Perte de charge mbar :  31 . - Volume échangeur :  6,3 . - Pression maxi échangeur bar : 6 . - Volume solaire : 110 . - Puissance résistance kW : 2,4 . - alimentation V : 230/400  . - type : - stéatite . - Volume appoint électrique :  184  . - température maxi appoint électrique °c :  65 +/-5",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SOLERIO EC 200',
                'selling_price' => 4000,
                'description' => "MARQUE : EC 200 . - Capacité (L)  : 200 . - consommation d'entretien kWh/24h :2,21 . - constante de refroidissement Wh/24h/l/K : 0,23 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c :85 . - indice de protection :iP21 . - hauteur mm :1279 . - Profondeur mm :653 . - Profondeur vase d'expansion déporté mm : 584 . - largeur mm : 787 . - Poids à vide sans station kg : 65 . - Poids à vide avec station kg : 75 . - Poids en charge avec statio kg : 265 . - surface échangeur solaire m2 : 0,83 . - Puissance solaire kW : 28 . - Perte de charge mbar : 27 . - Volume échangeur :  5,8 . - Pression maxi échangeur bar :6 . - Volume solaire : 100  . - Puissance résistance kW : 1,8 . - alimentation V : 230/400 . - type :  stéatite  . - Volume appoint électrique :  90 . - température maxi appoint électrique °c : 65 +/-5",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SOLERIO EC 400',
                'selling_price' => 4000,
                'description' => "MARQUE : EC 400 . - Capacité (L)  :  390 . - consommation d'entretien kWh/24h : 3,55 . - constante de refroidissement Wh/24h/l/K : 0,19 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c : 85 . - indice de protection : iP21 . - hauteur mm : 163 . - Profondeur mm : 694 . - Profondeur vase d'expansion déporté mm : 678  . - largeur mm :  911 . - Poids à vide sans station kg :  151 . - Poids à vide avec station kg :  161 . - Poids en charge avec statio kg : 546 . - surface échangeur solaire m2 : 1 . - Puissance solaire kW :  34 . - Perte de charge mbar :  31 . - Volume échangeur : 6,3 . - Pression maxi échangeur bar :6 . - Volume solaire : 160 . - Puissance résistance kW :2,4 . - alimentation V : 230/400 . - type : stéatite . - Volume appoint électrique :  225 . - température maxi appoint électrique °c :  65 +/-5 101",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 7,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'PACK BOLLON SOLAIRE 300L + 2 PANNEAU',
                'selling_price' => 5000,
                'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 300L . - Hauteur : 1910 mm . - Profil de soutirage : XXL . - Réservoir intérieur : SUS304-2B, 1,2 mm d'épaisseur, Ø450 mm . - Réservoir extérieur : PVDF 0,3 mm d'épaisseur, Ø550 mm . - Isolation : mousse de polyuréthane, 50 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression . CAPTEUR SOLAIRE THERMIQUE . - Taille : 100 x 200 cm . - Quantité pack : 2 panneaux . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé,  0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 8,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'PACK BOLLON SOLAIRE 200L + 2 PANNEAU',
                'selling_price' => 5000,
                'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 200L . - Hauteur : 1910 mm . - Profil de soutirage : XL . - Réservoir intérieur : SUS304-2B, . - 1,2 mm d'épaisseur, Ø370 mm . - Réservoir extérieur : PVDF . - 0,3 mm d'épaisseur, Ø460 mm . - Isolation : mousse de polyuréthane, . - 45 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression .  . CAPTEUR SOLAIRE THERMIQUE :  2 PANNEAU . - Taille : 125 x 200 cm . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair . - à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé, . - 0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 8,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'PACK BOLLON SOLAIRE 200L + 1 PANNEAU',
                'selling_price' => 5000,
                'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 200L . - Hauteur : 1910 mm . - Profil de soutirage : XL . - Réservoir intérieur : SUS304-2B, . - 1,2 mm d'épaisseur, Ø370 mm . - Réservoir extérieur : PVDF . - 0,3 mm d'épaisseur, Ø460 mm . - Isolation : mousse de polyuréthane, . - 45 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression .  . CAPTEUR SOLAIRE THERMIQUE : 1 PANNEAU . - Taille : 125 x 200 cm . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair . - à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé, . - 0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 8,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'AQUATEK 260 L',
                'selling_price' => 4000,
                'description' => "MARQUE : CLIMER . - Modèle :   AK260 . - Capacitè, L :  260 . - Pression maximale, bar :  6 . Données pompe à chaleur . - Classe energetica : A . - Profil de charge :  XL . - Puissance thermique en W *  : 1430-2560 . - Puissance consommée en W  : 450-540 . - COP * 2,5-4,6 . - Température maximale BC en °C 55 . - Température maximale de la résistance en °C 70 . - Gaz réfrigérant :  R134A . Données électriques . -Alimentation électrique en V/ph/Hz :  230/1/50 . - Puissance résistance électrique en W : 1500 . - Puissance électrique absorbée en W : 2100 . - Eficiency (%) / AEC kWh : 109 / 1540 . Panneaux . - Nombre de panneaux : 2 . - Pression maximale panneaux en Bar : 10 . - Entrée/sortie du panneau solaire principal  : 1/2 - 1/2 . - Entrée/sortie du panneau solaire segondaire : 3/8 - 1/4 . - Entrée/sortie du panneau solaire segondaire . Configuration Au sol . A, mm 585 B, mm 587 C, mm  1945 D, mm 1323 E, mm 217 F, mm 194 . Entrée Sortie d'eau en Pouce : 3/4 . Entrée Sortie Gaz réfrigérant en Pouce : 3/8 - 1/4 . Entrée Sortie d'eau en Pouce :  1/2 - 1/2 . Nature du fluide capteurs : Eau . Certification et norme capteurs :  SOLAR KEYMARK 011-7S2795F",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'ECOHEAT TD - 160 L - EH160 TD',
                'selling_price' => 3000,
                'description' => 'MARQUE : CLIMER  . REFERENCE :  EH160 TD . - Capacité en L : 160 . - Classe énergétique : A  . - Profil de charge : L  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4 . SOLAR KEYMARK 011-7S2795 F',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'ECOHEAT TD - 200 L - EH200 TD',
                'selling_price' => 4100,
                'description' => 'MARQUE : CLIMER  . REFERENCE :  EH200 TD . - Capacité en L : 200 . - Classe énergétique : A  . - Profil de charge : L  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'AQUATEK 200 L',
                'selling_price' => 4000,
                'description' => "MARQUE : CLIMER . - Modèle :   AK200 . - Capacitè, L :  200 . - Pression maximale, bar :  6 . Données pompe à chaleur . - Classe energetica : A . - Profil de charge :  L . - Puissance thermique en W *  : 1430-2560 . - Puissance consommée en W  : 450-540 . - COP * 2,5-4,6 . - Température maximale BC en °C 55 . - Température maximale de la résistance en °C 70 . - Gaz réfrigérant :  R134A . Données électriques . -Alimentation électrique en V/ph/Hz :  230/1/50 . - Puissance résistance électrique en W : 1500 . - Puissance électrique absorbée en W : 2100 . - Eficiency (%) / AEC kWh : 105/ 973  . Panneaux . - Nombre de panneaux : 2 . - Pression maximale panneaux en Bar : 10 . - Entrée/sortie du panneau solaire principal  : 1/2 - 1/2 . - Entrée/sortie du panneau solaire segondaire : 3/8 - 1/4 . - Entrée/sortie du panneau solaire segondaire . Configuration Au sol . A, mm 585 B, mm 587 C, mm 1527  D, mm 956  E, mm 217 F, mm 194 . Entrée Sortie d'eau en Pouce : 3/4 . Entrée Sortie Gaz réfrigérant en Pouce : 3/8 - 1/4 . Entrée Sortie d'eau en Pouce :  1/2 - 1/2 . Nature du fluide capteurs : Eau . Certification et norme capteurs :  SOLAR KEYMARK 011-7S2795F",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'ECOHEAT TD - 260 L - EH260 TD',
                'selling_price' => 4100,
                'description' => 'MARQUE : CLIMER  . REFERENCE :  EH260 TD . - Capacité en L : 260 . - Classe énergétique : A  . - Profil de charge : XL  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'ECOHEAT TD - 500 L - EH500 TD',
                'selling_price' => 4000,
                'description' => 'MARQUE : CLIMER  . REFERENCE :  EH500 TD . - Capacité en L : 500 . - Classe énergétique : A  . - Profil de charge : XXL  . - Puissance thermique en W : 2860-5120 . - Puissance consommée en W : 900-1080 . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 2 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 12,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO BSL 300 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO BSL 300 .  . -   Volume total ballon (Vtot) : 300 L . -  Volume appoint électrique/volume solaire : 105/195 L . -  Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h / Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 200  . -   Hauteur relative échangeur - de base (solaire) : 0,48   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 8,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,20 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 129 kg / Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'CESI 300L INISOL UNO E 300 / DIETRISOL PRO D230 OU EQUIVALENT',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO E BESL 300  . -     Puissance appoint : 2,3 KW / Volume total ballon (Vtot) :  300 L  . -    Volume appoint électrique/volume solaire :   135/165 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 8,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,48  / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) 8,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,20 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  210 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  360 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 10  . -   Poids net : 129 kg  / Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg . Certification : SOLAR KEYMARK N° 078/000264",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO BSL 200 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO BSL 200 .  . -  Volume total ballon (Vtot) : 225 L  . -  Volume appoint électrique/volume solaire : 75/150 L  . -  Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /   Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 590 L/h . - Débit sur 10min à ?t 30 K T.eau froideb10°C Temp.de stockage ecs 65°C : 150 L/10 min . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 5,6 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 0,84 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 106 kg   /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO E BESL 300 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO E BESL 300  .  . -     Puissance appoint : 2,3 KW / Volume total ballon (Vtot) :  300 L  . -    Volume appoint électrique/volume solaire :   135/165 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 8,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,48  / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) 8,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,20 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  210 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  360 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 10  . -   Poids net : 129 kg  / Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO BSL 400 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO BSL 400 .  . -  Volume total ballon (Vtot) : 400 L . -  Volume appoint électrique/volume solaire : 150/250 L . -  Coefficient pertes thermiques ballon (UA_S) :  2,41 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /  Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 270  . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 10,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,50 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'CESI 200L INISOL UNO E BESL 200  / INISOL DH 200SL OU EQUIVALENT',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO E BESL 200  .  . -    Volume total ballon (Vtot) :  225 L  . -    Volume appoint électrique/volume solaire :   95/130 L  . -   Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Puissance appoint : 1,5 KW . -   Capacité échangeur : De base (solaire) : 5,6 L   / appoint (résist. électr.): 5,1 L . -   Hauteur relative échangeur - De base (solaire) : 0,49   / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 5,6 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 0,84 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  155 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  250 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 20  . -   Poids net : 106 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg . SOLAR KEYMARK N° 078/000264",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO E BESL 400 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO E BESL 400  .  . -    Puissance appoint : 3,0 KW / Volume total ballon (Vtot) : 400 L  . -    Volume appoint électrique/volume solaire :  170/230 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,41 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 10,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,49 / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 10,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,50 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  260 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  465 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 00  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO BSL 400 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO BSL 400 .  . -  Volume total ballon (Vtot) : 400 L . -  Volume appoint électrique/volume solaire : 150/250 L . -  Coefficient pertes thermiques ballon (UA_S) :  2,41 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /  Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 270  . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 10,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,50 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO E BESL 400 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO E BESL 400  .  . -    Puissance appoint : 3,0 KW / Volume total ballon (Vtot) : 400 L  . -    Volume appoint électrique/volume solaire :  170/230 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,41 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 10,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,49 / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 10,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,50 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  260 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  465 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 00  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            [
                'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO BSL 200 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
                'selling_price' => 4000,
                'description' => "PREPARATEUR SOLAIRE UNO BSL 200 .  . -  Volume total ballon (Vtot) : 225 L  . -  Volume appoint électrique/volume solaire : 75/150 L  . -  Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /   Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 590 L/h . - Débit sur 10min à ?t 30 K T.eau froideb10°C Temp.de stockage ecs 65°C : 150 L/10 min . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 5,6 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 0,84 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 106 kg   /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
                'unit' => 0,

                'type' => 0,
                'p_brand_id' => 14,
                'p_work_id' => 5,
            ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO E BESL 200 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 200  .  . -    Volume total ballon (Vtot) :  225 L  . -    Volume appoint électrique/volume solaire :   95/130 L  . -   Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Puissance appoint : 1,5 KW . -   Capacité échangeur : De base (solaire) : 5,6 L   / appoint (résist. électr.): 5,1 L . -   Hauteur relative échangeur - De base (solaire) : 0,49   / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 5,6 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 0,84 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  155 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  250 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 20  . -   Poids net : 106 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO BSL 300 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 300 .  . -   Volume total ballon (Vtot) : 300 L . -  Volume appoint électrique/volume solaire : 105/195 L . -  Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h / Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 200  . -   Hauteur relative échangeur - de base (solaire) : 0,48   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 8,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,20 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 129 kg / Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ECOLED BALLON SOLAIRE 300L',
            //     'selling_price' => 3000,
            //     'description' => "PANNEAU PLAT : Taille : 1.2m . - Quantité : 2 piéces / Surface : bleu . - Absortion : 95% +- 2% :Emittance : 5% +- 2% . - Tuyau d'en-tête : ?22mm . - Cadre : profilé aluminium anodisé . - Couvercle en verre : Verre trempé extra clair à faible teneur en fer mistlite, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier . - Fluide antigel : glycol . - Poids : 30kg par unité . RESERVOIR D'EAU : Réservoir intérieur : US304-2B, épaisseur 1,2 mm, ?450 mm . - Réservoir extérieur : PVDF épaisseur 0,3 mm, ?550 mm . - hauteur réservoir : 1950mm . - Isolation : mousse de polyuréthane, épaisseur 50 mm . - Emittance : 5% +- 2% . - Tuyau d'en-tête : ?22mm . - Cadre : profilé aluminium anodisé . - Couvercle en verre : Verre trempé extra clair à faible teneur en fer mistlite, épaisseur 3,2 mm . - Bobine : non . - Capacité : 300L . - Taille trou : 1/2 pouce . SOLAR KEYMARK 011-7S2795 F / Contrôleur automatique SmartSystem",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 16,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ix  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 135 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 117 Kg - Volume :  295 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -     Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ESM  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ESM  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 138 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 122 Kg - Volume :  300 Litre - Dimension chauffe eau en mm : 580x1900 . -   Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -   Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,20 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ESM  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ESM  (x1 Panneau) . -    Profil de Charge : XL . -    COP Air 7°C :  3,2 . -    Classe Efficacité Énergétique Air 7°C :  A+   . -    Efficacité Énergétique Air 7°C : 132 % . -    Puissance Sonore Intérieure dB : 51  . -    Alimentation : 220-240 V / Hz / Monophasé / 50  . -    Températures Fonctionnement :  -5 | 45 °C  . -    Fluide Réfrigérant :  R134a / 1300 . -    Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -    Poids à Vide : 110 Kg - Volume :  250 Litre  . -     Dimension chauffe eau en mm : 580x1530 . -    Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -    Pression Max. Admissible : 7Bar  . -    Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,11 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -    Matériel : Aluminium Anodisé Solokote . -    Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -    Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -    Puissance Absorbée (Moy|Max) : 350 | 600 W   . -    Puissance Thermique (Moy|Max) W : 1250 | 2100  . -    Puissance Appoint Électrique : 1500 W . -    Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ESMS (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 130 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 110 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,11 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200i  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200i (x1 Panneau) . -   Profil de Charge :  L  . -   COP Air 7°C :  3,1   . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C % : 115  . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 94 Kg - Volume :  200 Litre - Dimension chauffe eau en mm : 580x1530 . -  Type de Protection Interne :Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -   Pertes Thermique : 0,99 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ixs (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ixs (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 128 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 107 Kg - Volume :  245 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Stain. Steel AISI1444  . -   Protection Cathodique : Magnesium Anode 11/4 Female . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ESM  (x1 Panneau)',
            //     'selling_price' => 3000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ESM (x1 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 119 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  200 Litre  . -   Dimension chauffe eau en mm : 580x1350 . -    Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -   Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,04 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR  300L ECOTOP 300i (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300i (x1 Panneau) . -     Profil de Charge : XL . -     COP Air 7°C :  3,3 . -     Classe Efficacité Énergétique Air 7°C :  A+   . -     Efficacité Énergétique Air 7°C : 137 % . -     Puissance Sonore Intérieure dB : 51  . -     Alimentation : 220-240 V / Hz / Monophasé / 50  . -     Températures Fonctionnement :  -5 | 45 °C  . -     Fluide Réfrigérant :  R134a / 1300 . -     Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -     Poids à Vide : 112 Kg - Volume :  300 Litre  . -      Dimension chauffe eau en mm : 580x1750 . -    Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -     Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -     Pression Max. Admissible : 7Bar  . -     Température Max. Admissible : °C 80  . -      Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -       Matériel : Aluminium Anodisé Solokote . -       Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -       Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -     Puissance Absorbée (Moy|Max) : 350 | 600 W   . -     Puissance Thermique (Moy|Max) W : 1250 | 2100  . -     Puissance Appoint Électrique : 1500 W . -     Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ESMS (x2 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 117 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  200 Litre  . -    Dimension chauffe eau en mm : 580x1350 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,04 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ESMS (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 136 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 122 Kg - Volume :  300 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,20 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ixs  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ixs (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 134 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 117 Kg - Volume :  295 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Stain. Steel AISI1444  . -   Protection Cathodique : Magnesium Anode 11/4 Female . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ix  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 127 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 107 Kg - Volume :  245 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -     Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300is  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300is (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 135 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 112 Kg - Volume :  300 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Inox AISI1444  - Protection Cathodique : Anode Mg (11/4 F)  . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR  250L ECOTOP 250i (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250i (x1 Panneau) . -     Profil de Charge : XL . -     COP Air 7°C :  3,2 . -     Classe Efficacité Énergétique Air 7°C :  A+   . -     Efficacité Énergétique Air 7°C : 130 % . -     Puissance Sonore Intérieure dB : 51  . -     Alimentation : 220-240 V / Hz / Monophasé / 50  . -     Températures Fonctionnement :  -5 | 45 °C  . -     Fluide Réfrigérant :  R134a / 1300 . -     Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -     Poids à Vide : 102 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -     Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -     Pression Max. Admissible : 7Bar  . -     Température Max. Admissible : °C 80  . -      Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -     Matériel : Aluminium Anodisé Solokote . -     Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -     Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -     Puissance Absorbée (Moy|Max) : 350 | 600 W   . -     Puissance Thermique (Moy|Max) W : 1250 | 2100  . -    Puissance Appoint Électrique : 1500 W . -     Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250is  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250is (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 129 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 102 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg (11/4 F)  . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male  . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ix  (x1 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 113 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  195 Litre  . -    Dimension chauffe eau en mm : 580x1720 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 0,99 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'THERMOBOIL 200 E',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : ENERGY PANEL . MODELE : THERMOBOIL 200 E . - Puissance nominale ECS W : 1600-2200 . - Consomation nominale W  :  400-600 . - COP : 2-5 . - Puissance thermique du système d'appui W :  1500 . - Puissance thermique max avec un appui électrique W  : 3700 . - Consomation max avec un appui électrique W :  2100 . - Alimentation électrique : V/ph/Hz 230/1/50 . - Réfrigérant : R134A . - Cycle d' extraction : L . - Épaisseur moyenne de l'isolement mm : 50 . - Dimensions de l'équipement (HxPxL) mm : 1452x601x550 . - Dimensions du panneau  (HxPxL) mm : 1700x800x25 . - Pression maximale du panneau  bar : 10 . - Poid panneau thermodinamique kg : 6.2 . - Poids à vide de l'équipement  kg : 92 . - Nombre panneaux : 1 . - Puissance sonore dBA : <30 . - Format  : Sol / Matériel : Inox . - Pression maximale de service bar : 6 . - Capacité L : 200 . - Type d`isolation : Injected polyurethane . - Transmission de chaleur moyenne . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 19,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 0,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 10 . 2 Capteurs en série  : 9 . 3 Capteurs en série : 6.5 . 4 Capteur :7.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 20 . 4 Capteur :20",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8 . 4 Capteur :9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 23 m . 2 Capteurs en parallèles : 13 . 2 Capteurs en série : 13",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR . 2/3  Capteur en parallèles : 17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8 . 4 Capteur :9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 26 m . 2 Capteurs en parallèles : 13 . 2 Capteurs en série : 13",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTURE: . 1 Capteur : 10 . 2 Capteurs en parallèles : 9 . 2 Capteurs en série : 6.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm . Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 11 m . 2 Capteurs en parallèles : 10,5 . 2 Capteurs en série : 9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 40 . 2 Capteurs en série  : 40 . 3 Capteurs en série : 33 . 4 Capteur :27",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 14",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 0,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 34/17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 40/28/15 . 2 Capteurs en série  : 28 . 3 Capteurs en série : 15",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 20 m . 2 Capteurs en parallèles : 12 . 2 Capteurs en série : 12",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 10 . 2 Capteurs en série  : 9 . 3 Capteurs en série : 6.5 . 4 Capteur :7.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 20 . 4 Capteur :20",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 40 . 2 Capteurs en série  : 40 . 3 Capteurs en série : 33 . 4 Capteur :27",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SYSTEMES SOLAIRES THERMODYNAMIQUES NEO250i/im',
            //     'selling_price' => 6200,
            //     'description' => "MARQUE / REFERENCE : GREENCOM / NEO250i/im . THERMOACCUMULATEUR : . - Dimensions (LxH) mm : 1860x560mm  . - Poids à vide  Kg : 76 . - Volume Litres : 250  . - Type de protection interne : Inox . - Protection cathodique : Anode de magnesium . - Connexions hydraulique (froide/chaude) . - Pression maximale Bar : 7 . - Pression de test Bar : 10 . - Température maximale de l'eau ºC : 70 . - Température de l'eau ºC : 55 . - Serpentine solaire (entrée/sortie) Neo250im-Neo180im Pouces : 1 .  . PANNEAU SOLAIRE THERMODYNAMIQUE : . - Matériau : Aluminium anodisé solokote . - Dimensions (LxHxE) Mm 1700x800x20 . - Pression max. De travail Bar : 12 . - Pression de test Bar : 15 . - Temp. Max. d'exposition ºC  :120 . - Temp. Min. de fonct. ºC : -5 . - Temp. Min. d´exposition ºC : -40 .  . GROUPE THERMODYNAMIQUE : . Puissance absorbée (moy/max) W : 390-590 . - Puissance thermique W  : 1690-2900 . - Puissance d'appui électrique W : 1500 . - Type de compresseur : Hermétique . - Niveau de bruit Db : 39 .  . CONNEXIONS FROGORIFIQUE :  . - Fluide frigorigène/QT Grs :  R134a 1000 800 . - Matériau de la tuyauterie : Cuivre (DHP ISO1337) . - Ligne liquide Pouces : 1/4 . - Ligne aspiration Pouces : 3/8 . - Alimentation V/Hz : 230 monophasé /50 .  CERTIFIER /  EN12975 SOLAR KEYMARK 011-7S3016F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 23,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SYSTEMES SOLAIRES THERMODYNAMIQUES NEO180im',
            //     'selling_price' => 6200,
            //     'description' => "MARQUE / REFERENCE : GREENCOM / NEO180im . THERMOACCUMULATEUR : . - Dimensions (LxH) mm : 1600x560 mm . - Poids à vide  Kg : 67 . - Volume Litres : 180  . - Type de protection interne : Inox . - Protection cathodique : Anode de magnesium . - Connexions hydraulique (froide/chaude) . - Pression maximale Bar : 7 . - Pression de test Bar : 10 . - Température maximale de l'eau ºC : 70 . - Température de l'eau ºC : 55 . - Serpentine solaire (entrée/sortie) Neo250im-Neo180im Pouces : 1 .  . PANNEAU SOLAIRE THERMODYNAMIQUE : . - Matériau : Aluminium anodisé solokote . - Dimensions (LxHxE) Mm 1700x800x20 . - Pression max. De travail Bar : 12 . - Pression de test Bar : 15 . - Temp. Max. d'exposition ºC  :120 . - Temp. Min. de fonct. ºC : -5 . - Temp. Min. d´exposition ºC : -40 .  . GROUPE THERMODYNAMIQUE : . Puissance absorbée (moy/max) W : 390-590 . - Puissance thermique W  : 1690-2900 . - Puissance d'appui électrique W : 1500 . - Type de compresseur : Hermétique . - Niveau de bruit Db : 39 .  . CONNEXIONS FROGORIFIQUE :  . - Fluide frigorigène/QT Grs :  R134a 1000 800 . - Matériau de la tuyauterie : Cuivre (DHP ISO1337) . - Ligne liquide Pouces : 1/4 . - Ligne aspiration Pouces : 3/8 . - Alimentation V/Hz : 230 monophasé /50 .  CERTIFIER /  EN12975 SOLAR KEYMARK 011-7S3016F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 23,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'HELIOFRANCE 300L',
            //     'selling_price' => 4500,
            //     'description' => "MARQUE : HELIO FRANCE . - Capacité totale de l'accumulateur 300 Litres . - Poids à vide  60 kg  . - Poids total plein  360 kg  . - Dimensions (H x L x P) 180 x 67 x 55 cm . - Température max de l'eau technique 85°C . - Pertes de chaleur à 60°C - Tin t = 70°c et Text = 20°c² 1,2 kWh/24h (Cr = 0,08 W.l -1.K-1) . - Système de remplissage de l'eau technique Intégré . - Nature du fluide caloporteur Eau Glycol . - Débit modulé Intégré Intégré . - Système de transfert du circuit solaire . - Volume de l'échangeur : 12 Litres . - Tension / Puissance : 230 V - 2,5 kW . CAPTEURS H232/ V232 ou équivalant  . - Dimensions hors tout (mm) 1 870 x 1 241 x 90  . - Surface brute 2,32 m²  . - Surfaces optique/absorbeur : 2,20 m²  . - Poids à vide :  41 kg  . - Contenance fluide : 1,8 litres  . - Inclinaison mini-maxi de 17° à 90° . - Pression de service max. 8 bars . - Température de stagnation MK1 : 212°C . - Vitrage Trempé, transparence 96% . - Absorbeur Aluminium à revêtement sous vide hautement sélectif . - Raccords hydrauliques Latéraux réversibles à raccord bi-cône diam ext. 12mm ou Solar-Connect* . - Caisson du capteur Profil en aluminium soudé aux angles . - Cuve garantie à vie, éléments statiques : 10 ans . CERTIFICAT SK0011 SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 25,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'MECAWOOL',
            //     'selling_price' => 0,
            //     'description' => 'MECAWOOL',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 28,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'MECAWOOL',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE EN FLOCONS A SOUFFLER',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 28,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCELL F',
            //     'selling_price' => 0,
            //     'description' => 'SOUFFLE EN OUATE DE CELLULOSE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 29,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'IBR REVETU KRAFT',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du IBR REVETU KRAFT est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT.',
            //     'selling_price' => 0,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35',
            //     'selling_price' => 45,
            //     'description' => "L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOLENE 4',
            //     'selling_price' => 45,
            //     'description' => "La laine à souffler ISOLENE 4 est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . ISOLENE 4 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'IBR REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'IBR REVETU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'IBR NU (300mm)',
            //     'selling_price' => 0,
            //     'description' => 'IBR NU (300mm)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'IBR NU',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU NON KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE DEROULE REVETU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'IBR revêtu kraft',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ISOLENE 4',
            //     'selling_price' => 0,
            //     'description' => 'LAINE MINERALE A SOUFFLER ISOLENE 4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ECOLAINE',
            //     'selling_price' => 45,
            //     'description' => "Le rouleau de laine de verre Ecolaine de Isover est principalement destiné à l'isolation des combles aménagés. Composé de laine de verresouple et revêtu de kraft, il permet d'améliorer l'isolation thermique et acoustique de tous types de logements, en neuf et en rénovation.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 32,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'TI 212',
            //     'selling_price' => 0,
            //     'description' => 'TI 212',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'THERMO 046',
            //     'selling_price' => 0,
            //     'description' => 'THERMO 046',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'THERMO LOFT',
            //     'selling_price' => 0,
            //     'description' => 'THERMO LOFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SUPAFIL LOFT 045',
            //     'selling_price' => 0,
            //     'description' => 'SUPAFIL LOFT 045',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ACOUSTILAINE 035',
            //     'selling_price' => 0,
            //     'description' => 'ACOUSTILAINE 035 Isolation des murs',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'THERMO LOFT',
            //     'selling_price' => 0,
            //     'description' => 'LAINE A SOUFFLER',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP120 R3',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP300 R7.5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP80 R2',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP200 R5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP320 R8',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP240 R6',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP280',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP160 R4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP140 R3,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP180 R4,50',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP60 R1,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP260 R6,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP100 R2,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ACOUSTIPLUS 032',
            //     'selling_price' => 45,
            //     'description' => "ACOUSTIPLUS 032 est un panneau de laine de verre roulé semi-rigide à très haute performance thermique revêtu d'un surfaçage kraft. . Isolation des murs et toitures.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 35,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SUPAFIL',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE SOUFFLEE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 35,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'EGO 110',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 110  . - Dimensions externes (L x P x H) : 2.136 x 711 x 217mm  . - Surface brute : 620mm . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta : 1,52 m2  . - Surface d'ouverture : 1,09 m2  . - Surface d'absorption : 0,85 m2  . - Contenu effectif d'ACS : 105 litri  . - Couverture des besoins : 1-2  . - Poids net (à vide) : 36 kg  . - Poids en fonctionnement (plein) : 141 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'EGO 260',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 260 . - Dimensions externes (L x P x H) :  2.136 x 1.491 x 217mm . - Surface brute :  1170mm . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  3,18 m2 . - Surface d'ouverture :  2,64 m2 . - Surface d'absorption :  1,98 m2 . - Contenu effectif d'ACS :  245 litri . - Couverture des besoins : 5-6 . - Poids net (à vide) :  65 kg . - Poids en fonctionnement (plein) :  310 kg . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'EGO 220',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 220 . - Dimensions externes (L x P x H) :  2.136 x 1.296 x 217mm  . - Surface brute :  1035mm  . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  2,77 m2  . - Surface d'ouverture :  2,25 m2 . - Surface d'absorption :  1,69 m2  . - Contenu effectif d'ACS :  210 litri  . - Couverture des besoins :  4-5  . - Poids net (à vide) : 57 kg  . - Poids en fonctionnement (plein) : 267 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'EGO 150',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 150 . - Dimensions externes (L x P x H) : 2.136 x 906 x 217mm  . - Surface brute : 760mm  . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  1,93 m2  . - Surface d'ouverture :  1,48 m2  . - Surface d'absorption : 1,13 m2  . - Contenu effectif d'ACS : 140 litres . - Couverture des besoins :  2-3  . - Poids net (à vide) :  43 kg . - Poids en fonctionnement (plein) :  183 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'EGO 180',
            //     'selling_price' => 0,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 180 . - Dimensions externes (L x P x H) : 2.136 x 1,101 x 217mm  . - Surface brute : 895mm  . - Dimensione passo staffe (B) : 2050mm . - Superficie bruta :  2,35 m2  . - Surface d'ouverture :  1,86 m2 2 . - Surface d'absorption : 1,41 m2  . - Contenu effectif d'ACS : 175 litri  . - Couverture des besoins :  3-4  . - Poids net (à vide) : 50 kg  . - Poids en fonctionnement (plein) : 225 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'POWERBLOW',
            //     'selling_price' => 0,
            //     'description' => 'POWERBLOW',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 44,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'JETROCK',
            //     'selling_price' => 0,
            //     'description' => 'JETROCK',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ROCKPRIME',
            //     'selling_price' => 0,
            //     'description' => "La laine de roche par soufflage ROCKPRIME est la solution la plus performante pour isoler les combles difficiles d'accès. . ROCKPRIME est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ROCKin L',
            //     'selling_price' => 0,
            //     'description' => 'ROCKin L',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'LOFT 470',
            //     'selling_price' => 0,
            //     'description' => 'LOFT 470',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ROCKCIEL',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCIEL EP220 R5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'JETROCK2',
            //     'selling_price' => 0,
            //     'description' => 'JETROCK2 EP315 R7,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ROCKCIEL',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCIEL EP220 R5,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'ROCKCOMBLE',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCOMBLE  EP60 R',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'JETROCK',
            //     'selling_price' => 0,
            //     'description' => "LAINE DE ROCHE EN VRAC POUR COMBLE PERDU A' PROJETER",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SOLITANK 200 / WUNDER ALS 2510',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0001  . - HAUTEUR (mm) 1245  DIAMETRE (mm) 542  . - POIDS NET (kg) 75  . - VOLUME / CUBAGE (lt) 170  . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 1  . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS / 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs :  « Eau glycolée »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SOLIKOMBI 500 / WUNDER ALS',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0367 . - HAUTEUR (mm) 1653  DIAMETRE (mm) 750 / 807 . - POIDS NET (kg) 100 . - VOLUME / CUBAGE (lt) 454 . - ISOLANT :  50 mm /40 kg/m³ / 80 mm /18 kg/m³ . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 4.18 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS 1808/ 2108/ 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs : « eau » / « eau glycolée » / « eau + antigel »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SOLIKOMBI 300 / WUNDER ALS',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0367 . - HAUTEUR (mm) 1770  DIAMETRE (mm) 542  . - POIDS NET (kg) 85 . - VOLUME / CUBAGE (lt) 245 . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS 1808/ 2108/ 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs : « eau » / « eau glycolée » / « eau + antigel »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SOLITANK 300 / WUNDER ALS 2510',
            //     'selling_price' => 4500,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0002 . - HAUTEUR (mm) 1770  DIAMETRE (mm) 542  . - POIDS NET (kg) 85 . - VOLUME / CUBAGE (lt) 245 . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS / 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs :  « Eau glycolée »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE   SC-150L',
            //     'selling_price' => 4000,
            //     'description' => "Marque : SUNCOMPACT  . - SOLAR KEYMARK 011-7S2795 F . - CHAUFFE-EAU SOLAIRE INDIVIDUEL INNOVANT PLUG&PLAY. . -  CHAUFFE-EAU SOLAIRE INDIVIDUEL AVEC CAPTEUR .   SOLAIRE THERMIQUE AUTO STOCKER INTEGRANT UN BALLON D'EAU CHAUDE. . - Référence : SC-150L . - Certifié Solar Keymark numéro licence : 011-7S2956 A . - Capacité du préparateur intégré : 150 L . - Profil de soutirage : (M) pour l'Énergie d'appoint par PAC ou chaudière à condensation au gaz. . -  Profil de soutirage : (L) pour l'Énergie d'appoint à effet Joule, ballon ECS électrique . - ETAS : 95 % . - Surface brut /Net 2.05m²/1.68m² . - Dimension / Poids : L x I x H : 2.220mm x 920mm x 198mm / 63kg . - Boitier du collecteur : EPP avec protection résistant aux UV . - Absorbeur : Acier, revêtement sélectif . - Absorption : 91% . - Raccordement : M3/4 . - SUNCOMPACT E : Résistance électrique 1KW, Monophasé . - Isolation thermique : 0.036W/mk . - Capacité du réservoir tampon : 150 litre d'eau chaude technique   . - Sortie d'eau douce : env.230L/ jours à 40° si ballon est à 70°C . - Volume de l'échangeur de chaleur / 9.2 litre  . - Résistance à la compression de l'échangeur de chaleur : 10 bar . - Matériau du réservoir de stockage : Acier ST235 . Nature du fluide : Eau glycolée",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 53,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SUNPACKS 300',
            //     'selling_price' => 5000,
            //     'description' => "MARQUE : SUNPACKS / REFERENCE :  SUNPACKS 300 . - Capacité : 300 . - Aire brute du collecteur 3,810 m2 (2x1,905 m2) . - Aire d'ouverture du collecteur  3,256 m2 (2x1,628 m2) . - Dimension HxLxP : 2140X890X226 mm (x2) . - Isolation : ESPP . - Max. température de fonctionnement : 80 degrés centigrades . - Pression de service : 4 Bar . - Elément chauffant : 1,5KW (x2) . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 6 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 54,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'SUNPACKS 150',
            //     'selling_price' => 3500,
            //     'description' => "MARQUE : SUNPACKS / REFERENCE :  SUNPACKS 150 . - Capacité : 150  . - Aire brute du collecteur 1,905 m2  . - Aire d'ouverture du collecteur 1,628 m2 . - Dimension HxLxP : 2140X890X226 mm . - Isolation : ESPP . - Max. température de fonctionnement : 80 degrés centigrades . - Pression de service : 4 Bar . - Elément chauffant : 1,5KW . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 3 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 54,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE-EAU SOLAIR SUNPAD',
            //     'selling_price' => 3500,
            //     'description' => "CHAUFFE-EAU SOLAIR SUNPAD . Surface brute / surface nette :  2,05 m² / 1,68 m² . Dimensions : 2220 mm x 920 mm x 190 mm . Poids à vide : 73 kg . Boitier collecteur : EPP avec peinture protégée contre UVA . Absorbeur : Acier, enduit sélectif . Absorption : 91 % . Liaisons : 3/4' personnalisation possible . SUNPAD E : Résistance électrique 1 kW . Isolation thermique : 0,036 WmK . Stockage : 150 litres . Volume échangeur : 9,2 litres . Composition échangeur : Acier inoxydable 1.4404 AISI 316L . Pression de l'échangeur : 10 bars . Composition stockage : Acier ST235",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 55,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'CHAUFFE-EAU SOLAIRE SPM 150L',
            //     'selling_price' => 3500,
            //     'description' => 'MARQUE : SUNTASK / REFERENCE : SPM 150L . - Capacité : 150 L . - Superficie brute : 1,75m² . - Dimension HxLxP : 2184X804X212 mm / Poids : 60 Kg . - Isolation : ESPP . - Max. température de fonctionnement : 95° degrés centigrades . - Pression de service : 5 Bar . - Tige chauffante :  Optionnel 1KW/2KW . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 3 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 56,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'PACK E - 2 PANNEAUX SOLAIRE COMPLET ASTREA  200L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  2 panneaux solaires avec fixations (volume du ballon 200L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 2 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'PACK E - 1 PANNEAUX SOLAIRE COMPLET ASTREA  200L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  1 panneaux solaires avec fixations (volume du ballon 200L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 1 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'PACK E - 3 PANNEAUX  SOLAIRE COMPLET ASTREA  300L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  3 panneaux solaires avec fixations (volume du ballon 300L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 3 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'PACK E - 2 PANNEAUX  SOLAIRE COMPLET ASTREA  300L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  2 panneaux solaires avec fixations (volume du ballon 300L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 2 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'E-MRK40 - URSA',
            //     'selling_price' => 45,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du URSA TERRA MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond, il peut être associé à notre système URSA SECO, pour une parfaite étanchéité à l'air.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'E-MRK 35',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé . . L'isolation thermique parfaite du URSA  MRK 35 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'E-MRK40',
            //     'selling_price' => 45,
            //     'description' => "L'isolation thermique parfaite du URSA TERRA E-MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond, il peut être associé à notre système URSA SECO, pour une parfaite étanchéité à l'air.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'URSA P-MRK 35',
            //     'selling_price' => 45,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé . . L'isolation thermique parfaite du URSA  P-MRK 35 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => "PULS'R 47",
            //     'selling_price' => 45,
            //     'description' => "La laine à souffler URSA PULS'R est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . URSA PULS'R 47 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'E-LAINE VERRE 40 RP',
            //     'selling_price' => 0,
            //     'description' => 'E-LAINE VERRE 40 RP',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'URSA F-M1021',
            //     'selling_price' => 0,
            //     'description' => 'URSA F-M1021',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'E-MRK 35',
            //     'selling_price' => 55,
            //     'description' => 'E-MRK 35',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'URSA P-M1021',
            //     'selling_price' => 0,
            //     'description' => 'URSA P-M1021',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => "URSA PULS'R 47",
            //     'selling_price' => 0,
            //     'description' => "URSA PULS'R 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => "URSA SOUFL'R 47",
            //     'selling_price' => 0,
            //     'description' => "La laine à souffler URSA SOUFL'R 47 est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . URSA PULS'R 47 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => 'URSA P-MRK 40',
            //     'selling_price' => 0,
            //     'description' => "L'isolation thermique parfaite du URSA P-MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 5,
            // ],
            // // rampant

            // [
            //     'designation' => 'TETRIS SUPER 12',
            //     'selling_price' => 45,
            //     'description' => "TETRIS-SUPER 12 offre une résistance thermique intrinsèque R = 6,30 m.K/W. . C'est un matériau isolant souple et résilient, étanche à l'air, qui absorbe et atténue les vibrations sonores. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 1,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLERIO EC 300',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : EC 300 . - Capacité (L)  : 300 . - consommation d'entretien kWh/24h : 2,97 . - constante de refroidissement Wh/24h/l/K : 0,21 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c : 85  . - indice de protection : iP21 . - hauteur mm : 1780 . - Profondeur mm : 653 . - Profondeur vase d'expansion déporté mm : 584  . - largeur mm : 787  . - Poids à vide sans station kg : 95 . - Poids à vide avec station kg :  105 . - Poids en charge avec statio kg :  395 . - surface échangeur solaire m2 : 1 . - Puissance solaire kW :  34 . - Perte de charge mbar :  31 . - Volume échangeur :  6,3 . - Pression maxi échangeur bar : 6 . - Volume solaire : 110 . - Puissance résistance kW : 2,4 . - alimentation V : 230/400  . - type : - stéatite . - Volume appoint électrique :  184  . - température maxi appoint électrique °c :  65 +/-5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLERIO EC 200',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : EC 200 . - Capacité (L)  : 200 . - consommation d'entretien kWh/24h :2,21 . - constante de refroidissement Wh/24h/l/K : 0,23 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c :85 . - indice de protection :iP21 . - hauteur mm :1279 . - Profondeur mm :653 . - Profondeur vase d'expansion déporté mm : 584 . - largeur mm : 787 . - Poids à vide sans station kg : 65 . - Poids à vide avec station kg : 75 . - Poids en charge avec statio kg : 265 . - surface échangeur solaire m2 : 0,83 . - Puissance solaire kW : 28 . - Perte de charge mbar : 27 . - Volume échangeur :  5,8 . - Pression maxi échangeur bar :6 . - Volume solaire : 100  . - Puissance résistance kW : 1,8 . - alimentation V : 230/400 . - type :  stéatite  . - Volume appoint électrique :  90 . - température maxi appoint électrique °c : 65 +/-5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLERIO EC 400',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : EC 400 . - Capacité (L)  :  390 . - consommation d'entretien kWh/24h : 3,55 . - constante de refroidissement Wh/24h/l/K : 0,19 . - Pression maxi d'utilisation circuit sanitaire bar : 6 . - Pression d'épreuve bar : 12 . - température maximum d'utilisation °c : 85 . - indice de protection : iP21 . - hauteur mm : 163 . - Profondeur mm : 694 . - Profondeur vase d'expansion déporté mm : 678  . - largeur mm :  911 . - Poids à vide sans station kg :  151 . - Poids à vide avec station kg :  161 . - Poids en charge avec statio kg : 546 . - surface échangeur solaire m2 : 1 . - Puissance solaire kW :  34 . - Perte de charge mbar :  31 . - Volume échangeur : 6,3 . - Pression maxi échangeur bar :6 . - Volume solaire : 160 . - Puissance résistance kW :2,4 . - alimentation V : 230/400 . - type : stéatite . - Volume appoint électrique :  225 . - température maxi appoint électrique °c :  65 +/-5 101",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK BOLLON SOLAIRE 300L + 2 PANNEAU',
            //     'selling_price' => 5000,
            //     'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 300L . - Hauteur : 1910 mm . - Profil de soutirage : XXL . - Réservoir intérieur : SUS304-2B, 1,2 mm d'épaisseur, Ø450 mm . - Réservoir extérieur : PVDF 0,3 mm d'épaisseur, Ø550 mm . - Isolation : mousse de polyuréthane, 50 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression . CAPTEUR SOLAIRE THERMIQUE . - Taille : 100 x 200 cm . - Quantité pack : 2 panneaux . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé,  0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 8,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK BOLLON SOLAIRE 200L + 2 PANNEAU',
            //     'selling_price' => 5000,
            //     'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 200L . - Hauteur : 1910 mm . - Profil de soutirage : XL . - Réservoir intérieur : SUS304-2B, . - 1,2 mm d'épaisseur, Ø370 mm . - Réservoir extérieur : PVDF . - 0,3 mm d'épaisseur, Ø460 mm . - Isolation : mousse de polyuréthane, . - 45 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression .  . CAPTEUR SOLAIRE THERMIQUE :  2 PANNEAU . - Taille : 125 x 200 cm . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair . - à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé, . - 0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 8,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK BOLLON SOLAIRE 200L + 1 PANNEAU',
            //     'selling_price' => 5000,
            //     'description' => "MARQUE : BECKER ENERGY  . BALLON D'EAU CHAUDE . - Capacité : 200L . - Hauteur : 1910 mm . - Profil de soutirage : XL . - Réservoir intérieur : SUS304-2B, . - 1,2 mm d'épaisseur, Ø370 mm . - Réservoir extérieur : PVDF . - 0,3 mm d'épaisseur, Ø460 mm . - Isolation : mousse de polyuréthane, . - 45 mm d'épaisseur . - Taille des trous : 1/2 pouce . - Chauffage électrique : 1500W, 220-240V . - Tige de magnésium : 1 pouce, anti-calcaire . - Soupape T/P : 1/2 pouce, décharge de pression .  . CAPTEUR SOLAIRE THERMIQUE : 1 PANNEAU . - Taille : 125 x 200 cm . - Revêtement : bleu sélectif . - Absorption de l'absorbeur : 95% ± 2% . - Ermittance de l'absorbeur : 5% ± 2% . - Tube collecteur : Ø22 mm . - Cadre : profilé en aluminium anodisé . - Type de verre : verre trempé extra clair . - à faible teneur en fer, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier galvanisé, . - 0,4mm d'épaisseur . - Fluide antigel : glycol . - Poids : 30kg . CERTIFICATION : SOLAR KEYMARK  . EN12975-1,2:2006 + A1:2010 EN12976-1:2006 EN12976-2:2006 . Usine ISO 9001 ISO9806:2013",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 8,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'AQUATEK 260 L',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : CLIMER . - Modèle :   AK260 . - Capacitè, L :  260 . - Pression maximale, bar :  6 . Données pompe à chaleur . - Classe energetica : A . - Profil de charge :  XL . - Puissance thermique en W *  : 1430-2560 . - Puissance consommée en W  : 450-540 . - COP * 2,5-4,6 . - Température maximale BC en °C 55 . - Température maximale de la résistance en °C 70 . - Gaz réfrigérant :  R134A . Données électriques . -Alimentation électrique en V/ph/Hz :  230/1/50 . - Puissance résistance électrique en W : 1500 . - Puissance électrique absorbée en W : 2100 . - Eficiency (%) / AEC kWh : 109 / 1540 . Panneaux . - Nombre de panneaux : 2 . - Pression maximale panneaux en Bar : 10 . - Entrée/sortie du panneau solaire principal  : 1/2 - 1/2 . - Entrée/sortie du panneau solaire segondaire : 3/8 - 1/4 . - Entrée/sortie du panneau solaire segondaire . Configuration Au sol . A, mm 585 B, mm 587 C, mm  1945 D, mm 1323 E, mm 217 F, mm 194 . Entrée Sortie d'eau en Pouce : 3/4 . Entrée Sortie Gaz réfrigérant en Pouce : 3/8 - 1/4 . Entrée Sortie d'eau en Pouce :  1/2 - 1/2 . Nature du fluide capteurs : Eau . Certification et norme capteurs :  SOLAR KEYMARK 011-7S2795F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOHEAT TD - 160 L - EH160 TD',
            //     'selling_price' => 3000,
            //     'description' => 'MARQUE : CLIMER  . REFERENCE :  EH160 TD . - Capacité en L : 160 . - Classe énergétique : A  . - Profil de charge : L  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4 . SOLAR KEYMARK 011-7S2795 F',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOHEAT TD - 200 L - EH200 TD',
            //     'selling_price' => 4100,
            //     'description' => 'MARQUE : CLIMER  . REFERENCE :  EH200 TD . - Capacité en L : 200 . - Classe énergétique : A  . - Profil de charge : L  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'AQUATEK 200 L',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : CLIMER . - Modèle :   AK200 . - Capacitè, L :  200 . - Pression maximale, bar :  6 . Données pompe à chaleur . - Classe energetica : A . - Profil de charge :  L . - Puissance thermique en W *  : 1430-2560 . - Puissance consommée en W  : 450-540 . - COP * 2,5-4,6 . - Température maximale BC en °C 55 . - Température maximale de la résistance en °C 70 . - Gaz réfrigérant :  R134A . Données électriques . -Alimentation électrique en V/ph/Hz :  230/1/50 . - Puissance résistance électrique en W : 1500 . - Puissance électrique absorbée en W : 2100 . - Eficiency (%) / AEC kWh : 105/ 973  . Panneaux . - Nombre de panneaux : 2 . - Pression maximale panneaux en Bar : 10 . - Entrée/sortie du panneau solaire principal  : 1/2 - 1/2 . - Entrée/sortie du panneau solaire segondaire : 3/8 - 1/4 . - Entrée/sortie du panneau solaire segondaire . Configuration Au sol . A, mm 585 B, mm 587 C, mm 1527  D, mm 956  E, mm 217 F, mm 194 . Entrée Sortie d'eau en Pouce : 3/4 . Entrée Sortie Gaz réfrigérant en Pouce : 3/8 - 1/4 . Entrée Sortie d'eau en Pouce :  1/2 - 1/2 . Nature du fluide capteurs : Eau . Certification et norme capteurs :  SOLAR KEYMARK 011-7S2795F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOHEAT TD - 260 L - EH260 TD',
            //     'selling_price' => 4100,
            //     'description' => 'MARQUE : CLIMER  . REFERENCE :  EH260 TD . - Capacité en L : 260 . - Classe énergétique : A  . - Profil de charge : XL  . - Puissance thermique en W : 1430-2560 . - Puissance consommée en W : 450-540  . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 1 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOHEAT TD - 500 L - EH500 TD',
            //     'selling_price' => 4000,
            //     'description' => 'MARQUE : CLIMER  . REFERENCE :  EH500 TD . - Capacité en L : 500 . - Classe énergétique : A  . - Profil de charge : XXL  . - Puissance thermique en W : 2860-5120 . - Puissance consommée en W : 900-1080 . - COP : 2,5 - 4,6  . - Gaz réfrigérant : R134a  . - Puissance résistance électrique en W : 1500  . PANNEAU THERMODYNAMIQUE :  . - Nombre de panneaux : 2 . - Dimension en mm : 1700x800  . - Pression maximale panneau en bar : 10  . - Entrée/sortie du panneau en pouce : 3/8-1/4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 12,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO BSL 300 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 300 .  . -   Volume total ballon (Vtot) : 300 L . -  Volume appoint électrique/volume solaire : 105/195 L . -  Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h / Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 200  . -   Hauteur relative échangeur - de base (solaire) : 0,48   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 8,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,20 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 129 kg / Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CESI 300L INISOL UNO E 300 / DIETRISOL PRO D230 OU EQUIVALENT',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 300  . -     Puissance appoint : 2,3 KW / Volume total ballon (Vtot) :  300 L  . -    Volume appoint électrique/volume solaire :   135/165 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 8,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,48  / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) 8,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,20 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  210 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  360 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 10  . -   Poids net : 129 kg  / Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg . Certification : SOLAR KEYMARK N° 078/000264",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO BSL 200 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 200 .  . -  Volume total ballon (Vtot) : 225 L  . -  Volume appoint électrique/volume solaire : 75/150 L  . -  Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /   Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 590 L/h . - Débit sur 10min à ?t 30 K T.eau froideb10°C Temp.de stockage ecs 65°C : 150 L/10 min . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 5,6 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 0,84 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 106 kg   /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO E BESL 300 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 300  .  . -     Puissance appoint : 2,3 KW / Volume total ballon (Vtot) :  300 L  . -    Volume appoint électrique/volume solaire :   135/165 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 8,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,48  / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) 8,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,20 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  210 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  360 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 10  . -   Poids net : 129 kg  / Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO BSL 400 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 400 .  . -  Volume total ballon (Vtot) : 400 L . -  Volume appoint électrique/volume solaire : 150/250 L . -  Coefficient pertes thermiques ballon (UA_S) :  2,41 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /  Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 270  . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 10,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,50 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CESI 200L INISOL UNO E BESL 200  / INISOL DH 200SL OU EQUIVALENT',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 200  .  . -    Volume total ballon (Vtot) :  225 L  . -    Volume appoint électrique/volume solaire :   95/130 L  . -   Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Puissance appoint : 1,5 KW . -   Capacité échangeur : De base (solaire) : 5,6 L   / appoint (résist. électr.): 5,1 L . -   Hauteur relative échangeur - De base (solaire) : 0,49   / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 5,6 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 0,84 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  155 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  250 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 20  . -   Poids net : 106 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /   Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg . SOLAR KEYMARK N° 078/000264",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO E BESL 400 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 400  .  . -    Puissance appoint : 3,0 KW / Volume total ballon (Vtot) : 400 L  . -    Volume appoint électrique/volume solaire :  170/230 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,41 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 10,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,49 / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 10,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,50 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  260 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  465 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 00  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO BSL 400 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 400 .  . -  Volume total ballon (Vtot) : 400 L . -  Volume appoint électrique/volume solaire : 150/250 L . -  Coefficient pertes thermiques ballon (UA_S) :  2,41 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /  Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/ T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 270  . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 10,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,50 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 400L INISOL UNO E BESL 400 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 400  .  . -    Puissance appoint : 3,0 KW / Volume total ballon (Vtot) : 400 L  . -    Volume appoint électrique/volume solaire :  170/230 L  . -   Coefficient pertes thermiques ballon (UA_S) : 2,41 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Capacité échangeur : De base (solaire) : 10,1 L  / appoint (résist. électr.): 5,1 L . -  Hauteur relative échangeur - De base (solaire) : 0,49 / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 10,1 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 1,50 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  260 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  465 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 00  . -   Poids net : 156 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO BSL 200 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 200 .  . -  Volume total ballon (Vtot) : 225 L  . -  Volume appoint électrique/volume solaire : 75/150 L  . -  Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h  /   Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C temp.ecs 45°C/temp.primaire à 80°C : 590 L/h . - Débit sur 10min à ?t 30 K T.eau froideb10°C Temp.de stockage ecs 65°C : 150 L/10 min . -   Hauteur relative échangeur - de base (solaire) : 0,49   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 5,6 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 0,84 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 106 kg   /  Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 200L INISOL UNO E BESL 200 A APPOINT ELECTRIQUE / CAPTEURS SOLAIRES DIETRISOL PRO D230',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO E BESL 200  .  . -    Volume total ballon (Vtot) :  225 L  . -    Volume appoint électrique/volume solaire :   95/130 L  . -   Coefficient pertes thermiques ballon (UA_S) : 1,67 W/K  . -   Fraction ballon réchauffée par l'appoint (F_aux) : 0,499 . -   Puissance appoint : 1,5 KW . -   Capacité échangeur : De base (solaire) : 5,6 L   / appoint (résist. électr.): 5,1 L . -   Hauteur relative échangeur - De base (solaire) : 0,49   / appoint (résist. électr.): 0   . -   Capacité de l'échangeur solaire- De base (solaire) : 5,6 L  . -   Surface d'échange de l'échangeur solaire - de base (solaire) : 0,84 m2  . -   Volume d'eau disponible à 40 °C (VES 40) en chauffe nocturne :  155 L  . -   Volume d'eau dispo. à 40 °C (VES 40) en chauffe nocturne + 2 h diurne :  250 L  . -   Temps de réchauffage élec. (de 15 à 60 °C) : 3 h 20  . -   Poids net : 106 kg  /  Classe d'efficacité énergétique :  C .  . CAPTEURS SOLAIRES DIETRISOL PRO D230 POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -    Superficie hors-tout (Ag) : 2,3 m2  /  Superficie d'entrée (Aa) : 2,17 m2 . -    Aire de l'absorbeur (AA) : 2,15 m2 / Efficacité énergétique Eta_col40 : 64% . -    Contenance en fluide :  2,1 L  /  Débit préconisé : 30 l/h.m2 . -    Perte de charge (30 l/h.m2 ) : 7 Mbar /  Pression d'épreuve : 10Bar . -    Facteur d'absorption (a) : 95+/-1%  . -    Émissivité (?) % 5+/-1 Rendement optique (?0) : 82%  . -    Coefficient de pertes de 1er ordre (a1) : 3,941 W/m2. K . -    Coefficient de pertes de 2e ordre (a2) : 0,015 W/m2. K2 . -    Facteur d'angle d'incidence (?50) : 94%  /  Poids à vide 37kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTÈMES SOLAIRES CESI 300L INISOL UNO BSL 300 A APPOINT HYDRAULIQUE / CAPTEURS SOLAIRES INISOL DH 200SL',
            //     'selling_price' => 4000,
            //     'description' => "PREPARATEUR SOLAIRE UNO BSL 300 .  . -   Volume total ballon (Vtot) : 300 L . -  Volume appoint électrique/volume solaire : 105/195 L . -  Coefficient pertes thermiques ballon (UA_S) : 2,04 W/K  . -  Fraction ballon réchauffée par l'appoint (F_aux) : 0,42  . -  Débit primaire :  2 m3 /h / Température primaire : 80°C . -  Puissance échangée T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 24 kW . - Débit horaire à ?t 35 K T.eau froide 10°C T.ecs 45°C/T.primaire à 80°C : 590 L/h . - Débit sur 10 min à ?t 30 K T.eau froideb10°C T.de stockage ecs 65°C : L/10 min 200  . -   Hauteur relative échangeur - de base (solaire) : 0,48   / appoint (chaud.) : 0   . -   Capacité échangeur - de base (solaire) : 8,1 L / appoint (chaud.) : 5,1L  . -   Surface d'échange - de base (solaire) : 1,20 m2 / appoint (chaud.) : 0,76 m2  . -   Poids net : 129 kg / Classe d'efficacité énergétique :  C  .  . CAPTEURS SOLAIRES INISOL DH 200SL POUR LA PRÉPARATION DE ECS ET/OU L'APPOINT AU CHAUFFAGE .  . -   Superficie hors-tout : (Ag)  2,02 m2 . -   Efficacité énergétique Eta_col40 : 55% . -  Contenance en fluide : 1,1 L   /   Débit préconisé :   30 l/h.m2 . -  Perte de charge (30 l/h.m2) : 0,56 Mbar . -  Pression d'épreuve :  10 bar  /   Émissivité (?) : 5+/-1%  . -  Facteur d'absorption (a) :  95+/-1%  /  Rendement optique (?0) : 0,732  . -  Coefficient de pertes de 1er ordre (a1) : 3,86 W/m2. K . -  Coefficient de pertes de 2e ordre (a2) : 0,017 W/m2. K2 . -  Facteur d'angle d'incidence (K?) : 0,95 %  /  Poids à vide : 27 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOLED BALLON SOLAIRE 300L',
            //     'selling_price' => 3000,
            //     'description' => "PANNEAU PLAT : Taille : 1.2m . - Quantité : 2 piéces / Surface : bleu . - Absortion : 95% +- 2% :Emittance : 5% +- 2% . - Tuyau d'en-tête : ?22mm . - Cadre : profilé aluminium anodisé . - Couvercle en verre : Verre trempé extra clair à faible teneur en fer mistlite, épaisseur 3,2 mm . - Isolation : laine de roche . - Plaque arrière : tôle d'acier . - Fluide antigel : glycol . - Poids : 30kg par unité . RESERVOIR D'EAU : Réservoir intérieur : US304-2B, épaisseur 1,2 mm, ?450 mm . - Réservoir extérieur : PVDF épaisseur 0,3 mm, ?550 mm . - hauteur réservoir : 1950mm . - Isolation : mousse de polyuréthane, épaisseur 50 mm . - Emittance : 5% +- 2% . - Tuyau d'en-tête : ?22mm . - Cadre : profilé aluminium anodisé . - Couvercle en verre : Verre trempé extra clair à faible teneur en fer mistlite, épaisseur 3,2 mm . - Bobine : non . - Capacité : 300L . - Taille trou : 1/2 pouce . SOLAR KEYMARK 011-7S2795 F / Contrôleur automatique SmartSystem",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 16,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ix  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 135 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 117 Kg - Volume :  295 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -     Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ESM  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ESM  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 138 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 122 Kg - Volume :  300 Litre - Dimension chauffe eau en mm : 580x1900 . -   Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -   Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,20 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ESM  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ESM  (x1 Panneau) . -    Profil de Charge : XL . -    COP Air 7°C :  3,2 . -    Classe Efficacité Énergétique Air 7°C :  A+   . -    Efficacité Énergétique Air 7°C : 132 % . -    Puissance Sonore Intérieure dB : 51  . -    Alimentation : 220-240 V / Hz / Monophasé / 50  . -    Températures Fonctionnement :  -5 | 45 °C  . -    Fluide Réfrigérant :  R134a / 1300 . -    Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -    Poids à Vide : 110 Kg - Volume :  250 Litre  . -     Dimension chauffe eau en mm : 580x1530 . -    Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -    Pression Max. Admissible : 7Bar  . -    Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,11 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -    Matériel : Aluminium Anodisé Solokote . -    Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -    Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -    Puissance Absorbée (Moy|Max) : 350 | 600 W   . -    Puissance Thermique (Moy|Max) W : 1250 | 2100  . -    Puissance Appoint Électrique : 1500 W . -    Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ESMS (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 130 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 110 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,11 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200i  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200i (x1 Panneau) . -   Profil de Charge :  L  . -   COP Air 7°C :  3,1   . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C % : 115  . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 94 Kg - Volume :  200 Litre - Dimension chauffe eau en mm : 580x1530 . -  Type de Protection Interne :Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -   Pertes Thermique : 0,99 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ixs (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ixs (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 128 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 107 Kg - Volume :  245 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Stain. Steel AISI1444  . -   Protection Cathodique : Magnesium Anode 11/4 Female . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ESM  (x1 Panneau)',
            //     'selling_price' => 3000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ESM (x1 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 119 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  200 Litre  . -   Dimension chauffe eau en mm : 580x1350 . -    Type de Protection Interne : Émaillé - Protection Cathodique :  Anode Courant Induit                    . -   Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,04 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -   Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR  300L ECOTOP 300i (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300i (x1 Panneau) . -     Profil de Charge : XL . -     COP Air 7°C :  3,3 . -     Classe Efficacité Énergétique Air 7°C :  A+   . -     Efficacité Énergétique Air 7°C : 137 % . -     Puissance Sonore Intérieure dB : 51  . -     Alimentation : 220-240 V / Hz / Monophasé / 50  . -     Températures Fonctionnement :  -5 | 45 °C  . -     Fluide Réfrigérant :  R134a / 1300 . -     Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -     Poids à Vide : 112 Kg - Volume :  300 Litre  . -      Dimension chauffe eau en mm : 580x1750 . -    Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -     Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -     Pression Max. Admissible : 7Bar  . -     Température Max. Admissible : °C 80  . -      Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -       Matériel : Aluminium Anodisé Solokote . -       Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -       Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -     Puissance Absorbée (Moy|Max) : 350 | 600 W   . -     Puissance Thermique (Moy|Max) W : 1250 | 2100  . -     Puissance Appoint Électrique : 1500 W . -     Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ESMS (x2 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 117 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  200 Litre  . -    Dimension chauffe eau en mm : 580x1350 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,04 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ESMS  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ESMS (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,3 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 136 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 122 Kg - Volume :  300 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Émaillé - Protection Cathodique : Anode Courant Induit . -    Entrée / Sortie ECS  3/4 Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,20 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300ixs  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300ixs (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 134 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 117 Kg - Volume :  295 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Stain. Steel AISI1444  . -   Protection Cathodique : Magnesium Anode 11/4 Female . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250ix  (x1 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 127 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 107 Kg - Volume :  245 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -     Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 300L  ECOTOP 300is  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 300is (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,2 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 135 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 112 Kg - Volume :  300 Litre  . -    Dimension chauffe eau en mm : 580x1750 . -   Type de Protection Interne : Inox AISI1444  - Protection Cathodique : Anode Mg (11/4 F)  . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Mâle   . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,17 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR  250L ECOTOP 250i (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250i (x1 Panneau) . -     Profil de Charge : XL . -     COP Air 7°C :  3,2 . -     Classe Efficacité Énergétique Air 7°C :  A+   . -     Efficacité Énergétique Air 7°C : 130 % . -     Puissance Sonore Intérieure dB : 51  . -     Alimentation : 220-240 V / Hz / Monophasé / 50  . -     Températures Fonctionnement :  -5 | 45 °C  . -     Fluide Réfrigérant :  R134a / 1300 . -     Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -     Poids à Vide : 102 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg 11/4 F . -     Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation 3/4' Mâle   . -     Pression Max. Admissible : 7Bar  . -     Température Max. Admissible : °C 80  . -      Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -     Matériel : Aluminium Anodisé Solokote . -     Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -     Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -     Puissance Absorbée (Moy|Max) : 350 | 600 W   . -     Puissance Thermique (Moy|Max) W : 1250 | 2100  . -    Puissance Appoint Électrique : 1500 W . -     Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 250L  ECOTOP 250is  (x2 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 250is (x2 Panneau) . -   Profil de Charge : XL . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 129 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 102 Kg - Volume :  250 Litre  . -    Dimension chauffe eau en mm : 580x1530 . -   Type de Protection Interne : Inox AISI444 - Protection Cathodique : Anode Mg (11/4 F)  . -    Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 3/4' Male  . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 1,01 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KIT CHAUFFE-EAU THERMODYNAMIQUE SOLAIR 200L  ECOTOP 200ix  (x1 Panneau)',
            //     'selling_price' => 4000,
            //     'description' => "PERFORMANCE : Marque ENERGIE - ECOTOP 200ix  (x1 Panneau) . -   Profil de Charge : L . -   COP Air 7°C :  3,1 . -   Classe Efficacité Énergétique Air 7°C :  A+   . -   Efficacité Énergétique Air 7°C : 113 % . -   Puissance Sonore Intérieure dB : 51  . -   Alimentation : 220-240 V / Hz / Monophasé / 50  . -   Températures Fonctionnement :  -5 | 45 °C  . -   Fluide Réfrigérant :  R134a / 1300 . -   Isolation : Polyuréthane de haute densité 50mm   . THERMOACCUMULATEUR :  . -   Poids à Vide : 101 Kg - Volume :  195 Litre  . -    Dimension chauffe eau en mm : 580x1720 . -  Type de Protection Interne : Émaillé - Protection Cathodique : Anode Mg 11/4 F                . -   Entrée / Sortie ECS  3/4' Mâle - Vanne PT 1/2' Femelle - Recirculation : 1/2' Femelle    . -    Entrée /Sortie Serpentin : 1' Mâle - Surface de serpentin : 0,72 KW . -   Pression Max. Admissible : 7Bar  . -   Température Max. Admissible : °C 80  . -    Pertes Thermique : 0,99 kWh/24h (EN 12897)  . PANNEAU SOLAIRE THERMODYNAMIQUE :  . -   Matériel : Aluminium Anodisé Solokote . -  Dimensions (L x H x E) :  2000 x 800 x 20 mm - Poids :  8 Kg . -   Pression Max. Admissible : 12Bar - Temp. Exposition (Max|Min) °C : -40 |120  . BLOC THERMODINAMIQUE :   . -   Puissance Absorbée (Moy|Max) : 350 | 600 W   . -   Puissance Thermique (Moy|Max) W : 1250 | 2100  . -   Puissance Appoint Électrique : 1500 W . -   Matériel de Tuyauterie :  Cuivre DHP ISO1337 . BENEFICIE DES NORMES EUROPEENNES N°011-7S888F SOLAR KEYMARK'",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 18,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'THERMOBOIL 200 E',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : ENERGY PANEL . MODELE : THERMOBOIL 200 E . - Puissance nominale ECS W : 1600-2200 . - Consomation nominale W  :  400-600 . - COP : 2-5 . - Puissance thermique du système d'appui W :  1500 . - Puissance thermique max avec un appui électrique W  : 3700 . - Consomation max avec un appui électrique W :  2100 . - Alimentation électrique : V/ph/Hz 230/1/50 . - Réfrigérant : R134A . - Cycle d' extraction : L . - Épaisseur moyenne de l'isolement mm : 50 . - Dimensions de l'équipement (HxPxL) mm : 1452x601x550 . - Dimensions du panneau  (HxPxL) mm : 1700x800x25 . - Pression maximale du panneau  bar : 10 . - Poid panneau thermodinamique kg : 6.2 . - Poids à vide de l'équipement  kg : 92 . - Nombre panneaux : 1 . - Puissance sonore dBA : <30 . - Format  : Sol / Matériel : Inox . - Pression maximale de service bar : 6 . - Capacité L : 200 . - Type d`isolation : Injected polyurethane . - Transmission de chaleur moyenne . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 19,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 0,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 10 . 2 Capteurs en série  : 9 . 3 Capteurs en série : 6.5 . 4 Capteur :7.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 20 . 4 Capteur :20",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8 . 4 Capteur :9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 23 m . 2 Capteurs en parallèles : 13 . 2 Capteurs en série : 13",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR . 2/3  Capteur en parallèles : 17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8 . 4 Capteur :9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 26 m . 2 Capteurs en parallèles : 13 . 2 Capteurs en série : 13",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTURE: . 1 Capteur : 10 . 2 Capteurs en parallèles : 9 . 2 Capteurs en série : 6.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm . Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 11 m . 2 Capteurs en parallèles : 10,5 . 2 Capteurs en série : 9",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 500L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout 1 773 mm . Mesure basculante, diagonale :1 999 mm . Diamètre isolé : 750 mm . Capacité : 500 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3.24 W/K . Pertes thermiques selon DIN 4573-8 : 3,50 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :230 kg . Doigt de gant pour sonde d'appoint - hauteur : 1 210 mm . Surface de l'échangeur : 2, m² . Contenance :10.9L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,3 m² . CAPTEUR: . 2/3  Capteur en parallèles : 40 . 2 Capteurs en série  : 40 . 3 Capteurs en série : 33 . 4 Capteur :27",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 14",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 1 CIRCULATEUR L1 MAX',
            //     'selling_price' => 0,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 34/17/12 . 2 Capteurs en série  : 13 . 3 Capteurs en série : 8",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 300L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 703 mm . Mesure basculante, diagonale :1 830 mm . Diamètre isolé : 600 mm . Capacité : 300 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,72 W/K . Pertes thermiques selon DIN 4573-8 : 2,94 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :130 kg . Doigt de gant pour sonde d'appoint - hauteur : 1100 mm . Surface de l'échangeur : 1,8 m² . Contenance :10L . Départ solaire : 722 mm / Retour solaire :190 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 1/2/3  Capteur en parallèles : 40/28/15 . 2 Capteurs en série  : 28 . 3 Capteurs en série : 15",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 200L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout : 1 227 mm . Mesure basculante, diagonale : 1 400 mm . Diamètre isolé : 600 mm . Capacité : 200 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 2,3 W/K . Pertes thermiques selon DIN 4573-8 : 2,58 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :95 kg . Doigt de gant pour sonde d'appoint - hauteur : 837 mm . Surface de l'échangeur : 1,5 m² . Contenance :8 L . Départ solaire : 532 mm/Retour solaire :190 mm .  Surface de l'échangeur : 0,8 m² . CAPTURE: . 1 Capteur : 20 m . 2 Capteurs en parallèles : 12 . 2 Capteurs en série : 12",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 1 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 10 . 2 Capteurs en série  : 9 . 3 Capteurs en série : 6.5 . 4 Capteur :7.5",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 2 CIRCULATEUR H1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 20 . 2 Capteurs en série  : 20 . 3 Capteurs en série : 20 . 4 Capteur :20",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE THERMIQUE ECODRAINBACK 400L AVEC 2 CIRCULATEUR L1 MAX',
            //     'selling_price' => 9000,
            //     'description' => "Hauteur hors tout :1 589 mm . Mesure basculante, diagonale :1 866 mm . Diamètre isolé : 700 mm . Capacité : 400 L . Pression d'utilisation max. : 10 bar . Isolation en mousse PU : 50 mm . Coefficient de pertes thermiques : < 3 W/K . Pertes thermiques selon DIN 4573-8 : 3,24 kWh/j . Température max. d'utilisation :95°C . Poids à vide, non équipé :185 kg . Doigt de gant pour sonde d'appoint - hauteur : 1065 mm . Surface de l'échangeur : 2,2 m² . Contenance :12.3L . Départ solaire : 658 mm / Retour solaire 211 mm . Surface de l'échangeur : 1,1 m² . CAPTEUR: . 2/3  Capteur en parallèles : 40 . 2 Capteurs en série  : 40 . 3 Capteurs en série : 33 . 4 Capteur :27",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 20,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTEMES SOLAIRES THERMODYNAMIQUES NEO250i/im',
            //     'selling_price' => 6200,
            //     'description' => "MARQUE / REFERENCE : GREENCOM / NEO250i/im . THERMOACCUMULATEUR : . - Dimensions (LxH) mm : 1860x560mm  . - Poids à vide  Kg : 76 . - Volume Litres : 250  . - Type de protection interne : Inox . - Protection cathodique : Anode de magnesium . - Connexions hydraulique (froide/chaude) . - Pression maximale Bar : 7 . - Pression de test Bar : 10 . - Température maximale de l'eau ºC : 70 . - Température de l'eau ºC : 55 . - Serpentine solaire (entrée/sortie) Neo250im-Neo180im Pouces : 1 .  . PANNEAU SOLAIRE THERMODYNAMIQUE : . - Matériau : Aluminium anodisé solokote . - Dimensions (LxHxE) Mm 1700x800x20 . - Pression max. De travail Bar : 12 . - Pression de test Bar : 15 . - Temp. Max. d'exposition ºC  :120 . - Temp. Min. de fonct. ºC : -5 . - Temp. Min. d´exposition ºC : -40 .  . GROUPE THERMODYNAMIQUE : . Puissance absorbée (moy/max) W : 390-590 . - Puissance thermique W  : 1690-2900 . - Puissance d'appui électrique W : 1500 . - Type de compresseur : Hermétique . - Niveau de bruit Db : 39 .  . CONNEXIONS FROGORIFIQUE :  . - Fluide frigorigène/QT Grs :  R134a 1000 800 . - Matériau de la tuyauterie : Cuivre (DHP ISO1337) . - Ligne liquide Pouces : 1/4 . - Ligne aspiration Pouces : 3/8 . - Alimentation V/Hz : 230 monophasé /50 .  CERTIFIER /  EN12975 SOLAR KEYMARK 011-7S3016F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 23,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SYSTEMES SOLAIRES THERMODYNAMIQUES NEO180im',
            //     'selling_price' => 6200,
            //     'description' => "MARQUE / REFERENCE : GREENCOM / NEO180im . THERMOACCUMULATEUR : . - Dimensions (LxH) mm : 1600x560 mm . - Poids à vide  Kg : 67 . - Volume Litres : 180  . - Type de protection interne : Inox . - Protection cathodique : Anode de magnesium . - Connexions hydraulique (froide/chaude) . - Pression maximale Bar : 7 . - Pression de test Bar : 10 . - Température maximale de l'eau ºC : 70 . - Température de l'eau ºC : 55 . - Serpentine solaire (entrée/sortie) Neo250im-Neo180im Pouces : 1 .  . PANNEAU SOLAIRE THERMODYNAMIQUE : . - Matériau : Aluminium anodisé solokote . - Dimensions (LxHxE) Mm 1700x800x20 . - Pression max. De travail Bar : 12 . - Pression de test Bar : 15 . - Temp. Max. d'exposition ºC  :120 . - Temp. Min. de fonct. ºC : -5 . - Temp. Min. d´exposition ºC : -40 .  . GROUPE THERMODYNAMIQUE : . Puissance absorbée (moy/max) W : 390-590 . - Puissance thermique W  : 1690-2900 . - Puissance d'appui électrique W : 1500 . - Type de compresseur : Hermétique . - Niveau de bruit Db : 39 .  . CONNEXIONS FROGORIFIQUE :  . - Fluide frigorigène/QT Grs :  R134a 1000 800 . - Matériau de la tuyauterie : Cuivre (DHP ISO1337) . - Ligne liquide Pouces : 1/4 . - Ligne aspiration Pouces : 3/8 . - Alimentation V/Hz : 230 monophasé /50 .  CERTIFIER /  EN12975 SOLAR KEYMARK 011-7S3016F",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 23,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'HELIOFRANCE 300L',
            //     'selling_price' => 4500,
            //     'description' => "MARQUE : HELIO FRANCE . - Capacité totale de l'accumulateur 300 Litres . - Poids à vide  60 kg  . - Poids total plein  360 kg  . - Dimensions (H x L x P) 180 x 67 x 55 cm . - Température max de l'eau technique 85°C . - Pertes de chaleur à 60°C - Tin t = 70°c et Text = 20°c² 1,2 kWh/24h (Cr = 0,08 W.l -1.K-1) . - Système de remplissage de l'eau technique Intégré . - Nature du fluide caloporteur Eau Glycol . - Débit modulé Intégré Intégré . - Système de transfert du circuit solaire . - Volume de l'échangeur : 12 Litres . - Tension / Puissance : 230 V - 2,5 kW . CAPTEURS H232/ V232 ou équivalant  . - Dimensions hors tout (mm) 1 870 x 1 241 x 90  . - Surface brute 2,32 m²  . - Surfaces optique/absorbeur : 2,20 m²  . - Poids à vide :  41 kg  . - Contenance fluide : 1,8 litres  . - Inclinaison mini-maxi de 17° à 90° . - Pression de service max. 8 bars . - Température de stagnation MK1 : 212°C . - Vitrage Trempé, transparence 96% . - Absorbeur Aluminium à revêtement sous vide hautement sélectif . - Raccords hydrauliques Latéraux réversibles à raccord bi-cône diam ext. 12mm ou Solar-Connect* . - Caisson du capteur Profil en aluminium soudé aux angles . - Cuve garantie à vie, éléments statiques : 10 ans . CERTIFICAT SK0011 SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 25,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'MECAWOOL',
            //     'selling_price' => 0,
            //     'description' => 'MECAWOOL',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 28,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'MECAWOOL',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE EN FLOCONS A SOUFFLER',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 28,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCELL F',
            //     'selling_price' => 0,
            //     'description' => 'SOUFFLE EN OUATE DE CELLULOSE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 29,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'IBR REVETU KRAFT',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du IBR REVETU KRAFT est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT.',
            //     'selling_price' => 0,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35',
            //     'selling_price' => 45,
            //     'description' => "L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35 REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du ISOCONFORT 35  est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOLENE 4',
            //     'selling_price' => 45,
            //     'description' => "La laine à souffler ISOLENE 4 est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . ISOLENE 4 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'IBR REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'IBR REVETU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'IBR NU (300mm)',
            //     'selling_price' => 0,
            //     'description' => 'IBR NU (300mm)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'IBR NU',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU NON KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOCONFORT 35',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE DEROULE REVETU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'IBR revêtu kraft',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ISOLENE 4',
            //     'selling_price' => 0,
            //     'description' => 'LAINE MINERALE A SOUFFLER ISOLENE 4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ECOLAINE',
            //     'selling_price' => 45,
            //     'description' => "Le rouleau de laine de verre Ecolaine de Isover est principalement destiné à l'isolation des combles aménagés. Composé de laine de verresouple et revêtu de kraft, il permet d'améliorer l'isolation thermique et acoustique de tous types de logements, en neuf et en rénovation.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 32,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'TI 212',
            //     'selling_price' => 0,
            //     'description' => 'TI 212',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'THERMO 046',
            //     'selling_price' => 0,
            //     'description' => 'THERMO 046',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'THERMO LOFT',
            //     'selling_price' => 0,
            //     'description' => 'THERMO LOFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SUPAFIL LOFT 045',
            //     'selling_price' => 0,
            //     'description' => 'SUPAFIL LOFT 045',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ACOUSTILAINE 035',
            //     'selling_price' => 0,
            //     'description' => 'ACOUSTILAINE 035 Isolation des murs',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'THERMO LOFT',
            //     'selling_price' => 0,
            //     'description' => 'LAINE A SOUFFLER',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP120 R3',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP300 R7.5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP80 R2',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP200 R5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP320 R8',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP240 R6',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP280',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP160 R4',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP140 R3,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP180 R4,50',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP60 R1,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP260 R6,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'KNAUF INSULATION TI 212',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF INSULATION TI 212 EP100 R2,5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ACOUSTIPLUS 032',
            //     'selling_price' => 45,
            //     'description' => "ACOUSTIPLUS 032 est un panneau de laine de verre roulé semi-rigide à très haute performance thermique revêtu d'un surfaçage kraft. . Isolation des murs et toitures.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 35,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SUPAFIL',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE VERRE SOUFFLEE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 35,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'EGO 110',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 110  . - Dimensions externes (L x P x H) : 2.136 x 711 x 217mm  . - Surface brute : 620mm . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta : 1,52 m2  . - Surface d'ouverture : 1,09 m2  . - Surface d'absorption : 0,85 m2  . - Contenu effectif d'ACS : 105 litri  . - Couverture des besoins : 1-2  . - Poids net (à vide) : 36 kg  . - Poids en fonctionnement (plein) : 141 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'EGO 260',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 260 . - Dimensions externes (L x P x H) :  2.136 x 1.491 x 217mm . - Surface brute :  1170mm . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  3,18 m2 . - Surface d'ouverture :  2,64 m2 . - Surface d'absorption :  1,98 m2 . - Contenu effectif d'ACS :  245 litri . - Couverture des besoins : 5-6 . - Poids net (à vide) :  65 kg . - Poids en fonctionnement (plein) :  310 kg . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'EGO 220',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 220 . - Dimensions externes (L x P x H) :  2.136 x 1.296 x 217mm  . - Surface brute :  1035mm  . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  2,77 m2  . - Surface d'ouverture :  2,25 m2 . - Surface d'absorption :  1,69 m2  . - Contenu effectif d'ACS :  210 litri  . - Couverture des besoins :  4-5  . - Poids net (à vide) : 57 kg  . - Poids en fonctionnement (plein) : 267 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'EGO 150',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 150 . - Dimensions externes (L x P x H) : 2.136 x 906 x 217mm  . - Surface brute : 760mm  . - Dimensione passo staffe (B) : 2050mm  . - Superficie bruta :  1,93 m2  . - Surface d'ouverture :  1,48 m2  . - Surface d'absorption : 1,13 m2  . - Contenu effectif d'ACS : 140 litres . - Couverture des besoins :  2-3  . - Poids net (à vide) :  43 kg . - Poids en fonctionnement (plein) :  183 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'EGO 180',
            //     'selling_price' => 0,
            //     'description' => "MARQUE : PLEION . MODELE : EGO 180 . - Dimensions externes (L x P x H) : 2.136 x 1,101 x 217mm  . - Surface brute : 895mm  . - Dimensione passo staffe (B) : 2050mm . - Superficie bruta :  2,35 m2  . - Surface d'ouverture :  1,86 m2 2 . - Surface d'absorption : 1,41 m2  . - Contenu effectif d'ACS : 175 litri  . - Couverture des besoins :  3-4  . - Poids net (à vide) : 50 kg  . - Poids en fonctionnement (plein) : 225 kg  . - Pression maximale de fonctionnement : 400 kPa . - Température maximale de fonction : - 90 °C . - Fluide thermovecteur : ACS . - Connexions hydrauliques : 2 x ¾'' M . - Epaisseur et type d'isolation thermique :  30 en PUR (fond) - 25 en polyester (latéral . - Installation : toit plat - toit incliné . - Champ d'inclinaison : 45° (toit plat) - 15 - 60° (toit incliné) . - Volume de prise conseillé à 45°C - . Nature du fluide capteurs : Antigel . Norme des capteurs : EN 12976-2 _ KIP0001762/01 . Certification capteurs : SOLAR KEYMARK",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 42,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'POWERBLOW',
            //     'selling_price' => 0,
            //     'description' => 'POWERBLOW',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 44,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'JETROCK',
            //     'selling_price' => 0,
            //     'description' => 'JETROCK',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ROCKPRIME',
            //     'selling_price' => 0,
            //     'description' => "La laine de roche par soufflage ROCKPRIME est la solution la plus performante pour isoler les combles difficiles d'accès. . ROCKPRIME est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ROCKin L',
            //     'selling_price' => 0,
            //     'description' => 'ROCKin L',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'LOFT 470',
            //     'selling_price' => 0,
            //     'description' => 'LOFT 470',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ROCKCIEL',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCIEL EP220 R5',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'JETROCK2',
            //     'selling_price' => 0,
            //     'description' => 'JETROCK2 EP315 R7,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ROCKCIEL',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCIEL EP220 R5,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'ROCKCOMBLE',
            //     'selling_price' => 0,
            //     'description' => 'ROCKCOMBLE  EP60 R',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'JETROCK',
            //     'selling_price' => 0,
            //     'description' => "LAINE DE ROCHE EN VRAC POUR COMBLE PERDU A' PROJETER",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLITANK 200 / WUNDER ALS 2510',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0001  . - HAUTEUR (mm) 1245  DIAMETRE (mm) 542  . - POIDS NET (kg) 75  . - VOLUME / CUBAGE (lt) 170  . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 1  . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS / 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs :  « Eau glycolée »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLIKOMBI 500 / WUNDER ALS',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0367 . - HAUTEUR (mm) 1653  DIAMETRE (mm) 750 / 807 . - POIDS NET (kg) 100 . - VOLUME / CUBAGE (lt) 454 . - ISOLANT :  50 mm /40 kg/m³ / 80 mm /18 kg/m³ . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 4.18 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS 1808/ 2108/ 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs : « eau » / « eau glycolée » / « eau + antigel »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLIKOMBI 300 / WUNDER ALS',
            //     'selling_price' => 4000,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0367 . - HAUTEUR (mm) 1770  DIAMETRE (mm) 542  . - POIDS NET (kg) 85 . - VOLUME / CUBAGE (lt) 245 . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS 1808/ 2108/ 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs : « eau » / « eau glycolée » / « eau + antigel »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SOLITANK 300 / WUNDER ALS 2510',
            //     'selling_price' => 4500,
            //     'description' => "MARQUE : SOLIMPEKS . - REFERENCE PRODUIT MA-0002 . - HAUTEUR (mm) 1770  DIAMETRE (mm) 542  . - POIDS NET (kg) 85 . - VOLUME / CUBAGE (lt) 245 . - ISOLANT 50 mm /40 kg/m³  . - MATERIAU ISOLANT Polyuréthane . - CYLINDRE EXTERIEUR  MATERIAUX : Acier ST 37 peint en Poudre Electrostatique . - ECHANGEUR THERMIQUE - MATERIAUX Acier Inoxydable AISI 316L  . - NOMBRE DE SERPENTIN 2 . - SURFACE SERPENTIN (m²) 3,83 . - VIDANGE 1 1/4' . -  ENTRÉE D'EAU FROIDE 3/4' . - DÉTECTEUR 1/2' . - SORTIE CHAUDE 1 1/4' / SORTIE FROIDE 1 1/4' . - RÉSISTANCE ÉLECTRIQUE 1 1/4' . - SORTIE EAUCHAUDE 3/4' / ENTRÉE CHAUDE 1 1/4' .  . WUNDER ALS 2510 : . - DIMENSIONS (mm) 1988x1218x90 / POIDS (kg) 44 . - SURFACE TOTAL (m²) 2,42 . - MATERIAU ABSORBANT Almeco- Tinox, Aluminium hautement sélectif . - TYPE DE MONTAGE Toit plat - Toit pente - Toit intégret . - DEBIT NOMINAL (lt/ h) 120 / VOLUME CALOPORTEUR (lt) 1,27 /  NOMBRE DE TUBE 10 . - Wunder ALS / 2510 . - Certifié No: 011- 7S2248 F SOLAR KEYMARK . Nature du fluide circulant dans les capteurs :  « Eau glycolée »",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 51,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU SOLAIRE   SC-150L',
            //     'selling_price' => 4000,
            //     'description' => "Marque : SUNCOMPACT  . - SOLAR KEYMARK 011-7S2795 F . - CHAUFFE-EAU SOLAIRE INDIVIDUEL INNOVANT PLUG&PLAY. . -  CHAUFFE-EAU SOLAIRE INDIVIDUEL AVEC CAPTEUR .   SOLAIRE THERMIQUE AUTO STOCKER INTEGRANT UN BALLON D'EAU CHAUDE. . - Référence : SC-150L . - Certifié Solar Keymark numéro licence : 011-7S2956 A . - Capacité du préparateur intégré : 150 L . - Profil de soutirage : (M) pour l'Énergie d'appoint par PAC ou chaudière à condensation au gaz. . -  Profil de soutirage : (L) pour l'Énergie d'appoint à effet Joule, ballon ECS électrique . - ETAS : 95 % . - Surface brut /Net 2.05m²/1.68m² . - Dimension / Poids : L x I x H : 2.220mm x 920mm x 198mm / 63kg . - Boitier du collecteur : EPP avec protection résistant aux UV . - Absorbeur : Acier, revêtement sélectif . - Absorption : 91% . - Raccordement : M3/4 . - SUNCOMPACT E : Résistance électrique 1KW, Monophasé . - Isolation thermique : 0.036W/mk . - Capacité du réservoir tampon : 150 litre d'eau chaude technique   . - Sortie d'eau douce : env.230L/ jours à 40° si ballon est à 70°C . - Volume de l'échangeur de chaleur / 9.2 litre  . - Résistance à la compression de l'échangeur de chaleur : 10 bar . - Matériau du réservoir de stockage : Acier ST235 . Nature du fluide : Eau glycolée",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 53,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SUNPACKS 300',
            //     'selling_price' => 5000,
            //     'description' => "MARQUE : SUNPACKS / REFERENCE :  SUNPACKS 300 . - Capacité : 300 . - Aire brute du collecteur 3,810 m2 (2x1,905 m2) . - Aire d'ouverture du collecteur  3,256 m2 (2x1,628 m2) . - Dimension HxLxP : 2140X890X226 mm (x2) . - Isolation : ESPP . - Max. température de fonctionnement : 80 degrés centigrades . - Pression de service : 4 Bar . - Elément chauffant : 1,5KW (x2) . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 6 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 54,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'SUNPACKS 150',
            //     'selling_price' => 3500,
            //     'description' => "MARQUE : SUNPACKS / REFERENCE :  SUNPACKS 150 . - Capacité : 150  . - Aire brute du collecteur 1,905 m2  . - Aire d'ouverture du collecteur 1,628 m2 . - Dimension HxLxP : 2140X890X226 mm . - Isolation : ESPP . - Max. température de fonctionnement : 80 degrés centigrades . - Pression de service : 4 Bar . - Elément chauffant : 1,5KW . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 3 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 54,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE-EAU SOLAIR SUNPAD',
            //     'selling_price' => 3500,
            //     'description' => "CHAUFFE-EAU SOLAIR SUNPAD . Surface brute / surface nette :  2,05 m² / 1,68 m² . Dimensions : 2220 mm x 920 mm x 190 mm . Poids à vide : 73 kg . Boitier collecteur : EPP avec peinture protégée contre UVA . Absorbeur : Acier, enduit sélectif . Absorption : 91 % . Liaisons : 3/4' personnalisation possible . SUNPAD E : Résistance électrique 1 kW . Isolation thermique : 0,036 WmK . Stockage : 150 litres . Volume échangeur : 9,2 litres . Composition échangeur : Acier inoxydable 1.4404 AISI 316L . Pression de l'échangeur : 10 bars . Composition stockage : Acier ST235",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 55,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'CHAUFFE-EAU SOLAIRE SPM 150L',
            //     'selling_price' => 3500,
            //     'description' => 'MARQUE : SUNTASK / REFERENCE : SPM 150L . - Capacité : 150 L . - Superficie brute : 1,75m² . - Dimension HxLxP : 2184X804X212 mm / Poids : 60 Kg . - Isolation : ESPP . - Max. température de fonctionnement : 95° degrés centigrades . - Pression de service : 5 Bar . - Tige chauffante :  Optionnel 1KW/2KW . - Connexions :  2x3/4 Filetage mâle. . - Installation : toit plat toit en pente . - Utilisateur : 3 . - CERTIFICATION  SOLAR KEYMARK OU CSTBAT :   SOLAR KEYMARK  . -  NUMERO DE  CERTIFICATION : 011-7S3025 A',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 56,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK E - 2 PANNEAUX SOLAIRE COMPLET ASTREA  200L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  2 panneaux solaires avec fixations (volume du ballon 200L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 2 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK E - 1 PANNEAUX SOLAIRE COMPLET ASTREA  200L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  1 panneaux solaires avec fixations (volume du ballon 200L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 1 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK E - 3 PANNEAUX  SOLAIRE COMPLET ASTREA  300L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  3 panneaux solaires avec fixations (volume du ballon 300L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 3 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'PACK E - 2 PANNEAUX  SOLAIRE COMPLET ASTREA  300L',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THERMADOR . -  2 panneaux solaires avec fixations (volume du ballon 300L). . - Un ballon stockeur spécifique voir détails ci-dessous. . - GTSD* : Un groupe de transfert départ/retour avec coque d'isolation. . - MT25220C : Un mitigeur solaire. . - SPT2007 : Une soupape de sécurité pression et température. . - Une régulation solaire RS13* avec ses sondes. . - Un vase solaire V024S et son kit de pose KMVS. . - Deux doigts de gant 1/2 pour le ballon DGRS15 + un doigt de gant 3/4 DGRS20 pour le panneau solaire. . - Trois raccords 254302 pour liaison, panneaux + un raccord 254852 pour sortie panneau + un té . 130G20 pour l'autre sortie panneau. . - 254001CST : Un raccord avec purgeur. . - 4 raccords 280G20, 4 raccords IRM416 et 2 raccords 245G3320. . - PRODCAL10 : Un ou plusieurs bidons de fluide caloporteur . - Ballon 200L avec module de préparation ECS . - 2 panneaux solaires thermiques  ASTREA TYPE E  kit de fixation pour toiture  . - Groupes de transfert solaire avec vase d'expansion . - Régulation solaire . - Glycol à diluer . MATÉRIAUX ET  CARACTÉRISTIQUES FONCTIONNELLES  . 1 - Isolation en laine minérale . 2 - Cadres en aluminium . 3 - Connections cuivre Ø 22 mm . 4 - Absorbeur à plaques pleines à revêtement hautement sélectif . 5 - Verre trempé anti-grêle (recouvert d'oxyde de titane) . PANNEAUX SOLAIRES ASTREA . . Surface : 2.5 m2 . . Poids 34 kg. . . Raccord tube cuivre 22 mm. . . Volume d'eau : 1,9 L. . . Température maxi : 199 °C. . . Pression maxi 10 bar. . . Cadre aluminium. . . Isolation laine minérale. . . Verre anti-grêle. . . Absorbeur plat de haute qualité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 59,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'E-MRK40 - URSA',
            //     'selling_price' => 45,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé. .  . L'isolation thermique parfaite du URSA TERRA MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond, il peut être associé à notre système URSA SECO, pour une parfaite étanchéité à l'air.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'E-MRK 35',
            //     'selling_price' => 25,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé . . L'isolation thermique parfaite du URSA  MRK 35 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'E-MRK40',
            //     'selling_price' => 45,
            //     'description' => "L'isolation thermique parfaite du URSA TERRA E-MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond, il peut être associé à notre système URSA SECO, pour une parfaite étanchéité à l'air.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'URSA P-MRK 35',
            //     'selling_price' => 45,
            //     'description' => "Matelas de laine de verre revêtu sur une face d'un papier kraft quadrillé . . L'isolation thermique parfaite du URSA  P-MRK 35 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => "PULS'R 47",
            //     'selling_price' => 45,
            //     'description' => "La laine à souffler URSA PULS'R est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . URSA PULS'R 47 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'E-LAINE VERRE 40 RP',
            //     'selling_price' => 0,
            //     'description' => 'E-LAINE VERRE 40 RP',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'URSA F-M1021',
            //     'selling_price' => 0,
            //     'description' => 'URSA F-M1021',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'E-MRK 35',
            //     'selling_price' => 55,
            //     'description' => 'E-MRK 35',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'URSA P-M1021',
            //     'selling_price' => 0,
            //     'description' => 'URSA P-M1021',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => "URSA PULS'R 47",
            //     'selling_price' => 0,
            //     'description' => "URSA PULS'R 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => "URSA SOUFL'R 47",
            //     'selling_price' => 0,
            //     'description' => "La laine à souffler URSA SOUFL'R 47 est la solution la plus performante pour isoler les combles difficiles d'accès non aménageables. . URSA PULS'R 47 est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // [
            //     'designation' => 'URSA P-MRK 40',
            //     'selling_price' => 0,
            //     'description' => "L'isolation thermique parfaite du URSA P-MRK 40 est garantie par son homogénéité. Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique. Idéal en combles perdus et plafond.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 6,
            // ],
            // //Eau

            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AWYHPSA12-H91',
            //     'selling_price' => 1000,
            //     'description' => "Unité extérieure : AWYHPSA12-H91 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 12.10 . - COP : 4.95 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 189/135 . - Puissance acoustique dB(A) : 64 . - Pression acoustique à 1m dB(A) : 50 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 96 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N91 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Résistance électrique intégrée : 3 . - Intensité max. : 14.30 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AWYHPSA12-H91 HAUTE TEMPERATURE',
            //     'selling_price' => 9000,
            //     'description' => "Unité extérieure : AWYHPSA12-H91 . Air +7 °C  / Eau 47/55 °C : . - Puissance calorifique : 12.10 . - COP : 3.10 . - Classe énergétique (climat tempéré) Sortie d'eau à 55°C : A++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 5°C : 189/135 . - Puissance acoustique dB(A) : 60 . - Pression acoustique à 1m dB(A) : 49 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 118x865x523 . - Poids net : 77 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N91 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Résistance électrique intégrée : 3 . - Intensité max. : 14.30 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AW-YHPSA14-H93',
            //     'selling_price' => 1000,
            //     'description' => "Unité extérieure : AW-YHPSA14-H93 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 14.50 . - COP : 4.70 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 186/136 . - Puissance acoustique dB(A) : 65 . - Pression acoustique à 1m dB(A) : 51 . - Phase/Tension/Fréquence : 3P/380-415V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 112 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N93 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 3P/380-415V/50Hz . - Résistance électrique intégrée : 3/6/9 . - Intensité max. : 14.00 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AWYHPSA16-H91',
            //     'selling_price' => 1000,
            //     'description' => "Unité extérieure : AWYHPSA16-H91 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 16.00 . - COP : 4.50 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 182/133 . - Puissance acoustique dB(A) : 68 . - Pression acoustique à 1m dB(A) : 55 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 96 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N91 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Résistance électrique intégrée : 3 . - Intensité max. : 14.30 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AW-YHPSA14-H91',
            //     'selling_price' => 1000,
            //     'description' => "Unité extérieure : AW-YHPSA14-H91 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 14.50 . - COP : 4.70 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 186/136 . - Puissance acoustique dB(A) : 65 . - Pression acoustique à 1m dB(A) : 51 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 96 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N93 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 3P/380-415V/50Hz . - Résistance électrique intégrée : 3/6/9 . - Intensité max. : 14.00 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AW-YHPSA16-H91',
            //     'selling_price' => 4000,
            //     'description' => "Unité extérieure : AW-YHPSA16-H91 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 16.00 . - COP : 4.50 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 182/133 . - Puissance acoustique dB(A) : 68 . - Pression acoustique à 1m dB(A) : 55 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 96 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N91 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 1P/220-240V/50Hz . - Résistance électrique intégrée : 3 . - Intensité max. : 14.30 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU AIRWELL WELLEA SPLIT AW-YHPSA12-H93',
            //     'selling_price' => 9000,
            //     'description' => "Unité extérieure : AW-YHPSA12-H91 . Air +7 °C  / Eau 30/35 °C : . - Puissance calorifique : 12.10 . - COP : 4.95 . - Classe énergétique (climat tempéré) Sortie d'eau à 35°C : A+++ . - Efficacité saisonnière (climat tempéré) Sortie d'eau à 35°C/ 55°C : 189/135 . - Puissance acoustique dB(A) : 64 . - Pression acoustique à 1m dB(A) : 50 . - Phase/Tension/Fréquence : 3P/380-415V/50Hz . - Réfrigérant/PRP : R32/675 . - Dimensions de l'unité (LxHxP) : 1118x865x523 . - Poids net : 112 . UNITÉ INTÉRIEURE : AW-WHPSA1216-N93 . - Phase : Monophasé . - Puissance acoustique : 43 dB(A) . - Pression acoustique : 32 . - Phase/Tension/Fréquence : 3P/380-415V/50Hz . - Résistance électrique intégrée : 3/6/9 . - Intensité max. : 14.00 . - Dimensions de l'unité (LxHxP) : 420x790x270 . - Poids net : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB 7KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PACBT-MB 7KW-H11 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  6,55 . - Puissance absorbée kW :  1,45  . - COP : 4,52  . - SCOP : 4,53 . - SEER : 4,75 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 178.3/125.7%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  65/66 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1210×945×402 . - Poids net Kg : 99 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW-PAC-BT-MB-14KW-H13 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PAC BT-MB14KW-H13 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  14,10 . - Puissance absorbée kW :  3,26 . - COP : 4,33 . - SCOP : 4,27 . - SEER : 4,88 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 167.9/127.9%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  71/70 . - Alimentation : Phase/Tension/Fréquence : 3P/380-415V/50Hz TRIPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 177 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB 9KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PACBT-MB 9KW-H11 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  8,64 . - Puissance absorbée kW :  2,01 . - COP : 4,30 . - SCOP : 4,16  . - SEER : 4,52 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 163.3/127.1%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  68/67 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1210×945×402 . - Poids net Kg : 99 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW-PAC-BT-MB-12KW-H13 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PAC BT-MB12KW-H13 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  12,37  . - Puissance absorbée kW :  2,76  . - COP : 4,48 . - SCOP : 4,45 . - SEER : 5,02 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 174.9/130.9%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  68/69 . - Alimentation : Phase/Tension/Fréquence : 3P/380-415V/50Hz TRIPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 177 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB 5KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PACBT-MB 5KW-H11 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  4,58 . - Puissance absorbée kW :  0,97 . - COP : 4,72 . - SCOP : 4,47 . - SEER : 4,61 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 175.9/125.7%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  61/64 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1210×945×402 . - Poids net Kg : 99 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB14KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL . Référence : AWHW- PAC BT-MB14KW-H11 / / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  14,76  . - Puissance absorbée kW :  3,40 . - COP : 4,34 . - SCOP : 4,39 . - SEER : 4,86 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 172.7/128.5%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  71/70 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 162 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB 10KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PAC BT-MB 10KW-H11 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  10,43 . - Puissance absorbée kW :  2,28 . - COP : 4,57 . - SCOP : 4,12 . - SEER : 5,24 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 161.3/129.3%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  66/64 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 162 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW-PAC-BT-MB-16KW-H13 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PAC BT-MB16KW-H13 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  16,30  . - Puissance absorbée kW :  3,88  . - COP : 4,20 . - SCOP : 4,17 . - SEER : 4,92 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 163.6/125.6%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  71/71 . - Alimentation : Phase/Tension/Fréquence : 3P/380-415V/50Hz TRIPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 177 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB12KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL  . Référence : AWHW- PAC BT-MB12KW-H11 / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  12,17  . - Puissance absorbée kW :  2,73  . - COP : 4,46 . - SCOP : 4,21  . - SEER : 5,34 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 165.6/129.3%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  67/67 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 162 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHW- PAC BT-MB16KW-H11 MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : AIRWELL . Référence : AWHW- PAC BT-MB16KW-H11 / / BASSE TEMPÉRATURE . Air+7°C Eau 30/35°C . -  Puissance calorifique kW :  16,33 . - Puissance absorbée kW :  3,90 . - COP : 4,19 . - SCOP : 4,26  . - SEER : 4,34 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 167,5/125,1%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Niveaux sonores Chauffage/Refroidissement dB(A) :  71/70 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ . - Réfrigérant Type/PRP  : R410A/2088 . - Dimensions de l'unité (LxHxP) : 1404×1414×405 . - Poids net Kg : 162 . Classe efficacité énergétique 55°C/35°C : A++/A++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 2,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARISTON NIMBUS PLUS NET 110 S',
            //     'selling_price' => 14000,
            //     'description' => "MARQUE / REFERENCE : NIMBUS PLUS S NET  110 S . - Puissance  maximale : +7/35 kW :  16,7 . - Puissance nominale :   +7/35°C  kW :  10,6 . - Puissance  maximale : - 7/35 kW :  11.6 . - Puissance nominale :   - 7/35°C  kW :  12,6 . - COP :  +7/35°C :  5,2 . - COP  -7/35°C :  3,2  . - Efficacité énergétique saisonnière Etas  55°C/35°C :  135/187% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Groupe extérieur dimension mm : 1016x1506x374 . - Unité intérieure  mm : 600*700*314 . Garantie 2 ans pièces et main d ouvre",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARISTON NIMBUS PLUS  NET  90 S',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE / REFERENCE : NIMBUS PLUS S NET  90 S . - Puissance  maximale : +7/35 kW :  14 . - Puissance nominale :   +7/35°C  kW :  8.7 . - Puissance  maximale : - 7/35 kW : 9.3 . - Puissance nominale :   - 7/35°C  kW :  9.7 . - COP :  +7/35°C :  5,3 . - COP  -7/35°C :  3,2  . - Efficacité énergétique saisonnière Etas  55°C/35°C :  133/189% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Groupe extérieur dimension mm : 1016x1506x374 . - Unité intérieure  mm : 600*700*314 . Garantie 2 ans pièces et main d ouvre",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARISTON NIMBUS COMPACT S NET 35 S R32',
            //     'selling_price' => 9000,
            //     'description' => 'ARISTON NIMBUS COMPACT S NET 35 S R32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'NIMBUS NET 110 S TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : ARISTON NIMBUS NET 110 S TRI MOYENNE TEMPERATURE . - Puissance calorifique nominale : -7/35°C kW :  12,59 . - Puissance calorifique maximale : 7/35 kW :  16,74  . - Puissance calorifique nominale :   +7/35°C  kW :  10,61  . - COP :  +7/35°C :  5,20 . - COP  -7/35°C :  3,21  . - Efficacité énergétique saisonnière Etas  55°C/35°C :  135/187% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Réfrigérant type et charge -/g :  R410A  . - Typologie circuit split  . - Type d'alimentation 400V - 3ph - 50Hz . - Dimensions mm : 1016x1506x380  . - Poids kg :  110",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'NIMBUS NET 90 S TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : ARISTON / NIMBUS NET 90 S TRI MOYENNE TEMPERATURE . - Puissance calorifique nominale : -7/35°C kW : 9,66   . - Puissance calorifique maximale :7/35 kW : 14.00 . - Puissance calorifique nominale :   +7/35°C kW : 8,66  . - COP :  +7/35°C :  5,30 . - COP  -7/35°C :  3,22 . - Efficacité énergétique saisonnière Etas  55°C/35°C :  133/189% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Réfrigérant type et charge -/g :  R410A  . - Typologie circuit split  . - Type d'alimentation 400 V / 3 / 50 Hz . - Dimensions mm : 1016x1506x380  . - Poids kg :  110",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'NIMBUS NET 90 S MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : ARISTON / NIMBUS NET 90 S MONO MOYENNE TEMPERATURE . - Puissance calorifique nominale : -7/35°C kW : 9,66   . - Puissance calorifique maximale :7/35 kW : 14 . - Puissance calorifique nominale :   +7/35°C kW : 8,66  . - COP :  +7/35°C :  5,30 . - COP  -7/35°C :  3,22 . - Efficacité énergétique saisonnière Etas  55°C/35°C :  133/189% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Réfrigérant type et charge -/g :  R410A  . - Typologie circuit split  . - Type d'alimentation 230V - 1ph - 50Hz . - Dimensions mm : 1016x1506x380  . - Poids kg :  135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'NIMBUS NET 110 S MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : ARISTON NIMBUS NET 110 S MONO MOYENNE TEMPERATURE . - Puissance calorifique nominale : -7/35°C kW :  12,59 . - Puissance calorifique maximale : 7/35 kW :  16,74  . - Puissance calorifique nominale :   +7/35°C  kW :  10,61  . - COP :  +7/35°C :  5,20 . - COP  -7/35°C :  3,21  . - Efficacité énergétique saisonnière Etas  55°C/35°C :  135/187% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance acoustique à l'extérieur : dB(A) : 62  . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Réfrigérant type et charge -/g :  R410A  . - Typologie circuit split  . - Type d'alimentation 230V - 1ph - 50Hz . - Dimensions mm : 1016x1506x380  . - Poids kg :  135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 5,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR ALFEA EXTENSA A.I. 8',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : ATLANTIC | Modèle : Alféa Extensa A.I. 8 . Caractéristiques :  . Puissance calorifique (+7°C/+35°C) : 7,50 Kw  . COP (+7°C/+35°C) : 4,08 . Fonctionnement : moyenne température  . Coefficient efficacité énergétique ETAS (%) : 118,00 (selon le règlement EU n °813/2013 de la commission du 2 août 2013)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA ECXELLIA A.I 14 KW - MONOPHASE - 526301',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA ECXELLIA A.I 14 KW - MONOPHASE . - Puissance calorifique : +7 °C / +35 °C : 13,50 KW . - Puissance calorifique : -7 °C / +60 °C : 8,42 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 148% / 113% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,18 / COP -7 °C / +55 °C : 1,81 . - Gaz frigorigène : R410A . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847x448x482 . - Poids à vide / en eau (kg) : 155 / 373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 92 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA  HP A.I 16 KW - MONOPHASE - 526631',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCLLIA  HP A.I 16 KW - MONOPHASE . - Puissance calorifique : +7 °C / +35 °C : 16 KW . - Puissance calorifique : -7 °C / +60 °C : 10.8 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 163% / 125% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,15 / COP -7 °C / +55 °C : 1,85 . - Gaz frigorigène : R410A . - Classe énergétique - chauffage (35°C/55°C) : A++ / A++ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 166 / 390 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x480 . - Poids en fonctionnement (kg) : 137 . - Niveau Sonore à 5 m de l'appareil dB(A) : 45.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA ECXELLIA DUO A.I 14 KW - MONOPHASE - 526322',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE :ATLANTIC ALFEA ECXELLIA DUO A.I 14 KW - MONOPHASE . - Puissance calorifique : +7 °C / +35 °C : 13,50 KW . - Puissance calorifique : -7 °C / +60 °C : 8,42 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 148% / 113% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,18 / COP -7 °C / +55 °C : 1,81 . - Gaz frigorigène : R410A . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 155 / 373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 92 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA  HP A.I. 15 KW - TRIPHASE - 526632',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE ATLANTIC ALFEA EXCLLIA  HP A.I. 15 KW - TRIPHASE  . - Puissance calorifique +7 °C / +35 °C :   15KW . - Puissance calorifique -7 °C / +60 °C :    11,2KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) :   164 %/ 130% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C :  4,33 / COP -7 °C / +55 °C : 1,95 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz . - Classe énergétique - chauffage (35°C/55°C) : A / A . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847 x 448 x 482 . - Poids à vide / en eau (kg) : 53/75 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x 480 . - Poids en fonctionnement (kg) : 138 . - Niveau Sonore à 5 m de l'appareil dB(A) : 45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA  DUO  HP A.I. 17 KW - TRIPHASE - 526643',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE ATLANTIC ALFEA EXCLLIA  DUO  HP A.I. 17 KW - TRIPHASE . - Puissance calorifique +7 °C / +35 °C : 17  KW . - Puissance calorifique -7 °C / +60 °C :   11,7 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) :  161%  / 130% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C :   4,15/ COP -7 °C / +55 °C : 14,2 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz . - Classe énergétique - chauffage (35°C/55°C) : A / A . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851 x 648 x 684 . - Poids à vide / en eau (kg) : 53/75 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x 480 . - Poids en fonctionnement (kg) : 138 . - Niveau Sonore à 5 m de l'appareil dB(A) :45 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA A.I 14 KW - TRIPHASE - 526303',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ATLANTIC ALFEA EXCELLIA A.I 14 KW - TRIPHASE  . - Puissance calorifique : +7 °C / +35 °C : 13,00 KW . - Puissance calorifique -7 °C / +35 °C : 12,20 . - Puissance calorifique +7 °C / +55 °C : 10,60 . - Puissance calorifique -7 °C / +55 °C : 10,10 . - COP +7 °C / +35 °C: 4,18 . - COP -7 °C / +35 °C : 2,38  . - COP +7 °C / +55 °C : 2,41 . - COP -7 °C / +55 °C : 1,79 . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 150% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz  . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847x448x482 . - Poids à vide / en eau (kg) : 46 /62 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA A.I 11 KW - TRIPHASE - 526302',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCELLIA A.I 11 KW - TRIPHASE . - Puissance calorifique : +7 °C / +35 °C : 10.80 KW . - Puissance calorifique -7 °C / +35 °C : 10,38 KW . - Puissance calorifique +7 °C / +55 °C : 9,29 KW . - Puissance calorifique -7 °C / +55 °C : 9,27KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 154% / 112% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4.30  . - COP -7 °C / +35 °C : 2,43 . - COP +7 °C / +55 °C : 2,64 . - COP -7 °C / +55 °C : 1.82 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz 2 . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847x448x482 . - Poids à vide / en eau (kg) : 46 /62 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA  DUO  HP A.I. 15 KW - TRIPHASE - 526642',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE ATLANTIC ALFEA EXCLLIA  DUO  HP A.I. 15 KW - TRIPHASE  . - Puissance calorifique +7 °C / +35 °C :   15KW . - Puissance calorifique -7 °C / +60 °C :    11,2KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) :   164% / 130% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C :   4,33/ COP -7 °C / +55 °C : 1,95 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz . - Classe énergétique - chauffage (35°C/55°C) : A / A . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851 x 648 x 684 . - Poids à vide / en eau (kg) :  12 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x 480 . - Poids en fonctionnement (kg) : 138 . - Niveau Sonore à 5 m de l'appareil dB(A) : 45 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA  HP A.I. 17 KW - TRIPHASE - 526633',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE ATLANTIC ALFEA EXCLLIA  HP A.I. 17 KW - TRIPHASE . - Puissance calorifique +7 °C / +35 °C :   17KW . - Puissance calorifique -7 °C / +60 °C :    11.7KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) :   161% /130 % . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C :  4.15 / COP -7 °C / +55 °C : 1.92 . - Gaz frigorigène : R410A . - Classe énergétique - chauffage (35°C/55°C) : A / A . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847 x 448 x 482 . - Poids à vide / en eau (kg) : 53/75 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x 480 . - Poids en fonctionnement (kg) : 138 . - Niveau Sonore à 5 m de l'appareil dB(A) :..45",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR ALFEA EXTENSA A.I. 10',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : ATLANTIC | Modèle : Alféa Extensa A.I. 10 . Caractéristiques :  . Puissance calorifique (+7°C/+35°C) : 10Kw  . COP (+7°C/+35°C) : 4,02 . Fonctionnement : moyenne température  . Coefficient efficacité énergétique ETAS (%) : 113,00 (selon le règlement EU n °813/2013 de la commission du 2 août 2013)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCLLIA DUO HP A.I. 16 KW - MONOPHASE - 526641',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCLLIA DUO HP A.I. 16 KW - MONOPHASE . - Puissance calorifique : +7 °C / +35 °C : 16 KW . - Puissance calorifique : -7 °C / +60 °C : 10.8 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 163% / 125% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,15 / COP -7 °C / +55 °C : 1,85 . - Gaz frigorigène : R410A . - Alimentation : 230V/50Hz . - Classe énergétique - chauffage (35°C/55°C) : A++ / A++ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 166 / 390 . - Niveau Sonore à 5 m de l'appareil dB(A) : 37 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1428x1080x480 . - Poids en fonctionnement (kg) : 137 . - Niveau Sonore à 5 m de l'appareil dB(A) : 45 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA DUO A.I 11 KW - TRIPHASE - 526323',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCELLIA DUO A.I 11 KW - TRIPHASE . - Puissance calorifique : +7 °C / +35 °C : 10.80 KW . - Puissance calorifique : -7 °C / +60 °C : 8.48 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 154% / 112% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4.30 / COP -7 °C / +55 °C : 1.82 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz 2 . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 155 / 373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 46 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA DUO A.I 11 KW - MONOPHASE - 526321',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCELLIA DUO A.I 11 KW - MONOPHASE  . - Puissance calorifique : +7 °C / +35 °C : 10.80 KW . - Puissance calorifique : -7 °C / +60 °C : 6.71 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 151% / 112% . - COP +7 °C / +35 °C : 4.25 / COP -7 °C / +55 °C : 1.66 . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Gaz frigorigène : R410A . - Alimentation : 230V/50Hz 2 . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 155 / 373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 92 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA A.I 11 KW - MONOPHASE - 526300',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC ALFEA EXCELLIA A.I 11 KW - MONOPHASE . - Puissance calorifique : +7 °C / +35 °C : 10.80 KW . - Puissance calorifique -7 °C / +35 °C : 10.38 KW . - Puissance calorifique +7 °C / +55 °C : 7,59 KW . - Puissance calorifique -7 °C / +55 °C : 7.57 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 151% / 112% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4.25  . - COP -7 °C / +35 °C : 2.40 . - COP +7 °C / +55 °C : 2.47 . - COP -7 °C / +55 °C : 1.66 . - Gaz frigorigène : R410A . - Alimentation : 230V/50Hz  . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 847x448x482 . - Poids à vide / en eau (kg) : 46 /62 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 92 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA A.I 16 KW - TRIPHASE - 526304',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : ATLANTIC  ALFEA EXCELLIA A.I 16 KW - TRIPHASE . - Puissance calorifique : +7 °C / +35 °C : 15,7 KW . - Puissance calorifique : -7 °C / +60 °C : 10,9 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 149% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,10 / COP -7 °C / +55 °C : 1.74 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz 2 . - Classe énergétique - chauffage (35°C/55°C) : A++ / A++ . MODULE INTÉRIEUR :  . - Dimensions (H x L x P) mm : 847x448x482 . - Poids à vide / en eau (kg) : 46 / 62 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA ECXELLIA DUO A.I 14 KW - TRIPHASE - 526324',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE , ATLANTIC ALFEA ECXELLIA DUO A.I 14 KW - TRIPHASE . - Puissance calorifique : +7 °C / +35 °C : 13,00 KW . - Puissance calorifique : -7 °C / +60 °C : 10,10 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 150% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,18 / COP -7 °C / +55 °C : 1,79 . - Gaz frigorigène : R410A . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 155 / 373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALFEA EXCELLIA DUO A.I 16 KW - TRIPHASE - 526325',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE :  ATLANTIC ALFEA EXCELLIA DUO A.I 16 KW - TRIPHASE . - Puissance calorifique : +7 °C / +35 °C : 15,7 KW . - Puissance calorifique : -7 °C / +60 °C : 10,9 KW . - Efficacité énergétique saisonnière chauffage (35°C/55°C) : 149% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - COP +7 °C / +35 °C : 4,10 / COP -7 °C / +55 °C : 1.74 . - Gaz frigorigène : R410A . - Alimentation : 400V/50Hz 2 . - Classe énergétique - chauffage (35°C/55°C) : A++ / A+ . MODULE INTÉRIEUR :  . - Dimensions (H x L x P) mm : 1851x648x684 . - Poids à vide / en eau (kg) : 155/373 . - Niveau Sonore à 5 m de l'appareil dB(A) : 39 . GROUPE EXTÉRIEUR FUJITSU :  . - Dimensions (H x L x P) mm : 1290x970x400 . - Poids en fonctionnement (kg) : 99 . - Niveau Sonore à 5 m de l'appareil dB(A) : 47 . Matériaux Ballon ECS : acier émaillé  . - Contenance ballon ECS :  L 190  . - Profil de soutirage - ECS : L . - Appoint électrique ECS : kW 1,50  . - Classe énergétique - ECS : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX 110 S-T  - TRIPHASE - 3069451',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX 110 S-T 11  - TRIPHASE - 3069451',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT 110 S 11 KW - MONOPHASE - 3301393',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT COMPACT 110 S 11 KW - MONOPHASE - 3301393',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  90 S-300  - MONOPHASE - 3301390',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  90 S-300 - MONOPHASE - 3301390',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  110 S-T-300  - TRIPHASE - 3069453',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  110 S-T-300  - TRIPHASE - 3069453',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  110 S  - MONOPHASE - 3301389',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  110 S  - MONOPHASE - 3301389',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX 110 S - 300  - MONOPHASE - 3301391',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX 110 S - 300 - MONOPHASE - 3301391',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 90 S  - MONOPHASE - 3301396',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : CHAFFOTEAUX ARIANEXT PLUS 90 S  - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 8,66 KW . - Puissance calorifique nominale 7°C / 35°C : 13.95 KW . - COP (+7°C / 35°C) : 5,25 . - Efficacité saisonnière ETAs h (?',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 70M 2Z MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  70M 2Z MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C :  7kW . - COP +7/35°C : 5  Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C 128%/178%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) :  61 . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x1106x374  . - Poids : kg  94  . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 2 zone . - Puissance acoustique à l'intérieur dB(A) : 43 . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :   127 . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 90 S  - TRIPHASE - 3069461',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : CHAFFOTEAUX ARIANEXT PLUS 90 S  - TRIPHASE - MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 8,66 KW . - COP (+7°C / 35°C) : 5,25 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 189% / 133% . Calculée selon le règleme',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  90 S  - MONOPHASE - 3301388',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  90 S  - MONOPHASE - 3301388',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 110 S  - TRIPHASE - 3069462',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : CHAFFOTEAUX ARIANEXT PLUS 110 S  - TRIPHASE - MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 10,60 KW . - COP (+7°C / 35°C) : 5,15  . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 187% / 135% . Calculée selon le règl',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 50 S  - MONOPHASE - 3069458',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : CHAFFOTEAUX ARIANEXT PLUS 50 S  - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 5,87 KW . - COP (+7°C / 35°C) : 5.02 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 189% / 138% . Calculée selon le règlem',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT 90 S  - MONOPHASE - 3301392',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT COMPACT 90 S  - MONOPHASE - 3301392',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 90M MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  90M  MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C  :  9,58 kW . - COP +7/35°C : 5,1 Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C %129/189%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) :  63  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm :  1016x1506x374  . - Poids : kg  125 . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 1 zone   . - Puissance acoustique à l'intérieur dB(A) : 15  . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  118 . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 50M 2Z MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  50M 2Z  MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C kW : 5  . - COP +7/35°C :  5 Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C : 130/176%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) : 59  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x756x374  . - Poids : kg 63  . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 2 zone  . - Puissance acoustique à l'intérieur dB(A) : 43 . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  127  . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 50M MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  50M  MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C kW : 5  . - COP +7/35°C :  5 Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C : 130/176%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) : 59  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x756x374  . - Poids : kg 63  . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 1 zone  . - Puissance acoustique à l'intérieur dB(A) : 15 . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  117  . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT 50 S  - MONOPHASE - 3069455',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT COMPACT 50 S  - MONOPHASE - 3069455',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 110M MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  110M  MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C  :  10,04 kW . - COP +7/35°C : 5 Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C %132/189%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) :  63  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm :  1016x1506x374  . - Poids : kg  125 . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 1 zone   . - Puissance acoustique à l'intérieur dB(A) : 15  . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  118 . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 70M MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M  70M MOYENNE TEMPERATURE . - Puissance calorifique nominale -7/35°C :  7kW . - COP +7/35°C : 5  Ns  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C 128%/178%  . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) :  61 . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x1106x374  . - Poids : kg  94  . Module intérieur :  Compresseur Inverter DC . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur : Installation Au sol  . - Module hydraulique : 1 zone . - Puissance acoustique à l'intérieur dB(A) : 15 . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :   117 . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  90 S-T  - TRIPHASE - 3069450',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  90 S-T  - TRIPHASE - 3069450',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 40M MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M 40M MOYENNE TEMPERATURE  . - Puissance calorifique nominale  -7/35°C kW : 4,08  . - COP  +7/35°C 5,11  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C % 127/179 . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) 57  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x756x374  . - Poids : kg 63  . Module intérieur : Compresseur Inverter DC  . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + anode à courant imposé) . Module intérieur :  Installation Au sol  . - Module hydraulique : 1 zone  . - Puissance acoustique à l'intérieur dB(A) : 15 . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  117  . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT M 40M 2Z  MONO',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : CHAFFOTEAUX ARIANEXT COMPACT M 40M 2Z  MOYENNE TEMPERATURE . - Puissance calorifique nominale  -7/35°C kW : 4,08  . - COP  +7/35°C 5,11  . - Efficacité énergétique saisonnière (?s) à 55°C/35°C % 127/179 . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Puissance acoustique à l'extérieur dB(A) 57 59 61 63  . - Classe efficacité énergétique 55°C/35°C A++/A+++  . - Dimensions mm : 1016x756x374  . - Poids : kg 63  . Module intérieur : Compresseur Inverter DC  . - Colonne tout-en-un intégrant un module hydraulique et un ballon de stockage de 180 litres  . - Fonctionnement garanti jusqu'à -20°C à l'extérieur  . - Appoint électrique intégré  . - Ballon pour l'eau chaude sanitaire avec double protection  . (Anode magnésium + Anode à courant imposé) . Module intérieur :  Installation Au sol  . - Module hydraulique : 2 zone  . - Puissance acoustique à l'intérieur dB(A) :  43  . - Classe efficacité énergétique chauffage eau :  A  . - Profil de soutirage déclaré :  XL  . - Dimensions UI (lxhxp ) mm : 598x1683x606  . - Poids (vide) kg :  127  . Certificat NF PAC 1636/1556E  . Certificat HP Keymark ICIM-PDC-000001-00",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT COMPACT 70 S - MONOPHASE - 3069456',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT COMPACT 70 S  - MONOPHASE - 3069456',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  90 S-T-300 - TRIPHASE - 3069452',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  90 S-T-300  - TRIPHASE - 3069452',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  50 S  - MONOPHASE - 3069448',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  50 S - MONOPHASE - 3069448',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 70 S - MONOPHASE- 3069459',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : CHAFFOTEAUX ARIANEXT PLUS 70 S  - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 8,66 KW . - COP (+7°C / 35°C) : 5.0 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 191% / 133% . Calculée selon le règleme',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT PLUS 110 S - MONOPHASE - 3301397',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : CHAFFOTEAUX ARIANEXT PLUS 110 S - MONOPHASE -   MOYENNE TEMPERATURE . - Puissance calorifique nominale 7°C / 35°C : 10,61 KW . - COP (+7°C / 35°C) : 5,15 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 187% / 135% . Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1016x1506x380 / Poids : 135 kg . - Niveau de puissance sonore UE : 62 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ARIANEXT FLEX  70 S  - MONOPHASE - 3069449',
            //     'selling_price' => 0,
            //     'description' => 'ARIANEXT FLEX  70 S  - MONOPHASE - 3069449',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 10,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ERIA-N/E 11 kW TRI',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : CHAPPEE  . - Réference : ERIA-N/E 11 kW TRI . - Puissance calorifique à +7°C/+35°C : 11,39/14,79 . - Coefficient de performance chaud à +7°C/+35°C / +7°C/+55°C :  5,56 - 4,63 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 178/125 %  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -  Alimentation : Phase/Tension/Fréquence : 3P/380-415V/50Hz TRIPHASÉ . - Equivalent CO2 tonne :  9,6 . - Poids (à vide) - Module extérieur kg : 137,6 . - Poids (à vide) - Module intérieur kg : 37 . - Eria-N Unités extérieures  modèles 11  kW . - Hauteur : 1338 à 1350 mm  /  Largeur : 950 à 1050 mm . - Eria-N Unité intérieure . Hauteur : 679 mm / Largeur : 400 mm . Classe énergétique Erp chauffage (35°C) : A+++ . Classe énergétique Erp chauffage (55°C) : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 11,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ERIA-N/E 8 kW MONO',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : CHAPPEE  . - Réference : ERIA-N/E 8 kW MONO . - Puissance calorifique à +7°C/+35°C : 7,90/8,96 . - Coefficient de performance chaud à +7°C/+35°C / +7°C/+55°C :  5,49 - 4,66 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 178/129 %  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ  . - Equivalent CO2 tonne :  6,68  . - Poids (à vide) - Module extérieur kg : 82,2 . - Poids (à vide) - Module intérieur kg : 35 . - Eria-N Unités extérieures  modèles 8 kW . - Hauteur : 600 à 943 mm / Largeur : 840 à 950 mm . - Eria-N Unité intérieure . Hauteur : 679 mm / Largeur : 400 mm . Classe énergétique Erp chauffage (35°C) : A+++ . Classe énergétique Erp chauffage (55°C) : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 11,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ERIA-N/E 16 kW MONO',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : CHAPPEE  . - Réference : ERIA-N/E 16 kW MONO . - Puissance calorifique à +7°C/+35°C : 14,65/17,28 . - Coefficient de performance chaud à +7°C/+35°C / +7°C/+55°C :  5,43 - 4,34 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 175/121 %  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ  . - Equivalent CO2 tonne :  9,6 . - Poids (à vide) - Module extérieur kg : 124,4  . - Poids (à vide) - Module intérieur kg : 37 . - Eria-N Unités extérieures  modèles 16 kW . - Hauteur : 1338 à 1350 mm  /  Largeur : 950 à 1050 mm . - Eria-N Unité intérieure . Hauteur : 679 mm / Largeur : 400 mm . Classe énergétique Erp chauffage (35°C) : A+++ . Classe énergétique Erp chauffage (55°C) : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 11,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ERIA-N/E 11 kW MONO',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : CHAPPEE  . - Réference : ERIA-N/E 11 kW MONO . - Puissance calorifique à +7°C/+35°C : 11,39/14,79 . - Coefficient de performance chaud à +7°C/+35°C / +7°C/+55°C :  5,56 - 4,63 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 178/125 %  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Alimentation : Phase/Tension/Fréquence : 1P/220-240V/50Hz MONOPHASÉ  . - Equivalent CO2 tonne :  9,6 . - Poids (à vide) - Module extérieur kg : 124,6  . - Poids (à vide) - Module intérieur kg : 37 . - Eria-N Unités extérieures  modèles 11 kW . - Hauteur : 1338 à 1350 mm  /  Largeur : 950 à 1050 mm . - Eria-N Unité intérieure . Hauteur : 679 mm / Largeur : 400 mm . Classe énergétique Erp chauffage (35°C) : A+++ . Classe énergétique Erp chauffage (55°C) : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 11,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ERIA-N/E 16 kW TRI',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : CHAPPEE  . - Réference : ERIA-N/E 16 kW TRI . - Puissance calorifique à +7°C/+35°C : 14,65/17,28 . - Coefficient de performance chaud à +7°C/+35°C / +7°C/+55°C :  5,43 - 4,34 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 175/121 %  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -  Alimentation : Phase/Tension/Fréquence : 3P/380-415V/50Hz TRIPHASÉ . - Equivalent CO2 tonne :  9,6 . - Poids (à vide) - Module extérieur kg : 136,6  . - Poids (à vide) - Module intérieur kg : 37 . - Eria-N Unités extérieures  modèles 16 kW . - Hauteur : 1338 à 1350 mm  /  Largeur : 950 à 1050 mm . - Eria-N Unité intérieure . Hauteur : 679 mm / Largeur : 400 mm . Classe énergétique Erp chauffage (35°C) : A+++ . Classe énergétique Erp chauffage (55°C) : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 11,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 14KW - MONOBLOC EBLA14DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 14KW - MONOBLOC EBLA14DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique :14 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.70/3.42 . - COP saisonnier à 7°C ext à 35°C : 4.87 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) :185 %/134 %  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 18 KW -  TRIPHASE - EPRA18DW1 + U.I ETBH16D9W',
            //     'selling_price' => 9000,
            //     'description' => 'Marque :  DAIKIN / HAUTE TEMPERATURE . Référence :  ALTHERMA 3 H HT 18 KW - TRIPHASE - EPRA18DW1 + U.I ETBH16D9W . - Puissance calorifique maxi 7°C / 35°C : 11,15 KW . - COP (+7°C / 60°C) : 2,61 / SCOP (35°C / 55°C) : 4,51 / 3,58 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 177% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 146 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 16 KW ERSQ016AV1 + EKHBRD016ACV1',
            //     'selling_price' => 4000,
            //     'description' => "DAIKIN ALTHERMA 16KW - ERSQ016AV1 + EKHBRD016ACV1 .  . Unité extérieure : ERSQ016AV1 . - Puissance calorifique : 16kW . - Cop  7/35° : 3.72 . - Cop 7/55 : 3.19 . - Type ce compresseur : scroll . - Dimension H*L*P : 1345 x 900 x 320 . - Dimension de l unité : 120 . - Garniture d'étanchéité H*L*P : 1.524*980*420 .  - Puissance sonore : 71 dBA . - Pression acoustique :  55 dBA . - Réfrigérant : R-410A . - Alimentation (Nom / Phase / Fréquence / Tension : V1/1~/50/220-240 . - Etas 35°/55° : 110 % / 116° .  . Unité intérieure : EKHBRD016ACV1 .  . - Dimension H*L*P : 705*600*695 . - Réfrigérant : R-134A . - Type ce compresseur : scroll . - Dimension de l'unité : 144.25",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA BASSE TEMPERATURE - EBBH16D6V + ERLA14DV3',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN . Référence : ALTHERMA BASSE TEMPERATURE - EBBH16D6V + ERLA14DV3 . - Puissance calorifique : 12 kW . - Cop (7°C / 35°C) : 4.87 . - Puissance acoustique intérieur : 44 dB(A) . - Puissance acoustique extérieur : 62 dB(A) . - SCOP (35°C / 55°C) : 4.60 / 3.22 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 181% / 126% . - Classe efficacité énergétique (35°C / 55°C) :  A+++/ A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 11 KW 80°C - MONOPHASE - ERSQ011AV1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN  . Référence : ALTHERMA R HT 11KW 80°C - MONOPHASE - ERSQ011AV1 . - Puissance calorifique maxi 7°C / 35°C : 11,2 KW . - COP +7°C / 35°C :  4,2 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 115% / 105% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE :  (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 68 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 59 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.62/3.33 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAKIN ALTHERMA 3 H HT Bi-BLOC 14 KW - MONOPHASE - EPGA14DV',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN / MOYENNE TEMPERATURE . Référence : ALTHERMA 3 H Bi-BLOC 14 KW - MONOPHASE - EPGA14DV . - Puissance calorifique maxi 7°C / 35°C : 16,39 KW . - COP (+7°C / 35°C) : 4,62 / SCOP (35°C / 55°C) : 4,45 / 3,34 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 440 x 1 160 x 380 / Poids : 143 kg . - Niveau de puissance sonore UE : 42 dB . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 38 kg . - Niveau de puissance sonore UI : 36 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11D3V3/W1 - BASSE TEMPÉRATURE  TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11D3V3/W1 - BASSE TEMPÉRATURE  TRIPHASE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 11 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.73/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 186%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Triphasé 400/3N~/50 . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 149 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 14KW - MONOBLOC EDLA14D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 14KW - MONOBLOC EDLA14D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 14kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.63/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.87 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/132 %  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 16 KW 80°C - TRIPHASE - ERSQ016 AY1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque :  DAIKIN  . Référence : ALTHERMA R HT 16KW 80°C - TRIPHASE - ERSQ016 AY1 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 3,72 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 112% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 71 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 60 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique : 11kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.64/3.32 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 9KW - MONOBLOC EBLA09D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 9KW - MONOBLOC EBLA09D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 9 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.82/3.44 . - COP saisonnier à 7°C ext à 35°C : 4.91 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 190%/135 %  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 14 KW - TRIPHASE - EPRA14DW1 +  U.I ETBH16D9W',
            //     'selling_price' => 9000,
            //     'description' => 'Marque :  DAIKIN  / HAUTE TEMPERATURE . Référence : ALTHERMA 3 H HT  EPRA14DW1 +  U.I ETBH16D9W . - Puissance calorifique maxi 7°C / 35°C : 10,18 KW . - COP (+7°C / 60°C) : 2,62 / SCOP (35°C / 55°C) : 4,71 / 3,57 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 186% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 151 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H Bi-BLOC 11 KW - MONOPHASE - EPGA11DV',
            //     'selling_price' => 9000,
            //     'description' => 'Marque :  DAIKIN  . Référence : ALTHERMA 3 H Bi-BLOC 11 KW - MONOPHASE - EPGA11DV . - Puissance calorifique maxi 7°C / 35°C : 14,73 KW . - COP (+7°C / 35°C) : 4,73 / SCOP (35°C / 55°C) : 4,38 / 3,29 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 172% / 129% . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 440 x 1 160 x 380 / Poids : 143 kg . - Niveau de puissance sonore UE : 42 dB . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 38 kg . - Niveau de puissance sonore UI : 36 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 9KW - MONOBLOC EBLA09DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 9KW - MONOBLOC EBLA09DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Sans appoint électrique . - Puissance calorifique : 9kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.82/3.44 . - COP saisonnier à 7°C ext à 35°C : 4.91 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 190%/ 135%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 14 KW 80°C - MONOPHASE - ERSQ014 AV1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN  . Référence : ALTHERMA R HT 14KW 80°C - MONOPHASE - ERSQ014 AV1 . - Puissance calorifique maxi 7°C / 35°C : 14,4 KW . - COP (+7°C / 35°C) : 3,72 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 110% / 116% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 69 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 60 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 18 KW -  MONOPHASE - EPRA18DV3+ U.I ETBH16D6V',
            //     'selling_price' => 9000,
            //     'description' => 'Marque :  DAIKIN / HAUTE TEMPERATURE . Référence :  ALTHERMA 3 H HT 18 KW - MONOPHASE - EPRA18DV3 + U.I ETBH16D6V . - Puissance calorifique maxi 7°C / 35°C : 11,15 KW . - COP (+7°C / 60°C) : 2,61 / SCOP (35°C / 55°C) : 4,51 / 3,58 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 177% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 146 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.69/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 185%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 14KW - MONOBLOC EBLA14D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 14KW - MONOBLOC EBLA14D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique :14 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.70/3.42 . - COP saisonnier à 7°C ext à 35°C : 4.87 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) :185 %/134 %  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 9KW - MONOBLOC EDLA09D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 9KW - MONOBLOC EDLA09D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 9 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.72/3.39 . - COP saisonnier à 7°C ext à 35°C : 4.91 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 186%/133 %  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 14 KW 80°C - TRIPHASE - ERSQ014 AY1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN . Référence : ALTHERMA R HT 14KW 80°C - TRIPHASE - ERSQ014 AY1 . - Puissance calorifique maxi 7°C / 35°C : 14,4 KW . - COP (+7°C / 35°C) : 3,72 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 110% / 116% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 69 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 60 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 14 KW - MONOPHASE - EPRA14DV3 +  U.I ETBH16D6V',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN / HAUTE TEMPERATURE . Référence : ALTHERMA 3 H HT  14 KW - MONOPHASE - EPRA14DV3 + U.I ETBH16D6V . - Puissance calorifique maxi 7°C / 35°C : 10,16 KW . - COP (+7°C / 60°C) : 2,61  . - SCOP (35°C / 55°C) : 4,51 / 3,58 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 177% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 146 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Sans appoint électrique . - Puissance calorifique : 11 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.73/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 186%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.69/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 185%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 11kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.64/3.32 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11D3V3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EBLA11D3V3/W1 - BASSE TEMPÉRATURE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 11 kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.73/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 186%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16D3V3/W1 - BASSE TEMPÉRATURE  TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16D3V3/W1 - BASSE TEMPÉRATURE TRIPHASE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.62/3.33 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Triphasé 400/3N~/50 . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 149 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16D3V3/W1 - BASSE TEMPÉRATURE TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EBLA16D3V3/W1 - BASSE TEMPÉRATURE TRIPHASE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.69/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 185%/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Triphasé 400/3N~/50 . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 149 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H Bi-BLOC 16 KW - MONOPHASE - EPGA16DV',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN . Référence : ALTHERMA 3 H Bi-BLOC 16 KW - MONOPHASE - EPGA16DV . - Puissance calorifique maxi 7°C / 35°C : 19,21 KW . - COP (+7°C / 35°C) : 4,54 / SCOP (35°C / 55°C) : 4,56 / 3,41 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 179% / 133% . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 440 x 1 160 x 380 / Poids : 143 kg . - Niveau de puissance sonore UE : 42 dB . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 38 kg . - Niveau de puissance sonore UI : 36 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11D3V3/W1 - BASSE TEMPÉRATURE TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 11KW - MONOBLOC EDLA11D3V3/W1 - BASSE TEMPÉRATURE TRIPHASE . - Unité extérieure Avec appoint électrique . - Puissance calorifique : 11kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.64/3.32 . - COP saisonnier à 7°C ext à 35°C : 4.83 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Triphasé 400/3N~/50 . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 149 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 16 KW - TRIPHASE - EPRA16DW1+ U.I ETBH16D9W',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN / HAUTE TEMPERATURE  . Référence :  ALTHERMA 3 H HT 16 KW - TRIPHASE - EPRA16DW1 + U.I ETBH16D9W . - Puissance calorifique maxi 7°C / 35°C : 11,15 KW . - COP (+7°C / 60°C) : 2,62 / SCOP (35°C / 55°C) : 4,71 / 3,57 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 186% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 151 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 16KW - MONOBLOC EDLA16DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique : 16kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C :  4.62/3.33 . - COP saisonnier à 7°C ext à 35°C : 4.53 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 182%/ 130%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 9KW - MONOBLOC EDLA09DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 9KW - MONOBLOC EDLA09DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique : 9kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C :  4.72/3.39 . - COP saisonnier à 7°C ext à 35°C : 4.91 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) : 186%/ 133%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H HT BI-BLOC 70° 16 KW - MONOPHASE - EPRA16DV3+ U.I ETBH16D6V',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN / HAUTE TEMPERATURE  . Référence : ALTHERMA 3 H HT 16 KW - MONOPHASE - EPRA16DV3 + U.I ETBH16D6V . - Puissance calorifique maxi 7°C / 35°C : 11,13 KW . - COP (+7°C / 60°C) : 2,61 / SCOP (35°C / 55°C) : 4,71 / 3,58 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 177% / 140% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 146 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 42 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'DAIKIN ALTHERMA 3M 14KW - MONOBLOC EDLA14DV3/W1 - BASSE TEMPÉRATURE',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : DAIKIN ALTHERMA 3M 14KW - MONOBLOC EDLA14DV3/W1 - BASSE TEMPÉRATURE . - Unité extérieure sans appoint électrique . - Puissance calorifique : 14kW  . - SCOP saisonnier à 7°C ext à 35°C/55°C : 4.62/3.37 . - COP saisonnier à 7°C ext à 35°C : 4.87 . - Efficacité énergétique saisonnière (?s) (35 °C/55 °C) :182 %/ 132%  . Selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - Alimentation électrique : Monophasé . - Fluide Réfrigérant :  R32 . - Vase d'expansion  chauffage : L 8  . - Niveaux de pression sonore Chauffage : dB(A) 40 . - Puissance acoustique (extérieur/intérieur) : dB(A) 60 . - Dimensions de l'unité H x L x P : mm 870 x 1 380 x 460  . - Poids de l'unité :  kg 147 . Classe énergétique : A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA Taille 6 + 230 L ERGA06EV + EHVH08S23D6V',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : DAIKIN   . MODELE : Altherma Taille 6 + 230 L  / UI  EHVH08S23D6V + UE ERGA06EV  MOYENNE TEMP . - Puissance calorifique maxi 7°C / 35°C : 6,00 KW . - COP 7/35°C : 4,85    / SCOP (35°C / 55°C) : 4,47 / 3,26 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 176% / 127% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Alimentation V/Ph/Hz : 230/V3/1~/50 230/V3/1~/50 . - Niveau sonore  : 42 db(A) . - Dimensions UE (H x L x P) mm : 740 x 884 x 388 / Poids : 58,5 kg . - Niveau de puissance sonore UE : 32 dB . UNITE INTERIEUR . - Volume ballon 230 Litres . - Coefficient de performance (COP DHW) 3,3 . - Cycle de puisage selon la norme NF EN 16147  : XL . - Matériau du ballon d'Eau Chaude Sanitaire : Inox . - Durée de mise en témpérature h/min 1h47 . - Dimensions UI : (H x L x P) mm :1 850 x 595 x 600 / Poids : 139 kg . - Niveau de puissance sonore UI : 28 dB . - Classe efficacité énergétique 35°C :  A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 11 KW 80°C - TRIPHASE - ERSQ011AY1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN . Référence : ALTHERMA R HT 11KW 80°C - TRIPHASE - ERSQ011AY1 . - Puissance calorifique maxi 7°C / 35°C : 11,2 KW . - COP (+7°C / 35°C) : 4,2 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 105% / 115% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 68 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 59 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA R HT 16 KW 80°C - MONOPHASE - ERSQ016 AV1',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : DAIKIN  . Référence : ALTHERMA R HT 16KW 80°C - MONOPHASE - ERSQ016 AV1 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 3,72 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 112% / 117% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 1345 x 900 x 320 / Poids : 120 kg . - Niveau de puissance sonore UE : 71 dB . - Dimensions UI : (H x L x P) mm : 705 x 600 x 695 . - Niveau de puissance sonore UI : 60 dB . - Classe efficacité énergétique 35°C :  A+',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 13,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 27 KW HPI-S/H 27 TR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 27 KW HPI-S/H 27 TR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 24,40 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 151%/112% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 4,60/4,12 . Equivalent CO2 : 16,08 t . Puissance acoustique extérieure : 77 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 148 . Unité extérieure . Hauteur (mm) : 1338 . Largeur (mm) : 1050 . Profondeur (mm) : 417 . Poids à vide (kg) : 76,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-M/E 11 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-M/E 11 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Caractéristiques techniques . Puissance calorifique : 11,20 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 132% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,31/4,86 . Equivalent CO2 : 6,89 t . Puissance acoustique extérieure : 60 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHPR 4,5KW  STRATEO R32 4,5 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques :  STRATEO R32 4,5 MR/E . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,10 kW - SCOP (35 °C/55 °C)  : 4,48/3,43 . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 176/134% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,37/4,44 . - Equivalent CO? : 0,81t . - Niveau sonore** extérieure : 36 dB[A] . - Niveau sonore** intérieure : 24 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h35 . - Profil de soutirage : L  /  Cycle de soutirage (M/L) : 131%/139% . - COP ECS (L) : 3,3 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (1 circuit)  : 173/13,3 kg . Unité extérieure . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW HPI-S/H 6 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 6 KW HPI-S/H 6 MR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Puissance calorifique : 5,87 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 176%/138% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,52/4,65 . Equivalent CO2 : 2,92 t . Puissance acoustique extérieure : 65 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 730 . Largeur (mm) : 809 . Profondeur (mm) : 360 . Poids à vide (kg) : 47 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'HPI-S/E 22KW TRI APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 22 KW HPI-S/E 22 TR APPOINT ELECTRIQUE MOYENNE TEMPERATURE  . Puissance calorifique :21,70 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 153%/114% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 4,60/3,76 . Equivalent CO2 : 14,82 t . Puissance acoustique extérieure : 77 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 Largeur (mm) : 600 Profondeur (mm) : 510 . Poids à vide (kg) : 143 . Unité extérieure . Hauteur (mm) : 1338 Largeur (mm) : 1050 Profondeur (mm) : 417 . Poids à vide (kg) : 76,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW ALEZIO S 11 TR/ET V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 TR/ET V200 . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . - SCOP (35 °C/55 °C) : 4,54/3,20 . - Equivalent CO? : 9,6 t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A  :  4,6 kg . - Plage de fonctionnement air extérieur : - 20°C/+35°C . - Alimentation électrique : Triphasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h33 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 131 . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 370 . - Poids à vide (kg) : 124 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 8 KW STRATEO 8 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO 8 MR/E . Puissance calorifique : 7,65 kW - SCOP (35 °C/55 °C) : 4,52/3,26 . Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) :  178%/126% . COP à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,60 . Equivalent CO? : 6,68 t . Niveau sonore** extérieure : 44 dB[A] . Niveau sonore** intérieure : 31 dB[A] . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . Température ECS max. : 65°C . Durée de mise en température : 1h15 . COP ECS (M/L) : 2,5/2,9 . Cycle de soutirage (M/L) : 107%/123% .  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1950 . Largeur (mm) : 560 . Profondeur (mm) : 586 . Poids platine raccordement / module intérieur (kg) : 12.5 / 176.5 . Unité extérieure . Hauteur (mm) : 943 . Largeur (mm) : 950 . Profondeur (mm) : 360 . Poids (kg) : 82,2",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 16 KW TRI  TR/ET APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 16 TR/ET APPOINT ELECTRIQUE   . - SCOP (35 °C/55 °C) : 4,45/3,10  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,43 - 4,34 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 68 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Triphasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/ET . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 137,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 8 KW ALEZIO S COMPACT 8 MR/EM',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 8 MR/EM . - Puissance calorifique à +7 °C/+35 °C : 7,90/8,96 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/129% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,66 . -  SCOP (35 °C/55 °C) 4,52/3,29 . - Puissance acoustique extérieure : 67 dB . - Puissance acoustique intérieure : 36 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 6,68 t . - Plage de fonctionnement air extérieur  : - 20°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h21 . - COP ECS (M/L) : 2,30/2,61 . - Cycle de soutirage (M/L) : 98%/107% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 943 - Largeur (mm) : 950 - Profondeur (mm) : 360 . - Poids (kg) : 82,2 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 11 KW ALEZIO S COMPACT 11 TR/ET',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 11 TR/ET . - Puissance calorifique à +7 °C/+35 °C : 11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . -  SCOP (35 °C/55 °C) 4,54/3,20 . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 40 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 9,60 t . - Plage de fonctionnement air extérieur  : - 20°C/+35°C . - Alimentation électrique : Triphasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h27 . - COP ECS (L) : 2,74 . - Cycle de soutirage (L) : 114% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 360 . - Poids (kg) : 137,6 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'HPI-S/E 27 TRI APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 27 KW HPI-S/E 27 TR APPOINT ELECTRIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 24,40 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 151%/112% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 4,60/4,12 . Equivalent CO2 : 16,08 t . Puissance acoustique extérieure : 77 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 Largeur (mm) : 600 Profondeur (mm) : 510 . Poids à vide (kg) : 148 . Unité extérieure . Hauteur (mm) : 1338 Largeur (mm) : 1050 Profondeur (mm) : 417 . Poids à vide (kg) : 76,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW HPI-M/E 6 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 6 KW HPI-M/E 6 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 6 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 184% / 129% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,55/4,62 . Equivalent CO2 : 5,01 t . Puissance acoustique extérieure : 58 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . - Dimensions et poids :  . - Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . - Unité extérieure :  . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++ . MARQUE : DE DIETRICH 6 KW HPI-M/H 6 MR APPOINT   MOYENNE TEMPERATURE . Puissance calorifique : 6 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 184% / 129% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,55/4,62 . Equivalent CO2 : 5,01 t . Puissance acoustique extérieure : 58 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . - Dimensions et poids :  . - Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . - Unité extérieure :  . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 4,5 KW ALEZIO S 4,5 MR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 4,5 MR/H APPOINT HYDRAULIQUE . - SCOP (35 °C/55 °C) : 4,80/3,42  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,00 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 189%/134% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,22 - 4,96 . - Equivalent CO? : 2,71 t . - Puissance acoustique extérieure : 61 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A  :  1,3 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 .  . Unité extérieure . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . - Poids à vide (kg) : 63",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW ALEZIO S 6 MR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 6 MR/H APPOINT HYDRAULIQUE . - SCOP (35 °C/55 °C) : 4,48/3,49  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 5,82/7,60 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 176%/138% . - COP  à 7°C ext. et sortie eau à 35°C/55°C :  5,52 - 4,65 . - Equivalent CO? : 2,92t . - Puissance acoustique extérieure : 64 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A : 1,4 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 .  . Unité extérieure . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . -Poids à vide (kg) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 4,5 KW ALEZIO S 4,5 MR V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 4,5 MR V200 . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,00 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 189%/134% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,22 - 4,96 . - SCOP (35 °C/55 °C) : 4,80/3,42  . - Equivalent CO? : 2,71 t . - Puissance acoustique extérieure : 61 dB . - Puissance acoustique intérieure : 49 dB . - Charge en fluide frigorigène R 410A  :  1,3 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (M/L) : 106%/123%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h40 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 129 . Unité extérieure . - Hauteur (mm) : 880 - Largeur (mm) : 921 - Profondeur (mm) : 360 . - Poids à vide (kg) : 63 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A+++/A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHPR 8KW STRATEO R32 8 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO R32 8 MR/E 2C . - Puissance calorifique à +7 °C/+35 °C : 6,40/8,70 - SCOP (35 °C/55 °C)  : 7,60/9,00 . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 176%/124% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,70/4,10 . - Equivalent CO? : 0,81t . - Niveau sonore** extérieure : 37 dB[A] . - Niveau sonore** intérieure : 28 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h25 . - Profil de soutirage : L  / Cycle de soutirage (M/L) : 122%/120% . - COP ECS (L) : 2,85 .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 185kg/14,3kg  . Unité extérieure . - Hauteur (mm) : 943 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW MONO ALEZIO S 16 MR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 16 MR/H APPOINT HYDRAULIQUE . - SCOP (35 °C/55 °C) : 4,45/3,10  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,43 - 4,34 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 68 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 124,4 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW HPI-S/H 8 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE :  DE DIETRICH 8 KW HPI-S/H 8 MR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Puissance calorifique : 8,26 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/129% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,66 . Equivalent CO2 : 6,68  t . Puissance acoustique extérieure : 65 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 943 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 82,2 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => '8 KW ALEZIO S 8 MR V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 8 MR V200 . - Puissance calorifique à +7 °C/+35 °C : 7,90/8,96 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/129% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,63 . - SCOP (35 °C/55 °C) : 4,52/3,29 . - Equivalent CO? : 6,68 t . - Puissance acoustique extérieure : 67 dB . - Puissance acoustique intérieure : 49 dB . - Charge en fluide frigorigène R 410A  :  3,2 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h58 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 129 . Unité extérieure . - Hauteur (mm) : 943 - Largeur (mm) : 950 - Profondeur (mm) : 370 . - Poids à vide (kg) : 82 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW ALEZIO S 8 MR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 8 MR/H APPOINT HYDRAULIQUE . - SCOP (35 °C/55 °C) : 4,52/3,29  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  7,90/8,96 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/129% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,49 - 4,66 . - Equivalent CO? : 6,68t . - Puissance acoustique extérieure : 65 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  3,2 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 .  . Unité extérieure . - Hauteur (mm) : 943 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 82,2",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-S/E 11 TR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-S/E 11 TR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 10,56 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/125% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/137,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 6 KW ALEZIO S COMPACT 6 MR/EM',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 6 MR/EM . - Puissance calorifique à +7 °C/+35 °C : 5,82/7,60 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 176%/138% . - COP  à 7°C ext. et sortie eau à 35°C/55°C :5,52/4,65 . -  SCOP (35 °C/55 °C) 4,48/3,49 . - Puissance acoustique extérieure : 65 dB . - Puissance acoustique intérieure : 36 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 2,92 t . - Plage de fonctionnement air extérieur  : -15°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h33 . - COP ECS (M/L) : 2,30/2,62 . - Cycle de soutirage (M/L) : 98%/107% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 630 - Largeur (mm) : 871 - Profondeur (mm) : 360 . - Poids (kg) : 47 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHPR 4,5KW  STRATEO R32 4,5 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques :  STRATEO R32 4,5 MR/E 2C . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,10 kW - SCOP (35 °C/55 °C)  : 6,36/4,38 . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 176/134% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,37/4,44 . - Equivalent CO? : 0,81t . - Niveau sonore** extérieure : 36 dB[A] . - Niveau sonore** intérieure : 24 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h35 . - Profil de soutirage : L  /  Cycle de soutirage (M/L) : 131%/139% . - COP ECS (L) : 3,3 .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 185kg/14,3kg  . Unité extérieure  . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 16 KW MONO MR/EM APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 16 MR/EM APPOINT ELECTRIQUE   . - SCOP (35 °C/55 °C) : 4,45/3,10  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,43 - 4,34 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 68 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/EM . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 124,4 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHPR 6KW STRATEO R32 6 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques :  STRATEO R32 6 MR/E 2C . - Puissance calorifique à +7 °C/+35 °C : 6,40/8,70 - SCOP (35 °C/55 °C) : 4,5/3,37 . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 177%/132% . COP à 7°C ext. et sortie eau à 35°C/55°C : 5,61/4,07 . - Equivalent CO? :0,81t . - Niveau sonore** extérieure : 36 dB[A] . - Niveau sonore** intérieure : 26 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h35 . - Profil de soutirage : L  / Cycle de soutirage (M/L) : 123%/135% . - COP ECS (L) : 3,2 .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 185kg/14,3kg  . Unité extérieure . - Hauteur (mm) : 630 . - Largeur (mm) : 871 . - Profondeur (mm) : 360 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHPR 6KW STRATEO R32 6 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques :  STRATEO R32 6 MR/E . - Puissance calorifique à +7 °C/+35 °C : 6,40/8,70 - SCOP (35 °C/55 °C) : 4,5/3,37 . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 177%/132% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,61/4,07 . - Equivalent CO? :0,81t . - Niveau sonore** extérieure : 36 dB[A] . - Niveau sonore** intérieure : 26 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h35 . - Profil de soutirage : L  / Cycle de soutirage (M/L) : 123%/135% . - COP ECS (L) : 3,2 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (1 circuit) :  173/13,3 kg . Unité extérieure . - Hauteur (mm) : 630 . - Largeur (mm) : 871 . - Profondeur (mm) : 360 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 16 KW ALEZIO S COMPACT 16 TR/ET',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 16 TR/ET . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C :  5,43/4,34 . -  SCOP (35 °C/55 °C) 4,45/3,10 . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 40 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 9,60 t . - Plage de fonctionnement air extérieur  : - 20°C/+35°C . - Alimentation électrique : Triphasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h27 . - COP ECS (L) : 2,57 . - Cycle de soutirage (L) : 105% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 360 . - Poids (kg) :  136,6 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW HPI-S/E 16 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 16 KW HPI-S/E 16 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 14,19 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 175%/121% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,43/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/136,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW ALEZIO S 6 MR V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 6 MR V200 . - Puissance calorifique à +7 °C/+35 °C : 5,82/7,60 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 176%/138% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,52/4,65 . - SCOP (35 °C/55 °C) : 4,48/3,49 . - Equivalent CO? : 2,92 t . - Puissance acoustique extérieure : 65 dB . - Puissance acoustique intérieure : 49 dB . - Charge en fluide frigorigène R 410A  :  1,4 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 2h00 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 129 . Unité extérieure . - Hauteur (mm) : 630 - Largeur (mm) : 871 - Profondeur (mm) : 360 . - Poids à vide (kg) : 47 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR  DE DIETRICH AWHP 4,6 KW STRATEO  4,5 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO  4,5 MR/E . - Puissance calorifique : 4,6 kW - SCOP (35 °C/55 °C) : 4,83/3,20  . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 190%/125% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,36/4,38 . - Equivalent CO? : 2,71 t . - Niveau sonore** extérieure : 33 dB[A] . - Niveau sonore** intérieure : 22 dB[A] . - Fluide frigorigène : R410 A . - Plage de fonctionnement air extérieur  : -15°C/+35°C . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h40 . - COP ECS (M/L) : 2,8/3,2 . - Cycle de soutirage (M/L) : 118%/133% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids platine raccordement / module intérieur (kg) : 12.5 / 176.5 . Unité extérieure . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . - Poids (kg) : 63",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-S/H 11 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-S/H 11 MR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Puissance calorifique : 10,56 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/125% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/137,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW  HPI-S/H 11 TR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-S/H 11 TR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Puissance calorifique : 10,56 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/125% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/137,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR  DE DIETRICH AWHP 4,6 KW STRATEO  4,5 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO  4,5 MR/E 2C . - Puissance calorifique : 4,6 kW - SCOP (35 °C/55 °C) : 4,83/3,20  . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 190%/125%  . COP à 7°C ext. et sortie eau à 35°C/55°C : 6,36/4,38 . - Equivalent CO? : 2,71 t . - Niveau sonore** extérieure : 33 dB[A] . - Niveau sonore** intérieure : 22 dB[A] . - Fluide frigorigène : R410 A . - Plage de fonctionnement air extérieur  : -15°C/+35°C . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h40 . - COP ECS (M/L) : 2,8/3,2 . - Cycle de soutirage (M/L) : 118%/133% .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 188/13,5 kg . Unité extérieure  . - Hauteur (mm) : 880 . - Largeur (mm) : 921 . - Profondeur (mm) : 360 . - Poids (kg) : 63",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW HPI-M/E 8 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 8 KW HPI-M/E 8 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 9 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 136% . Certifiée selon règlement n°813/2013  . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,28/4,90 . Equivalent CO2 : 5,01 t . Puissance acoustique extérieure : 58 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW HPI-S/H 16 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 16 KW HPI-S/H 16 MR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 14,19 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 175%/121% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,43/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/136,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-M/H 11 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-M/H 11 MR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Caractéristiques techniques . Puissance calorifique : 11,20 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 132% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,31/4,86 . Equivalent CO2 : 6,89 t . Puissance acoustique extérieure : 60 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW ALEZIO S 16 TR/ET V200  TRIPHASE MOYENNE TEMPERATURE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : DE DIETRICH    . - Référence : ALEZIO S 16 TR/ET V200  TRIPHASE / MOYENNE TEMPERATURE . - Puissance calorifique à +7 °C/+35 °C :  14,65/17,28 kW . - Efficacité énergétique saisonnière  (35 °C/55 °C) : 175%/121% . L'efficacité énergétique saisonnière (?s) selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013  . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . - SCOP (35 °C/55 °C) :  4,45/3,10 . - Equivalent CO? : 9,6 t . - Puissance acoustique extérieure : 70 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A  :  4,6 kg . - Plage de fonctionnement air extérieur : - 20°C/+35°C . - Alimentation électrique : Triphasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h11 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 131 . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 370 . - Poids à vide (kg) : 137 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW ALEZIO S 6 MR/EM APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 6 MR/EM APPOINT ELECTRIQUE   . - Puissance calorifique à +7 °C/+35 °C : 5,82/7,60 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 176%/138% . - COP  à 7°C ext. et sortie eau à 35°C/55°C :  5,52 - 4,65 . - SCOP (35 °C/55 °C) : 4,48/3,49   . - Equivalent CO? : 2,92t . - Puissance acoustique extérieure : 64 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A : 1,4 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/EM . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 - Largeur (mm) : 400 - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 . Unité extérieure . - Hauteur (mm) : 880 - Largeur (mm) : 921 - Profondeur (mm) : 360 . -Poids à vide (kg) : 47 . Classe énergétique : A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 4,5 KW ALEZIO S COMPACT 4,5 MR/EM',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 4,5 MR/EM . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,00 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 189%/134% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,22/4,96 . -  SCOP (35 °C/55 °C) 4,80/3,42  . - Puissance acoustique extérieure : 58 dB . - Puissance acoustique intérieure : 36 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 2,71 t . - Plage de fonctionnement air extérieur  : -15°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h40 . - COP ECS (M/L) : 2,74/2,90 . - Cycle de soutirage (M/L) : 113%/117% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 880 - Largeur (mm) : 840 - Profondeur (mm) : 360 . - Poids (kg) : 63  . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW HPI-S/H 16 TR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 16 KW HPI-S/H 16 TR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 14,19 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 175%/121% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,43/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/136,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW HPI-S/E 6 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 6 KW HPI-S/E 6 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 5,87 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 176%/138% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,52/4,65 . Equivalent CO2 : 2,92 t . Puissance acoustique extérieure : 65 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 730 . Largeur (mm) : 809 . Profondeur (mm) : 360 . Poids à vide (kg) : 47 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 11 KW ALEZIO S COMPACT 11 MR/EM',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 11 MR/EM . - Puissance calorifique à +7 °C/+35 °C : 11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . -  SCOP (35 °C/55 °C) 4,54/3,20 . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 40 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 9,60 t . - Plage de fonctionnement air extérieur  : - 20°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h27 . - COP ECS (L) : 2,74 . - Cycle de soutirage (L) : 114% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 360 . - Poids (kg) : 124,6 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW TRI ALEZIO S 16 TR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 16 TR/H APPOINT HYDRAULIQUE . - SCOP (35 °C/55 °C) : 4,45/3,10  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,43 - 4,34 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 68 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Triphasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 137,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 16 KW  MR/EM V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 16 MR/EM V200 . - Puissance calorifique à +7 °C/+35 °C :  14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,43 . - SCOP (35 °C/55 °C) :  4,45/3,10 . - Equivalent CO? : 9,6 t . - Puissance acoustique extérieure : 70 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A  :  4,6 kg . - Plage de fonctionnement air extérieur : - 20°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h11 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 131 . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 370 . - Poids à vide (kg) : 137 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 6 KW STRATEO 6 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO 6 MR/E 2C . Puissance calorifique : 5,82 kW - SCOP (35 °C/55 °C) : 4,15/3,30  . Efficacité énergétique saisonnière chauffage (35 °C/55 °C) :  166/%126% . COP à 7°C ext. et sortie eau à 35°C/55°C : 6,16/4,63 . Equivalent CO? : 2,92 t . Niveau sonore** extérieure : 40 dB[A] . Niveau sonore** intérieure : 31 dB[A] . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -15°C/+35°C . Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . Température ECS max. : 65°C . Durée de mise en température : 1h40 . COP ECS (M/L) : 2,7/3,2 . Cycle de soutirage (M/L) : 117%/130% .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . Hauteur (mm) : 1950 . Largeur (mm) : 560 . Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 188/13,5 kg . Unité extérieure  . Unité extérieure . Hauteur (mm) : 630 . Largeur (mm) : 871 . Profondeur (mm) : 360 . Poids (kg) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-M/E 11 TR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-M/E 11 TR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Caractéristiques techniques . Puissance calorifique : 11,20 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 132% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,31/4,86 . Equivalent CO2 : 6,89 t . Puissance acoustique extérieure : 60 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AWHPR 8KW STRATEO R32 8 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO R32 8 MR/E . - Puissance calorifique à +7 °C/+35 °C : 6,40/8,70 - SCOP (35 °C/55 °C)  : 7,60/9,00 . - Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) : 176%/124% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,70/4,10 . - Equivalent CO? : 0,81t . - Niveau sonore** extérieure : 37 dB[A] . - Niveau sonore** intérieure : 28 dB[A] . - Charge en fluide frigorigène R32 1,2 kg . - Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . - Température ECS max. : 75°C . - Durée de mise en température : 1h25 . - Profil de soutirage : L  / Cycle de soutirage (M/L) : 122%/120% . - COP ECS (L) : 2,85 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1950 . - Largeur (mm) : 560 . - Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (1 circuit)  :  173/13,3 kg . Unité extérieure . - Hauteur (mm) : 943 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids (kg) : 54",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 6 KW HPI-M/H 6 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 6 KW HPI-M/H 6 MR APPOINT HYDRAULIQUE  MOYENNE TEMPERATURE . Puissance calorifique : 6 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 184% / 129% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,55/4,62 . Equivalent CO2 : 5,01 t . Puissance acoustique extérieure : 58 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . - Dimensions et poids :  . - Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . - Unité extérieure :  . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 11 KW MONO MR/EM APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 MR/EM APPOINT ELECTRIQUE   . - SCOP (35 °C/55 °C) :4,54/3,20  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56 - 4,63 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/EM . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 124,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW MONO ALEZIO S 11 MR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 MR/H APPOINT HYDRAULIQUE  . - SCOP (35 °C/55 °C) :4,54/3,20  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56 - 4,63 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 124,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW ALEZIO S 8 MR/EM APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 8 MR/EM APPOINT ELECTRIQUE   . - SCOP (35 °C/55 °C) : 4,52/3,29  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  7,90/8,96 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/129% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,49 - 4,66 . - Equivalent CO? : 6,68t . - Puissance acoustique extérieure : 65 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  3,2 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/EM . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 .  . Unité extérieure . - Hauteur (mm) : 943 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 82,2",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 11KW TRI TR/ET APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 TR/ET APPOINT ELECTRIQUE   . - SCOP (35 °C/55 °C) : 4,54/3,20  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56 - 4,63 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Triphasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/ET . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 137,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 16 KW HPI-S/E 16 TR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 16 KW HPI-S/E 16 TR APPOINT ELECTRIQUE MOYENNE TEMPERATURE  . Puissance calorifique : 14,19 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 175%/121% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,43/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/136,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW HPI-S/E 8 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE :  DE DIETRICH 8 KW HPI-S/E 8 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 8,26 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/129% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,66 . Equivalent CO2 : 6,68  t . Puissance acoustique extérieure : 65 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 943 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 82,2 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 22 KW HPI-S/H 22 TR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 22 KW HPI-S/H 22 TR APPOINT  HYDRAULIQUE MOYENNE TEMPERATURE  . Puissance calorifique :21,70 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 153%/114% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 4,60/3,76 . Equivalent CO2 : 14,82 t . Puissance acoustique extérieure : 77 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 143 . Unité extérieure . Hauteur (mm) : 1338 . Largeur (mm) : 1050 . Profondeur (mm) : 417 . Poids à vide (kg) : 76,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW TRI ALEZIO S 11 TR/H APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 TR/H APPOINT HYDRAULIQUE  . - SCOP (35 °C/55 °C) :4,54/3,20  - Classe énergétique : A+ . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,56 - 4,63 . - Equivalent CO? : 9,6t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A :  4,6 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Triphasé . - Régulation : E-Pilot .  . Fonctions . - Appoint hydraulique par chaudière MIV-S/H . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 . - Largeur (mm) : 400 . - Profondeur (mm) : 410 . - Poids à vide (kg) : 37 .  . Unité extérieure . - Hauteur (mm) : 1350 . - Largeur (mm) : 950 . - Profondeur (mm) : 370 . - Poids à vide (kg) : 137,6 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 4,5 KW HPI-S/E 4,5 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH HPI-S/E 4,5 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 4,6 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 189%/134% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,22/4,96 . Equivalent CO2 : 2,71 t . Puissance acoustique extérieure : 58 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 880 . Largeur (mm) : 921 . Profondeur (mm) : 360 . Poids à vide (kg) : 63 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 4,5 KW ALEZIO S 4,5 MR/EM APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 4,5 MR/EM APPOINT ELECTRIQUE   . - Puissance calorifique à +7 °C/+35 °C : 4,60/7,00 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 189%/134% . - COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,22 - 4,96 . - SCOP (35 °C/55 °C) : 4,80/3,42  . - Equivalent CO? : 2,71 t . - Puissance acoustique extérieure : 61 dB . - Puissance acoustique intérieure : 53 dB . - Charge en fluide frigorigène R 410A  :  1,3 kg . - Plage de fonctionnement air extérieur : -15°C/+35°C . - Alimentation électrique : Monophasé . - Régulation : E-Pilot .  . Fonctions . - Appoint électrique MIV-S/EM . - Rafraîchissement (réversible) . - Production d'Eau Chaude Sanitaire par chauffe-eau électrique ou électro-solaire . - Production d'Eau Chaude Sanitaire par préparateur indépendant de type BLC de 150 à 300 L . - Régulation en fonction de la température extérieure .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 679 - Largeur (mm) : 400 - Profondeur (mm) : 410 . - Poids à vide (kg) : 35 . Unité extérieure . - Hauteur (mm) : 880 - Largeur (mm) : 921 - Profondeur (mm) : 360 . - Poids à vide (kg) : 63  . Classe énergétique : A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 8 KW HPI-M/H 8 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 8 KW HPI-M/H 8 MR APPOINT HYDRAULIQUE  MOYENNE TEMPERATURE . Puissance calorifique : 9 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 136% . Certifiée selon règlement n°813/2013  . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,28/4,90 . Equivalent CO2 : 5,01 t . Puissance acoustique extérieure : 58 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALEZIO S 11 KW MR/EM V200',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S 11 MR/EM V200 . - Puissance calorifique à +7 °C/+35 °C :  11,39/14,79 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 178%/125% . - COP à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . - SCOP (35 °C/55 °C) : 4,54/3,20 . - Equivalent CO? : 9,6 t . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 48 dB . - Charge en fluide frigorigène R 410A  :  4,6 kg . - Plage de fonctionnement air extérieur : - 20°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 180 litres . Efficacité énergétique saisonnière eau chaude sanitaire (cycle L) (L) : 114%  . -Température eau chaude sanitaire max. : 65°C . - Durée de mise en température : 1h33 .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 1250 - Largeur (mm) : 600 - Profondeur (mm) : 748 . - Poids (kg) : 131 . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 370 . - Poids à vide (kg) : 124 . Classe énergétique Erp chauffage (35 °C) / sanitaire : A++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 4.5 KW HPI-S/H 4.5 MR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH HPI-S/H 4.5 MR APPOINT HYDRAULIQUE  MOYENNE TEMPERATURE . Puissance calorifique : 4,6 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 189%/134% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 6,22/4,96 . Equivalent CO2 : 2,71 t . Puissance acoustique extérieure : 58 dB . Puissance acoustique intérieure : 43 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 69,8 . Unité extérieure . Hauteur (mm) : 880 . Largeur (mm) : 921 . Profondeur (mm) : 360 . Poids à vide (kg) : 63 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 8 KW STRATEO 8 MR/E 2C',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO 8 MR/E 2C . Puissance calorifique : 7,65 kW - SCOP (35 °C/55 °C) : 4,52/3,26 . Efficacité énergétique saisonnière chauffage  (35 °C/55 °C) :  178%/126% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 5,49/4,60 . Equivalent CO? : 6,68 t . Niveau sonore** extérieure : 44 dB[A] . Niveau sonore** intérieure : 31 dB[A] . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . Température ECS max. : 65°C . Durée de mise en température : 1h15 . COP ECS (M/L) : 2,5/2,9 . Cycle de soutirage (M/L) : 107%/123% .  . Dimensions et poids . Unité intérieure :  Circuit radiateurs / Circuit plancher chauffant . Hauteur (mm) : 1950 . Largeur (mm) : 560 . Profondeur (mm) : 586 . Poids unité intérieure/platine hydraulique (2 circuits) : 188/13,5 kg . Unité extérieure  . Unité extérieure . Hauteur (mm) : 943 . Largeur (mm) : 950 . Profondeur (mm) : 360 . Poids (kg) : 82,2",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-M/H 11 TR APPOINT HYDRAULIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-M/H 11 TR APPOINT HYDRAULIQUE MOYENNE TEMPERATURE . Caractéristiques techniques . Puissance calorifique : 11,20 kW . Efficacité énergétique saisonnière chauffage (35°C/55°C)* : 169% / 132% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,31/4,86 . Equivalent CO2 : 6,89 t . Puissance acoustique extérieure : 60 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur en mode chaud : -20°C/+35°C . Plage de fonctionnement air extérieur en mode froid : +7°C/+46°C . Alimentation électrique : triphasé . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 50 (version hydraulique) / 57 (version électrique) . Unité extérieure . Hauteur (mm) : 1020 . Largeur (mm) : 1050 . Profondeur (mm) : 480 . Poids à vide (kg) : 97 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPE A CHALEUR DE DIETRICH 11 KW HPI-S/E 11 MR APPOINT ELECTRIQUE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : DE DIETRICH 11 KW HPI-S/E 11 MR APPOINT ELECTRIQUE MOYENNE TEMPERATURE . Puissance calorifique : 10,56 kW . Efficacité énergétique saisonnière (35 °C/55 °C) : 178%/125% . Certifiée selon règlement n°813/2013 . COP saisonnier à 7°C ext. et sortie eau à 35°C/55°C : 5,56/4,63 . Equivalent CO2 : 9,6 t . Puissance acoustique extérieure : 69 dB . Puissance acoustique intérieure : 51 dB . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -20°C/+35°C . Alimentation électrique : monophasé  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1003 . Largeur (mm) : 600 . Profondeur (mm) : 510 . Poids à vide (kg) : 124,4/137,6 . Unité extérieure . Hauteur (mm) : 1350 . Largeur (mm) : 950 . Profondeur (mm) : 370 . Poids à vide (kg) : 72,4 . Classe énergétique : A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 16 KW ALEZIO S COMPACT 16 MR/EM',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : ALEZIO S COMPACT 16 MR/EM . - Puissance calorifique à +7 °C/+35 °C : 14,65/17,28 kW . - Efficacité énergétique saisonnière chauffage (35 °C/55 °C) : 175%/121% . - COP  à 7°C ext. et sortie eau à 35°C/55°C :  5,43/4,34 . -  SCOP (35 °C/55 °C) 4,45/3,10 . - Puissance acoustique extérieure : 69 dB . - Puissance acoustique intérieure : 40 dB . - Fluide frigorigène : R410 A   - Equivalent CO? : 9,60 t . - Plage de fonctionnement air extérieur  : - 20°C/+35°C . - Alimentation électrique : Monophasé .  . Capacité préparateur d'eau chaude sanitaire : 177 litres . - Température ECS max. : 65°C . - Durée de mise en température : 1h27 . - COP ECS (L) : 2,57 . - Cycle de soutirage (L) : 105% .  . Dimensions et poids . Unité intérieure . - Hauteur (mm) : 2208- Largeur (mm) : 551- Profondeur (mm) : 562 . - Poids MIV/Ballon/Kit hydraulique  : 35/101,5/7,3 kg . Unité extérieure . - Hauteur (mm) : 1350 - Largeur (mm) : 950 - Profondeur (mm) : 360 . - Poids (kg) : 124,6 . Classe énergétique Erp chauffage (35 °C) / sanitaire A+++/A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POMPES À CHALEUR DE DIETRICH AWHP 6 KW STRATEO 6 MR/E',
            //     'selling_price' => 9000,
            //     'description' => "Caractéristiques techniques : STRATEO 6 MR/E . Puissance calorifique : 5,82 kW - SCOP (35 °C/55 °C) : 4,15/3,30  . Efficacité énergétique saisonnière chauffage (35 °C/55 °C) :  166/%126% . COP  à 7°C ext. et sortie eau à 35°C/55°C : 6,16/4,63 . Equivalent CO? : 2,92 t . Niveau sonore** extérieure : 40 dB[A] . Niveau sonore** intérieure : 31 dB[A] . Fluide frigorigène : R410 A . Plage de fonctionnement air extérieur  : -15°C/+35°C . Alimentation électrique : monophasé .  . Capacité préparateur d'eau chaude sanitaire : 190 litres . Température ECS max. : 65°C . Durée de mise en température : 1h40 . COP ECS (M/L) : 2,7/3,2 . Cycle de soutirage (M/L) : 117%/130% .  . Dimensions et poids . Unité intérieure . Hauteur (mm) : 1950 . Largeur (mm) : 560 . Profondeur (mm) : 586 . Poids platine raccordement / module intérieur (kg) : 12.5 / 176.5 . Unité extérieure . Hauteur (mm) : 630 . Largeur (mm) : 871 . Profondeur (mm) : 360 . Poids (kg) : 47",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 14,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 06 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 06 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 5,02 . - Puissance absorbée  kW : 1,6 . - E.E.R.  W/W : 3,14  . - Puissance frigorigène  kW : 6,18 . - Puissance absorbée kW  : 1,28 . - E.E.R.  W/W : 4,82 . - SEER  W/W : 4,12 . CHAUFFAGE . - Puissance thermique  kW : 6,08 . - Puissance absorbée  kW :  1,35 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,51 . - Puissance thermique kW  : 5,88 . - Puissance absorbée  kW : 1,66 . - SCOP  W/W : 4,46 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 175% / 126%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 49,8 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 924x377x828 . - Poids en service : 72 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 16 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 16 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 13,8 . - Puissance absorbée  kW : 4,38 . - E.E.R.  W/W : 3,15 . - Puissance frigorigène  kW : 15,8 . - Puissance absorbée kW  : 3,15 . - E.E.R.  W/W : 5,02 . - SEER  W/W : 4,80 . CHAUFFAGE . - Puissance thermique  kW : 16,3 . - Puissance absorbée  kW :  3,49 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,67 . - Puissance thermique kW  : 15,8 . - Puissance absorbée  kW : 4,24 . - SCOP  W/W : 4,5 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 177% / 126%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 52,7 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 1.047x456x936 . - Poids en service : 126 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 08 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 08 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 6,08 . - Puissance absorbée  kW : 1,99 . - E.E.R.  W/W : 3,05  . - Puissance frigorigène  kW : 7,72 . - Puissance absorbée kW  : 1,76 . - E.E.R.  W/W : 4,38 . - SEER  W/W : 4,25  . CHAUFFAGE . - Puissance thermique  kW : 7,81  . - Puissance absorbée  kW :  1,78 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,38 . - Puissance thermique kW  : 7,58 . - Puissance absorbée  kW : 2,17 . - SCOP  W/W : 4,46 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 176% / 128% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 49,8 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 924x377x828 . - Poids en service : 72 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 12 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 12 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 8,51 . - Puissance absorbée  kW : 2,79 . - E.E.R.  W/W : 3,05  . - Puissance frigorigène  kW : 11,6 . - Puissance absorbée kW  : 2,79 . - E.E.R.  W/W : 4,16  . - SEER  W/W : 4,25  . CHAUFFAGE . - Puissance thermique  kW : 11,8 . - Puissance absorbée  kW :  2,73 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,32 . - Puissance thermique kW  : 11,5 . - Puissance absorbée  kW : 3,33 . - SCOP  W/W : 4,47 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 176% / 131%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 50,4 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 1.047x456x936  . - Poids en service : 96 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 04 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 04 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 4,33 . - Puissance absorbée  kW : 1,37 . - E.E.R.  W/W : 3,16 . - Puissance frigorigène  kW : 5,59 . - Puissance absorbée kW  : 1,12 . - E.E.R.  W/W : 4,99 . - SEER  W/W : 3,97 . CHAUFFAGE . - Puissance thermique  kW : 4,76 . - Puissance absorbée  kW :  1,00 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,76 . - Puissance thermique kW  : 4,75 . - Puissance absorbée  kW : 1,30 . - SCOP  W/W : 4,56 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 179% / 135%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 43,8 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 924x379x828 . - Poids en service : 72 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 10 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 10 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 7,53  . - Puissance absorbée  kW : 2,39  . - E.E.R.  W/W : 3,15  . - Puissance frigorigène  kW : 9,5  . - Puissance absorbée kW  : 2,15  . - E.E.R.  W/W : 4,41  . - SEER  W/W : 4,15  . CHAUFFAGE . - Puissance thermique  kW : 10,1  . - Puissance absorbée  kW :  2,28  . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,43  . - Puissance thermique kW  : 9,76  . - Puissance absorbée  kW : 2,80 . - SCOP  W/W : 4,53  . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 178% / 135%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 49.4 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 1.047x456x936  . - Poids en service : 96 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MOD 14 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => "Marque : ECL  NEXUS  . - Référence : MODELE 14 /  MOYENNE TEMPERATURE . - Puissance frigorigène  kW : 11,5 . - Puissance absorbée  kW : 3,53 . - E.E.R.  W/W : 3,25 . - Puissance frigorigène  kW : 14,0 . - Puissance absorbée kW  : 2,59 . - E.E.R.  W/W : 5,40 . - SEER  W/W : 4,62 . CHAUFFAGE . - Puissance thermique  kW : 14,1 . - Puissance absorbée  kW :  2,91 . - C.O.P  température d'entrée/sortie d'eau 30/35°C   W/W : 4,85 . - Puissance thermique kW  : 13,56 . - Puissance absorbée  kW : 3,55 . - SCOP  W/W : 4,48 . - Efficacité énergétique saisonnière (?s) - (35 °C / 55°C) : 176% / 130%  .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Pression sonore à 1 m de distance Lp1 (10) dB(A) : 52,7 . - Alimentation : 230/1/50Hz . - Rendement énergétique eau 35°C / 55°C : A+++/A++ . - Dimensions : LxPxH mm : 924x377x828 . - Poids en service : 121 kg",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 15,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'HYOKO MAX 16kW BI-BLOC MONOPHASE HHEP-160M-V2',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : HEIWA   . MODELE : HYOKO MAX 16kW BI-BLOC MONOPHASÉ HHEP-160M-V2  MOYENNE TEMP . - Puissance à +7°C extérieur  : 16KW  . - Puissance absorbée à +7°C extérieur : 3,56KW   . - COP à +7°C extérieur (35°C/55°C) : 4,5/2,9 . - SCOP : (35°C/55°C)  4,62/3,41 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 182% / 133% . - Classe Énergétique : A+++ . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . UNITE EXTERIEUR  . - Nombre de ventilateurs : 1 . - Débit d'air m3/h : 4650 . - Puissance acoustique dB(A) : 67 . - Dimensions nettes, Largeur x Profondeur x Hauteur mm 1120×864×523 . - Poids nets Kg : 126 . - Type de détendeur : Electronique . UNITE INTERIEUR : HHIP-160M-V1 . - Alimentation électrique et protection 1 Phase, Neutre, Terre- 220V-240V / 50Hz . - Dimensions nettes : L x P x H mm 420×790×270 420×790×270 . - Poids nets : 43Kg . - Puissance de la résistance d'appoint intégrée : 3kW . - Fluide 'Ecologique' R32",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 24,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'HYOKO MAX 16kW BI-BLOC TRIPHASE HHEP-160MTRI-V2',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : HEIWA   . MODELE : HYOKO MAX 16kW BI-BLOC TRIPHASÉ  HHEP-160MTRI-V2 MOYENNE TEMP . - Puissance à +7°C extérieur  : 16KW  . - Puissance absorbée à +7°C extérieur : 3,56KW   . - COP à +7°C extérieur (35°C/55°C) : 4,5/2,9 . - SCOP : (35°C/55°C)  4,62/3,41 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 182% / 133% . - Classe Énergétique : A+++ . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . UNITE EXTERIEUR  . - Nombre de ventilateurs : 1 . - Débit d'air m3/h : 4650 . - Puissance acoustique dB(A) : 67 . - Dimensions nettes, Largeur x Profondeur x Hauteur mm 1120×864×523 . - Poids nets Kg : 126 . - Type de détendeur : Electronique . UNITE INTERIEUR : HHIP-160M-V1 . - Alimentation électrique et protection 3 Phases, Neutre, Terre- 380V-415V / 50Hz . - Dimensions nettes : L x P x H mm 420×790×270 420×790×270 . - Poids nets : 43Kg . - Puissance de la résistance d'appoint intégrée : 3kW . - Fluide 'Ecologique' R32",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 24,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'HYOKO MAX 12kW BI-BLOC MONOPHASE HHEP-120M-V2',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : HEIWA   . MODELE : HYOKO MAX 12kW BI-BLOC MONOPHASÉ HHEP-120M-V2  MOYENNE TEMP . - Puissance à +7°C extérieur  : 12,1KW  . - Puissance absorbée à +7°C extérieur : 2,44KW   . - COP à +7°C extérieur (35°C/55°C) : 4,95/3,87 . - SCOP : (35°C/55°C)  4,81/3,45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 189% / 135% . - Classe Énergétique : A+++ . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013  . UNITE EXTERIEUR  . - Nombre de ventilateurs : 1 . - Débit d'air m3/h : 4060 . - Puissance acoustique dB(A) : 64 . - Dimensions nettes, Largeur x Profondeur x Hauteur mm 1120×864×523 . - Poids nets Kg : 110 . - Type de détendeur : Electronique . UNITE INTERIEUR : HHIP-160M-V1 . - Alimentation électrique et protection 1 Phase, Neutre, Terre- 220V-240V / 50Hz . - Dimensions nettes : L x P x H mm 420×790×270 420×790×270 . - Poids nets : 43Kg . - Puissance de la résistance d'appoint intégrée : 3kW . - Fluide 'Ecologique' R32",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 24,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW MONO COMBI 200L / UE : RAS-4WHVNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0VNFWE-C . GROUPE EXTÉRIEUR : RAS-4WHVNPE . BALLON 200L : DHWS200S-2.7H2E-C .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  142 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C . Dimensions (HxLxP) avec ballon ECS intégré 200L en Acier inoxydable / 1980 x 600 x 648 MM",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 24KW RWM-10.0NE',
            //     'selling_price' => 9000,
            //     'description' => 'YUTAKI S RWM-10.0NE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 11KW  RWM-4.0NE TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : HITACHI . MODÈLE : YUTAKI S 11KW MOYENNE TEMPERATURE . - Puissance min / nom / max chauffage (7°C ext / 35°C eau) kW  : 4,3 / 11 / 15,2 . - COP (7°C ext / 35°C eau)  : 5.00 selon EN14511 . - SCOP climat moyen 35°C / 55°C : 4,8 / 3,5 selon EN14825 . - Efficacité énergétique saisonnière chauffage ?s (55°C) : 136  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Etiquette énergetique 35°C / 55°C :  A+++ / A++ . - Niveau de puissance sonore dB(A) : 39 . - Fluide frigorigène : R410A . - Alimentation : TRIPHASE 400V . - Dimensions (HxLxP) mm :  890x520x360 . - Poids net  kg : 46 . GROUPES EXTERIEURS PREMIUM : RAS-4WH(V)NPE . - Niveau de Pression à 1m / Puissance acoustique mode chaud dB(A) : 49 / 64 . - Dimensions (H x L x P) MM : 1380x950x370 . - Poids net KG : 103',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW MONO / UE : RAS-4WHVNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0VNFE . GROUPE EXTÉRIEUR : RAS-4WHVNPE .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  142 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW TRI COMBI 200L / UE: RAS-4WHNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0NFWE-C . GROUPE EXTÉRIEUR : RAS-4WHNPE . BALLON 200L : DHWS200S-2.7H2E-C .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  140 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C . Dimensions (HxLxP) avec ballon ECS intégré 200L en Acier inoxydable / 1980 x 600 x 648 MM",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW MONO COMBI 260L / UE: RAS-4WHVNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0VNFWE-C . GROUPE EXTÉRIEUR : RAS-4WHVNPE . BALLON 200L : DHWS260S-2.7H2E-C .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  142 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C . Dimensions (HxLxP) avec ballon ECS intégré 260L en Acier inoxydable / 2289 x 600 x 648 MM",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 14KW TRI COMBI 260L / UE : RAS-5WHNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-5.0NFWE-C . GROUPE EXTÉRIEUR : RAS-5WHNPE . BALLON 200L : DHWS260S-2.7H2E-C .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 14KW . COP : 4.71 . ETAS :  129 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C . Dimensions (HxLxP) avec ballon ECS intégré 260L en Acier inoxydable / 2289 x 600 x 648 MM",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW TRI COMBI 260L / UE : RAS-4WHNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0NFWE-C . GROUPE EXTÉRIEUR : RAS-4WHNPE . BALLON 200L : DHWS260S-2.7H2E-C .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  140 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C . Dimensions (HxLxP) avec ballon ECS intégré 260L en Acier inoxydable / 2289 x 600 x 648 MM",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 11KW TRI / UE : RAS-4WHNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-4.0NFE . GROUPE EXTÉRIEUR : RAS-4WHNPE .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 11KW . COP : 5 . ETAS :  140 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 20KW RWM-8.0NE',
            //     'selling_price' => 9000,
            //     'description' => 'YUTAKI S RWM-8.0NE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 16KW RWM-6.0NE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : HITACHI . MODÈLE : YUTAKI S 16KW MOYENNE TEMPERATURE . - Puissance min / nom / max chauffage (7°C ext / 35°C eau) kW  : 5,5 / 16 / 17,8 . - COP (7°C ext / 35°C eau)  : 4,57 selon EN14511 . - SCOP climat moyen 35°C / 55°C :3,9 / 3,23 selon EN14825 . - Efficacité énergétique saisonnière chauffage ?s (55°C) : 125 . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Etiquette énergetique 35°C / 55°C :  A++ / A++ . - Niveau de puissance sonore dB(A) : 39 . - Fluide frigorigène : R410A . - Alimentation : MONOPHASE 230V . - Dimensions (HxLxP) mm :  890x520x360 . - Poids net  kg : 48 . GROUPES EXTERIEURS PREMIUM : RAS-6WH(V)NPE . - Niveau de Pression à 1m / Puissance acoustique mode chaud dB(A) : 50 / 65 . - Dimensions (H x L x P) MM : 1380x950x370 . - Poids net KG : 103',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 14KW TRI / UE: RAS-5WHNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-5.0NFE . GROUPE EXTÉRIEUR : RAS-5WHNPE .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 14KW . COP : 4.71 . ETAS :  129 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 14KW RWM-5.0NE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : HITACHI . MODÈLE : YUTAKI S 14KW MOYENNE TEMPERATURE . - Puissance min / nom / max chauffage (7°C ext / 35°C eau) kW  : 4,8 / 14 / 16,7 . - COP (7°C ext / 35°C eau)  : 4,71 selon EN14511 . - SCOP climat moyen 35°C / 55°C : 4,48 / 3,43 selon EN14825 . - Efficacité énergétique saisonnière chauffage ?s (55°C) : 133 . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Etiquette énergetique 35°C / 55°C :  A+++ / A++ . - Niveau de puissance sonore dB(A) : 39 . - Fluide frigorigène : R410A . - Alimentation : MONOPHASE 230V . - Dimensions (HxLxP) mm :  890x520x360 . - Poids net  kg : 48 . GROUPES EXTERIEURS PREMIUM : RAS-5WH(V)NPE . - Niveau de Pression à 1m / Puissance acoustique mode chaud dB(A) : 50 / 65 . - Dimensions (H x L x P) MM : 1380x950x370 . - Poids net KG : 103',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S80 14KW MONO / UE: RAS-5WHVNPE',
            //     'selling_price' => 9000,
            //     'description' => "POMPE À CHALEUR AIR / EAU  . HAUTE TEMPERATURE .  . MODULE HYDRAULIQUE : RWH-5.0VNFE . GROUPE EXTÉRIEUR : RAS-5WHVNPE .  . MARQUE : HITACHI . MODÈLE : YUTAKI S80 . PUISSANCE : 14KW . COP : 4.71 . ETAS :  131 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . MAINTIEN DE TEMPÉRATURE : -15°C . SORTIE D'EAU : 80 °C",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'YUTAKI S 11KW  RWM-4.0NE MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : HITACHI . MODÈLE : YUTAKI S 11KW MOYENNE TEMPERATURE . - Puissance min / nom / max chauffage (7°C ext / 35°C eau) kW  : 4,3 / 11 / 15,2 . - COP (7°C ext / 35°C eau)  : 5.00 selon EN14511 . - SCOP climat moyen 35°C / 55°C : 4,8 / 3,5 selon EN14825 . - Efficacité énergétique saisonnière chauffage ?s (55°C) : 136  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Etiquette énergetique 35°C / 55°C :  A+++ / A++ . - Niveau de puissance sonore dB(A) : 39 . - Fluide frigorigène : R410A . - Alimentation : MONOPHASE 230V . - Dimensions (HxLxP) mm :  890x520x360 . - Poids net  kg : 46 . GROUPES EXTERIEURS PREMIUM : RAS-4WH(V)NPE . - Niveau de Pression à 1m / Puissance acoustique mode chaud dB(A) : 49 / 64 . - Dimensions (H x L x P) MM : 1380x950x370 . - Poids net KG : 103',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 27,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 14 KW - TRIPHASE - HU143.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 14 KW - TRIPHASE  . - GROUPE EXTÉRIEUR :  HU143.U33 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,41 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 14 KW - MONOPHASE - HU141MRB.U30',
            //     'selling_price' => 12000,
            //     'description' => "Marque : LG  . THERMA V 14 KW - MONOPHASE . - GROUPE EXTÉRIEUR :  HU141MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,89 . - SCOP (35°C / 55°C) : 4.57 / 3.47 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 180% / 136% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 62 dB .  . - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . Garantie compresseur 5 ans, garantie pièces et main- d'oeuvre 3 ans",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - MONOPHASE - HU161MRB .U30 HAUTE TEMPERATURE',
            //     'selling_price' => 10000,
            //     'description' => "Marque : LG  . THERMA V 16 KW - MONOPHASE . - GROUPE EXTÉRIEUR : HU161MRB.U30 . - Puissance calorifique maxi -7°C / 60°C : 16 KW . - COP (-7°C / 60°C) : 1.99 . - SCOP (35°C / 55°C) : 4.55 / 3.45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 179% / 135% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . -Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91.7 kg . - Niveau de puissance sonore UE : 63 dB .  . - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . Garantie compresseur 5 ans, garantie pièces et main- d'ouvre 3 ans",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 12 KW - MONOPHASE - HU121MRB.U30',
            //     'selling_price' => 10000,
            //     'description' => "Marque : LG   . THERMA V 12 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU121MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 5.04 . - SCOP (35°C / 55°C) : 4.60 / 3.50 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 181% / 137% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91.7 kg . - Niveau de puissance sonore UE : 61 dB . - - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A+++ .  . Garantie compresseur 5 ans, garantie pièces et main- d'ouvre 3 ans",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - MONOPHASE - HU161MRB.U30',
            //     'selling_price' => 0,
            //     'description' => "Marque : LG  . THERMA V 16 KW - MONOPHASE . - GROUPE EXTÉRIEUR : HU161MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,80 . - SCOP (35°C / 55°C) : 4.55 / 3.45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 179% / 135% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . -Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91.7 kg . - Niveau de puissance sonore UE : 63 dB .  . - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . Garantie compresseur 5 ans, garantie pièces et main- d'ouvre 3 ans",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 12 KW - MONOPHASE - HM121MR.U34',
            //     'selling_price' => 10000,
            //     'description' => "Marque : LG  . THERMA V 12 KW - MONOPHASE . - GROUPE EXTÉRIEUR :  HM121MR.U34 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,90 . - SCOP (35°C / 55°C) : 4.67 / 3.47 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 184% / 136% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 1239 x 1380 x 330 / Poids : 118.6 kg . - Niveau de puissance sonore UE : 60 dB .  . - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . Garantie compresseur 5 ans, garantie pièces et main- d'oeuvre 3 ans",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - MONOPHASE - HU161MA.U30',
            //     'selling_price' => 10000,
            //     'description' => 'Marque : LG  . THERMA V 16 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU161MA.U30 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,80 / SCOP (35°C / 55°C) : 4,55 / 3,45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 179% / 135% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Réfrigérant : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91.7 kg . - Niveau de puissance sonore UE : 63 dB . - UNITÉ INTÉRIEUR : HN1600MB.NK0 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315/ Poids : 30.3 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 9KW SPLIT MONOPHASÉ HN0916M.NK4',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE :  MONOBLOC 9KW HU091MR.U44 - MONOPHASE - MOYENNE TEMPERATURE . - MODULE HYDRAULIQUE PAC AIR-EAU SPLIT MONOPHASÉ HN0916M.NK4 . - Puissance calorifique maxi 7°C / 35°C : 9 KW . - COP (+7°C / 35°C) : 4,65 / SCOP (35°C / 55',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - MONOPHASE - HU161.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 16 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU161.U33 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,26 / SCOP (35°C / 55°C) : 4,30 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 169% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1616.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 43 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - TRIPHASE - HU163MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 16 KW - TRIPHASE  . - GROUPE EXTÉRIEUR :  HU163MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,26 / SCOP (35°C / 55°C) : 4,30 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639M.NK5 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 12 KW - TRIPHASE - HU123MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG   . THERMA V 12 KW - TRIPHASE  . - GROUPE EXTÉRIEUR : HU123MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,55 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639M.NK5 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 14 KW - MONOPHASE - HU141.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 14 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU141.U33 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,41 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - - UNITÉ INTÉRIEUR : HN1616.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 43 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 12 KW - TRIPHASE - HU123.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG   . THERMA V 12 KW - TRIPHASE  . - GROUPE EXTÉRIEUR : HU123.U33 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,55 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 12 KW - MONOPHASE - HU121MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG   . THERMA V 12 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU121MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,55 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - - UNITÉ INTÉRIEUR : HN1616M.NK5  . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 42.2 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 14 KW - MONOPHASE - HU141MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 14 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU141MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,41 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - - UNITÉ INTÉRIEUR : HN1616M.NK5 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 42.2 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - TRIPHASE - HU163.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 16 KW - TRIPHASE  . - GROUPE EXTÉRIEUR :  HU163.U33 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,26 / SCOP (35°C / 55°C) : 4,30 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  9KW HM091M.U43 - MONOPHASE -',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE :  MONOBLOC  9KW HM091M.U43 - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 9 KW . - COP (+7°C / 35°C) : 4,18 / SCOP (35°C / 55°C) : 4,45  / 3,12 . - Efficacité saisonnière ETAs h (?s) (35°C',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V HYDROSPLIT 16KW MONO 65°C R32 HU161MRB .U30',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE ET REFERENCE : LG / THERMA V HYDROSPLIT 16KW 65°C R32 MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : HN1600MB.NK0 . - Charge thermique nominale  : 12,3 . - SCOP (35°C / 55°C) : 4,55 / 3,45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 135% / 179% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Dimensions (L x H x P) mm : 490 x 850 x 315 / Poids : kg 30,3 . - Puissance sonore Chaud Nom. dBA : 44 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz 1 / 220-240 / 50 (UE Monophasés) . GROUPE EXTÉRIEUR : HU161MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,80 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91,7 kg . - Niveau de puissance sonore UE : 63 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 12 KW - MONOPHASE - HU121.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG   . THERMA V 12 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU121.U33 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,55 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - - UNITÉ INTÉRIEUR : HN1616.NK3 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 43 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  14KW HM141M U33 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE : MONOBLOC  14KW HM141M U33 - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,50 / SCOP (35°C / 55°C) : 4,45  / 3,18 . - Efficacité saisonnière ETAs h (?s) (35°',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 5 KW - MONOPHASE - HU051MR.U44',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG  THERMA V 5 KW - MONOPHASE - HU051MR.U44 MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 5 KW . - COP (+7°C / 35°C) : 4,90 / SCOP (35°C / 55°C) : 4,65 / 3,23 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 183% / 126% ',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  14KW HM143M U33 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE : MONOBLOC  14KW HM143M U33 - TRIPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,50 / SCOP (35°C / 55°C) : 4,45  / 3,18 . - Efficacité saisonnière ETAs h (?s) (35°C',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 16 KW - MONOPHASE - HU161MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 16 KW - MONOPHASE  . - GROUPE EXTÉRIEUR : HU161MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,26 / SCOP (35°C / 55°C) : 4,30 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 169% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1616M.NK5 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 42.2 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  12KW HM123M U33 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE : MONOBLOC  12KW HM123M U33 - TRIPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 4,40 / SCOP (35°C / 55°C) : 4,45  / 3,18 . - Efficacité saisonnière ETAs h (?s) (35°C',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V SPLIT 16KW HAUTE TEMPÉRATURE 80°C / HU161HA.U33 - HN1610H.NK3',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE : LG  . - Modèle : THERMA V SPLIT HAUTE TEMPÉRATURE 80°C R410A MONOPHASE . UNITE INTERIEURE : HN1610H.NK3 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 126% / 117%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - COP (+7°C / 55°C) :  : 2,78 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz : 1 / 220-240 / 50 . - Dimensions UI (H x L x P) mm : 520mm * 1080mm * 330mm . - Poids : 84 Kg . -  Classe efficacité énergétique 35°C/55°C : A+ . - Puissance Calorifique  / Cap A +7°,W55°C : 14 . UNITE EXTERIEURE : HU161HA.U33 . - Niveau de puissance sonore UE : 66 dB . - Dimensions UE (H x L x P) mm : 950mm * 1380mm * 330mm . - Poids : 89 Kg',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V HYDROSPLIT 16KW TRI 65°C R32 HU163MRB .U30',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE ET REFERENCE : LG / THERMA V HYDROSPLIT 16KW TRI 65°C R32 MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : HN1600MB.NK0 . - Charge thermique nominale  : 12,3 . - SCOP (35°C / 55°C) : 4,55 / 3,45 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 135% / 179% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Dimensions (L x H x P) mm : 490 x 850 x 315 / Poids : kg 30,3 . - Puissance sonore Chaud Nom. dBA : 44 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz : 3 / 380-415 / 50 (UE Triphasés) . GROUPE EXTÉRIEUR : HU163MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,80 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91,7 kg . - Niveau de puissance sonore UE : 63 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 7 KW - MONOPHASE - HU071MR.U44',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG  THERMA V 7 KW - MONOPHASE - HU071MR.U44 MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 7 KW . - COP (+7°C / 35°C) : 4,90 / SCOP (35°C / 55°C) : 4,65 / 3,23 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 183% / 126% ',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  16KW HM163M U33 TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE : MONOBLOC  16KW HM163M U33 - TRIPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,40 / SCOP (35°C / 55°C) : 4,45  / 3,18 . - Efficacité saisonnière ETAs h (?s) (35°C',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V HYDROSPLIT 14KW TRI 65°C R32 HU143MRB .U30',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE ET REFERENCE : LG / THERMA V HYDROSPLIT 14KW TRI 65°C R32 MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : HN1600MB.NK0 . - Charge thermique nominale  : 12 . - SCOP (35°C / 55°C) : 4,57 / 3,47 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 136% / 180% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Dimensions (L x H x P) mm : 490 x 850 x 315 / Poids : kg 30,3 . - Puissance sonore Chaud Nom. dBA : 44 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz : 3 / 380-415 / 50 (UE Triphasés) . GROUPE EXTÉRIEUR : HU143MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,89 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91,7 kg . - Niveau de puissance sonore UE : 62 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V HYDROSPLIT 12KW MONO 65°C R32 HU121MRB .U30',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE ET REFERENCE : LG / THERMA V HYDROSPLIT 12KW 65°C R32 MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : HN1600MB.NK0 . - Charge thermique nominale  : 11,5 . - SCOP (35°C / 55°C) : 4,60 / 3,50 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 137% / 181% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Dimensions (L x H x P) mm : 490 x 850 x 315 / Poids : kg 30,3 . - Puissance sonore Chaud Nom. dBA : 44 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz 1 / 220-240 / 50 (UE Monophasés) . GROUPE EXTÉRIEUR : HU121MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 12 KW . - COP (+7°C / 35°C) : 5,04 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91,7 kg . - Niveau de puissance sonore UE : 61 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V 9 KW - MONOPHASE - HU091MR.U44',
            //     'selling_price' => 5000,
            //     'description' => '- Marque : LG THERMA V 9 KW - MONOPHASE - HU091MR.U44 MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 9 KW . - COP (+7°C / 35°C) : 4,65 / SCOP (35°C / 55°C) : 4,65 / 3,23 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 183% / 126% .',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V HYDROSPLIT 14KW MONO 65°C R32 HU141MRB .U30',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE ET REFERENCE : LG / THERMA V HYDROSPLIT 14KW 65°C R32 MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : HN1600MB.NK0 . - Charge thermique nominale  : 12 . - SCOP (35°C / 55°C) : 4,57 / 3,47 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 136% / 180% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Dimensions (L x H x P) mm : 490 x 850 x 315 / Poids : kg 30,3 . - Puissance sonore Chaud Nom. dBA : 44 . - Alimentation Phase / Voltage / Fréquence ø/V/Hz 1 / 220-240 / 50 (UE Monophasés) . GROUPE EXTÉRIEUR : HU141MRB.U30 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,89 . - Fluide frigorigène : R32 . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 91,7 kg . - Niveau de puissance sonore UE : 62 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'LG THERMA V 14 KW - TRIPHASE - HU143MA.U33',
            //     'selling_price' => 9000,
            //     'description' => 'Marque : LG  . THERMA V 14 KW - TRIPHASE  . - GROUPE EXTÉRIEUR :  HU143MA.U33 . - Puissance calorifique maxi 7°C / 35°C : 14 KW . - COP (+7°C / 35°C) : 4,41 / SCOP (35°C / 55°C) : 4,45 / 3,32 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 175% / 130% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R410A . - Dimensions UE (H x L x P) mm : 950x1380x330 / Poids : 94 kg . - Niveau de puissance sonore UE : 66 dB . - UNITÉ INTÉRIEUR : HN1639M.NK5 . - Dimensions UI : (H x L x P) mm : 490 x 850 x 315 / Poids : 45 kg . - Niveau de puissance sonore UI : 44 dB . - Classe efficacité énergétique 35°C :  A++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THERMA V MONOBLOC  16KW HM161M U33 MONOPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- Marque : LG THERMA V  . - MODELE : MONOBLOC  16KW HM161M U33 - MONOPHASE - MOYENNE TEMPERATURE . - Puissance calorifique maxi 7°C / 35°C : 16 KW . - COP (+7°C / 35°C) : 4,40 / SCOP (35°C / 55°C) : 4,45  / 3,18 . - Efficacité saisonnière ETAs h (?s) (35°',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 37,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 8 DUO 200L R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 8.00 - 9.30 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.65 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 172 / 4.38 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 135 / 3.45 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 8.00 / 8.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 8.00 / 8.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.41 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 145 / L .  .  Groupe Extérieur : PUHZ-SHW80VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 59 / 45 dB(A) . Poids net : 116 kgs .  . Module Hydraulique  ERST20C-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 114kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE DUO 10 200L BI-BLOC 10 KW MONOPHASE R32',
            //     'selling_price' => 9000,
            //     'description' => "ZUBADAN SILENCE DUO 10 200L BI-BLOC 10 KW MONOPHASE R32 . Référence Gr. EXTERIEUR : PUD-SHWM100VAA / Gr. INTERIEUR : ERST20D-VM6D . Fluide Frigorigène : R32 . Fonctionnement : haute température . Eau 55°c / SCOP : 3.48 . Coefficient efficacité énergétique saisonnière ETAS (?s en %) : 136 (selon le règlement EU n°813/2013 de la commission du 2 août 2013) .  . Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 2.50 - 8.00 - 10.90 . - COP (+7°C ext, 35°C eau, selon EN14511) : 5.00 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 180 / 4.56 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 136 / 3.48 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 10.00 / 10.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 10.00 / 10.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.49 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 148 / L .  .  Groupe Extérieur : PUD-SHWM100VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 59 / 44 dB(A) . Poids net : 108 kgs .  . Module Hydraulique  ERST20D-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 104kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE DUO 8 200L BI-BLOC 8 KW MONOPHASE R32',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 2.40 - 6.00 - 8.90 . - COP (+7°C ext, 35°C eau, selon EN14511) : 5.03 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 181 / 4.60 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 135 / 3.45 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 8.00 / 8.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 8.00 / 8.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.49 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 148 / L .  .  Groupe Extérieur : PUD-SHWM80VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 56 / 42 dB(A) . Poids net : 102 kgs .  . Module Hydraulique  ERST20D-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 104kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE DUO 12 200L BI-BLOC 12 KW MONOPHASE R32',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 2.50 - 10.00 - 12.90 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.80 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 179 / 4.55 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 135 / 3.46 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 12.00 / 12.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 12.00 / 12.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.49 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 148 / L .  .  Groupe Extérieur : PUD-SHWM120VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 46 dB(A) . Poids net : 108 kgs .  . Module Hydraulique  ERST20D-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 104kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 11 CHAUFFAGE SEUL 11 KW MONOPHASE R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 11.20 - 13.10 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.46 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 173 / 4.39 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 137 / 3.50 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 11.20 / 11.20 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 11.20 / 11.20 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  .  Groupe Extérieur : PUHZ-SHW112VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 47 dB(A) . Poids net : 116 kgs .  . Module Hydraulique  ERSC-VM6D . Dimensions Hauteur x Largeur x Profondeur : 800 x 530 x 360 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 48kgs . Volume vase d'expansion : 10L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 11KW TRIPHASE R410A PUHZ-SHW112YAA',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : MITSUBISHI  . MODELE :  ZUBADAN SILENCE 11KW TRIPHASE PUHZ-SHW112YAA . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 11.20 - 13.10 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.46 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 173 / 4.39 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 137 / 3.49 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 11.20 / 11.20 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 11.20 / 11.20 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 . - Type alimentation électrique : 400V - 3P+N+T .  .  Groupe Extérieur : PUHZ-SHW112YAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 47 dB(A) . Poids net : 116 kgs .  . Module Hydraulique  ERSC-YM9D . Dimensions Hauteur x Largeur x Profondeur : 800 x 530 x 360 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 48kgs . Volume vase d'expansion : 10L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'MITSUBISHI POWER INVERTER 25KW TRIPHASE',
            //     'selling_price' => 9000,
            //     'description' => '- MARQUE : MITSUBISHI POWER INVERTER 25KW TRIPHASE. . - Puissance nominale (+7°C ext, 35°C eau) 15,32 kw . - Rendement saisonnier (ETAS) (35°C) + SCOP (35°C) 162 / 4,18 . Efficacité énergétique saisonnière de la pompe à chaleur pour les besoins de chauffa',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 10 R32 CHAUFFAGE SEUL  PUD-SHWM100VAA',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW 2.50 - 8.00 - 10.90 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW 1.60  . - COP (1) (+7°C ext, 35°C eau, selon EN14511) - 5.00 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % / 136 / 3.48 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW 10.00 / 10.00 . MODULES HYDRAULIQUES ERSD-VM6D . - Dimensions H x L x P (mm) 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m (4) dB(A) 41 / 29 . - Poids net à vide (kg) 44 . - Appoint électrique (kW) 6 . UNITÉS EXTÉRIEURES PUD-SHWM100VAA . - Dimensions H x L x P (mm) 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m (4) dB(A) 59 / 44 . - Poids net (kg) 108 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) (- / -) R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE DUO 14 200L BI-BLOC 14 KW MONOPHASE R32',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.50 - 12.00 - 14.40 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.70 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 179 / 4.54 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 134 / 3.43 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 14.00 / 14.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 14.00 / 14.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.49 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 148 / L .  .  Groupe Extérieur : PUD-SHWM140VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 62 / 48 dB(A) . Poids net : 110 kgs .  . Module Hydraulique  ERST20D-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 104kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 8 R32 CHAUFFAGE SEUL',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW : 2.40 - 6.00 - 8.90 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW : 1.19 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) : 5.03 . - Rendement saisonnier (?s )  / SCOP (55°C eau) % : / 135 / 3.45 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW : 8.00 / 8.00 . MODULES HYDRAULIQUES ERSD-VM6D . - Dimensions H x L x P (mm) : 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m : dB(A) 41 / 29 . - Poids net à vide (kg) : 44 . - Appoint électrique (kW) : 6 . UNITÉS EXTÉRIEURES PUD-SHWM80VAA . - Dimensions H x L x P (mm) 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m (4) dB(A) 56 / 42 . - Poids net (kg) 102 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) (- / -) R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 11 DUO 200L R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 11.20 - 13.10 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.46 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 173 / 4.39 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 137 / 3.50 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 11.20 / 11.20 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 11.20 / 11.20 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.41 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 145 / L .  .  Groupe Extérieur : PUHZ-SHW112VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 47 dB(A) . Poids net : 116 kgs .  . Module Hydraulique  ERST20C-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 114kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 8 CHAUFFAGE SEUL 8 KW MONOPHASE R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 8.00 - 9.30 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.65 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 172 / 4.38 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 135 / 3.45 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 8.00 / 8.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 8.00 / 8.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  .  Groupe Extérieur : PUHZ-SHW80VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 59 / 45 dB(A) . Poids net : 116 kgs .  . Module Hydraulique  ERSC-VM6D . Dimensions Hauteur x Largeur x Profondeur : 800 x 530 x 360 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 48kgs . Volume vase d'expansion : 10L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE DUO 12 170L BI-BLOC 12 KW MONOPHASE R32',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 2.50 - 10.00 - 12.90 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.80 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 179 / 4.55 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 135 / 3.46 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 12.00 / 12.00 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 12.00 / 12.00 . - Plage fonctionnement (T° ext) : -28 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.49 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 148 / L .  .  Groupe Extérieur : PUD-SHWM120VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 46 dB(A) . Poids net : 108 kgs .  . Module Hydraulique  ERST17D-VM6DR1 . Dimensions Hauteur x Largeur x Profondeur : 1400 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 93kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 170L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 12 MONO R32 CHAUFFAGE SEUL  PUD-SHWM120VAA',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL MONO . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW 2.50 - 10.00 - 12.90 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW 2.08 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) 4.80 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % / 135 / 3.46 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW 12.00 / 12.00 . MODULES HYDRAULIQUES ERSD-VM6D . - Dimensions H x L x P (mm) 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m (4) dB(A) 41 / 29 . - Poids net à vide (kg) 44 . - Appoint électrique (kW) 6 . UNITÉS EXTÉRIEURES PUD-SHWM120VAA . - Dimensions H x L x P (mm) 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m (4) dB(A) 60 / 46 . - Poids net (kg) 108 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) (- / -) R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 14 MONO R32 CHAUFFAGE SEUL PUD-SHWM140VAA',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL MONO . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW : 3.50 - 12.00 - 14.40 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW:  2.55 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) :  4.70 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % : / 134 / 3.43 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW  : 14.00 / 14.00 . MODULES HYDRAULIQUES ERSD-VM6D . - Dimensions H x L x P (mm) : 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) : 41 / 29 . - Poids net à vide (kg) 44 . - Appoint électrique (kW) 6 . UNITÉS EXTÉRIEURES PUD-SHWM140VAA . - Dimensions H x L x P (mm) : 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) : 62 / 48 . - Poids net (kg) 110 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) : R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 12 TRI R32 CHAUFFAGE SEUL PUD-SHWM120YAA',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW : 2.50 - 10.00 - 12.90 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW : 2.08 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) - 4.80 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % / 134 / 3.44 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW 12.00 / 12.00 . MODULES HYDRAULIQUES ERSD-YM9D . - Dimensions H x L x P (mm) 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) : 41 / 29 . - Poids net à vide (kg) 44 . - Appoint électrique (kW) 9  . UNITÉS EXTÉRIEURES PUD-SHWM120YAA . - Dimensions H x L x P (mm) :  1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) : 60 / 46 . - Poids net (kg) 121 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) :  R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 14 TRI R32 CHAUFFAGE SEUL PUD-SHWM140YAA',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW 3.50 - 12.00 - 14.40 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW 2.55 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) - 4.70 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % / 134 / 3.42 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW 14.00 / 14.00 . MODULES HYDRAULIQUES ERSD-YM9D . - Dimensions H x L x P (mm) : 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m : dB(A) 41 / 29 . - Poids net à vide (kg) : 44 . - Appoint électrique (kW) : 9  . UNITÉS EXTÉRIEURES PUD-SHWM140YAA . - Dimensions H x L x P (mm) : 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m :  dB(A) 62 / 48 . - Poids net (kg) 122 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) : R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ZUBADAN SILENCE 10 TRI R32 CHAUFFAGE SEUL',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : MITUSBITSHI ZUBADAN SILENCE CHAUFFAGE SEUL . - Puissance (1) (+7°C ext, 35°C eau)   min - nom - max kW : 2.50 - 8.00 - 10.90 . - Puissance absorbée (1) (+7°C ext, 35°C eau) kW 1.60 . - COP (1) (+7°C ext, 35°C eau, selon EN14511) : 5.00 . - Rendement saisonnier (?s ) (2) / SCOP (55°C eau) % / : 135 / 3.46 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) kW : 10.00 / 10.00 . MODULES HYDRAULIQUES ERSD-YM9D . - Dimensions H x L x P (mm) : 800 x 530 x 360 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) : 41 / 29 . - Poids net à vide (kg) : 44 . - Appoint électrique (kW) : 9  . UNITÉS EXTÉRIEURES PUD-SHWM100YAA . - Dimensions H x L x P (mm) : 1020 x 1050 x 480 . - Puissance acoustique (3) / Pression acoustique à 1m  dB(A) :  59 / 44 . - Poids net (kg) 121 . - Fluide / PRP (Pouvoir de Réchauffement Planétaire) :  R32 / 675',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 39,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AQUAREA T-CAP 12KW - TRIPHASÉ WH-UX12HE8 WH-SXC12H6E8',
            //     'selling_price' => 9000,
            //     'description' => '- MARQUE : PANASONIC  . - MODELE : AQUAREA T-CAP WH-UX12HE8 WH-SXC12H6E8 TRIPHASÉ . -Groupe Extérieur AIR EAU avec Kit Hydraulique . -Moyenne Température 60°c - R410 . -Puissance Nominale : 12kw . -Efficacité Saisonnière à 55°c (ETAS) : 130% .  Calculée s',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PANASONIC AQUAREA T-CAP 12 KW',
            //     'selling_price' => 10000,
            //     'description' => "MARQUE / REFERENCE : PANASONIC AQUAREA T-CAP 12 KW . La technologie Total CAPacity est une exclusivité Panasonic. La réinjection de fluide avant l'aspiration du compresseur permet de conserver une puissance constante. . Plus besoin de surdimensionner ! .  . - Puissance nominale :   +7/35°C  kW :  12 . - Puissance  maximale : - 7/35 kW :  11.6 . - Puissance nominale :   - 7/35°C  kW :  12,6 . - COP :  +7/35°C :  4.74 . - COP  -7/35°C :  2.72 . - Efficacité énergétique saisonnière Etas  35°C / 55°C :  170/130% . - Classe énergétique - Température moyenne de chauffage (W35°C/W55°C) : A+++ / A++ .  . Unité extérieure : .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Puissance sonore à charge totale Chaud / froid: dB(A) : 69/68 . - Réfrigérant (R410A)/CO2 éq : 2,85 / 5,951 . - Dimensions / Poids net H x L x P  : 1 340 x 900 x 320 / 101 . Garantie 5 ans compresseur",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AQUAREA T-CAP 16KW WH-UX16HE8 + WH-SXC16H9E8',
            //     'selling_price' => 9000,
            //     'description' => '- MARQUE : PANASONIC - AQUAREA T-CAP WH-UX16HE8 + WH-SXC16H9E8 . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Moyenne Température 60°c - R410 . - Puissance Nominale : 16kw . - Efficacité Saisonnière à 55°c (ETAS) : 125% . Calculée selon le règlemen',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AQUAREA T-CAP  9KW - TRIPHASÉ WH-UX09HE8 WH-SXC09H3E8',
            //     'selling_price' => 9000,
            //     'description' => '- MARQUE : PANASONIC  . - MODELE : AQUAREA T-CAP WH-UX09HE8 WH-SXC09H3E8 TRIPHASÉ . -Groupe Extérieur AIR EAU avec Kit Hydraulique . -Moyenne Température 60°c - R410 . -Puissance Nominale : 9kw . -Efficacité Saisonnière à 55°c (ETAS) : 130% . -SCOP  / Cla',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AQUAREA T-CAP H  12KW - MONOPHASÉ /  WH-UX12HE5',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : PANASONIC . MODÈLE : AQUAREA T-CAP GENERATION H . MOYENNE TEMPERATURE . MODULE HYDRAULIQUE : WH-SXC12H6E5 . GROUPE EXTÉRIEUR : WH-UX12HE5 . PUISSANCE : 12KW . COP (7°c ext / 35°c eau) selon EN14511  : 4,74 . ETAS : 130 % selon règlement EU 813/2013 de la commission du 2 août 2013. . FLUIDE : R410A . PLAGE DE FONCTIONNEMENT : -20°C à +46°C . SORTIE D'EAU : 60 °C",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'AQUAREA T-CAP 9KW MONOPHSE WH-UX09HE5 WH-SXC09H3E5',
            //     'selling_price' => 9000,
            //     'description' => 'POMPE A CHALEUR PANASONIC 9KW AQUAREA T-CAP WH-UX09HE5 WH-SXC09H3E5 . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Moyenne Température 60°c - R410 . - Puissance Nominale : 9kw . - Efficacité Saisonnière à 55°c (ETAS) : 130% .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - SCOP  / Classe Energétique (à 55°c) : 3,33/A++ . - Dimensions Groupe Extérieur : 1340x900x320mm . - Dimensions Kit Hydraulique : 892x500x340mm . - Puissance Acoustique du Groupe Extérieur à 1m : 68db . - Poids net du Groupe Extérieur  : 101kG . - Thermostat Radio Sans Fil avec Programmateur',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 40,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 16M 16KW MONO AE160AXEDEH/EU+AE160ANYDEH',
            //     'selling_price' => 5900,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 16M 16KW MONOPHASE AE160AXEDEH/EU+AE160ANYDEH MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 16kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 175/121  .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W 4,26/ 2,74 . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,46/3,09 . - Puissance acoustique Chauffage standard : dB(A) 66 . - Alimentation électrique ?, V, Hz : 1 ?, 2,   220~240 V, 50 Hz monophasé . - Réfrigérant : Type - R410A . - Dimensions Groupe Extérieur : 940 x 1,420 x 330 mm . - Poids net du Groupe Extérieur  :  100.5 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315  mm . - Poids net Kit hydraulique mural : 45 kg . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'SAMSUNG EHS CLIMATEHUB',
            //     'selling_price' => 10000,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 16KW TRIPHASE AE160AXEDGH/EU  MOYENNE TEMPERATURE .  . - Unité Extérieure : AE160AXEDGH/EU . - Kit Hydraulique : AE160ANYDGH/EU . - Puissance nominale Chauffage A7/351 / A7/W552 W : 16kW . - COP (nominal) A7/W35¹ / A7/W55² : 4.26 . - SCOP température eau de sortie 35 °C/ 55 °C : 4,46/3,09 . - Efficacité énergétique saisonnière en chauffage Température de sortie d'eau 35°C/55°C : 175/121 . - Classe d'efficacité saisonnière moyenne du chauffage chauffage température eau de sortie 35 °C/55 °C : A+++/A+ . - Puissance acoustique Chauffage dB(A) : 44 . - Poids net : 46.5 . - Dimension : 510x850x315 .  . Unité extérieure : . - Compresseur Type : BLDC Twin rotatif . - Pression acoustique : 52 . - Poids net : 99.5 . - Dimension : 940x1420x330 . - Réfrigérant : R410A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 12M 12KW MONO AE120AXEDEH/EU+AE160ANYDEH',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 12M 12KW MONOPHASE AE120AXEDEH/EU+AE160ANYDEH MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 12kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 181/122 .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W 4,63/2.87 . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,59/3,12 . - Puissance acoustique Chauffage standard : dB(A) 64 . - Alimentation électrique ?, V, Hz : 1 ?, 2,   220~240 V, 50 Hz monophasé . - Réfrigérant : Type - R410A . - Dimensions Groupe Extérieur : 940 x 1,420 x 330 mm . - Poids net du Groupe Extérieur  :  73 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315  mm . - Poids net Kit hydraulique mural : 45 kg . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 12T 12KW TRI AE120AXEDGH/EU+AE160ANYDGH',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 12T 12KW TRIPHASE AE120AXEDGH/EU+AE160ANYDGH MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 12kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 181/122 .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W 4,63/2.87 . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,59/3,12 . - Puissance acoustique Chauffage standard : dB(A) 64 . - Alimentation électrique ?, V, Hz : 3 ?, 4, 380~415 V, 50 Hz triphasé . - Réfrigérant : Type - R410A . - Dimensions Groupe Extérieur : 940 x 1,420 x 330 mm . - Poids net du Groupe Extérieur  :  73 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315  mm . - Poids net Kit hydraulique mural : 45 kg . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POWER INVERTER SILENCE DUO 8 200L 8 KW MONOPHASE R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 2.90 - 8.00 - 9.50 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.40 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 166 / 4.22 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 132 / 3.37 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 6.30 / 6.30 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 5.20 / 5.20 . - Plage fonctionnement (T° ext) : -20 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.41 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 145 / L .  .  Groupe Extérieur : PUHZ-SW75VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 58 / 43 dB(A) . Poids net : 92 kgs .  . Module Hydraulique  ERST20D-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 41 / 29 dB(A) . Poids net à vide : 104kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 16T 16KW TRI AE160AXEDGH/EU+AE160ANYDGH',
            //     'selling_price' => 0,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 16T 16KW TRIPHASE AE160AXEDGH/EU+AE160ANYDGH MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 16kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 175/121 .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W4,26/ 2,74 . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,46/3,09 1 . - Puissance acoustique Chauffage standard : dB(A) 66 . - Alimentation électrique ?, V, Hz : 3 ?, 4, 380~415 V, 50 Hz triphasé . - Réfrigérant : Type - R410A . - Dimensions Groupe Extérieur : 940 x 1,420 x 330  mm . - Poids net du Groupe Extérieur  : 109 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315 mm . - Poids net Kit hydraulique mural : 45 kg . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 9M 9KW MONO AE090RXEDEG/EU+AE090RNYDEG',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 9M 9KW MONOPHASE AE090RXEDEG+AE090RNYDEG MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 9kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 175/127 .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W 4,81/2,93  . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,45/3,24 . - Puissance acoustique Chauffage standard : dB(A) 63 . - Alimentation électrique ?, V, Hz : 1 ?, 2,   220~240 V, 50 Hz monophasé . - Réfrigérant : Type - R32 . - Dimensions Groupe Extérieur : 940 x 998 x 330 mm . - Poids net du Groupe Extérieur  :  73 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315 mm . - Poids net Kit hydraulique mural : 45 kg . - Puissance acoustique Chauffage standard dB(A) : 40 . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'EHS 9T 9KW TRI AE090RXEDGG/EU+AE090RNYDGG',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : SAMSUNG  . REFERENCE : EHS 9T 9KW TRIPHASE AE090RXEDGG/EU +AE090RNYDGG MOYENNE TEMPERATURE . - Groupe Extérieur AIR EAU avec Kit Hydraulique . - Puissance Nominale : 9kw . - Efficacité énergétique saisonnière a 35°C/55°C ETAS% 175/127 .  Calculée selon le règlement (EU) n° 813/2013 de la commission du 2 août 2013 . - COP (nominal) A7/W35 / A7/W55 :  W/W 4,81/2,93  . - SCOP température eau de sortie 35 °C/ 55 °C : W/W 4,45/3,24 . - Puissance acoustique Chauffage standard : dB(A) 63 . - Alimentation électrique ?, V, Hz : 3 ?, 4, 380~415 V, 50 Hz triphasé . - Réfrigérant : Type - R32 . - Dimensions Groupe Extérieur : 940 x 998 x 330 mm . - Poids net du Groupe Extérieur  :  73 kg . - Dimensions Kit Hydraulique : 510 x 850 x 315 mm . - Poids net Kit hydraulique mural : 45 kg . - Puissance acoustique Chauffage standard dB(A) : 40 . - Thermostat Radio Sans Fil avec Programmateur . - Classe d'efficacité saisonnière moyenne 35 °C/55 °C : A+++/A++ . Classe d'efficacité énergétique - A+",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'POWER INVERTER SILENCE DUO 11 200L 11 KW MONOPHASE R410A',
            //     'selling_price' => 9000,
            //     'description' => "Mode Chaud : . - Puissance (+7°C ext, 35°C eau) min - nom - max : 3.40 - 11.20 - 13.10 . - COP (+7°C ext, 35°C eau, selon EN14511) : 4.46 . - Rendement saisonnier (?s) / SCOP (35°C eau) : 170 / 4.32 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Rendement saisonnier (?s)  / SCOP (55°C eau) : 132 / 3.37 selon le règlement EU n°813/2013 de la commission du 2 aout 2013 . - Puissance (-7°C ext, 35°C eau) / (-7°C ext, 45°C eau) : 8.90 / 8.90 . - Puissance (-15°C ext, 35°C eau) / (-15°C ext, 45°C eau) : 6.80 / 6.80 . - Plage fonctionnement (T° ext) : -20 / +35 . - Température de départ d'eau maximum : +60 .  . ECS : . - COP ECS (cycle L, selon EN16147) : 3.41 . - Rendement saisonnier (?wh) / Cycle de puisage ECS % / - : 145 / L .  .  Groupe Extérieur : PUHZ-SW100VAA . Dimensions Hauteur x Largeur x Profondeur : 1020 x 1050 x 480 mm . Puissance acoustique / Pression acoustique à 1m : 60 / 47 dB(A) . Poids net : 114 kgs .  . Module Hydraulique  ERST20C-VM6D . Dimensions Hauteur x Largeur x Profondeur : 1600 x 595 x 680 mm . Puissance acoustique / Pression acoustique à 1m : 40 / 28 dB(A) . Poids net à vide : 114kgs . Volume ballon eau chaude sanitaire / vase d'expansion : 200L / 12L . Appoint électrique : 6 (2 + 4)",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 48,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 10KW TRI',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 10KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 9,8 kW . - COP à +7°C/+35°C : 4,7 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 185/130%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 39 dB(A) . - Alimentation : 400 V V/Hz TRIPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1 565 x 1 100 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 97 . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 5KW MONO',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 5KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 4,5 kW . - COP à +7°C/+35°C : 4,8 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 182/138%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 33 dB(A) . - Alimentation : 230 V V/Hz MONOPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1100 x 765 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 102  . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 12KW TRI',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 12KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 10,3 kW . - COP à +7°C/+35°C : 4,6 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 185/130%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 39 dB(A) . - Alimentation : 400 V V/Hz TRIPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1 565 x 1 100 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 97 . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 10KW MONO',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 10KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 9,8 kW . - COP à +7°C/+35°C : 4,7 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 185/130%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 39 dB(A) . - Alimentation : 230 V V/Hz MONOPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1 565 x 1 100 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 97 . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 7KW MONO',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 7KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 5,8 kW . - COP à +7°C/+35°C : 4,7 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 179/135%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 34 dB(A) . - Alimentation : 230 V V/Hz MONOPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1100 x 965 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 112  . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'GENIA SET SPLIT 12KW MONO',
            //     'selling_price' => 12000,
            //     'description' => "MARQUE : SAUNIER DUVAL . Référence :GENIA SET SPLIT 12KW / BASSE TEMPÉRATURE . Air+7°C Eau +35°C . -  Puissance calorifique +7°C/+35°C : 10,3 kW . - COP à +7°C/+35°C : 4,6 . - Efficacité énergétique saisonnière Etas 35°C/55°C : 185/130%  . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . -Niveau sonore unité extérieure : 39 dB(A) . - Alimentation : 230 V V/Hz MONOPHASÉ . - Réfrigérant  : R410A . Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Dimensions unité extérieure (L x H x Profondeur) : 1 565 x 1 100 x 450 mm . - Eau chaude sanitaire Capacité du ballon  :  188 L . - Dimensions unité intérieure (LxHxP) : 595 x 1880 x 693 mm . - Efficacité énergétique saisonnière pour le chauffage de l'eau (?wh)  % : 97 . - Protection anti-corrosion : anode magnésium . Classe : A",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 49,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'THOMSON ETHER 110',
            //     'selling_price' => 14000,
            //     'description' => "Groupe intérieur : .  . ETHER 110 - TH03301710 . Puissance calorifique nominale : 11 kw . SCOP à 35°C :  4.74 . SCOP à 55°C :  3.46 . COP à 35°C/+7°C :  5.15 . COP à 55°C/+7°C :  3.17 . Efficacité énergétique saisonnière pour chauffage des locaux :  135% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . Classe efficacité énergétique 55°C/35°C : A++/A+++ . Niveau de puissance acoustique, à l'extérieur  :  62 dB . Niveau de puissance acoustique, à l'intérieur  :  43 dB . Dimension du module hydraulique (L x l x h) : 300 x 600 x 1700 . Poids du module hydraulique : 40 . Type d'alimentation : 230V - 1ph - 50Hz .  . Groupe extérieur :  .  . Réfrigérant : R-410A . Type d'alimentation : 230V - 1ph - 50Hz . Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU THOMSON ETHER16SMR32',
            //     'selling_price' => 0,
            //     'description' => 'PAC AIR / EAU THOMSON ETHER R32 SPLIT 65°C . Unité extérieure : ETHER16SMR32 . Capacité : 16.1 kW . Chauffage (A7/W35) : . Puissance absorbée : 3.57 kW . Cop : 4.51 . Chauffage (A7/W55) : . Puissance absorbée : 5.53 kW . Cop : 2.91 . Efficacité énergétique saisonnière LWT 35°C / LWT 55°C : A+++ / A++ . ETAS LWT 35°C / LWT 55°C : 190 / 135 . Scop LWT 35°C / LWT 55°C  : 4.63 / 3.43 .  . UNITÉ EXTÉRIEURE : . Compresseur : Twin rotary DC inverter Panasonic . Type de réfrigérant (R32) quantité : 1.84kg . Niveau pression acoustique (1m) fonct. standard : 54dB . Dimension unité : 420x860x990mm . Poids net / poids brut : 88 kg / 94 kg . Disjoncteur maximum : 14 A',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU THOMSON ETHER12SMR32',
            //     'selling_price' => 10000,
            //     'description' => 'PAC AIR / EAU THOMSON ETHER R32 SPLIT 65°C . Unité extérieure : ETHER12SMR32 . Capacité : 12.2 kW . Chauffage (A7/W35) : . Puissance absorbée : 2.44 kW . Cop : 4.96 . Chauffage (A7/W55) : . Puissance absorbée : 3.86 kW . Cop : 3.11 . Efficacité énergétique saisonnière LWT 35°C / LWT 55°C : A+++ / A++ . ETAS LWT 35°C / LWT 55°C : 190 / 136 . Scop LWT 35°C / LWT 55°C  : 4.82 / 3.46 .  . UNITÉ EXTÉRIEURE : . Compresseur : Twin rotary DC inverter Panasonic . Type de réfrigérant (R32) quantité : 1.84kg . Niveau pression acoustique (1m) fonct. standard : 49dB . Dimension unité : 420x860x990mm . Poids net / poids brut : 88 kg / 94 kg . Disjoncteur maximum : 14 A',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'PAC AIR / EAU THOMSON ETHER14SMR32',
            //     'selling_price' => 8000,
            //     'description' => 'PAC AIR / EAU THOMSON ETHER R32 SPLIT 65°C . Unité extérieure : ETHER14SMR32 . Capacité : 14.5 kW . Chauffage (A7/W35) : . Puissance absorbée : 3.08 kW . Cop : 4.71 . Chauffage (A7/W55) : . Puissance absorbée : 4.67 kW . Cop : 3 . Efficacité énergétique saisonnière LWT 35°C / LWT 55°C : A+++ / A++ . ETAS LWT 35°C / LWT 55°C : 186 / 135 . Scop LWT 35°C / LWT 55°C  : 4.71 / 3.48 .  . UNITÉ EXTÉRIEURE : . Compresseur : Twin rotary DC inverter Panasonic . Type de réfrigérant (R32) quantité : 1.84kg . Niveau pression acoustique (1m) fonct. standard : 50dB . Dimension unité : 420x860x990mm . Poids net / poids brut : 88 kg / 94 kg . Disjoncteur maximum : 14 A',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER  90T 9KW  / THO3301709',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER 90T 9KW  / THO3301709 . - Puissance calorifique nominale : 9KW . - SCOP à 35°C* :  4.80 . - SCOP à 55°C* :  3.40 . - COP à 35°C/+7°C :  5.25 . - COP à 55°C/+7°C :  3.21 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  133% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 5 700 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 134 . - Type d'alimentation : 230V - 1ph - 50Hz  . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 400V - 3Ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER DUO 90T 11KW  / THO3301705',
            //     'selling_price' => 0,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER DUO 90T 11KW  / THO3301705  TRIPHASE . - Puissance calorifique nominale : 11KW . - SCOP à 35°C* :  4.80 . - SCOP à 55°C* :  3.40 . - COP à 35°C/+7°C :  5.25 . - COP à 55°C/+7°C :  3.21 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  133% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 5 700 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 134 . - Type d'alimentation : 230V - 1ph - 50Hz . Caractèristiques du modèle ETHER DUO . - Profil de charge déclarée :  XL . - Consommation journalière d'électricité : 7.42 . - Consommation annuelle d'électricité : 1574 . - Efficacité énergétique pour le chauffage de l'eau : 106% . - Volume du ballon : 180L . - Pression de service maximale : 7 BAR . - Volume du vase d'expansion :  8L . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation :  400V - 3Ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER  110 9KW  / THO3301710',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER 110 9KW  / THO3301710 . - Puissance calorifique nominale : 9KW . - SCOP à 35°C* :  4.74 . - SCOP à 55°C* :  3.46 . - COP à 35°C/+7°C :  5.15 . - COP à 55°C/+7°C :  3.17 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  135% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 6 891 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 300 x 600 x 1700 . - Poids du module hydraulique : 40 . - Type d'alimentation : 230V - 1ph - 50Hz . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 230V - 1ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER DUO 110 11KW  / THO3301706',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER DUO 110 11KW  / THO3301707 MONOPHASE . - Puissance calorifique nominale : 11KW . - SCOP à 35°C* :  4.74 . - SCOP à 55°C* :  3.46 . - COP à 35°C/+7°C :  5.15 . - COP à 55°C/+7°C :  3.17 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  135% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 6 891 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 134 . - Type d'alimentation : 230V - 1ph - 50Hz . Caractèristiques du modèle ETHER DUO . - Profil de charge déclarée :  XL . - Consommation journalière d'électricité : 7.42 . - Consommation annuelle d'électricité : 1574 . - Efficacité énergétique pour le chauffage de l'eau : 106% . - Volume du ballon : 180L . - Pression de service maximale : 7 BAR . - Volume du vase d'expansion :  8L . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 230V - 1ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER DUO 90 11KW  / THO3301704',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER DUO 90 11KW  / THO3301704 . - Puissance calorifique nominale : 11KW . - SCOP à 35°C* :  4.80 . - SCOP à 55°C* :  3.40 . - COP à 35°C/+7°C :  5.25 . - COP à 55°C/+7°C :  3.21 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  133% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 5 700 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 134 . - Type d'alimentation : 230V - 1ph - 50Hz . Caractèristiques du modèle ETHER DUO . - Profil de charge déclarée :  XL . - Consommation journalière d'électricité : 7.42 . - Consommation annuelle d'électricité : 1574 . - Efficacité énergétique pour le chauffage de l'eau : 106% . - Volume du ballon : 180L . - Pression de service maximale : 7 BAR . - Volume du vase d'expansion :  8L . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 230V - 1ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER DUO 110T 11KW  / THO3301707',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER DUO 110T 11KW  / THO3301707 . - Puissance calorifique nominale : 11KW . - SCOP à 35°C* :  4.74 . - SCOP à 55°C* :  3.46 . - COP à 35°C/+7°C :  5.15 . - COP à 55°C/+7°C :  3.17 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  135% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 6 891 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 134 . - Type d'alimentation : 230V - 1ph - 50Hz . Caractèristiques du modèle ETHER DUO . - Profil de charge déclarée :  XL . - Consommation journalière d'électricité : 7.42 . - Consommation annuelle d'électricité : 1574 . - Efficacité énergétique pour le chauffage de l'eau : 106% . - Volume du ballon : 180L . - Pression de service maximale : 7 BAR . - Volume du vase d'expansion :  8L . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 400V - 3Ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER  110T 9KW  / THO3301711',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER 110T 9KW  / THO3301711 . - Puissance calorifique nominale : 9KW . - SCOP à 35°C* :  4.74 . - SCOP à 55°C* :  3.46 . - COP à 35°C/+7°C :  5.15 . - COP à 55°C/+7°C :  3.17 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  135% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 6 891 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 300 x 600 x 1700 . - Poids du module hydraulique : 40 . - Type d'alimentation : 230V - 1ph - 50Hz . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 400V - 3Ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ETHER  90 9KW  / THO3301708',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : THOMSON .  Référence : ETHER 90 9KW  / THO3301708 . - Puissance calorifique nominale : 9KW . - SCOP à 35°C* :  4.80 . - SCOP à 55°C* :  3.40 . - COP à 35°C/+7°C :  5.25 . - COP à 55°C/+7°C :  3.21 . - Efficacité énergétique saisonnière pour chauffage des locaux* :  133% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Classe efficacité énergétique 55°C/35°C : A++/A+++ . - Consommation annuelle d'énergie / 5 700 . - Équipée d'un dispositif de chauffage d'appoint : 6 . - Niveau de puissance accoustique, à l'extérieur Db :  62 . - Niveau de puissance accoustique, à l'intérieur Db :  43 . - Dimension du module hydraulique (L x l x h) : 600 x 600 x 1700 . - Poids du module hydraulique : 40 . - Type d'alimentation : 230V - 1ph - 50Hz . Groupe extérieur . - Réfrigérant : R-410A . - Type d'alimentation : 230V - 1ph - 50Hz . - Dimension (longueur x largeur x hauteur) : 374 x 1016 x 1506 . - Poids : 135",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 62,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ESTIA 6 KW - MONOPHASE - HWT-601HW-E',
            //     'selling_price' => 0,
            //     'description' => 'ESTIA 6 KW - MONOPHASE - HWT-601HW-E',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 63,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ESTIA 4 KW - MONOPHASE - HWT-401HW-E',
            //     'selling_price' => 0,
            //     'description' => 'ESTIA 4 KW - MONOPHASE - HWT-401HW-E',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 63,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ESTIA 8 KW - MONOPHASE - HWT-801HW-E',
            //     'selling_price' => 0,
            //     'description' => 'ESTIA 8 KW - MONOPHASE - HWT-801HW-E',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 63,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ESTIA 11 KW - MONOPHASE - HWT-1101HW-E',
            //     'selling_price' => 9000,
            //     'description' => "MARQUE : TOSHIBA / Référence Unité Extérieure ESTIA HWT-1101HW-E MOYENNE TEMPERATURE . - Puissance calorifique nominale/maxi. :  +7°C 35°C kW 11,0 / 13,2  . - COP (+7°C / 35°C) : 4,6  . - SCOP (35°C / 55°C) : 4,55 / 3,62 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 179% / 142% .  Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R32 . - Tension en volts : 220V Monophasé . - Dimensions UE (H x L x P) mm : 1050 x 1010 x 370 / Poids : 75 kg . - Niveau de puissance sonore UE : 64 dB . - Dimensions UI : (H x L x P) mm : 725 x 450 x 235 / Poids : 27 kg . - Niveau de puissance sonore UI : 40 dB . - Classe efficacité énergétique 35°C :  A++ . - Classe d'efficacité énergétique (mode eau chaude sanitaire ECS) A+ . - Classe d'efficacité énergétique autre (chauffage, lampe, ...) A+++",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 63,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ESTIA 14 KW - MONOPHASE - HWS-1405H-E',
            //     'selling_price' => 0,
            //     'description' => 'ESTIA 14 KW - MONOPHASE - HWS-1405H-E',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 63,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'VERSATI III SPLIT',
            //     'selling_price' => 12000,
            //     'description' => "VERSATI III SPLIT SP 12 . Unité intérieure : GRS-CQ12PD/NHH-E(I) . - Puissance  restituée : +7/35 kW :  12 . - Puissance  restituée : - 7/35 kW : 8.42 . - COP :  +7/35°C :  5 . - COP  -7/35°C :  3,06 . - EER (35°C ext/ 7°C eau) : 2.79 . - SCOP ECS (climat moyen 7°C) : 2.59 . - Réfrigérant : R32 .  - Efficacité énergétique saisonnière Etas  45°C/35°C : 169%/262% . - Pression acoustique dB(A) : 29 . - Puissance acoustique à l'extérieur : dB(A) : 68 . - Classe efficacité énergétique ) 55°C/35°C :  A++/A+++  . - Groupe extérieur dimension mm : 940 / 820 / 460",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 66,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 H MT W HAUTE TEMPERATURE  EPRA08EV3 + ETBH12E6V',
            //     'selling_price' => 0,
            //     'description' => 'Marque :  DAIKIN  / HAUTE TEMPERATURE  . Référence : ALTHERMA 3 H MT W EPRA08EV3 + ETBH12E6V . - Puissance calorifique maxi 7°C / 55°C : 7,55 KW . - COP (-7°C / 55°C) : 2,05 / SCOP (35°C / 55°C) : 4,69 / 3,41 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 184% / 134% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R-32 . - Dimensions UE (H x L x P) mm : 1 003 X 1 270 X 533 / Poids : 118 kg . - Niveau de puissance sonore UE : 31 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 37 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => null,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => 'ALTHERMA 3 R W MOYENNE TEMPERATURE  ERLA11DV3 + EBBH11D6V',
            //     'selling_price' => 0,
            //     'description' => 'Marque :  DAIKIN  / MOYENNE TEMPERATURE . Référence : ALTHERMA 3 R W  ERLA11DV3 + EBBH11D6V . - Puissance calorifique maxi 7°C / 35°C : 9,02 KW . - COP (-7°C / 55°C) : 1,86 / SCOP (35°C / 55°C) : 4,63 / 3,23 . - Efficacité saisonnière ETAs h (?s) (35°C / 55°C) : 182% / 126% . Calculée selon le règlement (EU) n°813/2013 de la commission du 2 aout 2013 . - Fluide frigorigène : R-32 . - Dimensions UE (H x L x P) mm : 870 X 1 100 X 460 / Poids : 101 kg . - Niveau de puissance sonore UE : 40 dB . UNITE INTERIEUR : . - Dimensions UI : (H x L x P) mm : 840 x 440 x 390 / Poids : 52,5 kg . - Niveau de puissance sonore UI : 30 dB . - Classe efficacité énergétique 35°C :  A+++',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => null,
            //     'p_work_id' => 2,
            // ],
            // //ITE
            // [
            //     'designation' => 'TETRIS SUPER 8',
            //     'selling_price' => 0,
            //     'description' => "TETRIS SUPER 8  est un isolant réflecteur alvéolaire 2 en 1 qui assure à la fois l'isolation hiver/été et l'étanchéité à l'air Sa technologie alvéolaire permet d'atteindre des performances thermiques élevées en exploitant les qualités isolantes.Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 1,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'PRO WALL DOUBLE',
            //     'selling_price' => 0,
            //     'description' => 'PRO WALL DOUBLE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 6,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'GRAPHIPAN dB 30',
            //     'selling_price' => 55,
            //     'description' => "Complexe de doublage constitué d'un panneau isolant en polystyrène expansé (PSE) graphité et élastifié, associé à une plaque de plâtre Placo®. Parement plaque Placomarine® BA13, à haute résistance à l'humidité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 26,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'CELLOMUR ULTRA',
            //     'selling_price' => 0,
            //     'description' => 'Marque: HIRSCH ISOLATION,  . Référence CELLOMUR ULTRA . Epaisseur 120 mm  . Résistance thermique 3,85 m2.K/W',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 26,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ISODALLE_GRIS_32-120',
            //     'selling_price' => 0,
            //     'description' => 'ISODALLE_GRIS_32-120',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'GR 32 ROULE REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'GR 32 ROULE REVETU KRAFT 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'GR 32 REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'GR 32 REVETU KRAFT 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ISOMOTHERM Extra L32',
            //     'selling_price' => 0,
            //     'description' => 'ISOMOTHERM Extra L32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'IBR revêtu kraft',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'Knauf Xtherm ULTRA 32',
            //     'selling_price' => 0,
            //     'description' => 'Knauf Xtherm ULTRA 32 (POLYPLAC)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'XTHERM ULTRA 32 MUR',
            //     'selling_price' => 0,
            //     'description' => 'XTHERM ULTRA 32 MUR',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ACOUSTILAINE 035',
            //     'selling_price' => 0,
            //     'description' => 'ACOUSTILAINE 035 Isolation des murs',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'TP 238',
            //     'selling_price' => 0,
            //     'description' => 'TP 238',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ACOUSTIPLUS 032',
            //     'selling_price' => 0,
            //     'description' => "ACOUSTIPLUS 032 est un panneau de laine de verre roulé semi-rigide à très haute performance thermique revêtu d'un surfaçage kraft. . Isolation des murs et toitures.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'KNAUF THERM ITEx TH38 SE FM+',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF THERM ITEx TH38 SE FM+ / PANNEAU ISOLANT EN POLYSTYRENE POUR APPLICATION FACADE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'SOUDALLE ALU',
            //     'selling_price' => 0,
            //     'description' => 'SOUDALLE ALU EP100 R3,15',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'selling_price' => 0,
            //     'description' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'Graphipan CEE 103 Igni',
            //     'selling_price' => 0,
            //     'description' => 'Graphipan CEE 103 Igni',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'POLYPRO-ITE G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => 'POLYPRO-ITE G TH32 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'POLYPRO ITI G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => "POLYPRO ITI G TH32  est un panneau isolant en polystyrène expansé graphité dédié à l'isolation thermique des bâtiments. Ce matériau est très léger et de très hautes performances thermiques. . La mise en ouvre est très simple et adapté pour la pose sur bâtiment neuf ou en rénovation en isolation sous plancher et vide sanitaire.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'POLYPRO TH32',
            //     'selling_price' => 0,
            //     'description' => 'PANNEAU EN POLYSTYRÈNE POUR VIDE SANITAIRE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'PRB FACADE TH 31',
            //     'selling_price' => 75,
            //     'description' => "Plaque d'isolation thermique  . PRB FACADE TH 31",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 45,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ROCKFEU REI 60 RsD',
            //     'selling_price' => 0,
            //     'description' => 'ROCKFEU REI 60 RsD',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ROCK PLUS KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'ROCK PLUS KRAFT EP140  R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ECOROCK DUO',
            //     'selling_price' => 0,
            //     'description' => 'ECOROCK DUO  EP130 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'MB ROCK',
            //     'selling_price' => 0,
            //     'description' => 'MB ROCK EP145 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ALPHAROCK',
            //     'selling_price' => 0,
            //     'description' => 'ALPHAROCK EP80',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'ROCKFACADE',
            //     'selling_price' => 0,
            //     'description' => 'ROCKFACADE EP130 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'selling_price' => 0,
            //     'description' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'UNIMAT FACADE ULTRA BD',
            //     'selling_price' => 75,
            //     'description' => "L'UNIMATTM Façade Ultra BD est un panneau de polystyrène expansé graphité de conductivité thermique 31 mW/m.K. . Les panneaux UNIMAT Façade Ultra BD sont destinés à l'isolation des murs extérieurs sous enduits minces ou hydrauliques.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'E-PRK 35 ROULÉ',
            //     'selling_price' => 0,
            //     'description' => 'E-PRK 35 ROULÉ',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'P-PRK 32',
            //     'selling_price' => 0,
            //     'description' => 'P-PRK 32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'F-PRK 32',
            //     'selling_price' => 0,
            //     'description' => 'F-PRK 32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => 'E-URSA Façade 32 P',
            //     'selling_price' => 0,
            //     'description' => 'E-URSA Façade 32 P',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 8,
            // ],
            // // ITI
            // [
            //     'designation' => 'TETRIS SUPER 8',
            //     'selling_price' => 0,
            //     'description' => "TETRIS SUPER 8  est un isolant réflecteur alvéolaire 2 en 1 qui assure à la fois l'isolation hiver/été et l'étanchéité à l'air Sa technologie alvéolaire permet d'atteindre des performances thermiques élevées en exploitant les qualités isolantes.Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 1,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'PRO WALL DOUBLE',
            //     'selling_price' => 0,
            //     'description' => 'PRO WALL DOUBLE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 6,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'GRAPHIPAN dB 30',
            //     'selling_price' => 55,
            //     'description' => "Complexe de doublage constitué d'un panneau isolant en polystyrène expansé (PSE) graphité et élastifié, associé à une plaque de plâtre Placo®. Parement plaque Placomarine® BA13, à haute résistance à l'humidité.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 26,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'CELLOMUR ULTRA',
            //     'selling_price' => 0,
            //     'description' => 'Marque: HIRSCH ISOLATION,  . Référence CELLOMUR ULTRA . Epaisseur 120 mm  . Résistance thermique 3,85 m2.K/W',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 26,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ISODALLE_GRIS_32-120',
            //     'selling_price' => 0,
            //     'description' => 'ISODALLE_GRIS_32-120',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'GR 32 ROULE REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'GR 32 ROULE REVETU KRAFT 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'GR 32 REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'GR 32 REVETU KRAFT 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ISOMOTHERM Extra L32',
            //     'selling_price' => 0,
            //     'description' => 'ISOMOTHERM Extra L32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'IBR revêtu kraft',
            //     'selling_price' => 0,
            //     'description' => 'DÉROULÉ LAINE DE VERRE POUR COMBLE PERDU KRAFT',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'Knauf Xtherm ULTRA 32',
            //     'selling_price' => 0,
            //     'description' => 'Knauf Xtherm ULTRA 32 (POLYPLAC)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'XTHERM ULTRA 32 MUR',
            //     'selling_price' => 0,
            //     'description' => 'XTHERM ULTRA 32 MUR',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ACOUSTILAINE 035',
            //     'selling_price' => 0,
            //     'description' => 'ACOUSTILAINE 035 Isolation des murs',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'TP 238',
            //     'selling_price' => 0,
            //     'description' => 'TP 238',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ACOUSTIPLUS 032',
            //     'selling_price' => 0,
            //     'description' => "ACOUSTIPLUS 032 est un panneau de laine de verre roulé semi-rigide à très haute performance thermique revêtu d'un surfaçage kraft. . Isolation des murs et toitures.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'KNAUF THERM ITEx TH38 SE FM+',
            //     'selling_price' => 0,
            //     'description' => 'KNAUF THERM ITEx TH38 SE FM+ / PANNEAU ISOLANT EN POLYSTYRENE POUR APPLICATION FACADE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'SOUDALLE ALU',
            //     'selling_price' => 0,
            //     'description' => 'SOUDALLE ALU EP100 R3,15',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'selling_price' => 0,
            //     'description' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'Graphipan CEE 103 Igni',
            //     'selling_price' => 0,
            //     'description' => 'Graphipan CEE 103 Igni',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'POLYPRO-ITE G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => 'POLYPRO-ITE G TH32 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'POLYPRO ITI G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => "POLYPRO ITI G TH32  est un panneau isolant en polystyrène expansé graphité dédié à l'isolation thermique des bâtiments. Ce matériau est très léger et de très hautes performances thermiques. . La mise en ouvre est très simple et adapté pour la pose sur bâtiment neuf ou en rénovation en isolation sous plancher et vide sanitaire.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'POLYPRO TH32',
            //     'selling_price' => 0,
            //     'description' => 'PANNEAU EN POLYSTYRÈNE POUR VIDE SANITAIRE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'PRB FACADE TH 31',
            //     'selling_price' => 75,
            //     'description' => "Plaque d'isolation thermique  . PRB FACADE TH 31",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 45,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ROCKFEU REI 60 RsD',
            //     'selling_price' => 0,
            //     'description' => 'ROCKFEU REI 60 RsD',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ROCK PLUS KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'ROCK PLUS KRAFT EP140  R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ECOROCK DUO',
            //     'selling_price' => 0,
            //     'description' => 'ECOROCK DUO  EP130 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'MB ROCK',
            //     'selling_price' => 0,
            //     'description' => 'MB ROCK EP145 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ALPHAROCK',
            //     'selling_price' => 0,
            //     'description' => 'ALPHAROCK EP80',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'ROCKFACADE',
            //     'selling_price' => 0,
            //     'description' => 'ROCKFACADE EP130 R3,7',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'selling_price' => 0,
            //     'description' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'UNIMAT FACADE ULTRA BD',
            //     'selling_price' => 75,
            //     'description' => "L'UNIMATTM Façade Ultra BD est un panneau de polystyrène expansé graphité de conductivité thermique 31 mW/m.K. . Les panneaux UNIMAT Façade Ultra BD sont destinés à l'isolation des murs extérieurs sous enduits minces ou hydrauliques.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'E-PRK 35 ROULÉ',
            //     'selling_price' => 0,
            //     'description' => 'E-PRK 35 ROULÉ',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'P-PRK 32',
            //     'selling_price' => 0,
            //     'description' => 'P-PRK 32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'F-PRK 32',
            //     'selling_price' => 0,
            //     'description' => 'F-PRK 32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => 'E-URSA Façade 32 P',
            //     'selling_price' => 0,
            //     'description' => 'E-URSA Façade 32 P',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 9,
            // ],
            // // plancher bas
            // [
            //     'designation' => 'TETRIS SUPER 8',
            //     'selling_price' => 0,
            //     'description' => "TETRIS SUPER 8  est un isolant réflecteur alvéolaire 2 en 1 qui assure à la fois l'isolation hiver/été et l'étanchéité à l'air Sa technologie alvéolaire permet d'atteindre des performances thermiques élevées en exploitant les qualités isolantes.Il est disponible en plusieurs épaisseurs pour répondre à toutes les exigences de résistance thermique.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 1,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'PRO WALL DOUBLE',
            //     'selling_price' => 0,
            //     'description' => 'PRO WALL DOUBLE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 6,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'EDIL - FAÇADE',
            //     'selling_price' => 0,
            //     'description' => 'EDIL - FAÇADE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 17,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISOTHERM',
            //     'selling_price' => 0,
            //     'description' => 'ISOTHERM',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 21,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISOLDALLE',
            //     'selling_price' => 0,
            //     'description' => 'ISOLDALLE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISOLITEX 115',
            //     'selling_price' => 0,
            //     'description' => 'ISOLITEX 115',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISOLITEX GRIS 31-100',
            //     'selling_price' => 0,
            //     'description' => 'ISOLITEX GRIS 31-100',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISODALLE_GRIS_32-100',
            //     'selling_price' => 0,
            //     'description' => 'ISODALLE_GRIS_32-100',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISODALLE_GRIS_32-120',
            //     'selling_price' => 0,
            //     'description' => 'ISODALLE_GRIS_32-120',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 30,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'GR 32 REVETU KRAFT',
            //     'selling_price' => 0,
            //     'description' => 'GR 32 REVETU KRAFT 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ISOMOTHERM Extra L32',
            //     'selling_price' => 0,
            //     'description' => 'ISOMOTHERM Extra L32',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 31,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'XTHERM RÉNO SE',
            //     'selling_price' => 0,
            //     'description' => 'XTHERM RÉNO SE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'TP 138',
            //     'selling_price' => 0,
            //     'description' => 'TP 138',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'TP 238',
            //     'selling_price' => 0,
            //     'description' => 'TP 238',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ACOUSTIPLUS 032',
            //     'selling_price' => 0,
            //     'description' => "ACOUSTIPLUS 032 est un panneau de laine de verre roulé semi-rigide à très haute performance thermique revêtu d'un surfaçage kraft. . Isolation des murs et toitures.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'VERMIPLASTER',
            //     'selling_price' => 0,
            //     'description' => 'Vermiplasteur - Protection au feu',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'SOUDALLE ALU',
            //     'selling_price' => 0,
            //     'description' => 'SOUDALLE ALU EP100 R3,15',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'JetSpray Thermal',
            //     'selling_price' => 0,
            //     'description' => 'Flocage par Laine à souffler - JetSpray Thermal',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 34,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'selling_price' => 0,
            //     'description' => 'TERRADALL PORTEE ULTRA IGNI',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'Graphipan CEE 103 Igni',
            //     'selling_price' => 0,
            //     'description' => 'Graphipan CEE 103 Igni',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'Graphipan',
            //     'selling_price' => 0,
            //     'description' => 'GRAPHIPAN CEE 103 Ingi',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 41,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'POLYPRO ITI G TH32 100mm',
            //     'selling_price' => 35,
            //     'description' => "POLYPRO ITI G TH32 100mm POLYPRO ITI G TH32  est un panneau isolant en polystyrène expansé graphité dédié à l'isolation thermique des bâtiments. Ce matériau est très léger et de très hautes performances thermiques. . La mise en ouvre est très simple et adapté pour la pose sur bâtiment neuf ou en rénovation en isolation sous plancher et vide sanitaire.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'POLYPRO ITI B TH38 115 mm',
            //     'selling_price' => 0,
            //     'description' => 'POLYPRO ITI B TH38 115 mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'POLYPRO-ITE G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => 'POLYPRO-ITE G TH32 120mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'POLYPRO ITI G TH32 120mm',
            //     'selling_price' => 0,
            //     'description' => "POLYPRO ITI G TH32  est un panneau isolant en polystyrène expansé graphité dédié à l'isolation thermique des bâtiments. Ce matériau est très léger et de très hautes performances thermiques. . La mise en ouvre est très simple et adapté pour la pose sur bâtiment neuf ou en rénovation en isolation sous plancher et vide sanitaire.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'POLYPRO TH32',
            //     'selling_price' => 0,
            //     'description' => 'PANNEAU EN POLYSTYRÈNE POUR VIDE SANITAIRE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 43,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'PRB  FACADE TH 31',
            //     'selling_price' => 75,
            //     'description' => "Plaque d'isolation thermique  . PRB  TH 31",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 45,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'FIBREXPAN',
            //     'selling_price' => 0,
            //     'description' => 'Produits à base de laine minérale en vrac, application par projection humide -  ACERMI 16/224/1187/6 - Euroclasse A1',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 46,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'FIBREXPAN',
            //     'selling_price' => 0,
            //     'description' => 'Produits à base de laine minérale en vrac, application par projection humide -  ACERMI 16/224/1187/5 - Euroclasse A1',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 46,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKPLUS NU 100mm',
            //     'selling_price' => 0,
            //     'description' => 'ROCKPLUS NU 100mm',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKFEU REI 60 NATURAL RsD',
            //     'selling_price' => 0,
            //     'description' => 'ROCKFEU REI 60 NATURAL RsD',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKBARDAGE REVETU',
            //     'selling_price' => 0,
            //     'description' => 'Plaques Laine de Roche plafond rockwool . 305654',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCK FEU RSD',
            //     'selling_price' => 0,
            //     'description' => 'ROCK FEU RSD EP105 R3,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'SOUFACE ALU',
            //     'selling_price' => 0,
            //     'description' => 'PLAQUE LAINE DE ROCHE FINITION ALUMINIUM',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKFEU 60',
            //     'selling_price' => 0,
            //     'description' => 'PANNEAU DE LAINE DE ROCHE POUR CAVE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKFEU 120',
            //     'selling_price' => 0,
            //     'description' => 'PANNEAU DE LAINE DE ROCHE POUR PARKING',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'ROCKSOL EXPERT',
            //     'selling_price' => 0,
            //     'description' => 'ROCKSOL EXPERT EP120 R3,00',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'SOUFACE ALU ES',
            //     'selling_price' => 0,
            //     'description' => 'LAINE DE ROCHE FINITION ALUMINIUM',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 47,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'U. TH38 IGN',
            //     'selling_price' => 0,
            //     'description' => 'U. TH38 IGN',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'U. TH32 IGN',
            //     'selling_price' => 0,
            //     'description' => 'U. TH32 IGN',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'selling_price' => 0,
            //     'description' => 'UNIMAT DALLE PORTEE ULTRA',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'UNIMAT FACADE ULTRA BD',
            //     'selling_price' => 75,
            //     'description' => "L'UNIMATTM Façade Ultra BD est un panneau de polystyrène expansé graphité de conductivité thermique 31 mW/m.K. . Les panneaux UNIMAT Façade Ultra BD sont destinés à l'isolation des murs extérieurs sous enduits minces ou hydrauliques.",
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 50,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'SWISSPOR LAMBDA FAÇADE',
            //     'selling_price' => 0,
            //     'description' => 'SWISSPOR LAMBDA FAÇADE',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 57,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'URSA XPS P HR',
            //     'selling_price' => 0,
            //     'description' => 'URSA XPS P HR',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'E-URSA Façade 32 P',
            //     'selling_price' => 0,
            //     'description' => 'E-URSA Façade 32 P',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'RENOSOUDAL ALU',
            //     'selling_price' => 0,
            //     'description' => 'RENOSOUDAL ALU',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'RENOSOUDAL P0052',
            //     'selling_price' => 0,
            //     'description' => 'RENOSOUDAL P0052 EP120 R3,75',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'RENOSOUDAL P0052',
            //     'selling_price' => 0,
            //     'description' => 'PLAQUE EN LAINE MINERAL POUR PLANCHER BAS',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'RENOSOUDAL P0052',
            //     'selling_price' => 0,
            //     'description' => 'PLAQUE EN LAINE MINERAL POUR PLANCHER BAS',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // [
            //     'designation' => 'RENOSOUDAL P0052',
            //     'selling_price' => 0,
            //     'description' => 'RENOSOUDAL P0052 EP101 R3,15',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 65,
            //     'p_work_id' => 7,
            // ],
            // // VMC
            // [
            //     'designation' => 'EasyHOME Hygro Premium MW',
            //     'selling_price' => 0,
            //     'description' => 'EasyHOME Hygro Premium MW',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 3,
            //     'p_work_id' => 4,
            // ],
            // [
            //     'designation' => 'EASYHOME',
            //     'selling_price' => 0,
            //     'description' => 'W13 CURVE S D80 PRES (WC)  / B22 CURVE S D80 (SDB) / C21 CURVE L PUSH TBT (Cuisine)',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 3,
            //     'p_work_id' => 4,
            // ],
            // [
            //     'designation' => 'ATLANTIC Hygrocosy BC / Type A , Basse consommation',
            //     'selling_price' => 0,
            //     'description' => 'ATLANTIC Hygrocosy BC / Type A , Basse consommation',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 4,
            // ],
            // [
            //     'designation' => 'ATLANTIC Hygrocosy BC / Type B , Basse consommation',
            //     'selling_price' => 0,
            //     'description' => 'ATLANTIC Hygrocosy BC / Type B , Basse consommation',
            //     'unit' => 0,

            //     'type' => 0,
            //     'p_brand_id' => 7,
            //     'p_work_id' => 4,
            // ],
            // //prestation
            // //AIR
            // [
            //     'designation' => ' ALT 872923 / 873932 DOJO Muraux Éco Tailles 18 R32 / AS 018 DB.UI + 1U 018 DBR.UE',
            //     'selling_price' => 5000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) W 5 000 (1 300 / 5 800) . P. calo. nominale (min. / max.) W 5 200 (1400 / 6 000) . P. calo. à -7°C W 4 070 . P. abs. nominale en froid W 1 460 . P. abs. nominale en chaud W 1 400 . Débit d'air (u. int.) PV / GV m3/h 500 / 900 . Débit d'air max. (u. ext.) GV m3/h 2 500 . EER / SEER 3,42 / 6,10 . COP / SCOP 3,71 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) dB(A) 28 / 44 . Puissance acoustique (u. int.) (froid) dB(A) 57 . Pression acoustique (u. ext.) (froid) dB(A) 53 . Puissance acoustique (u. ext.) (froid) dB(A) 65 . Classe énergétique A++ . DIMENSIONS (HxLxP) : u. int. mm 318 x 1 008 x 225/u. ext. mm 550 x 800 x 280 . POIDS : u. int. / u. ext. kg 11,6 / 32,7",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => ' ATL 872924 DOJO BI-SPLITS Muraux Inverter R32 / 2U 018 DB.UE',
            //     'selling_price' => 3000,
            //     'description' => "GAMMEUE BI-SPLITS DOJO R32 ECO UE ATL.  . 2U 018 DB.UE - unité extérieure  . climatiseur multi-splits DOJO inv 4800W R32 - bi-splits - dc inverter  . - mono-ventilateur compact  . - liaisons frigorifiques 30 m maximum  . - fonctionnement jusqu'à -15°c extérieur en mode chaud / monophasé 230 v . - PUISS.CHAUD (KW)5.2 UE / PUISS.FROID (KW)4.8 . - HAUTEUR (CM)68.8 LARGEUR (CM)81 PROFONDEUR40.6 / POIDS (KG) 43.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => ' ATL 872925 DOJO TRI-SPLITS Muraux Inverter R32 / 3U 024 DB.UE',
            //     'selling_price' => 3000,
            //     'description' => "CARACTERISTIQUES . GAMMEUE TRI-SPLITS DOJO R32 ECO UE ATL.  . - Muraux Inverter 3U 024 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 6200W R32 . - mono-ventilateur compact  . - liaisons frigorifiques 60m maximum  . - fonctionnement jusqu'à -15°c extérieure en mode chaud - monophasé 230  . - PUISS.CHAUD (KW)6.8 UE / PUISS.FROID (KW)6.2 . - HAUTEUR (CM)70.000 / LARGEUR (CM)89.000 / PROFONDEUR CM 44.300 / POIDS (KG)54.000",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 872922 / 873931DOJO Muraux Éco Tailles 12 R32 / AS 012 DB.UI + 1U 012 DBR.UE ',
            //     'selling_price' => 5000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) W 3 600 (1 000 / 4 000) . P. calo. nominale (min. / max.) W 3 700 (1 100 / 4 600) . P. calo. à -7°C W 2 830 . P. abs. nominale en froid W 1 110 . P. abs. nominale en chaud W 990 . Débit d'air (u. int.) PV / GV m3/h 350 / 550 . Débit d'air max. (u. ext.) GV m3/h 2 000 . EER / SEER 3,24 / 6,40 . COP / SCOP 3,74 / 4,10 . Pression acoustique (u. int.) PV / GV (froid) dB(A) 21 / 38 . Puissance acoustique (u. int.) (froid) dB(A) 55 . Pression acoustique (u. ext.) (froid) dB(A) 48 . Puissance acoustique (u. ext.) (froid) dB(A) 63 . Classe énergétique A++ . DIMENSIONS (HxLxP) : u. int. mm 280 x 820 x 195 u. ext. mm 550 x 800 x 280 . POIDS : u. int. / u. ext. kg 8,4 / 27",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 872923 / 873932 DOJO Muraux Éco Tailles 18 R32 / AS 018 DB.UI + 1U 018 DBR.UE',
            //     'selling_price' => 5000,
            //     'description' => "CARACTERISTIQUES . GAMMEUE QUADRI-SPLITS DOJO R32 ECO UE ATL. . - Muraux Inverter 4U 030 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 7800W R32  . - quadri-splits - dc inverter - mono-ventilateur compact  . - liaisons frigorifiques 70m max - fonctionnement jusqu'à -15°c extérieur en mode chaud - monophasé 230 v   . - PUISS.CHAUD (KW)8.6 UE / PUISS.FROID (KW)7.8 . - HAUTEUR (CM)70.000  LARGEUR (CM)89.000 PROFONDEUR CM 44.300  . - POIDS (KG) 61",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 873906 / 872907 DOJO MONOSPLIT  AS 009 BS.UI + 1U 009 BS.UE',
            //     'selling_price' => 9000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) :  2 700 W (800 / 3 400) . P. calo. nominale (min. / max.)  : 2 800 W (1 000 / 4 600) . P. calo. à -7°C : 2 150W . P. abs. nominale en froid : 710W   . P. abs. nominale en chaud : 680W  . Débit d'air (u. int.) PV / GV  : 320 / 600 m3/h  . Débit d'air max. (u. ext.) GV  : 1 900 m3/h . EER / SEER : 3,80 / 6,40 . COP / SCOP : 4,10 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) : 20 / 38 dB(A) . Puissance acoustique (u. int.) (froid) : 52 dB(A)  . Pression acoustique (u. ext.) (froid) : 48 dB(A)  . Puissance acoustique (u. ext.) (froid) : 61 dB(A)  . Classe énergétique  A++ . DIMENSIONS (HxLxP) :  . u. int. 280 x 855 x 200mm  . u. ext. 540 x 780 x 245 mm  . POIDS : . u. int. /u. ext. : 10 / 29 Kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 873907 / 872908 DOJO MONOSPLIT AS 012 BS.UI + 1U 012 BS.UE',
            //     'selling_price' => 9000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) : 3 600 (1 000 / 4 200)W . P. calo. nominale (min. / max.) : 3 700 (1 100 / 5 400W . P. calo. à -7°C : 2 900W . P. abs. nominale en froid :1 000 W . P. abs. nominale en chaud : 950W . Débit d'air (u. int.) PV / GV: 320 / 650 m3/h . Débit d'air max. (u. ext.) GV: 1 900 m3/h . EER / SEER : 3,60 / 6,10 . COP / SCOP : 3,90 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) : 23 / 39 dB(A) . Puissance acoustique (u. int.) (froid) : 54 dB(A) . Pression acoustique (u. ext.) (froid) : 50 dB(A) . Puissance acoustique (u. ext.) (froid) : 62 dB(A) . Classe énergétique A++ . DIMENSIONS (HxLxP) : . u. int. 280 x 855 x 200  mm . u. ext. 540 x 780 x 245 mm . POIDS : . u. int. /u. ext. :10 / 31 Kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 873908 / 872909 DOJO MONOSPLIT  AS 018 BS.UI + 1U 018 FS.UE',
            //     'selling_price' => 9000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) : 5 200 (1 300 / 6 800) W . P. calo. nominale (min. / max.) : 5 800 (1 400 / 6 900) W . P. calo. à -7°C : 4 600 W . P. abs. nominale en froid : 1 530 W . P. abs. nominale en chaud : 1 700 W . Débit d'air (u. int.) PV / GV: 450 / 900 m3/h . Débit d'air max. (u. ext.) GV: 2 200 m3/h . EER / SEER : 3,40 / 6,20 . COP / SCOP : 3,41 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) : 28 / 44 dB(A) . Puissance acoustique (u. int.) (froid) : 57 dB(A) . Pression acoustique (u. ext.) (froid) : 52 dB(A) . Puissance acoustique (u. ext.) (froid) : 63 dB(A) . Classe énergétique A++ . DIMENSIONS (HxLxP) : . u. int. 322 x 997 x 230 mm  . u. ext. 688 x 810 x 288 mm . POIDS : . u. int. /u. ext. :13 / 43 Kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ALT 873909 / 872910 DOJO MONOSPLIT  AS 024 BS.UI + 1U 024 GS.UE',
            //     'selling_price' => 9000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) : 7 000 (2 200 / 8 500) W . P. calo. nominale (min. / max.) : 7 500 (2 400 / 9 800 W . P. calo. à -7°C : 5 000 W . P. abs. nominale en froid : 2 180 W . P. abs. nominale en chaud : 2 200 W . Débit d'air (u. int.) PV / GV: 620 / 1200 m3/h . Débit d'air max. (u. ext.) GV: 2 900 m3/h . EER / SEER : 3,21 / 6,10 . COP / SCOP : 3,41 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) : 30 /47 dB(A) . Puissance acoustique (u. int.) (froid) : 62 dB(A) . Pression acoustique (u. ext.) (froid) : 54 dB(A) . Puissance acoustique (u. ext.) (froid) : 67 dB(A) . Classe énergétique A++ . DIMENSIONS (HxLxP) : . u. int. 336 x 1 115 x 243 mm . u. ext. 730 x 860 x 308 mm . POIDS : . u. int. /u. ext. : 16 / 49 Kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'ATL 872926 DOJO QUDRI SPLITS Muraux Inverter R32 / 4U 030 DB.UE',
            //     'selling_price' => 5000,
            //     'description' => "CARACTERISTIQUES . GAMMEUE QUADRI-SPLITS DOJO R32 ECO UE ATL.  . - Muraux Inverter 4U 030 DB.UE  . - unité extérieure climatiseur multi-splits DOJO inv 7800W R32 . - mono-ventilateur compact  . - liaisons frigorifiques 60m maximum  . - fonctionnement jusqu'à -15°c extérieure en mode chaud - monophasé 230  . - PUISS.CHAUD (KW)6.8 UE / PUISS.FROID (KW)6.2 . - HAUTEUR (CM)70.000 / LARGEUR (CM)89.000 / PROFONDEUR CM 44.300 / POIDS (KG)54.000",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'FORFAIT FORNITURE ALT 872921 / 873930 DOJO Muraux Éco Taille 9 R32 AS 009 DB.UI + 1U 009 DBR.UE',
            //     'selling_price' => 5000,
            //     'description' => "CARACTÉRISTIQUES PRINCIPALES . P. frigo. nominale (min. / max.) W 2 600 (800 / 3 400) . P. calo. nominale (min. / max.) W 2 900 (1 000 / 3 800) / P. calo. à -7°C W 2 120 . P. abs. nominale en froid W 800 / P. abs. nominale en chaud W 780 . Débit d'air (u. int.) PV / GV m3/h 300 / 500 / Débit d'air max. (u. ext.) GV m3/h 1 900 . EER / SEER 3,25 / 6,20 / COP / SCOP 3,72 / 4,00 . Pression acoustique (u. int.) PV / GV (froid) dB(A) 20 / 37 . Puissance acoustique (u. int.) (froid) dB(A) 53 . Pression acoustique (u. ext.) (froid) dB(A) 47 . Puissance acoustique (u. ext.) (froid) dB(A) 62 . Classe énergétique  A++ . DIMENSIONS (HxLxP) : u. int. mm 280 x 820 x 195/u. ext. mm 540 x 780 x 245 . POIDS : u. int. / u. ext. kg 8,4 / 27",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'GE MULTI SPLIT SAMSUNG 5 SORTIES AJ100TXJ5KG/EU 5',
            //     'selling_price' => 1000,
            //     'description' => 'GE MULTI SPLIT SAMSUNG 5 SORTIES AJ100TXJ5KG/EU 5 PAC AIR AIR . MONOPHASE - SEER : 8 - COP : 4.26 / SCOP : 4.32 - Fluide frigorigène : R32 - . Dimensions UE : (H x L x P) mm : 940 x 998 x 330 / Poids : 76.5 kg - Niveau de . puissance sonore UE à 1 mètre : 54 dB',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "Main d'ouvre de pose et mise en service d'une pompe à chaleur Air/Air",
            //     'selling_price' => 3990,
            //     'description' => "- Installation du module intérieur - Installation du module extérieur  . - Passage et Câblage d'alimentation électrique conforme et interconnexion  . - Désembouage et purge du réseau de chauffage et ECS . - Contrôle du positionnement des appareils . - Con",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "MISE EN PLACE D'UNE PAC AIR/AIR AIRWELL AWAU-YCZ218-H11 MULTISPLIT DUO",
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ218-H11 MULTISPLIT DUO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 5.2 . - Puissance absorbée nominale kW : 1,62 . - SEER/Classe énergétique : 6,10/A++ . - SCOP/Classe énergétique : 4,1/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 4,5 . - Capacité à -15°C kW : 4,0 . - Pression acoustique à 1 m dB(A) : 55 . - Puissance acoustique dB(A) : 65 . - Débit d'air m³/h : 2500  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 845x700x320 .  - Poids net/Poids avec l'emballage kg : 48/52 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "MISE EN PLACE D'UNE PAC AIR/AIR AIRWELL AWAU-YCZ327-H11 MULTISPLIT TRIO",
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ327-H11 MULTISPLIT TRIO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 7.8 . - Puissance absorbée nominale kW : 2,43 . - SEER/Classe énergétique : 6,60/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 6,5 . - Capacité à -15°C kW : 5,7 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 68 . - Débit d'air m³/h : 3500  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 900x860x315 .  - Poids net/Poids avec l'emballage kg : 62/67 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "MISE EN PLACE D'UNE PAC AIR/AIR AIRWELL AWAU-YCZ430-H11 MULTISPLIT QUATTRO",
            //     'selling_price' => 9000,
            //     'description' => "MARQUE / REFERENCE : AIRWELL /   AWAU-YCZ430-H11 MULTISPLIT QUATTRO . UNITÉ EXTÉRIEURE :  . - Refroidissement Puissance nominale kW : 8.5 . - Puissance absorbée nominale kW : 2,56 . - SEER/Classe énergétique : 6,60/A++ . - SCOP/Classe énergétique : 3,9/A . La puissance nominale et le coefficient de performance saisonnier sont déterminés . selon le règlement n°206/2012 de la commission du 6 mars 2012. . - Capacité à -10°C kW : 6,6 . - Capacité à -15°C kW : 5,8 . - Pression acoustique à 1 m dB(A) : 58 . - Puissance acoustique dB(A) : 70 . - Débit d'air m³/h : 3800  . - Type de compresseur : Rotatif DC Inverter  . - Dimensions de l'unité (LxHxP) mm : 900x860x315 .  - Poids net/Poids avec l'emballage kg : 65/69 . - ALIMENTATION Phase/Tension/Fréquence :  1P/220-240V/50Hz . - Réfrigérant : R410A . UNITE INTERIEURE AIRWELL : COMPATIBLE AVEC   . MURAL HKD 9/12/18 - MURAL HND 9/12/18.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'PAC AIR/AIR DAIKIN PERFERA FTXM20N /  RXM20N9',
            //     'selling_price' => 9000,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM20N  . - Puissance Nominale en refroidissement : 2,00 kW  . - Puissance MAX en refroidissement : 2,60 kW . - Puissance MAX en chauffage : 3,50 kW  . - Puissance absorbée en refroidissement/chauffage : 0,44 kW/0,50 kW  . - SEER : 8,65  . - SCOP :  5,10 .  . - Efficacité nominale EER / COP Froid/chaud :  4,57 / 5,00 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 57 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg . UNITE EXTERIEURE : RXM20N9 . - Alimentation électrique Phase fréquence tension Ph/Hz/V : 1~ / 50 / 220-240 . - Puissance sonore Froid Nominal dB(A) : 59 . - Dimensions unité extérieure  H x L x P mm : 550 x 765 x 285 . - Poids unité extérieure : 32 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'SPLIT UNITE INTERIEUR 2,5 W',
            //     'selling_price' => 400,
            //     'description' => "Unité intérieure : 4210290 . - Puissance acoustique intérieur  : 55 dB (A) . - Puissance froid en kW  : 2.5 . - Puissance chaud en kW :  2.8 . - Dimensions de l'unité (LxHxP) : 698x185x250 mm  . - Classe énergétique : A++",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UI SAMSUNG CEBU 09 Ref : AR09TXFYAWKNEU',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance calorifique 7°C : 3,2 KW  . - Puissance calorifique (Min / Max) : 0.9 / 4.5 KW  . - Puissance Froid nominale : 2,5 KW  . - Puissance Froid (Min / Max) : 0.9 / 3.4 KW  . - Dimensions UI : (H x L x P) mm : 299 x 820 x 215 mm / Poids : 8.9 kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UI SAMSUNG CEBU 12 Ref : AR12TXFYAWKNEU',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance calorifique 7°C : 3,5 KW . - Puissance calorifique (Min / Max) : 0.9 / 5 KW  . - Puissance Froid nominale : 3,5 KW  . - Puissance Froid (Min / Max) : 0.9 / 4 KW  . - Dimensions UI : (H x L x P) mm : 299 x 820 x 215 mm / Poids : 8.9 kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UI SAMSUNG CEBU 18 Ref : AR18TXFYAWKNEU',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance calorifique 7°C : 6 KW  . - Puissance calorifique (Min / Max) : 1.3 / 8 KW . - Puissance Froid nominale : 5 KW  . - Puissance Froid (Min / Max) : 1.6 / 6.7 KW  . - Dimensions UI : (H x L x P) mm : 299 x 1055 x 215 mm / Poids : 12.2 kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UI SAMSUNG CEBU 24 Ref : AR24TXFYAWKNEU',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance calorifique 7°C : 7,4 KW  . - Puissance calorifique (Min / Max) : 1.2 / 9.4 KW  . - Puissance Froid nominale : 6,5 KW  . - Puissance Froid (Min / Max) : 1.4 / 7.6 KW . - Dimensions UI : (H x L x P) mm : 299 x 1055 x 215 mm / Poids : 12.2 kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE :  DAIKIN PERFERA  FTXM20N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM20N  . - Puissance Nominale en refroidissement : 2,00 kW  . - Puissance MAX en refroidissement : 2,60 kW . - Puissance MAX en chauffage : 3,50 kW  . - Puissance absorbée en refroidissement/chauffage : 0,44 kW/0,50 kW  . - SEER : 8,65  . - SCOP :  5,10 . - Efficacité nominale EER / COP Froid/chaud :  4,57 / 5,00 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 57 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA  FTXM25N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM25N  . - Puissance Nominale en refroidissement : 2,50 kW  . - Puissance MAX en refroidissement : 3,20 kW . - Puissance MAX en chauffage : 4,70 kW  . - Puissance absorbée en refroidissement/chauffage : 0,56 kW/0,56 kW  . - SEER : 8,65  . - SCOP :  5,10 . - Efficacité nominale EER / COP Froid/chaud :  4,57 / 5,00 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 57 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA  FTXM35N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM35N  . - Puissance Nominale en refroidissement : 3,50 kW  . - Puissance MAX en refroidissement : 4,00 kW . - Puissance MAX en chauffage : 5,20 kW  . - Puissance absorbée en refroidissement/chauffage : 0,8 kW/0,99 kW  . - SEER : 8,65  . - SCOP :  5,10 . - Efficacité nominale EER / COP Froid/chaud :  4,23 / 4,04 . - CLASSE énergétique saisonnière en froid/chaud :  A+++/ A+++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 58 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA  FTXM60N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM60N  . - Puissance Nominale en refroidissement : 6,00 kW  . - Puissance MAX en refroidissement : 7,00 kW . - Puissance MAX en chauffage : 8,00 kW  . - Puissance absorbée en refroidissement/chauffage : 1,77 kW/1,94 kW  . - SEER : 6,9 . - SCOP :  4,3 . - Efficacité nominale EER / COP Froid/chaud : 3,39 / 3,61 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A+ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA FTXM42N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM42N  . - Puissance Nominale en refroidissement : 4,20 kW  . - Puissance MAX en refroidissement : 5,00 kW . - Puissance MAX en chauffage : 5,20 kW  . - Puissance absorbée en refroidissement/chauffage : 0,97 kW/1,31 kW  . - SEER : 7,86 . - SCOP :  4,71 . - Efficacité nominale EER / COP Froid/chaud : 4,33 / 4,12 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm : 294 x 811 x 272  . - Poids unité intérieure : 10 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA FTXM50N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM50N  . - Puissance Nominale en refroidissement : 5,00 kW  . - Puissance MAX en refroidissement : 6,00 kW . - Puissance MAX en chauffage : 7,70 kW  . - Puissance absorbée en refroidissement/chauffage : 1,36 kW/1,45 kW  . - SEER : 7,41 . - SCOP :  4,71 . - Efficacité nominale EER / COP Froid/chaud : 3,68 / 4,00 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A++ . - Température de fonctionnement de -21°C à +50°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 58 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE : DAIKIN PERFERA FTXM71N ',
            //     'selling_price' => 1500,
            //     'description' => 'MARQUE / REFERENCE : DAIKIN PERFERA . UNITE INTERIEURE :  FTXM71N  . - Puissance Nominale en refroidissement : 7,10 kW  . - Puissance MAX en refroidissement : 8,50 kW . - Puissance MAX en chauffage : 10,20 kW  . - Puissance absorbée en refroidissement/chauffage : 2,12 kW/2,25 kW  . - SEER : 6,2 . - SCOP :  3,81 . - Efficacité nominale EER / COP Froid/chaud :  3,35 / 3,65 . - CLASSE énergétique saisonnière en froid/chaud :  A++/ A . - Température de fonctionnement de -10°C à +46°C . - Type de réfrigérant/PRP préchargé dans le compresseur R-32 / 675 gaz écologique . - Puissance sonore Froid Nominal dB(A) : 60 . - Dimensions unité intérieure H x L x P mm :  300 x 1 040 x 295 . - Poids unité intérieure : 14.5 Kg',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL : AW-HDL007-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 2.1kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 2.6kw  . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/8',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL : AW-HDLW007-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 2.1kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 2.6kw  . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/8',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDL009-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 2.6 kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 2.8 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDL012-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 3.2 kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 3.5 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDL018-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 4.6 kw  . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 5.2 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:26 dB(A) . - Dimensions ( H-L-P): 300mm-970mm-225mm . - Poids: 13 KG . - Liaisons: 1/4-',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDL024-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 6.10 kw  . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 6.45 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore: 26 dB(A) . - Dimensions ( H-L-P) : 300mm-970mm-225mm . - Poids: 13,5/16,5 . - Liaiso',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDLW009-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 2.6 kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 2.8 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDLW012-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 3.2 kw . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 3.5 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:24 dB(A) . - Dimensions ( H-L-P): 275mm-790mm-200mm . - Poids: 9 KG . - Liaisons: 1/4-3/',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDLW018-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 4.6 kw  . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 5.2 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore:26 dB(A) . - Dimensions ( H-L-P): 300mm-970mm-225mm . - Poids: 13 KG . - Liaisons: 1/4-',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => 'UNITE INTERIEURE AIRWELL AW-HDLW024-N91',
            //     'selling_price' => 1000,
            //     'description' => '- Puissance Froid Nominale 6.10 kw  . - SEER/ Classe énergétique  6.1/A++ . - Puissance Chaud Nominale 6.45 kw . - SCOOP/ Classe énergétique 5.1/A+++ . - Pression sonore: 26 dB(A) . - Dimensions ( H-L-P) : 300mm-970mm-225mm . - Poids: 13,5/16,5 . - Liaiso',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP SMART UMS 20 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 2,2  kW (1,00-2,90)  . - Puissance en mode chaud (min-max : 2,35 kW (1,10-3,00) . - Débit d'air : 600 . - Pression acoustique min/max : 20/42 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 29,2cm - L 79,2cm - P 20,1cm / 8kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP SMART UMS 25 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 2,55 KW (1,00-3,30) . - Puissance en mode chaud (min-max : 2,65 KW (1,10-3,30) . - Débit d'air : 600 . - Pression acoustique min/max : 20/42 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 29,2cm - L 79,2cm - P 20,1cm / 8kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP SMART UMS 35 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 3,60 KW (1,20-3,80) . - Puissance en mode chaud (min-max : 3,70 KW (1,00-3,80) . - Débit d'air : 600 . - Pression acoustique min/max : 20/42 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 29,2cm - L 79,2cm - P 20,1cm / 8kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP SMART UMS 50 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 5,30 KW (1,90-5,50) . - Puissance en mode chaud (min-max : 5,40 KW (1,40-5,60) . - Débit d'air : 900 . - Pression acoustique min/max : 20/46 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 31,6cm - L 94cm -P 22,4cm / 12kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP SMART UMS 70 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 7,03 KW (2,90-7,30) . - Puissance en mode chaud (min-max : 7,05 KW (2,10-8,00) . - Débit d'air : 1150 . - Pression acoustique min/max : 20/47 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 31,6cm - L 94cm -P 22,4cm / 12kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP UME 20 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 2,2  kW (1,00-2,90)  . - Puissance en mode chaud (min-max : 2,35 kW (1,10-3,00) . - Débit d'air : 650 . - Pression acoustique min/max : 20/40 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 30cm - L 80cm - P 19,8cm / 9kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP UME 25 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 2,55 KW (1,00-3,30) . - Puissance en mode chaud (min-max : 2,65 KW (1,10-3,30) . - Débit d'air : 650 . - Pression acoustique min/max : 20/41 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 30cm - L 80cm - P 19,8cm / 9kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP UME 35 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 3,60 KW (1,20-3,80) . - Puissance en mode chaud (min-max : 3,70 KW (1,00-3,80) . - Débit d'air : 650 . - Pression acoustique min/max : 20/42 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 30cm - L 80cm - P 19,8cm / 9kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP UME 50 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 5,30 KW (1,90-5,50) . - Puissance en mode chaud (min-max : 5,40 KW (1,40-5,60) . - Débit d'air : 1000 . - Pression acoustique min/max : 20/48 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 31,6cm - L 94cm - P 22,4cm / 12kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // [
            //     'designation' => "UNITÉ INTÉRIEURE CLIM'UP UME 70 DE DIETRICH",
            //     'selling_price' => 1500,
            //     'description' => "Unité intérieure : . - Puissance en mode froid (min-max) : 7,03 KW (2,90-7,30) . - Puissance en mode chaud (min-max : 7,05 KW (2,10-8,00) . - Débit d'air : 1150 . - Pression acoustique min/max : 20/49 dB . Fonctions : . - 5 modes de fonctionnement : auto, froid, chaud, déshumidification, ventilation . Fonctions supplémentaires : Nuit, Auto-nettoyant, Eco, Turbo, Anti-courant d'air froid  . Régulation : . - Télécommande infra-rouge programmable . - App Smart Clim . Dimension / Poids :  . H 33cm - L 113,2cm - P 23,2cm / 15kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 1,
            // ],
            // // comble
            // [
            //     'designation' => "Main d'ouvre d'une isolation pour comble perdu déroulé",
            //     'selling_price' => 20,
            //     'description' => "Main d'ouvre d'une isolation pour comble perdu déroulé mentionné ci-dessus dans le paragraphe :  . - Forfait fourniture d'isolant pour comble perdu déroulé . - Mise en ouvre de l'isolant conforme au DTU 45.10 . - Mise en ouvre du complexe de parement conforme au DTU 25.41",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 5,
            // ],
            // [
            //     'designation' => "Main d'ouvre d'une isolation pour comble perdu soufflé",
            //     'selling_price' => 20,
            //     'description' => "Main d'ouvre d'une isolation pour comble perdu souflé mentionné ci-dessus dans le paragraphe :  . - Forfait fourniture d'isolant pour comble perdu souflé . - Mise en ouvre de l'isolant conforme au DTU 45.10 . - Mise en ouvre du complexe de parement conforme au DTU 25.41",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 5,
            // ],
            // // Rampant
            // [
            //     'designation' => "Main d'ouvre d'une isolation pour comble aménageable",
            //     'selling_price' => 15,
            //     'description' => "Main d'ouvre d'une isolation pour comble aménageable mentionné ci-dessus dans le paragraphe :  . - Forfait fourniture d'isolant pour comble aménageable . - Mise en ouvre de l'isolant conforme au DTU 45.10 . - Mise en ouvre du complexe de parement conforme au DTU 25.41",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 6,
            // ],
            // //ITE
            // [
            //     'designation' => "MAIN D'OEUVRE ISOLATION EXTERIEUR - ITE ",
            //     'selling_price' => 55,
            //     'description' => "-Mise à disposition des ouvriers  . Mise en place de 5 chevilles par plaque d'isolant Enduit qui recouvre et protège l'isolant Gestion de l'étanchéité au niveau des jonctions Harpage, joints décalés, rebouchage au mortier des espaces entre panneaux Mise e",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 8,
            // ],
            // [
            //     'designation' => "Forfait fourniture d'isolant pour murs avec parement 120mm  Isover GR 32",
            //     'selling_price' => 50,
            //     'description' => "Fourniture de l'isolant pour l'isolation des murs en laine minérale : . Marque : Isover - Référence : GR 032 - Certification ACERMI : 02/018/100 - valide jusqu'au : 31/12/2023 . Conductivité thermique certifiée : ?D = 0.032 W/(m.K) - Résistance thermique : 3.75m².K/W . Épaisseur : 120mm - Réaction au feu : Euroclasse F - Tolérance d'épaisseur : T3 . Absorption d'eau à court terme par immersion partielle : WS - Capacité Thermique Massique : 840 J/(Kg.K) . Résistance à l'écoulement de l'air : AFr15 . Fourniture du complexe de parement comprenant :  . Rails :  Marque : Isopratic - Référence : C 48/30 - Modèle : C483 - Longueur : 3,00m - Qualité : DX51D . Galvanisé : Z140 - Epaisseur de la tôle : 0,55mm ± 0,05mm . Montant : Marque : Isopratic - Référence : M 48/35 - Modèle : M483 - Longueur : 3,00m - Qualité : DX51D - Galvanisé : Z140 . Epaisseur de la tôle : 0,60mm ± 0,05mm . Plaque de Plâtre : Marque : Isolava - Référence : 52626 - Modèle : BA13 STANDARD - Type de plaque : NF EN 520 Type A . Longueur (mm) : 2500 - Largeur (mm) : 1200 - Epaisseur (mm) : 12,5 . Résistance au feu : A2-s1, d0 - Mise en ouvre conforme au DTU 25-41.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 8,
            // ],
            // // ITI
            // [
            //     'designation' => "Main d'ouvre pour travaux isolation des murs par l'intérieur",
            //     'selling_price' => 40,
            //     'description' => "Mise en place d'une ossature métallique en acier galvanisé, d'isolant en plaque de laine de verre ISOVER GR32 REVETU KRAFT et de plaques de plâtres BA13 pour cloison de plaques de plâtre BA13. . Les travaux d'isolation comprennent : . - Le contour de fenêtre . - Les bandes de raccord . - L'enduit . - La peinture . - Aucun travaux (chauffages, prises, interrupteurs,.)",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 9,
            // ],
            // [
            //     'designation' => "Main d'ouvre pour travaux isolation des murs par l'intérieur",
            //     'selling_price' => 70,
            //     'description' => "Mise en place d'une ossature métallique en acier galvanisé, d'isolant en plaque de laine de verre et de plaques de plâtres BA13 pour cloison de plaques de plâtre BA13. . Les travaux d'isolation ne comprennent pas : . - Le contour de fenêtre . - Les bandes de raccord . - L'enduit . - La peinture . - Aucun travaux (chauffages, prises, interrupteurs,.)",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 9,
            // ],
            // // plancher bas
            // [
            //     'designation' => "FOFRAIT MAIN D'OEUVRE ISOLATION PLANCHER BAS",
            //     'selling_price' => 70,
            //     'description' => "Main d'oeuvre d'une isolation pour plancher bas mentionné ci-dessus dans le paragraphe : - Forfait fourniture d'isolant pour comble aménageable - Mise en ouvre de l'isolant conforme au DTU 45.10 - Mise en ouvre du complexe de parement conforme au DTU 25.41. . Pose isolant collé et chevillé.",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 7,
            // ],
            // // Eau
            // [
            //     'designation' => 'KIT BI-ZONE  / Réf BZKA7V3',
            //     'selling_price' => 1500,
            //     'description' => "Caractéristiques techniques BZKA7V3 . - 1 circulateur pour la zone des radiateurs classe A et Inverter . - 1 circulateur pour la zone plancher classe A Inverter . - 1 vanne mélangeuse . - 4 vannes d'arrêt . - 1 contrôleur . - 1 récepteur pour 2 thermostats d'ambiance . - 2 thermostats d'ambiance sans fil . - 1 sonde extérieure . - Longueur 480 mm / Largeur 420 mm / Hauteur 260 mm . - Poids 13.72 kg",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => "DEPOSE DE L'ANCIEN SYSTEME DE CHAUFFAGE",
            //     'selling_price' => 500,
            //     'description' => "- Dépose de l'ancienne Chaudière et mise en décharge",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 2,
            // ],
            // [
            //     'designation' => "FORFAIT POSE ET MISE EN SERVICE D'UNE POMPE A CHALEUR",
            //     'selling_price' => 3000,
            //     'description' => "- Pose et installation complète d'une pompe à chaleur air/eau  . - Forfait déplacement et mise en service comprise .  - Installation du module extérieur - Liaison hydraulique, Liaison frigorifique  . - Raccord des liaisons a l'existant - Câblage d'aliment",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 2,
            // ],
            // // Ballon thermo
            // [
            //     'designation' => 'Chauffe-eau Vitocal 060-A T0S version appoint hydraulique ',
            //     'selling_price' => 3000,
            //     'description' => "MARQUE  : VIESSMANN  Vitocal 060-A T0S version appoint hydraulique  . - Capacité du ballon d'eau Chaude sanitaire litres :  251 L  . - Puissance électrique  maxi absorbée (à 55°C)  : kW 0,75 . - Raccordement électrique tension/fréquence : 230 V Monophasé/50 Hz . - Poids : 125 Kg . - Dimensions :  Diamètre(Ø) 631 mm  / Profondeur 734 mm / Hauteur 1755 mm . - COP (en air ambiant à 15°C) : 3,5 . - Temps de chauffe (th) (en air ambiant à 15°C) : 7 h 45 . - COP pivot RT 2012  (en air extérieur)  : 3,42 . Classe d'efficacité énergétique A+ .  Selon CDC LCIE 103-15/B",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 3,
            // ],
            // [
            //     'designation' => 'CHAUFFE EAU ELECTRIQUE 200L SATE STEATITE',
            //     'selling_price' => 3000,
            //     'description' => '- Puissance : 2400 W . - Capacité (L) : 200 . - Type De Résistance : Stéatite . - Entraxe de fixation : 44 cm . - Thermostat mécanique  . - Temps de chauffe : 5h03 . - Pertes statiques (en kW / 24 heures) : 2.01 . - Résistance : stéatite . - Anode : magné',
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 3,
            // ],
            // [
            //     'designation' => "FORFAIT POSE ET MISE EN SERVICE D'UNE POMPE A CHALEUR",
            //     'selling_price' => 3000,
            //     'description' => "- Pose et installation complète d'un chauffe-eau thermodynamiques  . - Vidange et dépose du ballon existant . - Mise en place du chauffe-eau thermodynamique en lieu et place de l'ancien chauffe-eau. . - Raccordement sur eau froide et eau chaude du circuit",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 3,
            // ],
            // // VMC
            // [
            //     'designation' => "POSE ET MISE EN SERVICE D'UNE VMC SIMPLE FLUX",
            //     'selling_price' => 500,
            //     'description' => "Forfait main-d'ouvre VMC Simple Flux . 1 Caisson 1 Bouche d'extraction cuisine 1 Bouche d'extraction salle de bains 1 Bouche d'extraction WC . - Mise en place du caisson . - Perçage et carottage des murs . - Création du réseau de gaines . - Mise en place des bouches d'extraction . - Mise en place des bouches de soufflage . - Mise en service",
            //     'unit' => 0,

            //     'type' => 1,
            //     'p_work_id' => 4,
            // ],
            // // libre
            // [
            //     'designation' => 'FRAIS DE DOSSIER',
            //     'selling_price' => 1,
            //     'description' => 'frais de dossier',
            //     'unit' => 0,

            //     'type' => 1,
            // ],
            // [
            //     'designation' => 'PREVISITE TECHNIQUE',
            //     'selling_price' => 0,
            //     'unit' => 0,

            //     'type' => 1,
            // ],
            // [
            //     'designation' => 'PREVISITE TECHNIQUE',
            //     'selling_price' => 0,
            //     'unit' => 0,

            //     'type' => 1,
            // ],
            // [
            //     'designation' => 'AUTOMATISATION DES PRESTA',
            //     'selling_price' => 100,
            //     'unit' => 0,

            //     'type' => 1,
            // ],
        ];

        foreach ($array as $key => $value) {
            PArticle::create($value);
        }
    }
}
