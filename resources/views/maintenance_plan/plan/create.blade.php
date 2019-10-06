@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Plan de estudio</h3>
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

    <form action="{{route('maintenance_plan.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre" required='required'>
        </div>
        <div class="col-md-12">
            <strong>Descripcion :</strong>
            <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
                <strong>Frecuencia: </strong>
                <select class="form-control" name="frequency_id">
                    <option value=''>No asignar frecuencia</option>
                    @foreach ($frequencies as $frequency)
                        <option value="{{$frequency->id}}">{{$frequency->name}}</option>
                    @endforeach
                </select>
        </div>

        <div class="col-md-12">
                <strong>Prioridad: </strong>
                <select class="form-control" name="priority_id">
                    <option value=''>No asignar prioridad</option>
                    @foreach ($priorities as $priority)
                        <option value="{{$priority->id}}">{{$priority->name}}</option>
                    @endforeach
                </select>
        </div>

      </div>
      <br>
      <div class="row">
            <div class="col-md-12">
                    <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
      </div>
    </form>

  </div>
@endsection
