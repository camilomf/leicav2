@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Registrat Mantencion</h3>
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
          <select class="form-control" name="assets_id">
              @foreach ($liables as $liable)
                  <option value="{{$liable->id}}">{{$liable->name}}</option>
              @endforeach
          </select>
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <a href="{{route('liable.create')}}" class="btn btn-sm btn-success">Agregar nuevo responsable</a>
          <a href="{{route('maintenance_register.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
