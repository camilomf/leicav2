@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle marca</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$trademark->name}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Modelos asociados : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($trademark->model as $models)
                    <tr>
                          <td>{{$models->name}}</td>
                    @endforeach
              </table>

            </div>
          </div>
      <div class="col-md-12">
        <a href="{{route('trademark.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
