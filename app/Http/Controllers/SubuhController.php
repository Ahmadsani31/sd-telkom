<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SubuhController extends Controller
{
    public function index()
    {
        $time   = Carbon::now()->format('H:i');

        $year   = Carbon::now()->format('Y');
        $day    = Carbon::now()->format('d');
        $month  = Carbon::now()->format('m');

        $schedule= Http::get('https://api.myquran.com/v1/sholat/jadwal/0314/'.$year.'/'.$month.'/'.$day.'')->json()['data']['jadwal'];

        if ($time >= $schedule['subuh'] && $time <= $schedule['dzuhur']) {
            $nilai = "Dzuhur";
        }else if($time >= $schedule['dzuhur'] && $time <= $schedule['ashar']){
            $nilai = "Ashar";
        }else if($time > $schedule['ashar'] && $time <= $schedule['maghrib']){
            $nilai = "Maghrib";
        }else if($time > $schedule['maghrib'] && $time <= $schedule['isya']){
            $nilai = "Isya";
        }else {
            $nilai = "Subuh";

        }
        return view('siswa.sholat.subuh',compact('schedule','time','nilai'));
    }
}
