@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Carrera</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$career->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$career->description}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Planes de estudio Asignado : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($career->studyPlan as $study_plan)
                    <tr>
                          <td>{{$study_plan->name}}</td>
                    @endforeach
              </table>

            </div>
          </div>
      <div class="col-md-12">
        <a href="{{route('career.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
