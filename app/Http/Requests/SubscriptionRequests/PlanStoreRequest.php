<?php

namespace App\Http\Requests\SubscriptionRequests;

use Illuminate\Foundation\Http\FormRequest;

class PlanStoreRequest extends FormRequest
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
            'p_plan_id' => 'required',
            'start_date' => 'required|date',
            'p_plan_payment_type_id' => 'required',
            'payment_method' => 'nullable',
            'd_company_id' => 'required|exists:d_companies,id',
        ];
    }
}
