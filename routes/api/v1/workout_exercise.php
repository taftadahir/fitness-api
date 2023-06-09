<?php

use App\Http\Controllers\api\v1\WorkoutExerciseController;
use Illuminate\Support\Facades\Route;

Route::controller(WorkoutExerciseController::class)->middleware('auth:sanctum')->group(function () {
	Route::get('workouts/{workout}/workout_exercises', 'index');
	Route::get('/workout_exercises/{workoutExercise}', 'show');
	Route::post('/workouts/{workout}/exercises/{exercise}/workout_exercises', 'store');
	Route::put('/workout_exercises/{workoutExercise}', 'update');
	Route::delete('/workout_exercises/{workoutExercise}', 'destroy');
	Route::delete('/workouts/{workout}/workout_exercises', 'destroyAll');
});
