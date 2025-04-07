<?php

namespace App\Services\PSmtpServices;

use App\Models\PSmtp;

class PSmtpService
{
    public function __construct(private PSmtp $pSmtp)
    {
    }

    public function create(array $data)
    {
        return $this->pSmtp::create($data);
    }

    public function edit(array $data, PSmtp $pSmtp)
    {
        return $pSmtp->update($data);
    }

    public function editCompanySmtp(array $data)
    {
        $smtp = $this->pSmtp::find(getCompanyConnectedUser());
        $smtp->update($data);

        return $smtp;
    }

    public function delete(PSmtp $pSmtp): void
    {
        $pSmtp->delete();
    }

    public function getById(int $id)
    {
        return $this->pSmtp::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pSmtp, $filters);
    }

    public function getCompanySmtp()
    {
        return $this->pSmtp::find(getCompanyConnectedUser());
    }
}
