<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DprojectDerogationCriteriaRequest extends FormRequest
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
            'derogation_request_criteria' => 'nullable|array',
            'derogation_request_criteria.*.paroi' => 'required|string',
            'derogation_request_criteria.*.motif' => 'required|string',

            'primary_energy_before_work' => 'required|numeric',
            'date_audit' => 'required|date',
            'audit_identifier' => 'required|string',
            'final_energy_before_work' => 'required|numeric',
            'gaz_emission_before_work' => 'required|numeric',
            'performance_energy_before_work' => 'required|integer|exists:p_project_energy_classes,type',
            'surface_housing_before_work' => 'required|numeric',
            'scenario'=>'required|string',
            'primary_energy_after_work' => 'required|numeric',
            'final_energy_after_work' => 'required|numeric',
            'gaz_emission_after_work' => 'required|numeric',
            'performance_energy_after_work' => 'required|integer|exists:p_project_energy_classes,type',
            'surface_housing_after_work' =>  'required|numeric',
        ];
    }
}
