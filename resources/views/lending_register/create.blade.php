@extends('layouts.mantencion')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Registrat Mantencion</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('maintenance_register.update',$inventory->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

      <div class="col-md-12">
        <strong>Tipo de mantencion: </strong>
        <select class="form-control" name="maintenance_type_id">
            @foreach ($maintenance_types as $maintenance_type)
                <option value="{{$maintenance_type->id}}">{{$maintenance_type->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-12">
          <a href="{{route('maintenance_register.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
