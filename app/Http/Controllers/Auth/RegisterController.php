<?php

namespace App\Http\Controllers\Auth;

use App\BioGuru;
use App\BioOrtu;
use App\BioSiswa;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $data = User::where('level','siswa')->pluck('name','id');
        return view('auth.register',compact('data'));
    }

    public function registerStore(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'level'              => 'required',

        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user['name'] = ucwords(strtolower($request->name));
        $user['email'] = strtolower($request->email);
        $user['password'] = Hash::make($request->password);
        $user['level'] = $request->level;
        $simpan = User::create($user);

        if ($request->level == 'guru') {
            // return response()->json($request->level);
            $bioGuru = $request->validate([
                'guru_nisn'      => 'required',
                'guru_telpon'     => 'required|numeric',
                'guru_alamat'     => 'required',
            ]);
            $bioGuru = new BioGuru;
            $bioGuru->user_id = $simpan->id;
            $bioGuru->NISN = $request->guru_nisn;
            $bioGuru->telpon = $request->guru_telpon;
            $bioGuru->alamat = $request->guru_alamat;
            $bioGuru->save();

        }else if ($request->level == 'siswa') {
            // return response()->json($request->level);

            $bioSiswa = $request->validate([
                        'siswa_nisn'      => 'required',
                        'kelas'     => 'required',
                        'lokal'     => 'required',
                        'gender'     => 'required',
                        'siswa_telpon'     => 'required|numeric',
                        'siswa_alamat'    => 'required',
            ]);
            $bioSiswa = new BioSiswa;
            $bioSiswa->user_id = $simpan->id;
            $bioSiswa->NISN = $request->siswa_nisn;
            $bioSiswa->telpon = $request->siswa_telpon;
            $bioSiswa->lokal = Str::title($request->lokal);
            $bioSiswa->kelas = Str::title($request->kelas);
            $bioSiswa->gender = $request->gender;
            $bioSiswa->alamat = $request->siswa_alamat;
            $bioSiswa->save();

        }else if ($request->level == 'ortu') {
            $bioOrtu = $request->validate([
                'siswa_id'      => 'required',
                'ortu_telpon'     => 'required|numeric',
            ]);
            $bioOrtu = new BioOrtu;
            $bioOrtu->user_id = $simpan->id;
            $bioOrtu->siswa_id = $request->siswa_id;
            $bioOrtu->telpon = $request->ortu_telpon;
            $bioOrtu->save();

        }

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
}
