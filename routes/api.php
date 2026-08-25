<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserRoleController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);


// Protected routes (Only accessible with a valid Sanctum token)
Route::middleware('auth:sanctum')->group(function () {
   
    // Example protected endpoint to get the authenticated user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/user_role', function (Request $request) {
        return $request->user()->role;
    });
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/user_roles', [UserRoleController::class, 'index']);
    Route::get('/user_roles/{user_role}', [UserRoleController::class, 'show']);
});
