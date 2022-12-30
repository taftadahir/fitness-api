<?php 

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface WorkoutRepositoryInterface
{
	public function store(array $data): JsonResponse;
}
