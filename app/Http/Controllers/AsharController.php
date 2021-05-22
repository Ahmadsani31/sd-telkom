<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsharController extends Controller
{
    public function index()
    {
        return view('siswa.sholat.ashar');
    }
}
