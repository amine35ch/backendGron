<?php

namespace App\Http\Requests\SubscriptionRequests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureSubscriptionUpdate extends FormRequest
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
            'subscriber_feature_id'=>'required',
            'd_subscription_id' => 'required',
            'p_feature_id' => 'required',
            'quantity' => 'required|min:-1',
        ];
    }
}
