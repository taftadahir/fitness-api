<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreWorkoutExerciseRequest;
use App\Http\Requests\api\v1\UpdateWorkoutExerciseRequest;
use App\Interfaces\WorkoutExerciseRepositoryInterface;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use Illuminate\Http\JsonResponse;

class WorkoutExerciseController extends Controller
{
	private WorkoutExerciseRepositoryInterface $inner;

	public function __construct(WorkoutExerciseRepositoryInterface $inner)
	{
		$this->inner = $inner;
	}

	public function index()
	{
		//
	}

	public function store(StoreWorkoutExerciseRequest $request, Workout $workout, Exercise $exercise): JsonResponse
	{
		return $this->inner->store($workout, $exercise, $request->validated());
	}

	public function show(WorkoutExercise $workoutExercise)
	{
		//
	}

	public function update(UpdateWorkoutExerciseRequest $request, WorkoutExercise $workoutExercise): JsonResponse
	{
		return $this->inner->update($request->validated(), $workoutExercise);
	}

	public function destroy(WorkoutExercise $workoutExercise): JsonResponse
	{
		return $this->inner->destroy($workoutExercise);
	}

	public function destroyAll(Workout $workout): JsonResponse
	{
		return $this->inner->destroyAll($workout);
	}
}
