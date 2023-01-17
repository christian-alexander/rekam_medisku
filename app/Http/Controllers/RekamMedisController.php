<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hubungan;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'pasien_id' => 'exists:users,id',
            'tanggal' => 'required|date',
            'anamnesa' => 'required|max:255',
            'diagnosis' => 'required'
        ]);

        if(auth()->user()->hasRole('tenaga_kesehatan')){
            $validated_data['tenaga_kesehatan_id'] = auth()->user()->id;
            $validated_data['tipe_rekam_medis'] = 1;
        }else{
            $validated_data['tipe_rekam_medis'] = 0;
        }

        RekamMedis::create($validated_data);

        return redirect()->back()->with('success','Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'tanggal' => 'required|date',
            'anamnesa' => 'required|max:255',
            'diagnosis' => 'required'
        ]);

        RekamMedis::where('id',$id)->update($validated_data);

        return redirect()->back()->with('success','Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RekamMedis::where('id',$id)->update(['visibility' => 0]);

        return redirect()->back()->with('success','Berhasil Dihapus');
    }

    public function get_data($id){
        return RekamMedis::find($id)->toJSON();
    }

    public function show_pdf(Request $request){
        $pasien_id = $request->pasien_id;
        $filters['tipe_tenaga_kesehatan'] = $request->tipe_tenaga_kesehatan;
        $filters['awal_tanggal'] = $request->awal_tanggal;
        $filters['akhir_tanggal'] = $request->akhir_tanggal;

        $data['tipe_rekam_medis'] = $request->tipe_rekam_medis;
        $data['rekam_medises'] = RekamMedis::where('visibility',1)->where('pasien_id',$pasien_id)->filter($filters)->get();


        $pdf = Pdf::loadView('rekam_medis.pdf', $data);
        
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream();
    }

    public function daftar_rekam_medis(Request $request, $tipe_rekam_medis,$pasien_id){
        $data['tipe_rekam_medis'] = $tipe_rekam_medis;

        if(auth()->user()->hasRole('pasien')){
            switch($tipe_rekam_medis){
                case "personal" :
                    if(isset($request->filtered)){
                        $filters = $this->get_filters($request,0,$request->filtered);
                    }else{
                        $filters = $this->get_filters($request,0);
                    }
                    $rekam_medises = RekamMedis::filter($filters);

                    $data['rekam_medises'] = $rekam_medises->where('visibility',1)->where('pasien_id',auth()->user()->id)->where('tipe_rekam_medis',0)->get();
                    $data['filters'] = $filters;
                    $data['pasien_id'] = $pasien_id;

                    break;

                case "tenaga_kesehatan":
                    if(isset($request->filtered)){
                        $filters = $this->get_filters($request,1,$request->filtered);
                    }else{
                        $filters = $this->get_filters($request,1);
                    }

                    $rekam_medises = RekamMedis::filter($filters);

                    $data['rekam_medises'] = $rekam_medises->where('visibility',1)->where('pasien_id',auth()->user()->id)->where('tipe_rekam_medis',1)->get();
                    $data['filters'] = $filters;
                    $data['pasien_id'] = $pasien_id;

                    break;
            }    
        }else if(auth()->user()->hasRole('tenaga_kesehatan')){
            if(count(Hubungan::where('tenaga_kesehatan_id',auth()->user()->id)->where('pasien_id',$pasien_id)->where('status_hubungan',1)->get()) == 0){
                return redirect()->back()->with('danger','anda tidak berhak melihat halaman ini');
            }

            switch($tipe_rekam_medis){
                case "personal" :
                    if(isset($request->filtered)){
                        $filters = $this->get_filters($request,0,$request->filtered);
                    }else{
                        $filters = $this->get_filters($request,0);
                    }
                    $rekam_medises = RekamMedis::filter($filters);


                    $data['rekam_medises'] = $rekam_medises->where('visibility',1)->where('pasien_id',$pasien_id)->where('tipe_rekam_medis',0)->get();
                    $data['filters'] = $filters;
                    $data['pasien'] = User::find($pasien_id);
                    $data['pasien_id'] = $pasien_id;

                    break;

                case "tenaga_kesehatan":
                    if(isset($request->filtered)){
                        $filters = $this->get_filters($request,1,$request->filtered);
                    }else{
                        $filters = $this->get_filters($request,1);
                    }
                    $rekam_medises = RekamMedis::filter($filters);


                    $data['rekam_medises'] = $rekam_medises->where('visibility',1)->where('tenaga_kesehatan_id',auth()->user()->id)->where('pasien_id',$pasien_id)->where('tipe_rekam_medis',1)->get();
                    $data['filters'] = $filters;
                    $data['pasien'] = User::find($pasien_id);
                    $data['pasien_id'] = $pasien_id;

                    break;
            }    
        }else{
            return redirect()->back();
        }

        return view('rekam_medis.daftar_rekam_medis',$data);
    }

    private function get_filters($request, $tipe_rekam_medis, $filtered = 'off'){
        if($filtered == 'off'){
            if($tipe_rekam_medis == '0'){
                $filters = [
                    'awal_tanggal' => Carbon::now()->firstOfMonth()->format('Y-m-d'),
                    'akhir_tanggal' => Carbon::now()->endOfMonth()->format('Y-m-d')
                ];
            }else if($tipe_rekam_medis == '1'){
                $filters = [
                    'tipe_tenaga_kesehatan' => 'all',
                    'awal_tanggal' => Carbon::now()->firstOfMonth()->format('Y-m-d'),
                    'akhir_tanggal' => Carbon::now()->endOfMonth()->format('Y-m-d')
                ];
            }
        }else{
            if($tipe_rekam_medis == '0'){
                $filters = [
                    'awal_tanggal' => $request->awal_tanggal,
                    'akhir_tanggal' => $request->akhir_tanggal
                ];
            }else if($tipe_rekam_medis == '1'){
                $filters = [
                    'tipe_tenaga_kesehatan' => $request->tipe_tenaga_kesehatan,
                    'awal_tanggal' => $request->awal_tanggal,
                    'akhir_tanggal' => $request->akhir_tanggal
                ];
            }
        }

        return $filters;
    }

}
