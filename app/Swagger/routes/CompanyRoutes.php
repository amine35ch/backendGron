<?php

namespace App\Swagger\routes;

/**
 * @OA\Get(
 *     path="/web/companies",
 *     summary="Récupère la liste des entreprises",
 *     description="Retourne une liste paginée des entreprises accessibles par l'utilisateur",
 *     operationId="getCompanies",
 *     tags={"Entreprises"},
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
 *         description="Liste des entreprises",
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
 *                     @OA\Items(ref="#/components/schemas/Company")
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
 * @OA\Get(
 *     path="/web/companies/{id}",
 *     summary="Récupère les détails d'une entreprise",
 *     description="Retourne les détails d'une entreprise spécifique",
 *     operationId="getCompany",
 *     tags={"Entreprises"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID de l'entreprise",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Détails de l'entreprise",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Company")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Entreprise non trouvée"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 * 
 * @OA\Get(
 *     path="/web/companies/{company_id}/users",
 *     summary="Récupère les utilisateurs d'une entreprise",
 *     description="Retourne la liste des utilisateurs associés à une entreprise spécifique",
 *     operationId="getCompanyUsers",
 *     tags={"Entreprises"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="company_id",
 *         in="path",
 *         description="ID de l'entreprise",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Liste des utilisateurs de l'entreprise",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="result",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/User")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Entreprise non trouvée"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 */
class CompanyRoutes
{
}