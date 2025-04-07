<?php

namespace App\Services\DArticleServices;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Exceptions\CustomException;
use App\Models\DArticle;
use App\Models\DArticlePrice;
use App\Models\DCompany;
use App\Services\DArticlePriceServices\DArticlePriceService;
use Illuminate\Support\Facades\DB;

class DArticleService
{
    public function __construct()
    {
    }

    public function create(array $data, $user)
    {

        try {
            DB::beginTransaction();
            $works = null;
            $data['access'] = 1;
            if (isset($data['work_id'])) {
                $works = $data['work_id'];
                unset($data['work_id']);
            }
            $mergedArray = array_merge($data, [
                'd_company_id' => getCompanyOfConnectedUser()->id,
                'mar_id' => getMarCompany()[0],
            ]);
            $article = DArticle::create($mergedArray);
            $article->works()->attach($works);
            if (isset($data['file'])) {
                $article->update([
                    'path' => uploadFile(
                        $data['file'],
                        $article->directory_path
                    )
                ]);
            }
            if ($user->profile != DCompanyProfile::MAR->value) {
                $parentCompanyId = $user->company->parent_company_id;

                DArticlePrice::create([
                    'd_company_id' => $parentCompanyId,
                    'd_article_id' => $article->id,
                    'unit_price' => $data['unit_price'],
                    'state' => 1
                ]);
                $message = __('notifications.article.create', [
                    'article' => $article->designation,
                    'username' => $user->company->trade_name
                ]);
                $subject = 'Création Produit';
                $endPoint=config('custom_routes.prestation.create');
                if ($article->type == DArticleType::SERVICE->value) {
                    $subject = 'Création Prestation';
                }
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $user->company->parentCompany
                // );
            }

            DArticlePrice::create([
                'd_company_id' => getCompanyOfConnectedUser()->id,
                'd_article_id' => $article->id,
                'unit_price' => $data['unit_price'],
                'state' => 1
            ]);

            if ($user->profile == DCompanyProfile::MAR->value) {
                $this->createArticleForCompanyChildren($article);
            }
            DB::commit();

            return $article;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e);
        }
    }

    public function edit(array $data, DArticle $dArticle)
    {

        try {
            DB::beginTransaction();
            if (
                getMarCompany()[0] == getCompanyOfConnectedUser()->id ||
                getCompanyOfConnectedUser()->id == $dArticle->d_company_id
            ) {
                $works = null;
                if (isset($data['work_id'])) {
                    $works = $data['work_id'];
                    unset($data['work_id']);
                }
                $dArticle->update($data);
                $dArticle->works()->sync($works);
                if (isset($data['file'])) {
                    $dArticle->update([
                        'path' => uploadFile(
                            $data['file'],
                            $dArticle->directory_path
                        )
                    ]);
                }
            }
            $user = auth()->user();
            $company = $user->company;
            DArticlePrice::updateOrCreate([
                'd_company_id' => $company->id,
                'd_article_id' => $dArticle->id,
            ], [
                'd_company_id' => $company->id,
                'd_article_id' => $dArticle->id,
                'unit_price' => $data['unit_price'],
            ]);
            if (getCompanyOfConnectedUser()->profile !== DCompanyProfile::MAR->value) {
                $marCompany = DCompany::find(getMarCompany()[0]);
                $subject = __('notifications.article.subject_update');
                $message = __('notifications.article.update', [
                    'article' => $dArticle->designation,
                    'company' => $company->trade_name
                ]);
                $endPoint = config('custom_routes.article.validate');
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $marCompany
                // );
            }

            DB::commit();

            return $dArticle;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function invalidArticle($dArticle)
    {
        $dArticle->access = -1;
        $dArticle->mar_id = null;
        $dArticle->save();
    }

    public function delete(DArticle $dArticle): void
    {
        if (!$this->canDelete(auth()->user(), $dArticle)) {
            throw new CustomException('Vous ne pouvez pas supprimé cet article');
        }
        $dArticle->deleted_by = auth()->user()->id;
        $dArticle->save();
        $dArticle->delete();
    }

    public function getById(int $id)
    {
        return DArticle::find($id);
    }

    public function getAll($filters)
    {

        return collection(
            DArticle::accessible()->orderBy('created_at', 'desc'),
            $filters
        );
    }

    public function getMarServices($filters)
    {

        return collection(
            DArticle::accessible()->serviceMar(),
            $filters
        );
    }

    public function disableArticle($dArticle)
    {
        $user = auth()->user();
        $state = DArticleState::DEACTIVATE->value;

        if ($user->profile == DCompanyProfile::MAR->value) {
            $this->updateAllArticleStates($dArticle, $state);
        } else {

            $ar = $dArticle->articlePrices->where(
                'd_company_id',
                $user->userable_id
            )->first();

            $ar->update(['state' => $state]);
        }

        return $dArticle;
    }

    public function enableArticle($dArticle)
    {
        $user = auth()->user();
        $state = DArticleState::ACTIVATED->value;

        $ar = $dArticle->articlePrices->where(
            'd_company_id',
            $user->userable_id
        )->first();

        $ar->update(['state' => $state]);

        return $dArticle;
    }

    public function updateAllArticleStates($dArticle, $state)
    {
        $dArticle->articlePrices->each(function ($articlePrice) use ($state) {
            $articlePrice->update(['state' => $state]);
        });
    }

    public function validateArticle(DArticle $dArticle)
    {
        $isValidated = !$dArticle->is_validated;
        $access = !$isValidated ? 0 : $dArticle->access;

        $dArticle->update([
            'is_validated' => $isValidated,
            'access' => $access,
        ]);
        if (!$isValidated) {
            $disable = DArticleState::DEACTIVATE->value;
            $dArticle->articlePrices->each(function ($ar) use ($disable) {
                $ar->update(['state' => $disable]);
            });
        }

        return $dArticle;
    }

    public function updateAccess(DArticle $dArticle)
    {
        if (!$dArticle->is_validated) {
            throw new CustomException('Veuillez valider l\'article.');
        }
        $dArticle->update(['access' => !$dArticle->access]);

        if ($dArticle->access) {
            $this->createArticleForCompanyChildren($dArticle);
        }

        return true;
    }

    public function createArticleForCompanyChildren($dArticle)
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::MAR->value) {
            $children = $user->company->children;
            $articleMar = $dArticle->articlePrices->where(
                'd_company_id',
                $user->userable_id
            )->first();

            $articlePriceService = new DArticlePriceService();

            foreach ($children as $child) {
                $art = $dArticle->articlePrices->where(
                    'd_company_id',
                    $child->d_company_child_id
                )->first();

                if (!$art) {

                    $data = [
                        'd_company_id' => $child->d_company_child_id,
                        'd_article_id' => $dArticle->id,
                        'unit_price' => $articleMar->unit_price,
                        'state' => 1
                    ];
                    $articlePriceService->create($data);
                }
            }
        }
    }

    public function addPrice(DArticle $dArticle, $data)
    {
        $user = auth()->user();
        $articlePriceService = new DArticlePriceService();

        $existingPrice = $articlePriceService->findByCompanyIdAndArticleId(
            $dArticle->id,
            $user->userable_id
        );

        if ($existingPrice) {
            $existingPrice->update([
                'unit_price' => $data['unit_price'],
            ]);
        } else {
            $data = [
                'd_company_id' => $user->userable_id,
                'd_article_id' => $dArticle->id,
                'unit_price' => $data['unit_price'],
            ];
            $articlePriceService->create($data);
        }

        return true;
    }

    public function canDelete($user, $dArticle)
    {
        $mar = $dArticle->mar_id == $user->userable_id;
        $sameUser = $user->userable_id == $dArticle->d_company_id;
        $hasNotInvoices = $dArticle->invoiceLines->isEmpty();
        if ($this->typeServiceMar($dArticle)) {
            return $mar;
        }

        return ($sameUser || $mar) && $hasNotInvoices;
    }

    public function typeServiceMar($dArticle)
    {
        return $dArticle->type == DArticleType::SERVICE_MAR->value;
    }

    public function canUpdate($user, $dArticle)
    {
        if ($this->typeServiceMar($dArticle)) {

            return $dArticle->mar_id == $user->userable_id;
        }

        return $user->userable_id == $dArticle->d_company_id;
    }
}
