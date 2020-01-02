@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>Cambiar contraseña</h3>
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

  <form action="{{route('users.updatePassword',$user->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          @csrf
        <div class="col-md-12">
          <strong>Contraseña :</strong>
          <input type="password" name="password" value="{{ null }}" required="required" class="form-control" minlength="10" autocomplete="new-password">
        </div>
      {{-- <div class="col-md-12">
          <strong>Confirmar contraseña :</strong>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>  --}}
    </div>

  <br>
  <div class="row">
      <div class="col-md-12">
          <a href="{{route('users.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
          {{-- <button type="submit" class="btn btn-primary">
              {{ __('Register') }}
          </button> --}}
    </div>
  </div>
</form>

@endsection
