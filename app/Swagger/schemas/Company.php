<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="Company",
 *     title="Entreprise",
 *     description="Modèle de données d'une entreprise",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique de l'entreprise"),
 *     @OA\Property(property="name", type="string", example="GRON SAS", description="Nom de l'entreprise"),
 *     @OA\Property(property="siret", type="string", example="12345678901234", description="Numéro SIRET"),
 *     @OA\Property(property="siren", type="string", example="123456789", description="Numéro SIREN"),
 *     @OA\Property(property="rib", type="string", example="FR76XXXXXXXXXXXXX", description="RIB bancaire"),
 *     @OA\Property(property="company_code", type="string", example="GRON", description="Code de l'entreprise"),
 *     @OA\Property(property="email", type="string", format="email", example="contact@gron.fr", description="Email de contact"),
 *     @OA\Property(property="phone", type="string", example="0123456789", description="Téléphone de contact"),
 *     @OA\Property(property="address", type="string", example="123 Rue de Paris", description="Adresse"),
 *     @OA\Property(property="zip_code", type="string", example="75000", description="Code postal"),
 *     @OA\Property(property="city", type="string", example="Paris", description="Ville"),
 *     @OA\Property(property="website", type="string", example="https://www.gron.fr", description="Site web"),
 *     @OA\Property(property="logo", type="string", example="logos/gron.png", description="Chemin du logo"),
 *     @OA\Property(property="profile", type="string", example="MAR", description="Profil de l'entreprise"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="projects",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Project"),
 *         description="Projets associés à l'entreprise"
 *     ),
 *     @OA\Property(
 *         property="users",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/User"),
 *         description="Utilisateurs de l'entreprise"
 *     ),
 * )
 */
class Company
{
} 