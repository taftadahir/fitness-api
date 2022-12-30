<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutRequest extends FormRequest
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
			'workout_day_id' => ['nullable', 'integer', 'exists:App\Models\WorkoutDay,id']
		];
	}
}
