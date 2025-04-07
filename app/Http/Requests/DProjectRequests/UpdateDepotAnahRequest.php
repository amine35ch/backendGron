<?php

namespace App\Http\Requests\DProjectRequests;

use App\Rules\CheckMandataire;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDepotAnahRequest extends FormRequest
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
        return[
            'depot'=>'required|in:1,2',
            'value'=>'required|in:0,1'
        ];
    }
}
