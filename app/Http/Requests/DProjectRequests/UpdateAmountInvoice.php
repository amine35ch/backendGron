<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAmountInvoice extends FormRequest
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
            'payed_amount' => 'required|numeric',
            'is_billed' => 'required|numeric|in:0,1',
            'd_project_header_invoice_id' => 'required|exists:d_project_invoice_headers,id',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
        ];
    }
}
