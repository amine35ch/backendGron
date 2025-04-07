<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DateWorkUpdateRequest extends FormRequest
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
            'work_planned_start' => 'required|date|before:work_planned_end|after_or_equal:today',
            'work_planned_end' => 'required|date|after:work_planned_start',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
            'after_or_equal' => ':attribute doit être une date postérieure ou égale au aujourd\'hui',
        ];
    }
}
