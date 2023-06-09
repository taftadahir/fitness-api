<?php

use App\Http\Controllers\api\v1\ExerciseController;
use Illuminate\Support\Facades\Route;

Route::controller(ExerciseController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/exercises', 'store');
	Route::put('/exercises/{exercise}', 'update');
	Route::delete('/exercises/{exercise}', 'destroy');
	Route::get('/exercises/{exercise}', 'show');
	Route::get('/exercises', 'index');
});
