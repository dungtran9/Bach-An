<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    public function checkAccount($user)
    {
        return Auth::attempt($user);
    }
}
