<?php

namespace App\Http\Requests\DProjectVisitRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectVisitUpdateRequest extends FormRequest
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
            'visit_date' => 'nullable|date',
            'end_visit_date' => 'nullable|date',
            'name' => 'nullable|string',
            'type' => 'nullable|exists:p_type_visits,type',
            'user_id' => 'nullable|exists:users,id',
            'd_company_id' => 'nullable|exists:d_companies,id',
            'state' => 'nullable|in:1,2',
        ];
    }
}
