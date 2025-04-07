<?php

namespace App\Http\Requests\UserRequests;

use App\Rules\UniqueUsernamePerCompany;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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

        $isRequired = $this->auth == 1 ? 'required' : 'nullable';
        return [
            'email' => [
                'nullable',
                'email',
                Rule::unique('users'),
            ],
            'password' => [
                $isRequired,
                'string',
            ],

            'username' => [
                $isRequired,
                'string',
                new UniqueUsernamePerCompany($this->username),
                'regex:/^[a-zA-Z0-9._-]+$/',
                'min:3',
                // 'max:13',
            ],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'supervisor_id' => 'nullable|exists:users,id',
            'role' => 'required|in:collaborator,admin,supervisor,inspector,MAR::admin,INS::admin,MAR::collaborator,MAR::supervisor,MAR::inspector,INS::supervisor,INS::inspector,INS::collaborator,AUD::admin,AUD::collaborator',
            'auth' => 'required|in:0,1',
            'phone_number' => [
                'nullable',
                'string',
                Rule::unique('users'),
                'min:8',
            ],
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => "L'identifiant ne doit contenir que des lettres minuscules, majuscule et des chiffres, sans espace ni caractères spéciaux.",
        ];
    }
}
