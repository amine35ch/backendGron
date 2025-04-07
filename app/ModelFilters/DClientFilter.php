<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DClientFilter extends ModelFilter
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
            $query->orWhere(DB::raw('CONCAT_WS(" ", house_number, street)'), 'LIKE', '%'.$value.'%');
            $query->orWhere(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'LIKE', '%'.$value.'%');
            $query->orWhere(DB::raw('CONCAT_WS(" ", last_name, first_name)'), 'LIKE', '%'.$value.'%');
        });
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }

    public function state($state)
    {
        return $this->where('state', $state);
    }
}
