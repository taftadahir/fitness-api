<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
			'u_id' => ['nullable', 'string', 'max:255'],
			'name' => ['required', 'string', 'max:255'],
			'description' => ['nullable', 'string'],
			'active' => ['nullable', 'boolean'],
		];
	}
}
