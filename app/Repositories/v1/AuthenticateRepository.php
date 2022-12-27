<?php

namespace App\Repositories\v1;

use App\Interfaces\AuthenticateRepositoryInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthenticateRepository implements AuthenticateRepositoryInterface
{
	public function login(array $request): JsonResponse
	{
		$email = $request['email'];
		$password = $request['password'];
		$user = User::where('email', $email)->first();
		$invalidMsg = 'Invalid Credentials';

		if ($user) {
			if (Hash::check($password, $user->password)) {
				return response()->json(['success' => true, 'token' => $user->createToken($user->name)->plainTextToken]);
			} else {
				return response()->json(['success' => false, 'error' => $invalidMsg]);
			}
		} else {
			return response()->json(['success' => false, 'error' => $invalidMsg]);
		}
	}
}
