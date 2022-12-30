<?php

namespace App\Interfaces;

use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use Illuminate\Http\JsonResponse;

interface WorkoutExerciseRepositoryInterface
{
	public function show(WorkoutExercise $workoutExercise): JsonResponse;
	public function store(Workout $workout, Exercise $exercise, array $data): JsonResponse;
	public function update(array $data, WorkoutExercise $workoutExercise): JsonResponse;
	public function destroy(WorkoutExercise $workoutExercise): JsonResponse;
	public function destroyAll(Workout $workout): JsonResponse;
}
