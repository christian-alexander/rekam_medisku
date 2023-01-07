<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->hasRole('admin')){
            return view('dashboard.admin_dashboard');
        }
        if(auth()->user()->hasRole('guru')){
            return view('dashboard.guru_dashboard');
        }
        if(auth()->user()->hasRole('siswa')){
            return view('dashboard.siswa_dashboard');
        }
    }
}
