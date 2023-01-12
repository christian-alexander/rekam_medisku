<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hubungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FaskesHasTenagaKesehatan;

class HubunganController extends Controller
{
    
    public function pengajuan(){
        $tenaga_kesehatan_sudah_terhubung = Hubungan::where('pasien_id',auth()->user()->id)->pluck('tenaga_kesehatan_id');
        $data['calon_tenaga_kesehatans'] = User::where('visibility',1)->whereNotIn('id',$tenaga_kesehatan_sudah_terhubung)->where('tipe_tenaga_kesehatan','1')->orWhere('tipe_tenaga_kesehatan','2')->get();
        return view('hubungan.pengajuan',$data);
    }

    public function permintaan(){
        return view('hubungan.permintaan');
    }

    public function get_tenaga_kesehatan($tenaga_kesehatan_id){
        return User::find($tenaga_kesehatan_id)->toJSON();
    }

    public function get_faskes_has_tenaga_kesehatan($tenaga_kesehatan_id){
        return FaskesHasTenagaKesehatan::with('faskes','tenaga_kesehatan')->where('tenaga_kesehatan_id',$tenaga_kesehatan_id)->get()->toJSON();
    }

    public function submit_ajukan($tenaga_kesehatan_id){
        Hubungan::create([
            'tenaga_kesehatan_id' => $tenaga_kesehatan_id,
            'pasien_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success','Sukses mengajukan');
    }
}
