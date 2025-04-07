<?php

namespace App\Http\Requests\DProjectOccupantsRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectOccupantsUpdateRequest extends FormRequest
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
            'occupants.*.total_number' => 'nullable|integer',
            'occupants.*.civility' => 'nullable|in:0,1',
            'occupants.*.first_name' => 'nullable|string',
            'occupants.*.last_name' => 'nullable|string',
            'occupants.*.number_children_to_born' => 'nullable|integer',
        ];
    }
}
