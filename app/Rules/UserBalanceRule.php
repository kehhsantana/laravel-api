<?php

namespace App\Rules;

use App\Models\Users\Users;
use Illuminate\Contracts\Validation\Rule;

class UserBalanceRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = Users::find($value);

        if($user->wallet < $value) {
           return false;
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
        return 'Insufficient balance.';
    }
}
