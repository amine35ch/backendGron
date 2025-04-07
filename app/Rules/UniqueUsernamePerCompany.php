<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueUsernamePerCompany implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public $username;
 
     public function __construct($username)
     {
         $this->username = $username;
 
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        $company=getCompanyOfConnectedUser();
        $user=User::where('username',$this->username)->where('userable_id',$company->id)->get();
        if (!$user->isEmpty()) {
            $fail('La valeur du champ identifiant est déjà utilisée.');
        }

    }
}
