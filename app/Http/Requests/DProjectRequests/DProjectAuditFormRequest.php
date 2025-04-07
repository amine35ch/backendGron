<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectAuditFormRequest extends FormRequest
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
            'surface_housing_before_work' => 'required|numeric',
            'gain_energy' => 'required|numeric',
            'total_cost_energy_audit' => 'required|numeric',
            'dpe_before' => 'required|string',
            'dpe_after' => 'required|string',
            'date_audit' => 'required|date',
            'audit_identifier' => 'required|string',
            'primary_energy_before_work' => 'required|numeric',
            'primary_energy_after_work' => 'required|numeric',
            'gaz_emission_before_work' => 'required|numeric',
            'gaz_emission_after_work' => 'required|numeric',
        ];
    }
}
