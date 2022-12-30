<?php

namespace App\Interfaces;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\JsonResponse;

interface WorkoutExerciseRepositoryInterface
{
	public function store(Workout $workout, Exercise $exercise, array $data): JsonResponse;
}
