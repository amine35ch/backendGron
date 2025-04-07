<?php

namespace App\Http\Resources\DProjectResources;

use App\Enums\DClientEnum\DClientGender;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\PDocumentEnum\PDocumentNatureType;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\PStepEnum\PStepOrder;
use App\Http\Resources\DProjectVisitResources\DProjectVisitCollection;
use App\Http\Resources\DProjectWorkResources\DProjectWorkCollection;
use App\Models\DProjectDocument;
use App\Models\PStatusDoc;
use App\Models\PStep;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!$request->segment(3)) {
            return $this->collectionItems();
        }
        if ($request->segment(3) == 'all-invoices') {
            return $this->onlyInvoices();
        }
        $user = auth()->user();

        return match ($user->profile) {
            DCompanyProfile::MAR->value => $this->accessMar($user),
            DCompanyProfile::INS->value => $this->accessIns($user),
            DCompanyProfile::AUD->value => $this->accessAud()
        };
    }

    public function getVisits()
    {
        $user = auth()->user();
        $visits = $this->visits;
        if (
            $user->role != DCompanyProfile::MAR->value . '::admin' &&
            $user->role != DCompanyProfile::INS->value . '::admin'
        ) {
            return new DProjectVisitCollection($visits->where('d_company_id', $user->userable_id));
        }

        return new DProjectVisitCollection($visits);
    }

    public function accessMar($user)
    {
        $statues = PStatusDoc::all();

        $installerCompany = $this->installer?->company;
        $auditorCompany = $this->auditor?->company;
        $mandAdmCompany = $this->mandAdm?->company;
        $mandFinCompany = $this->mandFin?->company;
        $company = $this->company;
        $client = $this->client;
        $installer = $installerCompany ? [
            'id' => $installerCompany->id,
            'email' => $installerCompany->email,
            'address' => $installerCompany->city
                . ' ' . $installerCompany->zip_code .
                ' ' . $installerCompany->address,
            'phone_number_1' => $installerCompany->phone_number_1,
            'phone_number_2' => $installerCompany->phone_number_2,
            'signature' => $installerCompany->download_signature,
            'logo' => $installerCompany->download_logo,
            'trade_name' => $installerCompany->trade_name,
        ] : null;

        $auditor = $auditorCompany ? [
            'id' => $auditorCompany->id,
            'email' => $auditorCompany->email,
            'address' => $auditorCompany->city
                . ' ' . $auditorCompany->zip_code .
                ' ' . $auditorCompany->address,
            'phone_number_1' => $auditorCompany->phone_number_1,
            'phone_number_2' => $auditorCompany->phone_number_2,
            'signature' => $auditorCompany->download_signature,
            'logo' => $auditorCompany->download_logo,
            'trade_name' => $auditorCompany->trade_name,
            'profile' => $auditorCompany->profile,
        ] : null;
        $mandAdm = $mandAdmCompany ? [
            'id' => $mandAdmCompany->id,
            'email' => $mandAdmCompany->email,
            'address' => $mandAdmCompany->city
                . ' ' . $mandAdmCompany->zip_code .
                ' ' . $mandAdmCompany->address,
            'phone_number_1' => $mandAdmCompany->phone_number_1,
            'phone_number_2' => $mandAdmCompany->phone_number_2,
            'signature' => $mandAdmCompany->download_signature,
            'logo' => $mandAdmCompany->download_logo,

            'trade_name' => $mandAdmCompany->trade_name,
        ] : null;
        $mandFin = $mandFinCompany ? [
            'id' => $mandFinCompany->id,
            'email' => $mandFinCompany->email,
            'address' => $mandFinCompany->city
                . ' ' . $mandFinCompany->zip_code .
                ' ' . $mandFinCompany->address,
            'phone_number_1' => $mandFinCompany->phone_number_1,
            'phone_number_2' => $mandFinCompany->phone_number_2,
            'signature' => $mandFinCompany->download_signature,
            'logo' => $mandFinCompany->download_logo,
            'trade_name' => $mandFinCompany->trade_name,
        ] : null;
        $visits = $this->getVisits();
        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,

            'reference' => $this->reference,
            'entitled' => $this->entitled,
            'anah_date' => $this->anah_date,
            'status' => $this->status,
            'inspector' => $this->inspector,
            'supervisor' => $this->supervisor,
            'status_message' => $this->status_message,
            'depot_anah_1' => $this->depot_anah_1,
            'depot_anah_2' => $this->depot_anah_2,
            'state' => $this->state,
            'number_of_floors' => $this->number_of_floors,
            'income_class' => $this->income_class,
            'complement' => $this->complement,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'batiment' => $this->batiment,
            'created_at' => $this->created_at,
            'floor' => $this->floor,
            'stairs' => $this->stairs,
            'door' => $this->door,
            'invoice' => $this->invoice_mar,
            'zip_code' => $this->zip_code,
            'isolated_surface' => $this->isolated_surface,
            'city' => $this->city,
            'common' => $this->common,
            'number_and_street' => $this->number_and_street,
            'total_number_occupants' => $this->total_number_occupants,
            'number_of_children' => $this->number_of_children,
            'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            'number_of_dependent_children' => $this->number_of_dependent_children,
            'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            'd_client_id' => $this->d_client_id,
            'response_anah' => [
                'state' => $this->anah_first_depot_response_state,
                'response' => $this->anah_first_depot_response,
            ],
            'd_company_id' => $this->d_company_id,
            'current_step_order' => $this->current_step_order,
            'cleared_step_order' => $this->cleared_step_order,
            'phase' => $this->phase,
            'anah_responses' => $this->responseAnah,
            'process_ended' => $this->process_ended,
            'cost_ht_simulation' => $this->cost_ht_simulation,
            'cost_ttc_simulation' => $this->cost_ttc_simulation,
            'rest_ht_simulation' => $this->rest_ht_simulation,
            'rest_ttc_simulation' => $this->rest_ttc_simulation,
            'anah_folder' => $this->anahFolder(),
            'isEditable' => $this->isEditable(),
            'merge_agent' => $this->merge_agent,
            'cost_ht_offre' => $this->cost_ht_offre,
            'cost_ttc_offre' => $this->cost_ttc_offre,
            'rest_ht_offre' => $this->rest_ht_offre,
            'rest_ttc_offre' => $this->rest_ttc_offre,
            'date_audit' => $this->date_audit,
            'audit_identifier' => $this->audit_identifier,
            'primary_energy_before_work' => $this->primary_energy_before_work,
            'final_energy_before_work' => $this->final_energy_before_work,
            'gaz_emission_before_work' => $this->gaz_emission_before_work,
            'performance_energy_before_work' => $this->performance_energy_before_work,
            'surface_housing_before_work' => $this->surface_housing_before_work,
            'scenario' => $this->scenario,
            'primary_energy_after_work' => $this->primary_energy_after_work,
            'final_energy_after_work' => $this->final_energy_after_work,
            'gaz_emission_after_work' => $this->gaz_emission_after_work,
            'performance_energy_after_work' => $this->performance_energy_after_work,
            'surface_housing_after_work' => $this->surface_housing_after_work,
            'class_skip_type' => $this->skipClass?->entitled,
            'class_skip' => $this->class_skip,
            'process' => $this->process,
            'nature_residence' => $this->nature_residence,
            'work_commun_parts' => $this->work_commun_parts,
            'more_than_fifteen' => $this->more_than_fifteen,
            'logement_date_creation' => $this->logement_date_creation,
            'ptz_beneficiary' => $this->ptz_beneficiary,
            'auto_rehabilitation' => $this->auto_rehabilitation,
            'energy_consumption_before' => $this->energy_consumption_before,
            'energy_consumption_after' => $this->energy_consumption_after,
            'work_description' => $this->work_description,
            'company_creator' => $this->creator->company?->trade_name,
            'funding_mar' => $this->funding_mar,
            'isolated_surface_value' => $this->isolated_surface_value,
            'ceiling_height' => $this->ceiling_height,
            'has_auditor_mar' => $this->has_auditor_mar,
            'has_agent' => $this->has_agent,
            'step' => $this->currentStep(),
            'next_step' => [
                'display_name' => $this->getNextStepAttribute()?->display_name,
                'id' => $this->getNextStepAttribute()?->id,
                'reference' => $this->getNextStepAttribute()?->reference,
                'order' => $this->getNextStepAttribute()?->order,
                'authorized' => true,
            ],
            'prev_step' => [
                'display_name' => $this->getPrevStepAttribute()?->display_name,
                'id' => $this->getPrevStepAttribute()?->id,
                'authorized' => true,
                'reference' => $this->getPrevStepAttribute()?->reference,
                'order' => $this->getPrevStepAttribute()?->order,
            ],
            'documents' => $this->getAuthorizedDocuments($this, $statues),
            'decisions' => $this->decisions,
            'occupants' => $this->getoccupants(),
            'type_demande_project' => $this->typeDemandeProject?->entitled,
            'income_class_details' => $this->projectIncomeClass?->entitled,
            'demande_project' => $this->typeDemandeProject ? [
                'id' => $this->typeDemandeProject->id,
                'entitled' => $this->typeDemandeProject->entitled,
                'type' => $this->typeDemandeProject->type,
            ] : null,
            'cost_ht' => $this->cost_ht,
            'rest_ht' => $this->rest_ht,
            'project_energy_class' => $this->projectEnergyClass?->entitled,
            'step_documents' => $this->lazyLoadStepDocuments($user),
            'clavis_documents' => $this->lazyLoadClavisDocuments($user),
            'visits' => $visits,
            'events' => $this->events,
            'works' => new DProjectWorkCollection($this->works),
            'scenario_details' => $this->scenarioType,
            'client' => [
                'id' => $client->id,
                'reference' => $client->reference,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'position' => $client->position,
                'code' => $client->code,
                'city' => $client->city,
                'zip_code' => $client->zip_code,
                'address' => $client->address,
                'signature' => $client->signature,
                'phone_number_1' => $client->phone_number_1,
                'phone_number_2' => $client->phone_number_2,
                'email_contact' => $client->email_contact,
                'email_anah' => $client->email_anah,
                'date_of_birth' => $client->date_of_birth,
                'iban' => $client->iban,
                'rib' => $client->rib,
            ],
            'installer' => $installer,
            'auditor' => $auditor,
            'mandataire_admin' => $mandAdm,
            'mandataire_financier' => $mandFin,
            'mar' => [
                'id' => $company->id,
                'trade_name' => $company->trade_name,
                'address' => $company->address ?? null,
                'email' => $company->email ?? null,
                'phone_number_1' => $company->phone_number_1 ?? null,
                'zip_code' => $company->zip_code ?? null,
                'city' => $company->city ?? null,
            ],
            'derogation_request_criteria' => $this->derogation_request_criteria,
            // 'steps' => $this->checkAuthorizedStep($this)
            'eco_loan_stopped_thirty_mars' => $this->eco_loan_stopped_thirty_mars,
            'renovation_advance_loan_seventeen_december' => $this->renovation_advance_loan_seventeen_december,
            'other_description_of_remainder_payable' => $this->other_description_of_remainder_payable,
            // 'free_paper' => $this->free_paper,
            'project_nature' => $this->project_nature,
            'project_residence' => $this->projectResidence,
            'work_type' => $this->work_type,
            'missing_documents' => $this->missingDocuments($statues),
            // 'key_documents' => $this->keyDocuments($statues),
            'gain_energy' => $this->gain_energy,
            'total_cost_energy_audit' => $this->total_cost_energy_audit,
            'dpe_before' => $this->dpe_before,
            'dpe_after' => $this->dpe_after,
            'natureResidence' => $this->natureResidence,
            'workType' => $this->workType,
            'invoices' => $this->getInvoices(),
            'consistency_of_work_scenarios_checked' => $this->consistency_of_work_scenarios_checked,
            'reception_is_pronounced' => $this->reception_is_pronounced,
            'description_reception_is_pronounced' => $this->description_reception_is_pronounced,
            'work_planned_start' => $this->work_planned_start,
            'work_actual_start' => $this->work_actual_start,
            'work_planned_end' => $this->work_planned_end,
            'work_actual_end' => $this->work_actual_end,
            'project_billed' => $this->operations->where('p_operation_id', 1)->first()?->is_billed,
            'accordions' => [
                'project_details' => true,
                'client_details' => true,
                'menage_details' => true,
                'occupant_list' => true,
                'file_list' => true,
                'visitt_list' => true,
                'work_list' => true,
                'document_list' => true,
                'start_work' => true,
                'invoice' => true,
                'visits' => true,
                'simulation' => true,
                'save_work_date_prevu' => true,
            ],
            'class_skip_number' => $this->class_skip_number,
            'e_signature_credentials' => $this->getEsignatureCredentials($visits),
            'project_type' => $this->project_type,
        ];
    }

    public function accessIns($user)
    {
        if ($user->hasRole('INS::admin') || $user->hasRole('INS::collaborator')) {
            return $this->accessInsAdminOrCollab($user);
        } else {
            return $this->accessInsSupervisorOrInspector($user);
        }
    }

    public function accessInsAdminOrCollab($user)
    {
        $statues = PStatusDoc::all();

        $installerCompany = $this->installer?->company;
        $company = $this->company;
        $client = $this->client;
        $installer = $installerCompany ? [
            'id' => $installerCompany->id,
            'email' => $installerCompany->email,
            'address' => $installerCompany->city
                . ' ' . $installerCompany->zip_code .
                ' ' . $installerCompany->address,
            'phone_number_1' => $installerCompany->phone_number_1,
            'phone_number_2' => $installerCompany->phone_number_2,
            'signature' => $installerCompany->download_signature,
            'logo' => $installerCompany->download_logo,
            'trade_name' => $installerCompany->trade_name,
        ] : null;
        $auditorCompany = $this->auditor?->company;
        $auditor = $auditorCompany ? [
            'id' => $auditorCompany->id,
            'email' => $auditorCompany->email,
            'address' => $auditorCompany->city
                . ' ' . $auditorCompany->zip_code .
                ' ' . $auditorCompany->address,
            'phone_number_1' => $auditorCompany->phone_number_1,
            'phone_number_2' => $auditorCompany->phone_number_2,
            'signature' => $auditorCompany->download_signature,
            'logo' => $auditorCompany->download_logo,
            'trade_name' => $auditorCompany->trade_name,
            'profile' => $auditorCompany->profile,
        ] : null;
        $visits = $this->getVisits();
        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,
            'reference' => $this->reference,
            'status' => $this->status,
            'status_message' => $this->status_message,
            'state' => $this->state,
            'number_of_floors' => $this->number_of_floors,
            'income_class' => $this->income_class,
            'complement' => $this->complement,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'batiment' => $this->batiment,
            'floor' => $this->floor,
            'depot_anah_1' => $this->depot_anah_1,
            'depot_anah_2' => $this->depot_anah_2,
            'step_documents' => $this->lazyLoadStepDocuments($user),
            'clavis_documents' => $this->lazyLoadClavisDocuments($user),
            'stairs' => $this->stairs,
            'invoice' => $this->invoice_installer,
            'door' => $this->door,
            'zip_code' => $this->zip_code,
            'created_at' => $this->created_at,
            'isolated_surface' => $this->isolated_surface,
            'city' => $this->city,
            'common' => $this->common,
            'auditor' => $auditor,
            'd_client_id' => $this->d_client_id,
            'number_and_street' => $this->number_and_street,
            'total_number_occupants' => $this->total_number_occupants,
            'number_of_children' => $this->number_of_children,
            'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            'number_of_dependent_children' => $this->number_of_dependent_children,
            'anah_responses' => $this->responseAnah,
            'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            'd_company_id' => $this->d_company_id,
            'current_step_id' => $this->current_step_id,
            'phase' => $this->phase,
            'process_ended' => $this->process_ended,
            'response_anah' => [
                'state' => $this->anah_first_depot_response_state,
                'response' => $this->anah_first_depot_response,
            ],
            'cost_ht_simulation' => $this->cost_ht_simulation,
            'cost_ttc_simulation' => $this->cost_ttc_simulation,
            'rest_ht_simulation' => $this->rest_ht_simulation,
            'rest_ttc_simulation' => $this->rest_ttc_simulation,
            'cost_ht_offre' => $this->cost_ht_offre,
            'cost_ttc_offre' => $this->cost_ttc_offre,
            'cleared_step_order' => $this->cleared_step_order,
            'rest_ht_offre' => $this->rest_ht_offre,
            'rest_ttc_offre' => $this->rest_ttc_offre,
            'anah_folder' => $this->anahFolder(),
            'isEditable' => $this->isEditable(),
            'merge_agent' => $this->merge_agent,
            'date_audit' => $this->date_audit,
            'audit_identifier' => $this->audit_identifier,
            'primary_energy_before_work' => $this->primary_energy_before_work,
            'final_energy_before_work' => $this->final_energy_before_work,
            'gaz_emission_before_work' => $this->gaz_emission_before_work,
            'performance_energy_before_work' => $this->performance_energy_before_work,
            'surface_housing_before_work' => $this->surface_housing_before_work,
            'scenario' => $this->scenario,
            'primary_energy_after_work' => $this->primary_energy_after_work,
            'final_energy_after_work' => $this->final_energy_after_work,
            'gaz_emission_after_work' => $this->gaz_emission_after_work,
            'performance_energy_after_work' => $this->performance_energy_after_work,
            'surface_housing_after_work' => $this->surface_housing_after_work,
            'class_skip_type' => $this->skipClass?->entitled,
            'class_skip' => $this->class_skip,
            'process' => $this->process,
            'nature_residence' => $this->nature_residence,
            'work_commun_parts' => $this->work_commun_parts,
            'more_than_fifteen' => $this->more_than_fifteen,
            'logement_date_creation' => $this->logement_date_creation,
            'ptz_beneficiary' => $this->ptz_beneficiary,
            'auto_rehabilitation' => $this->auto_rehabilitation,
            'energy_consumption_before' => $this->energy_consumption_before,
            'energy_consumption_after' => $this->energy_consumption_after,
            'work_description' => $this->work_description,
            'company_creator' => $this->creator->company?->trade_name,
            'is_third_party' => $this->is_third_party,
            'funding_mar' => $this->funding_mar,
            'isolated_surface_value' => $this->isolated_surface_value,
            'ceiling_height' => $this->ceiling_height,
            'step' => $this->currentStep(),
            'cleared_step' => $this->clearedStep(),
            'demande_project' => $this->typeDemandeProject ? [
                'id' => $this->typeDemandeProject->id,
                'entitled' => $this->typeDemandeProject->entitled,
                'type' => $this->typeDemandeProject->type,
            ] : null,
            'next_step' => [
                'display_name' => $this->getNextStepAttribute()?->display_name,
                'id' => $this->getNextStepAttribute()?->id,
            ],
            'prev_step' => [
                'display_name' => $this->getPrevStepAttribute()?->display_name,
                'id' => $this->getPrevStepAttribute()?->id,
            ],
            'documents' => $this->getAuthorizedDocuments($this, $statues),
            'occupants' => $this->getoccupants(),
            'type_demande_project' => $this->typeDemandeProject?->entitled,

            'income_class_details' => $this->projectIncomeClass?->entitled,

            'project_energy_class' => $this->projectEnergyClass?->entitled,
            'events' => $this->events,
            'works' => $this->works,
            'scenario_details' => $this->scenarioType,
            'client' => [
                'id' => $client->id,
                'reference' => $client->reference,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'position' => $client->position,
                'city' => $client->city,
                'zip_code' => $client->zip_code,
                'address' => $client->address,
                'signature' => $client->signature,
                'phone_number_1' => $client->phone_number_1,
                'phone_number_2' => $client->phone_number_2,
                'email_contact' => $client->email_contact,
                'email_anah' => $client->email_anah,
            ],
            'installer' => $installer,
            'mar' => [
                'id' => $company->id,
                'trade_name' => $company->trade_name,
            ],
            'derogation_request_criteria' => $this->derogation_request_criteria,
            'eco_loan_stopped_thirty_mars' => $this->eco_loan_stopped_thirty_mars,
            'renovation_advance_loan_seventeen_december' => $this->renovation_advance_loan_seventeen_december,
            'other_description_of_remainder_payable' => $this->other_description_of_remainder_payable,
            'project_nature' => $this->project_nature,
            'project_residence' => $this->projectResidence,
            'work_type' => $this->work_type,
            'visits' => $visits,
            'work_planned_start' => $this->work_planned_start,
            'work_actual_start' => $this->work_actual_start,
            'work_planned_end' => $this->work_planned_end,
            'work_actual_end' => $this->work_actual_end,
            'project_billed' => $this->operations->where('p_operation_id', 3)->first()?->is_billed,
            'accordions' => [
                'project_details' => true,
                'client_details' => true,
                'menage_details' => true,
                'occupant_list' => true,
                'file_list' => true,
                'visitt_list' => true,
                'work_list' => true,
                'document_list' => true,
                'start_work' => true,
                'invoice' => true,
                'visits' => true,
                'simulation' => true,
                'save_work_date_prevu' => $this->bonDeTravailSigned(),
            ],
            'class_skip_number' => $this->class_skip_number,
            'e_signature_credentials' => $this->getEsignatureCredentials($visits),
            'project_type' => $this->project_type,
        ];
    }

    public function bonDeTravailSigned()
    {
        $flag = true;
        $BonDeTravail = $this->documents->where('type_doc', PDocumentType::BON_DE_TRAVAIL->value)->where('status', DProjectDocumentStatus::SATISFIED->value)->first();
        if ($BonDeTravail) {
            $flag = false;
        }

        return $flag;
    }

    public function accessInsSupervisorOrInspector($user)
    {
        $statues = PStatusDoc::all();

        $installerCompany = $this->installer?->company;
        $company = $this->company;
        $client = $this->client;
        $installer = $installerCompany ? [
            'id' => $installerCompany->id,
            'email' => $installerCompany->email,
            'address' => $installerCompany->city
                . ' ' . $installerCompany->zip_code .
                ' ' . $installerCompany->address,
            'phone_number_1' => $installerCompany->phone_number_1,
            'phone_number_2' => $installerCompany->phone_number_2,
            'signature' => $installerCompany->download_signature,
            'logo' => $installerCompany->download_logo,
            'trade_name' => $installerCompany->trade_name,
        ] : null;
        $auditorCompany = $this->auditor?->company;
        $auditor = $auditorCompany ? [
            'id' => $auditorCompany->id,
            'email' => $auditorCompany->email,
            'address' => $auditorCompany->city
                . ' ' . $auditorCompany->zip_code .
                ' ' . $auditorCompany->address,
            'phone_number_1' => $auditorCompany->phone_number_1,
            'phone_number_2' => $auditorCompany->phone_number_2,
            'signature' => $auditorCompany->download_signature,
            'logo' => $auditorCompany->download_logo,
            'trade_name' => $auditorCompany->trade_name,
            'profile' => $auditorCompany->profile,
        ] : null;
        $visits = $this->getVisits();
        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,
            'reference' => $this->reference,
            'status' => $this->status,
            'status_message' => $this->status_message,
            'state' => $this->state,
            'number_of_floors' => $this->number_of_floors,
            'income_class' => $this->income_class,
            'complement' => $this->complement,
            'address' => $this->address,
            'batiment' => $this->batiment,
            'floor' => $this->floor,
            'depot_anah_1' => $this->depot_anah_1,
            'depot_anah_2' => $this->depot_anah_2,
            'stairs' => $this->stairs,
            'invoice' => $this->invoice_installer,
            'door' => $this->door,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'zip_code' => $this->zip_code,
            'auditor' => $auditor,
            'created_at' => $this->created_at,
            'step_documents' => $this->lazyLoadStepDocuments($user),
            'clavis_documents' => $this->lazyLoadClavisDocuments($user),
            'isolated_surface' => $this->isolated_surface,
            'city' => $this->city,
            'common' => $this->common,
            'number_and_street' => $this->number_and_street,
            'total_number_occupants' => $this->total_number_occupants,
            'number_of_children' => $this->number_of_children,
            'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            'number_of_dependent_children' => $this->number_of_dependent_children,
            'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            'd_company_id' => $this->d_company_id,
            'current_step_id' => $this->current_step_id,
            'phase' => $this->phase,
            'process_ended' => $this->process_ended,
            'anah_responses' => $this->responseAnah,
            'cost_ht_simulation' => $this->cost_ht_simulation,
            'response_anah' => [
                'state' => $this->anah_first_depot_response_state,
                'response' => $this->anah_first_depot_response,
            ],
            'cost_ttc_simulation' => $this->cost_ttc_simulation,
            'rest_ht_simulation' => $this->rest_ht_simulation,
            'rest_ttc_simulation' => $this->rest_ttc_simulation,
            'cost_ht_offre' => $this->cost_ht_offre,
            'cost_ttc_offre' => $this->cost_ttc_offre,
            'cleared_step_order' => $this->cleared_step_order,
            'rest_ht_offre' => $this->rest_ht_offre,
            'rest_ttc_offre' => $this->rest_ttc_offre,
            'anah_folder' => $this->anahFolder(),
            'isEditable' => $this->isEditable(),
            'merge_agent' => $this->merge_agent,
            'date_audit' => $this->date_audit,
            'audit_identifier' => $this->audit_identifier,
            'primary_energy_before_work' => $this->primary_energy_before_work,
            'final_energy_before_work' => $this->final_energy_before_work,
            'gaz_emission_before_work' => $this->gaz_emission_before_work,
            'performance_energy_before_work' => $this->performance_energy_before_work,
            'surface_housing_before_work' => $this->surface_housing_before_work,
            'scenario' => $this->scenario,
            'primary_energy_after_work' => $this->primary_energy_after_work,
            'final_energy_after_work' => $this->final_energy_after_work,
            'gaz_emission_after_work' => $this->gaz_emission_after_work,
            'performance_energy_after_work' => $this->performance_energy_after_work,
            'surface_housing_after_work' => $this->surface_housing_after_work,
            'class_skip_type' => $this->skipClass?->entitled,
            'class_skip' => $this->class_skip,
            'process' => $this->process,
            'd_client_id' => $this->d_client_id,
            'demande_project' => $this->typeDemandeProject ? [
                'id' => $this->typeDemandeProject->id,
                'entitled' => $this->typeDemandeProject->entitled,
                'type' => $this->typeDemandeProject->type,
            ] : null,
            'nature_residence' => $this->nature_residence,
            'work_commun_parts' => $this->work_commun_parts,
            'more_than_fifteen' => $this->more_than_fifteen,
            'logement_date_creation' => $this->logement_date_creation,
            'ptz_beneficiary' => $this->ptz_beneficiary,
            'auto_rehabilitation' => $this->auto_rehabilitation,
            'energy_consumption_before' => $this->energy_consumption_before,
            'energy_consumption_after' => $this->energy_consumption_after,
            'work_description' => $this->work_description,
            'company_creator' => $this->creator->company?->trade_name,
            'is_third_party' => $this->is_third_party,
            'funding_mar' => $this->funding_mar,
            'isolated_surface_value' => $this->isolated_surface_value,
            'ceiling_height' => $this->ceiling_height,
            'step' => $this->currentStep(),
            'cleared_step' => $this->clearedStep(),
            'next_step' => [
                'display_name' => $this->getNextStepAttribute()?->display_name,
                'id' => $this->getNextStepAttribute()?->id,
            ],
            'prev_step' => [
                'display_name' => $this->getPrevStepAttribute()?->display_name,
                'id' => $this->getPrevStepAttribute()?->id,
            ],
            'documents' => $this->getAuthorizedDocuments($this, $statues),
            'occupants' => $this->getoccupants(),
            'type_demande_project' => $this->typeDemandeProject?->entitled,

            'income_class_details' => $this->projectIncomeClass?->entitled,

            'project_energy_class' => $this->projectEnergyClass?->entitled,
            'events' => $this->events,
            'scenario_details' => $this->scenarioType,
            'client' => [
                'id' => $client->id,
                'reference' => $client->reference,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'position' => $client->position,
                'city' => $client->city,
                'zip_code' => $client->zip_code,
                'address' => $client->address,
                'signature' => $client->signature,
                'phone_number_1' => $client->phone_number_1,
                'phone_number_2' => $client->phone_number_2,
                'email_contact' => $client->email_contact,
                'email_anah' => $client->email_anah,
            ],
            'installer' => $installer,
            'mar' => [
                'id' => $company->id,
                'trade_name' => $company->trade_name,
            ],
            'derogation_request_criteria' => $this->derogation_request_criteria,
            'eco_loan_stopped_thirty_mars' => $this->eco_loan_stopped_thirty_mars,
            'renovation_advance_loan_seventeen_december' => $this->renovation_advance_loan_seventeen_december,
            'other_description_of_remainder_payable' => $this->other_description_of_remainder_payable,
            'project_nature' => $this->project_nature,
            'project_residence' => $this->projectResidence,
            'work_type' => $this->work_type,
            'visits' => $visits,
            'work_planned_start' => $this->work_planned_start,
            'work_actual_start' => $this->work_actual_start,
            'work_planned_end' => $this->work_planned_end,
            'work_actual_end' => $this->work_actual_end,
            'accordions' => [
                'project_details' => true,
                'client_details' => true,
                'menage_details' => true,
                'occupant_list' => true,
                'file_list' => true,
                'visitt_list' => true,
                'work_list' => false,
                'document_list' => true,
                'start_work' => false,
                'invoice' => false,
                'visits' => true,
                'simulation' => false,
                'save_work_date_prevu' => $this->BonDeTravailSigned(),
            ],
            'class_skip_number' => $this->class_skip_number,
            'e_signature_credentials' => $this->getEsignatureCredentials($visits),
            'project_type' => $this->project_type,
        ];
    }

    public function accessAud()
    {
        $auditorCompany = $this->auditor?->company;
        $statues = PStatusDoc::all();

        $auditor = $auditorCompany ? [
            'id' => $auditorCompany->id,
            'trade_name' => $auditorCompany->trade_name,
            'email' => $auditorCompany->email,
            'address' => $auditorCompany->city
                . ' ' . $auditorCompany->zip_code .
                ' ' . $auditorCompany->address,
            'phone_number_1' => $auditorCompany->phone_number_1,
            'phone_number_2' => $auditorCompany->phone_number_2,
            'signature' => $auditorCompany->download_signature,
            'logo' => $auditorCompany->download_logo,

        ] : null;
        $client = $this->client;
        $installerCompany = $this->installer?->company;
        $company = $this->company;

        $installer = $installerCompany ? [
            'id' => $installerCompany->id,
            'trade_name' => $installerCompany->trade_name,
            'email' => $installerCompany->email,
            'address' => $installerCompany->city
                . ' ' . $installerCompany->zip_code .
                ' ' . $installerCompany->address,
            'phone_number_1' => $installerCompany->phone_number_1,
            'phone_number_2' => $installerCompany->phone_number_2,
            'signature' => $installerCompany->download_signature,
            'logo' => $installerCompany->download_logo,
        ] : null;

        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,
            'reference' => $this->reference,
            'entitled' => $this->entitled,
            'status' => $this->status,
            'inspector' => $this->inspector,
            'supervisor' => $this->supervisor,
            'depot_anah_1' => $this->depot_anah_1,
            'depot_anah_2' => $this->depot_anah_2,
            'status_message' => $this->status_message,
            'state' => $this->state,
            'number_of_floors' => $this->number_of_floors,
            'income_class' => $this->income_class,
            'complement' => $this->complement,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'batiment' => $this->batiment,
            'floor' => $this->floor,
            'created_at' => $this->created_at,
            'stairs' => $this->stairs,
            'door' => $this->door,
            'zip_code' => $this->zip_code,
            'isolated_surface' => $this->isolated_surface,
            'city' => $this->city,
            'common' => $this->common,
            'number_and_street' => $this->number_and_street,
            'total_number_occupants' => $this->total_number_occupants,
            'number_of_children' => $this->number_of_children,
            'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            'number_of_dependent_children' => $this->number_of_dependent_children,
            'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            'd_client_id' => $this->d_client_id,
            'd_company_id' => $this->d_company_id,
            'current_step_order' => $this->current_step_order,
            'cleared_step_order' => $this->cleared_step_order,
            'phase' => $this->phase,
            'process_ended' => $this->process_ended,
            'anah_folder' => $this->anahFolder(),
            'isEditable' => $this->isEditable(),
            'merge_agent' => $this->merge_agent,
            'cost_ht_simulation' => $this->cost_ht_simulation,
            'cost_ttc_simulation' => $this->cost_ttc_simulation,
            'rest_ht_simulation' => $this->rest_ht_simulation,
            'anah_responses' => $this->responseAnah,
            'rest_ttc_simulation' => $this->rest_ttc_simulation,
            'cost_ht_offre' => $this->cost_ht_offre,
            'cost_ttc_offre' => $this->cost_ttc_offre,
            'response_anah' => [
                'state' => $this->anah_first_depot_response_state,
                'response' => $this->anah_first_depot_response,
            ],
            'anah_first_depot_response' => $this->anah_first_depot_response,
            'rest_ht_offre' => $this->rest_ht_offre,
            'cleared_step' => $this->clearedStep(),
            'rest_ttc_offre' => $this->rest_ttc_offre,
            'date_audit' => $this->date_audit,
            'audit_identifier' => $this->audit_identifier,
            'primary_energy_before_work' => $this->primary_energy_before_work,
            'final_energy_before_work' => $this->final_energy_before_work,
            'gaz_emission_before_work' => $this->gaz_emission_before_work,
            'performance_energy_before_work' => $this->performance_energy_before_work,
            'surface_housing_before_work' => $this->surface_housing_before_work,
            'scenario' => $this->scenario,
            'primary_energy_after_work' => $this->primary_energy_after_work,
            'final_energy_after_work' => $this->final_energy_after_work,
            'gaz_emission_after_work' => $this->gaz_emission_after_work,
            'performance_energy_after_work' => $this->performance_energy_after_work,
            'surface_housing_after_work' => $this->surface_housing_after_work,
            'process' => $this->process,
            'nature_residence' => $this->nature_residence,
            'work_commun_parts' => $this->work_commun_parts,
            'more_than_fifteen' => $this->more_than_fifteen,
            'logement_date_creation' => $this->logement_date_creation,
            'ptz_beneficiary' => $this->ptz_beneficiary,
            'auto_rehabilitation' => $this->auto_rehabilitation,
            'energy_consumption_before' => $this->energy_consumption_before,
            'energy_consumption_after' => $this->energy_consumption_after,
            'work_description' => $this->work_description,
            'company_creator' => $this->creator->company?->trade_name,
            'funding_mar' => $this->funding_mar,
            'isolated_surface_value' => $this->isolated_surface_value,
            'ceiling_height' => $this->ceiling_height,
            'has_auditor_mar' => $this->has_auditor_mar,
            'has_agent' => $this->has_agent,
            'type_demande_project' => $this->typeDemandeProject?->entitled,
            'demande_project' => $this->typeDemandeProject ? [
                'id' => $this->projectIncomeClass?->id,
                'entitled' => $this->projectIncomeClass?->entitled,
                'type' => $this->projectIncomeClass?->type,
            ] : null,
            'income_class_details' => $this->projectIncomeClass?->entitled,
            'cost_ht' => $this->cost_ht,
            'rest_ht' => $this->rest_ht,
            'class_skip_type' => $this->skipClass?->entitled,
            'class_skip' => $this->class_skip,
            'project_energy_class' => $this->projectEnergyClass,
            'documents' => $this->getAuthorizedDocuments($this, $statues),
            'visits' => new DProjectVisitCollection($this->visits->where(
                'd_company_id',
                auth()->user()->userable_id
            )),
            'auditor' => $auditor,
            'client' => [
                'id' => $client->id,
                'reference' => $client->reference,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'position' => $client->position,
                'city' => $client->city,
                'zip_code' => $client->zip_code,
                'address' => $client->address,
                'signature' => $client->signature,
                'phone_number_1' => $client->phone_number_1,
                'phone_number_2' => $client->phone_number_2,
                'email_contact' => $client->email_contact,
                'email_anah' => $client->email_anah,

                'date_of_birth' => $client->date_of_birth,
            ],
            'installer' => $installer,
            'mar' => [
                'id' => $company->id,
                'trade_name' => $company->trade_name,
                'address' => $company->address ?? null,
                'email' => $company->email ?? null,
                'phone_number_1' => $company->phone_number_1 ?? null,
                'zip_code' => $company->zip_code ?? null,
                'city' => $company->city ?? null,
            ],
            'derogation_request_criteria' => $this->derogation_request_criteria,
            // 'steps' => $this->checkAuthorizedStep($this)
            'eco_loan_stopped_thirty_mars' => $this->eco_loan_stopped_thirty_mars,
            'renovation_advance_loan_seventeen_december' => $this->renovation_advance_loan_seventeen_december,
            'other_description_of_remainder_payable' => $this->other_description_of_remainder_payable,
            // 'free_paper' => $this->free_paper,
            'project_nature' => $this->project_nature,
            'project_residence' => $this->projectResidence,
            'work_type' => $this->work_type,
            'missing_documents' => $this->missingDocuments($statues),
            // 'key_documents' => $this->keyDocuments($statues),
            'gain_energy' => $this->gain_energy,
            'total_cost_energy_audit' => $this->total_cost_energy_audit,
            'dpe_before' => $this->dpe_before,
            'dpe_after' => $this->dpe_after,
            'natureResidence' => $this->natureResidence,
            'workType' => $this->workType,
            'work_planned_start' => $this->work_planned_start,
            'work_actual_start' => $this->work_actual_start,
            'work_planned_end' => $this->work_planned_end,
            'project_billed' => $this->operations->where('p_operation_id', 2)->first()?->is_billed,
            'work_actual_end' => $this->work_actual_end,
            'class_skip_number' => $this->class_skip_number,
            'accordions' => [
                'document_list' => true,
                'simulation' => true,
            ],
            'works' => new DProjectWorkCollection($this->works),
            // 'e_signature_credentials' => $this->getEsignatureCredentials($visits),
            // 'steps' => $this->checkAuthorizedStep($this)
            'project_type' => $this->project_type,
        ];
    }

    public function collectionItems()
    {
        $operation = 1;
        $user = auth()->user();
        if ($user->profile == DCompanyProfile::INS->value) {
            $operation = 3;
        } elseif ($user->profile == DCompanyProfile::AUD->value) {
            $operation = 2;
        }

        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,
            'reference' => $this->reference,
            'status' => $this->status,
            'state' => $this->state,
            'type_demande_project' => $this->typeDemandeProject?->entitled,
            'number_of_floors' => $this->number_of_floors,
            'income_class' => $this->income_class,
            'complement' => $this->complement,
            'address' => $this->address,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'batiment' => $this->batiment,
            'floor' => $this->floor,
            'stairs' => $this->stairs,
            'door' => $this->door,
            'zip_code' => $this->zip_code,
            'isolated_surface' => $this->isolated_surface,
            'city' => $this->city,
            'common' => $this->common,
            'number_and_street' => $this->number_and_street,
            'total_number_occupants' => $this->total_number_occupants,
            'number_of_children' => $this->number_of_children,
            'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            'number_of_dependent_children' => $this->number_of_dependent_children,
            'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            'd_client_id' => $this->d_client_id,
            'd_company_id' => $this->d_company_id,
            'current_step_order' => $this->current_step_order,
            'cleared_step_order' => $this->cleared_step_order,
            'phase' => $this->phase,
            'process_ended' => $this->process_ended,
            'cost_ht_simulation' => $this->cost_ht_simulation,
            'cost_ttc_simulation' => $this->cost_ttc_simulation,
            'rest_ht_simulation' => $this->rest_ht_simulation,
            'rest_ttc_simulation' => $this->rest_ttc_simulation,
            'cost_ht_offre' => $this->cost_ht_offre,
            'cost_ttc_offre' => $this->cost_ttc_offre,
            'rest_ht_offre' => $this->rest_ht_offre,
            'rest_ttc_offre' => $this->rest_ttc_offre,
            'date_audit' => $this->date_audit,
            'audit_identifier' => $this->audit_identifier,
            'primary_energy_before_work' => $this->primary_energy_before_work,
            'final_energy_before_work' => $this->final_energy_before_work,
            'gaz_emission_before_work' => $this->gaz_emission_before_work,
            'performance_energy_before_work' => $this->performance_energy_before_work,
            'surface_housing_before_work' => $this->surface_housing_before_work,
            'scenario' => $this->scenario,
            'primary_energy_after_work' => $this->primary_energy_after_work,
            'final_energy_after_work' => $this->final_energy_after_work,
            'gaz_emission_after_work' => $this->gaz_emission_after_work,
            'performance_energy_after_work' => $this->performance_energy_after_work,
            'surface_housing_after_work' => $this->surface_housing_after_work,
            'class_skip_type' => $this->skipClass?->entitled,
            'class_skip' => $this->class_skip,
            'process' => $this->process,
            'anah_folder' => $this->anahFolder(),
            'isEditable' => $this->isEditable(),
            'merge_agent' => $this->merge_agent,
            'nature_residence' => $this->nature_residence,
            'work_commun_parts' => $this->work_commun_parts,
            'more_than_fifteen' => $this->more_than_fifteen,
            'logement_date_creation' => $this->logement_date_creation,
            'ptz_beneficiary' => $this->ptz_beneficiary,
            'auto_rehabilitation' => $this->auto_rehabilitation,
            'energy_consumption_before' => $this->energy_consumption_before,
            'energy_consumption_after' => $this->energy_consumption_after,
            'work_description' => $this->work_description,
            'company_creator' => auth()->user()->profile == DCompanyProfile::AUD->value ? $this->company->trade_name : $this->creator->company?->trade_name,
            'is_third_party' => $this->is_third_party,
            'funding_mar' => $this->funding_mar,
            'isolated_surface_value' => $this->isolated_surface_value,
            'ceiling_height' => $this->ceiling_height,
            'has_auditor_mar' => $this->has_auditor_mar,
            'has_agent' => $this->has_agent,
            'decisions' => $this->decisions,
            'client' => $this->client,
            'project_income_class' => $this->projectIncomeClass,
            'project_energy_class' => $this->projectEnergyClass,
            'step' => $this->currentStep(),
            'invoice_mar' => $this->invoice_mar,
            'invoice_installer' => $this->invoice_installer,
            'project_billed' => $this->operations->where('p_operation_id', $operation)->first()?->is_billed,
            'class_skip_number' => $this->class_skip_number,
            'created_at' => $this->created_at,
            'installer_trade_name' => $this->installer_company?->trade_name,
            'project_type' => $this->project_type,
        ];
    }

    public function getInvoices()
    {
        $references = collect($this->invoices)->mapWithKeys(function ($invoice) {
            return ['reference_' . strtolower($invoice?->company?->profile) => $invoice?->reference];
        });

        return $references->all();
    }

    protected function lazyLoadStepDocuments($user)
    {
        $typesFromStepDocuments = $this->stepDocuments->pluck('type_doc')->toArray();
        if ($user->profile == DCompanyProfile::INS->value) {
            $typesFromStepDocuments = $this->clearedStepDocuments->pluck('type_doc')->toArray();
            if ($this->cleared_step_order == PStepOrder::StepDesignationAgent->value) {
                $typesFromStepDocuments = $this->StepSevenDocumentTypes();
            }
        }
        $additionalTypes = [
            PDocumentType::CERFA16089_02_MANDAT_GENERAL->value,
            PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value,
            PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value
        ];
        // $documentsQuery = $this->documents->whereIn('type_doc', $typesFromStepDocuments);
        // if ($user->profile == DCompanyProfile::MAR->value && $this->current_step_order <= PStepOrder::StepDesignationAgent->value && $this->current_step_order >= PStepOrder::StepValidationDocumentsBeforeVisit->value) {
        $allTypes = array_merge($typesFromStepDocuments, $additionalTypes);
        $documentsQuery = $this->documents->whereIn('type_doc', $allTypes);
        // }
        $documents = $documentsQuery->all();
        if (!in_array($this->current_step_order, [PStepOrder::StepFillShuttleCard->value, PStepOrder::StepAppointmentMarAndTech->value])) {
            $documents = collect($documents)->reject(function ($document) use ($additionalTypes) {
                if (
                    in_array($document->type_doc, $additionalTypes)
                ) {
                    return true;
                }
                return false;
            });
        }
        $documents = collect($documents)->reject(function ($document) use ($additionalTypes) {
            if (
                $this->income_class < DProjectIncomeClassEnum::INTERMEDIARE->value
                && in_array($document->type_doc, $additionalTypes)
            ) {
                return true;
            } elseif (
                $this->income_class >= DProjectIncomeClassEnum::INTERMEDIARE->value
                && $this->income_class != DProjectIncomeClassEnum::AUCUN->value
                && $document->type_doc == PDocumentType::MONDAT_CERFA->value
            ) {
                return true;
            }
            return false;
        });
        $authorizedDocuments = [];
        $statuses = PStatusDoc::all();
        foreach ($documents as $document) {
            $pDocument = $document->pDocument;
            if (!$pDocument) {
                continue;
            }


            if (
                !$document->pDocument
                || ($user->hasAnyDirectPermission($document->pDocument->permissions)
                    && canViewDocument($this, $document->pDocument?->type, $user))
            ) {
                $document->editable = canEditDocument($this, $document->pDocument?->type, $user);
                $pStatusDoc = $statuses->where('status', $document->status)->first();

                $companyDoc = $user->company->projectDocs->where(
                    'type',
                    $pDocument?->type
                )->first();
                $natureIndex = $companyDoc?->pivot?->nature_doc;
                $natureIndex = $document?->nature_doc;
                $natureArray = $pStatusDoc?->entitled;
                $color = $pStatusDoc?->color;
                $signature = $document->pDocument?->signature;
                if ($document->type_doc == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value && $this->installer_company->quotation_interne == 0) {
                    $natureIndex = PNatureDocEnum::ATTACHED->value;
                }
                $natureIndexCopy = $natureIndex;
                if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value || $natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                    $signature = 1;
                }
                if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value) {
                    $natureIndexCopy = PNatureDocEnum::GENERATED_WITH_FORM->value;
                }
                if ($natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                    $natureIndexCopy = PNatureDocEnum::GENERATED->value;
                }
                $marCompanyDoc = $this->company->projectDocs->where(
                    'type',
                    $pDocument?->type
                )->first();

                if ($this->installer_company) {
                    $docuSignature = $this->installer_company?->signature_interne == 1 ? 0 : $marCompanyDoc?->pivot?->signature;
                }
                $authorizedDocuments[] = [
                    'id' => $document->id,
                    'entitled' => $document->pDocument?->entitled,
                    'order_step' => $document->order_step,
                    'name' => $document->name,
                    'editable' => $document->editable,
                    'required' => $document->required,
                    'new' => $document->new,
                    'status' => $document->status,
                    'reference' => $document->pDocument?->reference,
                    'type' => $document->pDocument?->type,
                    'signature' => $signature,
                    'docu_signature' => $docuSignature ?? null,
                    'downloadable' => $document->pDocument?->downloadable,
                    'nature' => $natureIndexCopy,
                    'nature_color' => $color,
                    'status_entitled' => $natureArray[$natureIndex] ?? null,
                    'p_document_id' => $document->p_document_id,
                    'exported' => $document->exported,
                    'count_signature' => $document->count_signature,
                ];
            }
        }

        return $authorizedDocuments;
    }

    protected function lazyLoadClavisDocuments($user)
    {
        $documents = DProjectDocument::where('d_project_id', $this->id)->where('exported', 1)->get();
        $authorizedDocuments = [];
        $statuses = PStatusDoc::all();
        foreach ($documents as $document) {
            $pDocument = $document->pDocument;
            if (!$pDocument || ($document->type_doc === 16  && $document->d_company_id === null)) {
                continue;
            }


            if (
                !$document->pDocument
                || ($user->hasAnyDirectPermission($document->pDocument->permissions)
                    && canViewDocument($this, $document->pDocument?->type, $user))
            ) {
                $document->editable = canEditDocument($this, $document->pDocument?->type, $user);
                $pStatusDoc = $statuses->where('status', $document->status)->first();

                $companyDoc = $user->company->projectDocs->where(
                    'type',
                    $pDocument?->type
                )->first();
                $natureIndex = $companyDoc?->pivot?->nature_doc;
                $natureIndex = $document?->nature_doc;
                $natureArray = $pStatusDoc?->entitled;
                $color = $pStatusDoc?->color;
                $signature = $document->pDocument?->signature;
                if ($document->type_doc == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value && $this->installer_company->quotation_interne == 0) {
                    $natureIndex = PNatureDocEnum::ATTACHED->value;
                }
                $natureIndexCopy = $natureIndex;
                if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value || $natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                    $signature = 1;
                }
                if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value) {
                    $natureIndexCopy = PNatureDocEnum::GENERATED_WITH_FORM->value;
                }
                if ($natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                    $natureIndexCopy = PNatureDocEnum::GENERATED->value;
                }
                $marCompanyDoc = $this->company->projectDocs->where(
                    'type',
                    $pDocument?->type
                )->first();

                if ($this->installer_company) {
                    $docuSignature = $this->installer_company?->signature_interne == 1 ? 0 : $marCompanyDoc?->pivot?->signature;
                }
                $authorizedDocuments[] = [
                    'id' => $document->id,
                    'entitled' => $document->pDocument?->entitled,
                    'order_step' => $document->order_step,
                    'name' => $document->name,
                    'editable' => $document->editable,
                    'required' => $document->required,
                    'new' => $document->new,
                    'status' => $document->status,
                    'reference' => $document->pDocument?->reference,
                    'type' => $document->pDocument?->type,
                    'signature' => $signature,
                    'docu_signature' => $docuSignature ?? null,
                    'downloadable' => $document->pDocument?->downloadable,
                    'nature' => $natureIndexCopy,
                    'nature_color' => $color,
                    'status_entitled' => $natureArray[$natureIndex] ?? null,
                    'p_document_id' => $document->p_document_id,
                    'exported' => $document->exported,
                    'count_signature' => $document->count_signature,
                ];
            }
        }

        return $authorizedDocuments;
    }

    protected function StepSevenDocumentTypes()
    {
        $arrayOfTypes = [
            PDocumentType::PRECONISATION->value,
            PDocumentType::RELEVE_AUDIT->value,
            PDocumentType::SYNTHESE_GRILLE_D_ANALYSE_DU_LOGEMENT->value,
            PDocumentType::GRILLE_D_ANALYSE_DU_LOGEMENT->value,
            PDocumentType::AUDIT_ENERGETIQUE->value,
        ];
        return $this->clearedStepDocuments->whereIn('type_doc', $arrayOfTypes)->pluck('type_doc')->toArray();
    }

    protected function checkAuthorizedStep($dProject)
    {
        $user = auth()->user();
        $permissions = collect(permissionsByResource($user, 'steps'))
            ->where('authorized', true)
            ->values()
            ->pluck('name')
            ->toArray();

        return PStep::where('process_type', $dProject->process)
            ->where('display', true)
            ->get()
            ->map(function ($step) use ($permissions) {
                return [
                    'id' => $step->id,
                    'reference' => $step->reference,
                    'step' => $step->display_name,
                    'authorized' => in_array($step->permission, $permissions),
                ];
            })
            ->all();
    }

    protected function checkAuthorizedNextStep($dProject)
    {
        if ($dProject->process_ended) {
            return false;
        }

        return canAccessProject(
            $dProject,
            auth()->user(),
            $dProject->next_step->permission
        );
    }

    public function getOccupants()
    {
        $data = [];

        $this->occupants->each(function ($occupant) use (&$data) {
            $data[] = [
                'd_project_id' => $occupant->d_project_id,
                'civility' => $occupant->civility == DClientGender::Male->value ? 'Monsieur' : 'Madame',
                'first_name' => $occupant->first_name,
                'last_name' => $occupant->last_name,
                'year_of_birth' => $occupant->year_of_birth,
            ];
        });

        return $data;
    }

    protected function getAuthorizedDocuments($dProject, $statues)
    {
        $user = auth()->user();
        $documents = [];
        $projectDocuments = $dProject->documents;

        $typesFromStepDocuments = $this->stepDocuments->pluck('type_doc')->toArray();
        $additionalTypes = [
            PDocumentType::CERFA16089_02_MANDAT_GENERAL->value,
            PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value,
            PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value
        ];
        $documentsQuery = $this->documents->whereIn('type_doc', $typesFromStepDocuments);
        if ($user->profile == DCompanyProfile::MAR->value) {
            $allTypes = array_merge($typesFromStepDocuments, $additionalTypes);
            $documentsQuery = $this->documents->whereIn('type_doc', array_merge($allTypes));
        }
        $projectDocuments = collect($projectDocuments)->reject(function ($document) use ($additionalTypes) {
            if (
                $this->income_class < DProjectIncomeClassEnum::INTERMEDIARE->value
                && in_array($document->type_doc, $additionalTypes)
            ) {
                return true;
            } elseif (
                $this->income_class >= DProjectIncomeClassEnum::INTERMEDIARE->value
                && $this->income_class != DProjectIncomeClassEnum::AUCUN->value
                && $document->type_doc == PDocumentType::MONDAT_CERFA->value
            ) {
                return true;
            }
            return false;
        });
        // $projectDocuments = collect($projectDocuments)->reject(function ($document) use($additionalTypes) {
        //     if (
        //         in_array($document->type_doc, $additionalTypes)
        //      ) {
        //          return true;
        //      }
        //      return false;
        //  });
        foreach ($projectDocuments as $document) {
            $pDocument = $document->pDocument;
            $pStatusDoc = $statues->where('status', $document->status)->first();
            $companyDoc = $user->company->projectDocs->where(
                'type',
                $pDocument?->type
            )->first();
            $natureIndex = $companyDoc?->pivot?->nature_doc;

            if ($document->type_doc === null) {
                $natureIndex = null;
            }
            if ($document->type_doc == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value && $this->installer_company->quotation_interne == 0) {
                $natureIndex = PNatureDocEnum::ATTACHED->value;
            }
            $natureArray = $pStatusDoc?->entitled;
            $natureIndexCopy = $natureIndex;
            $signature = $document->pDocument?->signature;
            if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value || $natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                $signature = 1;
            }
            if ($natureIndex == PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value) {
                $natureIndexCopy = PNatureDocEnum::GENERATED_WITH_FORM->value;
            }
            if ($natureIndex == PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value) {
                $natureIndexCopy = PNatureDocEnum::GENERATED->value;
            }
            $color = $pStatusDoc?->color;
            if (
                $pDocument && $user->hasAnyDirectPermission($document->pDocument->permissions)
                && canViewDocument($this, $document->pDocument->type, $user)
            ) {


                $document->editable = canEditDocument(
                    $this,
                    $pDocument?->type,
                    $user
                );
                $marCompanyDoc = $this->company->projectDocs->where(
                    'type',
                    $pDocument?->type
                )->first();
                if ($this->installer_company) {
                    $docuSignature = $this->installer_company?->signature_interne == 1 ? 0 : $marCompanyDoc?->pivot?->signature;
                }
                $documents[] = [
                    'id' => $document->id,
                    'entitled' => $document->pDocument?->entitled,
                    'order_step' => $document->order_step,
                    'name' => $document->name,
                    'editable' => $document->editable,
                    'required' => $document->required,
                    'signature' => $signature,
                    'status' => $document->status,
                    'new' => $document->new,
                    'docu_signature' => $docuSignature ?? null,
                    'd_work_id' => $document->d_work_id,
                    'reference' => $document->pDocument?->reference,
                    'type' => $document->type_doc,
                    'downloadable' => $document->pDocument?->downloadable,
                    'nature' => $natureIndexCopy,
                    'status_entitled' => $natureArray[$natureIndex] ?? null,
                    'nature_color' => $color,
                    'exported' => $document->exported,
                    'versions' => $document->versions,
                    'count_signature' => $document->count_signature,
                    // 'nature' => $document->getNatureFromStatusDocAttribute(),
                ];
            } elseif (!$pDocument) {
                $document->editable = true;
                $documents[] = [
                    'id' => $document->id,
                    'entitled' => $document->name,
                    'order_step' => $document->order_step,
                    'name' => $document->name,
                    'editable' => $document->editable,
                    'required' => $document->required,
                    'status' => $document->status,
                    'new' => $document->new,
                    'd_work_id' => $document->d_work_id,
                    'reference' => null,
                    'type_doc' => $document->type_doc,
                    'downloadable' => $document->pDocument?->downloadable,
                    'nature' => $natureIndex,
                    'status_entitled' => $natureArray[$natureIndex] ?? null,
                    'nature_color' => $color,
                    'exported' => $document->exported,
                    'versions' => $document->versions,
                ];
            }
        }

        return $documents;
    }

    public function onlyInvoices()
    {
        return [
            'id' => $this->id,
            "contractReference" => $this->contractReference,
            'reference' => $this->reference,
            'entitled' => $this->entitled,
            'status' => $this->status,
            'state' => $this->state,
            'invoices' => $this->invoices->map(function ($invoice) {
                return [
                    'id' => $invoice->id,
                    'reference' => $invoice->reference,
                    'state' => $invoice->state,
                    'is_billed' => $invoice->is_billed,
                    'invoice_date' => $invoice->invoice_date,
                    'type' => $invoice->type,
                    'HT_total' => $invoice->HT_total,
                    'TVA_total' => $invoice->TVA_total,
                    'TTC_total' => $invoice->TTC_total,
                    'TTC_rest' => $invoice->TTC_rest,
                    'TVA_rest' => $invoice->TVA_rest,
                    'HT_rest' => $invoice->HT_rest,
                ];
            }),
        ];
    }

    public function canAccessSpecificDocument($pDocument, $operation, $user)
    {
        if (!$operation) {
            return true;
        }
        $operationIds = $pDocument->operations
            ->pluck('p_operation_id')->toArray();
        // dd($operationIds);
        $hasOperationCompany = $operation->d_company_id == $user->userable_id;
        $hasDocuments = in_array($operation->operation->id, $operationIds);

        $canAccessByCompany = $hasDocuments && $hasOperationCompany;

        return $canAccessByCompany || !count($operationIds);
    }

    protected function checkAuthorizedPrevStep($dProject)
    {
        if ($dProject->process_ended) {
            return false;
        }

        return canAccessProject(
            $dProject,
            auth()->user(),
            $dProject?->prev_step?->permission
        );
    }

    public function missingDocuments($statues)
    {
        $user = auth()->user();

        $authorizedDocuments = [];
        $documents = $this->documents->where(
            'required',
            1
        )->where('order_step', '<=', PStepOrder::StepAttachmentsOfVerifications->value);

        foreach ($documents as $document) {
            $pDocument = $document->pDocument;
            if (
                $document->pDocument
                && $user->hasAnyDirectPermission($pDocument->permissions)
                && $document->status != DProjectDocumentStatus::SATISFIED->value
            ) {
                $this->addDocument(
                    $document,
                    $statues,
                    $pDocument,
                    $user,
                    $authorizedDocuments
                );
            }
        }

        return $authorizedDocuments;
    }

    public function currentStep()
    {
        return [
            'reference' => $this->step?->reference,
            'display_name' => $this->step?->display_name,
            'id' => $this->step?->id,
            'order' => $this->step?->order,
            'decision' => $this->step?->decision,
            'init_state_message' => $this->step?->init_state_message,
            'final_state_message' => $this->step?->final_state_message,
            'next_entitled_btn' => $this->step?->next_entitled_btn,
            'cancel_entitled_btn' => $this->step?->cancel_entitled_btn,
        ];
    }
    public function clearedStep()
    {
        return [
            'reference' => $this->clearedStepOrder?->reference,
            'display_name' => $this->clearedStepOrder?->display_name,
            'id' => $this->clearedStepOrder?->id,
            'order' => $this->clearedStepOrder?->order,
            'decision' => $this->clearedStepOrder?->decision,
            'init_state_message' => $this->clearedStepOrder?->init_state_message,
            'final_state_message' => $this->clearedStepOrder?->final_state_message,
            'next_entitled_btn' => $this->clearedStepOrder?->next_entitled_btn,
            'cancel_entitled_btn' => $this->clearedStepOrder?->cancel_entitled_btn,
        ];
    }

    public function keyDocuments($statues)
    {
        if ($this->current_step_order != 15) {
            return [];
        }
        $user = auth()->user();

        $authorizedDocuments = [];
        $documents = $this->documents->where('exported', 1)->where('required', 1);

        foreach ($documents as $document) {
            $pDocument = $document->pDocument;
            if (
                $pDocument
                && ($user->hasAnyDirectPermission($document->pDocument->permissions)
                    && canViewDocument($this, $document->pDocument?->type, $user))
            ) {
                $this->addDocument(
                    $document,
                    $statues,
                    $pDocument,
                    $user,
                    $authorizedDocuments
                );
            }
        }

        return $authorizedDocuments;
    }

    public function addDocument(
        $document,
        $statues,
        $pDocument,
        $user,
        &$authorizedDocuments
    ) {
        $document->editable = canEditDocument(
            $this,
            $document->pDocument?->type,
            $user
        );

        $pStatusDoc = $statues->where('status', $document->status)->first();
        $natureIndex = $pDocument?->nature_doc;
        $natureArray = $pStatusDoc?->entitled;
        $color = $pStatusDoc->color;
        $authorizedDocuments[] = [
            'id' => $document->id,
            'entitled' => $document->pDocument?->entitled,
            'order_step' => $document->order_step,
            'name' => $document->name,
            'editable' => $document->editable,
            'required' => $document->required,
            'status' => $document->status,
            'reference' => $document->pDocument?->reference,
            'type' => $document->pDocument?->type,
            'signature' => $document->pDocument?->signature,
            'docu_signature' => $document->pDocument?->docu_signature,
            'downloadable' => $document->pDocument?->downloadable,
            'nature' => $natureIndex,
            'nature_color' => $color,
            'status_entitled' => $natureArray[$natureIndex] ?? null,
            'p_document_id' => $document->p_document_id,
            'exported' => $document->exported,
            'count_signature' => $document->count_signature,
        ];
    }

    public function anahFolder()
    {
        $editable = true;
        // $mandatGeneral = $this->documents->where('type_doc', 37)->first();
        // $mandatAdmin = $this->documents->where('type_doc', 23)->first();
        // $mandatFinan = $this->documents->where('type_doc', 35)->first();
        // if ($mandatGeneral?->status == DProjectDocumentStatus::SATISFIED->value) {
        //     $editable = false;
        // }
        // if ($mandatAdmin?->status == DProjectDocumentStatus::SATISFIED->value) {
        //     $editable = false;
        // }
        // if ($mandatFinan?->status == DProjectDocumentStatus::SATISFIED->value) {
        //     $editable = false;
        // }
        if ($this->cleared_step_order > 9) {
            $editable = false;
        }

        return [
            'editable' => $editable,
            'anah_folder' => $this->anah_folder,
        ];
    }

    public function isEditable()
    {
        $editable = false;
        if ($this->cleared_step_order < 10 || ($this->cleared_step_order == 10 && $this->anah_first_depot_response_state == DProjectAnahResponseEnum::EDITED->value)) {
            $editable = true;
        }

        return !$editable;
    }

    public function getEsignatureCredentials($visits)
    {
        $visit = $visits->where('type', 0)->first();

        return [
            'email' => $this->latestESignature->email ?? $visit?->user?->email,
            'phone_number' => $this->latestESignature->phone_number ?? $this->client?->phone_number_1,
        ];
    }
}
