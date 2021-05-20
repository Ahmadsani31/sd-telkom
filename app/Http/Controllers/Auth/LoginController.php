<?php

namespace App\Http\Controllers\Auth;

use App\BioSiswa;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {

        return view('auth.login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        switch(Auth::user()->level){
            case 'admin':
                $this->redirectTo = '/admin/home';
                return $this->redirectTo;
            break;

            case 'guru':
                $this->redirectTo = '/guru/home';
                return $this->redirectTo;
            break;

            case 'siswa':
                $this->redirectTo = '/siswa/home';
                return $this->redirectTo;
            break;

            case 'ortu':
                $this->redirectTo = '/ortu/home';
                return $this->redirectTo;
            break;

            default:
                $this->redirectTo = '/login/home';
                return $this->redirectTo;
            break;

        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
