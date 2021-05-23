<?php

namespace App\Http\Controllers;

use App\Kosakata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KosakataController extends Controller
{
    public function index()
    {
        $data = Kosakata::where('user_id',Auth::user()->id)->get();
        // $kosakata = explode(",",$data->kosakata);
// return response()->json($kosakata);
        return view('siswa.kosakata.index',compact('data'));
    }
    public function created()
    {
        $data = Kosakata::where('user_id',Auth::user()->id)->get();

        return view('siswa.kosakata.create',compact('data'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'bahasa' => Str::title($request->bahasa),
            'arti' => $request->arti,
        ];
       Kosakata::create($data);
       Alert::success('Congratulations', 'Data Literasi Berhasil Diinput')->persistent(false)->autoClose(3000);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = Kosakata::findOrFail($id)->first(['image']);
        \File::delete('images/kosakata/'.$data->image);
        Kosakata::findOrFail($id)->delete();

        return redirect()->back();
    }
}
