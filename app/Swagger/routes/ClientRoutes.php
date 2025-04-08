<?php

namespace App\Swagger\routes;

/**
 * @OA\Get(
 *     path="/web/clients",
 *     summary="Récupère la liste des clients",
 *     description="Retourne une liste paginée des clients accessibles par l'utilisateur",
 *     operationId="getClients",
 *     tags={"Clients"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Numéro de page",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Nombre d'éléments par page",
 *         required=false,
 *         @OA\Schema(type="integer", default=10)
 *     ),
 *     @OA\Parameter(
 *         name="sort_by",
 *         in="query",
 *         description="Champ de tri",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="sort_order",
 *         in="query",
 *         description="Ordre de tri (asc, desc)",
 *         required=false,
 *         @OA\Schema(type="string", enum={"asc", "desc"}, default="desc")
 *     ),
 *     @OA\Parameter(
 *         name="filters",
 *         in="query",
 *         description="Filtres au format JSON",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Liste des clients",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="result",
 *                 type="object",
 *                 @OA\Property(property="current_page", type="integer", example=1),
 *                 @OA\Property(property="total", type="integer", example=50),
 *                 @OA\Property(property="per_page", type="integer", example=10),
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/Client")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 * 
 * @OA\Post(
 *     path="/web/clients",
 *     summary="Crée un nouveau client",
 *     description="Crée un nouveau client avec les données fournies",
 *     operationId="createClient",
 *     tags={"Clients"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             required={"first_name", "last_name", "email", "phone"},
 *             @OA\Property(property="first_name", type="string", example="Jean"),
 *             @OA\Property(property="last_name", type="string", example="Dupont"),
 *             @OA\Property(property="email", type="string", format="email", example="jean.dupont@example.com"),
 *             @OA\Property(property="phone", type="string", example="0123456789"),
 *             @OA\Property(property="type_client_id", type="integer", example=1),
 *             @OA\Property(property="gender", type="string", example="M"),
 *             @OA\Property(property="occupation", type="string", example="Cadre"),
 *             @OA\Property(property="birthday", type="string", format="date", example="1980-01-01")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Client créé",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Client")
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
 * @OA\Get(
 *     path="/web/clients/{id}",
 *     summary="Récupère les détails d'un client",
 *     description="Retourne les détails d'un client spécifique",
 *     operationId="getClient",
 *     tags={"Clients"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID du client",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Détails du client",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Client")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client non trouvé"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 */
class ClientRoutes
{
} 