<?php

namespace App\Services\DClientDocumentVersionServices;

use App\Exceptions\CustomException;
use App\Models\DClientDocumentVersion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DClientDocumentVersionService
{
    public function __construct(private DClientDocumentVersion $dClientDocumentVersion)
    {
    }

    public function create(array $data)
    {
        return $this->dClientDocumentVersion::create($data);
    }

    public function edit(array $data, DClientDocumentVersion $dClientDocumentVersion)
    {
        return $dClientDocumentVersion->update($data);
    }



    public function getById(int $id)
    {
        return $this->dClientDocumentVersion::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dClientDocumentVersion, $filters);
    }

    public function delete(DClientDocumentVersion $dClientDocumentVersion): void
    {
        if ($dClientDocumentVersion->document->versions->count() == 1) {
            throw new CustomException('Vous ne pouvez pas supprimer la dernière version du document.');
        }
        $document = $dClientDocumentVersion->document;
        $document->version_count -= 1;
        $document->save();
        if ($dClientDocumentVersion->default == 1) {
            $version = $document->versions->first();
            $version->default = 1;
            $document->path = $version->path;
            $document->save();
        }
        Storage::delete('app/' . $dClientDocumentVersion->path);
        $dClientDocumentVersion->delete();
    }



    public function setDefaultVersion(DClientDocumentVersion $dClientDocumentVersion): void
    {
        $dClientDocumentVersion->document->versions->each(function ($version) {
            $version->default = 0;
            $version->save();
        });
        $dClientDocumentVersion->default = 1;
        $dClientDocumentVersion->save();
        $document = $dClientDocumentVersion->document;
        $document->path = $dClientDocumentVersion->path;
        $document->save();
    }
}
