<?php

namespace App\Http\Resources\DProjectVisitResources;

use App\Models\PState;
use Illuminate\Http\Resources\Json\JsonResource;

class DProjectVisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        if (! $request->segment(3)) {
            return $this->collectionItems($request);
        }
        $user = $this->user;
        $company = $this->company;
        $project = $this->project;
        $state=PState::where('model','DProjectVisit')->where('state',$this->state)->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'visit_date' => $this->visit_date,
            'state' => $this->state,
            'type' => $this->typeVisit,
            'state_color'=>$state->color,

            'user' => $user ? [
                'id'=>$user?->id,
                'username' => $user?->username,
                'first_name' => $user?->first_name,
                'last_name' => $user?->last_name,
                'profile' => $user?->profile,
            ] : null,
            'd_company_id' => $company?->id ?? null,
            'project' => $project ? [
                'id' => $project->id,
                'reference' => $project->reference,
            ] : null,

            // 'users' => $this->users->map(function ($user) {
            //     return [
            //         'user_model'=> $user->userable_type,
            //         'user_id' => $user->userable->id,
            //         'username' => $user->userable->name,
            //     ];
            // }),
        ];
    }

    public function collectionItems($request)
    {
        $client = $this->project->client;
        $user = $this->user;
        $company = $this->company;

        $state=PState::where('model','DProjectVisit')->where('state',$this->state)->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'visit_date' => $this->visit_date,
            'state' => $this->state,
            'state_color'=>$state->color,
            'type' => $this->typeVisit,
            'user' => $user ? [
                'id'=>$user?->id,
                'username' => $user?->username,
                'first_name' => $user?->first_name,
                'last_name' => $user?->last_name,
                'profile' => $user?->profile,
            ] : null,
            'company' => $company ? [
                'id' => $company?->id,
                'reference' => $company?->reference,
                'trade_name' => $company?->trade_name,
                'profile' => $company?->profileData->entitled,
                'state' => $company?->state,
            ] : null,
            'project' => $this->project ? [
                'id' => $this->project->id,
                'reference' => $this->project->reference,
            ] : null,
            'client' => [
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'address' => $client->address,
                'phone_number_1' => $client->phone_number_1,
            ],

        ];
    }
}
