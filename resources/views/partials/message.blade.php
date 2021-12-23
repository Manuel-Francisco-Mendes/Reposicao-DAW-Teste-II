
@if(Session::has('Successo'))
	<div class="alert alert-success" role="alert">
		Successo: {{ Session::get('Successo!') }}
	</div>
@endif
@if(Session::has('Delete'))
	<div class="alert alert-danger" role="alert">
		Successo: {{ Session::get('Apagado!') }}
	</div>
@endif

@if(count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Erro!</strong>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
