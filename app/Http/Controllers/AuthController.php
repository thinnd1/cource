<?php

namespace App\Http\Controllers;

use App\Formation;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;
    protected $formation;

    public function __construct(User $user, Formation $formation)
    {
        $this->user = $user;
        $this->formation = $formation;
    }

    public function getSignup()
    {
        $formation = $this->formation->getFormation();
        return view('layout.signup', ['formation' => $formation]);
    }

    public function signup(Request $request)
    {
        $user = $request->all();
        $this->user->register($user);

        return redirect()->route('login');
    }

    public function getLogin()
    {
        return view('layout.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->mdp ])) {

            if (Auth::user()->type == User::ADMIN) {
                return redirect()->route('getListUser')->with('key', 'Login Successful');
            }
            elseif (Auth::user()->type == User::TEACHER) {
                return redirect()->route('getInformationLecture')->with('key', 'Login Successful');
            }
            elseif (Auth::user()->type == User::STUDENT) {
                return redirect()->route('getInformationStudent')->with('key', 'Login Successful');
            }
        } else {
            return redirect()->route('login')->with('error', 'Wrong password or user');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
