@extends('layouts.main')
@section('title','|DAW-Friends')
@section('content')
<div class="row">
	<div class="col-md-8">
			<div>
						
				<div class="comment-name">
					<h4>{{$post->user->name}}</h4>
					<div class="comment-time" style="font-size:13px;">{{$post->user->email}}</div>
					
				</div>
			</div>

			<div class='post'>
				<hr>
				
				@if(!empty($post->image))
					<img src="{{asset('images/' . $post->image)}}"class="img-fluid" >
				@endif
				<h3>{{$post->title}}</h3>            
				<p class="lead">{!!$post->body!!}</p>
				<hr>
				<div>
					@foreach($post->tags as $tag)
						<a href="{{route('post.tag',$tag->id)}}" class="label">{{$tag->name}}</a>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-3 offset-md-1 well h-50">
			<dl class="row ">
				<dt >Usuário:</dt>
				<dd class='font-format'>
					<p>{{$post->user->name}}</p>
				</dd>
				<dt >Post:</dt>
				<dd class='font-format' ><a href="{{ url('blog',$post->slug) }}"style="text-decoration: none;" >{{($post->slug)}}</a></dd>

				<dt >Criação:</dt>
				<dd class='font-format'>
					<p>{{ date('j/M/Y',strtotime($post->created_at)) }}</p>
				</dd>

				<dt>Actualização:</dt>
				<dd class='font-format'><p>{{ date('j/M/Y',strtotime($post->updated_at)) }}</p></dd>

				<dt >Categoria:</dt>
				<dd class='font-format'>
				@if(!empty($post->category->name))
					<a href="{{route('categories.show',$post->category->id)}}"style="text-decoration: none;">{{ucfirst($post->category->name)}}</a>
				@else
					<small>Não há categoria escolhida</small>
				@endif
				</dd> 
			</dl>
			<hr>
			@if(Auth::user()->id == $post->user->id)
			<div class="row">
				
			<div class="col-sm-6">
				{!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
					<div class="d-grid gap-2">
					</div>
				{!!Form::close()!!}
			</div>
			</div>
			@endif
			<div class="row">
				<div class="col-sm-12">
					<div class="d-grid gap-2">
						<a href="/posts" class="btn btn-primary btn-sm">Todos Posts</a>
					</div>
				</div>
			</div>
		</div>
</div>
	

@endsection