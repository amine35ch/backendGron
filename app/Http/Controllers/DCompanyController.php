<?php

namespace App\Http\Controllers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\FeatureEnum\FeatureType;
use App\Http\Requests\DCompanyProjectDocsRequests\DCompanyProjectDocsSignatureUpdateRequest;
use App\Http\Requests\DCompanyProjectDocsRequests\DCompanyProjectDocsUpdateRequest;
use App\Http\Requests\DCompanyRequests\CurrentMarUpdateRequest;
use App\Http\Requests\DCompanyRequests\DCompanyImportRequest;
use App\Http\Requests\DCompanyRequests\DCompanyStoreRequest;
use App\Http\Requests\DCompanyRequests\DCompanyUpdateRequest;
use App\Http\Requests\DDocumentRequests\UsersDocumentRequest;
use App\Http\Requests\UserRequests\UserStoreRequest;
use App\Http\Requests\UserRequests\UserUpdateRequest;
use App\Http\Resources\DCompanyProjectDocsResources\DCompanyProjectDocsCollection;
use App\Http\Resources\DCompanyResources\DCompanyCollection;
use App\Http\Resources\DCompanyResources\DCompanyResource;
use App\Http\Resources\DCompanyResources\DCompanyResourceRoot;
use App\Http\Resources\PRoleResources\PRoleCollection;
use App\Http\Resources\UserResources\UserCollection;
use App\Http\Resources\UserResources\UserResource;
use App\Models\DCompany;
use App\Models\PProfile;
use App\Models\PRole;
use App\Models\User;
use App\Services\DCompanyServices\DCompanyService;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\SubscriptionServices\SubscriptionService;
use App\Services\UserServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DCompanyController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'company non trouvé.';

    public function __construct(private DCompanyService $dCompanyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAll(string $identifier, Request $request)
    {
        $dCompanies = $this->dCompanyService->getAll(
            $request->all(),
            $identifier
        );

        return response()->json(
            new DCompanyCollection($dCompanies)
        );
    }
    public function getCompaniesRoot(Request $request)
    {
        $dCompanies = $this->dCompanyService->getRootCompanies(
            $request->all(),
        );

        return response()->json(
            new DCompanyCollection($dCompanies)
        );
    }
    public function getAllRootMars()
    {
        $dCompanies = $this->dCompanyService->getAllMars();
        return response()->json(
            new DCompanyCollection($dCompanies)
        );
    }
    // public function getAllRootCompanies(Request $request)
    // {
    //     $dCompanies = $this->dCompanyService->getAllRootCompanies(
    //         $request->all()
    //     );

    //     return response()->json(
    //         new DCompanyResourceRoot($dCompanies)
    //     );
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCompanies(Request $request)
    {
        $dCompanies = $this->dCompanyService->getAllCompanies(
            $request->all(),

        );

        return response()->json(
            new DCompanyCollection($dCompanies)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $identifier, DCompanyStoreRequest $request): JsonResponse
    {
        if ($request->profile == DCompanyProfile::MAN->value) {
            $subscriptionService = new SubscriptionService();
            $user = auth()->user();
            $subscriptionService->validateFeature($user->company_code, FeatureType::AGENT->value);
        }
        $dCompany = $this->dCompanyService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.company.create'),
                'data' => new DCompanyResource($dCompany),
            ],
            201
        );
    }

    public function storeMAR(DCompanyStoreRequest $request): JsonResponse
    {
        $dCompany = $this->dCompanyService
            ->createMAR($request->validated());

        return response()->json(
            [
                'message' => __('responses.company.create'),
                'data' => new DCompanyResource($dCompany),
            ],
            201
        );
    }

    public function import(DCompanyImportRequest $request)
    {

        $dCompany = $this->dCompanyService->importCompany($request->validated());
        return response()->json(
            [
                'message' => __('responses.company.create'),
                'data' => new DCompanyResource($dCompany),
            ],
            201
        );
    }

    public function previewImport($ident, $siret)
    {

        $dCompany = $this->dCompanyService->previewImportCompany(
            $siret,
            $ident
        );
        return response()->json(
            [
                'message' => __('responses.company.create'),
                'data' => [
                    'trade_name' => $dCompany?->trade_name,
                    'phone_number_1' => $dCompany?->phone_number_1,
                    'download_logo' => $dCompany?->download_logo
                ],
            ],
            201
        );
    }

    public function getMars()
    {

        $dCompanies = $this->dCompanyService
            ->getMars();
        return response()->json(
            [
                'data' => $dCompanies,
            ],
            201
        );
    }


    public function updateCurrentMar(CurrentMarUpdateRequest $request)
    {

        $this->dCompanyService->updateCurrentMar($request->validated());
        return response()->json(
            [
                'message' => __('actions.success'),
            ],
            201
        );
    }
    /**
     * Display the specified resource.
     */
    public function getById(string $identifier, DCompany $dCompany): JsonResponse
    {

        return response()->json(new DCompanyResource($dCompany));
    }

    /**
     * Display the specified resource.
     */
    public function getRoles(string $identifier): JsonResponse
    {
        $profile = PProfile::where('identifier', $identifier)->first();
        $roles = PRole::where('p_profile_id', $profile->id)->get();

        return response()->json(new PRoleCollection($roles));
    }
    public function selfCheckInStatus(
        Request $request,
        // DCompany $dCompany
    ): JsonResponse {
        $dCompany = DCompany::where('id', $request->companyId)->first();

        $this->dCompanyService->selfCheckInStatus($request->toArray(), $dCompany);

        return response()->json([
            'message' => __('responses.company.update'),
            'data' => new DCompanyResource(resource: $dCompany),
        ], 200);
    }
    public function update(
        DCompanyUpdateRequest $request,
        string $identifier,
        DCompany $dCompany
    ): JsonResponse {
        $this->dCompanyService->edit($request->validated(), $dCompany);

        return response()->json([
            'message' => __('responses.company.update'),
            'data' => new DCompanyResource(resource: $dCompany),
        ], 200);
    }
    public function generateLink(
    ): JsonResponse {
        $user = auth()->user();
        $company = $user->company;
        $parentCompanyompany = null;
        if (!isset($company["linkToken"])) {
            do {
                $linkToken = substr(Str::uuid()->toString(), 0, 8);
                $exists = DCompany::where('linkToken', $linkToken)->exists();
            } while ($exists);
            $company["linkToken"] = $linkToken;
            $company->save();
        }


        if ($company->profile !== DCompanyProfile::MAR->value) {
            $parentCompanyompany = DCompany::find($company->parent_company_id)->first();
            if (!isset($parentCompanyompany["linkToken"])) {
                do {
                    $linkTokenParent = substr(Str::uuid()->toString(), 0, 8);
                    $exists = DCompany::where('linkToken', $linkTokenParent)->exists();
                } while ($exists);
                $parentCompanyompany["linkToken"] = $linkTokenParent;
                $parentCompanyompany->save();
            }
        }
        $linkToSend = $parentCompanyompany ? $parentCompanyompany->linkToken . "-" . $company->linkToken : $company->linkToken;
        return response()->json([
            'message' => __('responses.company.link'),
            'linkToken' => config('app.frontend_url') . '?token=' . $linkToSend,
        ], 200);
    }
    public function toggleActive(
        string $identifier,
        DCompany $dCompany
    ): JsonResponse {

        $dCompany->update(['state' => !$dCompany->state]);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DCompanyResource($dCompany),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identifier, DCompany $dCompany, Request $request): JsonResponse
    {

        $this->dCompanyService->delete($dCompany);

        return response()->json(['message' => __('responses.company.delete'), 202]);
    }

    public function createUser(
        DCompany $dCompany,
        UserStoreRequest $request,
        UserService $userService
    ): JsonResponse {

        $user = $userService->create($request->validated(), $dCompany);

        return response()->json([
            'message' => 'Utilisateur est crée avec succée.',
            'data' => new UserResource($user),
        ], 200);
    }

    public function getUsers(
        DCompany $dCompany,
    ): JsonResponse {

        return response()->json(new UserCollection($dCompany->users));
    }

    public function getUser(
        DCompany $dCompany,
        User $user,
    ): JsonResponse {

        return response()->json(new UserResource($user));
    }

    public function updateUser(
        DCompany $dCompany,
        User $user,
        UserUpdateRequest $request,
        UserService $userService

    ): JsonResponse {

        $userService->edit($request->validated(), $user);

        return response()->json(new UserResource($user));
    }

    public function attachDocuments(
        UsersDocumentRequest $request,
        DCompany $dCompany
    ) {
        $company = ($dCompany->exists) ? $dCompany : getCompanyOfConnectedUser();
        $this->dCompanyService->attachDocuments(
            $company,
            $request->validated(),
        );

        return response()->json(
            [
                'message' => __('responses.document.create'),
            ],
            202
        );
    }

    public function getDocuments(DCompany $company)
    {
        return response()->json([
            'data' => $company->documents,
        ], 202);
    }

    public function downloadLogo(DCompany $company)
    {
        if (!$company->logo) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
                    $company->logo,
                    'inline',
                    $company->trade_name . '.' . pathinfo($company->logo, PATHINFO_EXTENSION)
                );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function downloadSignature(DCompany $company)
    {
        if (!$company->signature) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
                    $company->signature,
                    'inline',
                    $company->trade_name . '.' . pathinfo($company->signature, PATHINFO_EXTENSION)
                );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function disable(
        string $identifier,
        DCompany $dCompany
    ) {
        $this->dCompanyService->disableCompany($dCompany);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getMyCompany()
    {
        return response()->json(new DCompanyResource(getCompanyOfConnectedUser()));
    }

    public function updateMyCompany(DCompanyUpdateRequest $request)
    {
        $company = getCompanyOfConnectedUser();
        $this->dCompanyService->updateCompany($request->validated(), $company);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DCompanyResource($company),
        ], 200);
    }

    public function getCompanyProjectDocs(Request $request)
    {
        $projectDocs = $this->dCompanyService->getAllPorjectDocs($request->all());
        return response()->json(
            new DCompanyProjectDocsCollection($projectDocs)
        );
    }
    public function updateCompanyProjectDocs(DCompanyProjectDocsUpdateRequest $request)
    {
        $company = getCompanyOfConnectedUser();
        $this->dCompanyService->updateCompanyProjectDocs($company, $request->validated());
        return response()->json([
            'message' => __('actions.success'),
            'data' => [],
        ], 200);
    }

    public function updateCompanyProjectDocsSignature(DCompanyProjectDocsSignatureUpdateRequest $request)
    {
        $company = getCompanyOfConnectedUser();
        $this->dCompanyService->updateCompanyProjectDocsSignature($company, $request->validated());
        return response()->json([
            'message' => __('actions.success'),
            'data' => [],
        ], 200);
    }


    public function getAvailableCompanyRoles()
    {
        $roles = Role::all();
        $company = getCompanyOfConnectedUser();
        $roles = $roles->filter(function ($role) use ($company) {
            return str_contains($role->name, $company->profile);
        });
        return response()->json($roles->map(function ($role) {
            return [
                'id' => $role->id,
                'value' => $role->name,
                'entitled' => $role->display_name,
            ];
        })->values());
    }
}
