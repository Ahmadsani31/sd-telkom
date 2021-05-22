<?php

namespace App\Http\Controllers;

use App\Sholat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SiswaController extends Controller
{
    public function index()
    {
        $time   = Carbon::now()->format('H:i');

        $year   = Carbon::now()->format('Y');
        $day    = Carbon::now()->format('d');
        $month  = Carbon::now()->format('m');

        $schedule= Http::get('https://api.myquran.com/v1/sholat/jadwal/0314/'.$year.'/'.$month.'/'.$day.'')->json()['data']['jadwal'];

        $sholat = Sholat::where('user_id',Auth::user()->id)->latest()->first();
        $sho = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['subuh'])->latest('id')->first();

        $waktu = $sho->created_at->format('Y-m-d');
// dd($waktu);
        $waktu_sekarang = Carbon::now()->format('Y-m-d');

        // $s = DB::table('sholats')->where('user_id',Auth::user()->id)->whereIn('created_at', Carbon->now)
        // dd($sholat->nama_sholat);
        if ($waktu == $waktu_sekarang ) {
            $nilai = 100;
            $nama = 'terlaksana';
        }else{
            $nilai = 0;
            $nama = 'belum-terlaksana';

        }
        return view('siswa.home', compact('nilai','nama','schedule'));
    }
}
