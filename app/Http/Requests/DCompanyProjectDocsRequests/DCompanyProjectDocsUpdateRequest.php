<?php

namespace App\Http\Requests\DCompanyProjectDocsRequests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyProjectDocsUpdateRequest extends FormRequest
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
            'type_doc' => 'required|integer|exists:p_documents,type',
            'required' => 'required|boolean',
        ];
    }
}
