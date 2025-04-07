<?php

namespace App\Http\Requests\DDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectAttachementAnyDocumentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'documents' => 'array|required',
            'documents.*.name' => 'required|string',
            'documents.*.file' => 'required|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'documents.*.p_document_id' => 'nullable|exists:p_documents,id',
            'documents.*.step' => 'nullable|exists:p_steps,id',
            // 'required' => 'nullable|integer|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
        ];
    }
}
