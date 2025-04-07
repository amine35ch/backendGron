<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectWorkArticleRequest extends FormRequest
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
            'articles' => 'required|array',
            'articles.*.d_project_work_id' => 'required|exists:d_project_works,id',
            'articles.*. ' => 'required|exists:d_third_party_articles,id',
        ];
    }
}
