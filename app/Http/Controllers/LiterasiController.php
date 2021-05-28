<?php

namespace App\Http\Controllers;

use App\Literasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        if ($request->hasFile('video')) {

            // dd($request->star);
            $file = $request->file('video');
            $path = 'literasi/';
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
                'nama_buku' => Str::title($request->nama_buku),
                'halaman' => $request->halaman,
                'jumlah_paragraf' => $request->jumlah_paragraf,
                'vidio' => $fileNameToStore,
                'emotion' => $request->star,
                'status' => 0,
            ];
                Literasi::create($data);
                    Alert::success('Congratulations', 'Data Literasi Berhasil Diinput')->persistent(false)->autoClose(3000);
                    // return response()->json($data);/
                return json_encode(['success'=>'Data input successfully.'],200);

        }
    }

    public function destroy($id)
    {
        $data = Literasi::findOrFail($id)->first(['cover_buku']);
        \File::delete('images/literasi/'.$data->cover_buku);
        Literasi::findOrFail($id)->delete();

        return redirect()->back()->with();
    }
}
