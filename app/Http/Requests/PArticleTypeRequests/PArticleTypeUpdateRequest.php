<?php

namespace App\Http\Requests\PArticleTypeRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PArticleTypeUpdateRequest extends FormRequest
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
        $typeArticle = $this->route('type_article');

        return [
            'reference' => [
                'required', 'string',
                Rule::unique('p_article_types', 'reference')->ignore($typeArticle->id),
            ],
            'type' => [
                'required', 'integer',
                Rule::unique('p_article_types', 'type')->ignore($typeArticle->id),
            ],
            'description' => 'nullable|string',
        ];
    }
}
