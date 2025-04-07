<?php

namespace App\Http\Requests\DCompanyRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Models\PProfile;
use App\Rules\CheckCompanyEmail;
use App\Rules\CheckCompanyTradeName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DCompanyImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if ($this->profile == DCompanyProfile::MAR->value && !auth()->user()->profile == DCompanyProfile::SUB->value) {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $companyType = $this->segment(3);
        $reference = PProfile::where(
            'identifier',
            $companyType
        )->first()?->reference;
        return [
            'profile'=>'required|in:'.$reference,
            'company_code'=>'required|string'
        ];
    }

}
