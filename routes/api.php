<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VulnerabilityController;


Route::get('/vulnerable-sql', [VulnerabilityController::class, 'sqlInjection']);
Route::post('/vulnerable-xss', [VulnerabilityController::class, 'xss']);
Route::post('/vulnerable-upload', [VulnerabilityController::class, 'insecureFileUpload']);

Route::apiResource('users', UserController::class);
Route::get('/vulnerable-auth', [VulnerabilityController::class, 'noAuth']);
Route::get('/vulnerable-directory', [VulnerabilityController::class, 'directoryTraversal']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
