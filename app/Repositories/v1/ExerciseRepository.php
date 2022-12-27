<?php

namespace App\Repositories\v1;

use App\Interfaces\ExerciceRepositoryInterface;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ExerciseRepository implements ExerciceRepositoryInterface
{
	public function store(array $data): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$exercise = new Exercise($data);
		$exercise->createdBy()->associate($user);
		$exercise->updatedBy()->associate($user);
		$exercise->save();
		$exercise->refresh();

		return response()->json([
			'success' => true,
			'exercise' => $exercise,
		]);
	}
}
