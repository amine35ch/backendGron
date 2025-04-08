<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DCompanyController;
use App\Http\Controllers\SubscriptionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bootstrap', function () {
    User::find(3)->givePermissionTo([
        'generate-shuttle-card-form',
        'fill-shuttle-card-form',
    ]);
});

Route::post('/login', [AuthController::class, 'loginRoot']);
Route::post('refresh-token', [AuthController::class, 'refreshToken']);
Route::post('login-subscription', [AuthController::class, 'loginSubscription']);
Route::post('refresh-subscription', [AuthController::class, 'refreshTokenSubscription']);

// Route::group(['middleware' => ['auth:api']], function () {

    Route::post('logout', [AuthController::class, 'logoutRoot']);
    Route::get('companies/{subscriber}/finished-projects', [SubscriptionController::class, 'getFinishedProject']);
    Route::post('companies/mars', [DCompanyController::class, 'storeMAR']);
// });

// Ajouter cette route pour servir le fichier de documentation Swagger
Route::get('/docs/GRON_API_Collection.json', [App\Http\Controllers\SwaggerDocController::class, 'serveJson']);
