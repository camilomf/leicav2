@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de tipos de software</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('software_type.create') }}">Agregar nuevo tipo de software</a>
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
            <th width = "300px">Nombre</th>
            <th>Descripcion</th>
            <th width = "200px">Accion</th>
          </tr>

          @foreach ($software_types as $software_type)
            <tr>
              <td><b>{{$id++ }}.</b></td>
              <td>{{$software_type->name}}</td>
              <td>{{$software_type->description}}</td>
              <td>
                <form action="{{ route('software_type.destroy', $software_type->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('software_type.show',$software_type->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('software_type.edit',$software_type->id)}}">Editar</a>
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

