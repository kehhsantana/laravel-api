<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'name'  => 'required|string|exists:users,id',
                Rule::unique('users', 'email')->ignore($this->user),
            'email' => 'required|email',
            'document' => 'required', 
                Rule::unique('users', 'document')->ignore($this->user),
            'wallet' => 'required|numeric',
            'password' => 'required|min:8|string'
        ];
    }
}