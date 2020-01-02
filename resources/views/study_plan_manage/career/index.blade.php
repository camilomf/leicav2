@extends('layouts.layout')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de carreras</h3>
            <br>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-outline-primary" href="{{ route('career.create') }}">Agregar carrera</a>
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
            <th>Nombre</th>
            <th width = "200px">Acción</th>
          </tr>

          @foreach ($careers as $career)
            <tr>
              <td><b>{{$id++ }}.</b></td>
              <td>{{$career->name}}</td>
              <td>
                <form action="{{ route('career.destroy', $career->id) }}" method="post">
                  <a class="btn btn-sm btn-info" href="{{route('career.show',$career->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('career.edit',$career->id)}}">Editar</a>
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

