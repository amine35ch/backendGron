<?php

namespace App\Services\DScenarioServices;

use App\Enums\PStateEnum\PStateEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Exceptions\CustomException;
use App\Models\DScenario;
use Illuminate\Support\Facades\DB;

class DScenarioService
{
    public function __construct(private DScenario $dScenario)
    {
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $sceanario = $this->dScenario::create($data);
            if (isset($data['works'])) {
                $this->attachWorks($data['works'], $sceanario);
            }
            DB::commit();

            return $sceanario;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function attachWorks($works, $scenario)
    {
        $scenario->works()->sync($works);
    }

    public function edit(array $data, DScenario $dScenario)
    {
        try {
            DB::beginTransaction();
            $dScenario->update($data);
            if ($data['works']) {
                $this->attachWorks($data['works'], $dScenario);
            }
            if (! auth()->user()->hasRole(RoleEnum::MARADM->value)) {
                $this->invalidScenario($dScenario);
            }

            DB::commit();

            return $dScenario;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function invalidScenario($dScenario)
    {
        $dScenario->access = -1;
        $dScenario->mar_id = null;
        $dScenario->save();
    }

    public function delete(DScenario $dScenario): void
    {
        $dScenario->delete();
    }

    public function getById(int $id)
    {
        return $this->dScenario::find($id);
    }

    public function getAll($filters)
    {
        $user = auth()->user();

        return collection($this->dScenario::accessibleByCompany($user), $filters);
    }

    public function disableScenario(DScenario $dScenario)
    {
        $dScenario->state = ($dScenario->state == PStateEnum::ACTIVATED->value) ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $dScenario->save();

        return true;
    }

    public function validateArticle(DScenario $dScenario)
    {
        $dScenario->access = 1;
        $dScenario->mar_id = getCompanyOfConnectedUser()->id;
        $dScenario->save();

        return true;
    }
}
