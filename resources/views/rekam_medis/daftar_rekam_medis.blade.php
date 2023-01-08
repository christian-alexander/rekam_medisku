@extends('layouts.main_layout')

@section('container')

  <div class="container mt-3">
    <div class="card mb-4">
      <h5 class="card-header">Rekam Medis {{ ($tipe_rekam_medis == "tenaga_kesehatan")? 'dari Tenaga Kesehatan' : 'Personal' }}</h5>
      <hr class="my-0">
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
          <div class="button-wrapper">
            <h5>NamaPasien</h5>
            <p class="text-muted mb-0">usename_pasien</p>
          </div>
        </div>
        <hr>
      </div>


      <div class="card-body">

        <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'>Tambah</button>

        <div style='overflow:auto;'>
          <table class='table table-striped datatable'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Tanggal</th>
                <th style='text-align:center;'>Tenaga Kesehatan</th>
                <th style='text-align:center;'>Judul</th>
                <th style='text-align:center;'>Diagnosis</th>
                <th style='text-align:center;'>Edit</th>
                <th style='text-align:center;'>Hapus</th>
              </tr>
            </thead>
            <tbody>
    
              <tr>
                <td style='text-align:right'>1</td>
                
                <td style="text-align:center;">
                  10 Januari 2023
                </td>

                <td style="text-align:center;">
                  Dr. Sehat Subur Selalu
                </td>
    
                <td style="text-align: center;">
                  Pemeriksaan Jantung Koroner
                </td>
    
                <td>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident accusamus eum qui iusto dolorum, nobis, illo placeat, repudiandae quibusdam quaerat quidem. Dolorem praesentium rerum itaque sunt blanditiis repudiandae aperiam dolores. Mollitia quas adipisci repellat et tempore. Atque earum consequuntur voluptate voluptates dignissimos at perspiciatis blanditiis perferendis recusandae, beatae numquam dolor animi nemo. Voluptates, explicabo, exercitationem culpa aspernatur impedit dolore optio non dignissimos porro odit sequi corporis magnam hic ducimus quaerat quos natus dolorem voluptate nulla. Impedit, molestias! Sit minima officiis illum laborum odio modi aut molestias quam dolorem reprehenderit? Laudantium dolorum ullam voluptatem optio quo totam non sapiente id quam aliquid ut nemo, ipsum unde architecto animi consequuntur perferendis natus officiis tempora? Doloribus, provident cum eum quis.
                </td>

                <td style="text-align: center;">
                  <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit(1)'>
                    <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                  </button>
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus(1)'>
                    <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                  </button>
                </td>
    
              </tr>
    
            </tbody>
          </table>
        </div>
    
      </div>
    
    </div>
  </div>

@endsection