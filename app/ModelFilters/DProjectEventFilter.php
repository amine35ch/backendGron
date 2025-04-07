<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class DProjectEventFilter extends ModelFilter
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

    public function project($id)
    {
        return $this->where('d_project_id', $id);
    }

    public function visit($id)
    {
        return $this->where('d_project_visit_id', $id);
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }
}
