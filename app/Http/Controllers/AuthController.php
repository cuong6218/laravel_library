<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $users = $this->userService->getAll();
        foreach($users as $user)
            if($user->name === $request->name && $request->password === $user->password )
            {
                Session::put('isAuth', true);
                Session::put('userLogin', $user);
                return redirect()->route('dashboard.index');
            } else return back();
    }


    public function logout()
    {
        Session::remove('isAuth');
        return redirect()->route('auth.showLogin');
    }
}
