<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VulnerabilityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('users', UserController::class);

Route::get('/vulnerable-sql', [VulnerabilityController::class, 'sqlInjection']);
Route::post('/vulnerable-xss', [VulnerabilityController::class, 'xss']);

Route::get('/vulnerable-auth', [VulnerabilityController::class, 'noAuth']);
Route::get('/vulnerable-directory', [VulnerabilityController::class, 'directoryTraversal']);
Route::post('/vulnerable-upload', [VulnerabilityController::class, 'insecureFileUpload']);




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
