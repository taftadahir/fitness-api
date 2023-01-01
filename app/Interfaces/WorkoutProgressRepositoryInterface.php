<?php

namespace App\Interfaces;

use App\Models\WorkoutExercise;
use App\Models\WorkoutProgress;
use Illuminate\Http\JsonResponse;

interface WorkoutProgressRepositoryInterface
{
	public function store(array $data, WorkoutExercise $workoutExercise): JsonResponse;
	public function update(array $data, WorkoutProgress $workoutProgress): JsonResponse;
}