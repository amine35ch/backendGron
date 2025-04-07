<?php

namespace App\Observers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectEnum\DProjectStatus;
use App\Enums\DProjectEnum\DProjectTypeCreation;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\PStepDocument;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class DProjectObserver
{
    /**
     * Handle the DProject "creating" event.
     */
    public function creating(DProject $dProject): void
    {
        $user = auth()->user();
        if ($user) {
            $dProject->creator_id = $user->id;
            $company = $user->company;
            if ($user->profile == DCompanyProfile::INS->value) {
                $company = $company->parentCompany;
            }
            $dProject->d_company_id = $company->id;
        } else {
            $company = DCompany::where('id', $dProject['d_company_id'])->first();
            $dProject['project_type'] = DProjectTypeCreation::DEMANDE->value;
            $user = User::where([
                'userable_id' => $dProject['d_company_id'],
            ])->first();
            $dProject->creator_id = $user->id ?: 1;
            if ($company->profile == DCompanyProfile::INS->value) {
                $dProject->d_company_id = $company->parent_company_id;
            }
        }
        $dProject->process = 0;
        $dProject->reference = getNextReferenceProject($company->id);

        if (!$dProject->more_than_fifteen) {
            $dProject->state = DProjectState::SUSPENDED->value;
            $dProject->status = DProjectStatus::NOT_QUALIFIED->value;
            $dProject->process_ended = 1;
        }
    }

    /**
     * Handle the DProject "created" event.
     */
    public function created(DProject $dProject): void
    {
        $stepDocuments = PStepDocument::where(
            'order_step',
            $dProject->current_step_order
        )->get();
        $stepDocuments->map(function ($document) use ($dProject) {
            return checkDocumentBeforeCreate($document, $dProject);
        });
        $user = auth()->user();
        $action = 'create';
        if ($user) {
            $dProject->creator_id = $user->id;
            $logMessage = __("logs.project.$action.description", [
                'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
            ]);
        } else {
            $company = DCompany::where('linkToken', $dProject->token)->first();
            $dProject->creator_id = 1;
            $logMessage = __("logs.project.$action.description", [
                'admin' => $company->representative_first_name . ' ' . $company->representative_first_name,
            ]);

        }
        setProjectHistory(
            $dProject,
            __("logs.project.$action.action"),
            $logMessage
        );
        setLog($logMessage . $dProject->reference);

        $configUrl = str_replace(
            ':id',
            $dProject->id,
            config("custom_routes.projects.$action")
        );

        if ($dProject->process_ended) {
            $logMessage = __("logs.project.$action.custom.suspended.description");

            setProjectHistory(
                $dProject,
                __("logs.project.$action.custom.suspended.action"),
                $logMessage
            );

            setLog($logMessage . $dProject->reference);
        }
        try {
            $user = auth()->user();
            if ($user) {
                $message = __(
                    'notifications.project.installer_create',
                    [
                        'username' => auth()->user()->company?->trade_name,
                        'reference' => $dProject->reference,
                    ]
                );
            } else {
                $company = DCompany::where('linkToken', $dProject->token)->first();
                $message = __(
                    'notifications.project.installer_create',
                    [
                        'username' => $company?->trade_name,
                        'reference' => $dProject->reference,
                    ]
                );

            }


            // if ($user && $user->profile == DCompanyProfile::INS->value) {
            //     sendNotificationCompany(
            //         "Ajouter un nouveau dossier par l'installateur",
            //         $message,
            //         $configUrl,
            //         $dProject->company
            //     );
            // } else {
            //     sendNotificationCompany(
            //         'Création dossier',
            //         'Un nouveau dossier a été créé de référence ' . $dProject->reference,
            //         $configUrl,
            //         $dProject->company,
            //     );
            // }
        } catch (\Exception $e) {
        }
    }

    /**
     * Handle the DProject "updated" event.
     */
    public function updated(DProject $dProject): void
    {
        $logMessage = __('logs.project.update.description', [
            'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
        ]);

        setProjectHistory(
            $dProject,
            __('logs.project.update.action'),
            $logMessage
        );
        setLog($logMessage . $dProject->reference);
    }

    /**
     * Handle the DProject "deleted" event.
     */
    public function deleting(DProject $dProject): void
    {
        // if ($dProject->cleared_step_order > 1) {
        //     throw new CustomException('Vous ne pouvez pas supprimer ce projet');
        // }
        $logMessage = __('logs.project.delete.description', [
            'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
        ]);

        setProjectHistory(
            $dProject,
            __('logs.project.delete.action'),
            $logMessage
        );

        setLog($logMessage . $dProject->reference);
    }

    /**
     * Handle the DProject "restored" event.
     */
    public function restored(DProject $dProject): void
    {
    }

    /**
     * Handle the DProject "force deleted" event.
     */
    public function forceDeleted(DProject $dProject): void
    {
    }
}
