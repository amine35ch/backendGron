<?php

namespace App\Services\DProductServices;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Exceptions\CustomException;
use App\Models\DArticlePrice;
use App\Models\DCompany;
use App\Models\DProduct;
use App\Models\DProductPrice;
use App\Services\DArticlePriceServices\DArticlePriceService;
use App\Services\DArticlePriceServices\DProductPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DProductService
{
    public function __construct(
        private DProduct $dProduct,
        private DProductScaleService $dProductScaleService
    ) {
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $data['access'] = 0;
            if ($user->profile == DCompanyProfile::MAR->value) {
                $data['is_validated'] = true;
            }
            $mergedArray = array_merge($data, [
                'd_company_id' => getCompanyOfConnectedUser()->id,
                'mar_id' => getMarCompany()[0],
            ]);
            $product = $this->dProduct::create($mergedArray);
            if (isset($data['scales'])) {
                $this->dProductScaleService->insert(array_map(function ($scale) use ($product) {
                    $scale['d_product_id'] = $product->id;
                    return $scale;
                }, $data['scales']));
            }

            $this->updateTechFiles($data, $product);

            if ($user->profile != DCompanyProfile::MAR->value) {
                $parentCompanyId = $user->company->parent_company_id;

                DProductPrice::create([
                    'd_company_id' => $parentCompanyId,
                    'd_product_id' => $product->id,
                    'prix_achat_ht' => $data['prix_achat_ht'],
                    'prix_achat_ttc' => $data['prix_achat_ttc'],
                    'prix_vente_ht' => $data['prix_vente_ht'],
                    'tva' => $data['tva'],
                    'state' => 1
                ]);
                $message = __('notifications.product.create', [
                    'product' => $product->reference,
                    'username' => $user->company->trade_name
                ]);

                $subject = 'Création Produit';
                $endPoint = config('custom_routes.produit.create');
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $user->company->parentCompany
                // );
            }

            if ($user->profile == DCompanyProfile::MAR->value) {
                DProductPrice::create([
                    'd_company_id' => getCompanyOfConnectedUser()->id,
                    'd_product_id' => $product->id,
                    'prix_achat_ht' => $data['prix_achat_ht'],
                    'prix_achat_ttc' => $data['prix_achat_ttc'],
                    'prix_vente_ht' => $data['prix_vente_ht'],
                    'tva' => $data['tva'],
                    'state' => 1
                ]);
                $this->createArticleForCompanyChildren($product);
            }

            DProductPrice::create([
                'd_company_id' => getCompanyOfConnectedUser()->id,
                'd_product_id' => $product->id,
                'prix_achat_ht' => $data['prix_achat_ht'],
                'prix_achat_ttc' => $data['prix_achat_ttc'],
                'prix_vente_ht' => $data['prix_vente_ht'],
                'tva' => $data['tva'],
                'state' => 0
            ]);

            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e);
        }
    }

    public function edit(array $data, DProduct $dProduct)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            if (
                getMarCompany()[0] == getCompanyOfConnectedUser()->id ||
                getCompanyOfConnectedUser()->id == $dProduct->d_company_id
            ) {

                if ($user !== DCompanyProfile::MAR->value) {

                    $data['is_validated'] = false;
                }
                $dProduct->update($data);
                if (isset($data['scales'])) {
                    $dProduct->scales()->delete();
                    $this->dProductScaleService->insert(array_map(function ($scale) use ($dProduct) {
                        $scale['d_product_id'] = $dProduct->id;
                        return $scale;
                    }, $data['scales']));
                }
            }
            $user = auth()->user();
            $company = $user->company;

            $this->updateTechFiles($data, $dProduct);
            if (!$dProduct->is_validated) {
                DProductPrice::where('d_product_id', $dProduct->id)
                    ->withoutGlobalScope('check-products')
                    ->update([
                        'prix_achat_ht' => $data['prix_achat_ht'],
                        'prix_achat_ttc' => $data['prix_achat_ttc'],
                        'prix_vente_ht' => $data['prix_vente_ht'],
                        'tva' => $data['tva'],
                    ]);
            } else {
                DProductPrice::updateOrCreate([
                    'd_company_id' => $company->id,
                    'd_product_id' => $dProduct->id,
                ], [
                    'prix_achat_ht' => $data['prix_achat_ht'],
                    'prix_achat_ttc' => $data['prix_achat_ttc'],
                    'prix_vente_ht' => $data['prix_vente_ht'],
                    'tva' => $data['tva'],
                ]);
            }
            if (getCompanyOfConnectedUser()->profile !== DCompanyProfile::MAR->value) {
                $marCompany = DCompany::find(getMarCompany()[0]);
                $subject = __('notifications.product.subject_update');
                $message = __('notifications.product.update', [
                    'produit' => $dProduct->entitled,
                    'company' => $company->trade_name
                ]);
                $endPoint = config('custom_routes.marque.validate');
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $marCompany
                // );
            }

            DB::commit();

            return $dProduct;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function delete(DProduct $dProduct): void
    {
        $dProduct->delete();
    }

    public function getById(int $id)
    {
        return $this->dProduct::with(['brand', 'scales', 'company', 'mar'])->find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProduct::accessible()->with(['brand', 'company', 'mar', 'scales']), $filters);
    }

    public function validateProduct(DProduct $dProduct)
    {
        $isValidated = !$dProduct->is_validated;
        // $access = !$isValidated ? 0 : $dProduct->access;

        $dProduct->update([
            'is_validated' => $isValidated,
            // 'access' => $access,
        ]);
        if (!$isValidated) {
            $disable = DArticleState::DEACTIVATE->value;
            $dProduct->productPrices->each(function ($ar) use ($disable) {
                $ar->update(['state' => $disable]);
            });
        }
        else {
                $subject = __('notifications.product.validate_subject');
                $message = __('notifications.product.validate', [
                    'product' => $dProduct->reference
                ]);
                $endPoint = str_replace(
                    ':id',
                    $dProduct->id,
                    config('custom_routes.produit.validate')
                );
                $company = DCompany::find($dProduct->d_company_id);
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $company
                // );
        }

        return $dProduct;
    }

    public function enableProduct(DProduct $dProduct)
    {
        $user = auth()->user();
        $state = DArticleState::ACTIVATED->value;

        $ar = $dProduct->productPrices->where(
            'd_company_id',
            $user->userable_id
        )->first();

        $ar->update(['state' => $state]);

        return $dProduct;
    }

    public function disableProduct(DProduct $dProduct)
    {
        $user = auth()->user();
        $state = DArticleState::DEACTIVATE->value;

        if ($user->profile == DCompanyProfile::MAR->value) {
            $this->updateAllArticleStates($dProduct, $state);
        } else {

            $ar = $dProduct->productPrices->where(
                'd_company_id',
                $user->userable_id
            )->first();

            $ar->update(['state' => $state]);
        }

        return $dProduct;
    }

    public function updateAllArticleStates($dProduct, $state)
    {
        $dProduct->productPrices->each(function ($productPrice) use ($state) {
            $productPrice->update(['state' => $state]);
        });
    }

    public function updateAccess(DProduct $dProduct)
    {
        if (!$dProduct->is_validated) {
            throw new CustomException('Veuillez valider le produit.');
        }
        $dProduct->update(['access' => !$dProduct->access]);

        if ($dProduct->access) {
            $this->createArticleForCompanyChildren($dProduct);
        }

        return true;
    }

    public function createArticleForCompanyChildren($dProduct)
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::MAR->value) {
            $children = $user->company->children;
            $productMar = $dProduct->productPrices->where(
                'd_company_id',
                $user->userable_id
            )->first();

            $productPriceService = new DProductPriceService();

            foreach ($children as $child) {
                $art = $dProduct->productPrices->where(
                    'd_company_id',
                    $child->d_company_child_id
                )->first();

                if (!$art) {

                    $data = [
                        'd_company_id' => $child->d_company_child_id,
                        'd_product_id' => $dProduct->id,
                        'prix_achat_ht' => $productMar->prix_achat_ht,
                        'prix_achat_ttc' => $productMar->prix_achat_ttc,
                        'prix_vente_ht' => $productMar->prix_vente_ht,
                        'tva' => $productMar->tva,
                        'state' => 1
                    ];
                    $productPriceService->create($data);
                }
            }
        }
    }
    static function canUpdate($user, $dProduct)
    {
        $user = auth()->user();
        if ($user->profile == DCompanyProfile::MAR->value) {
            return true;
        }
        return $user->userable_id == $dProduct->d_company_id;
    }
    static function canDelete($user, $dProduct)
    {
        $mar = $dProduct->mar_id == $user->userable_id;
        $sameUser = $user->userable_id == $dProduct->d_company_id;
        // $hasNotInvoices = $dProduct->invoiceLines->isEmpty();

        // return ($sameUser || $mar) && $hasNotInvoices;

        return $sameUser || $mar;
    }

    public function updateTechFiles($data, $dProduct)
    {
        if (isset($data['doc_acerni'])) {
            $dProduct->update([
                'doc_acerni' => uploadFile(
                    $data['doc_acerni'],
                    $dProduct->directory_path
                )
            ]);
        }
        if (isset($data['doc_certita'])) {
            $dProduct->update([
                'doc_certita' => uploadFile(
                    $data['doc_certita'],
                    $dProduct->directory_path
                )
            ]);
        }
        if (isset($data['doc_avis_tech'])) {
            $dProduct->update([
                'doc_avis_tech' => uploadFile(
                    $data['doc_avis_tech'],
                    $dProduct->directory_path
                )
            ]);
        }
        if (isset($data['fiche_tech'])) {
            $dProduct->update([
                'fiche_tech' => uploadFile(
                    $data['fiche_tech'],
                    $dProduct->directory_path
                )
            ]);
        }
    }
}
