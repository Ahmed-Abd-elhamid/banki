<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Account;

class ValidAccountNum implements Rule
{
    private $account_numbers;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account_numbers = Account::all('account_num')->pluck('account_num')->toarray();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $values)
    {
        foreach($values as $value){
            if(!is_numeric($value)) return false;
            if( strlen((string)$value) != 12) return false;
            if(!in_array($value, $this->account_numbers)) return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unavailable account Number!';
    }
}
