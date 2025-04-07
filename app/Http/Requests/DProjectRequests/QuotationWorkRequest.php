<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationWorkRequest extends FormRequest
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
            // invoice Header
            'invoice_date' => 'nullable|date|date_format:Y-m-d',
            'HT_total' => 'required|numeric',
            'TVA_total' => 'required|numeric',
            'TTC_total' => 'required|numeric',
            'TTC_rest' => 'required|numeric',
            'HT_rest' => 'required|numeric',
            'plafond_prime' => 'required|numeric',
            'scenario' => 'nullable|string',
            'prime_bonification' => 'required|numeric',
            'prime_renov' => 'required|numeric',
            'prime_renov_bonification' => 'required|numeric',
            'class_skip_number' => 'nullable|integer',
            'rac' => 'required|numeric',
            'installer' => 'required|exists:d_companies,id',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'parents' => 'required|array',
            'parents.*.designation' => 'nullable|string',
            'parents.*.description' => 'nullable|string',
            'parents.*.d_work_id' => 'nullable|exists:d_works,id|required_if:type,2',
            'parents.*.d_article_id' => 'nullable|exists:d_articles,id|required_if:type,3',
            'parents.*.d_service_id' => 'nullable|exists:d_articles,id|required_if:type,3',
            'parents.*.unit' => 'nullable|numeric',
            'parents.*.qty' => 'nullable|numeric',
            'parents.*.unit_price_HT' => 'nullable|numeric',
            'parents.*.tva' => 'nullable|numeric',
            'parents.*.amount_TTC' => 'required|numeric',
            'parents.*.amount_HT' => 'required|numeric',
            'parents.*.unit_price_TTC' => 'nullable|numeric',
            'parents.*.amount_TVA' => 'nullable|numeric',
            'parents.*.type' => 'nullable|exists:p_invoice_line_types,type',
            'parents.*.sub_contractor_entitled' => 'nullable|string',
            'parents.*.sub_contractor_siret' => 'nullable|string',
            'parents.*.article_ids' => 'nullable|array',
            'parents.*.product_ids' => 'nullable|array',
            'parents.*.description_v2' => 'nullable|array',
            'parents.*.d_sub_contractor_id' => 'nullable|exists:d_companies,id',

            // children
            'parents.*.children' => 'nullable|array',
            'parents.*.children.*.designation' => 'nullable|string',

            'parents.*.children.*.description' => 'nullable|string',
            'parents.*.children.*.d_work_id' => 'nullable|exists:d_works,id|required_if:type,0',
            'parents.*.children.*.d_article_id' => 'nullable|exists:d_articles,id|required_if:type,0|required_if:type,1',
            'parents.*.children.*.unit' => 'nullable|numeric',
            'parents.*.children.*.qty' => 'nullable|numeric',
            'parents.*.children.*.unit_price_HT' => 'nullable|numeric',
            'parents.*.children.*.tva' => 'nullable|numeric',
            'parents.*.children.*.amount_TTC' => 'nullable|numeric',
            'parents.*.children.*.amount_HT' => 'nullable|numeric',
            'parents.*.children.*.unit_price_TTC' => 'nullable|numeric',
            'parents.*.children.*.amount_TVA' => 'nullable|numeric',
            'parents.*.children.*.type' => 'nullable|exists:p_invoice_line_types,type',
        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
        ];
    }
}
