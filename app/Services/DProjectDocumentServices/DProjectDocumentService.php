<?php

namespace App\Services\DProjectDocumentServices;

use App\Enums\PDocumentEnum\PDocumentType;
use App\Models\DProjectDocument;
use App\Models\PDocument;

class DProjectDocumentService
{
    public function __construct(private DProjectDocument $dProjectDocument)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectDocument::create($data);
    }

    public function edit(array $data, DProjectDocument $dProjectDocument)
    {
        return $dProjectDocument->update($data);
    }

    public function delete(DProjectDocument $dProjectDocument): void
    {
        $dProjectDocument->viewDocuments()->delete();
        $versions=$dProjectDocument->versions;
        foreach ($versions as $version) {
           unlink(base_path('storage/app/'.$version->path));
        }
        $versions=$dProjectDocument->versions()->delete();
        $dProjectDocument->update([
            'version_count' => 0,
            'status' => 0,
        ]);
    }

    public function getById(int $id)
    {
        return $this->dProjectDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectDocument, $filters);
    }

    public function getStepStoreDocuments()
    {

        $pDocumentTypes = [
            PDocumentType::PIECE_DIDENTITE->value,
            PDocumentType::JUSTIFICATIF_DE_PROPRIETE->value,
            PDocumentType::DERNIERE_DECLARATION_FISCALE->value,
            PDocumentType::RIB_OU_IBAN->value,
            PDocumentType::FACTURE_DE_CONSOMMATION_DE_CHAUFFAGE->value,
            PDocumentType::LIVRET_DE_FAMILLE->value,
            PDocumentType::AVIS_D_IMPOSITION->value,
        ];
        $pDocuments = PDocument::whereIn('type', $pDocumentTypes)->get();
        $pDocumentArray = [];
        foreach ($pDocuments as $pDocument) {
            $company = auth()->user()->company;
            $companyDoc = $company->projectDocs()
                ->where('type_doc', $pDocument->type)
                ->first();
            $pDocumentArray[] = [
                'entitled' => $pDocument->entitled,
                'type' => $pDocument->type,
                'required' => $companyDoc->pivot->required,
                'reference' => $pDocument->reference
            ];
        }
        return $pDocumentArray;
    }

    public function updateDefaultToEachDocumentVersionDefault($className = 'DProjectDocument'): void
    {
        $classNameAll = "App\\Models\\" . $className;
        $className  = new $classNameAll();
        $documents =  $classNameAll::whereHas('versions')->get();
        foreach ($documents as $document) {
            $defaultVersion = $document->versions->last();
            $defaultVersion->default = 1;
            $defaultVersion->save();
            $document->path = $defaultVersion->path;
            $document->save();

            $versions = $document->versions;
            $count = 1;
            foreach ($versions as  $version) {
                $version->version = 'Version ' . $count;
                $version->save();
                $count++;
            }
        }
    }
}
