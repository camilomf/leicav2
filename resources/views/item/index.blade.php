@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de Item</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('items.create') }}">Agregar item</a>
          </div>
        </div>
        <br>

        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm" id="items">
              <thead>
                  <tr>
                      <th width = "50px"><b>ID.</b></th>
                      <th>Categoria</th>
                      <th>Numero de serie</th>
                      <th width = "220px">Accion</th>
                    </tr>
              </thead>
              <tbody>
                  @foreach ($items as $item)
                  <tr>  
                    <td><b>{{$id++ }}.</b></td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->serialnumber}}</td>
                    <td>
                      <form action="{{ route('items.destroy', $item->id) }}" method="post">
                        <a class="btn btn-sm btn-info" href="{{route('items.show',$item->id)}}">Detalle</a>
                        <a class="btn btn-sm btn-warning" href="{{route('items.edit',$item->id)}}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
                
              </table>
        </div>
      </div>

      <script src="{{ asset('/js/jquery.min.js') }}"></script>
      <script src="{{ asset('/data_table/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#items').DataTable({
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

