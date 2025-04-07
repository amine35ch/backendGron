<?php

namespace App\Services\DProjectVisitServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DVisiteState;
use App\Enums\DProjectVisitEnum\DProjectVisitState;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PStepEnum\PStepOrder;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectOperation;
use App\Models\DProjectVisit;
use App\Models\PDocument;
use App\Models\PStepDocument;
use App\Models\User;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectServices\DProjectService;
use App\Services\DProjectServices\ProjectStepService;
use App\Services\PDocumentServices\PDocumentService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DProjectVisitService
{
    public function __construct(private DProjectVisit $dProjectVisit) {}

    public function createOrUpdateVisit($data)
    {
        try {
            DB::beginTransaction();
            $dProject = DProject::find($data['d_project_id']);
            $userCompany = getCompanyOfConnectedUser();
            foreach ($data['visits'] as $visit) {
                Log::info(['test', $visit, $dProject->visits]);
                $existingVisit = $dProject->visits->where('type', $visit['type'])->first();
                if ($existingVisit && auth()->user()->role != DCompanyProfile::MAR->value . '::admin') {
                    if ($existingVisit->d_company_id != $visit['d_company_id']) {

                        throw new CustomException('Une visite de ce type existe déjà.');
                    }
                }
                if (isset($visit['enable'])) {
                    if (!$visit['enable'] && $existingVisit) {
                        $existingVisit->delete();
                    }
                }
                if (isset($visit['enable']) && !$visit['enable'] && !$existingVisit) {
                    continue;
                }
                $data = [
                    'name' => $visit['name'],
                    'type' => $visit['type'],
                    'visit_date' => $visit['visit_date'],
                    'end_visit_date' => $visit['end_visit_date'] ?? null,
                    'd_project_id' => $dProject->id,
                    'd_company_id' => $visit['d_company_id'] ?? null,
                    'user_id' => $visit['user_id'] ?? null,
                    'state' => DProjectVisitState::ACCEPTED->value,
                ];
                // $insp = DProjectVisit::create($data);


                $company = DCompany::find($data['d_company_id']);
                $newInstance = false;
                $newUser = false;
                $newDate = false;

                if (!$existingVisit || $visit['type'] == PTypeVisitEnum::TRV->value) {
                    $existingVisit = $this->dProjectVisit::create($data);
                    $newInstance = true;
                } else {
                    $userId = $data['user_id'] ?? null;
                    $newUser = $userId && $userId != $existingVisit->user_id;
                    $newDate = Carbon::parse($data['visit_date']) != Carbon::parse($existingVisit->visit_date);
                    $existingVisit->update($data);
                }
                if ($dProject->cleared_step_order < PStepOrder::StepAppointmentMarAndTech->value && $userCompany->profile == DCompanyProfile::INS->value) {
                    $works = $dProject->works;
                    if ($works->isEmpty()) {
                        throw new CustomException(__('exceptions.simulation_missing'));
                    }
                    $projectStepService = new ProjectStepService($dProject);
                    $projectStepService->initDocumentForInstaller($dProject);
                }
                if (($visit['type'] == PTypeVisitEnum::VISIT_INSTALLER->value && $newDate) || $newInstance) {
                    $pDocumentService = new PDocumentService(new PDocument());
                    $dProjectService = new DProjectService($dProject, new PDocumentService(new PDocument()));
                    $marContract = $pDocumentService->getByType(PDocumentType::CONTRAT->value);
                    $dProjectService->setGeneratedDocument($dProject, $marContract);
                    $marDevis = $pDocumentService->getByType(PDocumentType::OFFRE_DE_DEVIS->value);
                    $dProjectService->setGeneratedDocument($dProject, $marDevis);
                    $generalInfo = $pDocumentService->getByType(PDocumentType::INFORMATION_GENERALE_PREALABLE->value);
                    $dProjectService->setGeneratedDocument($dProject, $generalInfo);
                }
                if ($existingVisit?->user?->profile == DCompanyProfile::MAR->value && $userCompany->profile == DCompanyProfile::MAR->value) {
                    $existingVisit->update(['state' => DVisiteState::ACCEPTED->value]);
                }
                if ($newInstance || (!$newInstance && $newUser || $newDate)) {
                    setLog(__('logs.visit.create', [
                        'username' => auth()->user()->username,
                        'project' => $dProject->reference,
                    ]));
                    $this->notifyVisit($existingVisit, $dProject);
                }
                $message = __(
                    'logs.project.add_visit.description',
                    ['admin' => auth()->user()->username]
                );

                setProjectHistory(
                    $dProject,
                    __(
                        'logs.project.add_visit.action',
                        ['admin' => auth()->user()->username]
                    ),
                    $message
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th->getMessage());
        }
    }

    public function notifyVisit($visit, $dProject)
    {
        try {
            $user = User::find($visit->user_id);
            $company = DCompany::find($visit->d_company_id);
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );
            if ($company->profile == DCompanyProfile::INS->value) {

                $message = __(
                    'notifications.project.visit.creation',
                    [
                        'visit' => $visit->name,
                        'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
                        'client_address' => $dProject->client->address . ' ' . $dProject->client->zip_code . ' ' . $dProject->client->city,
                        'date' => $visit->visit_date,
                    ]
                );
                sendNotificationCompany(
                    'enregistrement d\'une date visite',
                    $message,
                    $configUrl,
                    $dProject->company,
                );
            }
            $message = __(
                'notifications.project.visit.affected',
                [
                    'visit' => $visit->name,
                    'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
                    'client_address' => $dProject->client->address . ' ' . $dProject->client->zip_code . ' ' . $dProject->client->city,
                    'date' => $visit->visit_date,
                ]
            );
            if ($user) {

                sendNotificationUser(
                    $this->entitledByTypeVisit($visit->type),
                    $message,
                    $configUrl,
                    null,
                    [$user],
                    $user->first_name . ' ' . $user->last_name ?? null
                );
            } else {
                sendNotificationCompany(
                    $this->entitledByTypeVisit($visit->type),
                    $message,
                    $configUrl,
                    $company,
                );
            }
            if ($visit->type == PTypeVisitEnum::GRILLE->value) {
                sendNotificationCompany(
                    $this->entitledByTypeVisit($visit->type),
                    $message,
                    $configUrl,
                    $dProject->installer_company,
                );
            }
        } catch (\Exception $e) {
        }
    }

    public function entitledByTypeVisit($type)
    {
        $dates = [
            0 => 'Date visite entreprise Retenue',
            1 => 'Date 2ème visite Mar',
            3 => 'Date visite audit',
            4 => 'Date visite Mar'
        ];

        return data_get($dates, $type);
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $dProject = DProject::find($data['d_project_id']);

            $this->createOrUpdateVisit($dProject, $data['visits']);

            $documents = PStepDocument::whereIn('type_doc', [5, 6])->get();
            foreach ($documents as $document) {
                $documentProject = DProjectDocument::where('type_doc', $document->type)
                    ->where('d_project_id', $data['d_project_id'])->first();

                if (!$documentProject) {
                    DProjectDocument::firstOrCreate([
                        'type_doc' => $document->type,
                        'order_step' => $document->order_step,
                        'name' => $document->entitled,
                        'required' => $document->required,
                        'd_project_id' => $dProject->id,
                        'status' => DProjectDocumentStatus::NEW->value,
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function createOperation($dProject, $operation, $company)
    {
        DProjectOperation::create([
            'd_project_id' => $dProject->id,
            'p_operation_id' => $operation?->id,
            'd_company_id' => $company,
        ]);
        $this->sendNotifAudit($company, $dProject);
    }

    public function sendNotifAudit($companyId, $dProject)
    {
        try {
            $dCompany = DCompany::find($companyId);
            $admins = $dCompany->users()->whereHas('roles', function ($query) {
                $query->where('name', 'like', '%admin%');
            })->get();
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.update')
            );
            sendNotificationUser(
                'Enregistrement d\'une date visite Audit',
                __('notifications.project.visit.fix'),
                $configUrl,
                null,
                $admins,
            );
        } catch (\Exception $e) {
        }
    }

    public function edit(array $data, DProjectVisit $dProjectVisit)
    {
        try {
            DB::beginTransaction();

            if (!count($data)) {
                throw new CustomException('Aucun donnée modifié');
            }

            if (
                isset($data['visit_date'])
                && $dProjectVisit->state != DVisiteState::PENDING->value
            ) {
                $dateVisit = Carbon::parse($dProjectVisit->visit_date)
                    ->format('Y-m-d');
                if ($dateVisit != $data['visit_date'] && $dProjectVisit->state == DProjectVisitState::FINISHED->value) {
                    throw new CustomException('Vous ne pouvez pas modifier la date.');
                }
            }

            $dProjectVisit->update($data);

            if (isset($data['user_id']) && $data['user_id'] != auth()->user()->id) {
                createNotificationProject(
                    $dProjectVisit->project,
                    __('logs.visit.affectation.action'),
                    $dProjectVisit->user,
                    __(
                        'logs.visit.affectation.description',
                        [
                            'username' => $dProjectVisit->user->username,
                            'project' => $dProjectVisit->project->reference
                        ]
                    ),
                );
            }
            DB::commit();

            return $dProjectVisit;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th->getMessage());
        }
    }

    public function validationVisit($data, DProjectVisit $dProjectVisit)
    {
        $state = $data['state'];
        if (
            $state == $dProjectVisit->state
            || $dProjectVisit->state != DVisiteState::PENDING->value
        ) {
            throw new CustomException('La visite est déja mis à jour.');
        }

        $dProjectVisit->update($data);
        createNotificationProject(
            $dProjectVisit->project,
            __(
                'notifications.project.visit.validation.' . $data['state'] . '.subject'
            ),
            getParentCompany()->admin,
            __(
                'notifications.project.visit.validation.' . $data['state'] . '.description'
            )
        );
    }

    public function updateVisit($state, DProjectVisit $dProjectVisit)
    {
        if (
            $dProjectVisit->state == $state
        ) {
            throw new CustomException('La visite est déjà dans cet état.');
        }

        $dProjectVisit->update(['state' => $state]);
    }

    public function delete(DProjectVisit $dProjectVisit): void
    {
        $dProjectVisit->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectVisit::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectVisit::myCompanyVisits(auth()->user()), $filters);
    }

    public function getAllByProject($filters, $dProject)
    {
        $user = auth()->user();
        if ($user->role != DCompanyProfile::MAR->value . '::admin') {
            return collection(
                $this->dProjectVisit::myCompanyVisits($user)->where(
                    'd_project_id',
                    $dProject->id
                ),
                $filters
            );
        }

        return collection(
            $this->dProjectVisit::where('d_project_id', $dProject->id),
            $filters
        );
    }

    public function getVisitors()
    {
        $company = auth()->user()->company;
        $mar = [
            'type' => 'company',
            'id' => $company->id,
            'trade_name' => $company->trade_name,
        ];

        return $company->children->flatMap(function ($child) {
            $relatedCompany = $child->child;
            $hasAudit = $relatedCompany->operations()->where(
                'type',
                POperationType::AUDIT->value
            )->exists();

            return $hasAudit ? [
                [
                    'type' => 'company',
                    'id' => $child->d_company_child_id,
                    'name' => $relatedCompany->name,
                ],
            ] : [];
        })->push($mar);
    }

    public function inspectorList()
    {
        return $this->dProjectVisit::where('user_id', auth()->user()->id)->get();
    }

    public function finishVisit($dProjectVisit)
    {
        if ($dProjectVisit->state == DVisiteState::CANCELED->value) {
            throw new CustomException('Cette visite est annulée.');
        }
        $dProjectVisit->update([
            'state' => DProjectVisitState::FINISHED->value
        ]);
        $project = $dProjectVisit->project;
        $projectStepService = new ProjectStepService($project);
        $projectStepService->initFinishVisitDocs($project);
        if ($project->installer_company && $dProjectVisit->type == PTypeVisitEnum::VISIT_INSTALLER->value) {
            $admins = $project->installer_company->admins;
            $message = __(
                'notifications.project.visit.terminer',
                [
                    'reference' => $project->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $project->id,
                config('custom_routes.projects.update')
            );
            $marAdmins = $dProjectVisit->project->company->admins;
            sendNotificationUser(
                "la 1ère visite Mar est terminé avec succès",
                $message,
                $configUrl,
                null,
                array_merge($admins->toArray(), $marAdmins->toArray())
            );
            if ($dProjectVisit->project->auditor_company) {
                if ($marAdmins = $dProjectVisit->project->company->id !== $dProjectVisit->project->auditor_company->id) {
                    sendNotificationUser(
                        "la 1ère visite Mar est terminé avec succès",
                        $message,
                        $configUrl,
                        null,
                        $dProjectVisit->project->auditor_company->admins
                    );
                }
            }
        }
    }
}
