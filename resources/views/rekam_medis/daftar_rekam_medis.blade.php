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
                <p class="text-muted mb-0">{{ (auth()->user()->jenis_kelamin == 1)? 'Laki laki' : 'Perempuan' }}</p>                  
                <p class="text-muted mb-0">{{ Carbon::parse(auth()->user()->tanggal_lahir)->format('d M Y') }} ( {{ str_replace("yang lalu","",Carbon::parse(auth()->user()->tanggal_lahir)->diffForHumans()) }})</p>                  
                <p class="text-muted mb-0">{{ auth()->user()->no_hp }}</p>                 
              </div>
            @else
              <img src="{{ ($pasien->foto_profil == 'assets/img/avatars/user.png')? asset($pasien->foto_profil) : asset('storage/'.$pasien->foto_profil) }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
              <div class="button-wrapper">
                <h5>{{ $pasien->nama }}</h5>
                <p class="text-muted mb-0">{{ ($pasien->jenis_kelamin == 1)? 'Laki laki' : 'Perempuan' }}</p>                  
                <p class="text-muted mb-0">{{ Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }} ( {{ str_replace("yang lalu","",Carbon::parse($pasien->tanggal_lahir)->diffForHumans()) }})</p>                  
                <p class="text-muted mb-0">{{ $pasien->no_hp }}</p>                  
              </div>
            @endif
          </div>

          <div class="col-lg-8 col-md-6 mt-3" style='border-left: 1px solid #d9dee3;'>
            <h5>Filter Diterapkan</h5>
            <hr>
            @if ($tipe_rekam_medis == "tenaga_kesehatan")
              Tipe : {{ ($filters['tipe_tenaga_kesehatan'] == 'all')? 'Semua Tipe' : (($filters['tipe_tenaga_kesehatan'] == 1)? 'Dokter' : 'Pengobat Tradisional') }}
              <br>
            @endif
            Periode : {{ Carbon::parse($filters['awal_tanggal'])->format('d M Y') }} - {{ Carbon::parse($filters['akhir_tanggal'])->format('d M Y') }}

          </div>


        </div>
        <hr>
      </div>


      <div class="card-body pt-0">          

        <form action="/rekam_medis/show_pdf" class="dont_disabled" target="_blank" method="GET" style="display: inline;">
          <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
          <input type="hidden" name="tipe_rekam_medis" value="{{ $tipe_rekam_medis }}">
          @if ($tipe_rekam_medis == "tenaga_kesehatan")
            <input type="hidden" name="tipe_tenaga_kesehatan" value="{{ $filters['tipe_tenaga_kesehatan'] }}">
          @endif
          <input type="hidden" name="awal_tanggal" value="{{ $filters['awal_tanggal'] }}">
          <input type="hidden" name="akhir_tanggal" value="{{ $filters['akhir_tanggal'] }}">
          <button type='submit' class='btn btn-secondary' style='margin-bottom:20px;'>Print</button>
        </form>
        <button class='btn btn-primary' style='margin-bottom:20px;' onclick="filter()">Filter</button>

        @if ($tipe_rekam_medis == "tenaga_kesehatan")
          @if (auth()->user()->hasRole('tenaga_kesehatan'))
            <a href="/rekam_medis/create?pasien_id={{ $pasien_id }}" class='btn btn-success' style='margin-bottom:20px;'>Tambah</a>                  
          @endif
        @else
          @if (auth()->user()->hasRole('pasien'))
            <a href="/rekam_medis/create" class='btn btn-success' style='margin-bottom:20px;'>Tambah</a>                  
          @endif
        @endif


        <div style='overflow:auto;'>
          <table class='table table-striped datatable' id='yajra'>
            <thead>
              <tr>
                <th style='width:20px;'>No</th>
                <th style='text-align:center;'>Tanggal</th>
                @if ($tipe_rekam_medis == "tenaga_kesehatan")
                  <th style='text-align:center;'>Tenaga Kesehatan</th>
                @endif
                <th style='text-align:center;'>Detail</th>
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
                    {{ Carbon::parse($rekam_medis->tanggal)->format('Y-m-d') }}
                  </td>

                  @if ($tipe_rekam_medis == "tenaga_kesehatan")
                    <td style="text-align:center;">
                      {{ $rekam_medis->tenaga_kesehatan->nama }}
                      <hr>
                      {{ ($rekam_medis->tenaga_kesehatan->tipe_tenaga_kesehatan == 1)? 'Dokter' : 'Pengobat Tradisional' }}
                    </td>
                  @endif
      
                  <td style="text-align: center;">
                    <a href="/rekam_medis/{{ $rekam_medis->id }}">
                      <i class='fa fa-file' style='color:#3c8dbc;'></i>
                    </a>
                  </td>

                  @if ($tipe_rekam_medis == "tenaga_kesehatan")
                    @if (auth()->user()->hasRole('tenaga_kesehatan'))
                      <td style="text-align: center;">
                        @if (auth()->user()->id == $rekam_medis->tenaga_kesehatan_id)
                          <a href="/rekam_medis/{{ $rekam_medis->id }}/edit?pasien_id={{ $pasien_id }}">
                            <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                          </a>
                        @endif
                      </td>
            
                      <td style="text-align: center;">
                        @if (auth()->user()->id == $rekam_medis->tenaga_kesehatan_id)
                          <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus({{ $rekam_medis->id }})'>
                            <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                          </button>
                        @endif
                      </td>
                    @endif
                  @else
                    @if (auth()->user()->hasRole('pasien'))
                      <td style="text-align: center;">
                        <a href="/rekam_medis/{{ $rekam_medis->id }}/edit">
                          <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                        </a>
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
                <select name="tipe_tenaga_kesehatan" class='form-control' aria-hidden="true" style='width:100%;'>
                  <option value="all" selected>-- SEMUA TIPE --</option>
                  <option value="1">Dokter</option>
                  <option value="2">Pengobat Tradisional</option>
                </select>
              </div>
            </div>
          @endif
  

          <div class="mb-3">
            <label class="form-label">Awal Tanggal</label>
            <div class="position-relative">
              <input type="date" class="form-control" name="awal_tanggal" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Akhir Tanggal</label>
            <div class="position-relative">
              <input type="date" class="form-control" name="akhir_tanggal" required>
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

