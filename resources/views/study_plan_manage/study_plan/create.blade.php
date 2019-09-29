@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Plan de estudio</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('plan.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre" required='required'>
        </div>
        <div class="col-md-12">
          <strong>Fecha de inicio :</strong>
          <input type="date" name="date_start" class="form-control" required="required">
        </div>
        <div class="col-md-12">
          <strong>Fecha de termino :</strong>
          <input type="date" name="date_end" class="form-control" required="required">
        </div>

        <div class="col-md-12">
                <strong>Carrera: </strong>
                <select class="form-control" name="career_id">
                    <option value=''>No asignar carrera</option>
                    @foreach ($careers as $career)
                        <option value="{{$career->id}}">{{$career->name}}</option>
                    @endforeach
                </select>
        </div>
      </div>
      <br>
      <div class="row">
            <div class="col-md-12">
                    <a href="{{route('career.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
      </div>
    </form>

  </div>
@endsection
