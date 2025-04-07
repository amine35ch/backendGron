<?php

use App\Http\Controllers\DSignatureLineController;
use App\Http\Controllers\DGeneralNotificationController;
use App\Http\Controllers\PNotificationTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DArticleController;
use App\Http\Controllers\DArticlePriceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DBrandController;
use App\Http\Controllers\DBrandLineController;
use App\Http\Controllers\DClientController;
use App\Http\Controllers\DClientDocumentController;
use App\Http\Controllers\DClientDocumentVersionController;
use App\Http\Controllers\DCompanyChildController;
use App\Http\Controllers\DCompanyController;
use App\Http\Controllers\DCompanyDocumentController;
use App\Http\Controllers\DCompanyDocumentVersionController;
use App\Http\Controllers\DDocumentViewController;
use App\Http\Controllers\DGovernmentController;
use App\Http\Controllers\DInvoiceCancelCommentController;
use App\Http\Controllers\DInvoiceReferenceController;
use App\Http\Controllers\DLogController;
use App\Http\Controllers\DMailingController;
use App\Http\Controllers\DModelReferenceController;
use App\Http\Controllers\DNotificationController;
use App\Http\Controllers\DProductController;
use App\Http\Controllers\DProjectCommentsController;
use App\Http\Controllers\DProjectController;
use App\Http\Controllers\DProjectDocumentController;
use App\Http\Controllers\DProjectDocumentVersionController;
use App\Http\Controllers\DProjectEventController;
use App\Http\Controllers\DProjectHistoryController;
use App\Http\Controllers\DProjectInvoiceHeaderController;
use App\Http\Controllers\DProjectOperationController;
use App\Http\Controllers\DProjectReclamationController;
use App\Http\Controllers\DProjectReclamationWorkController;
use App\Http\Controllers\DProjectSemulationController;
use App\Http\Controllers\DProjectThirdPartyController;
use App\Http\Controllers\DProjectVisitController;
use App\Http\Controllers\DProjectWorkController;
use App\Http\Controllers\DScenarioController;
use App\Http\Controllers\DVisitUserController;
use App\Http\Controllers\DWorkController;
use App\Http\Controllers\GenerateDocumentController;
use App\Http\Controllers\PArticleController;
use App\Http\Controllers\PArticleTypeController;
use App\Http\Controllers\PBarController;
use App\Http\Controllers\PBonusController;
use App\Http\Controllers\PCategoryController;
use App\Http\Controllers\PClassSkipCountController;
use App\Http\Controllers\PDocumentController;
use App\Http\Controllers\PDocumentQuestionController;
use App\Http\Controllers\PFormController;
use App\Http\Controllers\PMarScaleController;
use App\Http\Controllers\PNatureResidenceController;
use App\Http\Controllers\POperationController;
use App\Http\Controllers\POperationDocumentController;
use App\Http\Controllers\PPermissionController;
use App\Http\Controllers\PPhaseController;
use App\Http\Controllers\PProfileController;
use App\Http\Controllers\PProjectEnergyClassController;
use App\Http\Controllers\PProjectIncomeClassController;
use App\Http\Controllers\PProjectNatureController;
use App\Http\Controllers\PProjectResidenceController;
use App\Http\Controllers\PProjectTypeController;
use App\Http\Controllers\PQualificationController;
use App\Http\Controllers\PRaisonTypesController;
use App\Http\Controllers\PScaleController;
use App\Http\Controllers\PSmtpController;
use App\Http\Controllers\PStateController;
use App\Http\Controllers\PStatusController;
use App\Http\Controllers\PStepController;
use App\Http\Controllers\PSubCategoryController;
use App\Http\Controllers\PTVAController;
use App\Http\Controllers\PTypeClientController;
use App\Http\Controllers\PTypeCollaboratorController;
use App\Http\Controllers\PTypeDemandeProjectController;
use App\Http\Controllers\PTypeDocumentController;
use App\Http\Controllers\PTypeEventController;
use App\Http\Controllers\PTypeInvoiceController;
use App\Http\Controllers\PTypeVisitController;
use App\Http\Controllers\PUnitController;
use App\Http\Controllers\PWorkTypeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TeamUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GlobalCheckSubscription;
use App\Models\DArticle;
use App\Models\DArticlePrice;
use App\Models\DBrand;
use App\Models\DClient;
use App\Models\DCompany;
use App\Models\DGovernment;
use App\Models\DLog;
use App\Models\DProject;
use App\Models\DProjectEvent;
use App\Models\DProjectVisit;
use App\Models\DScenario;
use App\Models\DWork;
use App\Models\PArticle;
use App\Models\POperation;
use App\Models\PSmtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/publicStore/{token}', [
    DClientController::class,
    'publicStore',
]);

Route::post('/publicStoreProject/{token}', [DProjectController::class, 'publicStore']);
Route::post('/publicStoreDocuments/{token}', [DProjectController::class, 'publicStoreDocs']);


Route::get('update/token', function () {
    dispatch(new \App\Jobs\RefreshDocusignAccessToken());
});

Route::get('web/test/job', function () {

    $docuSignService = new \App\Services\DocuSignServices\DocuSignService();
    // $docuSignService->envelopeSigned([
    //     'event' => 'signing_complete',
    //     'data' => [
    //         'envelopeId' => 'c1f31c2c-4440-467d-aceb-e5ca70cff814',
    //         'status' => 'completed',
    //     ],
    // ]);
    $docuSignService->getAccountIdentityVerification();
});
Route::post('web/document-signed', function (Request $request) {
    // get basic auth credentials from the request
    $credentials = $request->header('Authorization');

    $credentials = base64_decode(substr($credentials, 6));
    try {
        $userName = explode(':', $credentials)[0];
        $password = explode(':', $credentials)[1];
    } catch (\Exception $e) {
        return response()->json(['message' => 'error'], 401);
    }

    $user = User::where([
        'username' => $userName,
        'company_code' => env("COMPANY_CODE"),
    ])->first();

    if (!$user) {
        return response(
            [
                'status' => 'failed',
                'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
            ],
            404
        );
    }

    $authData = [
        'username' => $userName,
        'password' => $password,
        'company_code' => env("COMPANY_CODE"),
    ];

    if (!Auth::attempt($authData)) {
        return response(
            [
                'status' => 'failed',
                'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
            ],
            404
        );
    }


    $docuSignService = new \App\Services\DocuSignServices\DocuSignService();


    $docuSignService->envelopeSigned($request->all());


    return response()->json(['message' => 'ok']);
});



Route::get('/web/check-signed-docs', [DProjectDocumentController::class, 'checkSignedDocs']);
Route::post('/web/send-reset-link-email-by-user', [AuthController::class, 'sendResetLinkEmailByUser']);
Route::post('/web/verify-reset-key', [AuthController::class, 'verifyResetKey']);
Route::post('web/reset-password', [AuthController::class, 'resetPassword']);
Route::get('web/version-defaults', [
    DProjectDocumentController::class,
    'updateDefaultToEachDocumentVersionDefault',
]);
Route::get('/', function () {
    return view('welcome');
});

