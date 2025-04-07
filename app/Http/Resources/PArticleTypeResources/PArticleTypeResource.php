<?php

namespace App\Http\Resources\PArticleTypeResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PArticleTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
