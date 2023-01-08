<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubunganController extends Controller
{
    
    public function pengajuan(){
        return view('hubungan.pengajuan');
    }

    
    public function permintaan(){
        return view('hubungan.permintaan');
    }
}
