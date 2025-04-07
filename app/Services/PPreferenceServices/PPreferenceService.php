<?php

namespace App\Services\PPreferenceServices;

use App\Models\PPreference;

use Illuminate\Database\Eloquent\Collection;

class PPreferenceService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return PPreference::create($data);
    }

    public function edit(array $data, PPreference $pPreference)
    {
        return  $pPreference->update($data);
    }

    public function delete(PPreference $pPreference): void
    {
        $pPreference->delete();
    }

    public function getById(int $id)
    {
        return PPreference::find($id);
    }

    public function getAll($filters)
    {
        return collection(new PPreference(), $filters);
    }

    public function getFirst($filters = [])
    {
        return PPreference::filter($filters)->first();
    }
}
