<?php

namespace App\Http\Requests\MarDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarDocumentUpdateRequest extends FormRequest
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
        $document = $this->route('mar_document');

        return [
            'p_document_id' => 'nullable|exists:p_documents,id',
            'is_validated' => 'required|integer|in:0,1',
            'required_document' => 'required|integer|in:0,1',
            'name' => [
                'required', 'string',
                Rule::unique('mar_documents', 'name')->ignore($document->id),
            ],
        ];
    }
}
