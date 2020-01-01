@extends('layouts.inventario')

@section('indice')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Resumen plan de estudio</h3>
          </div>
          {{-- <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('model.create') }}">Agregar modelo</a>
          </div> --}}
        </div>
        <br>

        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif
        <div class="row">
                <div class="col-6">
                    <h3>Software por plan de estudio</h3>
                        @foreach ($careers as $career)
                        <h4>Nombre carrera:
                            @if ($career->id == 1)
                                Sin asignar
                            @else
                                {{ $career->name }}
                            @endif
                            </h4>
                        <table class="table table-hover table-sm">
                            <tr>
                              <th>Plan de estudio</th>
                              <th>Software</th>
                            </tr>
                        @foreach ($career->studyPlan as $plan)
                        <tr>
                          <td>{{ $plan->name }}</td>
                          <td>
                          @foreach ($plan->software as $software)
                            {{ $software->name }} <br>
                          @endforeach
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    @endforeach
                  </div>
                  <div class="col-6">
                      <h3>Software por lugar</h3>
                        <table class="table table-hover table-sm">
                                <tr>
                                  <th>lugar</th>
                                  <th>Software</th>
                                </tr>
                            @foreach ($places as $place)
                            <tr>
                              <td>{{ $place->name }}</td>
                              <td>
                              @foreach ($place->software as $software)
                                {{ $software->name }} <br>
                              @endforeach
                                </td>
                            </tr>
                            @endforeach
                            </table>
                  </div>
        </div>


      </div>

@endsection
