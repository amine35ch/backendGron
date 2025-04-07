<?php

namespace App\Rules;

use App\Models\DCompany;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCompanyTradeName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $tradeName;
    public $profile;
    public $id;

    public function __construct($tradeName,$profile,$id=null)
    {
        $this->tradeName = $tradeName;
        $this->profile = $profile;
        $this->id = $id;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $company =DCompany::self()->where('profile',$this->profile)->where('trade_name',$this->tradeName)->where('id','!=',$this->id)->first();
        if ($company) {
            $fail('Le raison social est déjà utilisée.');
        }
    }
}
