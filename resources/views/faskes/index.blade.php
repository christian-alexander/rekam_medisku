@extends('layouts.main_layout')

@section('container')

<div class="container mt-3">
    
  <div class="card mb-4">
    <h5 class="card-header">Daftar Faskes</h5>
    <hr class="my-0">
    <div class="card-body">
      
      <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'>Tambah</button>
      <div style='overflow:auto;'>
        <table class='table table-striped datatable'>
          <thead>
            <tr>
              <th style='width:20px;'>No</th>
              <th style='text-align:center;'>Lokasi</th>
              <th style='text-align:center;'>Nama Faskes</th>
              <th style='text-align:center;'>Tipe</th>
              <th style='text-align:center;'>Edit</th>
              <th style='text-align:center;'>Hapus</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td style="text-align:right;">1</td>

              <td style="text-align:center;">
                Jl. Kesehatan No. 1
                <br>
                Surabaya, Jawa Timur
              </td>

              <td style='text-align:center;'>
                Rumah Sakit Eka Husada
              </td>

              <td style='text-align:center;'>
                Faskes Modern
              </td>

              <td style='text-align:center;'>
                <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit(1)'>
                  <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                </button>
              </td>
              
              <td style='text-align:center;'>
                <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus(1)'>
                  <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                </button>
              </td>

            </tr>

            <tr>
              <td style="text-align:right;">2</td>

              <td style="text-align:center;">
                Jl. Kesehatan No. 12
                <br>
                Surabaya, Jawa Timur
              </td>

              <td style='text-align:center;'>
                Klinik Utama Husada
              </td>

              <td style='text-align:center;'>
                Faskes Modern
              </td>

              <td style='text-align:center;'>
                <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit(1)'>
                  <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                </button>
              </td>
              
              <td style='text-align:center;'>
                <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus(1)'>
                  <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                </button>
              </td>

            </tr>

            <tr>
              <td style="text-align:right;">3</td>

              <td style="text-align:center;">
                Jl. Kesehatan No. 98
                <br>
                Surabaya, Jawa Timur
              </td>

              <td style='text-align:center;'>
                Sangkal Putung Joss
              </td>

              <td style='text-align:center;'>
                Faskes Tradisional
              </td>

              <td style='text-align:center;'>
                <button id='btn_edit' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='edit(1)'>
                  <i class='fa fa-edit' style='color:#3c8dbc;'></i>
                </button>
              </td>
              
              <td style='text-align:center;'>
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

    
{{-- modal tambah --}}
<div class="modal" tabindex="-1" id='modal_tambah'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Faskes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method='POST' id='form_edit'>
          @csrf

          <div class='mb-3'>
            <label class='form-label' for="nama">Nama</label>
            <input type="text" class='form-control' name="nama" id="nama" placeholder="Rumah Sakit Bersahaja" required>
          </div>

          <div class='mb-3'>
            <label class='form-label' for="tipe_faskes">Tipe Faskes</label>
            <select class='form-control select2' name="tipe_faskes" id="tipe_faskes" style="width: 100%;" required>
              <option value="1">Faskes Modern</option>
              <option value="2">Faskes Tradisional</option>
            </select>
          </div>

          <div class='mb-3'>
            <label class='form-label' for="alamat">Alamat</label>
            <input type="text" class='form-control' name="alamat" id="alamat" placeholder="Jl. Kesehatan No.1 (tanpa kota dan provinsi)" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="provinsi">Provinsi</label>
            <input type="hidden" name="provinsi" id="provinsi_asli">
            <div class="position-relative">
              <select id="provinsi" class='form-control select2' aria-hidden="true" style='width:100%;' required>
                {{-- diisi dari js --}}
              </select>
            </div>
          </div>
          
          <div class="mb-3">
            <label class="form-label" for="kota">Kota</label>
            <input type="hidden" name="kota" id="kota_asli">
            <div class="position-relative">
              <select id="kota" class='form-control select2' tabindex="-1" aria-hidden="true" style='width:100%;' required>
                {{-- diisi dari js --}}
              </select>
            </div>
          </div>

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-success">Tambah</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


{{-- modal hapus --}}
<div class="modal" tabindex="-1" id='modal_hapus'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Faskes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin hapus faskes ini?
      </div>
      <div class="modal-footer">
        <form action="#" method='POST' id='form_hapus'>
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
  function tambah(){
    $('#modal_tambah').modal('show');
  }

  function hapus(id){
    $('#form_hapus').attr('action','faskes/' + id);
    $('#modal_hapus').modal('show');
  }
</script>

<script>
  $(document).ready(function(){

    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
    .then(response => response.json())
    .then(provinces => {
      let options = "<option value=''>-- PILIH PROVINSI --</option>";
      provinces.forEach(function(item){
        options += "<option value='"+item.id+"'>"+item.name+"</option>";
      });

      $('#provinsi').html(options);
    });

  });


  $('#provinsi').change(function(){
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/province/'+$(this).val()+'.json')
    .then(response => response.json())
    .then(regency => {
      $('#provinsi_asli').val(regency.name);      
    });

    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+$(this).val()+'.json')
    .then(response => response.json())
    .then(regencies => {
      let options = "<option value=''>-- PILIH KOTA --</option>";
      regencies.forEach(function(item){
        options += "<option value='"+item.id+"'>"+item.name+"</option>";
      });

      $('#kota').html(options);
    });

  });

  $('#kota').change(function(){
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regency/'+$(this).val()+'.json')
    .then(response => response.json())
    .then(regency => {
      $('#kota_asli').val(regency.name);      
    });
  });
</script>

@endsection