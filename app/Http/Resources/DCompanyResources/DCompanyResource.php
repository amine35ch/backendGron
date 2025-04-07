<?php

namespace App\Http\Resources\DCompanyResources;

use App\Enums\DClientEnum\DClientGender;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Http\Resources\DInvoiceReferenceResources\DInvoiceReferenceResource;
use App\Services\DCompanyServices\DCompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $companyService = new DCompanyService();
        if (!$request->segment(4)) {
            return $this->collectionItems($request, $companyService, $user);
        }
        $data = [];
        if ($this->profile == DCompanyProfile::INS->value) {
            $data['STT'] = $this->childCompany;
        }

        return [
            'id' => $this->id,
            'selfCheckIn' => $this->selfCheckIn,
            'linkToken' => $this->linkToken,
            'reference' => $this->reference,
            'code' => $this->code,
            'email' => $this->email,
            'email_two' => $this->email_two,
            'num_rge' => $this->num_rge,
            'num_decennale' => $this->num_decennale,
            'siren' => $this->siren,
            'raison_social' => $this->raison_social,
            'date_expiration_rge' => $this->date_expiration_rge,
            'phone_number_1' => $this->phone_number_1,
            'phone_number_2' => $this->phone_number_2,
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'siret' => $this->siret,
            'state' => $this->state,
            'company_rcs' => $this->company_rcs,
            'profile' => $this->profile,
            'icon' => $this->profileData->icon,
            'project_count' => $this->when(!request()->is('web/settings/company'), $this->project_count),
            'project_number' => $this->project_count['total'],
            'tva' => $this->tva,
            'logo' => $this->logo,
            'identifiant_tva' => $this->identifiant_tva,
            'signature' => $this->signature,
            'approval_number' => $this->approval_number,
            'capital' => $this->capital,
            'num_ape' => $this->num_ape,
            'emissions_date_assurance' => $this->emissions_date_assurance,
            'end_date_assurance' => $this->end_date_assurance,
            'representative_last_name' => $this->representative_last_name,
            'representative_first_name' => $this->representative_first_name,
            'representative_gender' => $this->representative_gender,
            'default_pagination' => $this->default_pagination,
            'currency' => $this->currency,
            'decimals' => $this->decimals,
            'parent_company_id' => $this->parent_company_id,
            'works_responsibility' => $this->works_responsibility,
            'public_liability' => $this->public_liability,
            'position' => $this->position,
            'type_raison_sociale' => $this->raisonSociale,
            'website' => $this->website,
            'trade_name' => $this->trade_name,
            'docu_sign_token' => $this->docu_sign_token,
            'code_ape' => $this->code_ape,
            'operations' => $this->operations,
            'documents' => $this->documents,
            'insurance_address' => $this->insurance_address,
            'insurance_rcs' => $this->insurance_rcs,
            'insurance_capital' => $this->insurance_capital,
            'insurance_police' => $this->insurance_police,
            'download_logo' => $this->download_logo,
            'download_signature' => $this->download_signature,
            'size_documents' => $this->size_documents,
            'can_delete' => $companyService->canDelete($user, $this),
            'can_update' => $companyService->canUpdate($user, $this),
            'rges' => $this->rges,
            'max_projects_per_month' => $this->max_projects_per_month,
            'projects' => $this->when(!request()->is('web/settings/company'), $this->projects),
            'insurance_name' => $this->insurance_name,
            'insurance_date' => $this->insurance_date,
            'fiche_navette_interne' => $this->fiche_navette_interne,
            'signature_interne' => $this->signature_interne,
            'quotation_interne' => $this->quotation_interne,
        ] + $data;
    }

    public function collectionItems($request, $companyService, $user)
    {
        $parent = [
            'id' => $this->parentCompany?->id,
            'trade_name' => $this->parentCompany?->trade_name,
        ];
        if ($request->input('display') == 'short') {
            return [
                'id' => $this->id,
                'selfCheckIn' => $this->selfCheckIn,
                'reference' => $this->reference,
                'trade_name' => $this->trade_name,
                'email' => $this->email,
                'code' => $this->code,
                'num_rge' => $this->num_rge,
                'num_decennale' => $this->num_decennale,
                'siren' => $this->siren,
                'date_expiration_rge' => $this->date_expiration_rge,
                'phone_number_1' => $this->phone_number_1,
                'phone_number_2' => $this->phone_number_2,
                'address' => $this->address,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'siret' => $this->siret,
                'company_rcs' => $this->company_rcs,
                'state' => $this->state,
                'profile' => $this->profile,
                'icon' => $this->profileData->icon,
                'download_logo' => $this->download_logo,
                'download_signature' => $this->download_signature,
                'size_documents' => $this->size_documents,
                'max_projects_per_month' => $this->max_projects_per_month,

                'can_delete' => $companyService->canDelete($user, $this),
                'can_update' => $companyService->canUpdate($user, $this),
            ];
        }
        $invoiceReferences = DInvoiceReferenceResource::collection($this->invoiceReference);

        return [
            'id' => $this->id,
            'selfCheckIn' => $this->selfCheckIn,
            'reference' => $this->reference,
            'trade_name' => $this->trade_name,
            'code' => $this->code,
            'email' => $this->email,
            'company_rcs' => $this->company_rcs,
            'email_two' => $this->email_two,
            'num_rge' => $this->num_rge,
            'num_decennale' => $this->num_decennale,
            'siren' => $this->siren,
            'date_expiration_rge' => $this->date_expiration_rge,
            'phone_number_1' => $this->phone_number_1,
            'phone_number_2' => $this->phone_number_2,
            'address' => $this->address,
            'project_count' => $this->when(!request()->is('web/settings/company'), $this->project_count),
            'project_number' => $this->project_count['total'],
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'siret' => $this->siret,
            'state' => $this->state,
            'parent' => $parent,
            'profile' => $this->profile,
            'tva' => $this->tva,
            'logo' => $this->logo,
            'documents' => $this->documents,
            'identifiant_tva' => $this->identifiant_tva,
            'signature' => $this->signature,
            'docu_sign_token' => $this->docu_sign_token,
            'approval_number' => $this->approval_number,
            'num_ape' => $this->num_ape,
            'emissions_date_assurance' => $this->emissions_date_assurance,
            'end_date_assurance' => $this->end_date_assurance,
            'capital' => $this->capital,
            'representative_last_name' => $this->representative_last_name,
            'representative_first_name' => $this->representative_first_name,
            'representative_gender' => $this->representative_gender,
            'default_pagination' => $this->default_pagination,
            'currency' => $this->currency,
            'decimals' => $this->decimals,
            'parent_company_id' => $this->parent_company_id,
            'works_responsibility' => $this->works_responsibility,
            'public_liability' => $this->public_liability,
            'position' => $this->position,
            'type_raison_sociale' => $this->raisonSociale,
            'website' => $this->website,
            'code_ape' => $this->code_ape,
            'icon' => $this->profileData->icon,
            'invoice_reference' => $invoiceReferences,
            'download_logo' => $this->download_logo,
            'download_signature' => $this->download_signature,
            'insurance_address' => $this->insurance_address,
            'insurance_rcs' => $this->insurance_rcs,
            'insurance_capital' => $this->insurance_capital,
            'insurance_police' => $this->insurance_police,
            'can_delete' => $companyService->canDelete($user, $this),
            'can_update' => $companyService->canUpdate($user, $this),
            'rges' => $this->rges,

            'insurance_name' => $this->insurance_name,
            'insurance_date' => $this->insurance_date,
            'fiche_navette_interne' => $this->fiche_navette_interne,
            'signature_interne' => $this->signature_interne,
            'max_projects_per_month' => $this->max_projects_per_month,
            'projects' => $this->when(!request()->is('web/settings/company'), $this->projects),

        ];
    }
}
