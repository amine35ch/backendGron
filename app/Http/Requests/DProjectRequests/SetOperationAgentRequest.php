<?php

namespace App\Http\Requests\DProjectRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Rules\CheckCompanyProfile;
use Illuminate\Foundation\Http\FormRequest;

class SetOperationAgentRequest extends FormRequest
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
            'd_company_id' => [
                'required',
                'exists:d_companies,id',
                new CheckCompanyProfile([
                    DCompanyProfile::MAN->value,
                    DCompanyProfile::MAR->value,
                ]),
            ],
            'p_operation_id' => 'required|exists:p_operations,id',
            'general' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
        ];
    }
}
