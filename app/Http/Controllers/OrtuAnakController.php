<?php

namespace App\Http\Controllers;

use App\BioOrtu;
use App\Literasi;
use App\Mengaji;
use App\Sholat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrtuAnakController extends Controller
{

    function id_siswa(){
        $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);
        return $siswa_id->siswa_id;

    }

    public function index()
    {

        return view('ortu.anak.index');
    }

    public function sholat()
    {
       $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first();

       $sholat = Sholat::where('user_id',$siswa_id->siswa_id)
       ->where('status','=',0)
       ->whereDate('created_at','=',date('Y-m-d'))
       ->orderBy('id', 'desc')
       ->get();


        return view('ortu.anak.sholat', compact('sholat'));
    }

    public function mengaji()
    {
       $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first();

       $mengaji = Mengaji::where('user_id',$siswa_id->siswa_id)
       ->where('status','=',0)
       ->whereDate('created_at','=',date('Y-m-d'))
       ->orderBy('id', 'desc')
       ->get();


       return view('ortu.anak.mengaji', compact('mengaji'));
    }

    public function literasi()
    {
       $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);

       $literasi = Literasi::where('user_id',$siswa_id->siswa_id)
       ->where('status','=',0)
       ->whereDate('created_at','=',date('Y-m-d'))
       ->orderBy('id', 'desc')
       ->get();

        return view('ortu.anak.literasi', compact('literasi'));
    }

    public function kosaKata()
    {
       $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);
       $kosakata = DB::table('kosakatas')
       ->join('users', 'kosakatas.user_id', '=', 'users.id')
       ->where('user_id',$siswa_id->siswa_id)
       ->where('status','=',0)
       ->whereDate('kosakatas.created_at','=',date('Y-m-d'))
       ->orderBy('kosakatas.id', 'desc')
       ->get();

        return view('ortu.anak.kosakata', compact('kosakata'));
    }
}
