<?php

namespace App\Http\Requests\RootRequests;

use Illuminate\Foundation\Http\FormRequest;

class RootStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:roots,email',
            ], 'password' => [
                'nullable',
                'string',
            ],
            'username' => [
                'required',
                'string',
                'unique:roots,username',
                'regex:/^\S*$/',
            ],
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'profile' => 'required|exists:p_profiles,reference|in:VAE',
            'role' => 'required|in:admin,collaborator',
        ];
    }
}
