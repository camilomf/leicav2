@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar modelo</h3>
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

    <form action="{{route('model.update',$model->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" value="{{$model->name}}">
        </div>

        @if ($model->tradeMark != null)
            <div class="col-md-12">
                    <strong>Marca: </strong>
                    <select class="form-control" name="trademark_id">
                        <option selected
                                value="{{$model->tradeMark->id}}">{{$model->tradeMark->name}}</option>
                        @foreach ($trademarks as $trademark)
                            <option value="{{$trademark->id}}">{{$trademark->name}}</option>
                        @endforeach
                        <option value=''>No asignar marca</option>
                    </select>
             </div>
        @else
            <div class="col-md-12">
                    <strong>Marca: </strong>
                    <select class="form-control" name="trademark_id">
                        <option value=''>No asignar marca</option>
                        @foreach ($trademarks as $trademark)
                            <option value="{{$trademark->id}}">{{$trademark->name}}</option>
                        @endforeach
                    </select>
            </div>

        @endif




        <div class="col-md-12">
          <a href="{{route('model.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
