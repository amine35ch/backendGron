<?php

namespace App\Http\Requests\DCompanyRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Models\PProfile;
use App\Rules\CheckCompanyEmail;
use App\Rules\CheckCompanyTradeName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrentMarUpdateRequest extends FormRequest
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
            'mar_id'=>'required|integer|exists:d_companies,id'
       ];
    }

}
