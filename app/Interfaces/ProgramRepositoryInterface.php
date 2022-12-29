<?php

namespace App\Interfaces;

use App\Models\Program;
use Illuminate\Http\JsonResponse;

interface ProgramRepositoryInterface
{
	public function show(Program $program): JsonResponse;
	public function index(): JsonResponse;
	public function store(array $data): JsonResponse;
	public function update(Program $program, array $data): JsonResponse;
	public function destroy(Program $program): JsonResponse;
}
