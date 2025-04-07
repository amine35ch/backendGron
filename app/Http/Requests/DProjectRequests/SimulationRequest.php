<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class SimulationRequest extends FormRequest
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
        $installerIsRequired = 'nullable';
        if ($this->has_installer) {
            $installerIsRequired = 'required';
        }
        $auditorIsRequired = 'nullable';
        if ($this->has_auditor) {
            $auditorIsRequired = 'required';
        }
        return [
            'performance_energy_before_work' => 'required|exists:p_project_energy_classes,type',
            'surface_housing_before_work' => 'required|numeric',
            'scenario' => 'required|string',
            'number_of_floors' => 'nullable|integer',
            'cost_ht_simulation' => 'required|numeric',
            'cost_ttc_simulation' => 'required|numeric',
            'rest_ht_simulation' => 'required|numeric',

            'rest_ttc_simulation' => 'required|numeric',
            'isolated_surface' => 'nullable|integer|in:0,1',
            'isolated_surface_value' => 'nullable|numeric',
            'class_skip' => 'required|exists:p_class_skip_counts,type',
            'income_class' => 'required|integer|exists:p_project_income_classes,type',
            'installer' => $installerIsRequired . '|exists:d_companies,id',
            'auditor' => $auditorIsRequired . '|exists:d_companies,id',
            'works' => 'required|array',
            'works.*.cost_ht_simulation' => 'required|numeric|min:1',
            'works.*.entitled' => 'required|string',
            'works.*.price_unit_ht_simulation' => 'required|numeric|min:1',
            'works.*.d_work_id' => [
                'exists:d_works,id',
                'required_without:works.*.d_service_id',
            ],
            'works.*.d_service_id' => [
                'exists:d_articles,id',
                'required_without:works.*.d_work_id',
            ],
            'works.*.is_validated' => 'nullable|in:0,1',
            'works.*.qty_simulation' => 'required|numeric|min:1',
            'works.*.unit' => 'required|integer|exists:p_units,type',
            'works.*.tva' => 'required|numeric',
            'works.*.cost_ttc_simulation' => 'required|numeric',
            'has_installer' => 'required|in:0,1',
            'has_auditor' => 'nullable|in:0,1',
            'has_offer' => 'nullable|in:1',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
        ];
    }
}
