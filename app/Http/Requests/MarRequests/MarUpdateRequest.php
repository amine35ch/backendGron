<?php

namespace App\Http\Requests\MarRequests;

use Illuminate\Foundation\Http\FormRequest;

class MarUpdateRequest extends FormRequest
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
            'entitled' => 'required|string',
            'email' => 'required|email|unique:mars,id',
            'phone_1' => 'required|string|min:8',
            'phone_2' => 'nullable|string|min:8',
            'users' => 'nullable|array',
            'legal_representative' => 'nullable|string',
            'representative_role' => 'nullable|string',
            'trade_name' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'siret' => 'nullable|string',
            'approval_number' => 'nullable|string',
            'signature' => 'nullable|file|mimes:png,jpg',
            'default_pagination' => 'nullable|integer',
            'currency' => 'nullable|string|in:€,$,£,TND',
            'decimals' => 'nullable|integer',
        ];
    }
}
