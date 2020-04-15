<?php

namespace App\Http\FormRequests\User;

use App\Http\FormRequests\IRFormRequest;

class UserRegisterRequest extends IRFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3'
        ];
    }

}
