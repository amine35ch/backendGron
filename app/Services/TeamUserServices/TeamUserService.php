<?php

namespace App\Services\TeamUserServices;

use App\Models\TeamUser;

class TeamUserService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return TeamUser::create($data);
    }

    public function edit(array $data, TeamUser $teamUser)
    {
        return $teamUser->update($data);
    }

    public function delete(TeamUser $teamUser): void
    {
        $teamUser->delete();
    }

    public function getById(int $id)
    {
        return TeamUser::find($id);
    }

    public function getAll($filters)
    {
        return collection(new TeamUser(), $filters);
    }
}
