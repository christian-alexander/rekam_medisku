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

        $data['akuns'] = User::where('visibility',1)->where('id','!=',1)->orderByDesc('tipe_pelayan_kesehatan')->get();

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

        $validated_data = $request->validate([
            'peran' => 'required|max:255',
            'username' => 'required|unique:users,username|max:32|regex:/^\S*$/',
            'nama' => 'required|max:64',
            'password' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password'
        ]);

        $created_user = User::create($validated_data);
        
        // beri role
        $created_user->assignRole($request->peran);

        return redirect()->back()->with('success', 'Berhasil Ditambah');
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

        $validated_data = $request->validate($rules);

        User::where('id',$id)->update($validated_data);

        return redirect()->back()->with('success', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cek_roles('admin');

        User::where('id',$id)->update(['visibility',0]);

        return redirect()->back()->with('success','Berhasil Hapus Akun');
    }

    public function get_data($id){
        $this->cek_roles('admin');

        $user = User::find($id);
        $user['peran'] = $user->getRoleNames()[0];

        return $user->toJSON();
    }
}
