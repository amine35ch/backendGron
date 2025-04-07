<?php

namespace App\Rules;

use App\Models\DCompany;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCompanyProfile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $types;

    public function __construct($types)
    {
        $this->types = $types;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $company = DCompany::find($value);
        if (! $company || ! in_array($company->profile, $this->types)) {

            $fail("Veuillez sélectionner l'entreprise qui correspond à cette visite");
        }
    }
}
