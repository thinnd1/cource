<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getSignup()
    {
        return view('layout.signup');
    }
    public function signup(Request $request)
    {
        $user = $request->all();
        $this->user->createUser($user);

        return redirect()->route('login');
    }
    public function getLogin()
    {
        return view('layout.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // login thành công
            // check xem user này thuộc cái nào. và chuyển hướng tới cái đó.

            if (Auth::user()->user_type == User::ADMIN) {
                return redirect()->route('getListUser')->with('key', 'Login Successful');
            }
            elseif (Auth::user()->user_type == User::TEACHER) {
                return redirect()->route('getInformationLecture')->with('key', 'Login Successful');
            }
            elseif (Auth::user()->user_type == User::STUDENT) {
                return redirect()->route('getInformationStudent')->with('key', 'Login Successful');
            }
        } else {
            return redirect()->route('login')->with('error', 'Wrong user or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
