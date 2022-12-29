<?php

namespace App\Repositories\v1;

use App\Interfaces\ProgramRepositoryInterface;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProgramRepository implements ProgramRepositoryInterface
{
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
}
