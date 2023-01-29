@extends('layouts.main_layout')

@section('container')
<div class="container mt-3">
  <div class="card mb-4">
    <h5 class="card-header">

      <a href="{{ url()->previous() }}">
        <i class='fa fa-arrow-left pe-3'></i>
      </a>

      Detail Rekam Medis {{ ($tipe_rekam_medis == "tenaga_kesehatan")? 'dari Tenaga Kesehatan' : 'Personal' }} 
    </h5>
    <hr class="my-0">
    <div class="card-body pb-2">

      <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <div class="position-relative">
          <input type="date" class="form-control" name="tanggal" value="{{ $rekam_medis->tanggal }}" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Anamnesa</label>
        <div class="position-relative p-2" style="background-color:rgba(0,0,0,0.1);border-radius:10px;">
          {!! $rekam_medis->anamnesa !!}
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Diagnosis</label>
        <div class="position-relative p-2" style="background-color:rgba(0,0,0,0.1);border-radius:10px;">
          {!! $rekam_medis->diagnosis !!}
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Terapi</label>
        <div class="position-relative p-2" style="background-color:rgba(0,0,0,0.1);border-radius:10px;">
          {!! $rekam_medis->terapi !!}
        </div>
      </div>

    </div>
  </div>
</div>

@endsection