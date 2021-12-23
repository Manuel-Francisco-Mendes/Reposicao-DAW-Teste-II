@extends('layouts.main')
@section('title','|DAW-Friends')
@section('content')

<div class="row">	
	<div class="col-md-10">
		<h2>{{$category->name}} Posts</h2><small> {{$category->posts()->count()}} {{$category->posts()->count()>1 ?'posts':'post' }} </small>			
	</div>
	@auth
	<div class="col-md-2">		
			<div class='d-grid gap-2'>	
			</div>
	</div>
	@endauth
	<hr>
</div>
<div class="row">	
	<div class="col-md-8 offset-md-2">	
	<table class="table table-striped">	
		<thead>
		<tr>	
			<th>#</th>
			<th>Post</th>
			<th>Criação</th>
			@auth
			<th></th>
			@endauth
		</tr>	
		</thead>
		<tbody>
		@foreach($category->posts as $post)
			<tr>	
				<th>{{$post->id}}</th>
				<td>{{$post->title}}</td>
				<td>{{$post->created_at}}</td>
				@auth
				<td>	
					<a href="{{route('posts.show',$post->id)}}" class="btn btn-secondary btn-sm">Ver</a>
				</td>
				@endauth
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
</div>

@stop