<?php

namespace App\Http\Requests\DProjectInvoiceHeaderRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectInvoiceHeaderRelationRequest extends FormRequest
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

        $this->merge([
            'with' => array_filter(explode(',', $this->query('with')), function ($value) {
                return $value !== '';
            }),
        ]);
        
        return [
            'with'=>'nullable|array',
            'with.*'=>'required|string|in:comments,company,project,creatorDevis,lines,typeDetails'
        ];
    }
}
