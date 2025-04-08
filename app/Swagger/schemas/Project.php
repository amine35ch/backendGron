<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="Project",
 *     title="Projet",
 *     description="Modèle de données d'un projet",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique du projet"),
 *     @OA\Property(property="reference", type="string", example="PROJ-2023-001", description="Référence du projet"),
 *     @OA\Property(property="status", type="string", example="en_cours", description="Statut du projet"),
 *     @OA\Property(property="state", type="string", example="actif", description="État du projet"),
 *     @OA\Property(property="house_number", type="string", example="123", description="Numéro de rue"),
 *     @OA\Property(property="street", type="string", example="Rue de la Paix", description="Nom de la rue"),
 *     @OA\Property(property="zip_code", type="string", example="75000", description="Code postal"),
 *     @OA\Property(property="city", type="string", example="Paris", description="Ville"),
 *     @OA\Property(property="isolated_surface", type="number", format="float", example=120.5, description="Surface isolée en m²"),
 *     @OA\Property(property="d_client_id", type="integer", example=1, description="ID du client associé"),
 *     @OA\Property(property="d_company_id", type="integer", example=1, description="ID de l'entreprise associée"),
 *     @OA\Property(property="current_step_order", type="integer", example=2, description="Ordre de l'étape actuelle"),
 *     @OA\Property(property="phase", type="string", example="conception", description="Phase du projet"),
 *     @OA\Property(property="process_ended", type="boolean", example=false, description="Indique si le processus est terminé"),
 *     @OA\Property(property="cost_ht_simulation", type="number", format="float", example=10000, description="Coût HT de la simulation"),
 *     @OA\Property(property="cost_ttc_simulation", type="number", format="float", example=12000, description="Coût TTC de la simulation"),
 *     @OA\Property(property="work_planned_start", type="string", format="date", example="2023-05-01", description="Date de début des travaux prévue"),
 *     @OA\Property(property="work_planned_end", type="string", format="date", example="2023-06-01", description="Date de fin des travaux prévue"),
 *     @OA\Property(property="work_actual_start", type="string", format="date", example="2023-05-03", description="Date de début effective des travaux"),
 *     @OA\Property(property="work_actual_end", type="string", format="date", example="2023-06-05", description="Date de fin effective des travaux"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="client",
 *         ref="#/components/schemas/Client",
 *         description="Client associé au projet"
 *     ),
 *     @OA\Property(
 *         property="company",
 *         ref="#/components/schemas/Company",
 *         description="Entreprise associée au projet"
 *     ),
 *     @OA\Property(
 *         property="operations",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Operation"),
 *         description="Opérations associées au projet"
 *     ),
 *     @OA\Property(
 *         property="documents",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Document"),
 *         description="Documents associés au projet"
 *     ),
 * )
 */
class Project
{
} 