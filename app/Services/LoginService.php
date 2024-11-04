<?php


namespace App\Services;
use App\Repositories\LoginRepository;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    protected $loginRepo;
    public function __construct(LoginRepository $loginRepo)
    {
        $this->loginRepo = $loginRepo;
    }

    public function login($request)
    {
        $user = [
            'name' => $request->email,
            'password' => $request->password
        ];

        return $this->loginRepo->checkAccount($user);
    }
}
