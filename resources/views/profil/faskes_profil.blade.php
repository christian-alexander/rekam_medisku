<div class="card mb-4">
  <h5 class="card-header">Fasilitas Kesehatan</h5>
  <hr class="my-0">
  <div class="card-body">
    
    {{-- <h4 style='text-align:center;'>Daftar Akun</h4> --}}
    <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'>Tambah</button>
    <div style='overflow:auto;'>
      <table class='table table-striped datatable'>
        <thead>
          <tr>
            <th style='width:20px;'>No</th>
            <th style='text-align:center;'>Lokasi</th>
            <th style='text-align:center;'>Nama Faskes</th>
            <th style='text-align:center;'>Spesialisasi</th>
            <th style='text-align:center;'>Hapus</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($faskes_has_tenaga_kesehatans as $faskes_has_tenaga_kesehatan)

            <tr>
              <td style='text-align:right'>{{ $loop->iteration }}</td>
              
              <td style='text-align:center'>
                {{ $faskes_has_tenaga_kesehatan->faskes->alamat }}
                <br>
                {{ $faskes_has_tenaga_kesehatan->faskes->kota }}, {{ $faskes_has_tenaga_kesehatan->faskes->provinsi }}                
              </td>

              <td style="text-align: center;">
                {{ $faskes_has_tenaga_kesehatan->faskes->nama }}
              </td>

              <td style="text-align: center;">
                {{ $faskes_has_tenaga_kesehatan->spesialisasi }}
              </td>

              <td style="text-align: center;">
                <button id='btn_hapus' style='border:0;background-color:rgba(0,0,0,0);visibility:visible;' onclick='hapus({{ $faskes_has_tenaga_kesehatan->id }})'>
                  <i class='fa fa-trash' style='color:#3c8dbc;'></i>
                </button>
              </td>

            </tr>
  
          @endforeach

        </tbody>
      </table>
    </div>

  </div>

</div>


{{-- modal tambah --}}
<div class="modal" id='modal_tambah'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Faskes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/faskes_has_tenaga_kesehatan/tambah" method='POST' id='form_tambah'>
          @csrf

          <div class="mb-3">
            <label class="form-label">Faskes</label>
            <div class="position-relative">
              <select name="faskes_id" class='form-control' aria-hidden="true" style='width:100%;'>
                <option value="">-- PILIH FASKES --</option>
                @foreach ($faskeses as $faskes)
                  <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Spesialisasi</label>
            <div class="position-relative">
              <input type="text" class="form-control" name="spesialisasi" placeholder="Contoh : Dokter Umum / Kardiologi / Pijat Tulang">
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
<div class="modal" id='modal_hapus'>
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
        <form action="diisi_dari_js" method='POST' id='form_hapus'>
          @csrf

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
    $('#form_hapus').attr('action','faskes_has_tenaga_kesehatan/hapus/' + id);
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
    $('#provinsi_asli').val($(this).val());

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
    $('#kota_asli').val($($this).val());
  });
</script>