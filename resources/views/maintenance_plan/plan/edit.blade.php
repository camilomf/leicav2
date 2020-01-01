@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar plan de mantención</h3>
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

    <form action="{{route('maintenance_plan.update',$maintenance_plan->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" value="{{$maintenance_plan->name}}">
        </div>
      <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80" value="{{$maintenance_plan->description}}"></textarea>
      </div>
        <div class="col-md-12">
                <strong>Frecuencia: </strong>
                <select class="form-control" name="frequency_id">
                    <option selected
                            value="{{$maintenance_plan->frequency->id}}">{{$maintenance_plan->frequency->name}}</option>
                    @foreach ($frequencies as $frequency)
                        <option value="{{$frequency->id}}">{{$frequency->name}}</option>
                    @endforeach
                </select>
         </div>

        <div class="col-md-12">
                <strong>Prioridad: </strong>
                <select class="form-control" name="priority_id">
                    <option selected
                            value="{{$maintenance_plan->priority->id}}">{{$maintenance_plan->priority->name}}</option>
                    @foreach ($priorities as $priority)
                        <option value="{{$priority->id}}">{{$priority->name}}</option>
                    @endforeach
                    <option value=''>No asignar prioridad</option>
                </select>
         </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
                <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
              </div>
        </div>


    </form>
  </div>
@endsection
