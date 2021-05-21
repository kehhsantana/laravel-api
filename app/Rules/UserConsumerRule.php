<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Users\Users;

class UserConsumerRule implements Rule
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

        if($user->user_type_id <> 1) {
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
        return 'The: attribute must be an consumer user.';
    }
}
