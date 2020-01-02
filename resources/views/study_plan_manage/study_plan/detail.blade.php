@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Plan de Carrera</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$study_plan->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de Inicio : </strong> {{$study_plan->date_start}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Fecha de Termino : </strong> {{ $study_plan->date_start }}
            </div>
          </div>
        <div class="col-md-12">
                <div class="form-group">
                  <strong>Carrera : </strong>{{ $study_plan->career->name }}
                </div>
         </div>
         <div class="col-md-12">
            <table class="table table-striped table-sm">
              <thead>
                <th>Software asigando al plan de estudio</th>
              </thead>
              <tbody>
                @foreach ($study_plan->software as $plan)
                <tr><td>{{ $plan->name }}</td></tr>
                @endforeach
              </tbody>
            </table>
          </div>

      <div class="col-md-12">
        <a href="{{route('plan.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
