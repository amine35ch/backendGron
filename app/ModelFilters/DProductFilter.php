<?php

namespace App\ModelFilters;

use Illuminate\Database\Eloquent\Builder;
use EloquentFilter\ModelFilter;


class DProductFilter extends ModelFilter
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

    public function state($state)
    {
        $user = auth()->user();

        return $this->whereHas('productPrices', function ($query) use ($user, $state) {
            $query->where('d_company_id', $user->userable_id)->where('state', $state);
        });
    }
    public function valid($value)
    {
        return $this->where('is_validated',$value);
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }

    public function access($value)
    {
        return $this->where('access', $value);
    }
}
