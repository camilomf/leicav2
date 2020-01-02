@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle modelo</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$model->name}}
        </div>
      </div>

      <div class="col-md-12">
                <div class="form-group">
                    @if ($model->trademark != null)
                        <strong>Tipo de marca : </strong>{{ $model->trademark->name }}
                    @else
                        <strong>Tipo de marca : </strong>No hay tipo de marca asignada
                    @endif

                </div>
         </div>
      <div class="col-md-12">
        <a href="{{route('model.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
