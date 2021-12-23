@extends('layouts.main')
@section('title','|DAW-Friends')
@section('content')
<div class='row'>
   <div class='col-md-4 offset-md-4'>
      <h2>Contacte-me</h2>
    <div class="mt-4">
      @auth
        <form action='{{url('contact')}}' method="POST"> 
            {{csrf_field()}}
              <div class="mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInputGrid" name="email" placeholder="name@example.com">
                    <label for="floatingInputGrid" name="email" style="color:grey;">E-mail</label>
                </div>
              </div>
              <div class="mb-3">
                <input type="hidden" class="form-control form-control-sm" id="exampleFormControlInput1" name="name" placeholder="write your email..." value="{{Auth::user()->name}}">
              </div>  
              <div class="mb-3">
                <div class="form-floating">
                  <input  class="form-control" type="text" name="subject" id="floatingInputGrid" placeholder="Subject">
                  <label for="floatingInputGrid" type="Subject" name="subject" style="color:grey;">Título</label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-floating">
                  <textarea class="form-control"  name='comments' placeholder="Write a Comment..." id="floatingTextarea2" style="height:100px;"></textarea>
                  <label for="floatingTextarea2" name="comments" style="color:grey;">Comentários</label>
                </div>
              </div>
              <div>
                  <button class="btn btn-primary" type="submit" name="send">Submeter</button>
              </div>
        </form>
      @endauth 
      @guest
          <form action='{{url('contact')}}' method="POST"> 
            {{csrf_field()}}
              <div class="mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInputGrid" name="email" placeholder="name@example.com">
                    <label for="floatingInputGrid" name="email" style="color:grey;">E-mail</label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInputGrid" name="name" placeholder="Username">
                    <label for="floatingInputGrid" name="name" style="color:grey;">Usuário</label>
                </div>              
              </div>  
              <div class="mb-3">
                <div class="form-floating">
                  <input  class="form-control" type="text" name="subject" id="floatingInputGrid" placeholder="Subject">
                  <label for="floatingInputGrid" type="Subject" name="subject" style="color:grey;">Título</label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-floating">
                  <textarea class="form-control"  name='comments' placeholder="Write a Comment..." id="floatingTextarea2" style="height: 100px;"></textarea>
                  <label for="floatingTextarea2" name="comments" style="color:grey;">Comentários</label>
                </div>
              </div>
              <div>
                  <button class="btn btn-primary" type="submit" name="send">Submeter</button>
            </div>
        </form>
        @endguest  
    </div>
  </div>
</div>


@endsection
