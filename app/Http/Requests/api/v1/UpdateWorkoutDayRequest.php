<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutDayRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
			'day_number' =>['nullable', 'integer', 'min:0', 'max:65535'],
			'is_rest_day'=>['nullable', 'boolean']
        ];
    }
}
