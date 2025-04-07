<?php

namespace App\Http\Requests\DProjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class DProjectUpdateStatusRequest extends FormRequest
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
            'status' => 'required|in:0,1,2,3,4',
        ];
    }

    public function messages()
    {
        return [
            'documents.*.file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
            'logement_date_creation.date_format' => 'Le champ doit être une année valide',
            'occupants.*.year_of_birth.date_format' => 'Le champ doit être une année valide',
            'number_of_floors.max' => 'Vous devez définir une valeur inférieure.',
            'number_of_residents_under_your_roof.max' => 'Vous devez définir une valeur inférieure.',
            'number_of_children.max' => 'Vous devez définir une valeur inférieure.',
            'number_of_dependent_children.max' => 'Vous devez définir une valeur inférieure.',
        ];
    }
}
