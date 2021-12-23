
<div class='row'>
	<div class="col-md-11">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link {{Request::is('/')?'active':''}}" aria-current="page" href="/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{Request::is('blog')?'active':''}}" aria-current="page" href="/blog">Lista de Posts</a>
			</li>
		
		</ul>
	</div>

	<div class="col-md-1">
		
		<ul class="nav nav-tabs nav-spacing">
		  	<li class="nav-item dropdown">
		  	@if(Auth::check())  
		    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{Auth::user()->name}}</a>
			 <ul class="dropdown-menu">
			      <li><a class="dropdown-item {{Request::is('posts') ? 'active' :''}} " href="{{route('posts.index')}}">Posts</a></li></i>
			      <li><a class="dropdown-item {{Request::is('categories') ? 'active' :''}}" href="{{route('categories.index')}}">Categorias</a></li>
			      <li><a class="dropdown-item {{Request::is('tags') ? 'active' :''}}" href="{{route('tags.index')}}">Tags</a></li>
			      <li><hr class="dropdown-divider"></li>
			      <li><a class="dropdown-item" href="{{route('logout')}}">Terminar sessão</a></li>
			    </ul>
			@else
					{{-- <a href="{{route('login')}}" class="btn btn-outline-primary" style="width:100px; margin:1.5px;">Iniciar sessão</a> --}}
					<a class="nav-link" style="color:green;"  href="{{route('login')}}" role="button" aria-expanded="false">Iniciar sessão</a>
		    </li>
		</ul>
		
		@endif		
	</div>
</div>