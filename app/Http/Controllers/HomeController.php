<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->level == "admin") {
                return redirect()->route('admin.home');
            }elseif(Auth::user()->level == "guru"){
                return redirect()->route('guru.home');
            }elseif(Auth::user()->level == "ortu"){
                return redirect()->route('ortu.home');
            }elseif(Auth::user()->level == "siswa"){
                return redirect()->route('siswa.home');
            }
        }else{
            return redirect()->route('login');
        }
        return view('login');
    }
}
