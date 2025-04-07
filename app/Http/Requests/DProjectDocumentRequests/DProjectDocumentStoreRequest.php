<?php

namespace App\Http\Requests\DProjectDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectDocumentStoreRequest extends FormRequest
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
            'p_document_id' => 'nullable|exists:p_documents,id',
            'd_third_party_id' => 'nullable|exists:d_third_parties,id',
            'order_step' => 'nullable|exists:p_steps,id',
            // 'd_project_id'       => 'nullable|exists:d_projects,id', // Uncomment if you decide to use 'd_project_id'
            'satisfied' => 'required|integer',
            'required' => 'required|integer',
            'reference_docusign' => 'required|string',
        ];
    }
}
