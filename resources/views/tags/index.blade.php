@extends('layouts.main')
@section('title','| DAW-Friends')
@section('content')

<div class="row">
	<div class='col-md-8'>
		<h1>Tags</h1>
		<div class="comment-time ">{{count($tags)}} Tags</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<th>{{$tag->id}}</th>
					<td>{{$tag->name}}</td>

					<form action="{{route('tags.destroy',$tag->id)}}" method="POST">
						@csrf
						@method('DELETE')

					<td>

					</form>
					<a href="{{route('tags.show',$tag->id)}}" class='btn btn-secondary btn-sm '>Ver</a></td>
				</tr>
				@endforeach
			</tbody>
	
		</table>
	</div>

	<div class='col-md-3 offset-md-1' >
		<div class="card text-black border-secondary mb-3 mt-3" style="max-width: 18rem;">
		  <div class="card-header border-secondary">Nova Tag</div> 
		  	<div class="card-body ">
				<form action="{{route('tags.store')}}" method="POST">
					@csrf
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<input type="text" name="name" class='form-control m-1 w-75 form-control-sm'>				
					<button class="btn btn-outline-secondary m-1 btn-sm" type="submit">Criar</button>
				</form>
		  	</div>
		</div>
	</div>
</div>

@stop