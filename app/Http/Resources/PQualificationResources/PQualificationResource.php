<?php

namespace App\Http\Resources\PQualificationResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PQualificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'entitled'=>$this->entitled,
            'operations'=>$this->operations
        ];
    }
}
