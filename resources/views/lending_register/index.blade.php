@extends('layouts.prestamo')
@section('title')
Maintenance Register
@endsection
@section('indice')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registro de mantencion</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          {{-- <div class="btn-group mr-2">
                <a class="btn btn-sm btn-success" href="{{ route('inventory.create') }}">Agregar inventario</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> --}}
        </div>
      </div>
      <br>
      <div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{$message}}</p>
            </div>
          @endif
      </div>
      <br>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="inventories">
          <thead>
            <tr>
              <th width = "130px">Categoría</th>
              <th>SKU</th>
              <th>Modelo</th>
              <th>N° Serie</th>
              <th>Fecha de prestamo</th>
              <th>Cuando debe devolver</th>
              <th>Cuando fue devuelto</th>
              <th>responsable rut</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($inventories as $inventory)
            @foreach ($inventory->inventoryByLiable as $byLiable)
            <tr>
                    {{-- <td>{{ $byLiable->pivot->id }}</td> --}}
                    <td>{{ $inventory->category->name}}</td>
                    <td>{{ $inventory->sku }}</td>
                    <td>{{ $inventory->modelo->name}}</td>
                    <td>{{ $inventory->serialnumber}}</td>
                    <td>{{ $byLiable->pivot->created_at}}</td>
                    <td>{{ $byLiable->pivot->supossed_return_date}}</td>
                    @if ($byLiable->pivot->created_at == $byLiable->pivot->updated_at)
                      <td>No Devuelto</td>
                    @else
                      <td>{{ $byLiable->pivot->updated_at}}</td>
                    @endif
                    <td>{{ $byLiable->rut }}</td>
                  </tr>
            @endforeach
          @endforeach
        </tbody>
        </table>
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
