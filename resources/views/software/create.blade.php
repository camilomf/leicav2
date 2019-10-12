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
          @foreach ($errors as $error)
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
            <strong>Version :</strong>
            <input type="text" name="version" class="form-control" placeholder="" required='required'>
          </div>
        <div class="col-md-12">
            <strong>Observation :</strong>
            <textarea class="form-control" placeholder="Descripcion" name="observation" rows="8" cols="80"></textarea>
        </div>
        <div class="col-md-12">
            <strong>Descripcion :</strong>
            <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
                <strong>Tipo de software: </strong>
                <select class="form-control" name="software_type_id">
                    <option value=''>No asignar tipo de software</option>
                    @foreach ($software_types as $software_type)
                        <option value="{{$software_type->id}}">{{$software_type->name}}</option>
                    @endforeach
                </select>
        </div>
      </div>
      <br>
      <div class="row">
            <div class="col-md-12">
                    <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
      </div>
    </form>

  </div>
@endsection
