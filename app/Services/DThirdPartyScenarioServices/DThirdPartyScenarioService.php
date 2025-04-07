<?php

namespace App\Services\DThirdPartyScenarioServices;

use App\Models\DThirdPartyScenario;

class DThirdPartyScenarioService
{
    public function __construct(private DThirdPartyScenario $dThirdPartyScenario)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyScenario::create($data);
    }

    public function edit(array $data, DThirdPartyScenario $dThirdPartyScenario)
    {
        return $dThirdPartyScenario->update($data);
    }

    public function delete(DThirdPartyScenario $dThirdPartyScenario): void
    {
        $dThirdPartyScenario->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyScenario::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyScenario, $filters);
    }
}
