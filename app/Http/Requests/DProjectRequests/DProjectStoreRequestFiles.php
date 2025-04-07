<?php

namespace App\Http\Requests\DProjectRequests;

use App\Rules\CheckMandataire;
use Illuminate\Foundation\Http\FormRequest;

class DProjectStoreRequestFiles extends FormRequest
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

            'token' => 'nullable|string',
            'id' => 'required|exists:d_projects,id',
            
            'identityDocument' => 'nullable|array',
            'identityDocument.name' => 'required_with:identityDocument|string',
            'identityDocument.file' => 'required_with:identityDocument|mimetypes:application/octet-stream,application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'identityDocument.p_document_type' => 'required_with:identityDocument|exists:p_documents,type',

            'propertyOwnershipProof' => 'nullable|array',
            'propertyOwnershipProof.name' => 'required_with:propertyOwnershipProof|string',
            'propertyOwnershipProof.file' => 'required_with:propertyOwnershipProof|mimetypes:application/octet-stream,application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'propertyOwnershipProof.p_document_type' => 'required_with:propertyOwnershipProof|exists:p_documents,type',

            'latestTaxReturn' => 'nullable|array',
            'latestTaxReturn.name' => 'required_with:latestTaxReturn|string',
            'latestTaxReturn.file' => 'required_with:latestTaxReturn|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            // 'latestTaxReturn.p_document_type' => 'required_with:latestTaxReturn|exists:p_documents,type',

            'bankAccountDetails' => 'nullable|array',
            'bankAccountDetails.name' => 'required_with:bankAccountDetails|string',
            'bankAccountDetails.file' => 'required_with:bankAccountDetails|mimetypes:application/octet-stream,application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'bankAccountDetails.p_document_type' => 'nullable|exists:p_documents,type',

            'consumptionBills' => 'nullable|array',
            'consumptionBills.name' => 'required_with:consumptionBills|string',
            'consumptionBills.file' => 'required_with:consumptionBills|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'consumptionBills.p_document_type' => 'required_with:consumptionBills|exists:p_documents,type',

            'familyRecordBook' => 'nullable|array',
            'familyRecordBook.name' => 'required_with:familyRecordBook|string',
            'familyRecordBook.file' => 'required_with:familyRecordBook|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'familyRecordBook.p_document_type' => 'required_with:familyRecordBook|exists:p_documents,type',

            'avisDImposition' => 'nullable|array',
            'avisDImposition.name' => 'required_with:avisDImposition|string',
            'avisDImposition.file' => 'required_with:avisDImposition|mimetypes:application/octet-stream,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'avisDImposition.p_document_type' => 'required_with:avisDImposition|exists:p_documents,type',
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
