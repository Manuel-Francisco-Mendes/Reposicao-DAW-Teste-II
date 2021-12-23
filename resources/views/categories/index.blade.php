@extends('layouts.main')
@section('title','| DAW-Friends')
@section('content')

<div class="row">
	<div class='col-md-8'>
		<h1>Categorias</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($categories as $category)
				<tr>
					<th>{{$category->id}}</th>
					<td>{{$category->name}}</td>
					<td>
						<a href="{{route("categories.show",$category->id)}}" class="btn btn-secondary btn-sm">Ver</a>
					</td>
				</tr>
				@endforeach
			</tbody>
	
		</table>
	</div>

	<div class='col-md-3 offset-md-1' >
		<div class="card text-black border-secondary mb-3 mt-3" style="max-width: 18rem;">
		  <div class="card-header border-secondary">Criar nova categoria</div> 
		  	<div class="card-body ">
				<form action="{{route('categories.store')}}" method="POST">
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