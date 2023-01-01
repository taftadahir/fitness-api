<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutProgressRepositoryInterface;
use App\Models\WorkoutExercise;
use App\Models\WorkoutProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorkoutProgressRepository implements WorkoutProgressRepositoryInterface
{
    public function store(array $data, WorkoutExercise $workoutExercise): JsonResponse
    {
        /*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
        $workoutProgress = new WorkoutProgress($data);
		$workoutProgress->workoutExercise()->associate($workoutExercise);
		$workoutProgress->createdBy()->associate($user);
		$workoutProgress->updatedBy()->associate($user);
		$workoutProgress->save();
		$workoutProgress->refresh();

		return response()->json([
			'success' => true,
			'workout_progress' => $workoutProgress,
		]);
    }

	public function update(array $data, WorkoutProgress $workoutProgress): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutProgress->updatedBy()->associate($user);
		$workoutProgress->update($data);
		$workoutProgress->refresh();

		return response()->json([
			'success' => true,
			'workout_progress' => $workoutProgress,
		]);
	}

	public function destroy(WorkoutProgress $workoutProgress): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutProgress->deletedBy()->associate($user)->save();
		$workoutProgress->delete();
		
		return response()->json([
			'success' => true,
		]);
	}
}