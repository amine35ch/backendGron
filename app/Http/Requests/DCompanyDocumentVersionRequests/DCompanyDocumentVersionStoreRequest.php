<?php

namespace App\Http\Requests\DCompanyDocumentVersionRequests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyDocumentVersionStoreRequest extends FormRequest
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
            'name' => 'nullable|unique:d_client_documents,name',
            'documents.*' => 'mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'p_document_id' => 'nullable|exists:p_documents,id',
            'required_document' => 'nullable|integer|in:0,1',
        ];
    }
}
