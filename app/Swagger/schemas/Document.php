<?php

namespace App\Swagger\schemas;

/**
 * @OA\Schema(
 *     schema="Document",
 *     title="Document",
 *     description="Modèle de données d'un document",
 *     @OA\Property(property="id", type="integer", example=1, description="Identifiant unique du document"),
 *     @OA\Property(property="d_project_id", type="integer", example=1, description="ID du projet associé"),
 *     @OA\Property(property="p_document_id", type="integer", example=1, description="ID du type de document"),
 *     @OA\Property(property="file_path", type="string", example="projects/1/documents/attestation.pdf", description="Chemin du fichier"),
 *     @OA\Property(property="file_name", type="string", example="attestation.pdf", description="Nom du fichier"),
 *     @OA\Property(property="file_type", type="string", example="application/pdf", description="Type MIME du fichier"),
 *     @OA\Property(property="file_size", type="integer", example=124578, description="Taille du fichier en octets"),
 *     @OA\Property(property="status", type="string", example="validated", description="Statut du document"),
 *     @OA\Property(property="is_signed", type="boolean", example=true, description="Indique si le document est signé"),
 *     @OA\Property(property="reference", type="string", example="DOC-2023-001", description="Référence du document"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00Z", description="Date de création"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-15T12:00:00Z", description="Date de mise à jour"),
 *     @OA\Property(
 *         property="project",
 *         ref="#/components/schemas/Project",
 *         description="Projet associé au document"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         description="Type de document",
 *         @OA\Property(property="id", type="integer", example=1, description="ID du type de document"),
 *         @OA\Property(property="name", type="string", example="Attestation", description="Nom du type de document"),
 *         @OA\Property(property="description", type="string", example="Attestation de fin de travaux", description="Description du type de document"),
 *     ),
 * )
 */
class Document
{
} 