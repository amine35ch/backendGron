<?php

namespace App\Http\Requests\DArticlePriceRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DArticlePriceUpdateRequest extends FormRequest
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
        $attributes = $this;

        $articlePrice = $this->route('article_price');

        return [
            'unit_price' => 'required|numeric|min:1',

            'd_article_id' => [
                'required', 'exists:d_articles,id',
                Rule::unique('d_article_prices')->ignore($articlePrice->id)->where(function ($query) use ($attributes) {
                    return $query->where([
                        'd_article_id' => $attributes->d_article_id,
                    ])->where('d_company_id', $attributes->d_company_id);
                }),
            ],
            'd_company_id' => 'required|exists:d_companies,id',
        ];
    }
}
