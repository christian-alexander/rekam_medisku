<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validated_data = $request->validate([
            'username' => 'required|alpha_num|unique:users,username|max:32',
            'nama' => 'required|max:64',
            'password' => 'required|min:6'
        ]);

        $validated_data['password'] = password_hash($validated_data['password'],PASSWORD_DEFAULT);

        $created_user = User::create($validated_data);
        $created_user->assignRole('pasien');

        return redirect()->to('login')->with('success','Akun berhasil didaftarkan');
    }
}
