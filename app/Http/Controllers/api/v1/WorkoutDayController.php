<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreWorkoutDayRequest;
use App\Http\Requests\api\v1\UpdateWorkoutDayRequest;
use App\Interfaces\WorkoutDayRepositoryInterface;
use App\Models\Program;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;

class WorkoutDayController extends Controller
{
	private WorkoutDayRepositoryInterface $workoutDayRepositoryInterface;

	public function __construct(WorkoutDayRepositoryInterface $workoutDayRepositoryInterface)
	{
		$this->workoutDayRepositoryInterface = $workoutDayRepositoryInterface;
	}

	public function index()
	{
		//
	}

	public function store(StoreWorkoutDayRequest $request, Program $program): JsonResponse
	{
		return $this->workoutDayRepositoryInterface->store($request->validated(), $program);
	}

	public function show(WorkoutDay $workoutDay)
	{
		//
	}

	public function update(UpdateWorkoutDayRequest $request, WorkoutDay $workoutDay): JsonResponse
	{
		return $this->workoutDayRepositoryInterface->update($workoutDay, $request->validated());
	}

	public function destroy(WorkoutDay $workoutDay): JsonResponse
	{
		return $this->workoutDayRepositoryInterface->destroy($workoutDay);
	}
}
