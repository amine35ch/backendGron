<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="User",
 *     title="Utilisateur",
 *     description="Modèle de données d'un utilisateur",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique de l'utilisateur"),
 *     @OA\Property(property="username", type="string", example="jdupont", description="Nom d'utilisateur"),
 *     @OA\Property(property="email", type="string", format="email", example="jean.dupont@example.com", description="Adresse email"),
 *     @OA\Property(property="first_name", type="string", example="Jean", description="Prénom"),
 *     @OA\Property(property="last_name", type="string", example="Dupont", description="Nom"),
 *     @OA\Property(property="phone", type="string", example="0123456789", description="Numéro de téléphone"),
 *     @OA\Property(property="company_code", type="string", example="GRON", description="Code de l'entreprise"),
 *     @OA\Property(property="d_company_id", type="integer", example=1, description="ID de l'entreprise associée"),
 *     @OA\Property(property="is_active", type="boolean", example=true, description="Indique si le compte est actif"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="company",
 *         ref="#/components/schemas/Company",
 *         description="Entreprise associée à l'utilisateur"
 *     ),
 *     @OA\Property(
 *         property="roles",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1, description="ID du rôle"),
 *             @OA\Property(property="name", type="string", example="admin", description="Nom du rôle"),
 *         ),
 *         description="Rôles de l'utilisateur"
 *     ),
 *     @OA\Property(
 *         property="permissions",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1, description="ID de la permission"),
 *             @OA\Property(property="name", type="string", example="create-project", description="Nom de la permission"),
 *         ),
 *         description="Permissions de l'utilisateur"
 *     ),
 * )
 */
class User
{
} 