<?php

namespace App\Http\Requests\DClientRequests;

use App\Enums\DCompanyEnum\DCompanyProfile;
use Illuminate\Foundation\Http\FormRequest;

class DClientStoreRequest extends FormRequest
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
        // $user=auth()->user();
        // if ($user->profile == DCompanyProfile::INS->value) {
        //     $documents=[];
        // }else {
        //     $documents=   
        //     ['documents' => 'nullable|array',
        //     'documents.*.name' => 'required|string',
        //     'documents.*.p_document_id' => 'nullable|exists:p_documents,id',
        //     'documents.*.file' => 'required|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
        //     ];
        // }
       

        return [
            'position' => 'nullable|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'address' => 'nullable|string',
            'house_number' => 'required|string',
            'street' => 'required|string',
            'signature' => 'nullable|file|mimes:png,jpg',
            'email_contact' => 'required|email|unique:d_clients,email_contact',
            'email_anah' => 'nullable|email',
            'phone_number_1' => ['required', 'string', 'unique:d_clients,phone_number_1', 'min:8'],
            'phone_number_2' => ['nullable', 'string', 'unique:d_clients,phone_number_2', 'min:8'],
            'representative' => 'nullable|string',
            'representative_contact' => 'nullable|string',
            'type' => 'nullable|exists:p_type_clients,type',
            'rib' => 'nullable|string',
            'iban' => 'nullable|string',
            'documents.*.step' => 'nullable|exists:p_steps,id',
            'year_of_birth' => 'nullable|string',
            'number_unborn_children' => 'nullable|integer',
            'building' => 'nullable|string',
            'stairs' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable|string',
            'commune' => 'nullable|string',
            'climatic_zone' => 'nullable|string',
            'gender' => 'required|integer',
            'password_anah' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'documents.*.file.mimetypes' => "Le format du fichier fourni n'est pas pris en charge.",
        ];
    }
}
