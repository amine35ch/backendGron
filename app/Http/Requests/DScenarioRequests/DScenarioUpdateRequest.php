<?php

namespace App\Http\Requests\DScenarioRequests;

use Illuminate\Foundation\Http\FormRequest;

class DScenarioUpdateRequest extends FormRequest
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
            'entitled' => 'required|string',
            'description' => 'nullable|string',
            'access' => 'nullable|integer',
            'works.*' => 'required|exists:d_works,id',
        ];
    }
}
