<?php

namespace App\Http\Requests\PWorkRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PWorkUpdateRequest extends FormRequest
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
            'd_company_id' => 'nullable|exists:mars,id',
            'unit' => 'nullable|exists:p_units,type',
            'pricing_list' => 'nullable|array',
            'display_name' => 'nullable|string',
            'reference' => [
                'nullable', 'string',
                Rule::unique('p_works', 'reference')->ignore($work->id),
            ],
            'type' => [
                'nullable', 'integer',
                Rule::unique('p_works', 'type')->ignore($work->id),
            ],
        ];
    }
}
