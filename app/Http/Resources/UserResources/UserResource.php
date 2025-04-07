<?php

namespace App\Http\Resources\UserResources;

use App\Enums\DCompanyEnum\DCompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        $supervisor = $user->supervisor->supervisor_id ?? null;
        return [
            'id' => $user->id,
            'username' => $user->username,
            'phone_number' => $user->phone_number,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'full_name' => $user->full_name,
            'display_name' => 'Utilisateur',
            'address' => $user->address,
            'city' => $user->city,
            'zip_code' => $user->zip_code,
            'role' => [
                'display_name' => $user->display_role_name,
                'name' => $user->role
            ],
            'profile' => $user->profile,
            'state' => $user->state,
            'auth' => $user->auth,
            'company' => [
                'id' => $company->id,
                'trade_name' => $company->trade_name,
                'profile' => $company->profile,
            ],
            'can_delete' => $this->canDelete($user),
            'can_update' => $this->canUpdate($user),
            'supervisor_id' => $supervisor
        ];
    }

    public function canDelete($user)
    {
        $authUser = auth()->user();

        $hasThings = $user->projectHistories->isEmpty() && $user->visits->isEmpty();
        $sameUser = $user->id == $authUser->id;
        $isMar = $user->profile == DCompanyProfile::MAR->value;
        $isAdmin = $authUser->role == $user->profile . '::admin';

        return $hasThings && $sameUser || $isAdmin || $isMar;
    }

    public function canUpdate($user)
    {
        $authUser = auth()->user();
        $sameUser = $user->id == $authUser->id;
        $isMar = $user->profile == DCompanyProfile::MAR->value;
        $isAdmin = $user->profile . '::admin';
        return $sameUser || $isAdmin || $isMar;
    }
}
