@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle prioridad</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$priority->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripcion : </strong> {{$priority->description}}
        </div>
      </div>
      {{-- <div class="col-md-12">
            <div class="form-group">
              <strong>Softwares Asignados : </strong>
              <table class="table table-hover table-sm">
                    @foreach ($priority->software as $softwares)
                    <tr>
                          <td>{{$softwares->name}}</td>
                    @endforeach
              </table>

            </div>
          </div> --}}
      <div class="col-md-12">
        <a href="{{route('priority.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection
