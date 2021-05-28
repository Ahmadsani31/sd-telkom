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


        $subuh = DB::table('sholats')->where('user_id',Auth::user()->id)
                        ->where('nama_sholat','=','subuh')
                        ->whereDate('created_at','>=',date('Y-m-d'))->first();

        $dzuhur = DB::table('sholats')->where('user_id',Auth::user()->id)
                        ->where('nama_sholat','=','dzuhur')
                        ->whereDate('created_at','>=',date('Y-m-d'))->first();

        $ashar = DB::table('sholats')->where('user_id',Auth::user()->id)
                        ->where('nama_sholat','=','ashar')
                        ->whereDate('created_at','>=',date('Y-m-d'))->first();

        $maghrib = DB::table('sholats')->where('user_id',Auth::user()->id)
                        ->where('nama_sholat','=','maghrib')
                        ->whereDate('created_at','>=',date('Y-m-d'))->first();

        $isya = DB::table('sholats')->where('user_id',Auth::user()->id)
                        ->where('nama_sholat','=','isya')
                        ->whereDate('created_at','>=',date('Y-m-d'))->first();


        // $time = $isya->jadwal_sholat;
        // $time_a = strtotime("0 minutes", strtotime($time));
        // $time_b = strtotime("+15 minutes", $time_a);
        // $time_c = strtotime("+15 minutes", $time_b);

// dd($time);

        // dd(date('H:i',$time_a));
        // if ($subuh->waktu_sholat >= $time && $subuh->waktu_sholat <= date('h:i',$time_a)) {
        //     return "nilai A";
        // } else if($subuh->waktu_sholat >= date('h:i',$time_a) && $subuh->waktu_sholat <= date('h:i',$time_b)){
        //     return "nilai B";

        // }else if($subuh->waktu_sholat >= date('h:i',$time_b) && $subuh->waktu_sholat <= date('h:i',$time_c)){
        //     return "nilai C";

        // }

        // dd($time->addMinutes(20));

// if ($p = $subuh->created_at >= date('Y-m-d').' 05:14:00') {
//     $hasil = 'sama';
// } else {
//     # code...
// }


        return view('siswa.home', compact('schedule','subuh','dzuhur','ashar','maghrib','isya'));
    }
}
