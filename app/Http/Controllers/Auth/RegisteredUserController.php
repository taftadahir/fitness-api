<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
	public function create(): \Inertia\Response
	{
		return Inertia::render('Auth/Register');
	}

	public function store(RegisterUserRequest $request): \Illuminate\Http\RedirectResponse
	{
		$validated = $request->validated();

		$user = User::create($validated);

		Auth::login($user);

		return redirect(RouteServiceProvider::HOME);
	}
}
