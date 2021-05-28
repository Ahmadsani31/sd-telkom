<?php

namespace App\Http\Controllers;

use App\Kosakata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $waktu_sekarang = Carbon::now()->format('d');
        $waktu_sekarang = Carbon::now()->toDateString();
//         $emotion = DB::table('kosakatas')->where('user_id',Auth::user()->id)->select('emotion')->latest()->first();
// dd($emotion->emotion);
        $data = DB::table('kosakatas')->where('user_id',Auth::user()->id)->where('created_at','>=',date('Y-m-d').' 00:00:00')->get();

        // $data = Kosakata::where('user_id',Auth::user()->id)->get();
// dd($data);

        return view('siswa.kosakata.create',compact('data'));
    }

    public function store(Request $request)
    {
        // dd();
        if (DB::table('kosakatas')->select('emotion')
                                  ->where('user_id',Auth::user()->id)
                                  ->whereDate('created_at','>=',date('Y-m-d'))
                                  ->exists()) {
        $emotion = DB::table('kosakatas')->where('user_id',Auth::user()->id)->select('emotion')->latest()->first();
        $rules = [
            'bahasa'              => 'required|unique:kosakatas,bahasa',
            'arti'              => 'required|unique:kosakatas,arti'
        ];

        $messages = [
            'bahasa.unique'          => $request->bahasa,
            'arti.unique'          => $request->arti,

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'user_id' => Auth::user()->id,
            'bahasa' => Str::title($request->bahasa),
            'arti' => Str::title($request->arti),
            'status' => 0,
            'emotion' => $emotion->emotion,

        ];
        Kosakata::create($data);

        } else {
            $data = [
                'user_id' => Auth::user()->id,
                'bahasa' => Str::title($request->bahasa),
                'arti' => $request->arti,
                'status' => 0,
                'emotion' => $request->star,
            ];
           Kosakata::create($data);
        }


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
