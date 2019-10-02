@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar software en el Plan de estudio</h3>
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

    <form action="{{route('planbysoftware.update',$study_plan->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" value="{{ $study_plan->id }}">
          <strong>{{ $study_plan->name }}</strong>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="form-check">
          @foreach ($softwares as $software)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="software[]" value="{{ $software->id }}">
            <label class="form-check-label">
              {{ $software->name }} {{ $software->version }}
            </label>
          </div>
          @endforeach
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('plan.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
