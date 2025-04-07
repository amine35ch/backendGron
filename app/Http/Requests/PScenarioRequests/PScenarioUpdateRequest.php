<?php

namespace App\Http\Requests\PScenarioRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PScenarioUpdateRequest extends FormRequest
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
        $scenario = $this->route('scenario');

        return [
            'entitled' => 'required|string',
            'description' => 'nullable|string',
            'reference' => [
                'required', 'string',
                Rule::unique('p_scenarios', 'reference')->ignore($scenario->id),
            ],
            'works.*' => 'required|exists:p_works,id',
        ];
    }
}
