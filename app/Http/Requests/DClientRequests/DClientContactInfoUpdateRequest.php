<?php

namespace App\Http\Requests\DClientRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DClientContactInfoUpdateRequest extends FormRequest
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
        $client = $this->route('client');


        return [


            'email_contact' => [
                'required',
                'email',
                Rule::unique('d_clients', 'email_contact')->ignore($client->id),
            ],
            'phone_number_1' => [
                'required',
                'string',
                Rule::unique('d_clients', 'phone_number_1')->ignore($client->id),
            ],

        ];
    }
}
