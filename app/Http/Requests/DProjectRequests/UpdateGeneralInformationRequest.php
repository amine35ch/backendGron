<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralInformationRequest extends FormRequest
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
            'performance_energy_before_work' => 'required|exists:p_project_energy_classes,type',
            'surface_housing_before_work' => 'required|numeric',
            'number_of_floors' => 'nullable|integer',
            'isolated_surface' => 'required|integer|in:0,1',
            'isolated_surface_value' => 'required_if:isolated_surface,1|nullable|numeric',
            'class_skip' => 'required|exists:p_class_skip_counts,type',
            'income_class' => 'required|integer|exists:p_project_income_classes,type',
        ];
    }
}
