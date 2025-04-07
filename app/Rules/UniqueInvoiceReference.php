<?php

namespace App\Rules;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Models\DProjectInvoiceHeader;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueInvoiceReference implements ValidationRule
{
    public $reference;
    public $installer;
    public $d_project_id;
    public function __construct($installer,$reference,$d_project_id)
    {
        $this->installer = $installer;
        $this->reference = $reference;
        $this->d_project_id = $d_project_id;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dProjectInvoiceHeader=DProjectInvoiceHeader::where('d_company_id',$this->installer)->get();
        $invoice=$dProjectInvoiceHeader->where('d_project_id',$this->d_project_id)->first();
        $invoice=$invoice?->project->invoices->where(
            'type',
            DInvoiceHeaderType::INSTALLER->value
        )->first();
        $references=$dProjectInvoiceHeader->pluck('reference')->toArray();
        if (in_array($this->reference,$references) && !$invoice) {
            $fail("La valeur du champ reference est déjà utilisée.");
        }
    }
}
