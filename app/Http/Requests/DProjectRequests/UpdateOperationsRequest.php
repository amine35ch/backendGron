<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperationsRequest extends FormRequest
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
            'operations' => 'required|array',
            'operations.*.p_operation_id' => 'required|exists:p_operations,id',
            'operations.*.start_date' => 'nullable|date',
            'operations.*.planned_start_date' => 'nullable|date',
            'operations.*.d_company_id' => 'required|exists:d_companies,id',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
        ];
    }
}
