@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Carrera</h3>
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

    <form action="{{route('career.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre">
        </div>
        <div class="col-md-12">
          <strong>Descripcion :</strong>
          <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('career.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection
