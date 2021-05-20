<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

            if (Auth::user()->level == "admin") {
                return $next($request);
            }elseif(Auth::user()->level == "guru") {
                return redirect()->route('guru.home');
            }elseif(Auth::user()->level == "siswa") {
                return redirect()->route('siswa.home');
            }elseif(Auth::user()->level == "ortu") {
                return redirect()->route('ortu.home');
            }

    }
}
