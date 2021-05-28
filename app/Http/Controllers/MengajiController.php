<?php

namespace App\Http\Controllers;

use App\Alquran;
use App\Mengaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MengajiController extends Controller
{
    public function index()
    {
        // $surat = Http::get('https://api.banghasan.com/quran/format/json/surat/3/ayat/190-193/bahasa/ar,id')->json()['ayat']['data'];

        // $ayat = Http::get('https://api.banghasan.com/quran/format/json/surat/4')->json()['hasil'];
        // return $ayat[0]['nama'];
        $ngaji = Mengaji::where('user_id',Auth::user()->id)->get();

        return view('siswa.mengaji.index',compact('ngaji'));
    }

    public function getAyat($id)
    {
        $ayat = Alquran::findOrFail($id);

        return json_encode($ayat);
    }

    public function store(Request $request)
    {
        $ayat = Http::get('https://api.banghasan.com/quran/format/json/surat/'.$request->surat)->json()['hasil'];
        $nama = $ayat[0]['nama'];
// dd($request->hasFile('video'));

        if ($request->hasFile('video')) {

            $file = $request->file('video');
            $path = 'mengaji/';
            // $destinationPath = 'images/vidio/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = 'mp4';

            $fileNameToStore = preg_replace('/\s+/', '_', $filename . '_' .'mengaji'. '_' . time() . '.' . $extension);

            Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);
            // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // $file->move($destinationPath, $fileNameToStore);


            $data = [
                'user_id' => Auth::user()->id,
                'surat' => $request->surat,
                'nama_surat' => $nama,
                'ayat_awal' => $request->ayat1,
                'ayat_akhir' => $request->ayat2,
                'vidio_ngaji' => $fileNameToStore,
                'emotion' => $request->star,
                'status' => 0,
            ];
                $nilai =  Mengaji::create($data);
                    Alert::success('Congratulations', 'Data Mengaji Berhasil Diinput')->persistent(false)->autoClose(3000);
                    // return response()->json($nilai);
                    return json_encode(['success'=>'Data input successfully.']);

            // return  response()->json(['success' => ($nilai) ? 1 : 0, 'message' => ($nilai) ? 'Video uploaded successfully.' : "Some thing went wrong. Try again !."]);
        }
    }

    public function created()
    {
        $surat = Alquran::all();

        return view('siswa.mengaji.created', compact('surat'));
        // return view('mengaji.created');
    }

    public function destroy($id)
    {
        $data = Mengaji::findOrFail($id)->first(['image']);
        \File::delete('images/mengaji/'.$data->image);
        Mengaji::findOrFail($id)->delete();

        return redirect()->back();
    }
}
