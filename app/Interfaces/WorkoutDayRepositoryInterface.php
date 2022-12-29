<?php

namespace App\Interfaces;

use App\Models\Program;
use Illuminate\Http\JsonResponse;

interface WorkoutDayRepositoryInterface
{
	public function store(array $data, Program $program): JsonResponse;
}
