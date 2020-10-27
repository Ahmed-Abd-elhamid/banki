<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidAccountType implements Rule
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
    public function passes($attribute, $value)
    {
        return in_array(strtoupper($value), [
            'SAVING',
            'CURRENT',
            'CREDIT', 
            'JOINT'
          ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Type must be in this types ("saving",currnet","credit","joint") only!';
    }

}
