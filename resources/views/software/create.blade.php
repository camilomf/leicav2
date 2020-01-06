@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar software</h3>
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

    <form action="{{route('software.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre" required='required'>
        </div>
        <div class="col-md-12">
            <strong>Versión :</strong>
            <input type="text" name="version" class="form-control" placeholder="" required='required'>
          </div>
        <div class="col-md-12">
            <strong>Observación :</strong>
            <textarea class="form-control" placeholder="Observacion" name="observation" rows="8" cols="80"></textarea>
        </div>
        <div class="col-md-12">
            <strong>Descripción :</strong>
            <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
                <strong>Tipo de software: </strong>
                <select class="form-control" name="software_type_id">
                    @foreach ($software_types as $software_type)
                        <option value="{{$software_type->id}}">{{$software_type->name}}</option>
                    @endforeach
                </select>
        </div>
      </div>
      <br>
      <div class="row">
            <div class="col-md-12">
                    <a href="{{route('software.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
                    <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
            </div>
      </div>
    </form>

  </div>
@endsection
