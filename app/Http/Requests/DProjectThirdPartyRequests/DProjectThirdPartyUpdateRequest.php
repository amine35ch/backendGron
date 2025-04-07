<?php

namespace App\Http\Requests\DProjectThirdPartyRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectThirdPartyUpdateRequest extends FormRequest
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
            'operation' => 'required|string',
            'certif_required' => 'required|integer',
            // 'd_project_id'     => 'required|exists:d_projects,id',
            // 'd_third_party_id' => 'required|exists:d_third_parties,id',
        ];
    }
}
