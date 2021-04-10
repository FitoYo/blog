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
<form method="POST" action="{{ route('admin.posts.update', $post) }}" >
	@csrf @method('PUT')
	<div class="col-md-8">
		<div class="box box-primary">
				<div class="box-body ">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label>Título de la Publicación</label><br>
						<input name="title" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Ingresa Aquí el Título">
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label>Contenido</label><br>
						<textarea rows="10" name="body" id="editor" class="form-control {{ $errors->has('body') ? 'has-error' : '' }}" placeholder="Escribe...">{{ old('bady', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
              <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                <label>Fecha de Publicación</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="published_at" type="text" value="{{ old('published_at', $post->published_at ? $post->published_at->format('d/m/y') : null) }}" class="form-control pull-right" id="datepicker">
                </div>
                  {!! $errors->first('published_at', '<span class="help-block">:message</span>') !!}  </div>
              <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
              	<label>Categorías</label>
              	<select name="category" class="form-control">
              		<option value="">Selecciona one</option>
              		@foreach ($categories as $category)
              			<option value="{{ $category->id }}" {{ old('category', $post->category_id)  == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              		@endforeach
              	</select>
              	{!! $errors->first('category', '<span class="help-block">:message</span>') !!}
              </div>
              <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
              		<label>Etiquetas</label>
              	  <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
              	  		@foreach ($tags as $tag)
              	  			<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
              	  		@endforeach
                </select>
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
              </div>
				<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
					<label>Extracto de la Publicación</label><br>
					<textarea name="excerpt" class="form-control " placeholder="Escribe un Extracto">{{ old('excerpt', $post->excerpt) }}</textarea>
					{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
				</div>
        <div class="form-group">
          <div class="dropzone"></div>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
 @endpush
 @push('scriptpicker')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
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

    new Dropzone('.dropzone', {
      url: "/admin/posts/{{ $post->id }}/photos",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
      dictDefaultMessage: 'Arrastra las Fotos'
    });
    Dropzone.autoDiscover = false;
</script>
@endpush

