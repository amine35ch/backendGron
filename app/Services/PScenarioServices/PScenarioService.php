<?php

namespace App\Services\PScenarioServices;

use App\Enums\PStateEnum\PStateEnum;
use App\Exceptions\CustomException;
use App\Models\PScenario;
use Illuminate\Support\Facades\DB;

class PScenarioService
{
    public function __construct(private PScenario $PScenario)
    {
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $scenario = $this->PScenario::create($data);
            if ($data['works']) {
                $this->attachWorks($data['works'], $scenario);
            }
            DB::commit();

            return $scenario;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function attachWorks($works, $scenario)
    {
        $scenario->works()->sync($works);
    }

    public function edit(array $data, PScenario $PScenario)
    {
        try {
            DB::beginTransaction();
            $scenario = $PScenario->update($data);
            if ($data['works']) {
                $this->attachWorks($data['works'], $PScenario);
            }
            DB::commit();

            return $scenario;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function delete(PScenario $PScenario): void
    {
        $PScenario->delete();
    }

    public function getById(int $id)
    {
        return $this->PScenario::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->PScenario, $filters, ['listWorks']);
    }

    public function disableScenario($PScenario)
    {
        $PScenario->state = ($PScenario->state == PStateEnum::ACTIVATED->value) ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $PScenario->save();

        return true;
    }
}
