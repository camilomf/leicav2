@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Registrar Prestamo</h3>
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

    <form action="{{route('lending_register.store',$inventory->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Responsable: </strong>
          <select class="form-control" name="liable_id">
              @foreach ($liables as $liable)
                  <option value="{{$liable->id}}">{{$liable->name}}</option>
              @endforeach
          </select>
          </div>
        <div class="col-md-12">
            <strong>Fecha de devolución :</strong>
            <input type="date" name="suppossed_return_date" class="form-control" required="required">
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <a href="{{route('liable.create', ['id' => $inventory->id])}}" class="btn btn-sm btn-success">Agregar nuevo responsable</a>
          <a href="{{route('lendings')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
    </form>
  </div>
@endsection
