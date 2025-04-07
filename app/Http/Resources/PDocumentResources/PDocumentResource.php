<?php

namespace App\Http\Resources\PDocumentResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // i want to check if route is 'setting/documents' to return diffrent response
        if ($request->segment(2) === 'setting' && $request->segment(3) === 'documents') {
            return [
                'id' => $this->id,
                'entitled' => $this->entitled,
                'type' => $this->type,
            ];
        }
        return [
            'id' => $this->id,
            'entitled' => $this->entitled,
            'type' => $this->typeDocument,
        ];
    }
}
