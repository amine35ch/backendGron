<?php

namespace App\Services\DCompanyDocumentVersionServices;

use App\Exceptions\CustomException;
use App\Models\DCompanyDocumentVersion;
use Illuminate\Support\Facades\Storage;

class DCompanyDocumentVersionService
{
    public function __construct(private DCompanyDocumentVersion $dCompanyDocumentVersion)
    {
    }

    public function create(array $data)
    {
        return $this->dCompanyDocumentVersion::create($data);
    }

    public function edit(array $data, DCompanyDocumentVersion $dCompanyDocumentVersion)
    {
        return $dCompanyDocumentVersion->update($data);
    }

    public function delete(DCompanyDocumentVersion $dCompanyDocumentVersion): void
    {
        if ($dCompanyDocumentVersion->versions->count() == 1) {
            throw new CustomException('Vous ne pouvez pas supprimer la dernière version du document.');
        }
        $document = $dCompanyDocumentVersion->document;
        $document->version_count -= 1;

        $document->save();
        if ($dCompanyDocumentVersion->default == 1) {
            $version = $document->versions->first();
            $version->default = 1;
            $document->path = $version->path;
            $document->save();
        }
        Storage::delete('app/' . $dCompanyDocumentVersion->path);
        $dCompanyDocumentVersion->delete();
    }



    public function setDefaultVersion(DCompanyDocumentVersion $dCompanyDocumentVersion): void
    {
        $dCompanyDocumentVersion->document->versions->each(function ($version) {
            $version->default = 0;
            $version->save();
        });
        $dCompanyDocumentVersion->default = 1;
        $dCompanyDocumentVersion->save();
        $document = $dCompanyDocumentVersion->document;
        $document->path = $dCompanyDocumentVersion->path;
        $document->save();
    }

    public function getById(int $id)
    {
        return $this->dCompanyDocumentVersion::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dCompanyDocumentVersion, $filters);
    }

    public function downloadDocument($path, $wayOfShowing, $name)
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
}
