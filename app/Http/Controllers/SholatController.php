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
use Illuminate\Support\Facades\Storage;


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

        // dd($request);
        if ($request->hasFile('video')) {

            $file = $request->file('video');
            $path = 'sholat/';
            // $destinationPath = 'images/vidio/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = 'mp4';

            $fileNameToStore = preg_replace('/\s+/', '_', $filename . '_' . time() . '.' . $extension);

            Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);
            // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // $file->move($destinationPath, $fileNameToStore);


                $data = [
                    'user_id' => Auth::user()->id,
                    'nama_sholat' => $request->nama_sholat,
                    'jadwal_sholat' => $request->waktu_sholat,
                    'waktu_sholat' => Carbon::now()->format('H:i'),
                    'vidio_sholat' => $fileNameToStore,
                    'rating' => $request->rating
                ];
                $nilai =  Sholat::create($data);
                    Alert::success('Congratulations', 'Waktu Sholat Berhasil Diinput')->persistent(false)->autoClose(3000);
                    return response()->json($nilai);

            // return  response()->json(['success' => ($media) ? 1 : 0, 'message' => ($media) ? 'Video uploaded successfully.' : "Some thing went wrong. Try again !."]);
        }
    }

    public function dataSholat()
    {
        $time = Carbon::now()->format('H:i');

        $year = Carbon::now()->format('Y');
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');

        $schedule= Http::get('https://api.myquran.com/v1/sholat/jadwal/0314/'.$year.'/'.$month.'/'.$day.'')->json()['data']['jadwal'];
       $data_subuh =  Sholat::where('nama_sholat','subuh')->exists();
       $data_subuh =  Sholat::where('nama_sholat','dzuhur')->exists();
       $data_subuh =  Sholat::where('nama_sholat','ashar')->exists();
       $data_subuh =  Sholat::where('nama_sholat','maghrib')->exists();
       $data_subuh =  Sholat::where('nama_sholat','isya')->exists();
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
