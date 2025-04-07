<?php

namespace App\Traits;

use App\Enums\DClientEnum\DClientGender;
use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DProjectEnum\DProjectClassCountEnum;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Models\DProjectInvoiceHeader;
use App\Models\PMarScale;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait DocumentPlaceHolder
{
    public function generalDocumentData($dProject)
    {
        $company = $dProject->company;
        $client = $dProject->client;
        $signatureDate = \Carbon\Carbon::parse($dProject?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');
        return [
            'mar_name' => $company->trade_name,
            'mar_siret' => $company->siret,
            'mar_adress' => $company->address . ' ' . $company->zip_code . ' ' . $company->city,
            'mar_approval_number' => $company->approval_number,
            'mar_trade_name' => $company->trade_name,
            'first_name' => $client->first_name,
            'last_name' => $client->last_name,
            'date' => $signatureDate,
            'address' => $client->address . ' ' . $client->zip_code . ' ' . $client->city,
            'faitA' => $client->city,
        ];
    }

    public function contractData($dProject)
    {
        $company = $dProject->company;
        $client = $dProject->client;

        return [
            'logo_doc' => $this->baseImage(resource_path('images/logo_MAR.jpg')),
            'assurance_address' => $dProject->company->insurance_address,
            'assurance_capital' => number_format(round($dProject->company->insurance_capital, 2), 2, ',', ' '),
            'assurance_RCS' => $dProject->company->insurance_rcs,
            'assurance_police' => $dProject->company->insurance_police,
            'logo_contract' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/logo-mar-vert.png')),
            'client_name' => $client->first_name . ' ' . $client->last_name,
            'client_address' => $client->address . ', ' . $client->zip_code . ', ' . $client->city,
            'company_name' => $company->trade_name,
            'company_address' => $company->address . ', ' . $company->zip_code . ', ' . $company->city,
            'company_representative' => $company->representative_last_name . ' ' . $company->representative_first_name,
            'company_position' => $company->position,
            'company_approval_number' => $company->approval_number,
            'company_capital' => number_format(round($company->capital, 2), 2, ',', ' '),
            'company_currency' => $company->currency,
            'company_mail' => $company->email,
            'client_signature' => $client->signature ? $this->baseImage(storage_path('app/' . $client->signature)) : '',
            'date' => now()->format('d/m/Y'),
        ];
    }

    public function quotationData($dProject)
    {

        $client = $dProject->client;
        $company = $dProject->company;
        $auditVisit = $dProject->visits()->where('type', PTypeVisitEnum::VISIT_INSTALLER->value)->latest()->first();
        $invoiceInstaller = $dProject->invoices()->where('type', DInvoiceHeaderType::INSTALLER->value)->first();

        $invoiceList = $dProject->invoices
            ->where('type', \App\Enums\DInvoiceEnum\DInvoiceHeaderType::INSTALLER->value)
            ->all();

        // Initialize variables to hold all lines and HT/TTC calculation
        $allLines = [];
        $totalHT = 0;
        $totalTTC = 0;
        $lineCount = 0;

        // Loop through all invoices and their lines
        foreach ($invoiceList as $key => $invoice) {
            if ($invoice) {
                $invoice = $invoice->toArray();
                unset($invoice['company']);

                // Loop through each line in the invoice
                foreach ($invoice['lines'] as $item) {
                    // Add line to the allLines array, storing its HT and TTC values
                    $qty = $item['qty']; // or $item['amount_HT'] if needed
                    $amount_HT = $item['amount_HT']; // or $item['amount_HT'] if needed
                    $amount_TTC = $item['amount_TTC']; // or $item['amount_HT'] if needed
                    $htPrice = $item['unit_price_HT']; // or $item['amount_HT'] if needed
                    $ttcPrice = $item['unit_price_TTC']; // or $item['amount_TTC'] if needed

                    // Sum up the HT and TTC for overall calculation later
                    $totalHT += $amount_HT;
                    $totalTTC += $amount_TTC;
                    $lineCount++;

                    // Group the lines in allLines, use line ID as the key for grouping
                    if (!isset($allLines[$item['designation']])) {
                        // If this is the first time we encounter this line, add it to the array
                        $allLines[$item['designation']] = [
                            'id' => $item['id'],
                            'designation' => $item['designation'],
                            'unit_price_HT' => 0, // Initialize HT as 0 for now
                            'amount_HT' => 0, // Initialize HT as 0 for now
                            'amount_TTC' => 0, // Initialize HT as 0 for now
                            'unit_price_TTC' => 0, // Initialize TTC as 0 for now
                            'qty' => 0, // Initialize TTC as 0 for now
                            'line_count' => 0, // Initialize count to 0 for now
                        ];
                    }

                    // Add the HT and TTC prices to the line
                    $allLines[$item['designation']]['unit_price_HT'] += $htPrice;
                    $allLines[$item['designation']]['unit_price_TTC'] += $ttcPrice;
                    $allLines[$item['designation']]['amount_HT'] += $amount_HT;
                    $allLines[$item['designation']]['amount_TTC'] += $amount_TTC;
                    $allLines[$item['designation']]['qty'] += $qty;
                    $allLines[$item['designation']]['line_count']++; // Increment the line count
                }
            }
        }

        // Calculate the overall average HT and TTC for the final invoice
        $averageHT =  0;
        $averageTTC =  0;
        // Now calculate the average HT and TTC for each line
        foreach ($allLines as $key => $line) {
            // Calculate the average HT and TTC for each line
            $allLines[$key]['average_UHT'] = $line['unit_price_HT'] / $line['line_count'];
            $allLines[$key]['qty'] = $line['qty'] / $line['line_count'];
            $allLines[$key]['average_HT'] = $line['amount_HT'] / $line['line_count'];
            $allLines[$key]['average_TTC'] = $line['amount_TTC'] / $line['line_count'];
            // Calculate the overall average HT and TTC for the final invoice
            $averageHT += $line['amount_HT'] / $line['line_count'];
            $averageTTC += $line['amount_TTC'] / $line['line_count'];
        }


        // Create the final invoice with the new lines and their averages
        $finalInvoice = [
            'lines' => array_values($allLines),
        ];
        return [
            'date_realization_audit' => $dProject->date_audit ? date('d/m/Y', strtotime($dProject->date_audit)) : date('d/m/Y', strtotime($auditVisit->visit_date)),
            'audit_siret' => $dProject?->auditor?->company?->siret,
            'audit_mar_name' => $dProject?->auditor?->company?->trade_name,
            'auditor_name' => $dProject?->auditor?->company->trade_name,
            'scenario_retenu' => $dProject->scenario,
            'client_name' => $client->last_name . ' ' . $client->first_name,
            'number_and_street' => $dProject->house_number . ' ' . $dProject->street,
            'zip_code' => $dProject->zip_code,
            'city' => $dProject->city,
            'client_signature' => $client->signature ? $this->baseImage(storage_path('app/' . $client->signature)) : '',
            'mar_name' => $company->trade_name,
            'mar_signature' => $company->signature ?
                $this->baseImage(storage_path('app/' . $company->signature)) : '',
            'mar_siret' => $company->siret,
            'cost_ht' => number_format(round($totalHT, 2), 2, ',', ' '),
            'cost_ttc' => number_format(round($totalTTC, 2), 2, ',', ' '),
            'audit_identifier' => $dProject->audit_identifier,
            'raison_social' => $dProject->auditor?->company->trade_name,
            'primary_energy_before_work' => $dProject->primary_energy_before_work,
            'final_energy_before_work' => $dProject->final_energy_before_work,
            'gaz_emission_before_work' => $dProject->gaz_emission_before_work,
            'performance_energy_before_work' => $dProject->energyPerformanceBeforeWork?->entitled,
            'surface_housing_before_work' => $dProject->surface_housing_before_work,
            'primary_energy_after_work' => $dProject->primary_energy_after_work,
            'final_energy_after_work' => $dProject->final_energy_after_work,
            'gaz_emission_after_work' => $dProject->gaz_emission_after_work,
            'performance_energy_after_work' => $dProject->energyPerformanceAfterWork?->entitled,
            'surface_housing_after_work' => $dProject->surface_housing_after_work,
            'scenario_retained' => $dProject->scenario,
            'location_client' => $dProject->client->city,
            'date_signature_client' => now()->format('d/m/Y'),
            'location_mar' => $company->city,
            'date_signature_mar' => now()->format('d/m/Y'),
            'class_one' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_2->value ? 'checked' : '',
            'class_two' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_3->value ? 'checked' : '',
            'class_three' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_OVER_4->value ? 'checked' : '',

        ];
    }


    public function receptionReportData()
    {
        return [];
    }

    public function invoiceData($dProject)
    {
        $client = $dProject->client;
        $company = $dProject->company;
        $companyAuditor = $dProject->auditor?->company;
        $auditVisit = $dProject->visits()->where('type', PTypeVisitEnum::VISIT_INSTALLER->value)->latest()->first();

        return [
            'date_realization_audit' => $dProject->date_audit ? date('d/m/Y', strtotime($dProject->date_audit)) : date('d/m/Y', strtotime($auditVisit->visit_date)),
            'audit_siret' => $companyAuditor?->siret_without_space,
            'audit_mar_name' => $companyAuditor?->trade_name,
            'auditor_name' => $dProject->auditor?->company->trade_name,
            'client_name' => $client->first_name . ' ' . $client->last_name,
            'number_and_street' => $dProject->house_number . ' ' . $dProject->street,
            'zip_code' => $client->zip_code,
            'city' => $client->city,
            'client_signature' => $client->signature ? $this->baseImage(storage_path('app/' . $client->signature)) : '',
            'mar_name' => $company->trade_name,
            'mar_signature' => $company->signature ?
                $this->baseImage(storage_path('app/' . $company->signature)) : '',
            'mar_siret' => $company->siret_without_space,
            'cost_ht' => number_format(round($dProject->cost_ht_offre, 2), 2, ',', ' '),
            'cost_ttc' => number_format(round($dProject->cost_ttc_offre, 2), 2, ',', ' '),
            'audit_identifier' => $dProject->audit_identifier,
            'primary_energy_before_work' => $dProject->primary_energy_before_work,
            'final_energy_before_work' => $dProject->final_energy_before_work,
            'gaz_emission_before_work' => $dProject->gaz_emission_before_work,
            'performance_energy_before_work' => $dProject->energyPerformanceBeforeWork?->entitled,
            'surface_housing_before_work' => $dProject->surface_housing_before_work,
            'primary_energy_after_work' => $dProject->primary_energy_after_work,
            'final_energy_after_work' => $dProject->final_energy_after_work,
            'gaz_emission_after_work' => $dProject->gaz_emission_after_work,
            'performance_energy_after_work' => $dProject->energyPerformanceAfterWork?->entitled,
            'surface_housing_after_work' => $dProject->surface_housing_after_work,
            'scenario_retained' => $dProject->scenario,
            'location_client' => $dProject->client->city,
            'date_signature_client' => now()->format('d/m/Y'),
            'location_mar' => $company->city,
            'date_signature_mar' => now()->format('d/m/Y'),
            'class_one' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_2->value ? 'checked' : '',
            'class_two' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_3->value ? 'checked' : '',
            'class_three' => $dProject->class_skip
                == DProjectClassCountEnum::CLASS_OVER_4->value ? 'checked' : '',
        ];
    }

    public function baseImage($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function helpDemandData($dProject)
    {
        // $company = $dProject->company;
        $client = $dProject->client;
        $client_year = date('Y', strtotime($client->date_of_birth));
        $signatureDate = \Carbon\Carbon::parse($dProject?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');
        // $publicRoot = $_SERVER['DOCUMENT_ROOT'];
        // $imagePath1 = $publicRoot . $relativePath;
        return [
            'AdressDuLogement1' => $dProject->address,
            'Mr1' => ($client->gender == DClientGender::Male->value) ? 'checked' : '',
            'Mme1' => ($client->gender == DClientGender::Female->value) ? 'checked' : '',
            'Nom1' => $client->last_name,
            'Prenom1' => $client->first_name,
            'AnneeDeNaissance1' => Carbon::parse($client->year_of_birth)->format('Y'),
            'Batiment' => $client->building ?? '',
            'Escaller' => $client->stairs ?? '',
            'Etage' => $client->floor ?? '',
            'Porte' => $client->door ?? '',
            'CodePostal' => $client->zip_code ?? '',
            'Commune' => $client->commune ?? '',
            'Tel' => $client->phone_number_1 ?? '',
            'Portable' => $client->phone_number_2 ?? '',
            'Mel' => $client->email_anah ?? '',
            'naitre' => $dProject->number_of_dependent_children ?? '',
            'PapierLibre' => ($dProject->free_paper) ? 'checked' : '',
            'pleine' => ($dProject->projectNature?->type == 0) ? 'checked' : '',
            'indivision' => ($dProject->projectNature?->type == 1) ? 'checked' : '',
            'SCI' => ($dProject->projectNature?->type == 2) ? 'checked' : '',
            'usufruitier' => ($dProject->projectNature?->type == 3) ? 'checked' : '',
            'habitation' => ($dProject->projectNature?->type == 4) ? 'checked' : '',
            'immobilier' => ($dProject->projectNature?->type == 5) ? 'checked' : '',
            'locataire' => ($dProject->projectNature?->type == 6) ? 'checked' : '',
            'viager' => ($dProject->projectNature?->type == 7) ? 'checked' : '',
            'casParticulier1' => ($dProject->work_load_for_low_income_owners == 1) ? 'checked' : '',
            'casParticulier2' => ($dProject->free_hosting_for_low_income_household == 1) ? 'checked' : '',
            'Adresse2' => $dProject->address,
            'Batiment2' => $dProject->batiment ?? '',
            'Escaller2' => $dProject->stairs ?? '',
            'Etage2' => $dProject->floor ?? '',
            'Porte2' => $dProject->door ?? '',
            'CodePostal2' => $dProject->zip_code ?? '',
            'Commune2' => $dProject->common ?? '',
            'descriptionIndiv' => ($dProject->natureResidence?->type == 0) ? 'checked' : '',
            'descriptionAppartement' => ($dProject->natureResidence?->type == 1) ? 'checked' : '',
            'descriptionOui1' => ($dProject->work_commun_parts) ? 'checked' : '',
            'descriptionNon1' => (!$dProject->work_commun_parts) ? 'checked' : '',
            'descriptionOui2' => ($dProject->more_than_fifteen) ? 'checked' : '',
            'descriptionNon2' => (!$dProject->more_than_fifteen) ? 'checked' : '',
            'descriptionOui3' => ($dProject->ptz_beneficiary) ? 'checked' : '',
            'descriptionNon3' => (!$dProject->ptz_beneficiary) ? 'checked' : '',
            'descriptionOui4' => ($dProject->auto_rehabilitation) ? 'checked' : '',
            'descriptionNon4' => (!$dProject->auto_rehabilitation) ? 'checked' : '',
            'before_trv' => $dProject->energy_consumption_before ?? '',
            'after_trv' => $dProject->energy_consumption_after ?? '',
            'descriptionRenovationE' => ($dProject->workType?->type == 0) ? 'checked' : '',
            'descriptionAdaptation' => ($dProject->workType?->type == 1) ? 'checked' : '',
            'descriptionRenovationL' => ($dProject->workType?->type == 2) ? 'checked' : '',
            'descriptionAutre' => ($dProject->workType?->type == 3) ? 'checked' : '',
            //to check after
            'FaitA' => $client->city,
            'le' => $signatureDate,
            'qualiteDe' => '',
            'Demandeur' => $dProject->has_agent ? '' : 'checked',
            'Mandataire' => $dProject->has_agent ? 'checked' : '',
            'total_occupant' => $dProject->total_number_occupants ?? '',
            'sum_rfr' => $dProject->sum_revenue_reference_1,
            'year_income' => $dProject->year_of_sum_revenue_reference_1,
            'img1' => $this->baseImage(resource_path('images/logo-agence.png')),
            'img2' => $this->baseImage(resource_path('images/logo-habiter.jpg')),
            'img3' => $this->baseImage(resource_path('images/cerfa.jpg')),
            'preciserNature' => $dProject->work_description ?? '',
            'sum_rfr_2' => $dProject->sum_revenue_reference_2,
            'year_income_2' => $dProject->year_of_sum_revenue_reference_2,
            'signature_mandataire' => $dProject->has_agent ? ($dProject->mandataire_company->signature ? $this->baseImage(storage_path('app/' . $dProject->mandataire_company->signature)) : '') : '',
        ];
    }

    //to check
    public function workProjectData($dProject)
    {
        $invoice = DProjectInvoiceHeader::where('d_project_id', $dProject->id)->where('type', DInvoiceHeaderType::INSTALLER->value)->first();
        $company = $dProject->company;
        $urban_procedure = false;
        foreach ($dProject->works as $key => $work) {
            if ($work->entitled == 'ITE') {
                $urban_procedure = true;
                break;
            }
        }
        $client = $dProject->client;
        $rges = $dProject->installer?->company?->rges;
        $rgesHtml = '';
        foreach ($rges as $rge) {
            $rgesHtml .= $rge->rge . ', ';
        }
        return [
            'mar_name' => $company->trade_name,
            'mar_city' => $company->city,
            'mar_siret' => $company->siret_without_space,
            'mar_address' => $company->address . ' ' . $company->zip_code . ' ' . $company->city,
            'mar_legal_representative' =>  $company->representative_first_name . ' ' . $company->representative_last_name,
            'mar_representative_role' => $company->position,
            'mar_approval_number' => $company->approval_number,
            'mar_trade_name' => $company->trade_name,
            'first_name' => $client->last_name,
            'urban_procedure' => $urban_procedure ? 'La réalisation d’une isolation par l’extérieur nécessite la plupart du temps une modification de l’aspect extérieur du bâtiment. Vous aurez alors pour cela besoin, selon l’article R.421-17 du code de l’urbanisme, d’une déclaration préalable de travaux. Celle-ci permettra à l’autorité administrative de s’assurer de la conformité de votre construction avec les normes et textes d’urbanisme en vigueur. Cette déclaration doit s’effectuer auprès de la mairie associée au bâtiment devant faire l’objet de l’isolation extérieure. La déclaration devra se faire avec le formulaire Cerfa n° 13404*1. Elle est déposée en trois exemplaires à la mairie, et le délai d’instruction est d’environ un mois' : '',
            'last_name' => $client->first_name,
            'installer_name' => $dProject->installer?->company?->trade_name,
            'installer_rge' => $rgesHtml,
            'installer_address' => $dProject->installer?->company?->address . ' ' . $dProject->installer?->company?->zip_code . ' ' . $dProject->installer?->company?->city,
            'total_invoice' => number_format(round($invoice->TTC_total, 2), 2, ',', ' '),
            'client_class' => $dProject->projectIncomeClass?->entitled,
            'net_to_pay' => number_format(round($invoice->TTC_rest, 2), 2, ',', ' '),
            'scenario' => 'Scenario 1',
            'total_help' => number_format(round($invoice->prime_renov_bonification, 2), 2, ',', ' '),
            'date' => Carbon::parse($invoice->invoice_date)->format('d/m/Y'),
            'address' => $client->address . ', ' . $client->zip_code . ', ' . $client->city,
            'eco_loan_stopped_thirty_mars' => $dProject->eco_loan_stopped_thirty_mars == 1 ? 'oui' : 'non',
            'renovation_advance_loan_seventeen_december' => $dProject->renovation_advance_loan_seventeen_december == 1 ? 'oui' : 'non',
            'other_description_of_remainder_payable' => $dProject->other_description_of_remainder_payable,
            'cee' => $dProject->cee ?? '0',
            'departmental_help' => $dProject->departmental_help ?? '0',
            'regional_help' => $dProject->regional_help ?? '0',
            'help_local_authorities' => $dProject->help_local_authorities ?? '0',
            'anah_mprs' => number_format(round($invoice->prime_renov_bonification, 2), 2, ',', ' ') ?? '0',
            'signature_mar' => $company->signature ? $this->baseImage(storage_path('app/' . $company->signature)) : '',
        ];
    }

    public function simulationData($dProject)
    {
        $client = $dProject->client;
        $installerCompany = $dProject->company;
        $marScale = PMarScale::where('income_classe', $dProject->income_class)->first();
        $mar_ttc = ($marScale?->mar_scale ?? 0) * ($marScale?->mar_cap ?? 0);

        return [
            'raison_social' => $installerCompany?->trade_name,
            'adresse' => $installerCompany->address,
            'city' => $installerCompany->city,
            'siret' => $installerCompany?->siret_without_space,
            'telephone' => $installerCompany?->phone_number_1,
            'mail' => $installerCompany?->email,
            'client_ref' => $client->reference,
            'client_name' => $client->last_name . ' ' . $client->first_name,
            'client_telephone' => $client->phone_number_1,
            'client_address' => $client->address,
            'city_client' => $client->city,
            'client_category' => $dProject->projectIncomeClass?->entitled,
            'nature_log' => $dProject->natureResidence?->entitled,
            'shab' => $dProject->surface_housing_before_work,
            'etage' => $dProject->number_of_floors,
            'surface_isole' => $dProject->isolated_surface_value,
            'energ_class' => $dProject->projectEnergyClass?->entitled,
            'skip_class' => $dProject->skipClass?->entitled,
            'total_ht' => number_format(round($dProject->cost_ht_simulation, 2), 2, ',', ' '),
            'montant_aide' => number_format(round(round($dProject->cost_ht_simulation - $dProject->rest_ht_simulation, 2), 2), 2, ',', ' '),
            'mar_fund' => number_format(round($mar_ttc, 2), 2, ',', ' '), //check simulation
            'rest_charge' => number_format(round($dProject->rest_ht_simulation, 2), 2, ',', ' '),
            'date' => now()->format('d/m/Y'),
        ];
    }

    public function devisInstallateur($dProject)
    {
        $invoice = $dProject->invoices->first();
        $installateur = $dProject->installer?->company;
        $installerVisit = $dProject->visits->where('type', 0)->where('state', '1')->first()?->visit_date;

        return [
            'net_ht' => number_format(round($invoice?->HTNet_total, 2), 2, ',', ' ') ?? '0',
        ];
    }

    public function BonDeTravailData($dProject, $documentProject = null)
    {
        $works = $dProject->works;
        $invoice = DProjectInvoiceHeader::where('d_project_id', $dProject->id)->where('d_company_id', $documentProject->d_company_id)->first();
        // $works ? date('d/m/Y', strtotime($works->sortBy('start_date')->first()?->start_date))
        return [
            'Date' => now()->format('d/m/Y'),
            'invoice' => $invoice,
            'installer' => $documentProject->company,
            'Bureau_etude' => $dProject->auditor?->company?->trade_name,
            'Adress_Bureau_etude' => ($dProject->auditor?->company?->address ? $dProject->auditor?->company->address . ', ' : '') .
                ($dProject->auditor?->company?->zip_code ? $dProject->auditor?->company->zip_code . ', ' : '') .
                ($dProject->auditor?->company?->city ? $dProject->auditor?->company->city : ''),
            'SIRET_Bureau_etude' => $dProject->auditor?->company?->siret_without_space,
            'RGE_Bureau_etude' => $dProject->auditor?->company?->num_rge,
            // 'qualification_be' => $dProject->auditor?->company?->qualification_auditor,
            'logo' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/logo-mar.png')),
            'Client_name' => $dProject->client->first_name . ' ' . $dProject->client->last_name,
            'Adresse_bien' => ($dProject->client?->address ? $dProject->client->address . ', ' : '') .
                ($dProject->client?->zip_code ? $dProject->client->zip_code . ', ' : '') .
                ($dProject->client?->city ? $dProject->client->city : ''),
            'Date_prevu' => $dProject->work_planned_start ? date('d/m/Y', strtotime($dProject->work_planned_start)) : '',
            'Fin_Date_prevu' => $dProject->work_planned_end ? date('d/m/Y', strtotime($dProject->work_planned_end)) : '',
            'Client_number' => $dProject->client->phone_number_1,
            'Client_email' => $dProject->client->email_contact,
            'Classe_energitique' => $dProject->projectEnergyClass?->entitled,
            'Classe_sauts' => $dProject->skipClass?->entitled,
        ];
    }

    public function MandatdesFonds($dProject)
    {
        $works = $dProject->works;

        // $works ? date('d/m/Y', strtotime($works->sortBy('start_date')->first()?->start_date))
        return [
            'Date' => now()->format('d/m/Y'),
            'Bureau_etude' => $dProject->auditor?->company?->trade_name,
            'Adress_Bureau_etude' => ($dProject->auditor?->company?->address ? $dProject->auditor?->company->address . ', ' : '') .
                ($dProject->auditor?->company?->zip_code ? $dProject->auditor?->company->zip_code . ', ' : '') .
                ($dProject->auditor?->company?->city ? $dProject->auditor?->company->city : ''),
            'SIRET_Bureau_etude' => $dProject->auditor?->company?->siret_without_space,
            'RGE_Bureau_etude' => $dProject->auditor?->company?->num_rge,
            // 'qualification_be' => $dProject->auditor?->company?->qualification_auditor,
            'logo' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/logo-mar.png')),
            'Client_name' => $dProject->client->first_name . ' ' . $dProject->client->last_name,
            'Adresse_bien' => ($dProject->client?->address ? $dProject->client->address . ', ' : '') .
                ($dProject->client?->zip_code ? $dProject->client->zip_code . ', ' : '') .
                ($dProject->client?->city ? $dProject->client->city : ''),
            'Date_prevu' => $dProject->work_planned_start ? date('d/m/Y', strtotime($dProject->work_planned_start)) : '',
            'Fin_Date_prevu' => $dProject->work_planned_end ? date('d/m/Y', strtotime($dProject->work_planned_end)) : '',
            'Client_number' => $dProject->client->phone_number_1,
            'Client_email' => $dProject->client->email_contact,
            'Classe_energitique' => $dProject->projectEnergyClass?->entitled,
            'Classe_sauts' => $dProject->skipClass?->entitled,
        ];
    }

    public function DemandeDevisSigne($dProject)
    {
        $works = $dProject->works;

        // $works ? date('d/m/Y', strtotime($works->sortBy('start_date')->first()?->start_date))
        return [
            'Date' => now()->format('d/m/Y'),
            'Bureau_etude' => $dProject->auditor?->company?->trade_name,
            'Adress_Bureau_etude' => ($dProject->auditor?->company?->address ? $dProject->auditor?->company->address . ', ' : '') .
                ($dProject->auditor?->company?->zip_code ? $dProject->auditor?->company->zip_code . ', ' : '') .
                ($dProject->auditor?->company?->city ? $dProject->auditor?->company->city : ''),
            'SIRET_Bureau_etude' => $dProject->auditor?->company?->siret_without_space,
            'RGE_Bureau_etude' => $dProject->auditor?->company?->num_rge,
            // 'qualification_be' => $dProject->auditor?->company?->qualification_auditor,
            'logo' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/logo-mar.png')),
            'Client_name' => $dProject->client->first_name . ' ' . $dProject->client->last_name,
            'Adresse_bien' => ($dProject->client?->address ? $dProject->client->address . ', ' : '') .
                ($dProject->client?->zip_code ? $dProject->client->zip_code . ', ' : '') .
                ($dProject->client?->city ? $dProject->client->city : ''),
            'Date_prevu' => $dProject->work_planned_start ? date('d/m/Y', strtotime($dProject->work_planned_start)) : '',
            'Fin_Date_prevu' => $dProject->work_planned_end ? date('d/m/Y', strtotime($dProject->work_planned_end)) : '',
            'Client_number' => $dProject->client->phone_number_1,
            'Client_email' => $dProject->client->email_contact,
            'Classe_energitique' => $dProject->projectEnergyClass?->entitled,
            'Classe_sauts' => $dProject->skipClass?->entitled,
        ];
    }

    public function reserveData($dProject)
    {
        $invoice = DProjectInvoiceHeader::where('d_project_id', $dProject->id)->first();
        $reclamation = $dProject->reclamation?->first();

        return [
            'logo_mar' => $dProject->company->logo ? $this->baseImage($dProject->company->logo) : $this->baseImage(resource_path('images/empty_logo.jpg')),
            'mar_name' => $dProject->company->trade_name,
            'mar_siret' => $dProject->company->siret_without_space,
            'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'tel_client' => $dProject->client->phone_number_1,
            'address_project' => $dProject->address,
            'zip_city_project' => $dProject->zip_code . ' ' . $dProject->city,
            'reserve' => $reclamation?->entitled,
            'logo_reserve' => $this->baseImage(resource_path('images/logo_MAR1.jpg')),
            'installer_name' => $dProject->installer?->trade_name,
            'devis_ref' => $invoice?->reference,
            'date_devis' => $invoice?->invoice_date,
            'client_city' => $dProject->client->city,
            'date' => now()->format('d-m-Y'),
        ];
    }

    public function pvReceptionData($dProject)
    {
        $invoice = $dProject->invoices()?->latest()->first();
        $ITI = false;
        $ITE = false;
        $combles = false;
        $rampants = false;
        $air = false;
        $eau = false;
        $VMC = false;
        $thermodynamique = false;
        $bas = false;
        foreach ($dProject->works as $key => $work) {
            if ($work->entitled == 'ITE') {
                $ITE = true;
            } elseif ($work->entitled == 'ITI') {
                $ITI = true;
            } elseif ($work->entitled == 'Comble perdu') {
                $combles = true;
            } elseif ($work->entitled == 'Rampants') {
                $rampants = true;
            } elseif ($work->entitled == 'PAC air/air') {
                $air = true;
            } elseif ($work->entitled == 'PAC air/eau') {
                $eau = true;
            } elseif ($work->entitled == 'VMC double flux') {
                $VMC = true;
            } elseif ($work->entitled == 'Ballon thermo') {
                $thermodynamique = true;
            } elseif ($work->entitled == 'Plancher bas') {
                $bas = true;
            }
        }

        return [
            'logo_mar' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/empty_logo.jpg')),
            'mar_name' => $dProject->company->trade_name,
            'mar_siret' => $dProject->company->siret_without_space,
            'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'tel_client' => $dProject->client->phone_number_1,
            'address_project' => $dProject->address,
            'full_address_project' => $dProject->address . ', ' . $dProject->zip_code . ', ' . $dProject->city,
            'zip_city_project' => $dProject->zip_code . ' ' . $dProject->city,
            'logo_reserve' => $this->baseImage(resource_path('images/logo_MAR1.jpg')),
            'installer_name' => $dProject->installer?->trade_name,
            'devis_ref' => $invoice->reference ?? null, //devis insaller
            'date_devis' => date('d/m/Y', strtotime($invoice->invoice_date ?? null)) == '01/01/1970' ? '' : date('d/m/Y', strtotime($invoice->invoice_date ?? null)), //date devis insatller
            'client_city' => $dProject->client->city,
            'date' => now()->format('d-m-Y'),
            'ITI' => $ITI ? 'checked' : '',
            'ITE' => $ITE ? 'checked' : '',
            'combles' => $combles ? 'checked' : '',
            'bas' => $bas ? 'checked' : '',
            'toitures' => '',
            'rampants' => $rampants ? 'checked' : '',
            'air/air' => $air ? 'checked' : '',
            'air/eau' => $eau ? 'checked' : '',
            'VMC' => $VMC ? 'checked' : '',
            'thermodynamique' => $thermodynamique ? 'checked' : '',
            'consistency_of_work_scenarios_checked1' => $dProject->consistency_of_work_scenarios_checked ? 'checked' : '',
            'consistency_of_work_scenarios_checked2' => $dProject->consistency_of_work_scenarios_checked ? '' : 'checked',
            'reception_is_pronounced1' => $dProject->reception_is_pronounced ? 'checked' : '',
            'reception_is_pronounced2' => $dProject->reception_is_pronounced ? '' : 'checked',
            'description_reception_is_pronounced' => $dProject->description_reception_is_pronounced,
            'signature_mar' => $dProject->company->signature ? $this->baseImage(storage_path('app/' . $dProject->company->signature)) : '',
        ];
    }

    public function CoherenceWork($dProject)
    {
        return [
            'date' => now()->format('d/m/Y'),
            'mar_name' => $dProject->company->trade_name,
            'mar_siret' => $dProject->company->siret_without_space,
            'mar_adress' => $dProject->company?->address . ', ' . $dProject->company->zip_code . ', ' . $dProject->company->city,
            'mar_approval_number' => $dProject->company->approval_number,
            'last_name' => $dProject->client->last_name,
            'first_name' => $dProject->client->first_name,
            'client_address' => $dProject->client->address . ', ' . $dProject->client->zip_code . ', ' . $dProject->client->city,
            'mar_city' => $dProject->company->city,
        ];
    }

    public function syntheseShuttleData()
    {
        return [];
    }

    public function ceeData()
    {

        return [];
    }

    public function primePaimentDemandData($dProject)
    {
        $passoireEnergitiqueBonus = '';
        if ($dProject->EnergyperformanceBeforeWork?->type == '5' || $dProject->EnergyperformanceBeforeWork?->type == '6') {
            $passoireEnergitiqueBonus = 'checked';
        }
        $invoiceInstaller = $dProject->invoices()->where('type', DInvoiceHeaderType::INSTALLER->value)->first();
        return [
            'date' => now()->format('d/m/Y'),
            'demandeur_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'prime_type1' => 'checked',
            'prime_type2' => $passoireEnergitiqueBonus,
            'prime_type3' => '',
            'adresse_numero' => $dProject->house_number,
            'voie' => $dProject->street,
            'zip' => $dProject->zip_code,
            'city' => $dProject->city,
            'work_price' => number_format(round($invoiceInstaller->TTC_total, 2), 2, ',', ' '),
            'consume_initial' => number_format(round($dProject->primary_energy_before_work, 2), 2, ',', ' '),
            'consume_project' => number_format(round($dProject->primary_energy_after_work, 2), 2, ',', ' '),
            'energy_gain' => number_format(round($dProject->gain_energy, 2), 2, ',', ' '),
            'audit_price' => number_format(round($dProject->total_cost_energy_audit, 2), 2, ',', ' '),
            'gaz_emission_before_work' => number_format(round($dProject->gaz_emission_before_work, 2), 2, ',', ' '),
            'gaz_emission_after_work' => number_format(round($dProject->gaz_emission_after_work, 2), 2, ',', ' '),
            'DPE_before_work' => $dProject->dpe_before,
            'DPE_after_work' => $dProject->dpe_after,
            'audit_name' => $dProject->auditor?->company->trade_name,
            'audit_siret' => $dProject->auditor?->company->siret_without_space,
            'address_audit' => $dProject->auditor?->company->city,
            'total_eligble_price' => number_format(round($invoiceInstaller->TTC_total, 2), 2, ',', ' '),
            'mission_nature' => $dProject->scenario,
            'company_name' => $dProject->company->trade_name,
            'company_siret' => $dProject->company->siret_without_space,
            'address_amo' => $dProject->company->city,
        ];
    }

    public function primeWorkDemandData()
    {
        return [];
    }

    public function mandatAdminData($dProject)
    {
        $mandataire = $dProject->operations()->administratif()->first();
        $signatureDate = \Carbon\Carbon::parse($dProject?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');

        return [
            'titre_type' => 'Administratif',
            'titre' => 'pour la constitution d’une demande',
            'titre_admin' => 'de prime et sa demande de paiement',
            'Mr' => $dProject->client->gender == DClientGender::Male->value ? 'checked' : '',
            'Mme' => $dProject->client->gender == DClientGender::Female->value ? 'checked' : '',
            'ref_project' => $dProject->anah_folder,
            'client_last_name' => $dProject->client->last_name,
            'client_first_name' => $dProject->client->first_name,
            'holder_of_real_estate_right' => 'checked',
            'address' => $dProject->address,
            'project_zip' => $dProject->zip_code,
            'commune' => $dProject->client->commune,
            'client_mail' => $dProject->client->email_anah,
            'client_number' => $dProject->client->phone_number_1,
            'Mr1' => $mandataire?->company?->representative_gender == DClientGender::Male->value ? 'checked' : '',
            'Mme1' => $mandataire?->company?->representative_gender == DClientGender::Female->value ? 'checked' : '',
            'mondataire_last_name' => $mandataire?->company?->representative_last_name,
            'mondataire_first_name' => $mandataire?->company?->representative_first_name,
            'mondataire_raison_social' => $mandataire?->company?->trade_name,
            'mondataire_zip' => $mandataire?->company?->zip_code,
            'mondataire_commune' => $mandataire?->company?->city,
            'mondataire_mail' => $mandataire?->company?->email,
            'mondataire_number' => $mandataire?->company?->phone_number_1,
            'mandat_admin' => 'checked',
            'mandat_financier' => '',
            'client_city' => $dProject->client->city,
            'date' => $signatureDate,
            'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'mondataire' => $mandataire?->company?->trade_name,
            'renov' => $this->baseImage(resource_path('/images/primeRenovBleuEgg.png')),
            'signature_mar' => $mandataire?->company?->signature ? $this->baseImage(storage_path('app/' . $mandataire?->company?->signature)) : '',
        ];
    }

    public function mandatFinanData($dProject)
    {
        $mandataire = $dProject->operations()->financier()->first();
        $signatureDate = \Carbon\Carbon::parse($dProject?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');

        return [
            'titre_type' => 'Financier',
            'titre' => 'pour la perception de la prime',
            'Mr' => $dProject->client->gender == DClientGender::Male->value ? 'checked' : '',
            'Mme' => $dProject->client->gender == DClientGender::Female->value ? 'checked' : '',
            'ref_project' => $dProject->anah_folder,
            'client_last_name' => $dProject->client->last_name,
            'client_first_name' => $dProject->client->first_name,
            'holder_of_real_estate_right' => 'checked',
            'address' => $dProject->address,
            'project_zip' => $dProject->zip_code,
            'commune' => $dProject->client->city,
            'client_mail' => $dProject->client->email_anah,
            'client_number' => $dProject->client->phone_number_1,
            'Mr1' => $mandataire?->company->representative_gender == DClientGender::Male->value ? 'checked' : '',
            'Mme1' => $mandataire?->company->representative_gender == DClientGender::Female->value ? 'checked' : '',
            'mondataire_last_name' => $mandataire?->company->representative_last_name,
            'mondataire_first_name' => $mandataire?->company->representative_first_name,
            'mondataire_raison_social' => $mandataire?->company->trade_name,
            'mondataire_zip' => $mandataire?->company->zip_code,
            'mondataire_commune' => $mandataire?->company->city,
            'mondataire_mail' => $mandataire?->company->email,
            'mondataire_number' => $mandataire?->company->phone_number_1,
            'mandat_admin' => '',
            'mandat_financier' => 'checked',
            'client_address' => $dProject->client->city,
            'date' => $signatureDate,
            'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'mondataire' => $mandataire?->company->trade_name,
            'renov' => $this->baseImage(resource_path('/images/primeRenovBleuEgg.png')),
            'signature_mar' => $mandataire?->company->signature ? $this->baseImage(storage_path('app/' . $mandataire?->company->signature)) : '',
        ];
    }

    public function ContractMarData($dProject)
    {
        $company = $dProject->company;
        $client = $dProject->client;
        return [
            'mrORMme' => DClientGender::Female->value == $client->gender ? 'Mme' : 'M.',
            'logo_doc' => $this->baseImage(resource_path('images/logo_MAR.jpg')),
            'assurance_address' => $dProject->company->insurance_address,
            'assurance_capital' => number_format(round($dProject->company->insurance_capital, 2), 2, ',', ' '),
            'assurance_RCS' => $dProject->company->insurance_rcs,
            'assurance_police' => $dProject->company->insurance_police,
            'logo_contract' => $dProject->company->logo ? $this->baseImage(storage_path('app/' . $dProject->company->logo)) : $this->baseImage(resource_path('images/logo-mar-vert.png')),
            'client_name' => $client->first_name . ' ' . $client->last_name,
            'client_address' => $client?->address . ' ' . $client?->zip_code . ' ' . $client?->city,
            'company_name' => $company->trade_name,
            'company_address' => $company?->address . ' ' . $company?->zip_code . ' ' . $company?->city,
            'company_representative' => $company->representative_last_name . ' ' . $company->representative_first_name,
            'company_position' => $company->position,
            'company_approval_number' => $company->approval_number,
            'company_capital' => number_format(round($company->capital, 2), 2, ',', ' '),
            'company_currency' => $company->currency,
            'company_mail' => $company->email,
            'date' => now()->format('d/m/Y'),
            'contract_mar_header' => $this->baseImage(resource_path('images/contract_mar_header.png')),

        ];
    }

    public function InvoiceMarData($dProject)
    {
        return [];
    }

    public function preAuditData()
    {
        return [];
    }


    public function additionalCommitments()
    {
        return [];
    }
    public function mandatGeneralData($dProject)
    {
        $mandataire = $dProject->operations()->administratif()->first();
        $signatureDate = \Carbon\Carbon::parse($dProject?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');
        return [
            'Mr' => $dProject->client->gender == DClientGender::Male->value ? 'checked' : '',
            'Mme' => $dProject->client->gender == DClientGender::Female->value ? 'checked' : '',
            'ref_project' => $dProject->anah_folder,
            'client_last_name' => $dProject->client->last_name,
            'client_first_name' => $dProject->client->first_name,
            'holder_of_real_estate_right' => 'checked',
            'address' => $dProject->address,
            'project_zip' => $dProject->zip_code,
            'commune' => $dProject->client->commune,
            'client_mail' => $dProject->client->email_anah,
            'client_number' => $dProject->client->phone_number_1,
            'Mr1' => $mandataire?->company?->representative_gender == DClientGender::Male->value ? 'checked' : '',
            'Mme1' => $mandataire?->company?->representative_gender == DClientGender::Female->value ? 'checked' : '',
            'mondataire_last_name' => $mandataire?->company?->representative_last_name,
            'mondataire_first_name' => $mandataire?->company?->representative_first_name,
            'mondataire_raison_social' => $mandataire?->company?->trade_name,
            'mondataire_zip' => $mandataire?->company?->zip_code,
            'mondataire_commune' => $mandataire?->company?->city,
            'mondataire_mail' => $mandataire?->company?->email,
            'mondataire_number' => $mandataire?->company?->phone_number_1,
            'mandat_admin' => 'checked',
            'mandat_financier' => 'checked',
            'client_city' => $dProject->client->city,
            'date' => $signatureDate,
            'client_name' => $dProject->client->last_name . ' ' . $dProject->client->first_name,
            'mondataire' => $mandataire?->company?->trade_name,
            'renov' => $this->baseImage(resource_path('/images/primeRenovBleuEgg.png')),
            'signature_mar' => $mandataire?->company?->signature ? $this->baseImage(storage_path('app/' . $mandataire?->company?->signature)) : '',
        ];
    }

    public function precaire()
    {
        return [];
    }
}
