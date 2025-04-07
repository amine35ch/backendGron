<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationWorkRequest extends FormRequest
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
        // $isRequired = 'required';
        // if (!$this->required_cost) {

        //     $isRequired = 'nullable';
        // }
        return [

            'works' => 'required|array',
            'works.*.cost_ht' => 'required|numeric|min:1',
            'works.*.d_third_party_article_id' => 'required|exists:d_third_party_articles,id',
            'works.*.d_third_party_id' => 'required|exists:d_third_parties,id',
            'works.*.d_third_party_work_id' => 'required|exists:d_third_party_works,id',
            'works.*.qty' => 'required|integer|min:1',
            'works.*.unit' => 'required|exists:p_units,type',
        ];
    }
}
