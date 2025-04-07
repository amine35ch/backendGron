<?php

namespace App\Http\Requests\DProjectVisitRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Rules\CheckCompanyProfile;
use Illuminate\Foundation\Http\FormRequest;

class DProjectVisitStoreRequest extends FormRequest
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
        $user = auth()->user();
        $data = [];
        if ($user->profile == DCompanyProfile::MAR->value) {
            $data = [
                'visits.*.visit_date' => 'required|date',
            ];
        } else {
            $data = [
                'visits.*.visit_date' => 'required|date|after_or_equal:now',
            ];
        }

        return [
            'visits' => 'required|array',
            'visits.*.end_visit_date' => 'nullable|date|after_or_equal:visits.*.visit_date',
            'visits.*.name' => 'required|string',
            'visits.*.enable' => 'nullable|boolean',
            'visits.*.type' => 'required|exists:p_type_visits,type',
            'visits.*.user_id' => 'nullable|exists:users,id',
            'visits.*.d_company_id' => [
                'required', 'exists:d_companies,id',
                new CheckCompanyProfile([
                    DCompanyProfile::MAR->value,
                    DCompanyProfile::AUD->value,
                    DCompanyProfile::INS->value,

                ]),
            ],
            'd_project_id' => 'required|exists:d_projects,id',

        ] + $data;
    }

    public function messages()
    {
        return [
            // 'required' => 'Le champ est obligatoire.',
            'after_or_equal' => ':attribute doit être une date postérieure ou égale au aujourd\'hui',
        ];
    }
}
