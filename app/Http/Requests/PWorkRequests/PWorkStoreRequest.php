<?php

namespace App\Http\Requests\PWorkRequests;

use Illuminate\Foundation\Http\FormRequest;

class PWorkStoreRequest extends FormRequest
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
            'd_company_id' => 'nullable|exists:mars,id',
            'unit' => 'nullable|exists:p_units,type',
            'pricing_list' => 'nullable|array',
            'type' => ['required', 'integer', 'unique:p_works,type'],
            'reference' => ['required', 'string', 'unique:p_works,reference'],
            'display_name' => 'nullable|string',
        ];
    }
}