<?php

namespace App\Http\Requests\DProjectOperationRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectOperationUpdateRequest extends FormRequest
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
            'd_project_id' => 'required|exists:d_projects,id',
            'p_operation_id' => 'required|exists:p_operations,id',
            'd_third_party_id' => 'nullable|exists:d_third_parties,id',
            'is_validated' => 'required|in:0,1',
            'price' => 'nullable|numeric',

        ];
    }
}
