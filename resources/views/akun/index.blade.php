@extends('layouts.main_layout')

@section('container')

<div class='container mt-5'>
  <div class='card'>
    <div class='card-body'>
      <h4 style='text-align:center;'>{{ ($status_aktif == 1)? 'Daftar Akun Aktif' : 'Daftar Akun Nonaktif' }}</h4>
      <button onclick="tambah()" class='btn btn-success' style='margin-bottom:20px;'><i class="fa-solid fa-plus"></i> Tambah Akun</button>
      <a href="/akun?{{ ($status_aktif == 1)? 'status_aktif=0' : '' }}" class='btn btn-primary' style='margin-bottom:20px;'><i class="fa-solid fa-eye"></i> {{ ($status_aktif == 1)? 'Lihat Akun Nonaktif' : 'Lihat Akun Aktif' }}</a>
      <div style='overflow:auto;'>
        <table class='table table-striped' id='yajra'>
          <thead>
            <tr>
              <th style='width:20px;'>No</th>
              <th style='text-align:center;'>Peran</th>
              <th style='text-align:center;'>Username</th>
              <th style='text-align:center;'>Nama</th>
              <th style='text-align:center;'>Edit</th>
              <th style='text-align:center;'>{{ ($status_aktif == 1)? 'Nonaktifkan' : 'Aktifkan' }}</th>
            </tr>
          </thead>
          <tbody>

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
        <h5 class="modal-title">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/akun" method='POST' id='form_tambah'>
          @csrf

          <div class="form-group">
            <label>PERAN *</label>
            <select name="peran" class='form-control'>
              <option value="">-- PILIH PERAN --</option>
              <option value="admin">Admin</option>
              <option value="guru">Guru</option>
              <option value="siswa">Siswa</option>
            </select>
            <span class='help-block'>HATI HATI!! PILIHAN PERAN TIDAK BISA DIEDIT!!</span>
          </div>

          <div class="form-group">
            <label>USERNAME *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="text" class="form-control" name="username" required="" onkeyup='$(this).val($(this).val().toLowerCase())'>
            </div>
            <span class='help-block'>Username tidak boleh mengandung spasi.</span>
          </div>

          <div class="form-group">
            <label>NAMA *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="text" class="form-control" name="nama" required="" />
            </div>
          </div>

          <div class="form-group">
            <label>PASSWORD *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="password" class="form-control input_password_akun" id="password" name="password" required="" />
            </div>
          </div>

          <div class="form-group">
            <label>KONFIRMASI PASSWORD *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="password" class="form-control input_password_akun" id="konfirmasi_password" name="konfirmasi_password" required="" />
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkbox-show-password-akun">
                <label class="form-check-label" for="checkbox-show-password-akun">
                  Perlihatkan Password
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal edit --}}
<div class="modal" tabindex="-1" id='modal_edit'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/akun/id_dari_js" method='POST' id='form_edit'>
          @method('PUT')
          @csrf

          <div class="form-group">
            <label>PERAN *</label>
            <select id='peran_edit' class='form-control' disabled>
              <option value="">-- PILIH PERAN --</option>
              <option value="admin">Admin</option>
              <option value="guru">Guru</option>
              <option value="siswa">Siswa</option>
            </select>
          </div>

          <div class="form-group">
            <label>USERNAME *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="text" class="form-control" name="username" id='username_edit' required="" onkeyup='$(this).val($(this).val().toLowerCase())'>
            </div>
            <span class='help-block'>Username tidak boleh mengandung spasi.</span>
          </div>

          <div class="form-group">
            <label>NAMA *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="text" class="form-control" name="nama" id='nama_edit' required="" />
            </div>
          </div>

          <div class="form-group">
            <label>PASSWORD *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="password" class="form-control input_password_akun" name="password" />
            </div>
            <span class='help-block'>Kosongkan bila tidak ingin mengubah password</span>
          </div>

          <div class="form-group">
            <label>KONFIRMASI PASSWORD *</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">                
                <i class="fa fa-arrow-right"></i>
              </span>
              <input type="password" class="form-control input_password_akun" name="konfirmasi_password" />
            </div>
            <span class='help-block'>Kosongkan bila tidak ingin mengubah password</span>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkbox-show-password-akun-edit">
                <label class="form-check-label" for="checkbox-show-password-akun-edit">
                  Perlihatkan Password
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-primary"><i class="fa-solid fa-edit"></i> Edit</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal status aktif --}}
<div class="modal" tabindex="-1" id='modal_status_aktif'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ ($status_aktif == 1)? 'Nonaktifkan' : 'Aktifkan' }} Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin {{ ($status_aktif == 1)? 'Menonaktifkan' : 'Mengaktifkan' }} akun ini?
      </div>
      <div class="modal-footer">
        <form action="/akun/id_dari_js" method='POST' id='form_status_aktif'>
          @csrf

          <div class="form-group" style='text-align:center;'>
            <button type='submit' class="btn btn-primary"><i class="fa-solid fa-check"></i> {{ ($status_aktif == 1)? 'Nonaktifkan' : 'Aktifkan' }} </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#checkbox-show-password-akun').change(function(){
    if($(this).is(':checked')){
      $('.input_password_akun').attr('type','text');
    }else{
      $('.input_password_akun').attr('type','password');
    }
  });
  $('#checkbox-show-password-akun-edit').change(function(){
    if($(this).is(':checked')){
      $('.input_password_akun').attr('type','text');
    }else{
      $('.input_password_akun').attr('type','password');
    }
  });

  function tambah(){
    $('#modal_tambah').modal('show');
  }

  function edit(id){
    $('#form_edit').attr('action','/akun/'+id);

    $.ajax({
      url: '/akun/get_data/' + id,
    })
    .done(function( data ){
      const akun = JSON.parse(data);
      
      $('#peran_edit').val(akun.peran).change();
      $('#username_edit').val(akun.username);
      $('#nama_edit').val(akun.nama);
      
      $('#modal_edit').modal('show');
    });

  }

  function konfirm_change_status_aktif(id, is_form_aktifkan = false){
    if( ! is_form_aktifkan){
      var action = 'akun/change_status_aktif/nonaktifkan/' + id;  
    }else{
      var action = 'akun/change_status_aktif/aktifkan/' + id;  
    }

    $('#form_status_aktif').attr('action',action);
    $('#modal_status_aktif').modal('show');
  }
