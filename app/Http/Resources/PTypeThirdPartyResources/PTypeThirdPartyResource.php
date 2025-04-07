<?php

namespace App\Http\Resources\PTypeThirdPartyResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PTypeThirdPartyResource extends JsonResource
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
