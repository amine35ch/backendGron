<?php

namespace App\Http\Requests\DNotificationRequests;

use Illuminate\Foundation\Http\FormRequest;

class DNotificationUpdateRequest extends FormRequest
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
            'vue' => 'required|in:1',
        ];
    }
}
