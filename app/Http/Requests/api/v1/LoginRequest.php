<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
			'email' => ['required', 'string', 'email'],
			'password' => ['required', 'string'],
        ];
    }
}
