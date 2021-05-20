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
    public function index()
    {
       $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);
// dd($siswa_id->siswa_id);
        $data = Literasi::where('user_id',$siswa_id->siswa_id)->get();
        $mengaji = Mengaji::where('user_id',$siswa_id->siswa_id)->get();
        $sholat = Sholat::where('user_id',$siswa_id->siswa_id)->get();
        $users = DB::table('users')
        ->select(DB::raw('count(*) as user_count, level'))
        ->where('level', '<>', 1)
        ->groupBy('level')
        ->get();
        // dd($users);
        return view('ortu.anak.index', compact('data','mengaji','sholat'));
    }
}
