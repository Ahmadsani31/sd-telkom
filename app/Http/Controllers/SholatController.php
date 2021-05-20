<?php

namespace App\Http\Controllers;

use App\Events\Notif;
use App\Sholat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class SholatController extends Controller
{
    public function index()
    {

        // $cities= Http::get('https://api.myquran.com/v1/sholat/kota/id/0314')->json();

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


        // return response()->json($time);
        return view('siswa.sholat.index',compact('schedule','time','nilai'));
    }

    public function store(Request $request)
    {
        // return response()->json($request);

        // DB::transaction(function () {

        // });
        $image_parts = str_replace('data:image/jpeg;base64,','', $request->image);
        $image_base64 = base64_decode($image_parts);
        $fileName = 'sholat-'.date('YmdHis') . '.jpeg';
        file_put_contents(public_path('images/sholat/').$fileName,$image_base64);

        $data = [
            'user_id' => Auth::user()->id,
            'sholat' => $request->sholat,
            'waktu_sholat' => $request->waktu_sholat,
            'image' => $fileName,
            'rating' => $request->star
        ];
        $nilai =  Sholat::create($data);
            Alert::success('Congratulations', 'Waktu Sholat Berhasil Diinput')->persistent(false)->autoClose(2000);

        return response()->json($nilai);
    }

    public function dataSholat()
    {
        $time = Carbon::now()->format('H:i');

        $year = Carbon::now()->format('Y');
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');

        $schedule= Http::get('https://api.myquran.com/v1/sholat/jadwal/0314/'.$year.'/'.$month.'/'.$day.'')->json()['data']['jadwal'];
       $data_subuh =  Sholat::where('sholat','subuh')->exists();
       $data_subuh =  Sholat::where('sholat','dzuhur')->exists();
       $data_subuh =  Sholat::where('sholat','ashar')->exists();
       $data_subuh =  Sholat::where('sholat','maghrib')->exists();
       $data_subuh =  Sholat::where('sholat','isya')->exists();
        $data =[
            'subuh'=> $schedule['subuh'],
            'dzuhur'=> $schedule['dzuhur'],
            'ashar'=> $schedule['ashar'],
            'maghrib'=> $schedule['maghrib'],
            'isya'=> $schedule['isya'],
            'waktu_sekarang' => $time,
    ];

        return response()->json($data);
    }
}
