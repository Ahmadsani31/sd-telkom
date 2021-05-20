<?php

namespace App\Http\Controllers;

use App\Literasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

class LiterasiController extends Controller
{
    public function index()
    {
        $data = Literasi::where('user_id',Auth::user()->id)->get();
        return view('siswa.literasi.index', compact('data'));
    }

    public function created()
    {
        return view('siswa.literasi.create');
    }

    public function store(Request $request)
    {

        $image_parts = str_replace('data:image/jpeg;base64,','', $request->image);
        $image_base64 = base64_decode($image_parts);
        $fileName = 'literasi-'.date('YmdHis') . '.jpeg';
        file_put_contents(public_path('images/literasi/').$fileName,$image_base64);

        $data = [
            'user_id' => Auth::user()->id,
            'nama_buku' => Str::title($request->nama),
            'halaman' => $request->halaman,
            'paragraf_awal' => $request->p_awal,
            'paragraf_akhir' => $request->p_akhir,
            'cover_buku' => $fileName,
        ];
       $success =  Literasi::create($data);

        return response()->json($success);
    }

    public function destroy($id)
    {
        $data = Literasi::findOrFail($id)->first(['cover_buku']);
        \File::delete('images/literasi/'.$data->cover_buku);
        Literasi::findOrFail($id)->delete();

        return redirect()->back();
    }
}
