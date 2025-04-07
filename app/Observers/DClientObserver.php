<?php

namespace App\Observers;

use App\Enums\PStateEnum\PStateEnum;
use App\Enums\PTypeClientsEnum\PTypeClientsEnum;
use App\Exceptions\CustomException;
use App\Models\DClient;
use App\Models\DCompany;

class DClientObserver
{
    /**
     * Handle the DClient "creating" event.
     */
    public function creating(DClient $dClient): void
    {

        $dClient->reference = getNextReference(class_basename($dClient::class));
        if (auth()->user()) {
            $dClient->d_company_id = auth()->user()->userable_id;
        } else {
            $company = DCompany::where('linkToken', $dClient->token)->first();
            $dClient->d_company_id = $company->id;
            $dClient->type = PTypeClientsEnum::PORSPET->value;

        }
        $dClient->code = generateRandomUniqueCode('client');
        $dClient->state = PStateEnum::ACTIVATED->value;
    }

    /**
     * Handle the DClient "created" event.
     */
    public function created(DClient $dClient): void
    {
        if (auth()->user()) {

            setLog(__(
                'logs.client.create',
                [
                    'reference' => $dClient->reference,
                    'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name
                ]
            ));
        } else {
            setLog(__(
                'logs.client.create',
                [
                    'reference' => $dClient->reference,
                    'admin' => $dClient->first_name . ' ' . $dClient->last_name
                ]
            ));
        }
    }

    /**
     * Handle the DClient "updated" event.
     */
    public function updated(DClient $dClient): void
    {
        setLog(__(
            'logs.client.update',
            [
                'reference' => $dClient->reference,
                'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name
            ]
        ));
    }

    /**
     * Handle the DClient "deleted" event.
     */
    public function deleting(DClient $dClient): void
    {

        if (!$dClient->projects->isEmpty() && $dClient["type"] === 1) {
            throw new CustomException('Vous ne pouvez pas supprimer cet client car il contient des projets');
        }
        setLog(__(
            'logs.client.delete',
            [
                'reference' => $dClient->reference,
                'admin' => auth()->user()->first_name . ' ' . auth()->user()->last_name
            ]
        ));
    }

    /**
     * Handle the DClient "restored" event.
     */
    public function restored(DClient $dClient): void
    {
        //
    }

    /**
     * Handle the DClient "force deleted" event.
     */
    public function forceDeleted(DClient $dClient): void
    {
        //
    }
}
