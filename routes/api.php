<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

require __DIR__ . '/api/' . config('app.version') . '/auth.php';
require __DIR__ . '/api/' . config('app.version') . '/exercise.php';
require __DIR__ . '/api/' . config('app.version') . '/program.php';
require __DIR__ . '/api/' . config('app.version') . '/workout_day.php';
require __DIR__ . '/api/' . config('app.version') . '/workout.php';
require __DIR__ . '/api/' . config('app.version') . '/workout_exercise.php';
require __DIR__ . '/api/' . config('app.version') . '/workout_progress.php';
