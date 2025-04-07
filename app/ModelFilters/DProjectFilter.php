<?php

namespace App\ModelFilters;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectOperationEnum\DProjectOperationState;
use Carbon\Carbon;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DProjectFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     */
    public function search($value)
    {
        $query = $this;
        $fillableColumns = $query->getModel()->getFillable();
        $date=$value;
        try {
            $date=Carbon::parse($value)->format('Y-d-m');
        } catch (\Throwable $th) {
        }

        return $query->where(function (Builder $query) use ($fillableColumns, $value,$date) {
            foreach ($fillableColumns as $column) {
                $query->orWhere($column, 'LIKE', '%'.$value.'%');
            }
            $query->orWhereDate('created_at','LIKE', '%'.$date.'%');
            $query->orWhereHas('client',function($q) use($value){
                $q->where(DB::raw('CONCAT_WS(" ", house_number, street)'), 'LIKE', '%'.$value.'%')
                    ->orWhere('phone_number_1', 'LIKE', '%'.$value.'%')
                    ->orWhere(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'LIKE', '%'.$value.'%');
            });
            $query->orWhereHas('creator.company',function($q) use($value){
                $q->where('trade_name', 'LIKE', '%'.$value.'%')
                ;
            });
            $query->orWhereHas('typeDemandeProject',function($q) use($value){
                $q->where('entitled', 'LIKE', '%'.$value.'%');
            });
            $query->orWhereHas('step',function($q) use($value){
                $q->where('display_name', 'LIKE', '%'.$value.'%');
            });
            $query->orWhereHas('operations.company',function($q) use($value){
                $q->where('trade_name', 'LIKE', '%'.$value.'%');
            });
        });
    }

    // public function type($type)
    // {
    //     return $this->where('type', $type);
    // }

    public function state($state)
    {
        $user=auth()->user();
    
        // if ($user->profile == DCompanyProfile::AUD->value) {

        //     if ($state==DProjectState::ONGOING->value) {
        //         $query = $this->where('state',DProjectState::ONGOING->value)->whereHas('operations', function ($query) {
        //             $query->where('p_operation_id', 2)->where('state', DProjectOperationState::PENDING->value);
        //         });
        //     }else {
        //         $query = $this->where('state', $state);
        //     }
        // }else {

            $query = $this->where('state', $state);
            
        // }
        return $query;
    }

    public function class($class)
    {
        return $this->where('income_class', $class);
    }

    public function operation($value){
        $company=auth()->user()->company;
        if ($company->profile==DCompanyProfile::MAR->value) {
            return $this->where('state',DProjectState::COMPLETED->value)->whereHas('operations', function ($query) use ($value)  {
                $query->where('p_operation_id', 1)->where('is_billed',$value);
            });
        }
        if ($company->profile==DCompanyProfile::AUD->value) {

            return $this->where('state',DProjectState::COMPLETED->value)->whereHas('operations', function ($query) use ($value) {
                $query->where('p_operation_id', 2)->where('is_billed',$value);
            });
        }
        if ($company->profile==DCompanyProfile::INS->value) {

            return $this->where('state',DProjectState::COMPLETED->value)->whereHas('operations', function ($query) use ($value) {
                $query->where('p_operation_id', 3)->where('is_billed',$value);
            });
        }
    }

    public function company($value){

        return $this->whereHas('operations',function($q) use($value){
            $q->where('d_company_id',$value);
        });

    }

    public function clearedStep($value){
        return $this->where('cleared_step_order',$value);
    }

    public function step($value){
        return $this->where('current_step_order',$value);
    }

    public function dateRange($value){
        $dates=explode(',',$value);
        $start=Carbon::parse($dates[0]);
        $end=Carbon::parse($dates[1]);
        return $this->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end);
    }

    public function auditor($value){
        return $this->whereHas('operations', function($q)use($value){
            $q->where('d_company_id', $value);
        });
    }
    public function entreprise($value){
        return $this->whereHas('operations', function($q)use($value){
            $q->where('d_company_id', $value);
        });
    }
   
}
