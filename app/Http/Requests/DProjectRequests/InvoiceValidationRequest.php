<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceValidationRequest extends FormRequest
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
            'state' => 'required|integer|in:0,1,2',
            'd_project_invoice_header_id' => 'required|exists:d_project_invoice_headers,id',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
            // 'numeric' => 'Le champ doit être numérique.',

        ];
    }
}
