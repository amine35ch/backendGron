<?php

namespace App\Http\Requests\DInvoiceReferenceRequests;

use Illuminate\Foundation\Http\FormRequest;

class DInvoiceReferenceUpdateRequest extends FormRequest
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
            'current' => 'array|required',
            'current.*.id' => 'required',
            'current.*.prefix' => 'nullable',
            'current.*.current_count' => 'nullable',
            'current.*.format' => 'nullable',
            'current.*.type' => 'required|exists:p_invoice_references,type',
        ];
    }
}
