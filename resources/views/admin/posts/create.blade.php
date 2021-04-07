@extends('admin.layout')

@section('header')
      <h1>
        Post
        <small>Create New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>

        <li class="active">Posts</li>
      </ol>
@endsection

@section('content')
<div class="row">
<form>
	<div class="col-md-8">
		<div class="box box-primary">
				<div class="box-body ">
					<div class="form-group">
						<label>Título de la Publicación</label><br>
						<input name="title" class="form-control" placeholder="Ingresa Aquí el Título">
					</div>

					<div class="form-group">
						<label>Contenido</label><br>
						<textarea rows="10" name="body" id="editor" class="form-control" placeholder="Escribe..."></textarea>
					</div>
				</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
              <div class="form-group">
                <label>Fecha de Publicación</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>
              <div class="form-group">
              	<label>Categorías</label>
              	<select class="form-control">
              		<option value="">Selecciona one</option>
              		@foreach ($categories as $category)
              			<option value="{{ $category->id }}">{{ $category->name }}</option>
              		@endforeach
              	</select>
              </div>
              <div class="form-group">
              		<label>Etiquetas</label>
              	  <select class="form-control select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
              	  		@foreach ($tags as $tag)
              	  			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
              	  		@endforeach
                </select>
              </div>
				<div class="form-group">
					<label>Extracto de la Publicación</label><br>
					<textarea name="excerpt" class="form-control " placeholder="Escribe un Extracto"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
@push('stylespicker')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
 @endpush
 @push('scriptpicker')
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
	$('#datepicker').datepicker({
      autoclose: true
    });
    CKEDITOR.replace('editor');
    $('.select2').select2();
</script>
@endpush

