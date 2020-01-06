@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar categoría</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('category.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre">
        </div>

        <div class="col-md-12">
            <strong>Tipo de producto: </strong>
            <select class="form-control" name="assets_id">
                @foreach ($assets as $asset)
                    <option value="{{$asset->id}}">{{$asset->name}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
        </div>
      </div>

    </form>

  </div>
@endsection
