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
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class OrtuController extends Controller
{
    public function index()
    {
        // $data = User::all();

        // dd($data->count());

        $siswa_id = BioOrtu::where('user_id',Auth::user()->id)->first(['siswa_id']);

        $siswa = DB::table('bio_ortus')
                        ->join('users', 'bio_ortus.siswa_id', '=', 'users.id')
                        ->where('user_id',Auth::user()->id)
                        ->first();


        $literasi = DB::table('literasis')
            ->join('users', 'literasis.user_id', '=', 'users.id')
            ->where('user_id',$siswa_id->siswa_id)
            ->whereDate('literasis.created_at','=',date('Y-m-d'))->simplePaginate(5);


        $mengaji = DB::table('mengajis')
        ->orderBy('mengajis.id', 'desc')
        ->join('users', 'mengajis.user_id', '=', 'users.id')
        ->where('user_id',$siswa_id->siswa_id)
        ->whereDate('mengajis.created_at','=',date('Y-m-d'))->simplePaginate(5);

        $kosakata = DB::table('kosakatas')
        ->join('users', 'kosakatas.user_id', '=', 'users.id')
        ->where('user_id',$siswa_id->siswa_id)
        ->whereDate('kosakatas.created_at','=',date('Y-m-d'))->simplePaginate(5);

        $sholat = DB::table('sholats')
        ->join('users', 'sholats.user_id', '=', 'users.id')
        ->where('user_id',$siswa_id->siswa_id)
        ->where('status','=',0)
        ->whereDate('sholats.created_at','=',date('Y-m-d'))
        ->orderBy('sholats.id', 'asc')
        ->simplePaginate(1);

        return view('ortu.home',compact('siswa','sholat', 'mengaji','literasi','kosakata'));
    }

    public function getVidioSholat(Sholat $id)
    {
        $name = $id->vidio_sholat;
        $fileContents = Storage::disk('public')->get("sholat/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

    public function getVidioNgaji(Mengaji $id)
    {
        $name = $id->vidio_ngaji;
        $fileContents = Storage::disk('public')->get("mengaji/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

    public function getVidioLiterasi(Literasi $id)
    {
        $name = $id->vidio;
        $fileContents = Storage::disk('public')->get("literasi/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

}
