@extends('layouts.mantencion')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Prioridad</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-outline-primary" href="{{ route('priority.create') }}">Agregar prioridad</a>
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
            <th width = "220px">Acción</th>
          </tr>

          @foreach ($priorities as $priority)
            <tr>
              <td><b>{{$id++ }}.</b></td>
              <td>{{$priority->name}}</td>
              <td>
                <form action="{{ route('priority.destroy', $priority->id) }}" method="post">
                  <a class="btn btn-sm btn-info" href="{{route('priority.show',$priority->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('priority.edit',$priority->id)}}">Editar</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>


      </div>

@endsection

