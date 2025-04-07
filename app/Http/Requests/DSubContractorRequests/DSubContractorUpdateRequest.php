<?php

namespace App\Http\Requests\DSubContractorRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DSubContractorUpdateRequest extends FormRequest
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
        $subContractor = $this->route('sub_contractor');

        return [
            'trade_name' => 'required|string',
            'phone_number_1' => [
                'required', 'string',
                Rule::unique('d_sub_contractors', 'phone_number_1')->ignore($subContractor),
                Rule::unique('d_sub_contractors', 'phone_number_2')->ignore($subContractor),
            ],
            'email' => 'nullable|email',
            'd_third_party_id' => 'required|exists:d_third_parties,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'represented_gender' => 'nullable|integer',
            'type_raison_sociale' => 'nullable|exists:p_raison_types,type',
            'represented_name' => 'nullable|string',
            'position' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'city' => 'nullable|string',
            'phone_number_2' => [
                'nullable', 'string',
                Rule::unique('d_sub_contractors', 'phone_number_1')->ignore($subContractor),
                Rule::unique('d_sub_contractors', 'phone_number_2')->ignore($subContractor),
            ],
            'web_site' => 'nullable|string',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'works' => 'nullable|array',
            'works.*' => 'nullable|exists:d_third_party_works,id',
        ];
    }
}
