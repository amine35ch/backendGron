<?php

namespace App\Swagger\routes;

/**
 * @OA\Get(
 *     path="/web/projects",
 *     summary="Récupère la liste des projets",
 *     description="Retourne une liste paginée des projets accessibles par l'utilisateur",
 *     operationId="getProjects",
 *     tags={"Projets"},
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
 *         description="Liste des projets",
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
 *                     @OA\Items(ref="#/components/schemas/Project")
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
 *     path="/web/projects",
 *     summary="Crée un nouveau projet",
 *     description="Crée un nouveau projet avec les données fournies",
 *     operationId="createProject",
 *     tags={"Projets"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             required={"reference", "d_client_id", "house_number", "street", "zip_code", "city"},
 *             @OA\Property(property="reference", type="string", example="PROJ-2023-001"),
 *             @OA\Property(property="d_client_id", type="integer", example=1),
 *             @OA\Property(property="d_company_id", type="integer", example=1),
 *             @OA\Property(property="house_number", type="string", example="123"),
 *             @OA\Property(property="street", type="string", example="Rue de la Paix"),
 *             @OA\Property(property="zip_code", type="string", example="75000"),
 *             @OA\Property(property="city", type="string", example="Paris"),
 *             @OA\Property(property="status", type="string", example="en_cours"),
 *             @OA\Property(property="state", type="string", example="actif")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Projet créé",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Project")
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
 *     path="/web/projects/{id}",
 *     summary="Récupère les détails d'un projet",
 *     description="Retourne les détails d'un projet spécifique",
 *     operationId="getProject",
 *     tags={"Projets"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID du projet",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Détails du projet",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Project")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Projet non trouvé"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 */
class ProjectRoutes
{
} 