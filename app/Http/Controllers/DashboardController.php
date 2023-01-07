<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->hasRole('admin')){
            return view('dashboard.admin_dashboard');
        }
        if(auth()->user()->hasRole('dokter') || auth()->user()->hasRole('pengobat_tradisional')){
            return view('dashboard.dokter_dashboard');
        }
        if(auth()->user()->hasRole('pasien')){
            return view('dashboard.pasien_dashboard');
        }
    }
}
