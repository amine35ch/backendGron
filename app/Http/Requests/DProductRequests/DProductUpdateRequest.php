<?php

namespace App\Http\Requests\DProductRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProductUpdateRequest extends FormRequest
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
            'reference' => 'required|string',
            'type_produit_isolant' => 'nullable|string',
            'norme' => 'nullable|string',
            'designation' => 'required|string',
            'reference_acerni' => 'nullable|string',
            'date_validite_acerni' => 'nullable|string',
            'doc_acerni' => 'nullable|file:mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'reference_certita' => 'nullable|string',
            'date_validite_certita' => 'nullable|string',
            'doc_certita' => 'nullable|file:mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'reference_avis_tech' => 'nullable|string',
            'date_validite_avis_tech' => 'nullable|string',
            'doc_avis_tech' => 'nullable|file:mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'fiche_tech' => 'required|file:mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'd_brand_id' => ['required', 'exists:d_brands,id'],
            'category' => ['required', 'exists:p_categories,category'],
            'sub_category' => ['required', 'exists:p_sub_categories,sub_category'],
            'scales' => 'nullable|array',
            'scales.*.value' => 'nullable|string',
            'scales.*.unit' => 'nullable|string',
            'scales.*.scale_reference' => ['nullable', 'exists:p_scales,reference'],
            'prix_achat_ht' => 'nullable|numeric',
            'prix_achat_ttc' => 'nullable|numeric',
            'prix_vente_ht' => 'nullable|numeric',
            'tva' => 'nullable|string|exists:p_t_v_a_s,code',
            'bars' => 'nullable|json',
        ];
    }
}
