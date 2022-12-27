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

	public function update(Exercise $exercise, array $data): JsonResponse
	{
		$validated =  array_filter($data, function ($value, $key) {
			if ($key == 'name') {
				return !is_null($value);
			}
			return true;
		}, ARRAY_FILTER_USE_BOTH);

		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$exercise->updatedBy()->associate($user);
		$exercise->update($validated);
		$exercise->refresh();

		return response()->json([
			'success' => true,
			'exercise' => $exercise,
		]);
	}

    public function destroy(Exercise $exercise): JsonResponse
    {
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$exercise->deletedBy()->associate($user)->save();
		$exercise->delete();

		return response()->json([
			'success' => true,
		]);
    }
}
