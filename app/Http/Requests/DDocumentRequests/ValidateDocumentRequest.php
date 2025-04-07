<?php

namespace App\Http\Requests\DDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateDocumentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'validate' => 'integer|in:1,-1',
        ];
    }
}
