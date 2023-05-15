@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Article</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Article</li>
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
      <h3 class="card-title">Tabel Article</h3>

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
      <a href="{{ url('articles/create') }}" class="btn btn-sm btn-success float-right my-2"><i class="fas fa-plus pr-1"></i>Tambah Data</a>
      <a href="{{ url('articles/cetak_pdf') }}" class="btn btn-sm btn-success float-right my-2 mr-2"><i class="fas fa-print pr-1"></i></a>
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @if ($article->count() > 0)
                  @foreach ($article as $i => $a)
                      <tr>
                          <td>{{ $i + 1 }}</td>
                          <td>{{ $a->title }}</td>
                          <td>{{ $a->content }}</td>
                          <td>
                              <a href="{{ url('/articles/'.$a->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-info"></i>Detail</a>
                              <a href="{{ url('/articles/'.$a->id.'/edit/') }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Edit</a>
                              <form method="POST" action="{{ url('/articles/'.$a->id)}}" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash pr-1"></i>Hapus</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              @else
                  <tr>
                      <td colspan="6" class="text-center">Data tidak ada</td>
                  </tr>
              @endif
          </tbody>

      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Article
    </div>
    <!-- /.card-footer-->
  </div>
@endsection