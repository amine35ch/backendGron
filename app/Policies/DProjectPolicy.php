<?php

namespace App\Policies;

use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Models\DProject;
use App\Models\PDocument;
use App\Models\User;

class DProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view projects');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, $dProject): bool
    {
        return canAccessProject($dProject, $user, 'view projects');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create projects');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DProject $dProject): bool
    {
        return canAccessProject($dProject, $user, 'update projects');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProject $dProject): bool
    {
        return canAccessProject($dProject, $user, 'delete projects')
            && $user->role == 'MAR::admin';
    }

    public function currentStep(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            $dProject->step?->permission
        );
    }

    public function nextStep(User $user, DProject $dProject): bool
    {
        if ($dProject->last_step  && !$dProject->next_step) {
            return canAccessProject(
                $dProject,
                $user,
                $dProject->step->permission
            );
        }
        if (!$dProject->next_step) {
            abort(404, 'Le projet se termine dans cette étape.');
        }

        return canAccessProject(
            $dProject,
            $user,
            $dProject->next_step?->permission
        );
    }

    public function prevStep(User $user, DProject $dProject): bool
    {

        if (!$dProject->prev_step) {
            abort(404, 'Vous avez déjà franchi la première étape.');
        }

        return canAccessProject(
            $dProject,
            $user,
            $dProject->prev_step?->permission
        );
    }

    public function qualification(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'qualify-client',
        );
    }

    public function eligibility(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'determine-client-eligibility',
        );
    }

    public function appointment(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'schedule-appointment',
        );
    }

    public function accompaniement(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'had-accompaniement',
        );
    }

    public function validationWorksMar(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'step-mar-assignment-verification',
        );
    }

    public function validationInvoice(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'invoice-validation',
        );
    }

    public function uploadDocument(User $user, DProject $dProject, $pDocument): bool
    {
        if ($pDocument) {
            return canAccessProject(
                $dProject,
                $user,
                $pDocument->permissions,
            );
        }

        return canAccessProject(
            $dProject,
            $user,
            'attach-any-document',
        );
    }

    public function generateDocument(User $user, DProject $dProject, PDocument $pDocument): bool
    {
        if (
            !$pDocument
            || !in_array($pDocument->nature_doc, [
                PNatureDocEnum::GENERATED->value,
                PNatureDocEnum::GENERATED_WITH_FORM->value,
                PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value
            ])
        ) {
            abort(404, 'Veuillez vérifier le fichier.');
        }

        return canAccessProject(
            $dProject,
            $user,
            $pDocument->permissions,
        );
    }

    public function saveForm(User $user, DProject $dProject, PDocument $pDocument): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            $pDocument->permissions,
        );
    }

    public function generateForm(User $user, DProject $dProject, PDocument $pDocument): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            $pDocument->permissions,
        );
    }

    public function setWorksByInstaller(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'step-installer-quotation-verification',
        );
    }

    public function updateOperation(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'set-operations',
        );
    }

    public function simulation(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'simulate projects',
        );
    }

    public function saveQuotation(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'create-quotation projects',
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProject $dProject)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProject $dProject)
    {
    }

    public function validateInvoiceInstaller(User $user, DProject $dProject): bool
    {
        return canAccessProject(
            $dProject,
            $user,
            'validate-invoice-installer',
        );
    }
}
