@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Plan de Mantención</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$maintenance_plan->name}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Descripción : </strong> {{$maintenance_plan->description}}
            </div>
      </div>

      <div class="col-md-12">
                <div class="form-group">
                    @if ($maintenance_plan->frequency!=null)
                        <strong>Frecuencia : </strong>{{ $maintenance_plan->frequency->name }}
                    @else
                        <strong>Frecuencia : </strong>No hay frecuencia asignada
                    @endif

                </div>
         </div>

        <div class="col-md-12">
            <div class="form-group">
                @if ($maintenance_plan->priority!=null)
                    <strong>Prioridad : </strong>{{ $maintenance_plan->priority->name }}
                @else
                    <strong>Prioridad : </strong>No hay prioridad asignada
                @endif
            </div>
        </div>


      <div class="col-md-12">
        <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
