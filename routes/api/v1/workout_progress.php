<?php

use App\Http\Controllers\api\v1\WorkoutProgressController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutProgressController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/workout_exercises/{workoutExercise}/workout_progresses', 'store');
});
