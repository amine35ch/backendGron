<?php

namespace App\Services\GenerateDocumentServices;

use App\Exceptions\CustomException;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GenerateDocumentService
{
    protected $skeleton;

    protected $data;

    protected $placeHolderData;

    public function __construct() {}

    public function changeDataPlaceholders(&$skeleton, $data)
    {
        $doc = new DOMDocument();
        $doc->encoding = 'UTF-8';
        foreach ($skeleton as &$block) {
            foreach ($block['fields'] as &$field) {
                if (is_string($field['data'])) {
                    @$doc->loadHTML('<?xml encoding="utf-8" ?>' . $field['data']);

                    $firstDivElements = $doc->getElementsByTagName('div');

                    foreach ($firstDivElements as $div) {
                        $spanElements = $div->getElementsByTagName('span');
                        $imgElements = $div->getElementsByTagName('img');
                        $inputs = $div->getElementsByTagName('input');

                        foreach ($data as $key => $value) {

                            foreach ($spanElements as $targetElement) {
                                if ($targetElement->getAttribute('class') == "{{$key}}") {
                                    if (
                                        $targetElement->nodeValue &&
                                        $value == $targetElement->nodeValue
                                    ) {
                                        continue;
                                    }
                                    $targetElement->nodeValue = $value;
                                }
                            }
                            if ($imgElements->length) {

                                foreach ($imgElements as $targetElement) {
                                    if ($targetElement->getAttribute('class') == "{{$key}}") {
                                        if ($value && $value == $targetElement->getAttribute('src')) {
                                            continue;
                                        }
                                        $targetElement->setAttribute('src', $value);
                                    }
                                }
                            }

                            foreach ($inputs as $input) {
                                if ($input->getAttribute('id') == "{{$key}}") {
                                    if (! $value) {
                                        $input->removeAttribute('checked');
                                    } else {

                                        $input->setAttribute('checked', $value);
                                    }
                                }
                            }
                        }
                        $field['data'] = $doc->saveHTML($div);
                    }
                }
            }
        }
    }

    public function storeDocument($pathDocument, $content)
    {
        Storage::disk('local')->put($pathDocument, $content, 'private');
    }

    public function generateJsonDocument($pathDocument, $content)
    {

        Storage::disk('local')->put($pathDocument, $content, 'private');
    }

    public function generateDocumentPDF(
        $pDocument,
        $dProject,
        $skeleton,
        $documentProject
    ) {

        $data = $this->placeHolderData;
        $this->changeDataPlaceholders($skeleton, $data);
        $pathBlade = $pDocument->blade_path;
        if (! $pathBlade) {
            throw new CustomException('Erreur inconnu.');
        }
        $pdf = PDF::loadView(
            $pathBlade,
            [
                'data' => $skeleton,
                'project' => $dProject,
                'occupants' => $dProject->projectOccupants ?? null,
                'projectDocument' => $documentProject
            ]
        );

        $pdfContent = $pdf->output();
        $version = $documentProject->version_count + 1;
        $pdfName = str_replace(' ', '-', $documentProject->name);
        $finalPath = $dProject->directory_path . '/'
            . $pdfName
            . '-' . $version
            . '.pdf';

        Storage::disk('local')->put($finalPath, $pdfContent, 'private');

        return $finalPath;
    }

    public function generateWorkDocumentPDF(
        $pDocument,
        $dProject,
        $skeleton,
        $documentProject,
        $installer,
        $invoice
    ) {

        $data = $this->placeHolderData;
        $this->changeDataPlaceholders($skeleton, $data);
        $pathBlade = $pDocument->blade_path;
        if (! $pathBlade) {
            throw new CustomException('Erreur inconnu.');
        }
        $pdf = PDF::loadView(
            $pathBlade,
            [
                'data' => $skeleton,
                'project' => $dProject,
                'occupants' => $dProject->projectOccupants ?? null,
                'installer' => $installer,
                'invoice' => $invoice,
            ]
        );

        $pdfContent = $pdf->output();
        $version = $documentProject->version_count + 1;
        $pdfName = str_replace(' ', '-', $documentProject->name);
        $finalPath = $dProject->directory_path . '/'
            . $pdfName
            . '-' . $version
            . '.pdf';

        Storage::disk('local')->put($finalPath, $pdfContent, 'private');

        return $finalPath;
    }

    public function generateGlobalWorkDocumentPDF(
        $pDocument,
        $dProject,
        $skeleton
    ) {

        $data = $this->placeHolderData;
        $this->changeDataPlaceholders($skeleton, $data);
        $pathBlade = $pDocument->blade_path;
        if (! $pathBlade) {
            throw new CustomException('Erreur inconnu.');
        }
        $pdf = PDF::loadView(
            $pathBlade,
            [
                'data' => $skeleton,
                'project' => $dProject,
                'occupants' => $dProject->projectOccupants ?? null
            ]
        );

        $pdfContent = $pdf->output();
        // $version = $documentProject->version_count + 1;
        // $pdfName = str_replace(' ', '-', $documentProject->name);
        $pdfName = str_replace(' ', '-', "Recap des traveaux entreprise");
        $finalPath = $dProject->directory_path . '/'
            . $pdfName
            . '-' . 1
            . '.pdf';

        Storage::disk('local')->put($finalPath, $pdfContent, 'private');

        return $finalPath;
    }

    public function setPlaceHolderData($data)
    {
        $this->placeHolderData = $data;
    }

    public function addArrayDataToSkeleton(
        $data,
        $typeData
    ): void {

        foreach ($this->skeleton as &$block) {
            if ($block['hasLists']) {
                foreach ($block['fields'] as &$field) {
                    if ($field['type'] === $typeData) {
                        $field['data'] = $data;
                        break;
                    }
                }
            }
        }
    }

    public function checkContentOfJsonDocument($path, $skeletonPath)
    {
        if (Storage::exists($path)) {
            $content = Storage::disk('local')->get($path);

            $skeleton = json_decode($content, true);
        } else {
            $skeleton = $this->getSkeleton($skeletonPath);
        }
        $this->showDataInPlaceholders($skeleton);

        return $skeleton;
    }

    public function getSkeleton($path): array
    {
        if (! $path) {
            throw new CustomException('Le document est non trouvé.');
        }

        return json_decode(file_get_contents(
            resource_path($path)
        ), true);
    }

    public function showDataInPlaceholders(&$skeleton)
    {

        $this->changeDataPlaceholders($skeleton, $this->placeHolderData);
    }

    public function getContentDocument($path, $wayOfShowing, $name)
    {
        $storagePath = storage_path('app/' . $path);
        ob_end_clean();

        if (Storage::disk('local')->exists($path)) {

            $contents = Storage::disk('local')->get($path);
            $contentType = mime_content_type($storagePath);

            $headers = [
                'Content-Type' => $contentType,
                'Content-Disposition' => $wayOfShowing . '; filename="' . basename($name) . '"',
            ];

            return [$contents, $headers];
        }

        return [null, null];
    }

    public function generateDocument(PDocument $pDocument, $dProject, DProjectDocument $documentProject)
    {
        $skeleton = $this->getSkeleton($pDocument->skeleton_path);
        $this->showDataInPlaceholders($skeleton);
        $this->generateJsonDocument($pDocument->skeleton_path, json_encode($skeleton));

        return $this->generateDocumentPDF(
            $pDocument,
            $dProject,
            $skeleton,
            $documentProject
        );
    }

    public function generateWorkDocument(PDocument $pDocument, $dProject, DProjectDocument $documentProject, $installer, $invoice)
    {
        $skeleton = $this->getSkeleton($pDocument->skeleton_path);
        $this->showDataInPlaceholders($skeleton);
        $this->generateJsonDocument($pDocument->skeleton_path, json_encode($skeleton));

        return $this->generateWorkDocumentPDF(
            $pDocument,
            $dProject,
            $skeleton,
            $documentProject,
            $installer,
            $invoice
        );
    }

    public function generateGlobalWorkDocument(PDocument $pDocument, $dProject)
    {
        $skeleton = $this->getSkeleton($pDocument->skeleton_path);
        $this->showDataInPlaceholders($skeleton);
        $this->generateJsonDocument($pDocument->skeleton_path, json_encode($skeleton));

        return $this->generateGlobalWorkDocumentPDF(
            $pDocument,
            $dProject,
            $skeleton
        );
    }

    public function generateFicheNavette($pathForGeneration)
    {
        $pdf = PDF::loadView(
            'Documents/fiche_navette'
        );

        $pdfContent = $pdf->output();
        $pdfName = str_replace(' ', '-', 'fiche') . '-' . uniqid() . '.pdf';

        $finalPath = $pathForGeneration . '/' . $pdfName;

        Storage::disk('local')->put($finalPath, $pdfContent, 'private');

        setLog(__(
            'logs.add_shuttle_card.description',
            [
                'document' => $pdfName,
            ]
        ));

        return [$pdfName, $finalPath];
    }
}
