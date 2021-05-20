<?php

use App\Events\Notif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // event(new Notif(['Darma']));
//     // return "Event has been sent!";
//     // dd(Auth::guard()->check());
//     return view('welcome');
// });

// Route::get('test', function () {
//    event(new Notif('Selamat Notifikasi berhasil'));
//     // event(new App\Events\Notif('Someone'));
//     return "Event has been sent!";
// });
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

// Route::get('users/{id}', function ($id) {

// });
Route::get('login','LoginController@showLoginForm')->name('login');
Auth::routes();

Route::post('/register','Auth\RegisterController@registerStore')->name('register');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/vidio-test/getVidio/{video}', 'VidioTestController@getVideo')->name('getVideo');

Route::group(['prefix' => 'siswa'], function(){
    Route::middleware(['auth', 'siswa'])->group(function () {
        Route::get('home','SiswaController@index')->name('siswa.home');

        Route::get('/sholat/index', 'SholatController@index')->name('sholat.index');
        Route::post('/sholat/store', 'SholatController@store')->name('sholat.store');
        Route::get('/sholat/index/dataSholat', 'SholatController@dataSholat')->name('sholat.dataSholat');

        Route::get('/mengaji/index', 'MengajiController@index')->name('mengaji.index');
        Route::get('/mengaji/created', 'MengajiController@created')->name('mengaji.created');

        Route::get('mengaji/{id}/getAyat/', 'MengajiController@getAyat')->name('getAyat');
        Route::get('mengaji/destroy/{id}/', 'MengajiController@destroy')->name('mengaji.destroy');
        Route::post('mengaji/store', 'MengajiController@store')->name('mengaji.store');

        Route::get('/literasi/index', 'LiterasiController@index')->name('literasi.index');
        Route::get('/literasi/created', 'LiterasiController@created')->name('literasi.created');
        Route::post('/literasi/store', 'LiterasiController@store')->name('literasi.store');
        Route::get('/literasi/destroy/{id}', 'LiterasiController@destroy')->name('literasi.destroy');


        Route::get('/kosakata/index', 'KosakataController@index')->name('kosakata.index');
        Route::get('/kosakata/created', 'KosakataController@created')->name('kosakata.created');
        Route::post('/kosakata/store', 'KosakataController@store')->name('kosakata.store');
        Route::get('/kosakata/destroy/{id}', 'KosakataController@destroy')->name('kosakata.destroy');

        Route::get('/vidio-test', 'VidioTestController@index')->name('vidio-test');
        Route::post('/vidio-test/store', 'VidioTestController@store')->name('vidio-test.store');
        Route::get('/vidio-test/{id}', 'VidioTestController@destroy')->name('vidio-test.destroy');
    });
});

Route::group(['prefix' => 'guru'], function(){
    Route::get('home','GuruController@index')->name('guru.home')->middleware('guru');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('home','AdminController@index')->name('admin.home')->middleware('admin');
});

Route::group(['prefix' => 'ortu'], function(){
    Route::get('home','OrtuController@index')->name('ortu.home')->middleware('ortu');
    Route::get('anak/index','OrtuAnakController@index')->name('ortu-anak.index')->middleware('ortu');
});
