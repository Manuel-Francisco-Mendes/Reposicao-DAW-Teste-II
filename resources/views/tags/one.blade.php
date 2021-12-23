@extends('layouts.main')
@section('title','|DAW-Friends')
@section('content') 
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="tag-page">
		<center>
			<h2>Post de:</h2>
			@auth
			<h5><a href="{{route('tags.show',$tag->id)}}" class="label label-link">{{$tag->name}}</a> tag</h5>
			@endauth
			@guest
			<h5><span class='label label-link'>{{$tag->name}}</span> tag</h5>
			@endguest
			<small style="color:grey;font-size:13px;">{{count($tag->posts)}} posts</small>
		</center>
		<div class="tag-page-content">
		@foreach($tag->posts as $post)

		<div class="tag-posts">
				<h4>Autor: {{$post->user->name}}</h4>
				<h4 id="title-post">T7tulo:  {{$post->title}}</h4>
				<h6 id="time-post">Publicação: {{date('j/M/Y',strtotime($post->created_at))}}</h6>
				<p id="body-post">{{substr(strip_tags($post->body),0,200)}}{{strlen(strip_tags($post->body))>200?'...':''}}</p>
					<div class="row">
						<div class="col-sm-2 offset-sm-10">
							<a class="btn btn-primary mt-3 btn-sm" href={{url('blog',$post->slug)}}>ler mais</a>
						</div>
					</div>
				</div>
				<hr>
		@endforeach
		</div>
	</div>
	</div>	
</div>

@stop