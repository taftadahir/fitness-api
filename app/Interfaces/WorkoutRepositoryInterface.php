<?php

namespace App\Interfaces;

use App\Models\Workout;
use Illuminate\Http\JsonResponse;

interface WorkoutRepositoryInterface
{
	public function show(Workout $workout): JsonResponse;
	public function store(array $data): JsonResponse;
	public function update(Workout $workout, array $data): JsonResponse;
	public function destroy(Workout $workout): JsonResponse;
}
