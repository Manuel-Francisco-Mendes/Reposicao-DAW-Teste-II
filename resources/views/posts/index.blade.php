@extends('layouts.main')
@section('title',"|DAW-Friends")
@section('content')

<div class="row">
	<div class="col-md-10">
		<h1>Todos Posts</h1>
	</div>
	<div class="col-md-2">
		<a class="btn btn-outline-success btn-md btn-spacing" href="{{ route('posts.create') }}" role="button">Criar Post</a>
	</div>
	<div class="col-md-12">
	<hr>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<th>#</th>
					<th>Título</th>
					<th>Descrição</th>
					<th>Criação</th>
					<th></th>
				</thead>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<th>{{$post->id}}</th>
						<td>{{$post->title}}</td>
						<td>{{substr(strip_tags($post->body),0,50)}}{{strlen(strip_tags($post->body))>50?'...':''}}</td>
						<td>{{date('j/M/Y',strtotime($post->created_at)) }}</td>
						<td>
						@if(Auth::user()->id == $post->user->id)
							{!!Html::Linkroute('posts.show','Ver',array($post->id),array('class'=>'btn btn-secondary btn-sm'))!!}
						@else							
							{!!Html::Linkroute('posts.show','Ver',array($post->id),array('class'=>'btn btn-secondary btn-sm'))!!}
						@endif
					</td>
					</tr> 
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 offset-md-10">
			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>
</div>

@endsection