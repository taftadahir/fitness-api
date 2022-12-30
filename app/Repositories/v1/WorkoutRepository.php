<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutRepositoryInterface;
use App\Models\Workout;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorkoutRepository implements WorkoutRepositoryInterface
{
	public function store(array $data): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workout = new Workout($data);

		if (isset($data['workout_day_id'])) {
			$workoutDay = WorkoutDay::where('id', $data['workout_day_id'])->first();
			$workout->workoutDay()->associate($workoutDay);
		}

		$workout->createdBy()->associate($user);
		$workout->updatedBy()->associate($user);
		$workout->save();
		$workout->refresh();

		return response()->json([
			'success' => true,
			'workout' => $workout,
		]);
	}
}
