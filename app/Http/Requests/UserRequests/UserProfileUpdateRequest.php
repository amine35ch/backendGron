<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserProfileUpdateRequest extends FormRequest
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
        $user = ($this->route('user')) ? $this->route('user') : auth()->user();

        return [
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => [
                'nullable',
                'string',
            ],
            'username' => [
                'required',
                'string',
                Rule::unique('users')->ignore($user->id)->where(function ($query) {
                    return $query->where([
                        'userable_id' => getCompanyOfConnectedUser()->id,
                    ]);
                }),
                'regex:/^[a-zA-Z0-9._-]+$/',
                'min:3',
                'max:13',
            ],
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable|string',

            'phone_number' => [
                'nullable',
                'string',
                Rule::unique('users')->ignore($user->id),
                'min:8',
            ],
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => "L'identifiant ne doit contenir que des lettres minuscules et des chiffres, sans espace ni caractères spéciaux.",
        ];
    }
}
