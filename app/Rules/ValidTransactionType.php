<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTransactionType implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            if(!in_array(strtoupper($value), ['WITHDRAW', 'DEPOSITE'])) return false;
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
        return 'Invalid Transactions type';
    }
}
