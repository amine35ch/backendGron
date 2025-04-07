<?php

namespace App\Http\Controllers;

use App\Enums\PStateEnum\PStateEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Enums\UserEnum\SubscriptionStatus;
use App\Exceptions\CustomException;
use App\Http\Requests\AuthenticationRequests\AuthenticationApiRequest;
use App\Http\Requests\AuthenticationRequests\AuthenticationRequest;
use App\Http\Requests\AuthenticationRequests\ResetLinkByUserRequest;
use App\Http\Requests\AuthenticationRequests\ResetLinkRequest;
use App\Http\Requests\AuthenticationRequests\ResetPasswordRequest;
use App\Http\Requests\AuthenticationRequests\VerfiyCodeRequest;
use App\Models\PasswordResetTokens;
use App\Models\User;
use App\Services\PPreferenceServices\PPreferenceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Auth.
     */
    public function login(AuthenticationRequest $request)
    {
        $user = User::where([
            'username' => $request->validated()['username'],
            'company_code' => $request->validated()['company_code'] ?? null,
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
        if ($user->state == PStateEnum::DISABLED->value || !$user?->auth) {
            return response([
                'status' => 'failed',
                'result' => 'Votre compte est actuellement dans un état échoué. Veuillez contacter le support.',
            ], 404);
        }
        // if ($user->role == RoleEnum::MARINS->value) {
        //     if (!isset($request->validated()['app'])) {
        //         return response([
        //         'status' => 'failed',
        //         'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
        //     ], 404);
        //     }
        // }
        $authData = $request->only(['username', 'password', 'company_code', 'login_subscription']);

        if (
            !Auth::attempt($authData)
        ) {
            return response(
                [
                    'status' => 'failed',
                    'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
                ],
                404
            );
        }
        $user = auth()->user();
        setLog(__(
            'logs.auth.login',
            [
                'user' => $user->username,
            ]
        ));
        $user->last_login = now();
        $user->ip = $request->ip();
        $user->save();

        $userArray = $user->toArray();
        $userArray['display_profile'] = $user->userProfile->entitled;
        $userArray['subscription_status'] = SubscriptionStatus::PAYED->value;
        if ($request->login_subscription) {
            $this->loginSubscription();
        }

        try {
            $subscriptionState = Http::subscription()
                ->get("subscribers/{$user->company_code}/check-plan")->json();
            $userArray['subscription_status'] = $subscriptionState;
        } catch (\Throwable $th) {
        }

        return response([
            'status' => 'success',
            'result' => $userArray + [
                'role' => data_get($user->getRoleNames(), 0),
                'permissions' => $user->permissionList,
                'company' => $user->company,
                'profile' => $user->userProfile,
            ],
        ], 200);
    }

    /**
     * Auth.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        setLog(__('logs.auth.logout', [
            'user' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
        ]));

        Session::flush();
        Auth::guard('web')->logout();
    }

    public function loggedInUser()
    {
        $user = auth()->user();
        $userArray = $user->toArray();
        $userArray['display_profile'] = $user->userProfile->entitled;
        $userArray['subscription_status'] = SubscriptionStatus::PAYED->value;
        $parent=[
            'id'=>$user->company->parentCompany?->id,
            'trade_name'=>$user->company->parentCompany?->trade_name,
        ];
        try {
            $subscriptionState = Http::subscription()
                ->get("subscribers/{$user->company_code}/check-plan")->json();
            $userArray['subscription_status'] = $subscriptionState;
        } catch (\Throwable $th) {
        }

        return response([
            'status' => 'success',
            'result' => $userArray + [
                'role' => data_get($user->getRoleNames(), 0),
                'permissions' => $user->permissionList,
                'company' => $user->company,
                'profile' => $user->userProfile,
                'parent_object'=>$parent
            ],
        ], 200);
    }

    public function sendResetLinkEmail(ResetLinkRequest $request)
    {
        $this->authorize('send reset link');
        try {
            DB::beginTransaction();
            $password_token = PasswordResetTokens::where('email', $request->email)->first();
            if ($password_token) {
                $password_token->delete();
            }
            $key = mt_rand(100000, 999999);
            $password_token = PasswordResetTokens::create([
                'email' => $request->email,
                'token' => $key,
                'created_at' => Carbon::now(),
            ]);
            $message = __(
                'notifications.auth.reset_password',
                [
                    'code' => $key,
                ]
            );
            $user = User::where('email', $request->email)->first();
            sendNotificationUser(
                'Mot de passe oublié',
                $message,
                null,
                null,
                [$user],
                null
            );
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException();
        }

        return response()->json([
            'message' => __('actions.success'),
        ]);
    }

    public function verifyResetKey(VerfiyCodeRequest $request)
    {
        $password_token = PasswordResetTokens::where('token', $request->code)->first();
        if ($this->isVerificationCodeExpired($password_token)) {
            $password_token->delete();

            return response()->json([
                'message' => __('responses.auth.verify_reset_key'),
            ]);
        }
        $password_token->update([
            'validated' => true,
        ]);

        return response()->json([
            'message' => __('actions.success'),
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $password_token = PasswordResetTokens::where('token', $request->code)->first();
        if (!$password_token) {
            return response()->json([
                'message' => __('responses.auth.verify_reset_key'),
            ]);
        }
        if (!$password_token->validated) {
            return response()->json([
                'message' => __('responses.auth.validate_reset_key'),
            ]);
        }
        $user = User::where('email', $password_token->email)->first();
        $user->password = $request->password;
        $user->save();
        $password_token->delete();

        return response()->json([
            'message' => __('responses.auth.reset_password'),
        ]);
    }

    private function isVerificationCodeExpired(PasswordResetTokens $token)
    {
        $expirationTime = Carbon::parse($token->created_at)->addHours(3);

        return Carbon::now()->gt($expirationTime);
    }

    public function sendResetLinkEmailByUser(ResetLinkByUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::where('username', $request->username)->where('company_code', $request->company_code)->first();
            if ($user) {
                $password_token = PasswordResetTokens::where('email', $user->email)->first();
                if ($password_token) {
                    $password_token->delete();
                }
                $key = mt_rand(100000, 999999);
                $password_token = PasswordResetTokens::create([
                    'email' => $user->email,
                    'token' => $key,
                    'created_at' => Carbon::now(),
                ]);

                $message = __(
                    'notifications.auth.reset_password',
                    [
                        'code' => $key,
                    ]
                );
                sendNotificationUser(
                    'Mot de passe oublié',
                    $message,
                    null,
                    null,
                    [$user],
                    null
                );
                Db::commit();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th);
        }

        return response()->json([
            'message' => __('actions.success'),
        ]);
    }

    public function loginRoot(AuthenticationApiRequest $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!Hash::check($request->password, $user->password)) {
            return response(
                [
                    'status' => 'failed',
                    'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
                ],
                404
            );
        }

        $user->last_login = now();
        $user->ip = $request->ip();
        $user->save();

        setLog(__('logs.auth.login'));

        return response([
            'status' => 'success',
            'result' => $user->createNewToken(),
        ], 200);
    }

    public function logoutRoot(Request $request)
    {
        setLog(__('logs.auth.logout'));
        $user = auth()->user();
        $user->deletePreviousTokens();
    }

    public function loginSubscription()
    {
        try {
            $preferenceService = new PPreferenceService();
            $preference = $preferenceService->getFirst();
            $credentials = [
                'username' => 'gron',
                'password' => '12345678',
            ];
            $user = Http::subscription()
                ->post('login', $credentials)->json();
            setLog('Connecté depuis subscription');

            $preference->update(['token' => $user['result']['token']]);

            return response([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'failed',
                'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
            ], 404);
        }
    }

    public function refreshTokenSubscription(Request $request)
    {
        try {
            $preferenceService = new PPreferenceService();

            $preference = $preferenceService->getFirst();

            $newToken = Http::subscription()
                ->get('refresh-token');
            $preference->update(['token' => $newToken]);

            return response([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'failed',
                'result' => 'Le mot de passe, identifiant ou le code saisi est incorrect.',
            ], 404);
        }
    }

    public function refreshToken(Request $request)
    {
        $user = auth()->user();

        return response()->json(['token' => $user->createNewToken()], 200);
    }
}
