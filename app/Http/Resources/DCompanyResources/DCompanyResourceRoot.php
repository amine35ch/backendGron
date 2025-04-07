<?php

namespace App\Http\Resources\DCompanyResources;

use App\Enums\DClientEnum\DClientGender;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Http\Resources\DInvoiceReferenceResources\DInvoiceReferenceResource;
use App\Services\DCompanyServices\DCompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DCompanyResourceRoot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'id' => $this->id,
            'trade_name' => $this->trade_name,
        ];
    }

    public function collectionItems($request, $companyService, $user)
    {

        return [
            'id' => $this->id,
            'trade_name' => $this->trade_name,

        ];

    }
}
