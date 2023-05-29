@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Mahasiswa</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
      <table class="table table-bordered table-striped" id="data_mahasiswa">
          <thead>
              <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>HP</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
  </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Mahasiswa

      <a href="{{ url('mahasiswa/create') }}" class="btn btn-sm btn-success float-right my-2"><i class="fas fa-plus pr-1"></i>Tambah Data</a>

    </div>
    <!-- /.card-footer-->
  </div>

  <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa">
    @csrf
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                    </div>
                </div>
<div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('js_tambahan')
    <script>
      $(document).ready(function(){
        var dataMahasiswa = $('#data_mahasiswa').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
                'url': '{{  url('mahasiswa/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
          columns:[
            {data:'nomor', searchable:false, sortable:false},
            {data:'nim',name:'nim', sortable:false, searchable:true},
            {data:'nama',name:'nama', sortable:false, searchable:true},
            {data:'hp',name:'hp', sortable:false, searchable:true},
            {data:'id',name:'id', sortable: false, searchable: false,
                    render: function(data, row){
                        var btn = `<a href="{{ url('/mahasiswa/')}}`+data+`/edit" class="btn btn-xs btn-warning" ><i class="fa fa-edit"></i> Edit</a>` +
                                  `<a href="{{ url('/mahasiswa/') }} " class="btn btn-xs btn-info"><i class="fa fa-list"></i> Detail</a>` +
                                  `<form method="POST" action="{{ url('/mahasiswa/') }}`+data+`">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>`;
                        return btn;
                    }
                }
          ]
        })
      });

      $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('mahasiswa') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    //$('#modal_mahasiswa').modal('hide');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                }
            });
        });
    </script>
@endpush