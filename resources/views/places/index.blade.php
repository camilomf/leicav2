@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de lugares</h3>
          </div>
          @if (auth()->user()->hasRoles(['User','Admin']))
            <div class="col-sm-2">
              <a class="btn btn-outline-primary" href="{{ route('places.create') }}">Agregar lugar</a>
            </div>
          @endif

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
            <th>Nombre  </th>
            <th width = "270px">Acción</th>
          </tr>

          @foreach ($places as $place)
            <tr>
              <td><b>{{$id++ }}.</b></td>
              <td>{{$place->name}}</td>
              <td>
                <form action="{{ route('places.destroy', $place->id) }}" method="post">
                  <a class="btn btn-sm btn-info" href="{{route('places.show',$place->id)}}">Detalle</a>
                  @if (auth()->user()->hasRoles(['User','Admin']))
                    <a class="btn btn-sm btn-warning" href="{{route('places.edit',$place->id)}}">Editar</a>
                    <a class="btn btn-sm btn-success" href="{{route('softwarebyplace.edit',$place->id)}}">Software</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                  @endif

                </form>
              </td>
            </tr>
          @endforeach
        </table>


      </div>

@endsection

