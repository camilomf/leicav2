@extends('layouts.mantencion')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Frecuencias</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('frequency.create') }}">Agregar nueva frecuencia</a>
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

          @foreach ($frequencies as $frequency)
            <tr>
              <td><b>{{$frequency->id }}.</b></td>
              <td>{{$frequency->name}}</td>
              <td>
                <form action="{{ route('frequency.destroy', $frequency->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('frequency.show',$frequency->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('frequency.edit',$frequency->id)}}">Editar</a>
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

