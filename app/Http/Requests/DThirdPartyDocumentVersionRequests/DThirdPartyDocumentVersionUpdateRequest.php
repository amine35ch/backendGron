<?php

namespace App\Http\Requests\DThirdPartyDocumentVersionRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DThirdPartyDocumentVersionUpdateRequest extends FormRequest
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
            'd_third_party_id' => 'nullable|exists:d_third_parties,id',
            'order_step' => 'nullable|exists:p_steps,id',
            'satisfied' => 'required|integer',
            'required' => 'required|integer',
            'reference_docusign' => 'required|string',
            'name' => [
                'required', 'string',
                Rule::unique('d_third_party_documents', 'name')->ignore($document->id),
            ],
        ];
    }
}
