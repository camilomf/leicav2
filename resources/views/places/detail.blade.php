@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle lugar</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{ $place->name }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$place->description}}
        </div>
      </div>
      <div class="col-md-12">
          <table class="table table-striped table-sm">
            <thead>
              <th>Software presente en el lugar {{ $place->name }}</th>
            </thead>
            <tbody>
              @foreach ($place->software as $plan)
              <tr><td>{{ $plan->name }}</td></tr>
              @endforeach
            </tbody>
          </table>
        </div>
      <div class="col-md-12">
        <div class="form-group">
            <h4>Inventario</h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="inventories">
              <thead>
                <tr>
                  <th width = "130px">Tipo</th>
                  <th>SKU</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>N° Serie</th>
                  <th>Estado</th>
                  <th width = "100px">Acción</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($inventories as $inventory)
                <tr>
                  <td>{{ $inventory->category->name }}</td>
                  <td>{{ $inventory->sku }}</td>
                  <td>{{ $inventory->modelo->trademark->name}}</td>
                  <td>{{ $inventory->modelo->name}}</td>
                  <td>{{ $inventory->serialnumber }}</td>
                  <td>{{ $inventory->state->name }}</td>
                  <td>
                    <form action="{{ route('inventory.destroy', $inventory->id) }}" method="post">
                      <a class="btn btn-sm btn-info" href="{{route('inventory.show',$inventory->id)}}">Detalle</a>
                      @if (auth()->user()->hasRoles(['User','Admin']))
                      <a class="btn btn-sm btn-warning" href="{{route('inventory.edit',$inventory->id)}}">Editar</a>
                      @endif
                      @csrf
                      {{-- @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button> --}}
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>

      <div>

      </div>
      {{-- <div class="col-md-12">
            <div class="form-group">
              <strong>Planes de estudio Asignado : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($place->studyPlan as $study_plan)
                    <tr>
                          <td>{{$study_plan->name}}</td>
                    @endforeach
              </table>

            </div>
          </div> --}}
      <div class="col-md-12">
        <a href="{{route('places.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
      </div>
    </div>
  </div>




  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/data_table/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#inventories').DataTable({
        "language":idioma
    });
} );
var idioma={
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
}
</script>



@endsection
