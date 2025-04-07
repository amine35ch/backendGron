<?php

namespace App\Http\Requests\PTypeCollaboratorRequests;

use Illuminate\Foundation\Http\FormRequest;

class PTypeCollaboratorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'entitled' => 'required|string',
            'description' => 'nullable|string',
        ];
    }
}
