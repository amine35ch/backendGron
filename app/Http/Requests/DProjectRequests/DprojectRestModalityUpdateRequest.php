<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DprojectRestModalityUpdateRequest extends FormRequest
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
            'eco_loan_stopped_thirty_mars' => 'required|boolean',
            'renovation_advance_loan_seventeen_december' => 'required|boolean',
            'other_description_of_remainder_payable' => 'nullable|string',
        ];
    }
}
