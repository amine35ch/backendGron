<?php

namespace App\Policies;

use App\Models\DAdmin;
use App\Models\DThirdPartyScenario;

class DThirdPartyScenarioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(DAdmin $dAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(DAdmin $dAdmin, DThirdPartyScenario $dThirdPartyScenario): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(DAdmin $dAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(DAdmin $dAdmin, DThirdPartyScenario $dThirdPartyScenario): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(DAdmin $dAdmin, DThirdPartyScenario $dThirdPartyScenario): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(DAdmin $dAdmin, DThirdPartyScenario $dThirdPartyScenario): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(DAdmin $dAdmin, DThirdPartyScenario $dThirdPartyScenario): bool
    {
        //
    }
}
