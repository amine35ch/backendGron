<?php

namespace App\Http\Requests\DArticleRequests;

use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\RoleEnum\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class DArticleUpdateRequest extends FormRequest
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
        $required = 'nullable';
        $user = auth()->user();
        if ($this->type == DArticleType::PRODUCT->value && $user->profile == DCompanyProfile::INS->value) {
            $required = 'required';
        }
        return [
            'designation' => 'required|string',
            'description' => 'nullable|string',
            'unit' => 'nullable|exists:p_units,type',
            'unit_price' => 'required|numeric',
            'type' => 'nullable|integer',
            'd_brand_id' => 'nullable|exists:d_brands,id',
            'work_id' => 'nullable|array',
            'work_id.*' => 'required_with:work_id|exists:d_works,id',
            'file' => $required.'|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'doc_name' => $required.'|string',
        ];
    }

    public function messages()
    {
        return [
            'file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
        ];
    }
}
