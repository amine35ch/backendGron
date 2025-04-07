<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class POperationFilter extends ModelFilter
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

    public function intern($value)
    {
        return $this->where('intern', $value);
    }

    public function scenario($value)
    {
        return $this->where('scenario', $value);
    }

    public function state($state)
    {
        return $this->where('state', $state);
    }
}
