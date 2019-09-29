@extends('layouts.layout')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de Planes de estudio</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('plan.create') }}">Agregar plan de estudio</a>
          </div>
        </div>

        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif

        <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>ID.</b></th>
            <th width = "300px">Nombre</th>
            <th width = "180px">Accion</th>
          </tr>

          @foreach ($study_plans as $study_plan)
            <tr>
              <td><b>{{$study_plan->id }}.</b></td>
              <td>{{$study_plan->name}}</td>
              <td>
                <form action="{{ route('plan.destroy', $study_plan->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('plan.show',$study_plan->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('plan.edit',$study_plan->id)}}">Editar</a>
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

