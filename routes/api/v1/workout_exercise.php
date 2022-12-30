<?php

use App\Http\Controllers\api\v1\WorkoutExerciseController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutExerciseController::class)->middleware('auth:sanctum')->group(function () {
	Route::post('/workouts/{workout}/exercises/{exercise}/workout_exercises', 'store');
	Route::put('/workout_exercises/{workoutExercise}', 'update');
});
