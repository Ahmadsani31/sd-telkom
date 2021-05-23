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
        $data = Literasi::where('user_id',$siswa_id->siswa_id)->paginate(5);
        $mengaji = Mengaji::where('user_id',$siswa_id->siswa_id)->get();
        $sholat = Sholat::where('user_id',$siswa_id->siswa_id)->simplePaginate(5);

        // $sholat = collect(
        //     ['sholat' => 'subuh'],
        //     ['sholat' => 'dzuhur'],
        //     ['sholat' => 'ashar'],
        //     ['sholat' => 'maghrib'],
        //     ['sholat' => 'isya'],
        // );
        // $grouped = $sholat->groupBy('sholat');

        // $grouped->all();
        // $users = DB::table('sholat')
        // ->select(DB::raw('count(*) as user_count, level'))
        // ->where('level', '<>', 1)
        // ->groupBy('level')
        // ->get();

        // $users = DB::table('sholats')
        // ->groupBy('created_at')
        // ->get();
        // dd($grouped);
        return view('ortu.anak.index', compact('data','mengaji','sholat'));
    }
}