{{-- modal hapus --}}
<div class="modal" id='modal_hapus'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin hapus rekam medis ini?
      </div>
      <div class="modal-footer">
        <form action="diisi_dari_js" method='POST' id='form_hapus'>
          @csrf
          @method('DELETE')

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-danger">Hapus</button>
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

  function hapus(id){
    $('#form_hapus').attr('action','/rekam_medis/'+id);
    $('#modal_hapus').modal('show');
  }

  function anamnesa_baca_selengkapnya(id){
    $('#anamnesa-bacalengkap-'+id).css('display','block');
    $('#anamnesa-bacasedikit-'+id).css('display','none');
  }

  function anamnesa_baca_lebih_sedikit(id){
    $('#anamnesa-bacalengkap-'+id).css('display','none');
    $('#anamnesa-bacasedikit-'+id).css('display','block');
  }

  function diagnosis_baca_selengkapnya(id){
    $('#diagnosis-bacalengkap-'+id).css('display','block');
    $('#diagnosis-bacasedikit-'+id).css('display','none');
  }

  function diagnosis_baca_lebih_sedikit(id){
    $('#diagnosis-bacalengkap-'+id).css('display','none');
    $('#diagnosis-bacasedikit-'+id).css('display','block');
  }

  function terapi_baca_selengkapnya(id){
    $('#terapi-bacalengkap-'+id).css('display','block');
    $('#terapi-bacasedikit-'+id).css('display','none');
  }

  function terapi_baca_lebih_sedikit(id){
    $('#terapi-bacalengkap-'+id).css('display','none');
    $('#terapi-bacasedikit-'+id).css('display','block');
  }

</script>

@endsection