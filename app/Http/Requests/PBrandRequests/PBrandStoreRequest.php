<?php

namespace App\Http\Requests\PBrandRequests;

use Illuminate\Foundation\Http\FormRequest;

class PBrandStoreRequest extends FormRequest
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
            'reference' => ['required', 'string', 'unique:p_article_types,reference'],
            'description' => 'nullable|string',
        ];
    }
}
