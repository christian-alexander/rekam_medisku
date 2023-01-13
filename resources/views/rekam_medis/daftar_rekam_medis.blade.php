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
            @if (auth()->user()->hasRole('pasien'))  
              <img src="{{ (auth()->user()->foto_profil == 'assets/img/avatars/user.png')? asset(auth()->user()->foto_profil) : asset('storage/'.auth()->user()->foto_profil) }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
              <div class="button-wrapper">
                <h5>{{ auth()->user()->nama }}</h5>
                <p class="text-muted mb-0">{{ auth()->user()->username }}</p>                  
              </div>
            @else
              <img src="{{ (auth()->user()->foto_profil == 'assets/img/avatars/user.png')? asset(auth()->user()->foto_profil) : asset('storage/'.auth()->user()->foto_profil) }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
              <div class="button-wrapper">
                <h5>{{ auth()->user()->nama }}</h5>
                <p class="text-muted mb-0">{{ auth()->user()->username }}</p>                  
              </div>
            @endif
          </div>

          <div class="col-lg-8 col-md-6 mt-3" style='border-left: 1px solid #d9dee3;'>
            <h5>Filter Diterapkan</h5>
            <hr>
            @if ($tipe_rekam_medis == "tenaga_kesehatan")
              Tipe : {{ ($filters['tipe_tenaga_kesehatan'] == 'all')? 'Semua Jenis' : (($filters['tipe_tenaga_kesehatan'] == 1)? 'Dokter' : 'Pengobat Tradisional') }}
              <br>
            @endif
            Periode : {{ Carbon::parse($filters['awal_tanggal'])->format('d M Y') }} - {{ Carbon::parse($filters['akhir_tanggal'])->format('d M Y') }}

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
                @if ($tipe_rekam_medis == "tenaga_kesehatan")
                  <th style='text-align:center;'>Tenaga Kesehatan</th>
                @endif
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
              @foreach ($rekam_medises as $rekam_medis)
                  
                <tr>
                  <td style='text-align:right'>{{ $loop->iteration }}</td>
                  
                  <td style="text-align:center;">
                    {{ Carbon::parse($rekam_medis->created_at)->format('d M Y') }}
                  </td>

                  @if ($tipe_rekam_medis == "tenaga_kesehatan")
                    <td style="text-align:center;">
                      {{ $rekam_medis->tenaga_kesehatan->nama }}
                      <hr>
                      {{ ($rekam_medis->tenaga_kesehatan->tipe_tenaga_kesehatan == 1)? 'Dokter' : 'Pengobat Tradisional' }}
                    </td>
                  @endif
      
                  <td style="text-align: center;">
                    {{ $rekam_medis->judul }}
                  </td>
      
                  <td>
                    {{ $rekam_medis->diagnosis }}
                  </td>

                  @if ($tipe_rekam_medis == "tenaga_kesehatan")
                    @if (auth()->user()->hasRole('tenaga_kesehatan'))
                      <td style="text-align: center;">
                        <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit({{ $rekam_medis->id }})'>
                          <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                        </button>
                      </td>
          
                      <td style="text-align: center;">
                        <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus({{ $rekam_medis->id }})'>
                          <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                        </button>
                      </td>
                    @endif
                  @else
                    @if (auth()->user()->hasRole('pasien'))
                      <td style="text-align: center;">
                        <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit({{ $rekam_medis->id }})'>
                          <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                        </button>
                      </td>
          
                      <td style="text-align: center;">
                        <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus({{ $rekam_medis->id }})'>
                          <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                        </button>
                      </td>
                    @endif
                  @endif

                </tr>

              @endforeach
    
    
            </tbody>
          </table>
        </div>
    
      </div>
    
    </div>
  </div>

{{-- modal filter --}}
<div class="modal" id='modal_filter'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/rekam_medis/daftar_rekam_medis/{{ ($tipe_rekam_medis == 'tenaga_kesehatan')? 'tenaga_kesehatan' : 'personal' }}/{{ $pasien_id }}" method='GET' id='form_filter'>
          <input type="hidden" name="filtered" value="on">

          @if ($tipe_rekam_medis == 'tenaga_kesehatan')
            <div class="mb-3">
              <label class="form-label">Tipe Tenaga Kesehatan</label>
              <div class="position-relative">
                <select name="faskes_id" class='form-control' aria-hidden="true" style='width:100%;'>
                  <option value="">-- SEMUA TIPE --</option>
                  <option value="1">Dokter</option>
                  <option value="2">Pengobat Tradisional</option>
                </select>
              </div>
            </div>
          @endif
  

          <div class="mb-3">
            <label class="form-label">Awal Tanggal</label>
            <div class="position-relative">
              <input type="date" class="form-control" name="awal_tanggal">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Akhir Tanggal</label>
            <div class="position-relative">
              <input type="date" class="form-control" name="akhir_tanggal">
            </div>
          </div>

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-primary">Filter</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

  <script>
    function filter(){
      $('#modal_filter').modal('show');
    }
  </script>

@endsection