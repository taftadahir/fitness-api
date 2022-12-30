<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutExerciseRepositoryInterface;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorkoutExerciseRepository implements WorkoutExerciseRepositoryInterface
{
	public function store(Workout $workout, Exercise $exercise, array $data): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutExercise = new WorkoutExercise($data);
		$workoutExercise->workout()->associate($workout);
		$workoutExercise->exercise()->associate($exercise);
		$workoutExercise->createdBy()->associate($user);
		$workoutExercise->updatedBy()->associate($user);
		$workoutExercise->save();
		$workoutExercise->refresh();

		return response()->json([
			'success' => true,
			'workout_exercise' => $workoutExercise,
		]);
	}

	public function update(array $data, WorkoutExercise $workoutExercise): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutExercise->updatedBy()->associate($user);
		$workoutExercise->update($data);
		$workoutExercise->refresh();

		return response()->json([
			'success' => true,
			'workout_exercise' => $workoutExercise,
		]);
	}

	public function destroy(WorkoutExercise $workoutExercise): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workoutExercise->deletedBy()->associate($user)->save();
		$workoutExercise->delete();

		return response()->json([
			'success' => true,
		]);
	}

	/**
	 * Delete all workout exercise which belong to a workout 
	 */
	public function destroyAll(Workout $workout): JsonResponse
	{
		$workoutExercises = WorkoutExercise::where('workout_id', $workout->id)->get();

		foreach ($workoutExercises as $workoutExercise) {
			$this->destroy($workoutExercise);
		}

		return response()->json([
			'success' => true,
		]);;
	}
}
