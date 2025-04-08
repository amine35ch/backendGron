<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="Client",
 *     title="Client",
 *     description="Modèle de données d'un client",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique du client"),
 *     @OA\Property(property="type_client_id", type="integer", example=1, description="Type de client"),
 *     @OA\Property(property="first_name", type="string", example="Jean", description="Prénom"),
 *     @OA\Property(property="last_name", type="string", example="Dupont", description="Nom"),
 *     @OA\Property(property="email", type="string", format="email", example="jean.dupont@example.com", description="Adresse email"),
 *     @OA\Property(property="phone", type="string", example="0123456789", description="Numéro de téléphone"),
 *     @OA\Property(property="gender", type="string", example="M", description="Genre"),
 *     @OA\Property(property="occupation", type="string", example="Cadre", description="Profession"),
 *     @OA\Property(property="birthday", type="string", format="date", example="1980-01-01", description="Date de naissance"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="projects",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Project"),
 *         description="Projets associés au client"
 *     ),
 * )
 */
class Client
{
} 