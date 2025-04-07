<?php

namespace App\Observers;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DInvoiceEnum\DInvoicePayedStatus;
use App\Enums\DInvoiceEnum\DInvoiceType;
use App\Enums\DProjectEnum\DProjectInvoiceEnum;
use App\Exceptions\CustomException;
use App\Models\DProjectInvoiceHeader;

class DProjectInvoiceHeaderObserver
{
    /**
     * Handle the DProject "creating" event.
     */
    public function creating(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {

        if ($DProjectInvoiceHeader->type == DInvoiceHeaderType::MAR->value) {
            $companyId = auth()->user()->userable_id;
            $DProjectInvoiceHeader->reference = getNextInvoice($companyId, DInvoiceType::DEVIS->value);
        } else {
            $installer = $DProjectInvoiceHeader->project?->installer ?? null;
            if (! $installer) {
                throw new CustomException('Installateur non trouvé');
            }
                $DProjectInvoiceHeader->reference = getNextInvoice(
                    $DProjectInvoiceHeader->project->installer->d_company_id,
                    DInvoiceType::DEVIS->value
                );
        }

        $DProjectInvoiceHeader->creator = auth()->user()->id;
    }

    /**
     * Handle the DProject "created" event.
     */
    public function created(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {
        if ($DProjectInvoiceHeader->type == DInvoiceHeaderType::MAR->value) {
            $DProjectInvoiceHeader->project()->update([
                'invoice_mar' => DProjectInvoiceEnum::VALIDATED->value,
            ]);
        }

        if ($DProjectInvoiceHeader->type == DInvoiceHeaderType::INSTALLER->value) {
            $DProjectInvoiceHeader->project()->update([
                'invoice_installer' => DProjectInvoiceEnum::NOT_VALIDATED->value,
            ]);
        }

    }

    /**
     * Handle the DProject "updated" event.
     */
    public function updated(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {

        if ($DProjectInvoiceHeader->type == DInvoiceHeaderType::MAR->value) {
            if ($DProjectInvoiceHeader->is_billed == DInvoicePayedStatus::PAYED->value) {
                $DProjectInvoiceHeader->project()->update([
                    'invoice_mar' => DProjectInvoiceEnum::PAYED->value,
                ]);
            } else {
                $DProjectInvoiceHeader->project()->update([
                    'invoice_mar' => DProjectInvoiceEnum::VALIDATED->value,
                ]);
            }
        }
        if ($DProjectInvoiceHeader->type == DInvoiceHeaderType::INSTALLER->value) {
            if ($DProjectInvoiceHeader->is_billed == DInvoicePayedStatus::PAYED->value) {
                $DProjectInvoiceHeader->project()->update([
                    'invoice_installer' => DProjectInvoiceEnum::PAYED->value,
                ]);
            } else {
                $DProjectInvoiceHeader->project()->update([
                    'invoice_installer' => DProjectInvoiceEnum::VALIDATED->value,
                ]);
            }
        }
    }

    /**
     * Handle the DProject "deleted" event.
     */
    public function deleting(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {
    }

    /**
     * Handle the DProject "restored" event.
     */
    public function restored(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {
        //
    }

    /**
     * Handle the DProject "force deleted" event.
     */
    public function forceDeleted(DProjectInvoiceHeader $DProjectInvoiceHeader): void
    {
        //
    }
}
