<?php

use App\Http\Controllers\api\v1\AuthenticateController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('login', [AuthenticateController::class, 'login']);
});

# Route::middleware('auth')->group(function () {
#     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
#                 ->name('logout');
# });
