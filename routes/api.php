<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\VerifyTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("login", [LoginController::class, 'login'])->name('login');
Route::post("register", [RegisterController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::post("logout", [LogoutController::class, 'logout'])->name('logout');
    Route::post("verify-token", [VerifyTokenController::class, 'verifyToken'])->name('verify-token');
});
