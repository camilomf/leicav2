@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar prioridad</h3>
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

    <form action="{{route('priority.update',$priority->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" value="{{$priority->name}}">
        </div>
        <div class="col-md-12">
          <strong>Descripcion :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$priority->description}}</textarea>
        </div>
      </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('priority.index')}}" class="btn btn-sm btn-success">Atras</a>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
              </div>
        </div>
    </form>
  </div>
@endsection
