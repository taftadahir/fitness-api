<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutExerciseRequest extends FormRequest
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
			'order' => ['nullable', 'integer', 'min:0', 'max:65535'],
			'reps' => ['nullable', 'integer', 'min:0', 'max:65535'],
			'sets' => ['nullable', 'integer', 'min:0', 'max:65535'],
			'weight' => ['nullable', 'integer', 'min:0', 'max:65535'],
		];
	}
}
