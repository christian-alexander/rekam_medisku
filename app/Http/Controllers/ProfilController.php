<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index(){
        return view("profil.index");
    }

    public function reset_foto_profil(){
        User::where('id',auth()->user()->id)->update(['foto_profil' => 'assets/img/avatars/user.png']);

        return redirect()->back();
    }

    public function update_foto_profil(Request $request){
        $request->validate([
            'foto_profil' => 'file|image'
        ]);

        $validated_data['foto_profil'] = $request->file('foto_profil')->store('profil');

        User::where('id',auth()->user()->id)->update($validated_data);

        return redirect()->back();
    }

    public function update_profil(Request $request){
        $rules = [
            'nama' => 'required|max:64'
        ];
        
        if($request->username != auth()->user()->username){
            $rules['username'] = 'required|unique:users,username|max:64|regex:/^\S*$/';
        }
       
        $validated_data = $request->validate($rules);
 

        User::where('id',auth()->user()->id)->update($validated_data);

        return redirect()->back()->with('success','Berhasil diubah');
    }
}
