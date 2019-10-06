@extends('layouts.mantencion')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Plan de Mantención</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('maintenance_plan.create') }}">Agregar plan de mantencion</a>
          </div>
        </div>
        <br>

        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif

        <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>ID.</b></th>
            <th>Nombre</th>
            <th width = "220px">Accion</th>
          </tr>

          @foreach ($maintenance_plans as $maintenance_plan)
            <tr>
              <td><b>{{ $maintenance_plan->id }}.</b></td>
              <td>{{ $maintenance_plan->name}}</td>
              <td>
                <form action="{{ route('maintenance_plan.destroy', $maintenance_plan->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('maintenance_plan.show',$maintenance_plan->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('maintenance_plan.edit',$maintenance_plan->id)}}">Editar</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>


      </div>

@endsection

