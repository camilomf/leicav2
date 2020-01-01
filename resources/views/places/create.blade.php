@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar lugar</h3>
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

    <form action="{{route('places.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre">
        </div>
        <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" placeholder="Descripcion" name="description" required="required" rows="8" cols="80"></textarea>
        </div>
      </div>
      <br>
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('places.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
            <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
          </div>
        </div>


    </form>

  </div>
@endsection
