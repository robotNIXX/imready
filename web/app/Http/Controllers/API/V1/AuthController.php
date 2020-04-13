<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use App\Http\FormRequests\User\UserLoginRequest;
use App\Http\FormRequests\User\UserRegisterRequest;
use App\Models\User;
use App\Transformers\UsersTransformer;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class AuthController extends APIController
{
    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $this->response->accepted();
    }

    /**
     * Login user and return a token
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->response->noContent()->withHeader('Authorization', $token);
        }
        return $this->response->error('login_error', 401);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return $this->response->noContent();
    }

    /**
     * Get authenticated user
     */
    public function user()
    {
        $user = User::find(\Auth::user()->id);
        return $this->response->item($user, new UsersTransformer);
    }

    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return $this->response->noContent()->withHeader('Authorization', $token);
        }
        return $this->response->error('login_error', 401);
    }

    /**
     * Return auth guard
     */
    private function guard()
    {
        return \Auth::guard();
    }
}
