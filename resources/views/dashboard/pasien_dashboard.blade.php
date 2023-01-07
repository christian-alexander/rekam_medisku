@extends('layouts.main_layout')

@section('container')
  
<div class="container mt-5">
  <div class="card">
    <div class="d-flex align-items-end row">
      <div class="col-sm-7">
        <div class="card-body">
          <h5 class="card-title text-primary">Selamat Datang! 🎉</h5>
          <p class="mb-4">
            Selamat Datang di Aplikasi Pencatatan Riwayat Medis Rekam Medisku.
            <br>
            <br>
          </p>
        </div>
      </div>
      <div class="col-sm-5 text-center text-sm-left">
        <div class="card-body pb-0 px-0 px-md-4">
          <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
        </div>
      </div>
    </div>
  </div>


  {{-- cards literasi dasar --}}
  <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 mt-3">
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/sains.jpg') }}" alt="Card image cap" style='width:100%;height:100%;'>
        <div class="card-body">
          <h5 class="card-title">Literasi Sains</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/digital.jpg') }}" alt="Card image cap" style='width:100%;height:100%;' >
        <div class="card-body">
          <h5 class="card-title">Literasi Digital</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/finansial.jpg') }}" alt="Card image cap" style='width:100%;height:100%;'>
        <div class="card-body">
          <h5 class="card-title">Literasi Finansial</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/budaya.jpg') }}" alt="Card image cap" style='width:100%;height:100%;'>
        <div class="card-body">
          <h5 class="card-title">Literasi Budaya</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/bacatulis.jpg') }}" alt="Card image cap" style='width:100%;height:100%;'>
        <div class="card-body">
          <h5 class="card-title">Literasi Baca Tulis</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/literasi/numerasi.jpg') }}" alt="Card image cap" style='width:100%;height:100%;'>
        <div class="card-body">
          <h5 class="card-title">Literasi Numerasi</h5>
          <p class="card-text">

          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection