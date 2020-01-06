@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar usuario</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('users.store')}}" method="post" name="f1">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre">
        </div>
        <div class="col-md-12">
            <strong>Correo electrónico :</strong>
            <input type="mail" name="email" class="form-control" placeholder="email">
          </div>
              <div class="col-md-12">
                  <strong>Contraseña: </strong>
                  <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                  {{-- @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror --}}
              </div>
              {{-- <div class="col-md-12">
                  <strong>Confirmar contraseña: </strong>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div> --}}


          <div class="col-md-12">
              <strong>Rol de usuario: </strong>
              <select class="form-control" name="role_id">
                  @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
              </select>
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

@endsection
