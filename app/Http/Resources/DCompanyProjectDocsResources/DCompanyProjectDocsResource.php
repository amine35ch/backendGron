<?php

namespace App\Http\Resources\DCompanyProjectDocsResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DCompanyProjectDocsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "type_doc" => $this->type_doc,
            "entitled" => $this->pDocument->entitled ?? '',
            "required" => $this->required,
            "signature" =>  $this->signature,
        ];
    }
}
