<?php

namespace App\Http\Resources\DSubContractorResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DSubContractorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();
        if ($user->roles[0]->name == 'admin') {
            return [
                'id' => $this->id,
                'trade_name' => $this->trade_name,
                'third_party' => $this->thirdParty->name,
            ];
        }

        return parent::toArray($request);
    }
}
