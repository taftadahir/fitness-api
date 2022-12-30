<?php

namespace App\Interfaces;

use App\Models\Program;
use App\Models\WorkoutDay;
use Illuminate\Http\JsonResponse;

interface WorkoutDayRepositoryInterface
{
	public function store(array $data, Program $program): JsonResponse;
	public function update(WorkoutDay $workoutDay, array $data): JsonResponse;
	public function destroy(WorkoutDay $workoutDay): JsonResponse;
	public function show(WorkoutDay $workoutDay): JsonResponse;
}
