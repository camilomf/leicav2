@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar tipo de mantención</h3>
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

    <form action="{{route('maintenance_type.store')}}" method="post">
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
      </div>
      <br>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('maintenance_type.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
              </div>
        </div>
    </form>
  </div>
@endsection
