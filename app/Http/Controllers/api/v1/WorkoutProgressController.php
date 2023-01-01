<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreWorkoutProgressRequest;
use App\Http\Requests\api\v1\UpdateWorkoutProgressRequest;
use App\Interfaces\WorkoutProgressRepositoryInterface;
use App\Models\Program;
use App\Models\WorkoutExercise;
use App\Models\WorkoutProgress;
use Illuminate\Http\JsonResponse;

class WorkoutProgressController extends Controller
{
	private WorkoutProgressRepositoryInterface $inner;

	public function __construct(WorkoutProgressRepositoryInterface $inner)
	{
		$this->inner = $inner;
	}

    public function index(Program $program): JsonResponse
    {
        return $this->inner->index($program);
    }

    public function store(StoreWorkoutProgressRequest $request, WorkoutExercise $workoutExercise): JsonResponse
    {
        return $this->inner->store($request->validated(), $workoutExercise);
    }

    public function show(WorkoutProgress $workoutProgress)
    {
        return $this->inner->show($workoutProgress);
    }

    public function update(UpdateWorkoutProgressRequest $request, WorkoutProgress $workoutProgress)
    {
        return $this->inner->update($request->validated(), $workoutProgress);
    }

    public function destroy(WorkoutProgress $workoutProgress): JsonResponse
    {
        return $this->inner->destroy($workoutProgress);
    }
}
