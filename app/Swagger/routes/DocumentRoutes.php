<?php

namespace App\Swagger\routes;

/**
 * @OA\Get(
 *     path="/web/projects/{project_id}/documents",
 *     summary="Récupère les documents d'un projet",
 *     description="Retourne la liste des documents associés à un projet spécifique",
 *     operationId="getProjectDocuments",
 *     tags={"Documents"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="project_id",
 *         in="path",
 *         description="ID du projet",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Liste des documents du projet",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="result",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Document")
 *             )
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
 * 
 * @OA\Post(
 *     path="/web/projects/{project_id}/documents/attach",
 *     summary="Attache un document à un projet",
 *     description="Télécharge et attache un document à un projet spécifique",
 *     operationId="attachDocumentToProject",
 *     tags={"Documents"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="project_id",
 *         in="path",
 *         description="ID du projet",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="document",
 *                     type="file",
 *                     description="Document à télécharger"
 *                 ),
 *                 @OA\Property(
 *                     property="p_document_id",
 *                     type="integer",
 *                     description="ID du type de document"
 *                 ),
 *                 @OA\Property(
 *                     property="reference",
 *                     type="string",
 *                     description="Référence du document"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Document attaché avec succès",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="result", ref="#/components/schemas/Document")
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
 *     path="/web/setting/documents",
 *     summary="Récupère les types de documents disponibles",
 *     description="Retourne la liste des types de documents configurés dans le système",
 *     operationId="getDocumentTypes",
 *     tags={"Documents"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Liste des types de documents",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="result",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Attestation"),
 *                     @OA\Property(property="description", type="string", example="Attestation de fin de travaux"),
 *                     @OA\Property(property="is_required", type="boolean", example=true),
 *                     @OA\Property(property="is_signable", type="boolean", example=true)
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     )
 * )
 */
class DocumentRoutes
{
} 