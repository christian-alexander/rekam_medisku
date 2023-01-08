@extends('layouts.main_layout')

@section('container')

  <div class="container mt-3">
    <div class="card mb-4">
      <h5 class="card-header">Pasien Saya</h5>
      <hr class="my-0">
      <div class="card-body">
        
        <div style='overflow:auto;'>
          <table class='table table-striped datatable'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Foto</th>
                <th style='text-align:center;'>Nama</th>
                <th style='text-align:center;'>Rekam Medis Tenaga Kesehatan</th>
                <th style='text-align:center;'>Rekam Medis Personal</th>
              </tr>
            </thead>
            <tbody>
    
              <tr>
                <td style='text-align:right'>1</td>
                
                <td style='display:flex;'>
                  <div style='margin:0 auto;'>
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
                  </div>
                </td>
    
                <td style="text-align: center;">
                  Pasien 1
                </td>
    
                <td style="text-align: center;">
                  <a href="/rekam_medis/daftar_rekam_medis/tenaga_kesehatan">
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
                  </a>
                </td>
    
                <td style="text-align: center;">
                  <a href="/rekam_medis/daftar_rekam_medis/personal">
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
                  </a>
                </td>
    
              </tr>
    
    
              <tr>
                <td style='text-align:right'>2</td>
                
                <td style='display:flex;'>
                  <div style='margin:0 auto;'>
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
                  </div>
                </td>
    
                <td style="text-align: center;">
                  Pasien 2
                </td>
    
                <td style="text-align: center;">
                  <a href="/rekam_medis/daftar_rekam_medis/tenaga_kesehatan">
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
                  </a>
                </td>
    
                <td style="text-align: center;">
                  <a href="/rekam_medis/daftar_rekam_medis/personal">
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
                  </a>
                </td>
    
              </tr>
    
    
            </tbody>
          </table>
        </div>
    
      </div>
    
    </div>
  </div>

@endsection