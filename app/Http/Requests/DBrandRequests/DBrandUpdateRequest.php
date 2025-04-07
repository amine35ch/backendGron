<?php

namespace App\Http\Requests\DBrandRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DBrandUpdateRequest extends FormRequest
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
        $brand = $this->route('brand');

        return [
            'entitled' => 'required|string',

            'description' => 'nullable|string',
            // 'access' => 'nullable|integer|min:-1|max:10',
        ];
    }
}
