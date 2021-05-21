<?php

namespace App\Http\Requests;

use App\Rules\UserBalanceRule;
use App\Rules\UserConsumerRule;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'payer_user_id' => ['required',
                                    'integer',
                                    'exists:users,id',
                                    'different:payee_user_id',
                                    new UserConsumerRule,
                                    new UserBalanceRule
                ],
                'payee_user_id' => ['required',
                                    'integer',
                                    'exists:users,id',
                                    'different:payer_user_id'
                ],
                'value'         => ['required',
                                    'numeric',
                                    'min:0.01'
                ]
            ];
    }
}
