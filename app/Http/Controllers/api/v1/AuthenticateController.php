<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\LoginRequest;
use App\Interfaces\AuthenticateRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AuthenticateController extends Controller
{
	private AuthenticateRepositoryInterface $authenticateRepositoryInterface;

	public function __construct(AuthenticateRepositoryInterface $authenticateRepositoryInterface)
	{
		$this->authenticateRepositoryInterface = $authenticateRepositoryInterface;
	}

	public function login(LoginRequest $request): JsonResponse
	{
		return $this->authenticateRepositoryInterface->login($request->only(['email', 'password']));
	}
}
