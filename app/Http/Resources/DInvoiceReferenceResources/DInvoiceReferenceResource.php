<?php

namespace App\Http\Resources\DInvoiceReferenceResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DInvoiceReferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'prefix' => $this->prefix,
            'current_count' => $this->current_count,
            'format' => $this->format,
            'type' => $this->type,
        ];
    }
}
