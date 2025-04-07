<?php

namespace App\Http\Requests\POperationRequests;

use Illuminate\Foundation\Http\FormRequest;

class POperationStoreRequest extends FormRequest
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
            'type' => ['required', 'integer', 'unique:p_operations,type'],
            'name' => 'required|string',
            'd_company_id' => 'nullable|exists:mars,id',
            'intern' => 'nullable|integer',
            'extern' => 'nullable|integer',
        ];
    }
}
