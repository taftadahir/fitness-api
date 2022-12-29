<?php

namespace App\Interfaces;

use App\Models\Program;
use Illuminate\Http\JsonResponse;

interface ProgramRepositoryInterface
{
	public function store(array $data): JsonResponse;
	public function update(Program $program, array $data): JsonResponse;
}
