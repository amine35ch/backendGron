<?php

namespace App\Http\Requests\DProjectReclamationRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectReclamationUpdateRequest extends FormRequest
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
            'description' => 'required|string',
            'd_project_id' => 'required|exists:d_projects,id',
            'date' => 'required|date',
            'works' => 'array|required',
            'works.*.description' => 'required|string',
            'works.*.d_project_work_id' => 'required|exists:d_project_works,id',
        ];
    }
}
