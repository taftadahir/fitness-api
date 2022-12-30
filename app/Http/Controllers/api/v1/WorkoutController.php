<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreWorkoutRequest;
use App\Http\Requests\api\v1\UpdateWorkoutRequest;
use App\Interfaces\WorkoutRepositoryInterface;
use App\Models\Workout;
use Illuminate\Http\JsonResponse;

class WorkoutController extends Controller
{
	private WorkoutRepositoryInterface $inner;

	public function __construct(WorkoutRepositoryInterface $inner)
	{
		$this->inner = $inner;
	}

	public function index()
	{
		//
	}

	public function store(StoreWorkoutRequest $request): JsonResponse
	{
		return $this->inner->store($request->validated());
	}

	public function show(Workout $workout): JsonResponse
	{
		return $this->inner->show($workout);
	}

	public function update(UpdateWorkoutRequest $request, Workout $workout): JsonResponse
	{
		return $this->inner->update($workout, $request->validated());
	}

	public function destroy(Workout $workout): JsonResponse
	{
		return $this->inner->destroy($workout);
	}
}
