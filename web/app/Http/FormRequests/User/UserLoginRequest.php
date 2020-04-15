<?php


namespace App\Http\FormRequests\User;


use App\Http\FormRequests\IRFormRequest;

class UserLoginRequest extends IRFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }
}
