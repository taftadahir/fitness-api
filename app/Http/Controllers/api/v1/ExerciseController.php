<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreExerciseRequest;
use App\Http\Requests\api\v1\UpdateExerciseRequest;
use App\Interfaces\ExerciceRepositoryInterface;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;

class ExerciseController extends Controller
{
	private ExerciceRepositoryInterface $exerciseRepositoryInterface;

	public function __construct(ExerciceRepositoryInterface $exerciceRepositoryInterface)
	{
		$this->exerciseRepositoryInterface = $exerciceRepositoryInterface;
	}

	public function index()
	{
		//
	}

	public function store(StoreExerciseRequest $request): JsonResponse
	{
		return $this->exerciseRepositoryInterface->store($request->validated());
	}

	public function show(Exercise $exercise)
	{
		//
	}

	public function update(UpdateExerciseRequest $request, Exercise $exercise): JsonResponse
	{
		return $this->exerciseRepositoryInterface->update($exercise ,$request->validated());
	}

	public function destroy(Exercise $exercise)
	{
		//
	}
}
