<?php

namespace App\Http\Resources\DClientResources;

use App\Enums\DCompanyEnum\DCompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();

        if (!$request->segment(3)) {
            return $this->collectionItems($user);
        }
        $this->projects->map(function ($project) {
            return $project->typeDemandeProject ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->projectEnergyClass ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->projectIncomeClass ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->ProjectResidence ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->natureResidence ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->workType ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->skipClass ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->company ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->installer ?? null;
        });
        $this->projects->map(function ($project) {
            return $project->auditor ?? null;
        });

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'reference' => $this->reference,
            'position' => $this->position,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'signature' => $this->signature,
            'phone_number_1' => $this->phone_number_1,
            'phone_number_2' => $this->phone_number_2,
            'email_contact' => $this->email_contact,
            'representative' => $this->representative,
            'state' => $this->state,
            'year_of_birth' => $this->year_of_birth,
            'number_unborn_children' => $this->number_unborn_children,
            'building' => $this->building,
            'stairs' => $this->stairs,
            'floor' => $this->floor,
            'door' => $this->door,
            'commune' => $this->commune,
            'can_delete' =>$user? $this->canDelete($user):false,
            'can_update' =>$user? $this->canUpdate($user):false,
            'projects' => $this->whenLoaded('projects'),
            'documents' => $this->documents,
            'created_at' => $this->created_at,
            'rib' => $this->rib,
            'iban' => $this->iban,
            'representative_contact' => $this->representative_contact,
            'climatic_zone' => $this->climatic_zone,
            'email_anah' => $this->email_anah,
            'password_anah' => $this->password_anah,
            'gender' => $this->gender,
            'download_signature' => $this->download_signature,
            'type' => $this->type
        ];
    }

    public function canDelete($user)
    {
        $himself = $user->userable_id == $this->d_company_id ||
            $user->profile == DCompanyProfile::MAR->value;
        $emptyProjects = $this->projects->isEmpty();

        return $himself && $emptyProjects;
    }

    public function canUpdate($user)
    {
        return $user->userable_id == $this->d_company_id ||
            $user->profile == DCompanyProfile::MAR->value;
    }

    public function collectionItems($user)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'reference' => $this->reference,
            'position' => $this->position,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'representative_contact' => $this->representative_contact,
            'signature' => $this->signature,
            'phone_number_1' => $this->phone_number_1,
            'phone_number_2' => $this->phone_number_2,
            'email_contact' => $this->email_contact,
            'representative' => $this->representative,
            'state' => $this->state,
            'year_of_birth' => $this->year_of_birth,
            'number_unborn_children' => $this->number_unborn_children,
            'building' => $this->building,
            'email_anah' => $this->email_anah,
            'password_anah' => $this->password_anah,
            'stairs' => $this->stairs,
            'floor' => $this->floor,
            'door' => $this->door,
            'can_delete' => $user ? $this->canDelete($user) : false,
            'can_update' => $user ? $this->canUpdate($user) : false,
            'commune' => $this->commune,
            'download_signature' => $this->download_signature
        ];
    }
}
