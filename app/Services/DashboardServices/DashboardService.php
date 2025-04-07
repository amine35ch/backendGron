<?php

namespace App\Services\DashboardServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectOperationEnum\DProjectOperationState;
use App\Enums\DProjectVisitEnum\DProjectVisitState;
use App\Models\DProject;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectVisit;
use Carbon\Carbon;

class DashboardService
{
    public function __construct(private DProject $dProject)
    {
    }

    public function countProjectbyType($dProject,$user)
    {

        if ($user->profile==DCompanyProfile::AUD->value) {
            $data = [
                $dProject->sum(function ($project) {
                    return $project->operations()->where('p_operation_id', 2)
                        ->where('state', DProjectOperationState::PENDING->value)
                        ->exists() ? 1 : 0;
                }),
                $dProject->sum(function ($project) {
                    return $project->operations()->where('p_operation_id', 2)
                        ->where('state', DProjectOperationState::FINISHED->value)
                        ->exists() ? 1 : 0;
                }),
            ];
            $label=[
                'En cours',
                'Terminés',
            ];
        }
        else {
            $data=[
                $dProject->where('state', DProjectState::INIT->value)->count(),
                $dProject->whereIn('state', [DProjectState::ONGOING->value,DProjectState::FIRSTDEPOT->value])->count(),
                $dProject->where('state', DProjectState::COMPLETED->value)->count(),
                $dProject->where('state', DProjectState::SUSPENDED->value)->count(),
            ];
            $label=[
                'Nouveau',
                'En cours',
                'Terminés',
                'Suspendues',
            ];
        }
        return [
            'label' =>$label,
            'data' => $data
        ];
    }

    public function percentage($data, $allData)
    {
        if ($allData) {
            return round(($data / $allData) * 100, 2);
        }

        return 0;
    }

    public function countVisitbyType($dProjectVisit)
    {
        return [
            $dProjectVisit->count(),
            $dProjectVisit->where('state', DProjectVisitState::PLANNED->value)->count(),
            $dProjectVisit->where('state', DProjectVisitState::FINISHED->value)->count(),
        ];
    }

    public function percentageVisitByType($counts)
    {
        return [
            'label' => [
                'A faire', 'Terminés',
            ],
            'chiffre' => [$counts['1'], $counts['2']],
            'percentage' => [
                $this->percentage($counts['1'], $counts['0']),
                $this->percentage($counts['2'], $counts['0']),
            ],
        ];
    }

    public function getDevisDataForEveryMonth()
    {
        $year = Carbon::now()->year;
        $data = [];
        $keys = [];
        for ($i = 1; $i <= 12; $i++) {
            $keys[] = $this->monthToFrench(date('F', mktime(0, 0, 0, $i, 10)));
            $devis[] = DProjectInvoiceHeader::where('d_company_id', getCompanyOfConnectedUser()->id)->whereYear('created_at', $year)
            ->whereMonth('created_at', $i)
            ->count();
        }
        $Devis['label'] = $keys;
        $Devis['data'] = $devis;
        return $Devis;

    }

    public function getDevisVisitProjectForEveryMonth()
    {
        $user=auth()->user();
        $year = Carbon::now()->year;
        $devis = [];
        $dossiers = [];
        $visits = [];
        $keys = [];
        for ($i = 1; $i <= 12; $i++) {
            $keys[] = $this->monthToFrench(date('F', mktime(0, 0, 0, $i, 10)));
            if ($user->profile!==DCompanyProfile::AUD->value) {
                $devis[] = DProjectInvoiceHeader::where('d_company_id', getCompanyOfConnectedUser()->id)->whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            }
            $dossiers[] = DProject::byUser(auth()->user()->company)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            $visits[] = DProjectVisit::where('d_company_id', getCompanyOfConnectedUser()->id)->whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
        }
        $data = [
            'label' => $keys,
            'dossiers' => $dossiers,
            'visits' => $visits,
        ];
        if ($user->profile!==DCompanyProfile::AUD->value) {
            $data['devis']=$devis;
        }
        return $data;

    }

    public static function monthToFrench($month)
    {
        $english_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $french_months = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'];

        return str_replace($english_months, $french_months, $month);
    }
}
