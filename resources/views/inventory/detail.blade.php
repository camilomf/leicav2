@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Inventario</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Categoría : </strong> {{ $inventory->category->name }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>SKU : </strong> {{ $inventory->sku }}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Número de serie : </strong> {{ $inventory->serialnumber }}
            </div>
          </div>
        <div class="col-md-12">
              <div class="form-group">
                <strong>Precio (CLP) : </strong>{{ $inventory->price }}
              </div>
            </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observación : </strong> {{$inventory->observation}}
        </div>
      </div>
      <div class="col-md-12">
        <h3>Artículos asociados al {{ $inventory->category->name }}, N° serie: {{ $inventory->serialnumber }}, SKU: {{ $inventory->sku }}</h3>
          <table class="table table-striped table-sm">
            <thead>
              <th>Categoría</th>
              <th>N° de serie</th>
              <th>Modelo</th>
              <th>Marca</th>
              <th>Estado</th>
            </thead>
            <tbody>
              @foreach ($inventory->items as $item)
              <tr>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->serialnumber }}</td>
                <td>{{ $item->modelo->name }}</td>
                <td>{{ $item->modelo->trademark->name }}</td>
                <td>{{ $item->state->name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      {{-- <div class="col-md-12">
                <div class="form-group">
                    @if ($inventory->model!=null)
                        <strong>Tipo de inventory : </strong>{{ $inventory->model->name }}
                    @else
                        <strong>Tipo de inventory : </strong>No hay tipo de inventory asignado
                    @endif

                </div>
         </div> --}}

      <div class="col-md-12">
        <a href="{{route('inventory.index')}}" class="btn btn-sm btn-outline-success">Lista inventario</a>
      </div>
    </div>
  </div>
@endsection
