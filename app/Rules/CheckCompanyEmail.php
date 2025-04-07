<?php

namespace App\Rules;

use App\Models\DCompany;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCompanyEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $email;
    public $id;

    public function __construct($email,$id)
    {
        $this->email = $email;
        $this->id = $id;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $company =DCompany::find($this->id);
        if ($company->profile!=="MAN") {
            $adminUsers = $company->admins;
            $flag=false;
            foreach ($adminUsers as $key => $admin) {
                if ($admin->email == $this->email) {
                    $flag=true;
                }
            }
            if (!$flag) {
                $fail('L\'email de l\'entreprise doit être identique à l\'un des e-mails des administrateurs.');
            }
        }

    }
}
