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
      <h3 class="card-title">Detail Mahasiswa</h3>

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
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>NIM: </b> {{ $mahasiswa->nim }}</li>
            <li class="list-group-item"><b>Nama: </b> {{ $mahasiswa->nama }}</li>
            <li class="list-group-item"><b>Program Studi: </b> {{ $mahasiswa->prodi->prodi }}</li>
            <li class="list-group-item"><b>Kelas: </b> {{ $mahasiswa->kelas->nama_kelas }}</li>
            <li class="list-group-item"><b>Jenis Kelamin: </b> {{ $mahasiswa->jk }}</li>
            <li class="list-group-item"><b>Tempat Lahir: </b> {{ $mahasiswa->tempat_lahir }}</li>
            <li class="list-group-item"><b>Tanggal Lahir: </b> {{ $mahasiswa->tanggal_lahir }}</li>
            <li class="list-group-item"><b>Alamat: </b> {{ $mahasiswa->alamat }}</li>
            <li class="list-group-item"><b>No. HP: </b> {{ $mahasiswa->hp }}</li>
        </ul>        
        <a href="{{url('mahasiswa')}}" class="btn btn-default"><i class="fas fa-arrow-left pr-1"></i>Back</a>
  </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Mahasiswa
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
