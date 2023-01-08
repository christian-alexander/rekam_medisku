@extends('layouts.main_layout')

@section('container')
    
  <div class="container mt-3">

    <div class="card mb-4">
      <h5 class="card-header">Profil</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">
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

          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /Account -->

    
    </div>

    {{-- if dokter --}}
    @if (auth()->user()->hasRole('tenaga_kesehatan'))
      @include('profil.faskes_profil')
    @endif
  </div>

@endsection