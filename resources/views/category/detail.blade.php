@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Lugar</h3>
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
            @if ($category->assets!=null)
                <strong>Tipo de producto : </strong>{{ $category->assets->name }}
            @else
                <strong>Tipo de producto : </strong>No hay tipo de producto asignado
            @endif

        </div>
    </div>

      <div class="col-md-12">
        <a href="{{route('category.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
