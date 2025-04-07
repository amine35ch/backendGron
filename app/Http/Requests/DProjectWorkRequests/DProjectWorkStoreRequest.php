<?php

namespace App\Http\Requests\DProjectWorkRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectWorkStoreRequest extends FormRequest
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
            'd_project_id' => 'required|exists:d_projects,id',
            'd_sub_contractor_id' => 'nullable|exists:users,id',
            'd_work_id' => 'required|exists:d_works,id',
            'installer' => 'required|exists:d_companies,id',
            'd_' => 'nullable|exists:d_companies,id',
            'qty' => 'nullable|integer|min:1',
            'is_validated' => 'nullable|integer|in:0,1',
            'cost_ht' => 'required|numeric',
            'unit' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ];
    }
}
