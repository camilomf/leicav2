@extends('layouts.mantencion')


@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de tipos de mantención</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('maintenance_type.create') }}">Agregar nuevo tipo de mantención</a>
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
            <th >Nombre</th>
            <th width = "200px">Accion</th>
          </tr>

          @foreach ($maintenance_types as $maintenance_type)
            <tr>
              <td><b>{{$id++ }}.</b></td>
              <td>{{$maintenance_type->name}}</td>
              <td>
                <form action="{{ route('maintenance_type.destroy', $maintenance_type->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('maintenance_type.show',$maintenance_type->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('maintenance_type.edit',$maintenance_type->id)}}">Editar</a>
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

