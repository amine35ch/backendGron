<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationMarWorkInstallerRequest extends FormRequest
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
        // $isRequired = 'required';
        // if (!$this->required_cost) {

        //     $isRequired = 'nullable';
        // }
        return [

            'performance_energy_before_work' => 'nullable|exists:p_project_energy_classes,type',
            'surface_housing_before_work' => 'nullable|numeric',
            'scenario' => 'required|integer|exists:p_scenarios,id',
            'number_of_floors' => 'nullable|integer',
            'cost_ht_simulation' => 'nullable|numeric',
            'rest_ht_simulation' => 'nullable|numeric',
            'isolated_surface' => 'nullable|integer|in:0,1',
            'class_skip' => 'nullable|exists:p_class_skip_counts,type',
            'income_class' => 'nullable|integer|exists:p_project_income_classes,type',
            'works' => 'required|array',
            'works.*.cost_ht' => 'required|numeric|min:1',
            'works.*.d_work_id' => 'required|exists:d_works,id',
            'works.*.installer' => 'required|exists:users,id',
            'works.*.qty' => 'nullable|integer|min:1',
            'works.*.unit' => 'required|integer|exists:p_units,type',
        ];
    }
}
