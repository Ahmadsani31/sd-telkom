<?php

namespace App\Http\Controllers;

use App\Kosakata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
        return view('siswa.kosakata.create');
    }

    public function store(Request $request)
    {

        $image_parts = str_replace('data:image/jpeg;base64,','', $request->image);
        $image_base64 = base64_decode($image_parts);
        $fileName = 'kosakata-'.date('YmdHis') . '.jpeg';
        file_put_contents(public_path('images/kosakata/').$fileName,$image_base64);

        $data = [
            'user_id' => Auth::user()->id,
            'bahasa' => Str::title($request->bahasa),
            'kosakata' => $request->vacabularies,
            'image' => $fileName,
        ];
       $success =  Kosakata::create($data);

        return response()->json($success);
    }

    public function destroy($id)
    {
        $data = Kosakata::findOrFail($id)->first(['image']);
        \File::delete('images/kosakata/'.$data->image);
        Kosakata::findOrFail($id)->delete();

        return redirect()->back();
    }
}
