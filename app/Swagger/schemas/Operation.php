<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="Operation",
 *     title="Opération",
 *     description="Modèle de données d'une opération dans un projet",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique de l'opération"),
 *     @OA\Property(property="d_project_id", type="integer", example=1, description="ID du projet associé"),
 *     @OA\Property(property="p_operation_id", type="integer", example=1, description="ID du type d'opération"),
 *     @OA\Property(property="order", type="integer", example=1, description="Ordre de l'opération dans le projet"),
 *     @OA\Property(property="status", type="string", example="en_cours", description="Statut de l'opération"),
 *     @OA\Property(property="start_date", type="string", format="date", example="2023-05-01", description="Date de début"),
 *     @OA\Property(property="end_date", type="string", format="date", example="2023-05-15", description="Date de fin"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="project",
 *         ref="#/components/schemas/Project",
 *         description="Projet associé à l'opération"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         description="Type d'opération",
 *         @OA\Property(property="id", type="integer", example=1, description="ID du type d'opération"),
 *         @OA\Property(property="name", type="string", example="Audit", description="Nom du type d'opération"),
 *         @OA\Property(property="description", type="string", example="Réalisation d'un audit énergétique", description="Description du type d'opération"),
 *     ),
 *     @OA\Property(
 *         property="documents",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Document"),
 *         description="Documents associés à l'opération"
 *     ),
 * )
 */
class Operation
{
} 