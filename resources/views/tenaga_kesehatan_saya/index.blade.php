@extends('layouts.main_layout')

@section('container')

  <div class="container mt-3">
    <div class="card mb-4">
      <h5 class="card-header">Tenaga Kesehatan Saya</h5>
      <hr class="my-0">
      <div class="card-body">
        
        <div style='overflow:auto;'>
          <table class='table table-striped datatable'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Foto</th>
                <th style='text-align:center;'>Nama</th>
                <th style='text-align:center;'>Fasilitas Kesehatan</th>
                <th style='text-align:center;'>Batalkan Penghubungan</th>
              </tr>
            </thead>
            <tbody>
    
              <tr>
                <td style='text-align:right'>1</td>
                
                <td>
                  <div style='display:flex;'>
                    <div style='margin:0 auto;'>
                      <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
                    </div>
                  </div>
                </td>
    
                <td style="text-align: center;">
                  Calon Dokter 1
                </td>
    
                <td style="text-align: center;">
                  <button id='btn_show_faskes' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='show_faskes(1)'>
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
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
                
                <td>
                  <div style='display:flex;'>
                    <div style='margin:0 auto;'>
                      <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
                    </div>
                  </div>
                </td>
    
                <td style="text-align: center;">
                  Calon Dokter 2
                </td>
    

                <td style="text-align: center;">
                  <button id='btn_show_faskes' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='show_faskes(1)'>
                    <i class='fa fa-file' style='color:#3c8dbc;'></i>
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


  {{-- modal show_faskes --}}
  <div class="modal" tabindex="-1" id='modal_show_faskes'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Faskes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
            <div class="button-wrapper">
              <h5>NamaDokter</h5>
              <p class="text-muted mb-0">username_dokter</p>  
            </div>
          </div>
          <table class='table table-striped mt-3'>
            <thead>
              <tr>
                <th>Nama Faskes</th>
                <th>Alamat</th>
                <th>Spesialisasi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>RS. UTAMA</td>
                <td>
                  Jl. Kesehatan No.1
                  <hr>
                  Surabaya, Jawa Timur
                </td>
                <td>
                  Kardiologi
                </td>
              </tr>
              <tr>
                <td>RS. UTAMA</td>
                <td>
                  Jl. Kesehatan No.1
                  <hr>
                  Surabaya, Jawa Timur
                </td>
                <td>
                  Penyakit Dalam
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    function show_faskes(id){
      $('#modal_show_faskes').modal('show');
    }
  </script>


@endsection