Route::post('web/login', [AuthController::class, 'login']);
Route::prefix('web')->middleware('auth:sanctum')->group(function () {
    // ####################  LOGIN #######################

    Route::post('/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->middleware(GlobalCheckSubscription::class);

    Route::put('logout', [AuthController::class, 'logout']);

    Route::get('logged-user', [AuthController::class, 'loggedInUser']);
    // ############################## smtp ###############################
    Route::prefix('smtps')->group(function () {
        Route::get('/', [PSmtpController::class, 'index'])->middleware('can:viewAny,' . PSmtp::class);
        Route::put('/{smtp}', [PSmtpController::class, 'update'])
            ->middleware(['can:update,smtp', GlobalCheckSubscription::class]);
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [
            DClientController::class,
            'index',
        ])->middleware('can:viewAny,' . DClient::class);
        Route::get('/accepted', [
            DClientController::class,
            'getAccepted',
        ])->middleware('can:viewAny,' . DClient::class);

        Route::get('/prospects', [
            DClientController::class,
            'getProspects',
        ])->middleware('can:viewAny,' . DClient::class);
        Route::get('/export', [
            DClientController::class,
            'export',
        ])->middleware('can:viewAny,' . DClient::class);
        Route::post('/', [
            DClientController::class,
            'store',
        ])->middleware(['can:create,' . DClient::class, GlobalCheckSubscription::class]);
        Route::put('/{client}', [
            DClientController::class,
            'update',
        ])->middleware(['can:update,client', GlobalCheckSubscription::class]);
        Route::put('/{client}/contact-info', [
            DClientController::class,
            'updateContactInfo',
        ])->middleware(['can:update,client', GlobalCheckSubscription::class]);

        Route::put('/{client}/generate', [
            DClientController::class,
            'saveDocumentInitial',
        ])->middleware(GlobalCheckSubscription::class);

        Route::put('/{client}/rib-iban', [DClientController::class, 'UpdateIbanRib'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{client}', [
            DClientController::class,
            'show',
        ])->middleware('can:view,client');

        Route::delete('/{client}', [
            DClientController::class,
            'destroy',
        ])->middleware(['can:delete,client', GlobalCheckSubscription::class]);

        Route::post('/{client}/documents', [
            DClientController::class,
            'attachDocuments',
        ])->middleware(['can:attachDocument,client', GlobalCheckSubscription::class]);

        Route::put('/{client}/disable', [
            DClientController::class,
            'disableClient',
        ])->middleware(['can:update,client', GlobalCheckSubscription::class]);

        Route::get('/{client}/documents', [
            DClientController::class,
            'clientProjectDocuments',
        ])->middleware('can:view,client');
        Route::get(
            '/{client}/download-signature',
            [DClientController::class, 'downloadSignature']
        );

        Route::put('/document/{idDocument}/validated', [
            DClientController::class,
            'validateClientDocument',
        ])->middleware(['can:update,client', GlobalCheckSubscription::class]);
    });
    Route::prefix('root')->group(function () {
        // Route::get(
        //     '/allCompanies',
        //     [DCompanyController::class, 'getAllRootCompanies']
        // );
        Route::get(
            '/allMars',
            [DCompanyController::class, 'getAllRootMars']
        );
        Route::get(
            '/companies',
            [DCompanyController::class, 'getCompaniesRoot']
        );
        Route::put(
            'selfCheckIn/',
            [DCompanyController::class, 'selfCheckInStatus']
        );
        // ->middleware(['can:update,company,identifier', GlobalCheckSubscription::class]);
    });

    Route::prefix('companies')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/inspectors', [UserController::class, 'getInspectors'])
                ->middleware('can:viewAny,' . User::class);
            Route::post('/{role}', [UserController::class, 'store'])
                ->middleware(['can:createUser,' . User::class . ',role', GlobalCheckSubscription::class]);
            Route::get('/', [UserController::class, 'getUsers'])
                ->middleware('can:viewAny,' . User::class);
            Route::get('/superviseur-inspecteur', [UserController::class, 'getSuperviseurInspecteur'])
                ->middleware('can:viewAny,' . User::class);
            Route::get('/collaborator', [UserController::class, 'getCollabs'])
                ->middleware('can:viewAny,' . User::class);
            Route::get('/{user}', [
                UserController::class,
                'getUser',
            ])->middleware('can:viewUser,user');
            Route::put('/{user}', [
                UserController::class,
                'updateUser',
            ])->middleware(['can:updateUser,user', GlobalCheckSubscription::class]);
            Route::put('/{user}/disable', [
                UserController::class,
                'disableUser',
            ])->middleware(['can:disableUser,user', GlobalCheckSubscription::class]);
            Route::delete('/{user}/delete', [
                UserController::class,
                'destroy',
            ])->middleware(['can:deleteUser,user', GlobalCheckSubscription::class]);
        });
        Route::get(
            '/all',
            [DCompanyController::class, 'getAllCompanies']
        );
        Route::get(
            '/getMars',
            [DCompanyController::class, 'getMars']
        );
        Route::patch(
            '/setMar',
            [DCompanyController::class, 'updateCurrentMar']
        );
        Route::get(
            '/{company_two}/download-logo',
            [DCompanyController::class, 'downloadLogo']
        );
        Route::get(
            '/{company_two}/download-signature',
            [DCompanyController::class, 'downloadSignature']
        );
        Route::post('documents/{company_two?}', [
            DCompanyController::class,
            'attachDocuments',
        ])->middleware(['can:attachDocument,' . DCompany::class, GlobalCheckSubscription::class]);

        Route::get('/{identifier}', [DCompanyController::class, 'getAll'])
            ->middleware('can:viewAny,' . DCompany::class . ',identifier');

        Route::get('/{identifier}/roles', [DCompanyController::class, 'getRoles'])
            ->middleware('can:viewAny,' . DCompany::class . ',identifier');
        Route::get('/{identifier}/{company}', [DCompanyController::class, 'getById'])
            ->middleware('can:view,company,identifier');

        Route::post('/{identifier}', [DCompanyController::class, 'store'])
            ->middleware(['can:create,' . DCompany::class . ',identifier', GlobalCheckSubscription::class]);

        Route::post('/{identifier}/import', [DCompanyController::class, 'import'])
            ->middleware(['can:create,' . DCompany::class . ',identifier', GlobalCheckSubscription::class]);
        Route::get('/{identifier}/preview-import/{siret}', [DCompanyController::class, 'previewImport']);
        Route::put(
            '/{identifier}/{company}',
            [DCompanyController::class, 'update']
        )->middleware(['can:update,company,identifier', GlobalCheckSubscription::class]);
        Route::put(
            'selfCheckIn/',
            [DCompanyController::class, 'selfCheckInStatus']
        )->middleware(['can:update,company,identifier', GlobalCheckSubscription::class]);
        Route::put(
            'linkGeneration/',
            [DCompanyController::class, 'generateLink']
        );
        // ->middleware(['can:update,company,identifier', GlobalCheckSubscription::class]);
        Route::put(
            '/{identifier}/{company}/disable',
            [DCompanyController::class, 'disable']
        )->middleware(['can:update,company,identifier', GlobalCheckSubscription::class]);

        Route::delete('/{identifier}/{company}', [DCompanyController::class, 'destroy'])
            ->middleware(['can:delete,company,identifier', GlobalCheckSubscription::class]);
    });
    // ####################  LOGOUT #######################

    Route::prefix('permissions')->group(function () {
        Route::get('/{role}/{id}', [
            PPermissionController::class,
            'fetchByRole',
        ]);
        Route::put('/{role}/{id}', [
            PPermissionController::class,
            'sync',
        ]);
    });

    // ##################### Subscription #####################

    Route::prefix('subscription')->group(function () {
        // -------------------invoices ----------
        Route::get('/invoice/{id}', [SubscriptionController::class, 'getSubscriberInvoiceById']); // ok
        Route::get('/invoice/{id}/download', [SubscriptionController::class, 'downloadSubInvoice']); // ok

        Route::get('/invoices', [SubscriptionController::class, 'getInvoicesBySubscriber']); // ok
        // Route::put('/validate-invoice', [SubscriptionController::class, 'validateInvoice']);
        Route::put('/cancel-invoice', [SubscriptionController::class, 'cancelInvoice']);
        Route::put('/{sub_invoice}/{project}/add-project', [SubscriptionController::class, 'addProjectToSubInvoice']);
        Route::put('/{sub_invoice}/{sub_invoice_line_id}/remove-project', [SubscriptionController::class, 'removeProjectFromInvoice']);

        // --------------------------------------------------------------------------

        Route::get('/plans', [SubscriptionController::class, 'getAllPlans']); // ok
        Route::get('/plan-payment-types', [SubscriptionController::class, 'getAllPlanPaymentTypes']); // ok

        // -------------------P-Payment-methods ----------
        Route::get('/p-payment-methods', [SubscriptionController::class, 'getAllPPaymentMethods']); // ok
        Route::get('/p-payment-methods/{payment_method_id}', [SubscriptionController::class, 'getPPaymentMethodById']); // ok

        // --------------------------------------------------------------------------
        // -------------------SUbscription ---------------------------------------------------------------

        Route::get('/subscriber-subscription', [SubscriptionController::class, 'getSubscriberSubscription']); // ok

        // --------------------------------------------------------------------------
        // -------------------Features ---------------------------------------------------------------
        Route::post('/add-feature', [SubscriptionController::class, 'addFeature']); // ok
        Route::put('/update-feature', [SubscriptionController::class, 'updateDFeatures']); // ok
        Route::get('/p-features', [SubscriptionController::class, 'getAllPFeatures']); // ok
        Route::get('/feature/units/{p_feature_id}', [SubscriptionController::class, 'getFeatureUnits']); // ok
        Route::get('/subscriber-features', [SubscriptionController::class, 'getSubscriberFeature']); // ok
        Route::get('/subscriber-features-extra', [SubscriptionController::class, 'getExtraSubscriberFeatures']); // ok
        Route::get('/percentage-subscriber-features', [SubscriptionController::class, 'percentageCountFeature']); // ok

        // --------------------------------------------------------------------------

        // -------------------D-Payment-methods ---------------------------------------------------------------
        Route::get('/payment-methods', [SubscriptionController::class, 'getDPaymentMethodsBySubscriber']); // ok
        Route::get('/payment-methods/{payment_method_id}', [SubscriptionController::class, 'getDPaymentMethodById']); // ok
        Route::post('/payment-methods', [SubscriptionController::class, 'storeDPaymentMethod']); // ok
        Route::put('/payment-methods', [SubscriptionController::class, 'updateDPaymentMethod']); // ok
        Route::delete('/payment-methods/{payment_method_id}', [SubscriptionController::class, 'deleteDPaymentMethod']); // ok

        // --------------------------------------------------------------------------
        Route::post('/store-company-plan', [SubscriptionController::class, 'storeCompanyAndPlan']); // ok
        Route::post('/send-unpayed-projects', [SubscriptionController::class, 'sendUnpayedProjects']); // ok
        Route::post('/remove-feature', [SubscriptionController::class, 'removeFeature']);
        Route::put('/update-plan', [SubscriptionController::class, 'updatePlan']);
        Route::put('/cancel-plan', [SubscriptionController::class, 'cancelPlan']);
    });

    // ####################  COMPANIES  #######################

    Route::get('work-project', [GenerateDocumentController::class, 'generateWorkProject']);

    Route::prefix('document-types')->group(function () {
        Route::get('/', [PTypeDocumentController::class, 'index']);
    });

    Route::prefix('steps')->group(function () {
        Route::get('/', [PStepController::class, 'index']);
        Route::post('/', [PStepController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{step}', [PStepController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{step}', [PStepController::class, 'show'])->middleware(GlobalCheckSubscription::class);
        Route::delete('/{step}', [PStepController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    Route::prefix('project-third-parties')->group(function () {
        Route::get('/', [DProjectThirdPartyController::class, 'index'])
            ->middleware('can:view,project');
        Route::post('/', [DProjectThirdPartyController::class, 'store'])
            ->middleware(['can:create,project', GlobalCheckSubscription::class]);
        Route::put('/{project-third-party}', [
            DProjectThirdPartyController::class,
            'update',
        ])->middleware(['can:edit,project', GlobalCheckSubscription::class]);
        Route::get('/{project-third-party}', [
            DProjectThirdPartyController::class,
            'show',
        ])->middleware('can:view,project');
        Route::delete('/{project-third-party}', [
            DProjectThirdPartyController::class,
            'destroy',
        ])->middleware(['can:delete,project', GlobalCheckSubscription::class]);
    });

    Route::prefix('project-semulations')->group(function () {
        Route::get('/', [
            DProjectSemulationController::class,
            'index',
        ])->middleware('can:view,project');
        Route::post('/', [
            DProjectSemulationController::class,
            'store',
        ])->middleware(['can:create,project', GlobalCheckSubscription::class]);
        Route::put(
            '/{project-semulation}',
            [DProjectSemulationController::class, 'update']
        )->middleware(['can:edit,project', GlobalCheckSubscription::class]);
        Route::get(
            '/{project-semulation}',
            [DProjectSemulationController::class, 'show']
        )->middleware('can:view,project');
        Route::delete(
            '/{project-semulation}',
            [DProjectSemulationController::class, 'destroy']
        )->middleware(['can:delete,project', GlobalCheckSubscription::class]);
    });

    Route::prefix('project-documents')->group(function () {
        Route::put('/{project_document}', [
            DProjectDocumentController::class,
            'update',
        ])->middleware(['can:edit,project', GlobalCheckSubscription::class]);
        Route::get('/{project_document}', [
            DProjectDocumentController::class,
            'show',
        ])->middleware('can:view,project');
        Route::delete('/{project_document}', [
            DProjectDocumentController::class,
            'destroy',
        ])->middleware(['can:delete,project_document', GlobalCheckSubscription::class]);
        Route::get(
            '/{project_document}/download',
            [DProjectDocumentController::class, 'download']
        );
    });

    Route::prefix('client-documents')->group(function () {
        Route::put('/{client_document}', [
            DClientDocumentController::class,
            'update',
        ])->middleware(['can:edit,client', GlobalCheckSubscription::class]);
        Route::get('/{client_document}', [
            DClientDocumentController::class,
            'show',
        ])->middleware('can:view,client');
        Route::delete('/{client_document}', [
            DClientDocumentController::class,
            'destroy',
        ])->middleware(['can:update clients', GlobalCheckSubscription::class]);
        Route::get(
            '/{client_document}/download',
            [DClientDocumentController::class, 'download']
        );
    });

    Route::prefix('company-documents')->group(function () {
        Route::put('/{company_document}', [
            DCompanyDocumentController::class,
            'update',
        ])->middleware(['can:edit,company', GlobalCheckSubscription::class]);
        Route::get('/{company_document}', [
            DCompanyDocumentController::class,
            'show',
        ])->middleware('can:view,company');
        Route::delete('/{company_document}', [
            DCompanyDocumentController::class,
            'destroy',
        ])->middleware(['can:attachDocument,' . DCompany::class, GlobalCheckSubscription::class]);
        Route::get(
            '/{company_document}/download',
            [DCompanyDocumentController::class, 'download']
        );
    });
    Route::get('{installer}/reference', [DProjectController::class, 'getReference']);

    Route::put('/projects/work/validate-facture/{invoice}', [
        DProjectController::class,
        'validationWorkInvoiceInstaller',
    ]);

    Route::put('/projects/work/cancel-facture/{invoice}', [
        DProjectController::class,
        'cancelWorkInvoiceInstaller',
    ]);

    Route::prefix('projects')->group(function () {
        Route::get('/anah/comments/{dProject}', [DProjectCommentsController::class, 'index']);
        Route::post('/anah/comments/{dProject}', [DProjectCommentsController::class, 'store']);
        Route::get('/creation-documents', [DProjectDocumentController::class, 'getStepStoreDocuments']);
        Route::put('/accepted/{project}', [
            DProjectController::class,
            'AcceptProject',
        ])->middleware('can:viewAny,' . DClient::class);
        Route::put('/refused/{project}', [
            DProjectController::class,
            'refuseProject',
        ])->middleware('can:viewAny,' . DClient::class);
        Route::get('/check-max', [DProjectController::class, 'checkMaxProject']);

        Route::post('/', [DProjectController::class, 'store'])
            ->middleware(['can:create,' . DProject::class, GlobalCheckSubscription::class]);

        Route::get('/', [
            DProjectController::class,
            'index',
        ])->middleware('can:viewAny,' . DProject::class);

        Route::get('/all-invoices', [
            DProjectController::class,
            'getAllInvoices',
        ])->middleware('can:viewAny,' . DProject::class);

        Route::get('/export', [
            DProjectController::class,
            'export',
        ])->middleware('can:viewAny,' . DProject::class);

        Route::get('/invoices', [
            DProjectController::class,
            'getProjectsInvoices',
        ])->middleware('can:viewAny,' . DProject::class);

        Route::get('/calendar', [
            DProjectController::class,
            'getCalendar',
        ])->middleware('can:viewAny,' . DProject::class);
        Route::get('/{project}', [
            DProjectController::class,
            'show',
        ]);

        // check for permission

        Route::put('/{project}/second-depot-anah', [
            DProjectController::class,
            'secondDepotAnah',
        ])->middleware('can:update,project');

        Route::patch('/{project}/depot-anah', [
            DProjectController::class,
            'updateDepotAnah',
        ])->middleware('can:update,project');

        Route::patch('/{project}/update-state', [DProjectController::class, 'updateProjectState'])->middleware('can:update,project');
        Route::put('/{project}/anah-response', [DProjectController::class, 'anahResponse'])->middleware('can:update,project');
        Route::get('/{project}/visits', [
            DProjectController::class,
            'getVisits',
        ]);
        // check for permission
        Route::get('/{project}/invoice-comments', [DProjectController::class, 'getCancelComments']);
        // check for permission
        Route::get('/{project}/events', [
            DProjectController::class,
            'getEvents',
        ])->middleware('can:view,project');

        Route::get('/{project}/steps', [
            DProjectController::class,
            'getProjectSteps',
        ])->middleware('can:viewAny,' . DProject::class);

        Route::get('/{project}/download-all-documents/{key?}', [
            DProjectController::class,
            'downloadAllDocuments',
        ])->middleware('can:viewAny,' . DProject::class);
        Route::get(
            '/{project}/{ref_document}/download-document',
            [DProjectController::class, 'downloadDocument']
        )->middleware('can:generateDocument,project,ref_document');
        Route::get(
            '/{ref_document}/download-document',
            [DProjectController::class, 'DownloadableDocs']
        );
        Route::patch(
            '/{project}/current-step',
            [DProjectController::class, 'UpdateCurrentStep']
        );

        Route::get('/{project}/installers', [
            DProjectController::class,
            'getProjectInstallers',
        ])->middleware('can:view,project');

        Route::get('/{project}/companies', [
            DProjectController::class,
            'getCompaniesWithoutMAN',
        ])->middleware('can:view,project');

        Route::get('/{project}/invoices/{type?}', [
            DProjectController::class,
            'getInvoices',
        ])->middleware('can:view,project');

        Route::get('/{project}/invoicesInstaller', [
            DProjectController::class,
            'getInstallerInvoice',
        ]);

        Route::get('/{project}/view-step/{order?}', [
            DProjectController::class,
            'viewStep',
        ])->middleware('can:view,project');

        Route::put('/{project}', [
            DProjectController::class,
            'update',
        ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

        Route::delete('/{project}', [
            DProjectController::class,
            'destroy',
        ])->middleware(['can:delete,project', GlobalCheckSubscription::class]);

        Route::put('/{project}/next-step', [
            DProjectController::class,
            'generateNextStep',
        ])->middleware(['can:nextStep,project', GlobalCheckSubscription::class]);

        Route::put('/{project}/prev-step', [
            DProjectController::class,
            'prevStep',
        ])->middleware(['can:prevStep,project', GlobalCheckSubscription::class]);

        Route::post('/{project}/view/{ref_document}', [
            DDocumentViewController::class,
            'store',
        ]);
        Route::delete('/work-quotation/{invoice}', [
            DProjectController::class,
            'deleteQuotationWork',
        ]);
        Route::put('/{comment}/trait-comment', [
            DInvoiceCancelCommentController::class,
            'commentTraited',
        ])->middleware(GlobalCheckSubscription::class);
        Route::post('/installer/documents/{dProjectInvoiceHeader}', [
            DProjectController::class,
            'attachInvoiceInstaller',
        ]);
        Route::middleware('check-project')->group(function () {
            Route::patch('/{project}/merge_agent', [DProjectController::class, 'mergeAgent'])->middleware('can:update,project');
            Route::put('/{project}/anah_folder', [DProjectController::class, 'updateAnahFolder'])->middleware(['can:update,project', GlobalCheckSubscription::class]);
            Route::put(
                '{project}/{ref_document}/send',
                [DProjectController::class, 'sendDocsToSign']
            )->middleware([GlobalCheckSubscription::class]);
            Route::put('/{project}/validate-facture', [
                DProjectController::class,
                'validationInvoiceInstaller',
            ])->middleware(GlobalCheckSubscription::class);

            Route::put('/{project}/cancel-facture', [
                DProjectController::class,
                'cancelInvoiceInstaller',
            ])->middleware(GlobalCheckSubscription::class);



            Route::put(
                '/{project}/general-information',
                [DProjectController::class, 'UpdateGeneralInformation']
            )->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::post(
                '/{project}/{ref_document}/generate-document/{documentProject?}',
                [DProjectController::class, 'generateDocument']
            )->middleware(['can:generateDocument,project,ref_document', GlobalCheckSubscription::class]);

            Route::post(
                '/{project}/start-work',
                [DProjectController::class, 'startWorkEvent']
            )->middleware(['can:currentStep,project', GlobalCheckSubscription::class]);

            Route::post(
                '/{project}/{ref_document}/generate-custom-documents',
                [DProjectController::class, 'generateDocumentsFromBladeOnly']
            )->middleware(['can:generateDocument,project,ref_document', GlobalCheckSubscription::class]);

            Route::put('/{project}/update-operations', [
                DProjectController::class,
                'updateOperations',
            ])->middleware(['can:updateOperation,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/update-agent-operations', [
                DProjectController::class,
                'setAgentOperations',
            ])->middleware(['can:updateOperation,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/update-work-dates', [
                DProjectController::class,
                'updateWorkDates',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/update-actual-work-dates', [
                DProjectController::class,
                'updatActualWorkDates',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);


            Route::put('/{project}/qualification', [
                DProjectController::class,
                'setClientQualification',
            ])->middleware(['can:qualification,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/decision-end', [
                DProjectController::class,
                'endProcessFromDecision',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/simulation', [
                DProjectController::class,
                'saveSimulation',
            ])->middleware(['can:simulation,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/work-quotation', [
                DProjectController::class,
                'updateQuotationWork',
            ])->middleware(['can:saveQuotation,project', GlobalCheckSubscription::class]);


            Route::put('/{project}/update-work-quotation', [
                DProjectController::class,
                'updateQuotationWork',
            ])->middleware(['can:saveQuotation,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/cerfa', [
                DProjectController::class,
                'saveCerfa',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/invoice-amount', [
                DProjectController::class,
                'updateAmount',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/invoices/{invoiceA}', [
                DProjectController::class,
                'updateInvoice',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/invoices-validation', [
                DProjectController::class,
                'validationInvoice',
            ])->middleware(['can:validationInvoice,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/operations', [
                DProjectController::class,
                'validationWorksMar',
            ])->middleware(['can:validationWorksMar,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/final-update', [
                DProjectController::class,
                'setInstallerInOperations',
            ])->middleware(['can:validationWorksMar,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/mar-works-validation', [
                DProjectController::class,
                'validationWorksMar',
            ])->middleware(['can:validationWorksMar,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/works', [
                DProjectController::class,
                'setWorksByInstaller',
            ])->middleware(['can:setWorksByInstaller,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/installer/select', [
                DProjectController::class,
                'selectProjectInstaller',
            ])->middleware(GlobalCheckSubscription::class);
            Route::post('/{project}/documents/{ref_document?}/', [
                DProjectController::class,
                'attachDocuments',
            ])->middleware(['can:uploadDocument,project,ref_document', GlobalCheckSubscription::class]);

            Route::post('/{project}/any-documents', [
                DProjectController::class,
                'attachAnyDocuments',
            ])->middleware(['can:uploadDocument,project,null', GlobalCheckSubscription::class]);

            Route::post('/{project}/work/articles', [
                DProjectController::class,
                'addProjectWorkArticles',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::post('/{project}/events', [
                DProjectController::class,
                'addProjectEvent',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/criteria', [
                DProjectController::class,
                'updateDerogationRequestCriteria',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);

            Route::put('/{project}/rest-payment-modality', [
                DProjectController::class,
                'updateRestPaymentModality',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);
            Route::put('/{project}/audit-form', [
                DProjectController::class,
                'saveAuditForm',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);
            Route::put('/{project}/pv-reception-form', [
                DProjectController::class,
                'savePvReceptionForm',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);
            Route::put('/{project}/update-status', [
                DProjectController::class,
                'updateStatus',
            ])->middleware(['can:update,project', GlobalCheckSubscription::class]);
        });
    });

    Route::prefix('project-histories')->group(function () {
        Route::get('/', [
            DProjectHistoryController::class,
            'index',
        ])->middleware('can:view,project');
        Route::post('/', [
            DProjectHistoryController::class,
            'store',
        ])->middleware(['can:create,project', GlobalCheckSubscription::class]);
        Route::put('/{project_history}', [
            DProjectHistoryController::class,
            'update',
        ])->middleware(['can:edit,project', GlobalCheckSubscription::class]);
        Route::get('/{project_history}', [
            DProjectHistoryController::class,
            'show',
        ])->middleware('can:view,project');
        Route::delete('/{project_history}', [
            DProjectHistoryController::class,
            'destroy',
        ])->middleware(['can:delete,project', GlobalCheckSubscription::class]);
    });

    // ############################## document_version ###############################
    Route::prefix('project-document-versions')->group(function () {
        Route::get('/{project_document_version}/download', [DProjectDocumentVersionController::class, 'download'])
            ->middleware('can:view,project_document_version');

        Route::put(
            '/{project_document_version}/default',
            [DProjectDocumentVersionController::class, 'setDefaultVersion']
        )->middleware(['can:update,project_document_version', GlobalCheckSubscription::class]);

        Route::get(
            '/{project_document_version}',
            [DProjectDocumentVersionController::class, 'show']
        )->middleware('can:view,project_document_version');
        Route::delete(
            '/{project_document_version}',
            [DProjectDocumentVersionController::class, 'destroy']
        )->middleware(['can:delete,project_document_version', GlobalCheckSubscription::class]);

        Route::get(
            '/{project_document_version}/send-document-for-signing',
            [DProjectDocumentVersionController::class, 'sendDocumentForSigning']
        );
    });
    Route::prefix('client-document-versions')->group(function () {
        Route::get('/', [
            DClientDocumentVersionController::class,
            'index',
        ])->middleware('can:view,client');

        Route::put(
            '/{client_document_version}/default',
            [DClientDocumentVersionController::class, 'setDefaultVersion']
        );
        Route::get('/{client_document_version}/download', [DClientDocumentVersionController::class, 'download']);

        Route::post('/', [DClientDocumentVersionController::class, 'store'])->middleware(['can:create,client', GlobalCheckSubscription::class]);
        Route::put(
            '/{client_document_version}',
            [DClientDocumentVersionController::class, 'update']
        )->middleware(['can:update,client', GlobalCheckSubscription::class]);
        Route::get(
            '/{client_document_version}',
            [DClientDocumentVersionController::class, 'show']
        )->middleware('can:view,client');
        Route::delete(
            '/{client_document_version}',
            [DClientDocumentVersionController::class, 'destroy']
        )->middleware(['can:update clients', GlobalCheckSubscription::class]);
    });

    Route::prefix('company-document-versions')->group(function () {
        Route::get('/', [
            DCompanyDocumentVersionController::class,
            'index',
        ])->middleware('can:view,company');
        Route::put(
            '/{company_document_version}/default',
            [DCompanyDocumentVersionController::class, 'setDefaultVersion']
        );
        Route::get(
            '/{company_document_version}/download',
            [DCompanyDocumentVersionController::class, 'download']
        );

        Route::post('/', [DCompanyDocumentVersionController::class, 'store'])->middleware(['can:create,company', GlobalCheckSubscription::class]);
        Route::put(
            '/{company_document_version}',
            [DCompanyDocumentVersionController::class, 'update']
        )->middleware(['can:attachDocument,' . DCompany::class, GlobalCheckSubscription::class]);
        Route::get(
            '/{company_document_version}',
            [DCompanyDocumentVersionController::class, 'show']
        )->middleware('can:attachDocument,' . DCompany::class);
        Route::delete(
            '/{company_document_version}',
            [DCompanyDocumentVersionController::class, 'destroy']
        )->middleware(['can:attachDocument,' . DCompany::class, GlobalCheckSubscription::class]);
    });

    // ############################## type-client ###############################
    Route::prefix('type-clients')->group(function () {
        Route::get('/', [PTypeClientController::class, 'index']);
        Route::get('/propects', [PTypeClientController::class, 'getPropects']);
        Route::post('/', [PTypeClientController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{type-client}', [
            PTypeClientController::class,
            'update',
        ])->middleware(GlobalCheckSubscription::class);
        Route::get('/{type-client}', [
            PTypeClientController::class,
            'show',
        ]);
        Route::delete('/{type-client}', [
            PTypeClientController::class,
            'destroy',
        ])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## type-visit ###############################
    Route::prefix('type-visits')->group(function () {
        Route::get('/', [PTypeVisitController::class, 'index']);
        Route::post('/', [PTypeVisitController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{type-visit}', [PTypeVisitController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{type-visit}', [PTypeVisitController::class, 'show']);
        Route::delete('/{type-visit}', [PTypeVisitController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## project-visit ###############################
    Route::prefix('project-visits')->group(function () {
        Route::get('/', [
            DProjectVisitController::class,
            'index',
        ])->middleware(['can:viewAny,' . DProjectVisit::class]);
        Route::get('/list-visitors', [
            DProjectVisitController::class,
            'getVisitors',
        ])->middleware('can:viewAny,' . DProjectVisit::class);

        Route::post('/', [
            DProjectVisitController::class,
            'store',
        ])->middleware(['can:create,' . DProjectVisit::class, GlobalCheckSubscription::class]);

        Route::patch('/{project_visit}/finish-visit', [
            DProjectVisitController::class,
            'finishVisit',
        ])->middleware(['can:update,project_visit', GlobalCheckSubscription::class]);
        Route::put('/{project_visit}', [
            DProjectVisitController::class,
            'update',
        ])->middleware(['can:update,project_visit', GlobalCheckSubscription::class]);

        Route::put('/{project_visit}/validation', [
            DProjectVisitController::class,
            'validationVisit',
        ])->middleware(['can:update,project_visit', GlobalCheckSubscription::class]);

        Route::put('/{project_visit}/update-state', [
            DProjectVisitController::class,
            'updateState',
        ])->middleware(['can:update,project_visit', GlobalCheckSubscription::class]);

        Route::get('/{project_visit}', [
            DProjectVisitController::class,
            'show',
        ])->middleware('can:view,project_visit');
        Route::delete('/{project_visit}', [
            DProjectVisitController::class,
            'destroy',
        ])->middleware(['can:delete,project_visit', GlobalCheckSubscription::class]);
        Route::get('/inspector/list', [
            DProjectVisitController::class,
            'getInspectorList',
        ]);
    });

    // ############################## project-event ###############################
    Route::prefix('project-events')->group(function () {
        Route::get('/', [
            DProjectEventController::class,
            'index',
        ])->middleware('can:viewAny,' . DProjectEvent::class);

        Route::post('/', [
            DProjectEventController::class,
            'store',
        ])->middleware(['can:create,' . DProjectEvent::class, GlobalCheckSubscription::class]);

        Route::put('/{project_event}', [
            DProjectEventController::class,
            'update',
        ])->middleware(['can:update,project_event', GlobalCheckSubscription::class]);

        Route::get('/{project_event}', [
            DProjectEventController::class,
            'show',
        ])->middleware('can:update,project_event');

        Route::delete('/{project_event}', [
            DProjectEventController::class,
            'destroy',
        ])->middleware(['can:delete,project_event', GlobalCheckSubscription::class]);
    });

    // ############################## user-profile ###############################
    Route::prefix('users')->group(function () {
        Route::get('/profile', [UserController::class, 'getMyProfile'])
            ->middleware('can:view profile');
        Route::put('/profile', [UserController::class, 'updateMyProfile'])
            ->middleware(['can:update profile', GlobalCheckSubscription::class]);
    });

    // ############################## settings ###############################
    Route::prefix('settings')->group(function () {
        Route::get('/mailings', [
            DMailingController::class,
            'index',
        ]);
        Route::put('/mailings/{id}', [
            DMailingController::class,
            'update',
        ])->middleware(GlobalCheckSubscription::class);
        Route::get('/company', [DCompanyController::class, 'getMyCompany'])
            ->middleware('can:view company');
        Route::get('/company/roles', [DCompanyController::class, 'getAvailableCompanyRoles'])
            ->middleware('can:view company');
        Route::put('/company', [DCompanyController::class, 'updateMyCompany'])
            ->middleware(['can:update company', GlobalCheckSubscription::class]);
        Route::put('/current-pieces', [DInvoiceReferenceController::class, 'update'])
            ->middleware(GlobalCheckSubscription::class);
        Route::get('/current-pieces', [DInvoiceReferenceController::class, 'index']);
        // ############################## companyProjectDocs ###############################
        Route::prefix('company-project-docs')->group(function () {
            Route::get('/', [DCompanyController::class, 'getCompanyProjectDocs'])
                ->middleware('can:view company');
            Route::put('/', [DCompanyController::class, 'updateCompanyProjectDocs'])
                ->middleware('can:update company');
            Route::put('/signature', [DCompanyController::class, 'updateCompanyProjectDocsSignature'])
                ->middleware('can:update company');
        });
    });

    // ############################## operation ###############################
    Route::prefix('project-operations')->group(function () {
        Route::get('/', [DProjectOperationController::class, 'index'])->middleware('can:delete,project_visit');
        Route::post('/', [DProjectOperationController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{project_operation}', [DProjectOperationController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{project_operation}', [DProjectOperationController::class, 'show']);
        Route::delete('/{project_operation}', [DProjectOperationController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## visit-users ###############################
    Route::prefix('visit-users')->group(function () {
        Route::get('/', [DVisitUserController::class, 'index']);
        Route::post('/', [DVisitUserController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{visit_user}', [DVisitUserController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{visit_user}', [DVisitUserController::class, 'show']);
        Route::delete('/{visit_user}', [DVisitUserController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });
    // ############################## Form ###############################
    Route::prefix('form')->group(function () {
        Route::get('/{project}/{ref_document}/', [DProjectController::class, 'getForm']);
        Route::post('/{project}/{ref_document}', [DProjectController::class, 'saveFormChanges'])->middleware(GlobalCheckSubscription::class);
        Route::put('finish/{project}/{ref_document}', [DProjectController::class, 'finishForm'])->middleware(GlobalCheckSubscription::class);
        Route::post('generate/{project}/{ref_document}', [DProjectController::class, 'generatedFormProject'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## operation ###############################
    Route::prefix('operations')->group(function () {
        Route::get('/', [POperationController::class, 'index'])->middleware('can:viewAny,' . POperation::class);
        Route::put('/{operation}', [POperationController::class, 'update'])->middleware(['can:update,operations', GlobalCheckSubscription::class]);
        Route::get('/{operation}', [POperationController::class, 'show'])->middleware('can:view,operations');
        Route::get('/{operation}/third-parties', [
            POperationController::class,
            'getThirdParties',
        ]);
        Route::put('/{operation}/disable', [
            POperationController::class,
            'disableOperation',
        ])->middleware(['can:update,operations', GlobalCheckSubscription::class]);
    });
    // ############################## type-demande ###############################
    Route::prefix('type-demandes')->group(function () {
        Route::get('/', [PTypeDemandeProjectController::class, 'index']);
    });
    // ############################## income-class ###############################
    Route::prefix('income-classes')->group(function () {
        Route::get('/', [PProjectIncomeClassController::class, 'index']);
    });
    // ############################## energy-class ###############################
    Route::prefix('energy-classes')->group(function () {
        Route::get('/', [PProjectEnergyClassController::class, 'index']);
    });
    // ############################## project-residences ###############################
    Route::prefix('project-residences')->group(function () {
        Route::get('/', [PProjectResidenceController::class, 'index']);
    });

    // ############################## project-nature ###############################
    Route::prefix('project-natures')->group(function () {
        Route::get('/', [PProjectNatureController::class, 'index']);
    });
    // ############################## project-type ###############################
    Route::prefix('project-types')->group(function () {
        Route::get('/', [PProjectTypeController::class, 'index']);
    });

    // ############################## p-document ###############################
    Route::prefix('setting/documents')->group(function () {
        Route::get('/', [PDocumentController::class, 'index']);
    });

    // ############################## notification ###############################
    Route::prefix('notifications')->group(function () {
        Route::get('/', [DNotificationController::class, 'index']);
        Route::get('/count-all', [DNotificationController::class, 'countAll']);
        Route::post('/', [DNotificationController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put(
            '/all-seen',
            [DNotificationController::class, 'markAllAsRead']
        )->middleware(GlobalCheckSubscription::class);
        Route::put(
            '/{notification}',
            [DNotificationController::class, 'update']
        )->middleware(GlobalCheckSubscription::class);
        Route::put(
            '/{notification}/seen',
            [DNotificationController::class, 'markAsRead']
        )->middleware(GlobalCheckSubscription::class);
        Route::get(
            '/{notification}',
            [DNotificationController::class, 'show']
        );
        Route::delete(
            '/{notification}',
            [DNotificationController::class, 'destroy']
        )->middleware(GlobalCheckSubscription::class);
    });

    // ############################## STATES ###############################

    // ############################## log ###############################
    Route::prefix('logs')->group(function () {
        Route::get('/', [DLogController::class, 'index'])->middleware('can:viewAny,' . DLog::class);
        Route::get('/{log}', [DLogController::class, 'show'])->middleware('can:show,log');
    });
    // ############################## state ###############################
    Route::prefix('states')->group(function () {
        Route::get('/', [PStateController::class, 'index']);
        Route::post('/', [PStateController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{state}', [PStateController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{state}', [PStateController::class, 'show']);
        Route::delete('/{state}', [PStateController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## status ###############################
    Route::prefix('status')->group(function () {
        Route::get('/', [PStatusController::class, 'index']);
        Route::post('/', [PStatusController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{status}', [PStatusController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{status}', [PStatusController::class, 'show']);
        Route::delete('/{status}', [PStatusController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    Route::prefix('energy-class-skips')->group(function () {
        Route::get('/', [PClassSkipCountController::class, 'index']);
    });
    Route::prefix('bonus')->group(function () {
        Route::get('/', [PBonusController::class, 'index']);
    });

    Route::prefix('document-questions')->group(function () {
        Route::post('{project}/{ref_document}', [PDocumentQuestionController::class, 'saveQuestionResponses'])->middleware(GlobalCheckSubscription::class);
        Route::post('{project}/{ref_document}/images', [PDocumentQuestionController::class, 'saveImagesResponses'])->middleware(GlobalCheckSubscription::class);
        Route::get('{project}/{ref_document}', [PDocumentQuestionController::class, 'index']);
        Route::put('finish/{project}/{ref_document}', [PDocumentQuestionController::class, 'finishNavette'])->middleware(GlobalCheckSubscription::class);
        Route::post('generate/{project}/{ref_document}', [PDocumentQuestionController::class, 'generateResponses'])->middleware(GlobalCheckSubscription::class);
    });
    Route::prefix('shuttle-card')->group(function () {
        Route::get('/blocs', [PFormController::class, 'getShutlleCardBlocs'])->middleware(GlobalCheckSubscription::class);
        Route::get('/lines/{project}', [PFormController::class, 'getShutlleCard'])->middleware(GlobalCheckSubscription::class);
        Route::post('/lines/{project}/{ref_document}', [PFormController::class, 'saveShutlleCard'])->middleware(GlobalCheckSubscription::class);
        Route::post('/lines/{project}/{response}/images', [PFormController::class, 'saveImages'])->middleware(GlobalCheckSubscription::class);
        Route::get('/lines/image/{file_name}', [PFormController::class, 'getImageShuttleCard'])->middleware(GlobalCheckSubscription::class);
        Route::delete('/lines/{response}/images/{file_name}', [PFormController::class, 'removeImageShuttleCard'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{project}/generate/{ref_document}', [PFormController::class, 'generate'])->middleware(GlobalCheckSubscription::class);
    });
    // ############################## type_collaborator ###############################
    Route::prefix('type-collaborators')->group(function () {
        Route::get('/', [PTypeCollaboratorController::class, 'index']);
    });

    // ############################## Scenario ###############################
    Route::prefix('scenarios')->group(function () {
        Route::get('/', [DScenarioController::class, 'index'])->middleware('can:viewAny,' . DScenario::class);
        Route::post('/', [DScenarioController::class, 'store'])->middleware(['can:create,' . DScenario::class, GlobalCheckSubscription::class]);
        Route::put('/{scenario}', [DScenarioController::class, 'update'])->middleware(['can:update,scenario', GlobalCheckSubscription::class]);
        Route::get('/{scenario}', [DScenarioController::class, 'show'])->middleware('can:view,scenario');
        Route::delete('/{scenario}', [DScenarioController::class, 'destroy'])->middleware(['can:delete,scenario', GlobalCheckSubscription::class]);
        Route::post('/{scenario}/operations', [DScenarioController::class, 'addOperationsToSceanrio'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{scenario}/disable', [
            DScenarioController::class,
            'disableScenario',
        ])->middleware(['can:update,scenario', GlobalCheckSubscription::class]);
        Route::put('/{scenario}/validate', [DScenarioController::class, 'validateScenario'])->middleware(['can:validate,scenario', GlobalCheckSubscription::class]);
    });

    // ############################## Basket (Corbeille) ###############################
    Route::prefix('baskets')->group(function () {
        Route::get('/', [BasketController::class, 'index']);
        Route::put('/{id}/back', [BasketController::class, 'backRecord'])->middleware(GlobalCheckSubscription::class);
        Route::delete('/{id}/delete', [BasketController::class, 'forceDelete'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## UNIT ###############################
    Route::prefix('units')->group(function () {
        Route::get('/', [PUnitController::class, 'index']);
    });
    // ############################## nature-residences ###############################
    Route::prefix('nature-residences')->group(function () {
        Route::get('/', [PNatureResidenceController::class, 'index']);
    });

    // ############################## work-type ###############################
    Route::prefix('work-types')->group(function () {
        Route::get('/', [PWorkTypeController::class, 'index']);
    });
    // ############################## modal-reference ###############################
    Route::prefix('references')->group(function () {
        Route::get('/', [DModelReferenceController::class, 'index']);
        Route::get('/{reference}', [DModelReferenceController::class, 'show']);
        Route::put('/{reference}', [DModelReferenceController::class, 'update'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## work ###############################
    Route::prefix('works')->group(function () {
        Route::get('/', [DWorkController::class, 'index'])->middleware('can:viewAny,' . DWork::class);
        Route::post('/', [DWorkController::class, 'store'])->middleware(['can:create,' . DWork::class, GlobalCheckSubscription::class]);
        Route::put('/{work}', [DWorkController::class, 'update'])->middleware(['can:update,work', GlobalCheckSubscription::class]);
        Route::get('/{work}', [DWorkController::class, 'show'])->middleware('can:view,work');
        Route::delete('/{work}', [DWorkController::class, 'destroy'])->middleware(['can:delete,work', GlobalCheckSubscription::class]);
        Route::put('/{work}/disable', [DWorkController::class, 'disableWork'])->middleware(['can:update,work', GlobalCheckSubscription::class]);
        Route::put('/{work}/validate', [DWorkController::class, 'validateWork'])->middleware(['can:validate,work', GlobalCheckSubscription::class]);
    });
    // ############################## article-type ###############################
    Route::prefix('article-types')->group(function () {
        Route::get('/', [PArticleTypeController::class, 'index']);
        Route::post('/', [PArticleTypeController::class, 'store'])->middleware(['can:create,article-type', GlobalCheckSubscription::class]);
        Route::put('/{article_type}', [PArticleTypeController::class, 'update'])->middleware(['can:update,article-type', GlobalCheckSubscription::class]);
        Route::get('/{article_type}', [PArticleTypeController::class, 'show'])->middleware('can:view,article-type');
        Route::delete('/{article_type}', [PArticleTypeController::class, 'destroy'])->middleware(['can:delete,article-type', GlobalCheckSubscription::class]);
    });
    // ############################## brand ###############################
    Route::prefix('brands')->group(function () {
        Route::get('/', [DBrandController::class, 'index'])->middleware('can:viewAny,' . DBrand::class);
        Route::post('/', [DBrandController::class, 'store'])->middleware(['can:create,' . DBrand::class, GlobalCheckSubscription::class]);
        Route::put('/{brand}', [DBrandController::class, 'update'])->middleware(['can:update,brand', GlobalCheckSubscription::class]);
        Route::get('/{brand}', [DBrandController::class, 'show'])->middleware('can:view,brand');
        Route::delete('/{brand}', [DBrandController::class, 'destroy'])->middleware(['can:delete,brand', GlobalCheckSubscription::class]);
        Route::put('/{brand}/disable', [
            DBrandController::class,
            'disableBrand',
        ])->middleware(['can:update,brand', GlobalCheckSubscription::class]);
        Route::put('/{brand}/enable', [
            DBrandController::class,
            'enableBrand',
        ])->middleware(['can:update,brand', GlobalCheckSubscription::class]);
        Route::put('/{brand}/validate', [
            DBrandController::class,
            'validateBrand',
        ])->middleware(['can:validate,brand', GlobalCheckSubscription::class]);
        // Route::put('/{brand}/toggle-access', [
        //     DBrandController::class,
        //     'toggleAccess',
        // ])->middleware(['can:updateAccess,brand', GlobalCheckSubscription::class]);
    });
    // ############################## article ###############################
    Route::prefix('articles')->group(function () {
        Route::get('/', [
            DArticleController::class,
            'index',
        ])->middleware('can:viewAny,' . DArticle::class);
        Route::get('/mar-services', [
            DArticleController::class,
            'getServicesMar',
        ])->middleware('can:viewAnyService,' . DArticle::class);

        Route::post('/', [DArticleController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{article}/add-price', [
            DArticleController::class,
            'addPrice',
        ])->middleware(['can:create,' . DArticle::class, GlobalCheckSubscription::class]);
        Route::put('/{article}', [DArticleController::class, 'update'])->middleware(['can:update,article', GlobalCheckSubscription::class]);
        Route::get('/{article}', [DArticleController::class, 'show'])->middleware('can:view,article');
        Route::delete('/{article}', [DArticleController::class, 'destroy'])->middleware(['can:delete,article', GlobalCheckSubscription::class]);
        Route::put('/{article}/disable', [
            DArticleController::class,
            'disableArticle',
        ])->middleware(['can:update,article', GlobalCheckSubscription::class]);
        Route::put('/{article}/enable', [
            DArticleController::class,
            'enableArticle',
        ])->middleware(['can:update,article', GlobalCheckSubscription::class]);
        Route::put('/{article}/validate', [
            DArticleController::class,
            'validateArticle',
        ])->middleware(['can:validate,article', GlobalCheckSubscription::class]);

        Route::put('/{article}/toggle-access', [
            DArticleController::class,
            'toggleAccess',
        ])->middleware(['can:updateAccess,article', GlobalCheckSubscription::class]);

        Route::get(
            '/{article}/download',
            [DArticleController::class, 'download']
        );
    });

    Route::prefix('default-articles')->group(function () {
        Route::get('/', [PArticleController::class, 'index'])->middleware('can:viewAny,' . PArticle::class);
        Route::post('/', [PArticleController::class, 'store'])->middleware(['can:create,' . PArticle::class, GlobalCheckSubscription::class]);
        Route::put('/{default_article}', [
            PArticleController::class,
            'update',
        ])->middleware(['can:update,default_article', GlobalCheckSubscription::class]);
        Route::get(
            '/{default_article}',
            [PArticleController::class, 'show']
        )->middleware('can:view,default_article');
        Route::delete(
            '/{default_article}',
            [PArticleController::class, 'destroy']
        )->middleware(['can:delete,default_article', GlobalCheckSubscription::class]);
    });

    // #############################Simulation Document#################
    Route::prefix('simulation-document')->group(function () {
        Route::get('/', [DProjectSemulationController::class, 'GenerateDocument']);
    });

    // ############################## phase ###############################
    Route::prefix('phases')->group(function () {
        Route::get('/', [PPhaseController::class, 'index'])->middleware('can:view,phase');
        Route::post('/', [PPhaseController::class, 'store'])->middleware(['can:create,phase', GlobalCheckSubscription::class]);
        Route::put('/{phase}', [
            PPhaseController::class,
            'update',
        ])->middleware(['can:update,phase', GlobalCheckSubscription::class]);
        Route::get('/{phase}', [
            PPhaseController::class,
            'show',
        ])->middleware('can:view,phase');
        Route::delete('/{phase}', [PPhaseController::class, 'destroy'])->middleware(['can:delete,phase', GlobalCheckSubscription::class]);
    });

    // ############################## raison-type ###############################
    Route::prefix('raison-types')->group(function () {
        Route::get('/', [PRaisonTypesController::class, 'index']);
    });

    Route::prefix('project-works')->group(function () {
        Route::put('/{project_work}', [
            DProjectWorkController::class,
            'update',
        ])->middleware(['can:update,project_work', GlobalCheckSubscription::class]);
        Route::put('/quotation-works', [
            DProjectWorkController::class,
            'update',
        ])->middleware(['can:update,project_work', GlobalCheckSubscription::class]);
    });
    // ############################## government ###############################
    Route::prefix('governments')->group(function () {
        Route::get('/', [DGovernmentController::class, 'index'])->middleware(['can:view,government', GlobalCheckSubscription::class]);
        Route::post('/', [DGovernmentController::class, 'store'])->middleware(['can:create,government', GlobalCheckSubscription::class]);
        Route::post('/{government}/users', [
            DGovernmentController::class,
            'createUser',
        ])->middleware(['can:create,' . DGovernment::class, GlobalCheckSubscription::class]);
        Route::put('/{government}', [DGovernmentController::class, 'update'])->middleware(['can:update,government', GlobalCheckSubscription::class]);
        Route::get('/{government}', [DGovernmentController::class, 'show'])->middleware('can:view,government');
        Route::delete('/{government}', [DGovernmentController::class, 'destroy'])->middleware(['can:delete,government', GlobalCheckSubscription::class]);
    });

    // ############################## profile ###############################
    Route::prefix('profiles')->group(function () {
        Route::get('/', [PProfileController::class, 'index'])->middleware('can:view,profile');
        Route::post('/', [PProfileController::class, 'store'])->middleware(['can:create,profile', GlobalCheckSubscription::class]);
        Route::put('/{profile}', [PProfileController::class, 'update'])->middleware(['can:update,profile', GlobalCheckSubscription::class]);
        Route::get('/{profile}', [PProfileController::class, 'show'])->middleware('can:view,profile');
        // Route::delete('/{profile}', [PProfileController::class, 'destroy'])->middleware('can:delete,profile');
    });

    // ############################## project dahsboard ###############################
    Route::prefix('/dashboard-statics')->group(function () {
        Route::get('projects', [DashboardController::class, 'MarProjectData']);
        Route::get('/visits', [DashboardController::class, 'MarVisitData']);
        Route::get('/devis', [DashboardController::class, 'MarDevisDataByYear']);
        Route::get('/devis-projet-visits', [DashboardController::class, 'VisitDevisProjectDataByYear']);
    });

    // ############################## project-invoice-header ###############################
    Route::prefix('invoices')->group(function () {
        Route::get('/', [
            DProjectInvoiceHeaderController::class,
            'index',
        ])->middleware('can:viewAny,' . DProject::class);
    });

    // ############################## company-child ###############################
    Route::prefix('company-childs')->group(function () {
        Route::get('/', [DCompanyChildController::class, 'index']);
        Route::post('/', [DCompanyChildController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{company-child}', [DCompanyChildController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{company-child}', [DCompanyChildController::class, 'show']);
        Route::delete('/{company-child}', [DCompanyChildController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## mar-scale ###############################
    Route::prefix('mar-scales')->group(function () {
        Route::get('/', [PMarScaleController::class, 'index']);
    });
    // ############################## operation-document ###############################
    Route::prefix('operation-documents')->group(function () {
        Route::get('/', [POperationDocumentController::class, 'index']);
        Route::post('/', [POperationDocumentController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{operation-document}', [
            POperationDocumentController::class,
            'update',
        ])->middleware(GlobalCheckSubscription::class);
        Route::get('/{operation-document}', [
            POperationDocumentController::class,
            'show',
        ]);
        Route::delete('/{operation-document}', [
            POperationDocumentController::class,
            'destroy',
        ])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## type-event ###############################
    Route::prefix('type-events')->group(function () {
        Route::get('/', [PTypeEventController::class, 'index']);
        Route::post('/', [PTypeEventController::class, 'store'])->middleware(GlobalCheckSubscription::class);
        Route::put('/{type-event}', [PTypeEventController::class, 'update'])->middleware(GlobalCheckSubscription::class);
        Route::get('/{type-event}', [PTypeEventController::class, 'show']);
        Route::delete('/{type-event}', [PTypeEventController::class, 'destroy'])->middleware(GlobalCheckSubscription::class);
    });

    // ############################## project-event ###############################
    Route::prefix('project-events')->group(function () {
        Route::get('/', [
            DProjectEventController::class,
            'index',
        ])->middleware('can:viewAny,' . DProjectEvent::class);

        Route::post('/', [
            DProjectEventController::class,
            'store',
        ])->middleware(['can:create,' . DProjectEvent::class, GlobalCheckSubscription::class]);

        Route::put('/{project_event}', [
            DProjectEventController::class,
            'update',
        ])->middleware(['can:update,project_event', GlobalCheckSubscription::class]);

        Route::get('/{project_event}', [
            DProjectEventController::class,
            'show',
        ])->middleware(['can:show,project_event', GlobalCheckSubscription::class]);

        Route::delete('/{project_event}', [
            DProjectEventController::class,
            'destroy',
        ])->middleware(['can:delete,project_event', GlobalCheckSubscription::class]);
    });

    // ############################## project-reclamation ###############################
    Route::prefix('project-reclamations')->group(function () {
        Route::get('/', [
            DProjectReclamationController::class,
            'index',
        ]);
        Route::post('/', [
            DProjectReclamationController::class,
            'store',
        ])->middleware(GlobalCheckSubscription::class);
        Route::put(
            '/{project-reclamation}',
            [DProjectReclamationController::class, 'update']
        )->middleware(GlobalCheckSubscription::class);
        Route::get(
            '/{project-reclamation}',
            [DProjectReclamationController::class, 'show']
        );
        Route::delete(
            '/{project-reclamation}',
            [DProjectReclamationController::class, 'destroy']
        )->middleware(GlobalCheckSubscription::class);
    });

    // ############################## project-reclamation-work ###############################
    Route::prefix('project-reclamation-works')->group(function () {
        Route::get('/', [
            DProjectReclamationWorkController::class,
            'index',
        ]);
        Route::post(
            '/',
            [
                DProjectReclamationWorkController::class,
                'store',
            ]
        )->middleware(GlobalCheckSubscription::class);
        Route::put(
            '/{project-reclamation-work}',
            [DProjectReclamationWorkController::class, 'update']
        )->middleware(GlobalCheckSubscription::class);
        Route::get(
            '/{project-reclamation-work}',
            [DProjectReclamationWorkController::class, 'show']
        );
        Route::delete(
            '/{project-reclamation-work}',
            [DProjectReclamationWorkController::class, 'destroy']
        )->middleware(GlobalCheckSubscription::class);
    });
    // ############################## article-price ###############################
    Route::prefix('article-prices')->group(function () {
        Route::get('/', [
            DArticlePriceController::class,
            'index',
        ])->middleware('can:viewAny,' . DArticlePrice::class);
        Route::post('/', [
            DArticlePriceController::class,
            'store',
        ])->middleware(['can:create,' . DArticlePrice::class, GlobalCheckSubscription::class]);
        Route::put('/{article_price}', [
            DArticlePriceController::class,
            'update',
        ])->middleware(['can:update,article_price', GlobalCheckSubscription::class]);
        Route::get('/{article_price}', [
            DArticlePriceController::class,
            'show',
        ])->middleware('can:view,article_price');
        Route::delete('/{article}', [
            DArticlePriceController::class,
            'destroy',
        ])->middleware(['can:delete,article_price', GlobalCheckSubscription::class]);
    });
    // ############################## team-users ###############################
    Route::prefix('team-users')->group(function () {
        Route::get('/', [TeamUserController::class, 'index']);
    });

    // ############################## type-invoice ###############################
    Route::prefix('type-invoices')->group(function () {
        Route::get('/', [PTypeInvoiceController::class, 'index']);
    });
    // ############################## brand-line ###############################
    Route::prefix('brand-lines')->group(function () {
        Route::get('/', [DBrandLineController::class, 'index'])->middleware('can:view,brand-line');
        Route::post('/', [DBrandLineController::class, 'store'])->middleware(['can:create,brand-line', GlobalCheckSubscription::class]);
        Route::put('/{brand-line}', [DBrandLineController::class, 'update'])->middleware(['can:update,brand-line', GlobalCheckSubscription::class]);
        Route::get('/{brand-line}', [DBrandLineController::class, 'show'])->middleware('can:view,brand-line');
        Route::delete('/{brand-line}', [DBrandLineController::class, 'destroy'])->middleware(['can:delete,brand-line', GlobalCheckSubscription::class]);
    });
    // ############################## d-document-view ###############################
    Route::prefix('d-document-views')->group(function () {
        Route::get('/', [DDocumentViewController::class, 'index'])->middleware('can:view,d-document-view');
        Route::post('/', [DDocumentViewController::class, 'store'])->middleware(['can:create,d-document-view', GlobalCheckSubscription::class]);
        Route::put('/{d-document-view}', [DDocumentViewController::class, 'update'])->middleware(['can:update,d-document-view', GlobalCheckSubscription::class]);
        Route::get('/{d-document-view}', [DDocumentViewController::class, 'show'])->middleware('can:view,d-document-view');
        Route::delete('/{d-document-view}', [DDocumentViewController::class, 'destroy'])->middleware(['can:delete,d-document-view', GlobalCheckSubscription::class]);
    });


    // ############################## qualification ###############################
    Route::prefix('qualifications')->group(function () {
        Route::get('/', [PQualificationController::class, 'index']);
    });
    // ############################## scale ###############################
    Route::prefix('scales')->group(function () {
        Route::get('/', [PScaleController::class, 'index']);
    });
    // ############################## category ###############################
    Route::prefix('categories')->group(function () {
        Route::get('/', [PCategoryController::class, 'index']);
    });
    // ############################## subCategory ###############################
    Route::prefix('sub-categories')->group(function () {
        Route::get('/', [PSubCategoryController::class, 'index']);
    });
    // ############################## tVA ###############################
    Route::prefix('tvas')->group(function () {
        Route::get('/', [PTVAController::class, 'index']);
    });
    // ############################## product ###############################
    Route::prefix('products')->group(function () {
        Route::get('/', [DProductController::class, 'index']);
        Route::post('/', [DProductController::class, 'store']);
        Route::put('/{product}', [DProductController::class, 'update']);
        Route::get('/{product}', [DProductController::class, 'show']);
        Route::delete('/{product}', [DProductController::class, 'destroy']);
        Route::put('/{product}/validate', [
            DProductController::class,
            'validateProduct',
        ]);
        Route::put('/{product}/disable', [
            DProductController::class,
            'disableProduct',
        ]);
        Route::put('/{product}/enable', [
            DProductController::class,
            'enableProduct',
        ]);
        Route::put('/{product}/toggle-access', [
            DProductController::class,
            'toggleAccess',
        ])->middleware(['can:updateAccess,product', GlobalCheckSubscription::class]);
        ;

        Route::get(
            '/{product}/file/{file_name}',
            [DProductController::class, 'getFile']
        );
    });
    Route::prefix('bars')->group(function () {
        Route::get('/', [PBarController::class, 'index']);
    });

    ############################### notification Type ###############################
    Route::prefix('notification-types')->group(function () {
        Route::get('/', [PNotificationTypeController::class, 'index']);
    });

    ############################### general-notification ###############################
    Route::prefix('general-notifications')->group(function () {
        Route::get('/', [DGeneralNotificationController::class, 'index']);
        Route::get('/latest', [DGeneralNotificationController::class, 'latest']);
        Route::put('seen', [DGeneralNotificationController::class, 'seen']);
        Route::get('/{general_notification}', [DGeneralNotificationController::class, 'show']);
    });
    ############################### signature-line ###############################
    Route::prefix('signature-lines')->group(function () {
        Route::get('/', [DSignatureLineController::class, 'index']);
    });
});
