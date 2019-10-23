@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle item</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="form-group">
            <strong>Categoria : </strong> {{$item->category->name}}
          </div>
        </div>
      <div class="col-md-12">
          <div class="form-group">
            <strong>Modelo : </strong> {{$item->modelo->name}}
          </div>
        </div>

      <div class="col-md-12">
        <div class="form-group">
          <strong>N° de serie : </strong> {{$item->serialnumber}}
        </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Precio (USD) : </strong> {{$item->price}}
          </div>
        </div>

      <div class="col-md-12">
        <div class="form-group">
          <strong>Inventario asociado : </strong>
          @if ($item->inventory==null)
              No tiene inventario asociado
          @else
              {{ $item->inventory->category->name }} ,SKU: {{ $item->inventory->sku }} ,N° de serie: {{ $item->inventory->serialnumber }}
          @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <strong>Detalle : </strong> {{$item->detail}}
        </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Estado : </strong> {{$item->state->name}}
          </div>
        </div>

      <div class="col-md-12">
        <a href="{{route('items.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
