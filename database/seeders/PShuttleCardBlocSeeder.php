<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PShuttleCardBlocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p_shuttle_card_blocs = [
          ['id' => '1', 'p_form_id' => '3', 'type' => '0', 'title' => 'INFORMATIONS GÉNÉRALES', 'order' => '1', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '2', 'p_form_id' => '3', 'type' => '1', 'title' => 'DOCUMENTS ADMINISTRATIFS A RECUPERER', 'order' => '2', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '0', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '3', 'p_form_id' => '3', 'type' => '2', 'title' => 'GÉNÉRALITÉ DU SITE', 'order' => '3', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '4', 'p_form_id' => '3', 'type' => '3', 'title' => 'CARACTERISTIQUES DU CHAUFFAGE', 'order' => '4', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '5', 'p_form_id' => '3', 'type' => '4', 'title' => 'CONSOMMATION ENERGETIQUE', 'order' => '5', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '6', 'p_form_id' => '3', 'type' => '5', 'title' => 'CARACTERISTIQUES EAU CHAUDE SANITAIRE', 'order' => '6', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '7', 'p_form_id' => '3', 'type' => '6', 'title' => 'CARACTERISTIQUES DE VENTILATION', 'order' => '7', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '8', 'p_form_id' => '3', 'type' => '7', 'title' => 'CARACTERISTIQUES DES PLAFONDS HAUT', 'order' => '8', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '9', 'p_form_id' => '3', 'type' => '8', 'title' => 'CARACTERISTIQUES DES PLANCHERS BAS', 'order' => '9', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '10', 'p_form_id' => '3', 'type' => '9', 'title' => 'CARACTERISTIQUES DES FACADES', 'order' => '10', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '11', 'p_form_id' => '3', 'type' => '10', 'title' => 'CROQUIS DES FACADES ', 'order' => '11', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '12', 'p_form_id' => '3', 'type' => '11', 'title' => 'CARACTERISTIQUES DES FACADES: Mur 2', 'order' => '12', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '0', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '13', 'p_form_id' => '3', 'type' => '12', 'title' => 'CARACTERISTIQUES DES FACADES: Mur 3', 'order' => '13', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '0', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '14', 'p_form_id' => '3', 'type' => '18', 'title' => 'CARACTERISTIQUES DES FACADES: Mur 4', 'order' => '14', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '0', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '15', 'p_form_id' => '3', 'type' => '13', 'title' => 'CARACTERISTIQUES DES FENETRES/ VOLETS/PORTES FENETRES/PORTES ET VELUX', 'order' => '13', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '16', 'p_form_id' => '3', 'type' => '14', 'title' => 'FORME GENERALE DU BATIMENT', 'order' => '12', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '1', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '17', 'p_form_id' => '3', 'type' => '15', 'title' => 'ACCESSIBILITÉ TECHNIQUE PAC ET BALLON', 'order' => '17', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '18', 'p_form_id' => '3', 'type' => '16', 'title' => 'ACCESSIBILITÉ TECHNIQUE BALLON', 'order' => '18', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '0', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
          ['id' => '19', 'p_form_id' => '3', 'type' => '17', 'title' => 'TRAVAUX SOUHAITÉS', 'order' => '19', 'left_width' => '0%', 'center_width' => '100%', 'right_width' => '0%', 'page_break_before' => '0', 'page_break_after' => '0', 'required' => '1', 'active' => '1', 'style_title' => '', 'class' => 'title', 'created_at' => null, 'updated_at' => null],
        ];
        DB::table('p_shuttle_card_blocs')->insert($p_shuttle_card_blocs);
    }
}
