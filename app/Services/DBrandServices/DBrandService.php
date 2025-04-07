<?php

namespace App\Services\DBrandServices;

use App\Enums\DArticleEnum\DArticleState;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Exceptions\CustomException;
use App\Models\DBrand;
use App\Models\DBrandLine;
use App\Models\DCompany;
use App\Services\DBrandLineServices\DBrandLineService;
use Illuminate\Support\Facades\DB;

class DBrandService
{
    public function __construct()
    {
    }

    public function create(array $data, $user)
    {
        try {
            DB::beginTransaction();

            $parentCompanyId = $user->company->parent_company_id ? $user->company->parent_company_id : $user->company->id;
            $company = getCompanyOfConnectedUser();

            $mergedArray = array_merge($data, [
                'd_company_id' => $company->id,
                'mar_id' => $parentCompanyId,
            ]);
            $dBrand = DBrand::create($mergedArray);
            if ($user->profile != DCompanyProfile::MAR->value) {

                DBrandLine::create([
                    'd_company_id' => $parentCompanyId,
                    'd_brand_id' => $dBrand->id,
                    'state' => 0
                ]);
            }
            if ($company->profile !== DCompanyProfile::MAR->value) {
                $marCompany = DCompany::find(getMarCompany()[0]);
                $subject = __('notifications.marque.subject');
                $message = __('notifications.marque.message', [
                    'marque' => $dBrand->entitled,
                    'company' => $company->trade_name
                ]);
                $endPoint = config('custom_routes.marque.create');
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $marCompany
                // );
            }

            DBrandLine::create([
                'd_company_id' => $company->id,
                'd_brand_id' => $dBrand->id,
            ]);
            $this->updateAccess($dBrand);
            DB::commit();
            return $dBrand;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function edit(array $data, DBrand $dBrand)
    {

        try {
            DB::beginTransaction();
            $company = getCompanyOfConnectedUser();
            $dBrand->update($data);
            DBrandLine::updateOrCreate([
                'd_company_id' => auth()->user()->userable_id,
                'd_brand_id' => $dBrand->id,
            ]);
            // if ($company->profile !== DCompanyProfile::MAR->value) {
            //     $marCompany = DCompany::find(getMarCompany()[0]);
            //     $subject = __('notifications.marque.subject_update');
            //     $message = __('notifications.marque.update', [
            //         'marque' => $dBrand->entitled,
            //         'company' => $company->trade_name
            //     ]);
            //     $endPoint = config('custom_routes.marque.validate');
            //     sendNotificationCompany(
            //         $subject,
            //         $message,
            //         $endPoint,
            //         $marCompany
            //     );
            // }

            DB::commit();

            return $dBrand;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function invalidBrand($dBrand)
    {
        $dBrand->access = -1;
        $dBrand->mar_id = null;
        $dBrand->save();
    }

    public function delete(DBrand $dBrand): void
    {
        if (!$this->canDelete(auth()->user(), $dBrand)) {
            throw new CustomException('Vous ne pouvez pas supprimer cette marque');
        }
        $dBrand->delete();
    }

    public function getById(int $id)
    {
        return DBrand::find($id);
    }

    public function getAll($filters)
    {
        return collection(DBrand::accessibleByCompany(), $filters);
    }

    public function validateBrand(DBrand $dBrand)
    {
        $isValidated = !$dBrand->is_validated;
        // $access = !$isValidated ? 0 : $dBrand->access;
        $dBrand->update([
            'is_validated' => $isValidated,
            // 'access' => $access,
        ]);
        $dBrand->lines()->withoutGlobalScope('check-brands')->each(function ($brand) use ($isValidated, $dBrand) {
            $brand->update(['state' => $isValidated]);
            if ($isValidated) {
                $subject = __('notifications.marque.validate_subject');
                $message = __('notifications.marque.validate', [
                    'brand' => $dBrand->entitled
                ]);
                $endPoint = str_replace(
                    ':id',
                    $brand->d_brand_id,
                    config('custom_routes.marque.validate')
                );
                $company = DCompany::find($brand->d_company_id);
                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $endPoint,
                //     $company
                // );
            }
        });
        return $dBrand;
    }

    public function disableBrand($dBrand)
    {
        $user = auth()->user();
        $state = DArticleState::DEACTIVATE->value;

        if ($user->profile == DCompanyProfile::MAR->value) {
            $this->updateAllBrandStates($dBrand, $state);
        } else {

            $ar = $dBrand->lines->where(
                'd_company_id',
                $user->userable_id
            )->first();

            $ar->update(['state' => $state]);
        }

        return $dBrand;
    }

    public function enableBrand($dBrand)
    {
        $user = auth()->user();
        $state = DArticleState::ACTIVATED->value;

        $ar = $dBrand->lines->where(
            'd_company_id',
            $user->userable_id
        )->first();

        $ar->update(['state' => $state]);

        return $dBrand;
    }

    public function updateAllBrandStates($dBrand, $state)
    {
        $dBrand->lines->each(function ($line) use ($state) {
            $line->update(['state' => $state]);
        });
    }

    public function updateAccess(DBrand $dBrand)
    {
        try {
            DB::beginTransaction();
            $dBrand->update(['access' => !$dBrand->access]);
            if ($dBrand->access) {
                $this->createBrandForCompanyChildren($dBrand);
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
        }

    }

    public function createBrandForCompanyChildren($dBrand)
    {
        $user = auth()->user();
        $parent = $user->company->parentCompany ?? $user->company;
        $children = $parent->children;
        $brandLineService = new DBrandLineService(new DBrandLine());
        foreach ($children as $key => $child) {
            $art = $dBrand->lines()->withoutGlobalScope('check-brands')->where('d_company_id', $child->d_company_child_id)->first();
            if (!$art) {
                $data = [
                    'd_company_id' => $child->d_company_child_id,
                    'd_brand_id' => $dBrand->id,
                ];
                $brandLineService->create($data);
            }
        }
    }

    public function canDelete($user, $dBrand)
    {
        $sameUser = $user->userable_id == $dBrand->d_company_id
            || $dBrand->mar_id == $user->userable_id;
        $hasNotArticles = $dBrand->articles->isEmpty();

        return $sameUser && $hasNotArticles;
    }

    public function canUpdate($user, $dBrand)
    {
        return $user->userable_id == $dBrand->d_company_id;
    }
}
