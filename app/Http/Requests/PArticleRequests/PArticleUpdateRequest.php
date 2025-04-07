<?php

namespace App\Http\Requests\PArticleRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PArticleUpdateRequest extends FormRequest
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
        $artcile = $this->route('article');

        return [
            'reference' => [
                'required', 'string',
                Rule::unique('p_articles', 'reference')->ignore($artcile->id),
            ],
            'designation' => 'required|string',
            'selling_price' => 'nullable|numeric',
            'p_brand_id' => 'nullable|exists:p_brands,id',
            'p_work_id' => 'nullable|exists:p_works,id',
            'unit' => 'nullable|exists:p_units,type',
            'type' => 'nullable|exists:p_article_types,type',
            'file' => 'mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'qte' => 'nullable|numeric',
            'unit_price_HT' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'unit_price_HTNet' => 'nullable|numeric',
            'tva' => 'nullable|numeric',
            'unit_price_TTC' => 'nullable|numeric',
            'amount_HT' => 'nullable|numeric',
            'amount_HTNet' => 'nullable|numeric',
            'amount_TVA' => 'nullable|numeric',
            'amount_TTC' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
        ];
    }
}
