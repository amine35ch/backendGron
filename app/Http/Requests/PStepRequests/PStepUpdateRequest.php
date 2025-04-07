<?php

namespace App\Http\Requests\PStepRequests;

use Illuminate\Foundation\Http\FormRequest;

class PStepUpdateRequest extends FormRequest
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
            'reference' => 'required|string',
            'display_name' => 'required|string',
            'p_process_id' => 'required|exists:p_processes,id',
            'type_step' => 'required|integer',
            'ordre' => 'required|integer',
            'next_step' => 'nullable|integer',
            'prev_step' => 'nullable|integer',
            'state_init' => 'required|integer',
            'state_fin' => 'nullable|integer',
        ];
    }
}
