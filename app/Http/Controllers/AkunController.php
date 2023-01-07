<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->cek_roles('admin');

        if($request->input('status_aktif') !== NULL){
            $data['status_aktif'] = $request->input('status_aktif');
        }else{
            $data['status_aktif'] = 1;
        }

        // save data ke session utk yajra
        session(['data' => $data]);

        return view('akun.index',$data);
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
        $this->cek_roles('admin');

        $rules = [
            'peran' => 'required|max:255',
            'username' => ['required','regex:/^\S*$/'],
            'nama' => 'required|max:255',
            'password' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $to_save = [
            'username' => strtolower($request->username),
            'nama' => $request->input('nama'),
            'password' => bcrypt($request->input('password')),
            'creator_id' => auth()->user()->id
        ];

        $created_user = User::create($to_save);

        // beri permission
        $created_user->assignRole($request->peran);

        return response()->json(['success' => 'Berhasil Ditambah']);
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
        $this->cek_roles('admin');

        $rules = [
            'username' => ['required','regex:/^\S*$/'],
            'nama' => 'required|max:255',
        ];

        if($request->input('password') !== NULL){
            $rules = [
                'password' => 'required|min:6',
                'konfirmasi_password' => 'required|same:password'
            ];
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $to_save = [
            'username' => strtolower($request->username),
            'nama' => $request->input('nama'),
        ];

        if($request->input('password') !== NULL){
            $to_save['password'] = bcrypt($request->input('password'));
        }

        User::where('id',$id)->update($to_save);

        return response()->json(['success' => 'Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_status_aktif($aksi,$id){
        $this->cek_roles('admin');

        if($aksi == 'nonaktifkan'){
            User::where('id',$id)->update(['visibility' => 0]);
        }else if($aksi == 'aktifkan'){
            User::where('id',$id)->update(['visibility' => 1]);
        }

        return response()->json(['success' => 'Berhasil Di'.$aksi]);
    }

    public function get_data($id){
        $this->cek_roles('admin');

        $user = User::find($id);
        $user['peran'] = $user->getRoleNames()[0];

        return $user->toJSON();
    }

    public function yajra(){
        $this->cek_roles('admin');

        $data = session('data');
        $status_aktif = $data['status_aktif'];
        
        if($status_aktif == 1){
            $akuns = User::where('visibility',1)->get();
        }else{
            $akuns = User::where('visibility',0)->get();
        }

        $table = datatables()->collection($akuns)
        ->addIndexColumn()
        ->editColumn('peran', function(User $akun) {
            if($akun->hasRole('admin')){ $peran = 'Admin' ;}
            if($akun->hasRole('guru')){ $peran = 'Guru' ;}
            if($akun->hasRole('siswa')){ $peran = 'Siswa' ;}

            return 
            "<section style='text-align:center;width:100%    ;'>".
                $peran.
            "</section>";
            ;
        })
        ->editColumn('username', function(User $akun) {
            return 
            "<section style='text-align:center;width:100%    ;'>".
                $akun->username.
            "</section>";
            ;
        })
        ->editColumn('nama', function(User $akun) {
            return 
            "<section style='text-align:center;width:100%    ;'>".
                $akun->nama.
            "</section>";
            ;
        })
        ->editColumn('edit', function(User $akun) {
            return 
            "<section style='text-align:center;width:100%    ;'>".
                "<button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit($akun->id)'>".
                    "<i class='fa fa-edit' style='color:#3c8dbc;'></i>".
                "</button>".
            "</section>"
            ;
        })
        ->editColumn('status_aktif', function(User $akun) {
            if($akun->visibility == 1){
                return 
                "<section style='text-align:center;width:100%    ;'>".
                    "<button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='konfirm_change_status_aktif($akun->id)'>".
                        "<i class='fa fa-trash' style='color:#3c8dbc;'></i>".
                    "</button>".
                "</section>"
                ;
            }else{
                return 
                "<section style='text-align:center;width:100%    ;'>".
                    "<button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='konfirm_change_status_aktif($akun->id,true)'>".
                        "<i class='fa-solid fa-recycle' style='color:#3c8dbc;'></i>".
                    "</button>".
                "</section>"
                ;
            }
        })
        ->rawColumns(['peran','username','nama','edit','status_aktif']);

        return $table->toJson();
    }   
}
