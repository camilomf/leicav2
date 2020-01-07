@extends('layouts.inventario')
@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar artículo</h3>
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

    <form action="{{route('items.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Numero de serie :</strong>
          <input type="text" name="serialnumber" class="form-control" required="required" placeholder="ingresar">
        </div>
        <div class="col-md-12">
            <strong>Precio (CLP) :</strong>
            <input type="number" name="price" class="form-control" placeholder="ingresar">
        </div>
        <div class="col-md-12">
            <strong>Detalle :</strong>
            <textarea class="form-control" placeholder="ingresar" name="detail" rows="8" cols="80"></textarea>
          </div>
        <div class="col-md-12">
            <strong>Categoria: </strong>
            <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <strong>Modelo: </strong>
            <select class="form-control" name="modelo_id">
                @foreach ($modelos as $modelo)
                    <option value="{{$modelo->id}}">{{ $modelo->trademark->name }} {{$modelo->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <strong>Inventario: </strong>
            <select class="form-control" name="inventory_id">
                @foreach ($inventories as $inventory)
                    <option value="{{$inventory->id}}">{{ $inventory->category->name }} ,sku: {{ $inventory->sku }} ,N° serie: {{ $inventory->serialnumber }}</option>
                @endforeach
                <option value={{ null }}>No asignar</option>
            </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('items.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
        </div>
      </div>

    </form>

  </div>
@endsection
