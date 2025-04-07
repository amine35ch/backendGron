<?php

namespace App\Http\Controllers;

use App\Services\GenerateDocumentServices\GenerateDocumentService;

class GenerateDocumentController extends Controller
{
    private $GenerateDocumentService;

    public function __construct(
        GenerateDocumentService $GenerateDocumentService,
    ) {
        $this->GenerateDocumentService = $GenerateDocumentService;
    }
}
