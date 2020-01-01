@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle categoría</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$category->name}}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <strong>Tipo de producto : </strong>{{ $category->assets->name }}
        </div>
    </div>

      <div class="col-md-12">
        <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection
