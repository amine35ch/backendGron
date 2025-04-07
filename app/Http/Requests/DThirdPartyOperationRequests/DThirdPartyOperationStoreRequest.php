<?php

namespace App\Http\Requests\DThirdPartyOperationRequests;

use Illuminate\Foundation\Http\FormRequest;

class DThirdPartyOperationStoreRequest extends FormRequest
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
            'd_third_party_id' => 'required|exists:d_third_parties,id',
            'p_operation_id' => 'required|exists:p_operations,id',
            'certified' => 'required|in:0,1',
        ];
    }
}
