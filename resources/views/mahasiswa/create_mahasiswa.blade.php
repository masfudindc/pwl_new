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
      <h3 class="card-title">Form Mahasiswa</h3>

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
      <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
        @csrf
        {!! (isset($mahasiswa))? method_field('PUT') : ''!!}
        <div class="form-group">
          <label>NIM</label>
          <input class="form-control @error('nim') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->nim : old('nim') }}" name="nim" type="text" />
          @error('nim')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->nama : old('nama') }}" name="nama" type="text"/>
          @error('nama')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input class="form-control" name="foto" value="" required="required" type="file">
          @error('foto')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Prodi</label>
          <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
            <option value="" selected disabled>Select Prodi</option>
              @foreach ($prodi as $p)
                <option value="{{$p->prodi_id}}" {{ isset($mahasiswa)? (($mahasiswa->prodi_id == $p->prodi_id) ? "selected" : "") : ''}} {{ old('prodi_id') == $p->prodi_id ? "selected" : "" }}>{{$p->prodi}}</option>
            @endforeach
          </select>
          @error('prodi_id')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Kelas</label>
          <select name="kelas_id" class="form-control @error('prodi_id') is-invalid @enderror">
            <option value="" selected disabled>Select Kelas</option>
              @foreach ($kelas as $k)
                <option value="{{$k->id}}" {{ isset($mahasiswa)? (($mahasiswa->id == $k->id) ? "selected" : "") : ''}} {{ old('kelas_id') == $k->id ? "selected" : "" }}>{{$k->nama_kelas}}</option>
            @endforeach
          </select>
          @error('kelas_id')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>JK</label>
          <input class="form-control @error('jk') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->jk : old('jk') }}" name="jk" type="text"/>
          @error('jk')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tempat lahir</label>
          <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->tempat_lahir : old('tempat_lahir') }}" name="tempat_lahir" type="text"/>
          @error('tempat_lahir')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->tanggal_lahir : old('tanggal_lahir') }}" name="tanggal_lahir" type="date"/>
          @error('tanggal_lahir')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>HP</label>
          <input class="form-control @error('hp') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->hp : old('hp') }}" name="hp" type="text"/>
          @error('hp')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($mahasiswa)? $mahasiswa->alamat : old('alamat') }}" name="alamat" type="text"/>
          @error('alamat')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-primary float-right my-2"><i class="fas fa-save pr-1"></i>Simpan</button>
          <a href="{{url('mahasiswa')}}" class="btn btn-default"><i class="fas fa-arrow-left pr-1"></i>Cancel</a>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Mahasiswa
    </div>
    <!-- /.card-footer-->
  </div>
@endsection