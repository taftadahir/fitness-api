<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutDayRepositoryInterface;
use App\Models\Program;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorkoutDayRepository implements WorkoutDayRepositoryInterface
{
	public function show(WorkoutDay $workoutDay): JsonResponse
	{
		return response()->json([
			'success' => true,
			'workout_day' => $workoutDay,
		]);
	}

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

	public function update(WorkoutDay $workoutDay, array $data): JsonResponse
	{
		$validated =  array_filter($data, function ($value, $key) {
			if ($key == 'day_number' || $key == 'is_rest_day') {
				return !is_null($value);
			}
			return true;
		}, ARRAY_FILTER_USE_BOTH);

		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutDay->updatedBy()->associate($user);
		$workoutDay->update($validated);
		$workoutDay->refresh();

		return response()->json([
			'success' => true,
			'workout_day' => $workoutDay,
		]);
	}

	public function destroy(WorkoutDay $workoutDay): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutDay->deletedBy()->associate($user)->save();
		$workoutDay->delete();

		return response()->json([
			'success' => true,
		]);
	}
}
