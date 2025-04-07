<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $isRequired = $this->auth == 1 ? 'required' : 'nullable';

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
                $isRequired,
                'string',
                Rule::unique('users')->ignore($user->id)->where(function ($query) use ($user) {
                    return $query->where('company_code', $user->company_code);
                }),
                'regex:/^[a-zA-Z0-9._-]+$/',
                'min:3',
                // 'max:13',
            ],

            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'auth' => 'required|in:0,1',
            'supervisor_id' => 'nullable|exists:users,id',
            'role' => 'required|in:collaborator,admin,supervisor,inspector,MAR::admin,INS::admin,MAR::collaborator,MAR::supervisor,MAR::inspector,INS::supervisor,INS::inspector,INS::collaborator,AUD::admin,AUD::collaborator',

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
            'username.regex' => "L'identifiant ne doit contenir que des lettres minuscules, majuscule et des chiffres, sans espace ni caractères spéciaux.",
            // Custom error messages for other rules...
        ];
    }
}
