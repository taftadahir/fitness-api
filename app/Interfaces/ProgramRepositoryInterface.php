<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface ProgramRepositoryInterface
{
	public function store(array $data): JsonResponse;
}
