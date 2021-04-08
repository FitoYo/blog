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
								<a href="#" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
								<a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form method="POST" action="{{ route('admin.posts.store') }}" >
  @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Título a la nueva Punlicación</h4>
      </div>
      <div class="modal-body">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{-- <label>Título de la Publicación</label><br>  --}}
            <input name="title" class="form-control" value="{{ old('title') }}" placeholder="Ingresa Aquí el Título">
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Crear Publicación</button>
      </div>
    </div>
  </div>
</form>
</div>
@endpush