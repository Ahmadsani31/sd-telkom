<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsharController extends Controller
{
    public function index()
    {

        $time   = Carbon::now()->format('H:i');

        $year   = Carbon::now()->format('Y');
        $day    = Carbon::now()->format('d');
        $month  = Carbon::now()->format('m');

        $schedule= Http::get('https://api.myquran.com/v1/sholat/jadwal/0314/'.$year.'/'.$month.'/'.$day.'')->json()['data']['jadwal'];

        return view('siswa.sholat.ashar',compact('schedule','time'));
    }
}
