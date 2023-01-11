<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FaskesHasTenagaKesehatan;

class FaskesHasTenagaKesehatanController extends Controller
{
    public function tambah(Request $request){
        $this->cek_roles('tenaga_kesehatan');

        $validated_data = $request->validate([
            'faskes_id' => 'required|numeric',
            'spesialisasi' => 'required|max:255'
        ]);

        $validated_data['tenaga_kesehatan_id'] = auth()->user()->id;
        FaskesHasTenagaKesehatan::create($validated_data);

        return redirect()->back()->with('success','Berhasil Ditambah');
    }

    public function hapus($id){
        $this->cek_roles('tenaga_kesehatan');

        FaskesHasTenagaKesehatan::where('id',$id)->delete();

        return redirect()->back()->with('success','Berhasil Dihapus');
    }
}
