<?php

namespace App\Http\Resources\DWorkResources;

use App\Services\DWorkServices\DWorkService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DWorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $unit = $this->unitData;
        $workService = new DWorkService();
        $user = auth()->user();

        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'display_name' => $this->display_name,
            'unit_data' => $unit ? [
                'entitled' => $unit->entitled,
                'type' => $unit->type,
            ] : null,
            'pricing_list' => $this->pricing_list,
            'd_company_id' => $this->d_company_id,
            'access' => $this->access,
            'state' => $this->state,
            'mar_id' => $this->mar_id,
            'unit' => $this->unit,
            'qualification'=>$this->qualification,
            'can_delete' => $workService->canDelete($user, $this),
            'can_update' => $workService->canUpdate($user, $this),
        ];
    }
}
