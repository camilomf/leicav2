@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar modelo</h3>
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

    <form action="{{route('model.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre" required='required'>
        </div>

        <div class="col-md-12">
                <strong>Marca: </strong>
                <select class="form-control" name="trademark_id">
                    @foreach ($trademarks as $trademark)
                        <option value="{{$trademark->id}}">{{$trademark->name}}</option>
                    @endforeach
                </select>
        </div>
      </div>
      <br>
      <div class="row">
            <div class="col-md-12">
                    <a href="{{route('model.index')}}" class="btn btn-sm btn-success">Volvar al indice</a>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
      </div>
    </form>

  </div>
@endsection
