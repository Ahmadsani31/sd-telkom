<?php

namespace App\Http\Controllers;

use App\VidioTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VidioTestController extends Controller
{
    public function index()
    {
        $videos = VidioTest::latest()->simplePaginate(2);

        return view('vidio-test', compact('videos'))
        ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    public function store(Request $request)
    {
        dd($request);
        if ($request->hasFile('video')) {

            $file = $request->file('video');
            $path = 'videos/';
            // $destinationPath = 'images/vidio/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = 'mp4';

            $fileNameToStore = preg_replace('/\s+/', '_', $filename . '_' . time() . '.' . $extension);

            Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);
            // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // $file->move($destinationPath, $fileNameToStore);

            $media = VidioTest::create([
                'user_id' => Auth::user()->id,
                'vidio' => $fileNameToStore
                ]);

            return  response()->json(['success' => ($media) ? 1 : 0, 'message' => ($media) ? 'Video uploaded successfully.' : "Some thing went wrong. Try again !."]);
        }
    }

    public function getVideo(VidioTest $video)
    {
        $name = $video->vidio;
        $fileContents = Storage::disk('public')->get("videos/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

    public function destroy($id)
    {

        $media = VidioTest::find($id);

        if (isset($media->vidio) && !empty($media->vidio)) {
            $path = 'videos/';
            $store_path = $path . $media->vidio;
            Storage::disk('public')->delete($store_path);
        }
        // $media->delete();
        // $data = VidioTest::findOrFail($id)->first(['vidio']);
        // // return json_encode($data);
        // File::delete('images/vidio/'.$data);
        VidioTest::findOrFail($id)->delete();

        return redirect()->back();
    }
}
