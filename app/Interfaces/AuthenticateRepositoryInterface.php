<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface AuthenticateRepositoryInterface 
{
    public function login(array $request): JsonResponse;
}
