@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Registrar Mantención</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('maintenance_register.store',$inventory->id)}}" method="post">
      @csrf
      @method('put')
      <div class="row">
        {{-- <div>
          <input type="text" name="inventory_id" value="{{ $inventory->id }}" hidden="hidden">
        </div> --}}
      <div class="col-md-12">
        <strong>Tipo de mantención: </strong>
        <select class="form-control" name="maintenance_type_id">
            @foreach ($maintenance_types as $maintenance_type)
                <option value="{{$maintenance_type->id}}">{{$maintenance_type->name}}</option>
            @endforeach
        </select>
        </div>
        <div>
            <br>
        </div>

        <div class="col-md-12">
          <a href="{{route('maintenance_register.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
