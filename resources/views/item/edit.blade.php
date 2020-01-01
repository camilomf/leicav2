@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar artículo</h3>
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

    <form action="{{route('items.update',$item->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Número de serie:</strong>
          <input type="text" name="serialnumber" class="form-control" required="required" value="{{$item->serialnumber}}">
        </div>
        <div class="col-md-12">
          <strong>Precio (USD):</strong>
          <input type="text" name="price" class="form-control" value="{{$item->price}}">
        </div>
        <div class="col-md-12">
            <strong>Detalle :</strong>
            <textarea class="form-control" name="detail" rows="8" cols="80">{{$item->detail}}</textarea>
          </div>

        <div class="col-md-12">
                <strong>Tipo de categoría: </strong>
                <select class="form-control" name="category_id">
                    <option selected
                            value="{{$item->category->id}}">{{ $item->category->name}}</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
         </div>
         <div class="col-md-12">
            <strong>Modelo: </strong>
            <select class="form-control" name="modelo_id">
                <option selected
                        value="{{$item->modelo->id}}">{{$item->modelo->name}}</option>
                @foreach ($modelos as $modelo)
                    <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-12">
             <strong>Inventario: </strong>
             <select class="form-control" name="inventory_id">
               @if ($item->inventory==null)
                   <option selected value="{{ null }}">No asignar</option>
               @else
               <option selected value="{{$item->inventory->id}}">
                  Categoría: {{$item->inventory->category->name}} ,
                  N° serie: {{$item->inventory->serialnumber}} ,
                  SKU: {{$item->inventory->sku}}
              </option>
               @endif
                 @foreach ($inventories as $inventory)
                    <option value="{{$inventory->id}}">Categoría: {{$inventory->category->name}} ,
                    N° serie: {{ $inventory->serialnumber }} ,
                    SKU: {{ $inventory->sku }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="col-md-12">
                <strong>Estado: </strong>
                <select class="form-control" name="state_id">
                    <option selected
                            value="{{$item->state->id}}">{{$item->state->name}}</option>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
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
