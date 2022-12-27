<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface ExerciceRepositoryInterface
{
	public function store(array $data): JsonResponse;
}
