@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Data Kayawan</li>
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
      <h3 class="card-title">Tambah Data Karyawan</h3>

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
      <form method="POST" action="{{ $url_form }}">
        @csrf
        {!! (isset($karyawan))? method_field('PUT') : ''!!}
        <div class="form-group">
          <label>NIP</label>
          <input class="form-control @error('nip') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->nip : old('nip') }}" name="nip" type="text"/>
          @error('nip')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->nama : old('nama') }}" name="nama" type="text"/>
          @error('nama')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input class="form-control @error('ttl') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->ttl : old('ttl') }}" name="ttl" type="text"/>
          @error('ttl')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input class="form-control @error('tanggalLahir') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->tanggalLahir : old('tanggalLahir') }}" name="tanggalLahir" type="date"/>
          @error('tanggalLahir')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>E-mail</label>
          <input class="form-control @error('email') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->email : old('email') }}" name="email" type="email"/>
          @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($karyawan)? $karyawan->alamat : old('alamat') }}" name="alamat" type="text"/>
          @error('alamat')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-primary float-right my-2"><i class="fas fa-save pr-1"></i>Simpan</button>
          <a href="{{url('karyawan')}}" class="btn btn-default"><i class="fas fa-arrow-left pr-1"></i>Cancel</a>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Karyawan
    </div>
    <!-- /.card-footer-->
  </div>
@endsection