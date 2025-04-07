<?php

namespace App\Services\DProjectOccupantsServices;

use App\Models\DProjectOccupants;

class DProjectOccupantsService
{
    public function __construct(private DProjectOccupants $dProjectOccupants)
    {
    }

    public function create(array $data)
    {

        return $this->dProjectOccupants::create($data);
    }

    public function edit(array $data, DProjectOccupants $dProjectOccupants)
    {
        return $dProjectOccupants->update($data);
    }

    public function delete(DProjectOccupants $dProjectOccupants): void
    {
        $dProjectOccupants->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectOccupants::find($id);
    }

    public function getOccupants($dProject)
    {
        return $this->dProjectOccupants::where('d_project_id', $dProject->id)->get();
    }
}
