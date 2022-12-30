<?php

use App\Http\Controllers\api\v1\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/workouts', 'store');
});
