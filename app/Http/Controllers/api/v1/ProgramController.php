<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\StoreProgramRequest;
use App\Http\Requests\api\v1\UpdateProgramRequest;
use App\Interfaces\ProgramRepositoryInterface;
use App\Models\Program;
use Illuminate\Http\JsonResponse;

class ProgramController extends Controller
{
	private ProgramRepositoryInterface $programRepositoryInterface;

	public function __construct(ProgramRepositoryInterface $programRepositoryInterface)
	{
		$this->programRepositoryInterface = $programRepositoryInterface;
	}

	public function index(): JsonResponse
	{
		return $this->programRepositoryInterface->index();
	}

	public function store(StoreProgramRequest $request): JsonResponse
	{
		return $this->programRepositoryInterface->store($request->validated());
	}

	public function show(Program $program): JsonResponse
	{
		return $this->programRepositoryInterface->show($program);
	}

	public function update(UpdateProgramRequest $request, Program $program): JsonResponse
	{
		return $this->programRepositoryInterface->update($program, $request->validated());
	}

	public function destroy(Program $program): JsonResponse
	{
		return $this->programRepositoryInterface->destroy($program);
	}
}
