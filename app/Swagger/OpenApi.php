<?php

namespace App\Swagger;

/**
 * @OA\OpenApi(
 *     openapi="3.0.0"
 * )
 * 
 * @OA\Info(
 *     title="API GRON",
 *     version="1.0.0",
 *     description="Documentation de l'API backend du projet GRON",
 *     @OA\Contact(
 *         email="support@gron.fr",
 *         name="Support GRON"
 *     )
 * )
 * 
 * @OA\Server(
 *     url="/api",
 *     description="Serveur API principal"
 * )
 * 
 * @OA\Server(
 *     url="/web",
 *     description="Serveur API secondaire"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Utilisez votre token JWT (Bearer <token>)"
 * )
 * 
 * @OA\Components(
 *     @OA\Schema(
 *         schema="Error",
 *         required={"message"},
 *         @OA\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class OpenApi
{
    // Cette classe sert uniquement à documenter l'API
} 