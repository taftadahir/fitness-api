<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutDayRepositoryInterface;
use App\Models\Program;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth; 

class WorkoutDayRepository implements WorkoutDayRepositoryInterface{
    public function store(array $data, Program $program): JsonResponse
    {
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutDay = new WorkoutDay($data);
		$workoutDay->program()->associate($program);
		$workoutDay->createdBy()->associate($user);
		$workoutDay->updatedBy()->associate($user);
		$workoutDay->save();
		$workoutDay->refresh();

		return response()->json([
			'success' => true,
			'workout_day' => $workoutDay,
		]);
    }
}
