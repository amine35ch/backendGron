<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class DCompanyFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     */
    public function search($value)
    {
        $query = $this;
        $fillableColumns = $query->getModel()->getFillable();

        return $query->where(function (Builder $query) use ($fillableColumns, $value) {
            foreach ($fillableColumns as $column) {
                $query->orWhere($column, 'LIKE', '%'.$value.'%');
            }
        });
    }

    public function type($profiles)
    {
        $arrayProfiles = explode(',', $profiles);
        return $this->whereIn('profile', $arrayProfiles);
    }

    public function state($state)
    {
        return $this->where('state', $state);
    }

    public function operations($ids)
    {
        $arrayIds = explode(',', $ids);

        return $this->whereHas('operations', function ($query) use ($arrayIds) {
            $query->whereIn('p_operation_id', $arrayIds);
        });
    }


}
