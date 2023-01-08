<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        return view('pasien.index');
    }

    public function permintaan(){
        return view('pasien.permintaan');
    }
}
