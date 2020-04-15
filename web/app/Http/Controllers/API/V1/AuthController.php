<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use App\Http\FormRequests\User\UserLoginRequest;
use App\Http\FormRequests\User\UserRegisterRequest;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Transformers\UsersTransformer;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class AuthController extends APIController
{

    protected $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request)
    {
        $this->usersRepository->save([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->response->accepted();
    }

    /**
     * Login user and return a token
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            $user = $this->usersRepository->findByField('email', $request->email)[0];
            return $this->response->item($user, new UsersTransformer)->withHeader('Authorization', $token);
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
