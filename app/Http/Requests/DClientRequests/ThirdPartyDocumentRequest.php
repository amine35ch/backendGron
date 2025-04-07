<?php

namespace App\Http\Requests\DClientRequests;

use Illuminate\Foundation\Http\FormRequest;

class ThirdPartyDocumentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'documents.*' => 'required|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
        ];
    }
}
