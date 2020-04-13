<?php


namespace App\Transformers;


use App\Models\User;
use League\Fractal\TransformerAbstract;

class UsersTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name
        ];
    }
}
