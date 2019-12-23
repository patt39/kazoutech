<?php


namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneCmrRule implements Rule
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
        $regex = "/^((\+|00)?237)?6\d{2}\d{6,8}$/";
        $value = str_replace(' ', '', $value);
        return (bool)preg_match($regex, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.phone_cmr');
    }
}
