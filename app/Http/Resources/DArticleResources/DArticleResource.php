<?php

namespace App\Http\Resources\DArticleResources;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Services\DArticleServices\DArticleService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $document = ($this->path) ? [[
            'download_path' => $this->getDownloadPathAttribute(),
            'extension' => $this->getExtensionAttribute(),
            'name' => $this->doc_name,
            'versions' => [
                [
                    'download_path' => $this->getDownloadPathAttribute(),
                    'extension' => $this->getExtensionAttribute(),
                    'name' => $this->doc_name,
                ],
            ],
        ]] : [];
        $user = auth()->user();
        $articlePrice = $this->articlePrices->firstWhere('d_company_id', $user->userable_id);
        $articleService = new DArticleService();
        if ($user->profile == DCompanyProfile::MAR->value) {
            return [
                'id' => $this->id,
                'designation' => $this->designation,
                'description' => $this->description,
                'reference' => $this->reference,
                'type' => $this->type,
                'path' => $this->path,
                'doc_name' => $this->doc_name,
                'brand' => $this->brand ?? null,
                'works' => $this->works ?? null,
                'd_company_id' => $this->d_company_id,
                // 'mar_id' => $this->mar_id,
                'access' => $this->access,
                'is_validated' => $this->is_validated,
                'always' => $this->always,
                'tva' => $this->tva,
                'company_name' => $this->company?->trade_name,
                'article_type' => $this->articleType,
                'unit' => [
                    'entitled' => $this?->unitType?->entitled,
                    'type' => $this?->unitType?->type
                ],
                'unit_price' => $articlePrice?->unit_price,
                'state' => $articlePrice?->state,
                'documents' => $document,
                'can_delete' => $articleService->canDelete($user, $this),
                'can_update' => $articleService->canUpdate($user, $this),
                'can_update_price' => $articlePrice ? true : false,
            ];
        }
        return [
            'id' => $this->id,
            'designation' => $this->designation,
            'description' => $this->description,
            'reference' => $this->reference,
            'type' => $this->type,
            'path' => $this->path,
            'doc_name' => $this->doc_name,
            'brand' => $this->brand ?? null,
            'works' => $this->works ?? null,
            'd_company_id' => $this->d_company_id,
            // 'mar_id' => $this->mar_id,
            'access' => $this->access,
            'is_validated' => $this->is_validated,
            'always' => $this->always,
            'tva' => $this->tva,
            // 'company_name' => $this->company?->trade_name,
            'article_type' => $this->articleType,
            'unit' => ['entitled' => $this?->unitType?->entitled, 'type' => $this?->unitType?->type],
            'unit_price' => $articlePrice?->unit_price,
            'state' => $articlePrice?->state,
            'documents' => $document,
            'can_delete' => $articleService->canDelete($user, $this),
            'can_update' => $articleService->canUpdate($user, $this),
            'can_update_price' => $articlePrice ? true : false,
        ];
    }
}
