<?php

namespace App\Http\Requests\DWorkRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DWorkStoreRequest extends FormRequest
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
            'reference' => [
                'required',
                'string',
                Rule::unique('d_works')->where(function ($query) {
                    return $query->where([
                        'd_company_id' => getCompanyOfConnectedUser()->id,
                    ]);
                }),
            ],
            'description' => 'nullable|string',
            'display_name' => 'nullable|string',
            'unit' => 'nullable|integer',
            'pricing_list' => 'nullable|array',
            'pricing_list.*.price_unit_ht' => 'required|numeric',
            'pricing_list.*.condition' => ['required', 'string', 'regex:/^(?:<|>|<=|>=|==)\d+$/'],
            'access' => 'nullable|integer',
            'p_qualification_id'=>'required|integer|exists:p_qualifications,id'
        ];
    }

    public function messages()
    {
        return [
            'pricing_list.*.condition.required' => 'Le champ condition est obligatoire.',
            'pricing_list.*.price_unit_ht.required' => 'Le champ prix unitaire HT est obligatoire.',
            'pricing_list.*.condition.regex' => 'Le champ condition doit contenir une opération suivie d\'un espace puis le montant..',
        ];
    }
}
