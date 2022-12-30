<?php

use App\Http\Controllers\api\v1\WorkoutDayController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutDayController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/programs/{program}/workout_days', 'store');
	Route::put('/workout_days/{workoutDay}', 'update');
});
