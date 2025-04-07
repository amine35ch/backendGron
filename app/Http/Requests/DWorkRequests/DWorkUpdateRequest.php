<?php

namespace App\Http\Requests\DWorkRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DWorkUpdateRequest extends FormRequest
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
        $work = $this->route('work');

        return [
            // 'reference' => [
            //     'required',
            //     'string',
            //     Rule::unique('d_works')->ignore($work->id)->where(function ($query) {
            //         return $query->where([
            //             'd_company_id' => getCompanyOfConnectedUser(),
            //         ]);
            //     })
            // ],

            // 'description' => 'nullable|string',
            // 'unit' => 'nullable|integer',
            'display_name' => 'required|string',
            'pricing_list' => 'required|array',
            'pricing_list.*.price_unit_ht' => 'required|numeric',
            'pricing_list.*.condition' => ['required', 'string', 'regex:/^(?:<|>|<=|>=|==)\d+$/'],
            'p_qualification_id'=>'required|integer|exists:p_qualifications,id'
            // 'access' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'pricing_list.*.condition.required' => 'Le champ condition est obligatoire.',
            'pricing_list.*.price_unit_ht.required' => 'Le champ prix unitaire HT est obligatoire.',
            'pricing_list.*.condition.regex' => 'Le format du champ condition est invalide. Les formats acceptés sont <, >, <=, >=, ou == suivi de chiffre.',
        ];
    }
}
