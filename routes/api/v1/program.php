<?php

use App\Http\Controllers\api\v1\ProgramController;
use Illuminate\Support\Facades\Route;

Route::controller(ProgramController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/programs', 'store');
	Route::put('/programs/{program}', 'update');
	Route::get('/programs', 'index');
	Route::delete('/programs/{program}', 'destroy');
});
