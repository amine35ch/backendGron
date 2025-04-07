<?php

namespace App\Http\Resources\PRoleResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PRoleResource extends JsonResource
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
            'display_name' => $this->display_name,
            'name' => $this->name,
        ];
    }
}
