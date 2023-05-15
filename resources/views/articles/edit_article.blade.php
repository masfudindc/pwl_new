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
      <form action="{{ url('/articles') }}/{{ $article->id }}" method="post"enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}" placeholder="Enter article title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="title" value="{{$article->content}}" placeholder="Enter article content" required>
            </div>
            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="image" class="form-control-file" id="featured_image"required>
                <img width="150px" src="{{asset('storage/'.$article->featured_image)}}">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Mahasiswa
    </div>
    <!-- /.card-footer-->
  </div>
@endsection