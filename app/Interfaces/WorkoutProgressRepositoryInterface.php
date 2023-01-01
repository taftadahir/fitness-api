<?php

namespace App\Interfaces;

use App\Models\WorkoutExercise;
use Illuminate\Http\JsonResponse;

interface WorkoutProgressRepositoryInterface
{
	public function store(array $data, WorkoutExercise $workoutExercise): JsonResponse;
}