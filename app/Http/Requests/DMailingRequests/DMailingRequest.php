<?php

namespace App\Http\Requests\DMailingRequests;

use Illuminate\Foundation\Http\FormRequest;

class DMailingRequest extends FormRequest
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
            'status' => 'nullable|exists:p_mailing_settings,type',
            'statusWeb' => 'nullable|exists:p_mailing_settings,type',
        ];
    }
}
