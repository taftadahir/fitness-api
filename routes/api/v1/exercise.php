<?php

use App\Http\Controllers\api\v1\ExerciseController;
use Illuminate\Support\Facades\Route;

Route::controller(ExerciseController::class)->middleware('auth:sanctum')->group(function () {
    Route::post('/exercises', 'store');
});
