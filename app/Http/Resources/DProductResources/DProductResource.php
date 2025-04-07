<?php

namespace App\Http\Resources\DProductResources;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Http\Resources\DBrandResources\DBrandResource;
use App\Http\Resources\DCompanyResources\DCompanyResource;
use App\Services\DProductServices\DProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $productPrice = $this->productPrices->firstWhere('d_company_id', $user->userable_id);
        if ($user->profile == DCompanyProfile::MAR->value) {
            return [
                'id' => $this->id,
                'reference' => $this->reference,
                'type' => 0,
                'type_produit_isolant' => $this->type_produit_isolant,
                'norme' => $this->norme,
                'designation' => $this->designation,
                'reference_acerni' => $this->reference_acerni,
                'date_validite_acerni' => $this->date_validite_acerni,
                'doc_acerni' => '',
                'reference_certita' => $this->reference_certita,
                'date_validite_certita' => $this->date_validite_certita,
                'doc_certita' => '',
                'reference_avis_tech' => $this->reference_avis_tech,
                'date_validite_avis_tech' => $this->date_validite_avis_tech,
                'doc_avis_tech' => '',
                'fiche_tech' => '',
                'marquage_ce' => $this->marquage_ce,
                'd_brand_id' => $this->d_brand_id,
                'brand' => new DBrandResource($this->whenLoaded('brand')),
                'category' => $this->category,
                'sub_category' => $this->sub_category,
                'scales' => $this->whenLoaded('scales', function () {
                    return $this->scales->map(function ($scale) {
                        return [
                            'entitled' => $scale->scale->entitled,
                            'scale_reference' => $scale->scale_reference,
                            'value'     => $scale->value ==null? '': $scale->value,
                            'unit'     => $scale->unit,
                            'type'    => $scale->scale->type,
                            'scale_list' => $scale->scale->scaleList,
                        ];
                    });
                }),
                'access' => $this->access,
                'is_validated' => $this->is_validated,
                'company_name' => $this->whenLoaded('company', function () {
                    return $this->company->trade_name;
                }),
                'company' => $this->whenLoaded('company', function () {
                    return [
                        "id" =>  $this->company->id,
                        "reference" =>  $this->company->reference,
                        "trade_name" =>  $this->company->trade_name,
                    ];
                }),
                'd_company_id' => $this->d_company_id,
                // 'mar' => $this->whenLoaded('mar', function () {
                //     return [
                //         "id" =>  $this->company->id,
                //         "reference" =>  $this->company->reference,
                //         "trade_name" =>  $this->company->trade_name,
                //     ];
                // }),
                'state' => $productPrice?->state,
                'can_delete' => DProductService::canDelete($user, $this),
                'can_update' => DProductService::canUpdate($user, $this),
                'can_update_price' => $productPrice ? true : false,
                'prix_achat_ht' => $productPrice?->prix_achat_ht,
                'prix_achat_ttc' => $productPrice?->prix_achat_ttc,
                'prix_vente_ht' => $productPrice?->prix_vente_ht,
                'tva' => $productPrice?->tva,
                'bars' => $this->bars,
            ];
        }
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'type' => 0,
            'type_produit_isolant' => $this->type_produit_isolant,
            'norme' => $this->norme,
            'designation' => $this->designation,
            'reference_acerni' => $this->reference_acerni,
            'date_validite_acerni' => $this->date_validite_acerni,
            'doc_acerni' => $this->doc_acerni,
            'reference_certita' => $this->reference_certita,
            'date_validite_certita' => $this->date_validite_certita,
            'doc_certita' => $this->doc_certita,
            'reference_avis_tech' => $this->reference_avis_tech,
            'date_validite_avis_tech' => $this->date_validite_avis_tech,
            'doc_avis_tech' => $this->doc_avis_tech,
            'fiche_tech' => $this->fiche_tech,
            'marquage_ce' => $this->marquage_ce,
            'd_brand_id' => $this->d_brand_id,
            'brand' => new DBrandResource($this->whenLoaded('brand')),
            'category' => $this->category,
            'sub_category' => $this->sub_category,
            'scales' => $this->whenLoaded('scales', function () {
                return $this->scales->map(function ($scale) {
                    return [
                        'entitled' => $scale->scale->entitled,
                        'scale_reference' => $scale->scale_reference,
                        'value'     => $scale->value,
                        'unit'     => $scale->unit,
                        'type'    => $scale->scale->type,
                        'scale_list' => $scale->scale->scaleList,
                    ];
                });
            }),
            'access' => $this->access,
            'is_validated' => $this->is_validated,
            'd_company_id' => $this->d_company_id,
            'bars' => $this->bars,
            // 'company_name' => $this->whenLoaded('company', function () {
            //     return $this->company->trade_name;
            // }),
            // 'company' => $this->whenLoaded('company', function () {
            //     return [
            //         "id" =>  $this->company->id,
            //         "reference" =>  $this->company->reference,
            //         "trade_name" =>  $this->company->trade_name,
            //     ];
            // }),
            // 'mar' => $this->whenLoaded('mar', function () {
            //     return [
            //         "id" =>  $this->company->id,
            //         "reference" =>  $this->company->reference,
            //         "trade_name" =>  $this->company->trade_name,
            //     ];
            // }),
            'state' => $productPrice?->state,
            'can_delete' => DProductService::canDelete($user, $this),
            'can_update' => DProductService::canUpdate($user, $this),
            'can_update_price' => $productPrice ? true : false,
            'prix_achat_ht' => $productPrice?->prix_achat_ht,
            'prix_achat_ttc' => $productPrice?->prix_achat_ttc,
            'prix_vente_ht' => $productPrice?->prix_vente_ht,
            'tva' => $productPrice?->tva,
        ];
    }
}
