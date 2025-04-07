<?php

namespace App\Http\Controllers;

use App\Enums\FeatureEnum\FeatureType;
use App\Enums\UserEnum\UserProfileEnum;
use App\Http\Requests\UserRequests\UserProfileUpdateRequest;
use App\Http\Requests\UserRequests\UserStoreRequest;
use App\Http\Requests\UserRequests\UserUpdateRequest;
use App\Http\Resources\UserResources\UserCollection;
use App\Http\Resources\UserResources\UserResource;
use App\Models\DProject;
use App\Models\User;
use App\Services\SubscriptionServices\SubscriptionService;
use App\Services\UserServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(private UserService $userService, private DProject $dProject) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->getAll($request->all());

        return response()->json(
            new UserCollection($users)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        UserStoreRequest $request,
        UserService $userService
    ): JsonResponse {
        $isLimited = $this->checkUsersLimit();

        if ($isLimited && $request->auth == 1) {
            return response()->json([
                'message' => 'Vous avez atteint le nombre maximum d\'utilisateurs pour cette entreprise.',
            ], 422);
        }

        if ($request->role !== 'admin') {
            $subscriptionService = new SubscriptionService();
            $user = auth()->user();
            $subscriptionService->validateFeature($user->company_code, FeatureType::USER->value);
        }
        $user = $userService->create($request->validated(), getCompanyOfConnectedUser());

        return response()->json([
            'message' => 'Utilisateur est crée avec succée.',
            // 'data' => new UserResource($user),
        ], 200);
    }

    function checkUsersLimit()
    {
        $user = auth()->user();
        $company = $user->company;

        $technicians = 0;
        $users = User::where('company_code', $company->code)->get();
        foreach ($users as $key => $tech) {
            if (str_contains($tech->getRoleAttribute(), 'inspector')) {
                $technicians += 1;
            }
        }

        if ($technicians >= $company->max_technicien && $company->max_technicien > 0) {
            return true;
        } else if (count($users) - $technicians >= $company->max_collaborator && $company->max_collaborator > 0) {
            return true;
        }
        return false;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $this->userService->edit($request->validated(), $user);

        return response()->json([
            'message' => __('responses.user.update'),
            'data' => new UserResource($user),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request): JsonResponse
    {
        $this->userService->delete($user);

        return response()->json([
            'message' => __('responses.user.delete'),
        ], 202);
    }

    public function getUsers(Request $request): JsonResponse
    {
        $users = $this->userService->getAll($request->all());

        return response()->json(new UserCollection($users));
    }

    public function getSuperviseurInspecteur(Request $request): JsonResponse
    {
        $users = $this->userService->getSuperviseurInspecteur($request->all());

        return response()->json(new UserCollection($users));
    }
    public function getCollabs(Request $request): JsonResponse
    {
        $users = $this->userService->getAllCollab($request->all());

        return response()->json(new UserCollection($users));
    }

    public function getUser(
        User $user,
    ): JsonResponse {
        return response()->json(new UserResource($user));
    }

    public function updateUser(
        User $user,
        UserUpdateRequest $request,
    ): JsonResponse {
        $this->userService->edit($request->validated(), $user);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new UserResource($user),
        ], 200);
    }

    public function disableUser(User $user)
    {
        $this->userService->disableUser($user);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function deleteUser(User $user)
    {
        $this->userService->delete($user);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function getMyProfile(Request $request)
    {
        $profile = $this->userService->getProfile();

        return response()->json(new UserResource($profile));
    }

    public function updateMyProfile(UserProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $this->userService->updateProfile($request->validated(), $user);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new UserResource($user),
        ], 200);
    }

    public function getInspectors(Request $request)
    {

        $users = $this->userService->getInspectors($request->all());
        return response()->json(new UserCollection($users));
    }
}
