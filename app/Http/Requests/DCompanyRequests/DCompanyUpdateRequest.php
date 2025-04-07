<?php

namespace App\Http\Requests\DCompanyRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Rules\CheckCompanyTradeName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DCompanyUpdateRequest extends FormRequest
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
        $company = ($this->route('company')) ? $this->route('company') : getCompanyOfConnectedUser();

        $regeWorks = 'nullable';
        if ($this->profile == DCompanyProfile::INS->value) {
            $uniqueNAme = new CheckCompanyTradeName($this->trade_name, $this->profile, $company->id);
            $phoneNumberOne = 'nullable';
            $address = 'required';
            $email = 'nullable';
            $city = 'required';
            $zipCode = 'required';
            $representative = 'nullable';
            $identifierTva = 'nullable';
            // $regeWorks = 'required';
        } elseif ($this->profile == DCompanyProfile::MAN->value) {
            $uniqueNAme = new CheckCompanyTradeName($this->trade_name, $this->profile, $company->id);
            $phoneNumberOne = 'nullable';
            $address = 'nullable';
            $email = 'required';
            $city = 'nullable';
            $zipCode = 'nullable';
            $representative = 'nullable';
            $identifierTva = 'nullable';
        } elseif ($this->profile == DCompanyProfile::STT->value) {
            $uniqueNAme = '';
            $phoneNumberOne = 'nullable';
            $address = 'required';
            $email = 'nullable';
            $regeWorks = 'nullable';
            $city = 'required';
            $zipCode = 'required';
            $representative = 'nullable';
            $identifierTva = 'nullable';
        } else {
            $uniqueNAme = new CheckCompanyTradeName($this->trade_name, $this->profile, $company->id);
            $phoneNumberOne = 'nullable';
            $address = 'required';
            $email = 'nullable';
            $regeWorks = 'nullable';
            $city = 'required';
            $zipCode = 'required';
            $representative = 'nullable';
            $identifierTva = 'nullable';
        }
        $rules = [
            'trade_name' => ['required', 'string', $uniqueNAme],

            'signature' => 'nullable|file|mimes:png,jpg',
            'phone_number_1' => [
                $phoneNumberOne,
                'string',
                'min:8',
            ],
            'phone_number_2' => [
                'nullable',
                'string',
                'min:8',
            ],
            'company_rcs' => 'nullable|string',
            // 'date_expiration_rge' => 'nullable|date|after:today',
            'address' => $address . '|string',
            'city' => $city . '|string',
            'zip_code' => $zipCode . '|string',
            // 'num_rge' => 'nullable|string',
            'siren' => 'nullable|string',
            'email_two' => [
                'nullable',
                'email',
                // Rule::unique('d_companies')->ignore($company->id),
            ],
            'email' => [
                $email,
                'email',
                // Rule::unique('d_companies')->ignore($company->id),
                // Rule::unique('users')->ignore($company->id, 'userable_id'),
            ],
            'id' => 'required|exists:d_companies,id',
            'siret' => 'required|string',
            'profile' => 'required|exists:p_profiles,reference',
            'approval_number' => 'nullable|string',
            'capital' => 'nullable|numeric',
            'insurance_rcs' => 'nullable|string',
            'insurance_address' => 'nullable|string',
            'insurance_capital' => 'nullable|numeric',
            'insurance_police' => 'nullable|string',
            'insurance_name' => 'nullable|string',
            'insurance_date' => 'nullable|string',
            // 'insurance_siret' => 'nullable|string',
            'position' => 'nullable|string',
            'representative_gender' => 'nullable|in:0,1,2',
            'representative_first_name' => $representative . '|string',
            'representative_last_name' => $representative . '|string',
            'type_raison_sociale' => 'nullable|integer|exists:p_raison_types,type',
            'website' => 'nullable|string',
            'documents.*.name' => 'required|string',
            'documents.*.file' => 'required|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'documents.*.p_document_id' => 'nullable|exists:p_documents,id',
            'documents.*.step' => 'nullable|exists:p_steps,id',
            'operations.*' => 'nullable|exists:p_operations,id',
            'invoice_reference' => 'nullable|array',
            'identifiant_tva' => $identifierTva . '|string',
            'invoice_reference.*.id' => 'nullable|integer',
            'invoice_reference.*.prefix' => 'nullable|string',
            'invoice_reference.*.current_count' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'tva' => 'nullable|numeric',
            // 'docu_sign_token' => 'nullable|string',
            'rges' => $regeWorks . '|array',
            'rges.*.rge' => $regeWorks . '|string',
            'rges.*.qualifications' => $regeWorks . '|array',
            'rges.*.start_date' => $regeWorks . '|date',
            'rges.*.end_date' => [
                $regeWorks,
                'date',
                function ($attribute, $value, $fail) {
                    $fromAttribute = str_replace('end_date', 'start_date', $attribute);
                    $fromValue = $this->input($fromAttribute);
                    if ($fromValue >= $value) {
                        $fail('La date de fin doit être postérieure à la date de début.');
                    }
                },
            ],
            'rges.*.id' => 'nullable|numeric',
            'num_decennale' => 'nullable|string',
            'num_ape' => 'nullable|string',
            'emissions_date_assurance' => 'nullable|date',
            'end_date_assurance' => 'nullable|date|after:emissions_date_assurance',
            'fiche_navette_interne' => 'nullable|boolean',
            'quotation_interne' => 'nullable|boolean',
            'signature_interne' => 'nullable|boolean',
            'max_projects_per_month' => 'nullable|integer|min:1',
            'selfCheckIn' => 'nullable|integer|in:0,1',

        ];

        // $rges = $this->get('rges', []);
        // if ($rges) {
        //     foreach ($rges as $index => $rge) {

        //         if ($this->filled("rges.$index.rge")) {
        //             if ($this->profile == DCompanyProfile::MAR->value) {
        //                 $rules["rges.$index.qualifications"] = 'nullable|array';
        //                 $rules["rges.$index.rge"] = 'required|string';
        //                 $rules["rges.$index.start_date"] = 'required|date';
        //                 $rules["rges.$index.end_date"] = ['required', 'date', 'after:rges.'.$index.'.start_date'];
        //             }
        //             else {
        //                 $rules["rges.$index.qualifications"] = $regeWorks.'|array';
        //                 $rules["rges.$index.rge"] = 'required|string';
        //                 $rules["rges.$index.start_date"] = 'required|date';
        //                 $rules["rges.$index.end_date"] = ['required', 'date', 'after:rges.'.$index.'.start_date'];
        //             }

        //         }
        //     }
        // }

        return $rules;
    }

    public function messages()
    {
        return [
            'documents.*.file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
            'documents.*.name.required' => 'Le nom du document est obligatoire.',
            'representative_gender' => 'Vérifiez le sexe de la représentante.',
            'rges.*.qualifications.required' => 'Le champ qualification est obligatoire.',
            'rges.*.start_date.required' => 'Le champ Edité le est obligatoire.',
            'rges.*.end_date.required' => 'Le champ VALABLE JUSQU\'AU est obligatoire.',
            'rges.*.end_date.after' => 'La date VALABLE JUSQU\'AU doit être postérieure à la date d\'edité le.',
            'end_date_assurance.after' => 'Le champ date de fin doit être une date postérieure à la date Date d\'émission.'
        ];
    }
}