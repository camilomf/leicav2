@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar software en el lugar</h3>
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

    <form action="{{route('softwarebyplace.update',$place->id)}}" method="post">
      @csrf
      @method('PUT')
      {{-- <div class="row">
        <div class="col-md-12">
          <input type="hidden" value="{{ $place->id }}">
          <strong>{{ $place->name }}</strong>
        </div>
      </div> --}}
      <br>
      <div class="row">
        <div class="form-check">
          @foreach ($softwares as $software)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="software[]" value="{{ $software->id}}" {{ $place->software->pluck('id')->contains($software->id) ? 'checked' : '' }}>
            <label class="form-check-label">
              {{ $software->name }} Version: {{ $software->version }}
            </label>
          </div>
          @endforeach
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('places.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
