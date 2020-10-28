<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidBalance implements Rule
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
            if(is_null($value)) return false;
            if($value < 50) return false;
            if($value > 10000000) return false;
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
        return 'Balance must be between 50:10000000';
    }
}
