@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>Editar usuario</h3>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
      <ul>
        @foreach ($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{route('users.update',$user->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <strong>Nombre :</strong>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required="required">
      </div>
      <div class="col-md-12">
        <strong>Correo electrónico :</strong>
        <input type="email" name="email" class="form-control" value="{{$user->email}}" required="required">
      </div>
      <div class="col-md-12">
        @if ($user->id!=1)
        <strong>Rol de usuario: </strong>
        <select class="form-control" name="role_id">
            <option selected
                    value="{{ $user->role->id}}">{{$user->role->name}}</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @endif
      </div>
    </div>
    <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('users.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
        </div>
      </div>
  </form>
</div>

<script>
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
  </script>


@endsection
