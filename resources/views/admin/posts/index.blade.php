@extends('admin.layout')


@section('header')
      <h1>
        Posts All
        <small>Listado description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@endsection
@section('content')
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Publicaciones o Posts</h3>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>   Crear Publicación</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Título</th>
	                  <th>Estracto</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->excerpt }}</td>
							<td>
								<a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
								<a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@push('stylespicker')
    <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endpush
 @push('scriptpicker')
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#posts-table").DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

@endpush