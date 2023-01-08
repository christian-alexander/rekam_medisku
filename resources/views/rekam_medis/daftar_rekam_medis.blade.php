@extends('layouts.main_layout')

@section('container')

  <div class="container mt-3">
    <div class="card mb-4">
      <h5 class="card-header">

        @if (auth()->user()->hasRole('tenaga_kesehatan'))
          <a href="{{ url()->previous() }}">
            <i class='fa fa-arrow-left pe-3'></i>
          </a>
        @endif

        Rekam Medis {{ ($tipe_rekam_medis == "tenaga_kesehatan")? 'dari Tenaga Kesehatan' : 'Personal' }}
      </h5>
      <hr class="my-0">
      <div class="card-body pb-2">
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-start align-items-sm-center gap-4">
            
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
            <div class="button-wrapper">
              <h5>NamaPasien</h5>
              <p class="text-muted mb-0">username_pasien</p>
            </div>

          </div>

          <div class="col-lg-8 col-md-6 mt-3" style='border-left: 1px solid #d9dee3;'>
            <h5>Filter Diterapkan</h5>
            <hr>
            Tipe : Dokter / Pengobat Tradisional / Semua Jenis
            <br>
            Periode : 1 Jan 2023 - 31 Jan 2023

          </div>


        </div>
        <hr>
      </div>


      <div class="card-body pt-0">          

        <button class='btn btn-primary' style='margin-bottom:20px;' onclick="filter()">Filter</button>

        @if ($tipe_rekam_medis == "tenaga_kesehatan")
          @if (auth()->user()->hasRole('tenaga_kesehatan'))
            <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'>Tambah</button>                  
          @endif
        @else
          @if (auth()->user()->hasRole('pasien'))
            <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'>Tambah</button>                  
          @endif
        @endif


        <div style='overflow:auto;'>
          <table class='table table-striped datatable'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Tanggal</th>
                <th style='text-align:center;'>Tenaga Kesehatan</th>
                <th style='text-align:center;'>Judul</th>
                <th style='text-align:center;'>Diagnosis</th>
                @if ($tipe_rekam_medis == "tenaga_kesehatan")
                  @if (auth()->user()->hasRole('tenaga_kesehatan'))
                    <th style='text-align:center;'>Edit</th>
                    <th style='text-align:center;'>Hapus</th>                    
                  @endif
                @else
                  @if (auth()->user()->hasRole('pasien'))
                    <th style='text-align:center;'>Edit</th>
                    <th style='text-align:center;'>Hapus</th>                    
                  @endif
                @endif
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
                  <hr>
                  Dokter
                </td>
    
                <td style="text-align: center;">
                  Pemeriksaan Jantung Koroner
                </td>
    
                <td>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident accusamus eum qui iusto dolorum, nobis, illo placeat, repudiandae quibusdam quaerat quidem. Dolorem praesentium rerum itaque sunt blanditiis repudiandae aperiam dolores. Mollitia quas adipisci repellat et tempore. Atque earum consequuntur voluptate voluptates dignissimos at perspiciatis blanditiis perferendis recusandae, beatae numquam dolor animi nemo. Voluptates, explicabo, exercitationem culpa aspernatur impedit dolore optio non dignissimos porro odit sequi corporis magnam hic ducimus quaerat quos natus dolorem voluptate nulla. Impedit, molestias!
                </td>

                @if ($tipe_rekam_medis == "tenaga_kesehatan")
                  @if (auth()->user()->hasRole('tenaga_kesehatan'))
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
                  @endif
                @else
                  @if (auth()->user()->hasRole('pasien'))
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
                  @endif
                @endif

              </tr>
    
              <tr>
                <td style='text-align:right'>1</td>
                
                <td style="text-align:center;">
                  9 Januari 2023
                </td>

                <td style="text-align:center;">
                  Ageng Tirta
                  <hr>
                  Pengobat Tradisional
                </td>
    
                <td style="text-align: center;">
                  Pijat Lutut
                </td>
    
                <td>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident accusamus eum qui iusto dolorum, nobis, illo placeat, repudiandae quibusdam quaerat quidem. Dolorem praesentium rerum itaque sunt blanditiis repudiandae aperiam dolores. Mollitia quas adipisci repellat et tempore. Atque earum consequuntur voluptate voluptates dignissimos at perspiciatis blanditiis perferendis recusandae, beatae numquam dolor animi nemo. Voluptates, explicabo, exercitationem culpa aspernatur impedit dolore optio non dignissimos porro odit sequi corporis magnam hic ducimus quaerat quos natus dolorem voluptate nulla. Impedit, molestias!
                </td>
                
                @if ($tipe_rekam_medis == "tenaga_kesehatan")
                  @if (auth()->user()->hasRole('tenaga_kesehatan'))
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
                  @endif
                @else
                  @if (auth()->user()->hasRole('pasien'))
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
                  @endif
                @endif
    
              </tr>
    
            </tbody>
          </table>
        </div>
    
      </div>
    
    </div>
  </div>

@endsection