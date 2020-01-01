@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle software</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$software->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Versión : </strong> {{$software->version}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Descripcion : </strong> {{$software->description}}
            </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observación : </strong> {{$software->observation}}
        </div>
      </div>


      <div class="col-md-12">
          <div class="form-group">
            <strong>Tipo de software : </strong>{{ $software->softwareType->name }}
          </div>
         </div>
      <div class="col-md-12">
        <a href="{{route('software.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
