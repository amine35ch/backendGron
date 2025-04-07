<?php

namespace App\Http\Requests\PDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class PDocumentUpdateRequest extends FormRequest
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
            'type' => 'required|exists:p_type_documents,type',
            'entitled' => 'required|string',
        ];
    }
}
