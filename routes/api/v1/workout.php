<?php

use App\Http\Controllers\api\v1\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutController::class)->middleware('auth:sanctum')->group(function () {
	Route::get('/programs/{program}/workouts', 'index');
	Route::get('/workouts/{workout}', 'show');
	Route::post('/workouts', 'store');
	Route::put('/workouts/{workout}', 'update');
	Route::delete('/workouts/{workout}', 'destroy');
});
