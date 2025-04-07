<?php

namespace App\Http\Controllers;

use App\Enums\FeatureEnum\FeatureType;
use App\Http\Requests\DClientRequests\DClientContactInfoUpdateRequest;
use App\Http\Requests\DClientRequests\DClientIbanRibUpdateRequest;
use App\Http\Requests\DClientRequests\DClientStoreRequest;
use App\Http\Requests\DClientRequests\DClientUpdateRequest;
use App\Http\Requests\DDocumentRequests\UsersDocumentRequest;
use App\Http\Requests\DDocumentRequests\ValidateDocumentRequest;
use App\Http\Requests\DProjectRequests\DProjectUpdateRequest;
use App\Http\Resources\DClientResources\DClientCollection;
use App\Http\Resources\DClientResources\DClientResource;
use App\Http\Resources\DProjectResources\DProjectResource;
use App\Models\DClient;
use App\Models\DClientDocument;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\PDocument;
use App\Services\DClientServices\DClientService;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectServices\DProjectService;
use App\Services\SubscriptionServices\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DClientController extends Controller
{
    public function __construct(private DProjectService $dProjectService, private DClientService $dClientService, private DProject $dProject)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dClients = $this->dClientService->getAll($request->all());

        return response()->json(
            new DClientCollection($dClients)
        );
    }
    public function getAccepted(Request $request)
    {
        $dClients = $this->dClientService->getAllAccepted($request->all());

        return response()->json(
            new DClientCollection($dClients)
        );
    }
    public function AcceptClient(DClientUpdateRequest $request, DClient $dClient)
    {
        $this->dClientService->acceptClient($request->validated(), $dClient);
        $dProject = DProject::where('project_type', 0)
            ->where('d_client_id', $dClient->id)
            ->get();
        $data = $dProject->toArray();
        // $dProjectChanges = new DProjectUpdateRequest($dProject->toArray());
        $this->dProjectService->acceptProject($data, $dClient);

        return response()->json(new DClientResource($dClient));

    }
    public function getProspects(Request $request)
    {
        $dClients = $this->dClientService->getAllProspects($request->all());

        return response()->json(
            new DClientCollection($dClients)
        );
    }
    public function export(Request $request)
    {
        return $this->dClientService->export($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DClientStoreRequest $request): JsonResponse
    {
        $subscriptionService = new SubscriptionService();
        $user = auth()->user();
        $subscriptionService->validateFeature($user->company_code, FeatureType::CLIENT->value);
        $dClient = $this->dClientService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.client.create'),
                'data' => new DClientResource($dClient),
            ],
            201
        );
    }
    public function publicStore(DClientStoreRequest $request, $token): JsonResponse
    {
        $subscriptionService = new SubscriptionService();
        $childToken = $token;
        $parts = [];

        if (strpos($token, '-') !== false) {
            $parts = explode('-', $token);
        }

        if (count($parts) > 1) {
            $companyParent = DCompany::where('linkToken', $parts[0])->first();
            if (!$companyParent) {
                throw new \Exception('Lien Invalid');
            }
            $childToken = $parts[1];
            $subscriptionService->validateFeature($companyParent->company_code, FeatureType::CLIENT->value);
        }
        $company = DCompany::where('linkToken', $childToken)->first();
        if (!$company) {
            throw new \Exception('Lien Invalid');
        }
        $subscriptionService->validateFeature($company->company_code, FeatureType::CLIENT->value);
        $request["token"] = $childToken;
        $request["type"] = 1;
        $dClient = $this->dClientService
            ->create($request->validated(), $childToken);

        return response()->json(
            [
                'message' => __('responses.client.create'),
                'data' => new DClientResource($dClient),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DClient $dClient): JsonResponse
    {
        return response()->json(new DClientResource($dClient));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DClientUpdateRequest $request, DClient $dClient): JsonResponse
    {

        $this->dClientService->edit($request->validated(), $dClient);

        return response()->json([
            'message' => __('responses.client.update'),
            'data' => new DClientResource($dClient),
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateContactInfo(DClientContactInfoUpdateRequest $request, DClient $dClient): JsonResponse
    {
        $this->dClientService->editContactInfo($request->validated(), $dClient);

        return response()->json([
            'message' => __('responses.client.update'),
            'data' => new DClientResource($dClient),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DClient $dClient, Request $request): JsonResponse
    {
        $this->dClientService->delete($dClient);

        return response()->json([
            'message' => __('responses.client.delete'),
        ], 202);
    }

    public function attachDocuments(DClient $dClient, UsersDocumentRequest $request)
    {
        $this->dClientService->attachDocuments($dClient, $request->validated()['documents']);

        return response()->json(
            [
                'message' => __('responses.document.create'),
            ],
            202
        );
    }

    public function validateClientDocument($idDocument, ValidateDocumentRequest $request)
    {
        $document = DClientDocument::findOrFail($idDocument);
        $this->dClientService->validateClientDocument($document, $request->validated());

        return response()->json([
            'message' => __('responses.document.validate'),
        ], 202);
    }

    public function disableClient(DClient $dClient)
    {
        $this->dClientService->disableClient($dClient);

        return response()->json([
            'message' => __('responses.client.disabled'),
        ], 202);
    }

    public function getDocuments(DClient $dClient)
    {
        return response()->json([
            'data' => $dClient->documents,
        ], 202);
    }
    // public function clientProjectDocuments(DClient $dClient)
    // {
    //     $allDocument = PDocument::all();

    // }

    public function clientProjectDocuments(DClient $dClient)
    {
        return $this->dClientService->clientProjectDocuments($dClient);
    }

    public function UpdateIbanRib(DClient $client, DClientIbanRibUpdateRequest $request)
    {

        $client->update($request->validated());

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DClientResource($client),
        ], 200);
    }
    public function downloadSignature(DClient $client)
    {
        if (!$client->signature) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
                    $client->signature,
                    'inline',
                    $client->trade_name . '.' . pathinfo($client->signature, PATHINFO_EXTENSION)
                );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }
}
