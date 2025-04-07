<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreByInstallerRequest extends FormRequest
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
        // $isRequired = 'required';
        // if (!$this->required_cost) {

        //     $isRequired = 'nullable';
        // }
        return [

            'works' => 'required|array',
            'works.*.cost_ht' => 'required|numeric|min:1',
            'works.*.d_work_id' => 'required|exists:d_works,id',
            'works.*.installer' => 'required|exists:users,id',
            'works.*.qty' => 'nullable|integer|min:1',
            'works.*.unit' => 'required|integer|exists:p_units,type',
            'file' => 'file|mimes:pdf|required',
            'name' => 'string|required',
        ];
    }
}
