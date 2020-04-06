<?php


namespace App\FormRequests\User;


use App\FormRequests\IRFormRequest;

class UserRegisterRequest extends IRFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3'
        ];
    }

}
