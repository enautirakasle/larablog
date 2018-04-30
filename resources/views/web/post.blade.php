@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1>{{ $post->name }}</h1>
		
		<div class="panel panel-defalut">
			<div class="panel-heading">
			Categoria: 
			<a href="#">{{ $post->category->name }}</a>
			</div>
			<div class="panel-body">
				@if($post->file) 
				<img src="{{ $post->file }}" class="img-responsive">
				@endif 
				{{ $post->excerpt }}
				<hr>
				{!! $post->body !!}
				<hr>
				Etiquetas:
				@foreach($post->tags as $tag)
                    <a href="#">
                        {{ $tag->name }}
                    </a>
				@endforeach
			</div>
		</div>
		
	</div>
</div>

@endsection
