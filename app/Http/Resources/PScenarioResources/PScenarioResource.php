<?php

namespace App\Http\Resources\PScenarioResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PScenarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (! $request->segment(3)) {
            return $this->collectionItems($request);
        }

        return [
            ...parent::toArray($request),
            $this->listWorks,
        ];
    }

    public function collectionItems($request)
    {
        return [
            ...parent::toArray($request),
            $this->listWorks,

        ];
    }
}
