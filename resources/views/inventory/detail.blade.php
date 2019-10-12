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
          <strong>Categoria : </strong> {{$inventory->category->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>SKU : </strong> {{$inventory->sku}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Numero de serie : </strong> {{$inventory->serialnumber}}
            </div>
          </div>
        <div class="col-md-12">
              <div class="form-group">
                <strong>Precio : </strong>{{$inventory->price}} USD
              </div>
            </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observacion : </strong> {{$inventory->observation}}
        </div>
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
        <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
