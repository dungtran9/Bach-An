<?php

namespace App\Http\Controllers;

use App\Services\BillService;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;
    protected $billService;
    public function __construct(LoginService $loginService,
                                BillService $billService)
    {
        $this->loginService = $loginService;
        $this->billService = $billService;
    }
    public function dashboard()
    {

        $bills = $this->billService->getAll();

        return view('admin.dashboard', compact('bills'));
    }
    public function formLogin()
    {
        return view('admin.login');
    }

    public function login( Request $request)
    {
        if (!$this->loginService->login($request)) {
            return back();
        }
        $bills = $this->billService->getAll();

        return view('admin.dashboard', compact('bills'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
