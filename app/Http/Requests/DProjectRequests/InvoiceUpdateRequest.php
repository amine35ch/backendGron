<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
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
            'type' => 'required|exists:p_type_invoices,type', //0 => devis mar 1=> devis installer
            'invoice_date' => 'nullable|date|date_format:Y-m-d',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            //installer
            'plafond_prime' => 'nullable|numeric',
            'prime_bonification' => 'nullable|numeric',
            'prime_renov' => 'nullable|numeric',
            'prime_renov_bonification' => 'nullable|numeric',
            'rac' => 'nullable|numeric',
            //-----------------
            'HT_total' => 'required|numeric',
            'TVA_total' => 'required|numeric',
            'TTC_total' => 'required|numeric',
            'TTC_anah' => 'nullable|numeric',
            'TVA_anah' => 'nullable|numeric',
            'HT_anah' => 'nullable|numeric',
            'TTC_rest' => 'nullable|numeric',
            'TVA_rest' => 'nullable|numeric',
            'HT_rest' => 'nullable|numeric',
            'lines' => 'required|array',
            'lines.*.unit' => 'nullable|exists:p_units,type',
            'lines.*.qty' => 'nullable|numeric|min:1',
            'lines.*.unit_price_HT' => 'required|numeric',
            'lines.*.parent_id' => 'nullable',
            'lines.*.type' => 'required|in:0,1,2,3', // 0 => article, 1 => work
            'lines.*.d_work_id' => [
                'nullable',
                'required_if:lines.*.type,0',
                'exists:d_works,id',
            ],
            'lines.*.d_article_id' => [
                'nullable',
                'required_if:lines.*.type,0',
                'required_if:lines.*.type,1',
                'exists:d_articles,id',
            ],
            'lines.*.remise' => 'nullable|numeric',
            'lines.*.unit_price_HTNet' => 'nullable|numeric',
            'lines.*.tva' => 'nullable|numeric',
            'lines.*.amount_HT' => 'required|numeric',
            'lines.*.amount_HTNet' => 'nullable|numeric',
            'lines.*.amount_TVA' => 'required|numeric',
            'lines.*.amount_TTC' => 'required|numeric',
            'lines.*.designation' => 'required|string',
            'lines.*.description' => 'nullable|string',

        ];
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
            // 'numeric' => 'Le champ doit être numérique.',
            'invoice_date.date_format' => 'Le champ date facture ne correspond pas au format Y-m-d.',
        ];
    }
}
