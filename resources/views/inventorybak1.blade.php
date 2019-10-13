<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    {{-- <link rel="stylesheet" href=""> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/data_table/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/data_table/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
    <title>Inventory</title>
</head>
<body>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Inventario</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-success" href="{{ route('inventory.create') }}">Agregar inventario</a>
                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> --}}
                  </div>
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button> --}}
                </div>
              </div>

              {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
              <br>
              <div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <p>{{$message}}</p>
                    </div>
                  @endif
                  {{-- <h3>busqueda</h3>
                  <table class="table table-borderless">
                      <tr>
                         <th>SKU</th>
                         <th>Marca</th>
                         <th>Modelo</th>
                         <th>N° Serie</th>
                         <th>Lugar</th>
                         <th>Estado</th>
                      </tr>
                      <tr>
                      <td>
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      <td>
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      <td>
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      <td>
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      <td>
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      <td>
                              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </td>
                      </tr>
                      <tr>
                          <td><button type="button" class="btn btn-primary btn-block">Buscar</button></td>
                          <td><button type="button" class="btn btn-primary btn-block">Buscar</button></td>
                          <td><button type="button" class="btn btn-primary btn-block">Buscar</button></td>
                      </tr>
                  </table> --}}
              </div>
              <br>

              <h2>Section title</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="inventories">
                  <thead>
                    <tr>
                      <th width = "130px">Tipo</th>
                      <th>SKU</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>N° Serie</th>
                      <th>Lugar</th>
                      <th>Estado</th>
                      <th width = "220px">Accion</th>
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
                      <td>{{ $inventory->place->name }}</td>
                      <td>{{ $inventory->state->name }}</td>
                      <td>
                            <form action="{{ route('inventory.destroy', $inventory->id) }}" method="post">
                              <a class="btn btn-sm btn-info" href="{{route('inventory.show',$inventory->id)}}">Detalle</a>
                              <a class="btn btn-sm btn-warning" href="{{route('inventory.edit',$inventory->id)}}">Editar</a>
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

              <script src="{{ asset('/js/jquery.min.js') }}"></script>
              <script src="{{ asset('/data_table/datatables.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                $('#inventories').DataTable();
            } );
        </script>

</body>
</html>
