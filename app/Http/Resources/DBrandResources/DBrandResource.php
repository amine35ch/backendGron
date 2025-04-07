<?php

namespace App\Http\Resources\DBrandResources;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Services\DBrandServices\DBrandService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DBrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();

        $line = $this->lines->firstWhere('d_company_id', $user->userable_id);
        $brandService = new DBrandService();

        if ($user->profile == DCompanyProfile::MAR->value) {
            return
            [
                'id' => $this->id,
                'description' => $this->description,
                'entitled' => $this->entitled,
                'access' => $this->access,
                'is_validated' => $this->is_validated,
                'state' => $line?->state,
                'company_name' => $this->company?->trade_name,
                'can_delete' => $brandService->canDelete($user, $this),
                'can_update' => $brandService->canUpdate($user, $this),
            ];
        }
        return
            [
                'id' => $this->id,
                'description' => $this->description,
                'entitled' => $this->entitled,
                'access' => $this->access,
                'is_validated' => $this->is_validated,
                'state' => $line?->state,
                'can_delete' => $brandService->canDelete($user, $this),
                'can_update' => $brandService->canUpdate($user, $this),
            ];
    }
}
