<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserAuthController::class, 'login']);
Route::post('/register', [UserAuthController::class, 'register']);

Route::group(['middleware' => 'auth:user'], function () {
    Route::post('/logout', [UserAuthController::class, 'logout']);
    Route::apiResource('/tasks', TaskController::class);
});
