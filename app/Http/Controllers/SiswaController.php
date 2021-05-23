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

        $subuh = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['subuh'])->latest('id')->first();
        $dzuhur = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['dzuhur'])->latest('id')->first();
        $ashar = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['ashar'])->latest('id')->first();
        $maghrib = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['maghrib'])->latest('id')->first();
        $isya = Sholat::where('user_id',Auth::user()->id)->whereIn('nama_sholat',['isya'])->latest('id')->first();

        $waktu_subuh = $subuh->created_at->format('Y-m-d');
        $waktu_dzuhur = $dzuhur->created_at->format('Y-m-d');
        $waktu_ashar = $ashar->created_at->format('Y-m-d');
        $waktu_maghrib = $maghrib->created_at->format('Y-m-d');
        $waktu_isya = $isya->created_at->format('Y-m-d');

        $waktu_sekarang = Carbon::now()->format('Y-m-d');

        // $s = DB::table('sholats')->where('user_id',Auth::user()->id)->whereIn('created_at', Carbon->now)
        // dd($sholat->nama_sholat);
        if ($waktu_subuh == $waktu_sekarang ) {
            $nilai = 100;
        }else{
            $nilai = 20;

        }
        return view('siswa.home', compact('nilai','schedule','subuh','dzuhur','ashar','maghrib','isya'));
    }
}
