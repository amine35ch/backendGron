<?php

namespace App\Http\Requests\DThirdPartyWorkRequests;

use Illuminate\Foundation\Http\FormRequest;

class DThirdPartyWorkStoreRequest extends FormRequest
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
            'reference' => 'required|string',
            'type' => 'required|integer|unique:d_third_party_works,type,NULL,id,d_third_party_id,'.$this->input('d_third_party_id'),
            'unit' => 'nullable|integer',
            'pricing_list' => 'nullable|json',
            'd_third_party_id' => 'nullable|exists:d_third_parties_table,id',
        ];

    }
}
