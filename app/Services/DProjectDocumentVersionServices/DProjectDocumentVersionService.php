<?php

namespace App\Services\DProjectDocumentVersionServices;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Exceptions\CustomException;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Services\DProjectDocumentServices\DProjectDocumentService;
use Illuminate\Support\Facades\Storage;

class DProjectDocumentVersionService
{
    public function __construct(private DProjectDocumentVersion $dProjectDocumentVersion)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectDocumentVersion::create($data);
    }

    public function edit(array $data, DProjectDocumentVersion $dProjectDocumentVersion)
    {
        return $dProjectDocumentVersion->update($data);
    }

    public function delete(DProjectDocumentVersion $dProjectDocumentVersion): void
    {
      
        $document = $dProjectDocumentVersion->document;
        $document->version_count -= 1;
        if ($dProjectDocumentVersion->document->version_count == 0) {
            $document->status = DProjectDocumentStatus::NEW->value;
        }
        $document->save();
        if ($dProjectDocumentVersion->default == 1) {
            $version = $document->versions->first();
            $version->default = 1;
            $document->path = $version->path;
            $document->save();
        }
        Storage::delete('app/' . $dProjectDocumentVersion->path);
        $dProjectDocumentVersion->delete();
        if ($dProjectDocumentVersion->document->version_count == 0) {
            $document->status = DProjectDocumentStatus::NEW->value;
        }
    }



    public function setDefaultVersion(DProjectDocumentVersion $dProjectDocumentVersion): void
    {
        $dProjectDocumentVersion->document->versions->each(function ($version) {
            $version->default = 0;
            $version->save();
        });
        $dProjectDocumentVersion->default = 1;
        $dProjectDocumentVersion->save();
        $document = $dProjectDocumentVersion->document;
        $document->path = $dProjectDocumentVersion->path;
        $document->save();
    }

    public function getById(int $id)
    {
        return $this->dProjectDocumentVersion::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectDocumentVersion, $filters);
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
