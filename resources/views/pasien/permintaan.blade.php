@extends('layouts.main_layout')

@section('container')

  <div class="container mt-3">
    <div class="card mb-4">
      <h5 class="card-header">Permintaan Menghubungkan</h5>
      <hr class="my-0">
      <div class="card-body">
        
        <div style='overflow:auto;'>
          <table class='table table-striped datatable'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Foto</th>
                <th style='text-align:center;'>Nama</th>
                <th style='text-align:center;'>Terima</th>
                <th style='text-align:center;'>Tolak</th>
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
                  Calon Pasien 1
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_terima' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='terima(1)'>
                    <i class='fa fa-check' style='color:#3c8dbc;'></i>
                  </button>
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_tolak' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='tolak(1)'>
                    <i class='fa fa-times' style='color:#3c8dbc;'></i>
                  </button>
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
                  Calon Pasien 2
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_terima' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='terima(1)'>
                    <i class='fa fa-check' style='color:#3c8dbc;'></i>
                  </button>
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_tolak' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='tolak(1)'>
                    <i class='fa fa-times' style='color:#3c8dbc;'></i>
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