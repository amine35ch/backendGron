<?php

namespace App\Services\DWorkServices;

use App\Enums\PStateEnum\PStateEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Exceptions\CustomException;
use App\Models\DWork;

class DWorkService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DWork::create($data);
    }

    public function edit(array $data, DWork $dWork)
    {
        $dWork->update($data);
        if (! auth()->user()->hasRole(RoleEnum::MARADM->value)) {
            $this->invalidWork($dWork);
        }
        setLog(__('logs.work.update', [
            'username' => auth()->user()->username,
            'reference' => $dWork->reference,
        ]));
    }

    public function invalidWork($dWork)
    {
        $dWork->access = -1;
        $dWork->mar_id = null;
        $dWork->save();
    }

    public function delete(DWork $dWork): void
    {
        $dWork->delete();
    }

    public function getById(int $id)
    {
        return DWork::find($id);
    }

    public function getAll($filters)
    {
        return collection(DWork::company(), $filters);
    }

    public function disableWork($dWork)
    {
        if (! $dWork->works->isEmpty()) {
            throw new CustomException('Désactivation est impossible.');
        }
        $dWork->state = ($dWork->state == PStateEnum::ACTIVATED->value)
            ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $dWork->save();

        return true;
    }

    public function validateArticle(DWork $dWork)
    {
        $dWork->access = 1;
        $dWork->mar_id = getCompanyOfConnectedUser()->id;
        $dWork->save();

        return true;
    }

    public function canDelete($user, $dWork)
    {
        $sameUser = $user->userable_id == $dWork->d_company_id
            || $dWork->mar_id == $user->userable_id;
        $hasNotWorks = $dWork->works->isEmpty();

        return $sameUser && $hasNotWorks;
    }

    public function canUpdate($user, $dWork)
    {
        return $user->userable_id == $dWork->d_company_id || $dWork->mar_id == $user->userable_id;
    }
}
