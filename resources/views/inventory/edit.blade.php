@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar inventario sn: {{ $inventory->serialnumber }}, sku: {{ $inventory->sku }}</h4>
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

    <form action="{{route('inventory.update',$inventory->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        {{-- <div class="col-md-12">
          <strong>Número de serie :</strong>
          <input type="text" name="serialnumber" class="form-control" value="{{$inventory->serialnumber}}">
        </div> --}}

        {{-- <div class="col-md-12">
            <strong>SKU :</strong>
            <input type="text" name="sku" class="form-control" value="{{$inventory->sku}}">
              </div> --}}

        <div class="col-md-12">
            <strong>Precio (CLP) :</strong>
            <input type="number" name="price" class="form-control" value="{{$inventory->price}}">
            </div>

      <div class="col-md-12">
          <strong>Observación :</strong>
          <textarea class="form-control" name="observation" rows="8" cols="80" value="{{$inventory->observation}}"></textarea>
      </div>
        {{-- place --}}
        @if ($inventory->place != null)
            <div class="col-md-12">
                    <strong>Lugar: </strong>
                    <select class="form-control" name="place_id">
                        <option selected
                                value="{{$inventory->place->id}}">{{$inventory->place->name}}</option>
                        @foreach ($places as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                    </select>
             </div>
        @else
            <div class="col-md-12">
                    <strong>Lugar: </strong>
                    <select class="form-control" name="place_id">
                        <option value=''>Lugar no asigando</option>
                        @foreach ($places as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                    </select>
            </div>
        @endif

            {{-- category --}}
        @if ($inventory->category != null)
            <div class="col-md-12">
                    <strong>Categoría: </strong>
                    <select class="form-control" name="category_id">
                        <option selected
                                value="{{$inventory->category->id}}">{{$inventory->category->name}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
             </div>
        @else
            <div class="col-md-12">
                    <strong>Categoría: </strong>
                    <select class="form-control" name="category_id">
                        <option value=''>Categoría no asiganda</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
            </div>
        @endif

        {{-- model --}}
        @if ($inventory->modelo != null)
            <div class="col-md-12">
                    <strong>Modelo: </strong>
                    <select class="form-control" name="model_id">
                        <option selected
                                value="{{$inventory->modelo->id}}">{{$inventory->modelo->name}}</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                        @endforeach
                    </select>
             </div>
        @else
            <div class="col-md-12">
                    <strong>Modelo: </strong>
                    <select class="form-control" name="place_id">
                        <option value=''>Modelo no asigando</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                        @endforeach
                    </select>
            </div>
        @endif

        {{-- maintenance_plan --}}
        @if ($inventory->maintenance_plan != null)
            <div class="col-md-12">
                    <strong>Plan de mantención: </strong>
                    <select class="form-control" name="maintenance_plan_id">
                        <option selected
                                value="{{$inventory->maintenance_plan->id}}">{{$inventory->maintenance_plan->name}}</option>
                        @foreach ($maintenance_plans as $maintenance_plan)
                            <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->name}}</option>
                        @endforeach
                    </select>
             </div>
        @else
            <div class="col-md-12">
                    <strong>Plan de mantención: </strong>
                    <select class="form-control" name="maintenance_plan_id">
                        <option value=''>Modelo no asigando</option>
                        @foreach ($maintenance_plans as $maintenance_plan)
                            <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->name}}</option>
                        @endforeach
                    </select>
            </div>
        @endif

        {{-- state --}}
        @if ($inventory->state != null)
        <div class="col-md-12">
                <strong>Estado: </strong>
                <select class="form-control" name="state_id">
                    <option selected
                            value="{{$inventory->state->id}}">{{$inventory->state->name}}</option>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
         </div>
        @else
            {{-- <div class="col-md-12">
                    <strong>Plan de mantencion: </strong>
                    <select class="form-control" name="maintenance_plan_id">
                        <option value=''>Modelo no asigando</option>
                        @foreach ($maintenance_plans as $maintenance_plan)
                            <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->name}}</option>
                        @endforeach
                    </select>
            </div> --}}
        @endif
        <div>
            <br>
        </div>

        <div class="col-md-12">
          <a href="{{route('inventory.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
