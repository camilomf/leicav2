@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Software</h3>
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
          <strong>Version : </strong> {{$software->version}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Descripcion : </strong> {{$software->description}}
            </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observacion : </strong> {{$software->observation}}
        </div>
      </div>


      <div class="col-md-12">
                <div class="form-group">
                    @if ($software->softwareType!=null)
                        <strong>Tipo de Software : </strong>{{ $software->softwareType->name }}
                    @else
                        <strong>Tipo de Software : </strong>No hay tipo de software asignado
                    @endif

                </div>
         </div>
      <div class="col-md-12">
        <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
