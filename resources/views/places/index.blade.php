@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de Lugares</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('places.create') }}">Agregar nuevo lugar</a>
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
            <th>Nombre  </th>
            <th width = "200px">Accion</th>
          </tr>

          @foreach ($places as $place)
            <tr>
              <td><b>{{$place->id }}.</b></td>
              <td>{{$place->name}}</td>
              <td>
                <form action="{{ route('place.destroy', $place->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('places.show',$place->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('places.edit',$place->id)}}">Editar</a>
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

