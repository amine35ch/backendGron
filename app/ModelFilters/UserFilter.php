<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends ModelFilter
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
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }
            $query->orWhereHas('company',function($q)use ($value){
                $q->where('trade_name',$value);
            });
        });
    }

    public function role($roles)
    {
        $profiles = [
            'MAR',
            'INS',
            'AUD'
        ];

        $arrayRoles = explode(',', $roles);

        $rolesWithProfiles = [];

        foreach ($profiles as $profile) {
            $rolesWithProfiles = array_merge($rolesWithProfiles, array_map(function ($role) use ($profile) {
                return $profile . '::' . $role;
            }, $arrayRoles));
        }
        return $this->whereHas('roles', function ($q) use ($rolesWithProfiles) {
            $q->whereIn('name', $rolesWithProfiles);
        });
    }

    public function state($state)
    {
        return $this->where('state', $state);
    }

    public function auth($auth)
    {
        return $this->where('auth', $auth);
    }
    public function companyId($value)
    {
        return $this->where('userable_id', $value);
    }
}
