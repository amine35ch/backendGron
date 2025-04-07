<?php

namespace App\Http\Resources\UserResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this;
        $company = $user->company;

        return [
            'id' => $user->id,
            'username' => $user->username,
            'phone_number' => $user->phone_number,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'address' => $user->address,
            'city' => $user->city,
            'zip_code' => $user->zip_code,
            'profile' => $user->profile,
            'state' => $user->state,
            'company_code' => $user->company_code,
            'company' => [
                'id' => $company?->id,
                'trade_name' => $company?->trade_name,
                'profile' => $company?->profile,
            ],
            'role' => data_get($user->getRoleNames(), 0),
            'permissions' => $user->permissionList,
        ];
    }
}
