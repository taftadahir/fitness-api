<?php

namespace App\Interfaces;

use App\Models\Exercise;
use Illuminate\Http\JsonResponse;

interface ExerciceRepositoryInterface
{
	public function show(Exercise $exercise): JsonResponse;
	public function index(): JsonResponse;
	public function store(array $data): JsonResponse;
	public function update(Exercise $exercise, array $data): JsonResponse;
	public function destroy(Exercise $exercise): JsonResponse;
}
