@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar Software</h3>
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

    <form action="{{route('software.update',$software->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" value="{{$software->name}}">
        </div>
        <div class="col-md-12">
          <strong>Version :</strong>
          <input type="text" name="version" class="form-control" placeholder="" required='required' value="{{$software->name}}">
        </div>
      <div class="col-md-12">
          <strong>Observation :</strong>
          <textarea class="form-control" placeholder="Descripcion" name="observation" rows="8" cols="80" value="{{$software->observation}}"></textarea>
      </div>
      <div class="col-md-12">
          <strong>Descripcion :</strong>
          <textarea class="form-control" placeholder="Descripcion" name="description" rows="8" cols="80" value="{{$software->description}}"></textarea>
      </div>

        <div class="col-md-12">
                <strong>Tipo de software: </strong>
                <select class="form-control" name="software_type_id">
                    <option selected
                            value="{{$software->softwareType->id}}">{{$software->softwareType->name}}</option>
                    @foreach ($software_types as $software_type)
                        <option value="{{$software_type->id}}">{{$software_type->name}}</option>
                    @endforeach
                </select>
         </div>
        </div>
        <br>
         <div class="row">
            <div class="col-md-12">
                <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Atras</a>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
              </div>
         </div>
         <br>
    </form>
  </div>
@endsection
