<?php

namespace App\Http\Controllers;

use App\BioOrtu;
use App\Sholat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    public function index()
    {
        $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);

        $sholat = Sholat::where('user_id',$siswa_id->siswa_id)->simplePaginate(5);

        return view('ortu.home',compact('sholat'));
    }
}
