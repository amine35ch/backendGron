<?php

namespace App\Http\Requests\DThirdPartyArticleRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DThirdPartyArticleUpdateRequest extends FormRequest
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
            'reference' => [
                'required',
                'string',
                Rule::unique('d_third_party_articles')->ignore($this->route('DThirdPartyArticle')->id)->where(function ($query) {
                    return $query->where('d_third_party_id', $this->input('d_third_party_id'));
                }),
            ],
            'designation' => 'required|string',
            // 'selling_price' => 'required|numeric',
            'unit' => 'nullable|integer',
            'type' => 'nullable|integer',
            'path' => 'nullable|string',
            'd_third_party_brand_id' => 'nullable|exists:d_third_party_brands,id',
            'd_third_party_work_id' => 'nullable|exists:d_third_party_works,id',
            'd_third_party_id' => 'nullable|exists:d_third_parties,id',
        ];
    }
}
