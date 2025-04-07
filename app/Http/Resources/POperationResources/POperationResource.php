<?php

namespace App\Http\Resources\POperationResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class POperationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $user = currentUser();
        // if ($user->roles[0]->name == 'third_party' && $user->type?->type == 2) {
        //     return $this->operationEnterprise($request);
        // }
        return [
            ...parent::toArray($request),
        ];

    }
    // public function operationEnterprise($request)
    // {
    //     $dataArray = parent::toArray($request);
    //     $filteredArray = array_filter($dataArray, function($item) {
    //         return $item['intern'] == 0;
    //     });
    //     return $filteredArray;
    // }
}
