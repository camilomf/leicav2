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
          <strong>Descripcion : </strong> {{$maintenance_type->description}}
        </div>
      </div>
      {{-- <div class="col-md-12">
            <div class="form-group">
              <strong>Planes de estudio Asignado : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($maintenance_type->studyPlan as $study_plan)
                    <tr>
                          <td>{{$study_plan->name}}</td>
                    @endforeach
              </table>

            </div>
          </div> --}}
      <div class="col-md-12">
        <a href="{{route('maintenance_type.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
