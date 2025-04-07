<?php

namespace App\Http\Requests\DThirdPartyScenarioRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DThirdPartyScenarioUpdateRequest extends FormRequest
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
                Rule::unique('d_third_party_scenarios')->ignore($this->route('DThirdPartyScenarios')->id)->where(function ($query) {
                    return $query->where('d_third_party_id', $this->input('d_third_party_id'));
                }),
            ],
            'entitled' => 'required|string',
            'description' => 'nullable|string',
            'd_third_party_id' => 'nullable|exists:d_third_parties_table,id',
        ];
    }
}
