<?php

namespace App\Http\Controllers;

use App\Mengaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $ayat = Http::get('https://api.banghasan.com/quran/format/json/surat/'.$id)->json()['hasil'];

        return json_encode($ayat);
    }

    public function store(Request $request)
    {
        $ayat = Http::get('https://api.banghasan.com/quran/format/json/surat/'.$request->surat)->json()['hasil'];
        $nama = $ayat[0]['nama'];

        $image_parts = str_replace('data:image/jpeg;base64,','', $request->image);
        $image_base64 = base64_decode($image_parts);
        $fileName = 'mengaji-'.date('YmdHis') . '.jpeg';
        file_put_contents(public_path('images/mengaji/').$fileName,$image_base64);

        $data = [
            'user_id' => Auth::user()->id,
            'surat' => $request->surat,
            'nama_surat' => $nama,
            'ayat_awal' => $request->ayat1,
            'ayat_akhir' => $request->ayat2,
            'image' => $fileName,
        ];
        Mengaji::create($data);

        return response()->json($data);
    }

    public function created()
    {
        $surat = Http::get('https://api.banghasan.com/quran/format/json/surat')->json()['hasil'];

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
