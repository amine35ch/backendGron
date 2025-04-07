<?php

namespace App\Http\Controllers;

use App\Models\DProject;
use App\Models\DProjectVisit;
use App\Services\DashboardServices\DashboardService;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService)
    {
    }

    public function MarProjectData()
    {
        $this->authorize('view project statistic');
        $user=auth()->user();
        $projects = DProject::byUser($user->company)->get();

        return response()->json($this->dashboardService->countProjectbyType($projects,$user));

    }

    public function MarVisitData()
    {
        $this->authorize('view visit statistic');
        $user=auth()->user();
        if ($user->hasRole($user->profile.'::admin')||$user->hasRole($user->profile.'::collaborator')) {
            $visits = DProjectVisit::where('d_company_id', getCompanyOfConnectedUser()->id)->get();
        }else {
            $visits = DProjectVisit::where('d_company_id', getCompanyOfConnectedUser()->id)->where('user_id',$user->id)->get();
        }

        return response()->json($this->dashboardService->percentageVisitByType($this->dashboardService->countVisitbyType($visits)));

    }

    public function MarDevisDataByYear()
    {
        $this->authorize('view invoice statistic');
        return response()->json($this->dashboardService->getDevisDataForEveryMonth());

    }

    public function VisitDevisProjectDataByYear()
    {
        $this->authorize('view visit statistic',);

        return response()->json($this->dashboardService->getDevisVisitProjectForEveryMonth());
    }
}
