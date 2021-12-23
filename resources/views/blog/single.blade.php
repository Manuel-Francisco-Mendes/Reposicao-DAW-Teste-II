@extends('layouts.main')
@section('title',"| $post->title")
@section('content')

<div class='row'>
	<div class='col-md-8 offset-md-2'>
		<div class="comment-head">
			<div class="comment-name">
				<h4>{{$post->user->name}}</h4>
				<div class="comment-time" style="font-size:13px;">{{$post->user->email}}</div>
				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 offset-md-2">
		@if(!empty($post->image))
		<center><img src="{{asset('images/' . $post->image)}}" height=400 width=800>
		@endif
		
		<h3 align='center' class="mt-3">{{$post->title}}</h3>
		<p class="lead">{!!$post->body!!}</p>
		<hr>
			@foreach($post->tags as $tag)
				<a href="{{route('post.tag',$tag->id)}}" class="label">{{$tag->name}}</a>
			@endforeach
		</center>
		<hr>	
		<p>
			Sobre:<small><strong>{{!empty($post->category->name)?ucfirst($post->category->name):'No Category Chosen'}}</strong></small>
		</p>
	</div>
</div>

<div class='row'>
	<div class='col-md-8 offset-md-2'>
		@auth
		<div>
		<form method="POST" action='{{route('post.like',['post_id' => $post->id])}}'style="display:inline;">
			@csrf
				<button type="submit" class='btn me-2 {{$post->likes()->where([['liked',1],['user_id',Auth::user()->id],['post_id',$post->id]])->count()>0?'btn-primary':''}}'>
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
				  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
				</svg>
				</button>
	            {{$post->likes()->where('liked',1)->get() ?count($post->likes()->where('liked',1)->get()):0}}<strong> Likes </strong>
		</form>
		
		</div>
		@endauth
	
	</div>
</div>

<div class='row'>
	<div class='col-md-8 offset-md-2'>
		<h3>Comentários</h3>
		<small style="color:grey;font-size:13px;">{{count($post->comments)}} Comentários</small>
		<div class="comment-field" >
		@foreach($post->comments as $comment)
		<div class="comment-box">
			@auth
				@if(Auth::user()->id == $comment->user->id)
					<form action="{{route('comments.destroy',$comment->id)}}"  method="POST">
						{{csrf_field()}}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn-close btn-close-float" aria-label="Close"></button>
					</form>
				@endif
			@endauth
			<div class="comment-head" >
				<img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower( trim($comment->user->email))) . "?d=wavatar"}}" class="auth-image">
				<div class="comment-name">
					<h5>{{($comment->user->name)}}</h5>	
					<div class="comment-time">
						{{$comment->user->email}}
					</div>
					<p class="comment-time">{{date('j-M-Y g:ia',strtotime($comment->created_at))}}</p>
				</div>
			</div>
			<div class="comment-body">
				{{$comment->comment}}
			</div>	
		</div>
		<hr>
		@endforeach
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="{{route('comments.store',$post->id)}}" method="POST">
			{{csrf_field()}}
			@auth
			<input type="hidden" name="name" value="{{Auth::user()->name}}">
			<input type="hidden" name="email" value="{{Auth::user()->email}}">
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">


			<div class="form-floating">
				<label for="floatingTextarea" style="color:grey;">Escreva um comentário...</label>
			</div>
			<input class="form-control" placeholder="Comentários" id="floatingTextarea" name="comment" style="border-radius:20px;">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
	            <button class="btn btn-secondary mt-2" type="submit" name="send">Submeter</button>
	        </div>
			@endauth
			@guest
	    	<div class="row g-2">
				<div>
					<button type="button" class="btn p-0 m-0"  style="width:100%; border-radius:15px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<input class="form-control" style="border-radius:15px;" type="text" placeholder="Escreva um comentário..." title="You should be logged in to write a comment on our posts" disabled>
					</button>
				</div>
				<div  class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog  modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="staticBackdropLabel"></h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				       <p>Deve estar autenticado para interagir com a página. 
				       Pode registar-se ou iniciar sessão, pressionando o botão seguinte.</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
				        <a type="button" class="btn btn-outline-success btn-sm" href="{{route('login')}}">Iniciar sessão</a>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
	    	@endguest
    	</form>
	</div>
</div>
@stop