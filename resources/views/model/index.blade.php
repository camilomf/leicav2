@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de modelos</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-outline-primary" href="{{ route('model.create') }}">Agregar modelo</a>
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
            <th>Marca</th>
            <th width = "220px">Acción</th>
          </tr>

          @foreach ($models as $model)
            <tr>
              <td><b>{{ $id++ }}.</b></td>
              <td>{{ $model->name}}</td>
              <td>{{ $model->trademark->name}}</td>
              <td>
                <form action="{{ route('model.destroy', $model->id) }}" method="post">
                  <a class="btn btn-sm btn-info" href="{{route('model.show',$model->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('model.edit',$model->id)}}">Editar</a>
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

