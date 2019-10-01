@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle tipo de software</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$software_type->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripcion : </strong> {{$software_type->description}}
        </div>
      </div>
      <div class="col-md-12">
            <div class="form-group">
              <strong>Softwares Asignados : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($software_type->software as $softwares)
                    <tr>
                          <td>{{$softwares->name}}</td>
                    @endforeach
              </table>

            </div>
          </div>
      <div class="col-md-12">
        <a href="{{route('software_type.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
