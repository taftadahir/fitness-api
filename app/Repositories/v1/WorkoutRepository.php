<?php

namespace App\Repositories\v1;

use App\Interfaces\WorkoutRepositoryInterface;
use App\Models\Program;
use App\Models\Workout;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorkoutRepository implements WorkoutRepositoryInterface
{
	public function index(Program $program): JsonResponse
	{
		$workouts = Workout::whereHas('workoutDay', function ($query) use ($program) {
			$query->where('program_id', $program->id);
		})->get();

		return response()->json([
			'success' => true,
			'workouts' => $workouts,
		]);
	}

	public function show(Workout $workout): JsonResponse
	{
		return response()->json([
			'success' => true,
			'workout' => $workout,
		]);
	}

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

	public function update(Workout $workout, array $data): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();

		if (isset($data['workout_day_id'])) {
			$workoutDay = WorkoutDay::where('id', $data['workout_day_id'])->first();
			$workout->workoutDay()->associate($workoutDay);
		} else {
			$workout->workoutDay()->dissociate();
		}

		$workout->updatedBy()->associate($user);
		$workout->update($data);
		$workout->refresh();

		return response()->json([
			'success' => true,
			'workout' => $workout,
		]);
	}

	public function destroy(Workout $workout): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$workout->deletedBy()->associate($user)->save();
		$workout->delete();

		return response()->json([
			'success' => true,
		]);
	}
}
