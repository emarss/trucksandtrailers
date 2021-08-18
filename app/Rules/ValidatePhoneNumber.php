<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidatePhoneNumber implements Rule
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
        if(preg_match("/^[+]?[1-9][0-9]{9,14}$/", $value) == 1){
            return true;
        }elseif(empty($value) || $value == null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute should be a valid phone number. e.g +263774671339';
    }
}
