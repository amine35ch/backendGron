<?php

namespace App\Http\Requests\DProjectDocumentRequests;

use Illuminate\Foundation\Http\FormRequest;

class DigiSignCallBackRequest extends FormRequest
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
            'event_time' => 'required|integer',
            'event_type' => 'required|string|in:SIGNATURE_REQUEST_COMPLETED',
            'signature_request' => 'required|array',
            'signature_request.signature_request_id' => 'required|string',
            'signature_request.send_emails' => 'required|boolean',
            'signature_request.embedded' => 'required|boolean',
            'signature_request.use_text_tags' => 'required|boolean',
            'signature_request.hide_text_tags' => 'required|boolean',
            'signature_request.is_completed' => 'required|boolean',
            'signature_request.documents' => 'required|array',
            'signature_request.documents.*.signers' => 'required|array|min:1',
            'signature_request.documents.*.signers.*.email' => 'required|email',
            'signature_request.documents.*.signers.*.is_signature_completed' => 'required|boolean',
            'signature_request.documents.*.document_id' => 'required|string'
        ];
    }
}
