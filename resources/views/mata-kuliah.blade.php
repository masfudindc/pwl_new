@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Mata Kuliah</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Mata Kuliah</li>
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
      <h3 class="card-title">Tabel Mata Kuliah</h3>

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
      <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Jam</th>
                <th>Nilai</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($matkul as $no=>$m)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$m->kode_mk}}</td>
                <td>{{$m->nama_mk}}</td>
                <td>{{$m->sks}}</td>
                <td>{{$m->jam}}</td>
                <td>{{$m->nilai}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Mata Kuliah
    </div>
    <!-- /.card-footer-->
  </div>
@endsection