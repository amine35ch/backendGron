<?php

namespace App\Http\Controllers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DDocumentEnum\DDocumentKeyEnum;
use App\Enums\DInvoiceEnum\DInvoiceType;
use App\Enums\DProjectDecisionEnum;
use App\Enums\DProjectDocumentEnum\DProjectFormStatus;
use App\Enums\DProjectEnum\DProjectTypeCreation;
use App\Enums\FeatureEnum\FeatureType;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PStepEnum\PStepOrder;
use App\Http\Requests\DDocumentRequests\ProjectAttachementAnyDocumentsRequest;
use App\Http\Requests\DDocumentRequests\ProjectAttachementDocumentsRequest;
use App\Http\Requests\DDocumentRequests\ProjectInvoiceInstallerDocumentsRequest;
use App\Http\Requests\DProjectDecisionRequests\UpdateDecisionRequest;
use App\Http\Requests\DProjectEventRequests\DProjectEventStoreRequest;
use App\Http\Requests\DProjectRequests\ActualDateWorkUpdateRequest;
use App\Http\Requests\DProjectRequests\AnahResponseRequest;
use App\Http\Requests\DProjectRequests\AttestationFormStoreRequest;
use App\Http\Requests\DProjectRequests\CerfaRequest;
use App\Http\Requests\DProjectRequests\CurrentStepUpdateRequest;
use App\Http\Requests\DProjectRequests\DateWorkUpdateRequest;
use App\Http\Requests\DProjectRequests\DProjectAuditFormRequest;
use App\Http\Requests\DProjectRequests\DprojectDerogationCriteriaRequest;
use App\Http\Requests\DProjectRequests\DProjectPVReceptionFormRequest;
use App\Http\Requests\DProjectRequests\DprojectRestModalityUpdateRequest;
use App\Http\Requests\DProjectRequests\DProjectStoreRequest;
use App\Http\Requests\DProjectRequests\DProjectStoreRequestFiles;
use App\Http\Requests\DProjectRequests\DProjectUpdateRequest;
use App\Http\Requests\DProjectRequests\DProjectUpdateStateRequest;
use App\Http\Requests\DProjectRequests\DProjectUpdateStatusRequest;
use App\Http\Requests\DProjectRequests\InvoiceCancelRequest;
use App\Http\Requests\DProjectRequests\InvoiceUpdateRequest;
use App\Http\Requests\DProjectRequests\InvoiceValidationRequest;
use App\Http\Requests\DProjectRequests\ProjectInstallerRequest;
use App\Http\Requests\DProjectRequests\ProjectWorkArticleRequest;
use App\Http\Requests\DProjectRequests\QuotationWorkRequest;
use App\Http\Requests\DProjectRequests\SetOperationAgentRequest;
use App\Http\Requests\DProjectRequests\SimulationRequest;
use App\Http\Requests\DProjectRequests\UpdateAmountInvoice;
use App\Http\Requests\DProjectRequests\UpdateAnahFolderRequest;
use App\Http\Requests\DProjectRequests\UpdateDepotAnahRequest;
use App\Http\Requests\DProjectRequests\UpdateGeneralInformationRequest;
use App\Http\Requests\DProjectRequests\UpdateMergeAgentRequest;
use App\Http\Requests\DProjectRequests\UpdateOperationsRequest;
use App\Http\Requests\DProjectRequests\ValidationMarWorkInstallerRequest;
use App\Http\Requests\DProjectRequests\ValidationMarWorkRequest;
use App\Http\Requests\DProjectRequests\WorkStoreByInstallerRequest;
use App\Http\Resources\DProjectEventResources\DProjectEventCollection;
use App\Http\Resources\DProjectResources\DProjectCollection;
use App\Http\Resources\DProjectResources\DProjectResource;
use App\Http\Resources\DProjectResources\DProjectResourcePublic;
use App\Http\Resources\DProjectVisitResources\DProjectVisitCollection;
use App\Models\DCompany;
use App\Models\DInvoiceReference;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectVisit;
use App\Models\PDocument;
use App\Services\DClientServices\DClientService;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectServices\DProjectService;
use App\Services\DProjectServices\GenerateFormService;
use App\Services\DProjectServices\ProjectStepService;
use App\Services\DProjectVisitServices\DProjectVisitService;
use App\Services\DResponseForm\DResponseFormService;
use App\Services\SubscriptionServices\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DProjectController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Projet non trouvé.';

    public function __construct(
        private DProjectService $dProjectService,
        private ProjectStepService $projectStepService,
        private DResponseFormService $dResponseFormService,
        private DProjectDocument $dProjectDocument,
        private DClientService $dClientService,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjects = $this->dProjectService->getAll($request->all());

        return response()->json(
            new DProjectCollection($dProjects)
        );
    }

    public function getAllInvoices(Request $request)
    {
        $dProjects = $this->dProjectService->getAllInvoices($request->all());

        return response()->json(
            new DProjectCollection($dProjects)
        );
    }

    public function export(Request $request)
    {
        return $this->dProjectService->export($request->all());
    }

    public function getProjectsInvoices(Request $request)
    {
        $dProjects = $this->dProjectService->getAll($request->all());

        return response()->json(
            new DProjectCollection($dProjects)
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVisits(DProject $dProject, Request $request)
    {
        $visits = (new DProjectVisitService(
            new DProjectVisit()
        ))->getAllByProject($request->all(), $dProject);

        return response()->json(
            new DProjectVisitCollection($visits)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectStoreRequest $request): JsonResponse
    {
        $subscriptionService = new SubscriptionService();
        $user = auth()->user();
        $subscriptionService->validateFeature($user->company_code, FeatureType::PROJECT->value);
        $dProject = $this->dProjectService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project.create'),
                'data' => new DProjectResource($dProject),
            ],
            201
        );
    }
    public function publicStore(DProjectStoreRequest $request, $token): JsonResponse
    {
        try {
            //code...
            $subscriptionService = new SubscriptionService();
            $childToken = $token;
            $parts = [];
            if (strpos($token, '-') !== false) {
                $parts = explode('-', $token);
            }
            if (count($parts) > 1) {
                $parentCompany = DCompany::where('linkToken', $parts[0])->first();
                if (!$parentCompany) {
                    throw new \Exception('Lien Invalid');
                }
                $subscriptionService->validateFeature($parentCompany->company_code, FeatureType::PROJECT->value);
                $childToken = $parts[1];
            }else{
                $parts=$token;
            }
            $company = DCompany::where('linkToken', $childToken)->first();
            $subscriptionService->validateFeature($company->company_code, FeatureType::PROJECT->value);
            $request["token"] = $childToken;
            $request['project_type'] = DProjectTypeCreation::DEMANDE->value;
            $dProject = $this->dProjectService
                ->create($request->validated(), $parts);

            return response()->json(
                [
                    'message' => __('responses.project.create'),
                    'data' => new DProjectResourcePublic($dProject),
                ],
                201
            );
        } catch (\Throwable $th) {
                       return response()->json(
                [
                    'message' => "error",
                ],
                500
            );

        }
    }
    public function publicStoreDocs(DProjectStoreRequestFiles $request, $token): JsonResponse
    {
        $subscriptionService = new SubscriptionService();
        $parts[1] = $token;
        if (strpos($token, '-') !== false) {
            $parts = explode('-', $token);
        }
        if (count($parts) > 1) {
            $parentCompany = DCompany::where('linkToken', $parts[0])->first();
            if (!$parentCompany) {
                throw new \Exception('Lien Invalid');
            }
            $subscriptionService->validateFeature($parentCompany->company_code, FeatureType::PROJECT->value);
        }
        $company = DCompany::where('linkToken', $parts[1])->first();
        $subscriptionService->validateFeature($company->company_code, FeatureType::PROJECT->value);
        $dProject = $this->dProjectService
            ->attachDocuments($request->validated(), );

        return response()->json(
            [
                'message' => __('responses.project.create'),
                'data' => new DProjectResourcePublic($dProject),
            ],
            201
        );
    }
    /**
     * Display the specified resource.
     */
    public function show(DProject $dProject): JsonResponse
    {
        return response()->json(new DProjectResource($dProject));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectUpdateRequest $request, DProject $dProject): JsonResponse
    {
        $this->dProjectService->edit($request->validated(), $dProject);

        return response()->json([
            'message' => __('responses.project.update'),
            'data' => new DProjectResource($dProject),
        ], 200);
    }
    public function AcceptProject(DProject $dProject)
    {
        $this->dProjectService->acceptProject($dProject);
        $this->dClientService->acceptClient($dProject->d_client_id);

        return response()->json([
            'message' => __('responses.project.update'),
        ], 200);
    }

    public function refuseProject(DProject $dProject)
    {
        $this->dProjectService->refuseProject($dProject);
        $this->dClientService->refuseClient($dProject->d_client_id);

        return response()->json([
            'message' => __('responses.project.update'),
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProject $dProject, Request $request): JsonResponse
    {
        $this->dProjectService->delete($dProject);

        return response()->json([
            'message' => __('responses.project.delete'),
        ], 202);
    }

    public function checkMaxProject()
    {
        $this->dProjectService->checkMaxProjects();
    }

    public function generateNextStep(
        DProject $dProject,
        ProjectStepService $dProjectStepService
    ) {
        $dProjectStepService->generateNextStep($dProject);

        return response()->json(202);
    }

    // public function forwardStep(
    //     DProject $dProject,
    //     ProjectStepService $dProjectStepService
    // ) {
    //     $dProjectStepService->forwardStep($dProject);

    //     return response()->json(202);
    // }

    public function generateDocument(DProject $dProject, PDocument $pDocument, DProjectDocument $documentProject = null)
    {
        $this->dProjectService->setGeneratedDocument($dProject, $pDocument, $documentProject);

        return response()->json([
            'message' => __('responses.document.generate'),
        ], 202);
    }

    public function setClientQualification(
        UpdateDecisionRequest $request,
        DProject $dProject
    ) {
        $decision = $request->input('decision');
        $this->dProjectService->setDecision(
            $dProject,
            'qualification',
            $decision,
        );

        $message = __(
            'logs.qualification.description',
            [
                'decision' => $decision == DProjectDecisionEnum::ACCEPTED->value ? 'a' :
                    "n'a pas",
                'step' => $dProject->step->display_name,
            ]
        );

        setProjectHistory(
            $dProject,
            __('logs.qualification.action'),
            $message
        );

        setLog($message . $dProject->reference);

        return response()->json([
            'message' => __('actions.success'),
        ], 200);
    }

    public function endProcessFromDecision(
        DProject $dProject
    ) {
        $this->dProjectService->endProcessFromDecision(
            $dProject,
        );

        return response()->json([
            'message' => __('actions.success'),
        ], 200);
    }

    public function getProjectSteps(DProject $dProject)
    {
        return $this->dProjectService->getProjectSteps($dProject);
    }

    public function attachAnyDocuments(
        ProjectAttachementAnyDocumentsRequest $request,
        DProject $dProject,
    ) {
        $this->dProjectService->attachAnyDocuments(
            $dProject,
            $request->validated()
        );

        return response()->json(
            [
                'message' => __('responses.document.create'),
            ],
            202
        );
    }

    public function attachDocuments(
        ProjectAttachementDocumentsRequest $request,
        DProject $dProject,
        PDocument $pDocument = null
    ) {
        $data = $request->validated();
        (new DDocumentService())->attachDocuments(
            $dProject,
            $data + ['type_doc' => $pDocument?->type],
            'd_project_id',
            $pDocument
        );
        $message = __(
            'logs.project.upload_document.description',
            [
                'document' => $pDocument?->entitled ?? $request->input('name'),
                'admin' => auth()->user()->username,
            ]
        );

        setProjectHistory(
            $dProject,
            __(
                'logs.project.upload_document.action',
                [
                    'document' => $pDocument?->entitled ?? $request->input('name'),
                    'admin' => auth()->user()->username,
                ]
            ),
            $message
        );
        setLog(__('logs.project.upload_document.description', [
            'step' => $dProject->step->display_name,
            'document' => $data['name'],
            'admin' => auth()->user()->username,
        ]));

        return response()->json(
            [
                'message' => __('responses.document.create'),
            ],
            202
        );
    }

    public function attachInvoiceInstaller(
        ProjectInvoiceInstallerDocumentsRequest $request,
        DProjectInvoiceHeader $dProjectInvoiceHeader
    ) {
        $dProjectDocument = DProjectDocument::where([
            ['d_company_id', $dProjectInvoiceHeader->d_company_id],
            ['d_project_id', $dProjectInvoiceHeader->d_project_id],
            ['type_doc', 16],
        ])->first();
        if (!$dProjectDocument) {
            $installer = DCompany::where('id', $dProjectInvoiceHeader->d_company_id)->first();
            $dProjectDocument = DProjectDocument::create(
                [
                    'd_project_id' => $dProjectInvoiceHeader->d_project_id,
                    'd_company_id' => $dProjectInvoiceHeader->d_company_id,
                    'type_doc' => 16,
                    'name' => 'Devis Entreprise retenue (' . $installer->trade_name . ')',
                    'order_step' => 8,
                    'path' => '',
                    'version_count' => 0,
                ]
            );
        }
        $data = $request->validated();
        $newData =
            $data + ['type_doc' => $dProjectDocument?->type_doc];
        (new DDocumentService())->attachInvoiceInstaller(
            $dProjectDocument,
            $newData
        );
        $message = __(
            'logs.project.upload_document.description',
            [
                'document' => $dProjectDocument?->entitled ?? $request->input('name'),
                'admin' => auth()->user()->username,
            ]
        );

        setProjectHistory(
            $dProjectDocument->project,
            __(
                'logs.project.upload_document.action',
                [
                    'document' => $dProjectDocument?->entitled ?? $request->input('name'),
                    'admin' => auth()->user()->username,
                ]
            ),
            $message
        );
        setLog(__('logs.project.upload_document.description', [
            'step' => $dProjectDocument->project->step->display_name,
            'document' => $dProjectDocument->name,
            'admin' => auth()->user()->username,
        ]));

        return response()->json(
            [
                'message' => __('responses.document.create'),
            ],
            202
        );
    }

    public function prevStep(DProject $dProject)
    {
        $dProject->update(['current_step_order' => $dProject->step->prev_step_order]);

        return response()->json(200);
    }

    public function generatedFormProject(
        DProject $dProject,
        PDocument $pDocument,
    ) {
        if (!canEditDocument($dProject, $pDocument->id, auth()->user())) {
            abort(403, 'Unauthorized action.');
        }
        $projectDocument = $this->dProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->firstOrFail();
        if ($projectDocument->status < DProjectFormStatus::FILLED->value) {
            return response()->json(['message' => 'Vous nous pouvez pas générer cet formulaire.'], 404);
        }
        setLog(__(
            'logs.form.generate'
        ) . $dProject->reference);

        return (new GenerateFormService())->generatePdf(
            $dProject,
            $projectDocument,
            $pDocument
        );
    }

    public function saveFormChanges(
        DProject $dProject,
        PDocument $pDocument,
        Request $request
    ): JsonResponse {
        if (!canEditDocument($dProject, $pDocument->id, auth()->user())) {
            abort(403, 'Unauthorized action.');
        }
        $project = DProject::with('formResponse')->select('id')->whereId($dProject->id)->first();
        $this->dResponseFormService->saveForm($project, $request, $pDocument, $this->dProjectDocument);
        $projectDocument = $this->dProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->firstOrFail();

        (new GenerateFormService())->generatePdf(
            $dProject,
            $projectDocument,
            $pDocument
        );
        $this->dProjectService->setDocumentGenerated($projectDocument, $pDocument);
        setLog(__(
            'logs.form.save',
            [
                'document' => $pDocument->entitled,
                'username' => auth()->user()->username,
            ]
        ) . $dProject->reference);

        $message = __(
            'logs.form.generate',
            [
                'document' => $pDocument->entitled,
                'username' => auth()->user()->username,
            ]
        );

        setProjectHistory(
            $dProject,
            __(
                'logs.form.action',
                [
                    'document' => $pDocument->entitled,
                    'username' => auth()->user()->username,
                ]
            ),
            $message
        );

        return response()->json(['message' => __('responses.form.save')], 200);
    }

    public function finishForm(DProject $dProject, PDocument $pDocument): JsonResponse
    {
        if (!canEditDocument($dProject, $pDocument->id, auth()->user())) {
            abort(403, 'Unauthorized action.');
        }
        $projectDocument = $this->dProjectDocument::where('d_project_id', $dProject->id)
            ->where('type_doc', $pDocument->type)->first();
        $projectDocument->status = DProjectFormStatus::FINISHED->value;
        $projectDocument->save();
        setLog(__(
            'logs.form.finish'
        ) . $dProject->reference);

        return response()->json(['message' => __('responses.form.finish')], 200);
    }

    public function getForm(DProject $dProject, PDocument $pDocument): JsonResponse
    {
        $form = $this->dResponseFormService->getForm($dProject, $pDocument);

        return response()->json($form);
    }

    public function saveSimulation(DProject $dProject, SimulationRequest $request)
    {
        $data = $request->validated();

        $this->dProjectService->saveSimulation(
            $dProject,
            $data
        );


        if (!in_array(auth()->user()->profile, [DCompanyProfile::MAR->value, DCompanyProfile::INS->value]) && $dProject->cleared_step_order < PStepOrder::StepGenerateInitialDocument->value) {
            return response()->json([
                'message' => __('responses.simulation.update_not_mar'),
            ], 202);
        }

        return response()->json([
            'message' => __('responses.simulation.update'),
        ], 202);
    }



    public function saveQuotationWork(DProject $dProject, QuotationWorkRequest $request)
    {
        $invoiceHeader = $this->dProjectService->updateQuotationWorkA($request->validated(), $dProject);
        $dProject = $dProject->fresh();
        $this->dProjectService->generateDevis($dProject, PDocumentType::DEVIS_ENTREPRISE_RETENUE->value, true);
        $this->dProjectService->generateDevis($dProject, PDocumentType::PROJET_DE_TRAVAUX->value);
        $this->dProjectService->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);

        setLog(__('logs.project.add_invoice.description', [
            'installer' => $dProject?->installer?->company?->reference,
            'reference' => $invoiceHeader->reference,
            'admin' => auth()->user()->username,
        ]));

        return response()->json([
            'message' => __('actions.success'),
            'data' => $invoiceHeader,
        ], 202);
    }

    public function deleteQuotationWork(DProjectInvoiceHeader $invoice)
    {
        $invoice->delete();
        return response()->json([
            'message' => __('actions.success')
        ], 202);
    }

    public function updateQuotationWork(DProject $dProject, QuotationWorkRequest $request)
    {
        $invoiceHeader = $this->dProjectService->updateQuotationWorkA($request->validated(), $dProject);
        return;
        $dProject = $dProject->fresh();
        // $this->dProjectService->generateDevis($dProject, PDocumentType::DEVIS_ENTREPRISE_RETENUE->value, true);
        $this->dProjectService->generateWorkDevis($dProject, PDocumentType::DEVIS_ENTREPRISE_RETENUE->value, true, $request->installer);
        $this->dProjectService->generateDevis($dProject, PDocumentType::PROJET_DE_TRAVAUX->value);
        $this->dProjectService->generateDevis($dProject, PDocumentType::ATTESTATION_TRAVAUX_PARCOURS_ACCOMPAGNE_DEVIS->value);

        setLog(__('logs.project.add_invoice.description', [
            'installer' => $dProject?->installer?->company?->reference,
            'reference' => $invoiceHeader->reference,
            'admin' => auth()->user()->username,
        ]));

        return response()->json([
            'message' => __('actions.success'),
            'data' => $invoiceHeader,
        ], 202);
    }

    public function getReference($installer)
    {
        $modelReference = DInvoiceReference::where('d_company_id', $installer)
            ->where('type', DInvoiceType::DEVIS->value)
            ->first();
        if (!$modelReference) {
            return null;
        }
        $currentCode = $modelReference->current_count;
        $numberWithoutZeros = intval($currentCode);

        $currentCode = generateNewCode(
            $numberWithoutZeros,
            $currentCode
        );

        return response()->json(['reference' => $modelReference->prefix . $currentCode]);
    }

    public function saveCerfa(DProject $dProject, CerfaRequest $request)
    {
        $data = $request->validated();

        if (!count($data)) {
            return response()->json([
                'message' => __('Aucune donnée n\'a été saisie.'),
            ], 404);
        }
        $this->dProjectService->updateCerfa(
            $dProject,
            $data
        );

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getDocuments(DProject $dProject)
    {
        return response()->json([
            'data' => $dProject->documents,
        ], 202);
    }

    public function generateDocumentsFromBladeOnly(DProject $dProject, PDocument $pDocument)
    {
        $this->dProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->first();

        $this->dProjectService->generateSimulation(
            $dProject,
        );
        setLog(__(
            'logs.document.generate'
        ) . $dProject->reference);

        return response()->json(['message' => __('responses.document.generate')], 200);
    }

    public function setInstallerInOperations(
        DProject $dProject,
        ValidationMarWorkInstallerRequest $request
    ) {
        $this->dProjectService->setWorksWithScenario(
            $request->validated(),
            $dProject,
        );

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function validationWorksMar(DProject $dProject, ValidationMarWorkRequest $request)
    {
        $this->dProjectService->setWorksWithScenario($request->validated(), $dProject);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function setWorksByInstaller(DProject $dProject, WorkStoreByInstallerRequest $request)
    {
        $this->dProjectService->createWorks($request->validated()['works'], $dProject);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getProjectInstallers(DProject $dProject)
    {
        return response()->json($this->dProjectService->getProjectInstallers($dProject));
    }

    public function selectProjectInstaller(DProject $dProject, ProjectInstallerRequest $request)
    {
        $this->dProjectService->selectInstaller($dProject, $request->input('installer'));

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function addProjectWorkArticles(DProject $dProject, ProjectWorkArticleRequest $request)
    {
        $this->dProjectService->addProjectWorkArticles($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function addProjectEvent(DProject $dProject, DProjectEventStoreRequest $request)
    {
        $this->dProjectService->addProjectEvent(
            $dProject,
            $request->validated()
        );

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getCompaniesWithoutMAN(DProject $dProject)
    {
        return response()->json($this->dProjectService->getCompanies($dProject));
    }

    public function updateOperations(DProject $dProject, UpdateOperationsRequest $request)
    {
        $this->dProjectService->updateOperations($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function updateWorkDates(DProject $dProject, DateWorkUpdateRequest $request)
    {
        $this->dProjectService->updateWorkDates($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }
    public function updatActualWorkDates(DProject $dProject, ActualDateWorkUpdateRequest $request)
    {
        $this->dProjectService->updateAcualWorkDates($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getInvoices(DProject $dProject, $type = null)
    {
        if ($type !== null) {
            return response()->json($dProject->invoices->where('type', $type)->first());
        }

        return response()->json($dProject->invoices);
    }

    public function getInstallerInvoice(DProject $dProject)
    {
        return response()->json($this->dProjectService->getInstallerInvoice($dProject));
    }

    public function updateInvoice(
        DProject $dProject,
        DProjectInvoiceHeader $invoiceHeader,
        InvoiceUpdateRequest $request
    ) {
        if (!$dProject->contractReference) {
            do {
                $newReference = getNextContractReference('contract');
            } while ($this->isContractReferenceTaken($newReference));

            $dProject->contractReference = $newReference;
            $dProject->save();
        }
        $this->dProjectService->updateInvoice($dProject, $invoiceHeader, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function isContractReferenceTaken($reference)
    {
        return DProject::where('contractReference', $reference)->exists();
    }

    public function validationInvoiceInstaller(DProject $dProject, InvoiceValidationRequest $request)
    {
        $this->dProjectService->validationInvoiceInstaller($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function validationWorkInvoiceInstaller(DProjectInvoiceHeader $invoice)
    {
        $this->dProjectService->validationWorkInvoiceInstaller($invoice);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function cancelWorkInvoiceInstaller(DProjectInvoiceHeader $invoice)
    {
        $this->dProjectService->cancelWorkInvoiceInstaller($invoice);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function cancelInvoiceInstaller(DProject $dProject, InvoiceCancelRequest $request)
    {
        $this->dProjectService->cancelInvoiceInstaller($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getEvents(DProject $dProject)
    {
        return response()->json([
            'data' => new DProjectEventCollection($dProject->events),
        ], 202);
    }

    public function updateDerogationRequestCriteria(DprojectDerogationCriteriaRequest $request, DProject $dProject)
    {
        $this->dProjectService->updateDerogationRequestCriteria($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function updateRestPaymentModality(DprojectRestModalityUpdateRequest $request, DProject $dProject)
    {
        $this->dProjectService->updateRestPaymentModality($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function startWorkEvent(DProject $dProject)
    {
        $this->dProjectService->startWorkEvent($dProject);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function saveAuditForm(DProjectAuditFormRequest $request, DProject $dProject)
    {
        $this->dProjectService->saveAuditForm($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function savePvReceptionForm(DProjectPVReceptionFormRequest $request, DProject $dProject)
    {
        $this->dProjectService->savePVReceptionForm($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function DownloadableDocs(PDocument $pDocument)
    {
        $filePath = resource_path('downloads/' . $pDocument->reference . '.pdf');

        if ($pDocument->downloadable !== 1) {
            return response()->json(['Vous ne pouvez pas télécharger ce document.'], 404);
        }

        if (!file_exists($filePath)) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response()->download($filePath);
    }

    public function updateAmount(
        UpdateAmountInvoice $request,
        DProject $dProject
    ) {
        $this->dProjectService->updateAmountInvoice($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function UpdateGeneralInformation(DProject $dProject, UpdateGeneralInformationRequest $request)
    {
        $this->dProjectService->updateGeneralInformation($request->validated(), $dProject);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function updateStatus(
        DProjectUpdateStatusRequest $request,
        DProject $dProject
    ) {
        $dProject->update(['status' => $request->validated()['status']]);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function downloadAllDocuments(DProject $dProject, $key = 0)
    {
        $documents = $dProject->documents;
        if ($key != DDocumentKeyEnum::ALL->value) {
            $documents = $documents->where('exported', $key);
        }
        [$path, $zipFileName] = (new DDocumentService())->createZip($dProject, $documents, $key);

        return response()->download($path, $zipFileName)->deleteFileAfterSend(true);
    }

    /**
     * Display the specified resource.
     */
    public function viewStep(DProject $dProject, $order): JsonResponse
    {
        $dProject->current_step_order = $order;
        $step = $dProject->processType->steps->where('order', $order)->count();
        if (!$step) {
            return response()->json(
                [
                    'message' => 'Etape non trouvé',
                ],
                404
            );
        }

        return response()->json(new DProjectResource($dProject));
    }

    public function UpdateCurrentStep(CurrentStepUpdateRequest $request, DProject $dProject)
    {
        if (!$dProject->cleared_step_order >= $request->step_order) {
            return response()->json([
                'message' => 'Le champ step order est supérieur a l\'étape franchie',
            ], 422);
        }
        $this->dProjectService->updateCurrentStep($request->validated(), $dProject);

        return response()->json([
            'message' => __('responses.project.update'),
        ], 202);
    }

    public function setAgentOperations(
        SetOperationAgentRequest $request,
        DProject $dProject
    ) {
        $this->dProjectService->updateAgentOperations($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function sendDocsToSign(Request $request, DProject $dProject, PDocument $pDocument)
    {
        $this->authorize('sign document');
        if ($pDocument->docu_signature == 1 && $pDocument->reference !== 'ceeData') {
            // $docuSignService = new \App\Services\DocuSignServices\DocuSignService();
            // $docuSignService->signDocument($dProject, $pDocument);

            if ($pDocument->docu_signature == 1 && $pDocument->reference !== 'ceeData') {
                $request->validate([
                    'email' => 'required|email',
                    'phone_number' => 'nullable|string',
                ]);
                $this->dProjectService->signDocument(
                    $request->only([
                        'email',
                        'phone_number'
                    ]),
                    $dProject,
                    $pDocument
                );

                return response()->json([
                    'message' => __('actions.success'),
                ], 202);
            }
            return response()->json([
                'message' => __('actions.success'),
            ], 202);
        }

        return response()->json([
            'message' => 'Vous ne pouvez pas envoyer ce document car vous ne pouvez pas le signer.',
        ], 404);
    }

    public function updateAnahFolder(UpdateAnahFolderRequest $request, DProject $dProject)
    {
        $this->dProjectService->updateAnahFolder($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function mergeAgent(UpdateMergeAgentRequest $request, DProject $dProject)
    {
        $dProject->update([
            'merge_agent' => $request->merge_agent,
        ]);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function updateProjectState(DProject $dProject, DProjectUpdateStateRequest $request)
    {
        $this->dProjectService->updateState($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function updateDepotAnah(UpdateDepotAnahRequest $request, DProject $dProject)
    {
        $this->dProjectService->updateDepotAnah($dProject, $request->validated());

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function secondDepotAnah(DProject $dProject)
    {
        $this->dProjectService->secondDepotAnah($dProject);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    // public function attestationDeTravauxFormStore(AttestationFormStoreRequest $request, DProject $dProject)
    // {
    //     $this->dProjectService->attestationDeTravauxFormStore($dProject, $request->validated());

    //     return response()->json([
    //         'message' => __('actions.success'),
    //     ], 202);
    // }

    public function anahResponse(AnahResponseRequest $request, DProject $dProject)
    {
        $this->dProjectService->anahResponse($dProject, $request->validated());
        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getCancelComments(DProject $dProject)
    {
        return response()->json([
            'data' => $this->dProjectService->getCancelComments($dProject)
        ]);
    }
}
