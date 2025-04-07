<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class CerfaRequest extends FormRequest
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
            'number_of_dependent_children' => 'nullable|integer|min:0|max:255',
            'work_load_for_low_income_owners' => 'nullable|boolean',
            'free_hosting_for_low_income_household' => 'nullable|boolean',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'batiment' => 'nullable|string',
            'stairs' => 'nullable|string',
            'house_number' => 'nullable|string',
            'street' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable',
            'zip_code' => 'nullable|string',
            'common' => 'nullable|string',
            'logement_date_creation' => 'nullable|integer',
            'work_commun_parts' => 'nullable|boolean',
            'more_than_fifteen' => 'nullable|boolean',
            'ptz_beneficiary' => 'nullable|boolean',
            'auto_rehabilitation' => 'nullable|boolean',
            'energy_consumption_before' => 'nullable|numeric',
            'energy_consumption_after' => 'nullable|numeric',
            'work_type' => 'nullable|integer|exists:p_work_types,type',
            'total_number_occupants' => 'nullable|integer|max:126',
            'sum_revenue_reference_1' => 'nullable|numeric',
            'year_of_sum_revenue_reference_1' => 'nullable|integer',
            'work_description' => 'nullable|string',
            'sum_revenue_reference_2' => 'nullable|numeric',
            'year_of_sum_revenue_reference_2' => 'nullable|integer',
            'performance_energy_before_work' => 'nullable|exists:p_project_energy_classes,type',
            'surface_housing_before_work' => 'nullable|numeric',
            'number_of_floors' => 'nullable|integer',
            'cost_ht_simulation' => 'nullable|numeric',
            'rest_ht_simulation' => 'nullable|numeric',
            'project_nature' => 'nullable|integer|exists:p_project_natures,type',
            'isolated_surface' => 'nullable|integer|in:0,1',
            'nature_residence' => 'nullable|integer|exists:p_nature_residences,type',
            'number_of_children' => 'nullable|integer',
            'isolated_surface_value' => 'required_if:isolated_surface,1|numeric',
            'class_skip' => 'nullable|exists:p_class_skip_counts,type',
            'income_class' => 'nullable|integer|exists:p_project_income_classes,type',
            'occupants' => 'nullable|array',
            'occupants.*.civility' => 'required|integer',
            'occupants.*.first_name' => 'required|string',
            'occupants.*.last_name' => 'required|string',
            'occupants.*.year_of_birth' => 'required|date_format:Y',
        ];
    }

    public function messages()
    {
        return [
            // 'nullable' => 'Le champ est obligatoire.',
        ];
    }
}
