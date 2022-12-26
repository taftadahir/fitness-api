<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'name' => 'required|string|max:255',
			'first_name' => 'nullable|string|max:255',
			'last_name' => 'nullable|string|max:255',
			'birthday' => 'nullable|date|before:' . now(),
			'gender' => 'nullable|string|max:255',
			'height' => 'nullable|integer|min:0|max:65535',
			'weight' => 'nullable|integer|min:0|max:16777215',
			'email' => 'required|string|email|max:255|unique:' . User::class,
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		];
	}
}
