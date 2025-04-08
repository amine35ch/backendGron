<?php

namespace App\Swagger;

/**
 * @OA\PathItem(
 *     path="/web/projects"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/projects/{dProject}"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/login"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/clients"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/users/profile"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/companies"
 * )
 * 
 * @OA\PathItem(
 *     path="/web/documents"
 * )
 * 
 * @OA\PathItem(
 *     path="/api/login"
 * )
 * 
 * @OA\Get(
 *     path="/api/docs/example",
 *     summary="Exemple d'endpoint pour la documentation",
 *     tags={"Documentation"},
 *     @OA\Response(
 *         response=200,
 *         description="Exemple de réponse",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="message", type="string", example="Ceci est un exemple d'API")
 *         )
 *     )
 * )
 */
class Routes
{
    // Cette classe sert uniquement à documenter les routes API
} 