</script>


{{-- utk yajra --}}
<script>
  var column = [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'peran', name: 'peran'},
      {data: 'username', name: 'username'},
      {data: 'nama', name: 'nama'},
      {data: 'edit', name: 'edit'},
      {data: 'status_aktif', name: 'status_aktif'},
    ];
</script>

<script>
  $(document).ready(function(){
    $('#yajra').dataTable({
      processing: true,
      serverSide: true,
      ajax: '/akun/yajra',
      columns: column
    });
  });
</script>

{{-- script aksi aksi --}}
<script>
  $('form').on('submit', function(e){
    if(this.id != 'form_ubah_password'){
      if(this.id != 'mungkin perlu pengecualian'){


        e.preventDefault();
        var form = this;
        const old_button_text = $(form).find(':submit').html();
        if($(form).attr('method') != "GET" && $(form).attr('method') != "get"){
          var action = $(form).attr('action');
        }else{
          var teks = $(form).attr('action') + "?";
          $(this).find(':input').not(':button').each(function(){
            teks = teks + $(this).attr('name') + "=" + $(this).val() + "&";
          });
          var action = teks;
        }

        $.ajax({
            url:action,
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            
            beforeSend:function(){
              $(form).find(':submit').html('Memproses...');
              $(form).find(':submit').attr('disabled',true);
            },
            
            success:function(data){
              $(form).find(':submit').html(old_button_text);
              $(form).find(':submit').attr('disabled',false);
              
              if(data.hasOwnProperty('errors')){
                var errors = '';
                $.each(data.errors, function(key,value){
                  errors = errors + "- " + value + "<br>";
                });
                iziToast.error({
                  title: errors,
                  position: 'topCenter'
                });
              
              }else if(data.hasOwnProperty('success')){
                var tabel = $('#yajra').dataTable();
                tabel.fnDraw(false);
                $('.modal').modal('hide');
                $(form).find(':input').not(':button,:hidden').val('');
                iziToast.success({
                  title: data.success,
                  position: 'bottomRight'
                });
              
              }else if(data.hasOwnProperty('danger')){
                $('.modal').modal('hide');
                $(form).find(':input').not(':button,:hidden').val('');
                iziToast.error({
                  title: data.danger,
                  position: 'bottomRight'
                });
              
              }else{
                alert('unknown error :(');
              }
            },
            
            error: function (xhr, ajaxOptions, thrownError) {
              $('.modal').modal('hide');
              $(form).find(':submit').attr('disabled',false);
              $(form).find(':submit').html(old_button_text);
              const respon = JSON.parse(xhr.responseText);
              
              if(respon.message == "not_allowed"){
                Swal.fire({
                  icon: 'error',
                  title: 'Anda tidak memiliki akses',
                });
              
              }else{
                alert("error code : " + xhr.status + "\n" + "HTTP error : "  + thrownError + "\n" + "Response message : " + respon.message);
              }
            }
        });


      }
    }
  });
</script>

@endsection