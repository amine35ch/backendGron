<?php

namespace App\Services\DMailingServices;

use App\Enums\PMailingEnum\P_mailing_state;
use App\Enums\PMailingEnum\P_mailing_type;
use App\Models\DMailing;
use App\Models\PMailingSetting;
use App\Models\PNotification;
use Illuminate\Support\Facades\Log;

class DMailingService
{
    public function __construct(
    ) {
    }

    public function update(DMailing $dMailing, array $data): bool
    {
        return $dMailing->update($data);
    }


    /**
     * Get all mailings for a specific company.
     *
     * @param int $companyId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByCompany($filters)
    {
        $companyId = auth()->user()->company->id;
        $dMailings = Dmailing::where('d_company_id', $companyId);

        return collectionCustom(
            $dMailings,
            $filters,
            ['notification']
        );
    }
    public function canMail($filters, $company = null)
    {
        $company = $company ? $company : auth()->user()->company;

        $pMailings = PNotification::when(isset($filters['subject']), function ($query) use ($filters) {
            return $query->where('subject', $filters['subject']);
        })
            ->when(isset($filters['entitled']), function ($query) use ($filters) {
                return $query->where('entitled', $filters['entitled']);
            })->when(isset($filters['reference']), function ($query) use ($filters) {
                return $query->where('reference', $filters['reference']);
            })
            ->first();
        $dMailings = Dmailing::query()
            ->where('d_company_id', $company->id)
            ->where('p_notification_id', $pMailings->id)
            ->first();
        return $dMailings->status === (string) P_mailing_type::ENABLED->value && $pMailings->mail === P_mailing_state::ISMAILABLE->value;
    }

    public function canNotify($filters, $company = null)
    {
        $company = $company ? $company : auth()->user()->company;

        $pMailings = PNotification::when(isset($filters['subject']), function ($query) use ($filters) {
            return $query->where('subject', $filters['subject']);
        })
            ->when(isset($filters['entitled']), function ($query) use ($filters) {
                return $query->where('entitled', $filters['entitled']);
            })->when(isset($filters['reference']), function ($query) use ($filters) {
                return $query->where('reference', $filters['reference']);
            })
            ->first();
        $dMailings = Dmailing::query()
            ->where('d_company_id', $company->id)
            ->where('p_notification_id', $pMailings->id)
            ->first();
        return $dMailings->status === (string) P_mailing_type::ENABLED->value && $pMailings->mail === P_mailing_state::ISMAILABLE->value;
    }
}
