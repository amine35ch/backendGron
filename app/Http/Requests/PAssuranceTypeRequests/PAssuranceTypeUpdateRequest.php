<?php

namespace App\Http\Requests\PAssuranceTypeRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PAssuranceTypeUpdateRequest extends FormRequest
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
        $typeAssurance = $this->route('type_assurance');

        return [
            'entitled' => 'required|string',
            'description' => 'nullable|string',
            'type' => [
                'required', 'integer',
                Rule::unique('p_assurance_types', 'type')->ignore($typeAssurance->id),
            ],
        ];
    }
}
