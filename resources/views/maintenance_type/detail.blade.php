@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle tipo de mantención</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$maintenance_type->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$maintenance_type->description}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('maintenance_type.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
