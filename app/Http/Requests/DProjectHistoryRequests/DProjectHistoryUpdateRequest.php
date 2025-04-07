<?php

namespace App\Http\Requests\DProjectHistoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectHistoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'action' => 'required|string',
            'description' => 'nullable|string',
            'd_project_id' => 'required|exists:d_projects,id',
            // 'd_user_id'     => 'required|exists:d_users,id',
        ];
    }
}
