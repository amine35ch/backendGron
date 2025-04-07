<?php

namespace App\Http\Requests\DProjectEventRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectEventUpdateRequest extends FormRequest
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
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'type' => 'required|exists:p_type_events,type',
            'd_project_visit_id' => 'nullable|exists:d_project_visits,id',
            'order_step' => 'nullable|exists:p_steps,id',
            'user_id' => 'nullable|exists:users,id',
            'd_company_id' => 'nullable|exists:d_companies,id',
            'd_project_id' => 'required|exists:d_projects,id',
        ];
    }

    public function messages()
    {
        return [
            'start_date.date_format' => 'Veuillez vérifier la date',
            // Custom error messages for other rules...
        ];
    }
}
