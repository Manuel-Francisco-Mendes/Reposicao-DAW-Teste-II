@extends('layouts.main')
@section('title','|DAW-Friends')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h2 align="center">Lista de Posts</h2>
		</div>
	</div>
	@foreach($posts as $post)
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h2>Post:  {{$post->title}}</h2>
			<h5>Data:  {{date('j/M/Y',strtotime($post->created_at))}}</h5>
			<p>{{substr(strip_tags($post->body),0,200)}}{{strlen(strip_tags($post->body))>200?'...':''}}</p>
			<a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Leia mais</a>
			<hr>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class='col-md- 1 offset-md-11'>
		{!! $posts->links(); !!}
		</div>
	</div>
@stop