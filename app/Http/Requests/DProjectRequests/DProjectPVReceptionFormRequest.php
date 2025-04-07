<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectPVReceptionFormRequest extends FormRequest
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
            'consistency_of_work_scenarios_checked' => 'required|in:0,1',
            'reception_is_pronounced' => 'required|in:0,1',
            'description_reception_is_pronounced' => 'nullable|string',
        ];
    }
}
