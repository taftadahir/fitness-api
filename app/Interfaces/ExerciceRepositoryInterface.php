<?php

namespace App\Interfaces;

use App\Models\Exercise;
use Illuminate\Http\JsonResponse;

interface ExerciceRepositoryInterface
{
	public function store(array $data): JsonResponse;
	public function update(Exercise $exercise, array $data): JsonResponse;
}
