<?php

namespace App\Http\Requests\DThirdPartyDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DThirdPartyDocumentUpdateRequest extends FormRequest
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
        $document = $this->route('third_party_document');

        return [
            'p_document_id' => 'nullable|exists:p_documents,id',
            'is_validated' => 'required|integer|in:0,1',
            'required_document' => 'required|integer|in:0,1',
            'name' => [
                'required', 'string',
                Rule::unique('d_third_party_documents', 'name')->ignore($document->id),
            ],
        ];
    }
}
