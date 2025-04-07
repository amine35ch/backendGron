<?php

namespace App\Http\Requests\DProjectRequests;

use App\Rules\CheckMandataire;
use Illuminate\Foundation\Http\FormRequest;

class DProjectStoreRequest extends FormRequest
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

        $requiredInstaller = 'nullable';

        if ($this->parinage) {
            $requiredInstaller = 'required';
        }

        return [
            //fake fields not gonna use it in the creation
            // 'merge_agent' => 'nullable|required_if:has_agent,1|in:0,1',
            // 'agent_admin' => 'nullable|exists:d_companies,id',
            // 'agent_fin' => ['nullable', 'exists:d_companies,id'],
            // 'agent' => 'nullable|required_if:merge_agent,1|exists:d_companies,id',
            'token' => 'nullable|string',
            'd_client_id' => 'required|exists:d_clients,id',
            'supervisor_id' => 'nullable|exists:users,id',
            'inspector_id' => 'nullable|exists:users,id',
            'documents' => 'nullable|array',
            'documents.*.name' => 'required|string',
            'documents.*.file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png,image/gif',
            'documents.*.p_document_id' => 'nullable|exists:p_documents,id',
            'scenario' => 'nullable|string',
            'total_number_occupants' => 'nullable|integer|max:126',
            'number_of_children' => 'nullable|integer|max:255',
            'project_nature' => 'nullable|integer|exists:p_project_natures,type',
            'sum_revenue_reference_1' => 'required|numeric',
            'year_of_sum_revenue_reference_1' => 'nullable|integer',
            'work_load_for_low_income_owners' => 'nullable|boolean',
            'free_hosting_for_low_income_household' => 'nullable|boolean',
            'number_of_residents_under_your_roof' => 'nullable|integer|max:255',
            'number_of_dependent_children' => 'nullable|integer|max:255',
            'sum_revenue_reference_2' => 'nullable|numeric',
            'year_of_sum_revenue_reference_2' => 'nullable|integer',
            'house_number' => 'nullable|string',
            'street' => 'nullable|string',
            'complement' => 'nullable|string',
            'batiment' => 'nullable|string',
            'floor' => 'nullable|integer',
            'stairs' => 'nullable|string',
            'door' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'city' => 'nullable|string',
            'common' => 'nullable|string',
            'number_and_street' => 'nullable|string',
            'nature_residence' => 'nullable|integer|exists:p_nature_residences,type',
            'work_commun_parts' => 'nullable|boolean',
            'more_than_fifteen' => 'required|boolean',
            'logement_date_creation' => 'nullable|date_format:Y',
            'anah_folder' => 'nullable|string',
            'ptz_beneficiary' => 'nullable|boolean',
            'auto_rehabilitation' => 'nullable|boolean',
            'work_description' => 'nullable|string',
            'energy_consumption_before' => 'nullable|numeric',
            'energy_consumption_after' => 'nullable|numeric',
            'work_type' => 'nullable|integer|exists:p_work_types,type',
            'performance_energy_before_work' => 'nullable|exists:p_project_energy_classes,type',
            'number_of_floors' => 'nullable|integer|max:255',
            'class_skip' => 'nullable|exists:p_class_skip_counts,type',
            'income_class' => 'nullable|integer|exists:p_project_income_classes,type',
            'surface_housing_before_work' => 'nullable|numeric',
            'cost_ht' => 'nullable|numeric',
            'cost_ttc' => 'nullable|numeric',
            'rest_ht' => 'nullable|numeric',
            'rest_ttc' => 'nullable|numeric',
            'date_audit' => 'nullable|numeric',
            'audit_identifier' => 'nullable|numeric',
            'primary_energy_before_work' => 'nullable|numeric',
            'final_energy_before_work' => 'nullable|numeric',
            'gaz_emission_before_work' => 'nullable|numeric',
            'primary_energy_after_work' => 'nullable|numeric',
            'final_energy_after_work' => 'nullable|numeric',
            'gaz_emission_after_work' => 'nullable|numeric',
            'performance_energy_after_work' => 'nullable|exists:p_project_energy_classes,type',
            'surface_housing_after_work' => 'nullable|numeric',
            'demande_project' => 'required|exists:p_type_demande_projects,type',
            'isolated_surface' => 'nullable|integer|in:0,1',
            // 'd_third_party_id' => 'nullable|exists:d_third_parties,id',
            'phase' => 'nullable|p_phases,reference',
            'cost_ht_simulation' => 'nullable|numeric',
            'cost_ttc_simulation' => 'nullable|numeric',
            'rest_ht_simulation' => 'nullable|numeric',
            'rest_ttc_simulation' => 'nullable|numeric',
            'cost_ht_offre' => 'nullable|numeric',
            'cost_ttc_offre' => 'nullable|numeric',
            'rest_ht_offre' => 'nullable|numeric',
            'rest_ttc_offre' => 'nullable|numeric',
            'funding_mar' => 'nullable|numeric',
            'installer' => $requiredInstaller . '|exists:d_companies,id',
            'has_auditor_mar' => 'nullable|in:1,0',
            'has_agent' => 'nullable|in:1,0',
            // 'agent' => $requiredAgent . '|exists:d_companies,id',
            'cef_init' => 'nullable|numeric',
            'cef_fin' => 'nullable|numeric',
            'cep_init' => 'nullable|numeric',
            'cep_fin' => 'nullable|numeric',
            'cumac' => 'nullable|numeric',
            'cee' => 'nullable|numeric',
            'departmental_help' => 'nullable|numeric',
            'regional_help' => 'nullable|numeric',
            'help_local_authorities' => 'nullable|numeric',
            'eco_loan_stopped_thirty_mars' => 'nullable|integer',
            'renovation_advance_loan_seventeen_december' => 'nullable|integer',
            'other_description_of_remainder_payable' => 'nullable|string',
            'anah_mprs' => 'nullable|numeric',
            'consistency_of_well_verified_work' => 'nullable|integer',
            'reception_is_pronounced' => 'nullable|integer',
            'description_reception_is_pronounced' => 'nullable|string',
            'consistency_of_work_scenarios_checked' => 'nullable|integer',
            'occupants' => 'nullable|array',
            'occupants.*.civility' => 'required|integer',
            'occupants.*.first_name' => 'required|string',
            'occupants.*.last_name' => 'required|string',
            'occupants.*.year_of_birth' => 'required|date_format:Y',
            'parinage' => 'required|in:0,1',
            'gain_energy' => 'nullable|numeric',
            'total_cost_energy_audit' => 'nullable|numeric',
            'dpe_before' => 'nullable|string',
            'dpe_after' => 'nullable|string',
            'prime_type' => 'nullable|integer',
            'project_residence' => 'required|exists:p_project_residences,type',

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
            'latestTaxReturn.p_document_type' => 'required_with:latestTaxReturn|exists:p_documents,type',

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
