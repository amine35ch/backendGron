<?php

namespace App\Swagger\routes;

/**
 * @OA\Get(
 *     path="/web/users/profile",
 *     summary="Récupère le profil de l'utilisateur connecté",
 *     description="Retourne les informations du profil de l'utilisateur actuellement authentifié",
 *     operationId="getUserProfile",
 *     tags={"Utilisateurs"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Profil de l'utilisateur",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/User")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 * 
 * @OA\Put(
 *     path="/web/users/profile",
 *     summary="Met à jour le profil de l'utilisateur connecté",
 *     description="Modifie les informations du profil de l'utilisateur actuellement authentifié",
 *     operationId="updateUserProfile",
 *     tags={"Utilisateurs"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="first_name", type="string", example="Jean"),
 *             @OA\Property(property="last_name", type="string", example="Dupont"),
 *             @OA\Property(property="email", type="string", format="email", example="jean.dupont@example.com"),
 *             @OA\Property(property="phone", type="string", example="0123456789")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Profil mis à jour",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/User")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 * 
 * @OA\Put(
 *     path="/web/users/password",
 *     summary="Change le mot de passe de l'utilisateur connecté",
 *     description="Modifie le mot de passe de l'utilisateur actuellement authentifié",
 *     operationId="changeUserPassword",
 *     tags={"Utilisateurs"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             required={"current_password", "password", "password_confirmation"},
 *             @OA\Property(property="current_password", type="string", format="password", example="password_actuel"),
 *             @OA\Property(property="password", type="string", format="password", example="nouveau_password"),
 *             @OA\Property(property="password_confirmation", type="string", format="password", example="nouveau_password")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Mot de passe modifié",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="message", type="string", example="Mot de passe modifié avec succès")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 */
class UserRoutes
{
} 