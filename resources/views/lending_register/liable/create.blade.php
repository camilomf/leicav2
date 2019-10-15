@extends('layouts.prestamo')
@section('content')
  <div class="container">
      <div>
          <form action="post" action="#">
              <input type="text" placeholder="buscar">
              <input type="submit" value="buscar">
          </form>
        </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Responsable</h3>
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

    <form action="{{route('liable.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Rut :</strong>
          <input type="text" name="rut" class="form-control" placeholder="" required="required">
        </div>



        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="" placeholder="Nombre" required="required">
        </div>

        <div class="col-md-12">
          <strong>Apellido Paterno :</strong>
          <input type="text" name="apePat" class="form-control" placeholder="" placeholder="Nombre" required="required">
        </div>

        <div class="col-md-12">
          <strong>Apellido Materno :</strong>
          <input type="text" name="apeMat" class="form-control" placeholder=""placeholder="Nombre" required="required">
        </div>

        <div class="col-md-12">
          <strong>Cargo: </strong>
          <select class="form-control" name="assets_id">
              @foreach ($liabilities as $liability)
                  <option value="{{$liability->id}}">{{$liability->name}}</option>
              @endforeach
          </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('lendings')}}" class="btn btn-sm btn-success">Volvar al indice</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection
