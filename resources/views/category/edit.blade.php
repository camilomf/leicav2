@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar Categoria</h3>
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

    <form action="{{route('category.update',$category->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>

        @if ($category->assets!=null)
        <div class="col-md-12">
                <strong>Tipo de categoria: </strong>
                <select class="form-control" name="assets_id">
                    <option selected
                            value="{{$category->assets->id}}">{{$category->assets->name}}</option>
                    @foreach ($assets as $asset)
                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                    @endforeach
                    <option value=''>No asignar tipo de categoria</option>
                </select>
         </div>

    @else
        <div class="col-md-12">
                <strong>Tipo de category: </strong>
                <select class="form-control" name="assets_id">
                    <option value=''>No asignar tipo de categoria</option>
                    @foreach ($assets as $asset)
                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                    @endforeach
                </select>
        </div>

    @endif


        <div class="col-md-12">
          <a href="{{route('category.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
