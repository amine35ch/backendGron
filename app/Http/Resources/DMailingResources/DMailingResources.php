<?php

namespace App\Http\Resources\DMailingResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DMailingResources extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request?->paginated) {
            return [
                'current_page' => $this->currentPage() ?: 1,
                'data' => $this->collection,
                'last_page' => $this->lastPage(),
                'links' => $this->links(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ];
        }

        return parent::toArray($request);
    }
}
