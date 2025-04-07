<?php

namespace App\Http\Requests\DDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectAttachementDocumentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'file' => 'required|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'p_document_id' => 'nullable|exists:p_documents,id',
            'step' => 'nullable|exists:p_steps,id',
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
