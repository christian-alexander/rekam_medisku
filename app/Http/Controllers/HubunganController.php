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
        // ini halaman cari dokter di akun pasien
        $this->cek_roles('pasien');

        $tenaga_kesehatan_sudah_terhubung = Hubungan::where('pasien_id',auth()->user()->id)->pluck('tenaga_kesehatan_id');
        $data['calon_tenaga_kesehatans'] = User::where('visibility',1)->whereNotIn('id',$tenaga_kesehatan_sudah_terhubung)->where('tipe_tenaga_kesehatan','1')->orWhere('tipe_tenaga_kesehatan','2')->get();
        return view('hubungan.pengajuan',$data);
    }

    public function permintaan(){
        // ini halaman permintaan menghubungkan di akun tenaga kesehatan
        $this->cek_roles('tenaga_kesehatan');

        $data['hubungan_calon_pasiens'] = Hubungan::where('tenaga_kesehatan_id',auth()->user()->id)->where('status_hubungan',0)->get();
        return view('hubungan.permintaan',$data);
    }

    public function get_tenaga_kesehatan($tenaga_kesehatan_id){
        return User::find($tenaga_kesehatan_id)->toJSON();
    }

    public function get_faskes_has_tenaga_kesehatan($tenaga_kesehatan_id){
        return FaskesHasTenagaKesehatan::with('faskes','tenaga_kesehatan')->where('tenaga_kesehatan_id',$tenaga_kesehatan_id)->get()->toJSON();
    }

    public function submit_ajukan($tenaga_kesehatan_id){
        $this->cek_roles('pasien');

        Hubungan::create([
            'tenaga_kesehatan_id' => $tenaga_kesehatan_id,
            'pasien_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success','Sukses mengajukan');
    }

    public function terima($hubungan_id){
        $this->cek_roles('tenaga_kesehatan');

        Hubungan::where('id',$hubungan_id)->update(['status_hubungan' => 1]);

        return redirect()->back()->with('success',"Berhasil menerima");
    }

    public function tolak($hubungan_id){
        $this->cek_roles('tenaga_kesehatan');

        Hubungan::where('id',$hubungan_id)->delete();

        return redirect()->back()->with('success',"Berhasil menolak");
    }
}
