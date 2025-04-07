<?php

namespace App\Http\Resources\DProjectResources;

use App\Enums\DClientEnum\DClientGender;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\PDocumentEnum\PDocumentNatureType;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\PStepEnum\PStepOrder;
use App\Http\Resources\DProjectVisitResources\DProjectVisitCollection;
use App\Http\Resources\DProjectWorkResources\DProjectWorkCollection;
use App\Models\DCompany;
use App\Models\PStatusDoc;
use App\Models\PStep;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DProjectResourcePublic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request, $token = null): array
    {
        $company = DCompany::where('linkToken', $token)->first();

        if (!$request->segment(3)) {
            return $this->collectionItems($company);
        }
        if ($request->segment(3) == 'all-invoices') {
            return $this->onlyInvoices();
        }

        return $this->returnData($company);

    }

    public function getVisits($company)
    {
        $visits = $this->visits;
        return new DProjectVisitCollection($visits->where('d_company_id', $$company->id));

    }

    public function returnData($company)
    {
        $company = $this->company;
        $client = $this->client;
        return [
            'id' => $this->id,
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
            // 'step_documents' => $this->lazyLoadStepDocuments($company),
            'works' => new DProjectWorkCollection($this->works),
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
                'date_of_birth' => $client->date_of_birth,
                'iban' => $client->iban,
                'rib' => $client->rib,
            ],

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
            'eco_loan_stopped_thirty_mars' => $this->eco_loan_stopped_thirty_mars,
            'renovation_advance_loan_seventeen_december' => $this->renovation_advance_loan_seventeen_december,
            'other_description_of_remainder_payable' => $this->other_description_of_remainder_payable,
            'project_nature' => $this->project_nature,
            'project_residence' => $this->projectResidence,
            'work_type' => $this->work_type,

            'gain_energy' => $this->gain_energy,
            'total_cost_energy_audit' => $this->total_cost_energy_audit,
            'dpe_before' => $this->dpe_before,
            'dpe_after' => $this->dpe_after,
            'natureResidence' => $this->natureResidence,
            'workType' => $this->workType,
            'consistency_of_work_scenarios_checked' => $this->consistency_of_work_scenarios_checked,
            'reception_is_pronounced' => $this->reception_is_pronounced,
            'description_reception_is_pronounced' => $this->description_reception_is_pronounced,
            'work_planned_start' => $this->work_planned_start,
            'work_actual_start' => $this->work_actual_start,
            'work_planned_end' => $this->work_planned_end,
            'work_actual_end' => $this->work_actual_end,

        ];
    }




    public function collectionItems($company)
    {
        $operation = 1;
        if ($company->profile == DCompanyProfile::INS->value) {
            $operation = 3;
        } elseif ($company->profile == DCompanyProfile::AUD->value) {
            $operation = 2;
        }

        return [
            'id' => $this->id,
            'reference' => $this->reference,
            // 'status' => $this->status,
            // 'state' => $this->state,
            // 'type_demande_project' => $this->typeDemandeProject?->entitled,
            // 'number_of_floors' => $this->number_of_floors,
            // 'income_class' => $this->income_class,
            // 'complement' => $this->complement,
            // 'address' => $this->address,
            // 'house_number' => $this->house_number,
            // 'street' => $this->street,
            // 'batiment' => $this->batiment,
            // 'floor' => $this->floor,
            // 'stairs' => $this->stairs,
            // 'door' => $this->door,
            // 'zip_code' => $this->zip_code,
            // 'isolated_surface' => $this->isolated_surface,
            // 'city' => $this->city,
            // 'common' => $this->common,
            // 'number_and_street' => $this->number_and_street,
            // 'total_number_occupants' => $this->total_number_occupants,
            // 'number_of_children' => $this->number_of_children,
            // 'sum_revenue_reference_1' => $this->sum_revenue_reference_1,
            // 'year_of_sum_revenue_reference_1' => $this->year_of_sum_revenue_reference_1,
            // 'work_load_for_low_income_owners' => $this->work_load_for_low_income_owners,
            // 'free_hosting_for_low_income_household' => $this->free_hosting_for_low_income_household,
            // 'number_of_residents_under_your_roof' => $this->number_of_residents_under_your_roof,
            // 'number_of_dependent_children' => $this->number_of_dependent_children,
            // 'sum_revenue_reference_2' => $this->sum_revenue_reference_2,
            // 'year_of_sum_revenue_reference_2' => $this->year_of_sum_revenue_reference_2,
            // 'd_client_id' => $this->d_client_id,
            // 'd_company_id' => $this->d_company_id,
            // 'current_step_order' => $this->current_step_order,
            // 'cleared_step_order' => $this->cleared_step_order,
            // 'phase' => $this->phase,
            // 'process_ended' => $this->process_ended,
            // 'cost_ht_simulation' => $this->cost_ht_simulation,
            // 'cost_ttc_simulation' => $this->cost_ttc_simulation,
            // 'rest_ht_simulation' => $this->rest_ht_simulation,
            // 'rest_ttc_simulation' => $this->rest_ttc_simulation,
            // 'cost_ht_offre' => $this->cost_ht_offre,
            // 'cost_ttc_offre' => $this->cost_ttc_offre,
            // 'rest_ht_offre' => $this->rest_ht_offre,
            // 'rest_ttc_offre' => $this->rest_ttc_offre,
            // 'date_audit' => $this->date_audit,
            // 'audit_identifier' => $this->audit_identifier,
            // 'primary_energy_before_work' => $this->primary_energy_before_work,
            // 'final_energy_before_work' => $this->final_energy_before_work,
            // 'gaz_emission_before_work' => $this->gaz_emission_before_work,
            // 'performance_energy_before_work' => $this->performance_energy_before_work,
            // 'surface_housing_before_work' => $this->surface_housing_before_work,
            // 'scenario' => $this->scenario,
            // 'primary_energy_after_work' => $this->primary_energy_after_work,
            // 'final_energy_after_work' => $this->final_energy_after_work,
            // 'gaz_emission_after_work' => $this->gaz_emission_after_work,
            // 'performance_energy_after_work' => $this->performance_energy_after_work,
            // 'surface_housing_after_work' => $this->surface_housing_after_work,
            // 'class_skip_type' => $this->skipClass?->entitled,
            // 'class_skip' => $this->class_skip,
            // 'process' => $this->process,
            // 'anah_folder' => $this->anahFolder(),
            // 'merge_agent' => $this->merge_agent,
            // 'nature_residence' => $this->nature_residence,
            // 'work_commun_parts' => $this->work_commun_parts,
            // 'more_than_fifteen' => $this->more_than_fifteen,
            // 'logement_date_creation' => $this->logement_date_creation,
            // 'ptz_beneficiary' => $this->ptz_beneficiary,
            // 'auto_rehabilitation' => $this->auto_rehabilitation,
            // 'energy_consumption_before' => $this->energy_consumption_before,
            // 'energy_consumption_after' => $this->energy_consumption_after,
            // 'work_description' => $this->work_description,
            // 'company_creator' => $company->profile == DCompanyProfile::AUD->value ? $this->company->trade_name : $this->creator->company?->trade_name,
            // 'is_third_party' => $this->is_third_party,
            // 'funding_mar' => $this->funding_mar,
            // 'isolated_surface_value' => $this->isolated_surface_value,
            // 'ceiling_height' => $this->ceiling_height,
            // 'has_auditor_mar' => $this->has_auditor_mar,
            // 'has_agent' => $this->has_agent,
            // 'decisions' => $this->decisions,
            // 'client' => $this->client,
            // 'project_income_class' => $this->projectIncomeClass,
            // 'project_energy_class' => $this->projectEnergyClass,
            // // 'step' => $this->currentStep(),
            // 'invoice_mar' => $this->invoice_mar,
            // 'invoice_installer' => $this->invoice_installer,
            // 'project_billed' => $this->operations->where('p_operation_id', $operation)->first()?->is_billed,
            // 'class_skip_number' => $this->class_skip_number,
            // 'created_at' => $this->created_at,
            // 'installer_trade_name' => $this->installer_company?->trade_name
        ];
    }

    public function getInvoices()
    {
        $references = collect($this->invoices)->mapWithKeys(function ($invoice) {
            return ['reference_' . strtolower($invoice?->company?->profile) => $invoice?->reference];
        });

        return $references->all();
    }

    protected function lazyLoadStepDocuments($company)
    {
        $typesFromStepDocuments = $this->stepDocuments->pluck('type_doc')->toArray();
        if ($company->profile == DCompanyProfile::INS->value) {
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

            ) {
                $document->editable = true;
                $pStatusDoc = $statuses->where('status', $document->status)->first();

                $companyDoc = $company->projectDocs->where(
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


    public function onlyInvoices()
    {
        return [
            'id' => $this->id,
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
    public function anahFolder()
    {
        $editable = true;

        if ($this->current_step_order > 12) {
            $editable = false;
        }

        return [
            'editable' => $editable,
            'anah_folder' => $this->anah_folder,
        ];
    }


}
