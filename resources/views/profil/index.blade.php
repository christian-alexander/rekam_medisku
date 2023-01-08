@extends('layouts.main_layout')

@section('container')
    
  <div class="container mt-3">

    <div class="card mb-4">
      <h5 class="card-header">Profil</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload Foto</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
            </label>
            <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <p class="text-muted mb-0">Tipe gambar JPG, GIF or PNG.</p>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
          <div class="row">
            <div class="mb-3 col-md-6 fv-plugins-icon-container">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" value='{{ auth()->user()->username }}' autofocus="">
              <span class='help-block'>Username tidak boleh mengandung spasi</span>
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
           
            <div class="mb-3 col-md-6 fv-plugins-icon-container">
              <label for="nama" class="form-label">Nama</label>
              <input class="form-control" type="text" id="nama" name="nama" value='{{ auth()->user()->nama }}' autofocus="">
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
           
            <div class="mb-3 col-md-6">
              <label class="form-label" for="provinsi">Provinsi</label>
              <div class="position-relative">
                <select id="provinsi" class="select2 form-select select2-hidden-accessible" tabindex="-1" aria-hidden="true" style='width:100%;'>
                  {{-- diisi dari js --}}
                </select>
              </div>
            </div>
           
            <div class="mb-3 col-md-6">
              <label class="form-label" for="kota">Kota</label>
              <div class="position-relative">
                <select id="kota" class="select2 form-select select2-hidden-accessible" tabindex="-1" aria-hidden="true" style='width:100%;'>
                  {{-- diisi dari js --}}
                </select>
              </div>
            </div>
          
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>

  </div>


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
  </script>

@endsection