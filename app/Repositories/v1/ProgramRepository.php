<?php

namespace App\Repositories\v1;

use App\Interfaces\ProgramRepositoryInterface;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProgramRepository implements ProgramRepositoryInterface
{
    public function index(): JsonResponse
    {
		$programs = Program::active()->get();

		return response()->json([
			'success' => true,
			'programs' => $programs,
		]);
    }

	public function store(array $data): JsonResponse
	{
		/*
 		* @var App\Models\User $user
		*/
		$user = Auth::user();
		$program = new Program($data);
		$program->createdBy()->associate($user);
		$program->updatedBy()->associate($user);
		$program->save();
		$program->refresh();

		return response()->json([
			'success' => true,
			'program' => $program,
		]);
	}

	public function update(Program $program, array $data): JsonResponse
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
		$program->updatedBy()->associate($user);
		$program->update($validated);
		$program->refresh();

		return response()->json([
			'success' => true,
			'program' => $program,
		]);
	}
}
