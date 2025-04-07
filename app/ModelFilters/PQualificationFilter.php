<?php

namespace App\ModelFilters;

use App\Enums\DCompanyEnum\DCompanyProfile;
use Illuminate\Database\Eloquent\Builder;
use EloquentFilter\ModelFilter;


class PQualificationFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     *
     */
    public function search($value)
    {
        $query = $this;
        $fillableColumns = $query->getModel()->getFillable();
        return $query->where(function (Builder $query) use ($fillableColumns, $value) {
            foreach ($fillableColumns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }
        });
    }

    public function type($value){
       if ($value == DCompanyProfile::MAR->value) {
            return $this->whereHas('operations',function($q){
                $q->where('type',0);
            });
       }
        if ($value == DCompanyProfile::INS->value) {
            return $this->whereHas('operations',function($q){
                $q->where('type',2);
            });
        }
        if ($value == DCompanyProfile::AUD->value) {
            return $this->whereHas('operations',function($q){
                $q->where('type',1);
            });
        }
    }
}
