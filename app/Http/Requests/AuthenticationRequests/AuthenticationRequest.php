<?php

namespace App\Http\Requests\AuthenticationRequests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            // 'guard' => 'nullable|in:external,internal',
            'company_code' => 'required|string',
            'login_subscription' => ['nullable', 'boolean'],
            'app' => 'nullable|string',
            // 'd_company_id' => $isRequired . '|exists:mars,id'
        ];
    }
}
